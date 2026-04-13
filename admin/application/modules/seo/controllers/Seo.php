<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Seo_model');
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
}
