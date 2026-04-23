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
		$company_plain = isset($wd->company_name) && trim((string) $wd->company_name) !== ''
			? trim((string) $wd->company_name)
			: 'Dontia Care Clinic';
		$support_email = isset($wd->support_email) ? trim((string) $wd->support_email) : '';
		$support_phone = isset($wd->support_contact) ? trim((string) $wd->support_contact) : '';
		$address = isset($wd->address) ? trim((string) $wd->address) : '';
		$corporate_address = isset($wd->corporate_address) ? trim((string) $wd->corporate_address) : '';
		$site_url = rtrim((string) base_url(), '/');
		$tokens = array(
			'{name}' => htmlspecialchars($name, ENT_QUOTES, 'UTF-8'),
			'{email}' => htmlspecialchars($email, ENT_QUOTES, 'UTF-8'),
			'{phone}' => htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'),
			'{service_name}' => htmlspecialchars($service_name, ENT_QUOTES, 'UTF-8'),
			'{appointment_date}' => htmlspecialchars($appointment_date, ENT_QUOTES, 'UTF-8'),
			'{company_name}' => htmlspecialchars($company_plain, ENT_QUOTES, 'UTF-8'),
			'{company_email}' => htmlspecialchars($support_email, ENT_QUOTES, 'UTF-8'),
			'{company_phone}' => htmlspecialchars($support_phone, ENT_QUOTES, 'UTF-8'),
			'{company_address}' => htmlspecialchars($address, ENT_QUOTES, 'UTF-8'),
			'{company_corporate_address}' => htmlspecialchars($corporate_address, ENT_QUOTES, 'UTF-8'),
			'{website_url}' => htmlspecialchars($site_url, ENT_QUOTES, 'UTF-8'),
		);
		$notify = '';
		if (isset($wd->appointment_notify_email) && trim((string) $wd->appointment_notify_email) !== '') {
			$notify = trim((string) $wd->appointment_notify_email);
		} elseif (isset($wd->support_email)) {
			$notify = trim((string) $wd->support_email);
		}
		if ($notify !== '' && filter_var($notify, FILTER_VALIDATE_EMAIL)) {
			$subject = isset($wd->appointment_admin_subject) && trim((string) $wd->appointment_admin_subject) !== ''
				? trim((string) $wd->appointment_admin_subject)
				: 'New appointment request - {company_name}';
			$body_tpl = isset($wd->appointment_admin_body) && trim((string) $wd->appointment_admin_body) !== ''
				? (string) $wd->appointment_admin_body
				: '';
			$body = $body_tpl !== ''
				? nl2br($body_tpl)
				: '<html><body style="font-family:sans-serif;">'
				.'<h2>New appointment request</h2>'
				.'<table cellpadding="8" style="border-collapse:collapse;">'
				.'<tr><td><strong>Name</strong></td><td>{name}</td></tr>'
				.'<tr><td><strong>Email</strong></td><td>{email}</td></tr>'
				.'<tr><td><strong>Phone</strong></td><td>{phone}</td></tr>'
				.'<tr><td><strong>Service</strong></td><td>{service_name}</td></tr>'
				.'<tr><td><strong>Date</strong></td><td>{appointment_date}</td></tr>'
				.'</table>'
				.'<p><strong>Clinic contact:</strong> {company_phone} | {company_email}</p>'
				.'<p><strong>Address:</strong> {company_address}</p>'
				.'<p><strong>Corporate Address:</strong> {company_corporate_address}</p>'
				.'</body></html>';
			$subject = strtr($subject, $tokens);
			$body = strtr($body, $tokens);
			dontia_send_site_email($notify, $subject, $body);
		}
		$patient_subject = isset($wd->appointment_customer_subject) && trim((string) $wd->appointment_customer_subject) !== ''
			? trim((string) $wd->appointment_customer_subject)
			: 'Thank you for booking with {company_name}';
		$patient_tpl = isset($wd->appointment_customer_body) && trim((string) $wd->appointment_customer_body) !== ''
			? (string) $wd->appointment_customer_body
			: '';
		$patient_body = $patient_tpl !== ''
			? nl2br($patient_tpl)
			: '<html><body style="font-family:sans-serif;color:#222;">'
			.'<h2 style="margin:0 0 12px;">Thank you for your booking, '.htmlspecialchars($name, ENT_QUOTES, 'UTF-8').'!</h2>'
			.'<p style="margin:0 0 12px;">We have received your appointment request and our team will contact you shortly to confirm.</p>'
			.'<table cellpadding="8" style="border-collapse:collapse;border:1px solid #ddd;">'
			.'<tr><td style="border:1px solid #ddd;"><strong>Service</strong></td><td style="border:1px solid #ddd;">{service_name}</td></tr>'
			.'<tr><td style="border:1px solid #ddd;"><strong>Date</strong></td><td style="border:1px solid #ddd;">{appointment_date}</td></tr>'
			.'<tr><td style="border:1px solid #ddd;"><strong>Phone</strong></td><td style="border:1px solid #ddd;">{phone}</td></tr>'
			.'</table>'
			.'<p style="margin:12px 0 0;"><strong>Clinic Phone:</strong> {company_phone}</p>'
			.'<p style="margin:6px 0 0;"><strong>Clinic Email:</strong> {company_email}</p>'
			.'<p style="margin:6px 0 0;"><strong>Address:</strong> {company_address}</p>'
			.'<p style="margin:6px 0 0;"><strong>Corporate Address:</strong> {company_corporate_address}</p>'
			.'<p style="margin:12px 0 0;">Regards,<br>{company_name}</p>'
			.'</body></html>';
		$patient_subject = strtr($patient_subject, $tokens);
		$patient_body = strtr($patient_body, $tokens);
		dontia_send_site_email($email, $patient_subject, $patient_body);
		$this->output->set_output(json_encode(array(
			'success' => true,
			'message' => 'Thank you for your booking. We will connect with you.',
		)));
	}
}
