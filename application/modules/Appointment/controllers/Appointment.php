<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Appointment_Model');
		$this->load->helper('common');
	}

	public function submit_booking()
	{
		$this->output->set_content_type('application/json');
		if (strtoupper($this->input->server('REQUEST_METHOD')) !== 'POST') {
			$this->output->set_output(json_encode(array('success' => false, 'message' => 'Invalid request.')));
			return;
		}
		$name = trim((string) $this->input->post('name'));
		$email = trim((string) $this->input->post('email'));
		$phone = trim((string) $this->input->post('phone'));
		$service_name = trim((string) $this->input->post('service_name'));
		$appointment_date = trim((string) $this->input->post('appointment_date'));
		$allowed_services = array('Skin Treatment', 'Dental', 'ENT');
		if (strlen($name) < 2) {
			$this->output->set_output(json_encode(array('success' => false, 'message' => 'Please enter your name.')));
			return;
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->output->set_output(json_encode(array('success' => false, 'message' => 'Please enter a valid email.')));
			return;
		}
		if (strlen($phone) < 7) {
			$this->output->set_output(json_encode(array('success' => false, 'message' => 'Please enter a valid phone number.')));
			return;
		}
		if (!in_array($service_name, $allowed_services, true)) {
			$this->output->set_output(json_encode(array('success' => false, 'message' => 'Please select a service.')));
			return;
		}
		$d = DateTime::createFromFormat('Y-m-d', $appointment_date);
		if (!$d || $d->format('Y-m-d') !== $appointment_date) {
			$this->output->set_output(json_encode(array('success' => false, 'message' => 'Please choose a valid appointment date.')));
			return;
		}
		$today = new DateTime('today');
		if ($d < $today) {
			$this->output->set_output(json_encode(array('success' => false, 'message' => 'Appointment date cannot be in the past.')));
			return;
		}
		$row = array(
			'name'             => $name,
			'email'            => $email,
			'phone'            => $phone,
			'pro_id'           => null,
			'service_name'     => $service_name,
			'appointment_date' => $appointment_date,
		);
		$this->Appointment_Model->insert_booking($row);
		$wd = $this->website['data'];
		$notify = '';
		if (isset($wd->appointment_notify_email) && trim((string) $wd->appointment_notify_email) !== '') {
			$notify = trim((string) $wd->appointment_notify_email);
		} elseif (isset($wd->support_email)) {
			$notify = trim((string) $wd->support_email);
		}
		if ($notify !== '' && filter_var($notify, FILTER_VALIDATE_EMAIL)) {
			$company = isset($wd->company_name) ? htmlspecialchars($wd->company_name, ENT_QUOTES, 'UTF-8') : 'Clinic';
			$subject = 'New appointment request — '.$company;
			$body = '<html><body style="font-family:sans-serif;">'
				.'<h2>New appointment request</h2>'
				.'<table cellpadding="8" style="border-collapse:collapse;">'
				.'<tr><td><strong>Name</strong></td><td>'.htmlspecialchars($name, ENT_QUOTES, 'UTF-8').'</td></tr>'
				.'<tr><td><strong>Email</strong></td><td>'.htmlspecialchars($email, ENT_QUOTES, 'UTF-8').'</td></tr>'
				.'<tr><td><strong>Phone</strong></td><td>'.htmlspecialchars($phone, ENT_QUOTES, 'UTF-8').'</td></tr>'
				.'<tr><td><strong>Service</strong></td><td>'.htmlspecialchars($service_name, ENT_QUOTES, 'UTF-8').'</td></tr>'
				.'<tr><td><strong>Date</strong></td><td>'.htmlspecialchars($appointment_date, ENT_QUOTES, 'UTF-8').'</td></tr>'
				.'</table></body></html>';
			dontia_send_site_email($notify, $subject, $body);
		}
		$this->output->set_output(json_encode(array(
			'success' => true,
			'message' => 'Thank you for your booking. We will connect with you.',
		)));
	}
}
