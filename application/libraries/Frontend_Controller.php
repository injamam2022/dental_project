<?php class Frontend_Controller extends MY_Controller{




	function __construct(){

		parent::__construct();

		$this->load->helper('Common');
		$this->load->model('MY_Model');
		if(($this->session->userdata('userinfo_login_details')!==NULL))
		{
			$this->website['loginuser']=$this->MY_Model->loginuser();

		}

		/* Website data is loaded in MY_Controller; keep a short alias for views/controllers */
		$wd = $this->website['data'];
		$this->CompanyName = (is_object($wd) && property_exists($wd, 'company_name'))
			? $wd->company_name
			: '';
	}

	/**
	 * Render a Page Builder page for $raw_slug (one URL segment).
	 * Returns false when there is no page to show, so the caller can fall back
	 * (to a 404, or to the existing hand-coded page on the same URL).
	 * Drafts are shown only with a valid ?preview= token from the admin.
	 */
	protected function pb_render_builder_page($raw_slug, $allow_case_redirect = true)
	{
		$raw_slug = trim((string) $raw_slug, '/');
		if ($raw_slug === '' || !preg_match('/^[A-Za-z0-9-]+$/', $raw_slug)) {
			return false;
		}
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
		if ($allow_case_redirect && $raw_slug !== $slug && !$is_preview) {
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
		// Preload the hero image when the page starts with one (LCP).
		if (!empty($sections) && $sections[0]->type === 'hero' && !empty($sections[0]->content['fields']['image'])) {
			$seo['lcp_preload_images'] = array(pb_image_url($sections[0]->content['fields']['image']));
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
