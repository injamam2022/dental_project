<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dentalmedia extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dentalmedia_Model');
        $this->Dentalmedia_Model->ensure_table();
    }

    public function index()
    {
        $content['media_list'] = $this->Dentalmedia_Model->all();
        $content['subview'] = 'media_list';
        $this->load->view('layout', $content);
    }

    public function add()
    {
        if (strtoupper($this->input->server('REQUEST_METHOD')) === 'POST') {
            $img1 = $this->Dentalmedia_Model->upload_image('uploadedimages');
            $img2 = $this->Dentalmedia_Model->upload_image('uploadedimages2');
            $data = array(
                'section_key' => trim((string) $this->input->post('section_key')),
                'item_key' => trim((string) $this->input->post('item_key')),
                'title' => trim((string) $this->input->post('title')),
                'description' => trim((string) $this->input->post('description')),
                'image_name' => $img1 !== '' ? $img1 : null,
                'image_name_2' => $img2 !== '' ? $img2 : null,
                'sort_order' => (int) $this->input->post('sort_order'),
                'status' => (string) $this->input->post('status') === 'inactivate' ? 'inactivate' : 'active',
            );
            $this->Dentalmedia_Model->insert($data);
            $this->session->set_flashdata('alert', array('message' => 'Dental media item added', 'class' => 'success'));
            redirect('Dentalmedia');
        }
        $content['subview'] = 'add_media';
        $this->load->view('layout', $content);
    }

    public function edit($enc_id)
    {
        $id = decode_url($enc_id);
        $content['media'] = $this->Dentalmedia_Model->find($id);
        if (!$content['media']) {
            redirect('Dentalmedia');
        }
        $content['subview'] = 'edit_media';
        $this->load->view('layout', $content);
    }

    public function update()
    {
        if (strtoupper($this->input->server('REQUEST_METHOD')) !== 'POST') {
            redirect('Dentalmedia');
        }
        $id = (int) $this->input->post('id');
        $row = $this->Dentalmedia_Model->find($id);
        if (!$row) {
            redirect('Dentalmedia');
        }
        $img1 = $this->Dentalmedia_Model->upload_image('uploadedimages');
        $img2 = $this->Dentalmedia_Model->upload_image('uploadedimages2');
        $image_name = $img1 !== '' ? $img1 : $row->image_name;
        $image_name_2 = $img2 !== '' ? $img2 : $row->image_name_2;
        $data = array(
            'section_key' => trim((string) $this->input->post('section_key')),
            'item_key' => trim((string) $this->input->post('item_key')),
            'title' => trim((string) $this->input->post('title')),
            'description' => trim((string) $this->input->post('description')),
            'image_name' => $image_name,
            'image_name_2' => $image_name_2,
            'sort_order' => (int) $this->input->post('sort_order'),
            'status' => (string) $this->input->post('status') === 'inactivate' ? 'inactivate' : 'active',
        );
        $this->Dentalmedia_Model->update_row($id, $data);
        $this->session->set_flashdata('alert', array('message' => 'Dental media item updated', 'class' => 'success'));
        redirect('Dentalmedia');
    }

    public function delete($enc_id)
    {
        $id = decode_url($enc_id);
        $this->Dentalmedia_Model->delete_row($id);
        $this->session->set_flashdata('alert', array('message' => 'Dental media item deleted', 'class' => 'success'));
        redirect('Dentalmedia');
    }
}

