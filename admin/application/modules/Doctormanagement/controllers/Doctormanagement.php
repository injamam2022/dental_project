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

    public function import_template()
    {
        $result = $this->Doctormanagement_Model->import_template_doctors();
        $msg = 'Template doctors: ' . (int) $result['inserted'] . ' added, ' . (int) $result['updated'] . ' updated.';
        if (!empty($result['errors'])) {
            $msg .= ' Issues: ' . implode('; ', $result['errors']);
        }
        $class = empty($result['errors']) ? 'success' : 'warning';
        $this->session->set_flashdata('alert', array('message' => $msg, 'class' => $class));
        redirect('Doctormanagement');
    }

    public function add()
    {
        if (strtoupper($this->input->server('REQUEST_METHOD')) === 'POST') {
            $name = trim((string) $this->input->post('doctor_name'));
            $designation = trim((string) $this->input->post('designation'));
            if ($name === '' || $designation === '') {
                $this->session->set_flashdata('alert', array('message' => 'Doctor name and designation are required.', 'class' => 'danger'));
                redirect('Doctormanagement/add');
            }
            $upload = $this->Doctormanagement_Model->upload_image('doctor_image');
            if (!$upload['ok']) {
                $this->session->set_flashdata('alert', array('message' => 'Image upload failed: ' . $upload['error'], 'class' => 'danger'));
                redirect('Doctormanagement/add');
            }
            $data = array(
                'doctor_name' => $name,
                'designation' => $designation,
                'sort_order' => (int) $this->input->post('sort_order'),
                'status' => (string) $this->input->post('status') === 'inactivate' ? 'inactivate' : 'active',
                'image_name' => $upload['file'] !== '' ? $upload['file'] : null,
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
        $upload = $this->Doctormanagement_Model->upload_image('doctor_image');
        if (!$upload['ok']) {
            $this->session->set_flashdata('alert', array('message' => 'Image upload failed: ' . $upload['error'], 'class' => 'danger'));
            redirect('Doctormanagement/edit/' . encode_url($id));
        }
        $image_name = $row->image_name;
        if ($upload['file'] !== '') {
            $old = rtrim(FCPATH, '/\\') . DIRECTORY_SEPARATOR . 'webroot' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'doctors' . DIRECTORY_SEPARATOR . $row->image_name;
            if (!empty($row->image_name) && is_file($old)) {
                @unlink($old);
            }
            $image_name = $upload['file'];
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
            $img = rtrim(FCPATH, '/\\') . DIRECTORY_SEPARATOR . 'webroot' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'doctors' . DIRECTORY_SEPARATOR . $row->image_name;
            if (!empty($row->image_name) && is_file($img)) {
                @unlink($img);
            }
            $this->Doctormanagement_Model->delete_row($id);
        }
        $this->session->set_flashdata('alert', array('message' => 'Doctor deleted successfully', 'class' => 'success'));
        redirect('Doctormanagement');
    }
}

