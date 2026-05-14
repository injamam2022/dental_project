<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Appointments_model');
	}

	public function index()
	{
		$content['rows'] = $this->Appointments_model->get_all();
		$content['subview'] = 'appointments/appointment_list';
		$this->load->view('layout', $content);
	}

	public function delete_row()
	{
		$id = (int) $this->uri->segment(3);
		if ($id > 0) {
			$this->Appointments_model->delete_by_id($id);
			// Own flash key so this toast is not confused with other admin actions on other pages
			$this->session->set_flashdata('appointments_alert', array('message' => 'Appointment deleted.', 'class' => 'success'));
		} else {
			$this->session->set_flashdata('appointments_alert', array('message' => 'Could not delete.', 'class' => 'error'));
		}
		redirect('appointments');
	}
}
