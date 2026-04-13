<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Frontend_Controller {

  function __construct(){
		parent::__construct();
        $this->table_name="query_list";
		$this->load->model('Contact_Model');
		$this->load->helper('captcha');
	}

	private function _captcha_dir()
	{
		$dir = FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'image_for_captcha' . DIRECTORY_SEPARATOR;
		if ( ! is_dir($dir)) {
			@mkdir($dir, 0755, TRUE);
		}
		return $dir;
	}

	/**
	 * CI captcha helper omits "px" in the img style attribute; some browsers render a broken / tiny image.
	 */
	private function _fix_captcha_img_style($html)
	{
		if ($html === '' || strpos($html, '<img') === false) {
			return $html;
		}
		return preg_replace(
			'/style="width:\s*(\d+)\s*;\s*height:\s*(\d+)\s*;/',
			'style="width: ${1}px; height: ${2}px;',
			$html
		);
	}

	private function _captcha_config()
	{
		return array(
			'img_url'    => base_url('assets/image_for_captcha/'),
			'img_path'   => $this->_captcha_dir(),
			'img_width'  => 180,
			'img_height' => 52,
			'word_length'=> 5,
			'font_size'  => 5,
			'pool'       => '23456789abcdefghjkmnpqrstuvwxyz',
			'expiration' => 7200,
		);
	}

	private function _math_challenge_html($a, $b)
	{
		return '<div class="dontia-math-captcha" role="img" aria-label="Security question">'
			. '<span class="dontia-math-captcha__label">What is</span> '
			. '<strong class="dontia-math-captcha__nums">' . (int) $a . ' + ' . (int) $b . '</strong>'
			. '<span class="dontia-math-captcha__label"> ?</span>'
			. '</div>';
	}

	/**
	 * Image CAPTCHA when GD + writable folder work; otherwise arithmetic challenge (same session slot).
	 *
	 * @return array{word:string,image:string,is_math:bool}
	 */
	private function _create_captcha_safe()
	{
		$captcha = create_captcha($this->_captcha_config());
		if (is_array($captcha) && isset($captcha['word'], $captcha['image']) && $captcha['word'] !== '' && $captcha['image'] !== '') {
			$captcha['image'] = $this->_fix_captcha_img_style($captcha['image']);
			$captcha['is_math'] = false;
			return $captcha;
		}

		if (function_exists('random_int')) {
			$a = random_int(2, 9);
			$b = random_int(2, 9);
		} else {
			$a = mt_rand(2, 9);
			$b = mt_rand(2, 9);
		}
		$sum = (string) ($a + $b);

		return array(
			'word'    => $sum,
			'image'   => $this->_math_challenge_html($a, $b),
			'is_math' => true,
		);
	}

	private function _store_captcha_session(array $captcha)
	{
		$this->session->unset_userdata(array('valuecaptchaCode', 'contact_captcha_is_math'));
		$this->session->set_userdata('valuecaptchaCode', $captcha['word']);
		$this->session->set_userdata('contact_captcha_is_math', ! empty($captcha['is_math']));
	}

	private function _captcha_matches($user_input, $expected)
	{
		if ($expected === null || $expected === '') {
			return false;
		}
		$user_input = trim((string) $user_input);
		if ($this->session->userdata('contact_captcha_is_math')) {
			return (string) (int) $user_input === (string) (int) $expected;
		}
		return strtolower($user_input) === strtolower((string) $expected);
	}
    
    
    
	public function index()
	{
        $captcha = $this->_create_captcha_safe();
        $this->_store_captcha_session($captcha);
        $content['captchaImg'] = $captcha['image'];
        $content['captcha_is_math'] = ! empty($captcha['is_math']);
//         echo "<pre>";echo($this->session->userdata('valuecaptchaCode'));die;
        
        $content['banner_details']=$this->Contact_Model->GetBanner();
        $content['contact_us']=$this->Contact_Model->get_all_content();
		$content['subview']="contact_page";
//        echo "<pre>";print_r($content);die;
		$this->load->view('layout/default', $content);
	}
    
	public function contact_submit()
	{
		if (strtoupper((string) $this->input->server('REQUEST_METHOD')) !== 'POST') {
			redirect('Contact');
			return;
		}

		$captcha_in = $this->input->post('captcha');
		$captcha_ok = $this->session->userdata('valuecaptchaCode');
		if ( ! $this->_captcha_matches($captcha_in, $captcha_ok)) {
			$this->session->set_flashdata('contact_error', 'The security check did not match. Please try again.');
			redirect('Contact');
			return;
		}

		$name = trim((string) $this->input->post('name'));
		$email = trim((string) $this->input->post('email'));
		$mobile = trim((string) $this->input->post('mobile'));
		$message = trim((string) $this->input->post('message'));
		$company = trim((string) $this->input->post('company'));
		$topic = trim((string) $this->input->post('inquiry_topic'));

		if ($topic === '') {
			$this->session->set_flashdata('contact_error', 'Please choose a topic for your enquiry.');
			redirect('Contact');
			return;
		}

		if ($name === '' || $email === '' || $mobile === '' || $message === '') {
			$this->session->set_flashdata('contact_error', 'Please fill in all required fields.');
			redirect('Contact');
			return;
		}
		if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->session->set_flashdata('contact_error', 'Please enter a valid email address.');
			redirect('Contact');
			return;
		}

		$this->session->unset_userdata(array('valuecaptchaCode', 'contact_captcha_is_math'));

		$details = serialize(array($company, $topic));

		$data = array(
			'category' => 'ContactUs',
			'name' => $name,
			'email' => $email,
			'mobile' => $mobile,
			'message' => $message,
			'details' => $details,
		);

		$this->Contact_Model->insert_data($this->table_name, $data);

		$this->load->helper('common');
		$wd = $this->website['data'];
		$to = isset($wd->support_email) ? trim((string) $wd->support_email) : '';
		if ($to !== '' && filter_var($to, FILTER_VALIDATE_EMAIL)) {
			$site = isset($wd->company_name) ? (string) $wd->company_name : 'Website';
			$subject = 'Website enquiry — ' . $site;
			$msg = '<html><body style="font-family:Georgia,serif;font-size:15px;color:#333;line-height:1.5;">';
			$msg .= '<h2 style="color:#311300;margin:0 0 16px;">New contact form message</h2>';
			$msg .= '<table cellpadding="10" style="border-collapse:collapse;max-width:560px;">';
			$msg .= '<tr style="background:#faf8f7;"><td><strong>Name</strong></td><td>' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</td></tr>';
			$msg .= '<tr><td><strong>Email</strong></td><td>' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '</td></tr>';
			$msg .= '<tr style="background:#faf8f7;"><td><strong>Phone</strong></td><td>' . htmlspecialchars($mobile, ENT_QUOTES, 'UTF-8') . '</td></tr>';
			$msg .= '<tr><td><strong>Company</strong></td><td>' . htmlspecialchars($company, ENT_QUOTES, 'UTF-8') . '</td></tr>';
			$msg .= '<tr style="background:#faf8f7;"><td><strong>Topic</strong></td><td>' . htmlspecialchars($topic, ENT_QUOTES, 'UTF-8') . '</td></tr>';
			$msg .= '<tr><td valign="top"><strong>Message</strong></td><td>' . nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')) . '</td></tr>';
			$msg .= '</table></body></html>';
			dontia_send_site_email($to, $subject, $msg);
		}

		$this->session->set_flashdata('contact_success', 'Thank you. Your message has been sent. We will get back to you soon.');
		redirect('Contact');
	}
    
	public function refresh()
	{
		$captcha = $this->_create_captcha_safe();
		$this->_store_captcha_session($captcha);
		$this->output->set_content_type('text/html', 'UTF-8');
		echo $captcha['image'];
	}
    public function checkcaptch()
    {
        echo $this->session->userdata('valuecaptchaCode');
		
    }
 	
}
