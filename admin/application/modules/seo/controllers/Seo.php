<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Seo_model');
		$this->load->model('Seo_redirect_model');
		$this->load->helper('seo_redirect');
		$this->Seo_redirect_model->ensure_table();
	}

	public function index()
	{
		$content['rows'] = $this->Seo_model->get_all();
		$content['subview'] = 'seo/seo_list';
		$this->load->view('layout', $content);
	}

	public function edit()
	{
		$id = (int) $this->uri->segment(3);
		$row = $this->Seo_model->get_by_id($id);
		if ( ! $row) {
			$this->session->set_flashdata('alert', array('message' => 'SEO record not found. Import database/seo_meta_migration.sql.', 'class' => 'warning'));
			redirect('seo');
			return;
		}

		if (strtoupper((string) $this->input->server('REQUEST_METHOD')) === 'POST') {
			$data = array(
				'meta_title' => $this->input->post('meta_title', true),
				'meta_description' => $this->input->post('meta_description', true),
				'meta_keyword' => $this->input->post('meta_keyword', true),
				'og_title' => $this->input->post('og_title', true),
				'og_description' => $this->input->post('og_description', true),
				'og_image' => $this->input->post('og_image', true),
				'twitter_card' => $this->input->post('twitter_card', true),
				'robots' => $this->input->post('robots', true),
				'canonical_url' => $this->input->post('canonical_url', true),
				'head_scripts' => $this->input->post('head_scripts', false),
			);
			$this->Seo_model->update_row($id, $data);
			$this->session->set_flashdata('alert', array('message' => 'SEO settings saved.', 'class' => 'success'));
			redirect('seo');
			return;
		}

		$content['row'] = $row;
		$content['subview'] = 'seo/seo_edit';
		$this->load->view('layout', $content);
	}

	/** Yoast-style 301 / redirect manager */
	public function redirects()
	{
		$content['rows'] = $this->Seo_redirect_model->get_all();
		$content['subview'] = 'seo/redirect_list';
		$this->load->view('layout', $content);
	}

	public function redirect_add()
	{
		if (strtoupper((string) $this->input->server('REQUEST_METHOD')) === 'POST') {
			$this->save_redirect(0);
			return;
		}
		$content['row'] = null;
		$content['subview'] = 'seo/redirect_edit';
		$this->load->view('layout', $content);
	}

	public function redirect_edit()
	{
		$id = (int) $this->uri->segment(3);
		$row = $this->Seo_redirect_model->get_by_id($id);
		if ( ! $row) {
			$this->session->set_flashdata('alert', array('message' => 'Redirect not found.', 'class' => 'warning'));
			redirect('seo/redirects');
			return;
		}
		if (strtoupper((string) $this->input->server('REQUEST_METHOD')) === 'POST') {
			$this->save_redirect($id);
			return;
		}
		$content['row'] = $row;
		$content['subview'] = 'seo/redirect_edit';
		$this->load->view('layout', $content);
	}

	public function redirect_delete()
	{
		$id = (int) $this->uri->segment(3);
		$this->Seo_redirect_model->delete_row($id);
		$this->session->set_flashdata('alert', array('message' => 'Redirect deleted.', 'class' => 'success'));
		redirect('seo/redirects');
	}

	protected function save_redirect($id)
	{
		$id = (int) $id;
		$source = seo_redirect_normalize_path($this->input->post('source_url', true));
		$target = trim((string) $this->input->post('target_url', true));
		$http_code = (int) $this->input->post('http_code');
		$allowed_codes = array(301, 302, 307, 410);
		if ( ! in_array($http_code, $allowed_codes, true)) {
			$http_code = 301;
		}
		$status = $this->input->post('status') === 'inactive' ? 'inactive' : 'active';
		$notes = trim((string) $this->input->post('notes', true));

		if ($source === '') {
			$this->session->set_flashdata('alert', array('message' => 'Old URL (source) is required.', 'class' => 'danger'));
			redirect($id > 0 ? 'seo/redirect_edit/' . $id : 'seo/redirect_add');
			return;
		}
		if ($http_code !== 410 && $target === '') {
			$this->session->set_flashdata('alert', array('message' => 'New URL (target) is required unless using 410 Gone.', 'class' => 'danger'));
			redirect($id > 0 ? 'seo/redirect_edit/' . $id : 'seo/redirect_add');
			return;
		}
		if ($http_code !== 410) {
			if (preg_match('#^https?://#i', $target)) {
				// keep full URL as entered
			} else {
				$target = seo_redirect_normalize_path($target);
			}
		} else {
			$target = '';
		}
		if ($http_code !== 410 && $source === seo_redirect_normalize_path($target)) {
			$this->session->set_flashdata('alert', array('message' => 'Source and target cannot be the same path.', 'class' => 'danger'));
			redirect($id > 0 ? 'seo/redirect_edit/' . $id : 'seo/redirect_add');
			return;
		}
		if ($this->Seo_redirect_model->source_exists($source, $id)) {
			$this->session->set_flashdata('alert', array('message' => 'A redirect for that old URL already exists.', 'class' => 'danger'));
			redirect($id > 0 ? 'seo/redirect_edit/' . $id : 'seo/redirect_add');
			return;
		}

		$data = array(
			'source_url' => $source,
			'target_url' => $target,
			'http_code' => $http_code,
			'status' => $status,
			'notes' => $notes,
		);
		if ($id > 0) {
			$this->Seo_redirect_model->update_row($id, $data);
			$this->session->set_flashdata('alert', array('message' => 'Redirect updated.', 'class' => 'success'));
		} else {
			$this->Seo_redirect_model->insert_row($data);
			$this->session->set_flashdata('alert', array('message' => 'Redirect added.', 'class' => 'success'));
		}
		redirect('seo/redirects');
	}
}
