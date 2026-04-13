<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hometechnology extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hometechnology_model');
	}

	public function index()
	{
		if (strtoupper($this->input->server('REQUEST_METHOD')) === 'POST') {
			$this->Hometechnology_model->save_settings(array(
				'section_title' => trim((string) $this->input->post('section_title')),
			));
			$this->session->set_flashdata('alert', array('message' => 'Latest Technology heading saved.', 'class' => 'success'));
			redirect('Hometechnology');
		}
		$content['settings'] = $this->Hometechnology_model->get_settings();
		$content['subview'] = 'hometechnology/settings';
		$this->load->view('layout', $content);
	}

	public function items()
	{
		$content['rows'] = $this->Hometechnology_model->get_items();
		$content['subview'] = 'hometechnology/item_list';
		$this->load->view('layout', $content);
	}

	public function add_item()
	{
		if (strtoupper($this->input->server('REQUEST_METHOD')) === 'POST') {
			$img = $this->Hometechnology_model->upload_image();
			if ($img === false) {
				$this->session->set_flashdata('alert', array('message' => 'Image upload failed. Use JPG, PNG, GIF, WebP or SVG (max 8MB).', 'class' => 'error'));
				redirect('Hometechnology/add_item');
				return;
			}
			$this->Hometechnology_model->insert_item(array(
				'sort_order'  => (int) $this->input->post('sort_order'),
				'title'       => trim((string) $this->input->post('title')),
				'description' => trim((string) $this->input->post('description')),
				'image_name'  => $img,
				'is_hero'     => $this->input->post('is_hero') ? 1 : 0,
				'status'      => $this->input->post('status') === 'inactive' ? 'inactive' : 'active',
			));
			$this->session->set_flashdata('alert', array('message' => 'Technology item added.', 'class' => 'success'));
			redirect('Hometechnology/items');
			return;
		}
		$content['row'] = null;
		$content['subview'] = 'hometechnology/item_form';
		$this->load->view('layout', $content);
	}

	public function edit_item()
	{
		$id = (int) $this->uri->segment(3);
		$row = $this->Hometechnology_model->get_item($id);
		if (!$row) {
			show_404();
		}
		if (strtoupper($this->input->server('REQUEST_METHOD')) === 'POST') {
			$data = array(
				'sort_order'  => (int) $this->input->post('sort_order'),
				'title'       => trim((string) $this->input->post('title')),
				'description' => trim((string) $this->input->post('description')),
				'is_hero'     => $this->input->post('is_hero') ? 1 : 0,
				'status'      => $this->input->post('status') === 'inactive' ? 'inactive' : 'active',
			);
			$new = $this->Hometechnology_model->upload_image();
			if ($new !== false) {
				if ($row->image_name !== '') {
					$old = FCPATH . 'webroot/uploads/home_technology/' . basename($row->image_name);
					if (is_file($old)) {
						@unlink($old);
					}
				}
				$data['image_name'] = $new;
			}
			$this->Hometechnology_model->update_item($id, $data);
			$this->session->set_flashdata('alert', array('message' => 'Technology item updated.', 'class' => 'success'));
			redirect('Hometechnology/items');
			return;
		}
		$content['row'] = $row;
		$content['subview'] = 'hometechnology/item_form';
		$this->load->view('layout', $content);
	}

	public function delete_item()
	{
		$id = (int) $this->uri->segment(3);
		if ($id > 0) {
			$this->Hometechnology_model->delete_item($id);
			$this->session->set_flashdata('alert', array('message' => 'Item deleted.', 'class' => 'success'));
		}
		redirect('Hometechnology/items');
	}
}
