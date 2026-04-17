<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctormanagement extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Doctormanagement_Model');
        $this->Doctormanagement_Model->ensure_table();
    }

    public function index()
    {
        $content['doctor_list'] = $this->Doctormanagement_Model->all();
        $content['subview'] = 'doctor_list';
        $this->load->view('layout', $content);
    }

    public function add()
    {
        if (strtoupper($this->input->server('REQUEST_METHOD')) === 'POST') {
            $image = $this->Doctormanagement_Model->upload_image('uploadedimages');
            $data = array(
                'doctor_name' => trim((string) $this->input->post('doctor_name')),
                'designation' => trim((string) $this->input->post('designation')),
                'sort_order' => (int) $this->input->post('sort_order'),
                'status' => (string) $this->input->post('status') === 'inactivate' ? 'inactivate' : 'active',
                'image_name' => $image !== '' ? $image : null,
            );
            $this->Doctormanagement_Model->insert($data);
            $this->session->set_flashdata('alert', array('message' => 'Doctor added successfully', 'class' => 'success'));
            redirect('Doctormanagement');
        }
        $content['subview'] = 'add_doctor';
        $this->load->view('layout', $content);
    }

    public function edit($enc_id)
    {
        $id = decode_url($enc_id);
        $content['doctor'] = $this->Doctormanagement_Model->find($id);
        if (!$content['doctor']) {
            redirect('Doctormanagement');
        }
        $content['subview'] = 'edit_doctor';
        $this->load->view('layout', $content);
    }

    public function update()
    {
        if (strtoupper($this->input->server('REQUEST_METHOD')) !== 'POST') {
            redirect('Doctormanagement');
        }
        $id = (int) $this->input->post('id');
        $row = $this->Doctormanagement_Model->find($id);
        if (!$row) {
            redirect('Doctormanagement');
        }
        $image = $this->Doctormanagement_Model->upload_image('uploadedimages');
        $image_name = $row->image_name;
        if ($image !== '') {
            $old = FCPATH . '/webroot/uploads/doctors/' . $row->image_name;
            if (!empty($row->image_name) && is_file($old)) {
                @unlink($old);
            }
            $image_name = $image;
        }
        $data = array(
            'doctor_name' => trim((string) $this->input->post('doctor_name')),
            'designation' => trim((string) $this->input->post('designation')),
            'sort_order' => (int) $this->input->post('sort_order'),
            'status' => (string) $this->input->post('status') === 'inactivate' ? 'inactivate' : 'active',
            'image_name' => $image_name,
        );
        $this->Doctormanagement_Model->update_row($id, $data);
        $this->session->set_flashdata('alert', array('message' => 'Doctor updated successfully', 'class' => 'success'));
        redirect('Doctormanagement');
    }

    public function delete($enc_id)
    {
        $id = decode_url($enc_id);
        $row = $this->Doctormanagement_Model->find($id);
        if ($row) {
            $img = FCPATH . '/webroot/uploads/doctors/' . $row->image_name;
            if (!empty($row->image_name) && is_file($img)) {
                @unlink($img);
            }
            $this->Doctormanagement_Model->delete_row($id);
        }
        $this->session->set_flashdata('alert', array('message' => 'Doctor deleted successfully', 'class' => 'success'));
        redirect('Doctormanagement');
    }
}

