<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 404 handler — runs admin SEO redirects for unknown URLs, then Page Builder pages, then shows 404.
 * MY_Controller::__construct already calls seo_redirect_apply_if_match().
 */
class Seo_redirect extends Frontend_Controller {

	public function missing()
	{
		$raw = trim((string) $this->uri->uri_string(), '/');
		if ($raw !== '' && preg_match('/^[A-Za-z0-9-]+$/', $raw) && $this->render_builder_page($raw)) {
			return;
		}
		show_404();
	}

	/** Render a Page Builder page for this slug. Returns false when there is none to show. */
	protected function render_builder_page($raw_slug)
	{
		$slug = strtolower($raw_slug);
		$this->load->model('Pagebuilder/Pagebuilder_Model', 'pbModel');
		$page = $this->pbModel->find_by_slug($slug);
		if (!$page) {
			return false;
		}

		$is_preview = false;
		if ($page->status !== 'published') {
			$token = (string) $this->input->get('preview');
			if ($token === '' || !hash_equals(pb_preview_token($page->id), $token)) {
				return false;
			}
			$is_preview = true;
		}
		if ($raw_slug !== $slug && !$is_preview) {
			redirect(pb_page_url($slug), 'location', 301);
		}

		$sections = $this->pbModel->active_sections($page->id);

		$seo = array(
			'title' => trim((string) $page->meta_title) !== '' ? $page->meta_title : $page->title,
			'description' => (string) $page->meta_description,
			'keywords' => (string) $page->meta_keywords,
			'canonical' => pb_page_url($slug),
			'og_type' => 'website',
		);
		if (trim((string) $page->og_image) !== '') {
			$seo['og_image'] = pb_image_url($page->og_image);
		}
		if ($is_preview) {
			$seo['robots'] = 'noindex, nofollow';
		} elseif (trim((string) $page->robots) !== '') {
			$seo['robots'] = $page->robots;
		}
		// Preload the first hero image (LCP).
		foreach ($sections as $s) {
			if ($s->type === 'hero' && !empty($s->content['fields']['image'])) {
				$seo['lcp_preload_images'] = array(pb_image_url($s->content['fields']['image']));
			}
			break;
		}
		$this->seo_overrides = $seo;

		$this->output->set_status_header(200);
		$this->load->view('Pagebuilder/page', array(
			'pb_page' => $page,
			'pb_sections' => $sections,
			'pb_is_preview' => $is_preview,
		));
		return true;
	}
}
