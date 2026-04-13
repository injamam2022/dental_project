<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whychooseus extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Whychooseus_model');
	}

	public function index()
	{
		if (strtoupper($this->input->server('REQUEST_METHOD')) === 'POST') {
			$this->Whychooseus_model->save_settings(array(
				'main_heading' => $this->input->post('main_heading'),
				'intro_text'   => $this->input->post('intro_text'),
				'faq_heading'  => $this->input->post('faq_heading'),
			));
			$this->session->set_flashdata('alert', array('message' => 'Why Choose Us settings saved.', 'class' => 'success'));
			redirect('Whychooseus');
		}
		$content['settings'] = $this->Whychooseus_model->get_settings();
		$content['subview'] = 'whychooseus/settings';
		$this->load->view('layout', $content);
	}

	public function features()
	{
		$content['rows'] = $this->Whychooseus_model->get_features();
		$content['subview'] = 'whychooseus/feature_list';
		$this->load->view('layout', $content);
	}

	public function add_feature()
	{
		if (strtoupper($this->input->server('REQUEST_METHOD')) === 'POST') {
			$this->Whychooseus_model->insert_feature(array(
				'sort_order'  => (int) $this->input->post('sort_order'),
				'icon_path'   => trim((string) $this->input->post('icon_path')),
				'title'       => trim((string) $this->input->post('title')),
				'description' => trim((string) $this->input->post('description')),
				'status'      => $this->input->post('status') === 'inactive' ? 'inactive' : 'active',
			));
			$this->session->set_flashdata('alert', array('message' => 'Feature added.', 'class' => 'success'));
			redirect('Whychooseus/features');
		}
		$content['subview'] = 'whychooseus/feature_form';
		$content['row'] = null;
		$this->load->view('layout', $content);
	}

	public function edit_feature()
	{
		$id = (int) $this->uri->segment(3);
		$row = $this->Whychooseus_model->get_feature($id);
		if (!$row) {
			show_404();
		}
		if (strtoupper($this->input->server('REQUEST_METHOD')) === 'POST') {
			$this->Whychooseus_model->update_feature($id, array(
				'sort_order'  => (int) $this->input->post('sort_order'),
				'icon_path'   => trim((string) $this->input->post('icon_path')),
				'title'       => trim((string) $this->input->post('title')),
				'description' => trim((string) $this->input->post('description')),
				'status'      => $this->input->post('status') === 'inactive' ? 'inactive' : 'active',
			));
			$this->session->set_flashdata('alert', array('message' => 'Feature updated.', 'class' => 'success'));
			redirect('Whychooseus/features');
		}
		$content['subview'] = 'whychooseus/feature_form';
		$content['row'] = $row;
		$this->load->view('layout', $content);
	}

	public function delete_feature()
	{
		$id = (int) $this->uri->segment(3);
		if ($id > 0) {
			$this->Whychooseus_model->delete_feature($id);
			$this->session->set_flashdata('alert', array('message' => 'Feature deleted.', 'class' => 'success'));
		}
		redirect('Whychooseus/features');
	}

	public function faq()
	{
		$content['rows'] = $this->Whychooseus_model->get_faqs();
		$content['subview'] = 'whychooseus/faq_list';
		$this->load->view('layout', $content);
	}

	public function add_faq()
	{
		if (strtoupper($this->input->server('REQUEST_METHOD')) === 'POST') {
			$this->Whychooseus_model->insert_faq(array(
				'sort_order' => (int) $this->input->post('sort_order'),
				'question'   => trim((string) $this->input->post('question')),
				'answer'     => $this->input->post('answer'),
				'status'     => $this->input->post('status') === 'inactive' ? 'inactive' : 'active',
			));
			$this->session->set_flashdata('alert', array('message' => 'FAQ added.', 'class' => 'success'));
			redirect('Whychooseus/faq');
		}
		$content['subview'] = 'whychooseus/faq_form';
		$content['row'] = null;
		$this->load->view('layout', $content);
	}

	public function edit_faq()
	{
		$id = (int) $this->uri->segment(3);
		$row = $this->Whychooseus_model->get_faq($id);
		if (!$row) {
			show_404();
		}
		if (strtoupper($this->input->server('REQUEST_METHOD')) === 'POST') {
			$this->Whychooseus_model->update_faq($id, array(
				'sort_order' => (int) $this->input->post('sort_order'),
				'question'   => trim((string) $this->input->post('question')),
				'answer'     => $this->input->post('answer'),
				'status'     => $this->input->post('status') === 'inactive' ? 'inactive' : 'active',
			));
			$this->session->set_flashdata('alert', array('message' => 'FAQ updated.', 'class' => 'success'));
			redirect('Whychooseus/faq');
		}
		$content['subview'] = 'whychooseus/faq_form';
		$content['row'] = $row;
		$this->load->view('layout', $content);
	}

	public function delete_faq()
	{
		$id = (int) $this->uri->segment(3);
		if ($id > 0) {
			$this->Whychooseus_model->delete_faq($id);
			$this->session->set_flashdata('alert', array('message' => 'FAQ deleted.', 'class' => 'success'));
		}
		redirect('Whychooseus/faq');
	}
}
