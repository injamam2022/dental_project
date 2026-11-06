<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Page Builder — create pages from reusable sections (hero, text, cards, FAQ, map ...).
 * Pages are served on the public site at /<slug> (see application/modules/Seo_redirect).
 */
class Pagebuilder extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('pagebuilder_admin');
		$this->load->model('Pagebuilder_Model', 'pb');
	}

	/* ================= Pages ================= */

	public function index()
	{
		$content['pages'] = $this->pb->all_pages();
		$content['subview'] = 'page_list';
		$this->load->view('layout', $content);
	}

	public function create()
	{
		if ($this->is_post()) {
			$title = trim((string) $this->input->post('title'));
			$slug = pb_slugify($this->input->post('slug') !== '' ? $this->input->post('slug') : $title);
			$error = $this->slug_error($slug);
			if ($title === '') {
				$error = 'Please enter a page title.';
			}
			if ($error === '') {
				$id = $this->pb->insert_page(array(
					'title' => $title,
					'slug' => $slug,
					'meta_title' => $title,
					'status' => 'draft',
				));
				$this->alert('Page created. Now add sections to build it.');
				redirect('Pagebuilder/edit/' . $id);
			}
			$this->alert($error, 'error');
		}
		$content['subview'] = 'page_create';
		$this->load->view('layout', $content);
	}

	public function edit($id = 0)
	{
		$page = $this->page_or_back($id);
		$sections = $this->pb->sections($page->id);
		$content['page'] = $page;
		$content['sections'] = $sections;
		$content['types'] = pb_section_types();
		$content['public_url'] = pb_page_url($page->slug);
		$content['preview_url'] = pb_page_url($page->slug) . '?preview=' . pb_preview_token($page->id);
		$content['subview'] = 'page_edit';
		$this->load->view('layout', $content);
	}

	public function save_page()
	{
		$this->require_post();
		$page = $this->page_or_back($this->input->post('id'));
		$slug = pb_slugify($this->input->post('slug'));
		$error = $this->slug_error($slug, $page->id);
		$title = trim((string) $this->input->post('title'));
		if ($title === '') {
			$error = 'Page title cannot be empty.';
		}
		if ($error !== '') {
			$this->alert($error, 'error');
			redirect('Pagebuilder/edit/' . $page->id);
		}
		$og = $this->pb->upload_image('file_og_image');
		if ($og === false) {
			$this->alert('Share image not uploaded: ' . $this->pb->upload_error, 'error');
			$og = '';
		}
		$robots = (string) $this->input->post('robots');
		$this->pb->update_page($page->id, array(
			'title' => $title,
			'slug' => $slug,
			'meta_title' => trim((string) $this->input->post('meta_title')),
			'meta_description' => trim((string) $this->input->post('meta_description')),
			'meta_keywords' => trim((string) $this->input->post('meta_keywords')),
			'og_image' => $og !== '' ? $og : trim((string) $this->input->post('og_image')),
			'robots' => in_array($robots, array('', 'noindex, follow', 'noindex, nofollow'), true) ? $robots : '',
			'status' => $this->input->post('status') === 'published' ? 'published' : 'draft',
		));
		if ($og !== false) {
			$this->alert('Page settings saved.');
		}
		redirect('Pagebuilder/edit/' . $page->id);
	}

	public function duplicate_page()
	{
		$this->require_post();
		$page = $this->page_or_back($this->input->post('id'));
		$new_id = $this->pb->duplicate_page($page->id);
		$this->alert('Page duplicated as a draft. Change its URL slug before publishing.');
		redirect('Pagebuilder/edit/' . $new_id);
	}

	public function delete_page()
	{
		$this->require_post();
		$page = $this->page_or_back($this->input->post('id'));
		$this->pb->delete_page($page->id);
		$this->alert('Page "' . $page->title . '" deleted.');
		redirect('Pagebuilder');
	}

	/* ================= Sections ================= */

	public function add_section()
	{
		$this->require_post();
		$page = $this->page_or_back($this->input->post('page_id'));
		$type = (string) $this->input->post('type');
		$types = pb_section_types();
		if (!isset($types[$type])) {
			$this->alert('Unknown section type.', 'error');
			redirect('Pagebuilder/edit/' . $page->id);
		}
		$defaults = pb_decode_data($type, '{}');
		$json = json_encode($defaults, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

		$sort = null;
		$after = $this->pb->find_section($this->input->post('after'));
		if ($after && (int) $after->page_id === (int) $page->id) {
			$sort = (int) $after->sort_order + 5;
		}
		$id = $this->pb->insert_section($page->id, $type, $types[$type]['label'], $json, $sort, 1);
		if ($sort !== null) {
			$this->normalize_order($page->id);
		}
		redirect('Pagebuilder/edit_section/' . $id);
	}

	public function edit_section($id = 0)
	{
		$section = $this->section_or_back($id);
		$page = $this->page_or_back($section->page_id);
		$types = pb_section_types();
		$content['page'] = $page;
		$content['section'] = $section;
		$content['type'] = $types[$section->type];
		$content['fields'] = pb_type_fields($section->type);
		$content['data'] = pb_decode_data($section->type, $section->data);
		$content['preview_url'] = pb_page_url($page->slug) . '?preview=' . pb_preview_token($page->id) . '#'
			. (trim((string) $content['data']['fields']['anchor']) !== '' ? pb_slugify($content['data']['fields']['anchor']) : 'pb-page-' . $page->id);
		$content['subview'] = 'section_edit';
		$this->load->view('layout', $content);
	}

	public function save_section()
	{
		$this->require_post();
		$section = $this->section_or_back($this->input->post('id'));
		$type = $section->type;
		$types = pb_section_types();
		$errors = array();

		// Section fields
		$post_f = $this->input->post('f');
		$post_f = is_array($post_f) ? $post_f : array();
		$fields = array();
		foreach (pb_type_fields($type) as $fd) {
			$fields[$fd['key']] = $this->clean_value($fd, isset($post_f[$fd['key']]) ? $post_f[$fd['key']] : '', 'file_f_' . $fd['key'], $errors);
		}

		// Repeatable items, kept in the order they were posted (= order on screen)
		$items = array();
		if (!empty($types[$type]['items'])) {
			$post_items = $this->input->post('items');
			$post_items = is_array($post_items) ? $post_items : array();
			foreach ($post_items as $uid => $row) {
				$uid = preg_replace('/[^a-z0-9]/i', '', (string) $uid);
				$row = is_array($row) ? $row : array();
				$item = array();
				$has_content = false;
				foreach ($types[$type]['items']['fields'] as $fd) {
					$v = $this->clean_value($fd, isset($row[$fd['key']]) ? $row[$fd['key']] : '', 'file_i_' . $uid . '_' . $fd['key'], $errors);
					$item[$fd['key']] = $v;
					if ($fd['type'] !== 'select' && trim(strip_tags($v)) !== '') {
						$has_content = true;
					}
				}
				if ($has_content) {
					$items[] = $item;
				}
			}
		}

		$label = trim((string) $this->input->post('admin_label'));
		$this->pb->update_section($section->id, array(
			'admin_label' => $label !== '' ? $label : $types[$type]['label'],
			'is_active' => $this->input->post('is_active') ? 1 : 0,
			'data' => json_encode(array('fields' => $fields, 'items' => $items), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
		));
		$this->pb->touch_page($section->page_id);

		if (!empty($errors)) {
			$this->alert('Saved, but some images could not be uploaded: ' . implode(' | ', $errors), 'error');
		} else {
			$this->alert('Section saved.');
		}
		if ($this->input->post('after_save') === 'page') {
			redirect('Pagebuilder/edit/' . $section->page_id . '#sec-' . $section->id);
		}
		redirect('Pagebuilder/edit_section/' . $section->id);
	}

	public function toggle_section()
	{
		$this->require_post();
		$section = $this->section_or_back($this->input->post('id'));
		$this->pb->update_section($section->id, array('is_active' => $section->is_active ? 0 : 1));
		$this->pb->touch_page($section->page_id);
		if ($this->input->is_ajax_request()) {
			return $this->json(array('ok' => true, 'is_active' => $section->is_active ? 0 : 1));
		}
		redirect('Pagebuilder/edit/' . $section->page_id . '#sec-' . $section->id);
	}

	public function duplicate_section()
	{
		$this->require_post();
		$section = $this->section_or_back($this->input->post('id'));
		$new_id = $this->pb->duplicate_section($section->id);
		$this->alert('Section duplicated (hidden until you switch it on).');
		redirect('Pagebuilder/edit/' . $section->page_id . '#sec-' . $new_id);
	}

	public function delete_section()
	{
		$this->require_post();
		$section = $this->section_or_back($this->input->post('id'));
		$this->pb->delete_section($section->id);
		$this->pb->touch_page($section->page_id);
		$this->alert('Section deleted.');
		redirect('Pagebuilder/edit/' . $section->page_id);
	}

	/** AJAX: save drag-and-drop order. POST page_id, ids[] */
	public function sort_sections()
	{
		$this->require_post();
		$page = $this->pb->find_page($this->input->post('page_id'));
		$ids = $this->input->post('ids');
		if (!$page || !is_array($ids)) {
			return $this->json(array('ok' => false));
		}
		$this->pb->reorder_sections($page->id, array_map('intval', $ids));
		return $this->json(array('ok' => true));
	}

	/* ================= Internals ================= */

	protected function clean_value(array $fd, $raw, $file_field, array &$errors)
	{
		$v = is_string($raw) ? $raw : '';
		switch ($fd['type']) {
			case 'select':
				return isset($fd['options'][$v]) ? $v : (isset($fd['default']) ? (string) $fd['default'] : '');
			case 'image':
				$up = $this->pb->upload_image($file_field);
				if ($up === false) {
					$errors[] = $this->pb->upload_error;
					return trim($v);
				}
				return $up !== '' ? $up : trim($v);
			case 'richtext':
				$v = trim($v);
				return trim(strip_tags($v, '<img><iframe>')) === '' ? '' : $v;
			case 'code':
			case 'textarea':
				return trim(str_replace("\r\n", "\n", $v));
			default:
				return trim($v);
		}
	}

	protected function normalize_order($page_id)
	{
		$ids = array();
		foreach ($this->pb->sections($page_id) as $s) {
			$ids[] = (int) $s->id;
		}
		$this->pb->reorder_sections($page_id, $ids);
	}

	protected function slug_error($slug, $except_id = 0)
	{
		if ($slug === '') {
			return 'Please enter a URL slug (letters, numbers and dashes).';
		}
		if (strlen($slug) > 180) {
			return 'The URL slug is too long (max 180 characters).';
		}
		if (in_array($slug, pb_reserved_slugs(), true)) {
			return 'The URL "' . $slug . '" is already used by another page on the website. Please choose a different slug.';
		}
		if ($this->pb->slug_taken($slug, $except_id)) {
			return 'Another Page Builder page already uses the URL "' . $slug . '".';
		}
		return '';
	}

	protected function page_or_back($id)
	{
		$page = $this->pb->find_page((int) $id);
		if (!$page) {
			$this->alert('Page not found.', 'error');
			redirect('Pagebuilder');
		}
		return $page;
	}

	protected function section_or_back($id)
	{
		$section = $this->pb->find_section((int) $id);
		$types = pb_section_types();
		if (!$section || !isset($types[$section->type])) {
			$this->alert('Section not found.', 'error');
			redirect('Pagebuilder');
		}
		return $section;
	}

	protected function is_post()
	{
		return strtoupper((string) $this->input->server('REQUEST_METHOD')) === 'POST';
	}

	protected function require_post()
	{
		if (!$this->is_post()) {
			redirect('Pagebuilder');
		}
	}

	protected function alert($message, $class = 'success')
	{
		$this->session->set_flashdata('alert', array('message' => $message, 'class' => $class));
	}

	protected function json(array $data)
	{
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}
