<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whychooseus extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Whychooseus_Model');
	}

	public function index()
	{
		$content['wcu_settings'] = $this->Whychooseus_Model->get_settings();
		$features = $this->Whychooseus_Model->get_features();
		foreach ($features as $f) {
			$f->resolved_icon_url = $this->Whychooseus_Model->feature_icon_url($f);
		}
		$content['wcu_features'] = $features;
		$content['wcu_faqs'] = $this->Whychooseus_Model->get_faqs();
		$content['wcu_banner'] = $this->Whychooseus_Model->get_banner();
		$content['subview'] = 'whychooseus_page';
		$this->load->view('layout/default', $content);
	}
}
