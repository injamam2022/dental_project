<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	/** @var array Per-request SEO overrides (set from controllers before layout loads). */
	public $seo_overrides = array();

     function __construct()
	 {
		 parent::__construct();
         $this->load->model(array('MY_Model'));
         
         /*--------------Start Fetch Website data---------*/
			if ($this->MY_Model->get_website_data())
			{
				$this->website['data'] = $this->MY_Model->get_website_data();
			}
			else
			{
				$field = $this->MY_Model->get_field('website_setting');
				$this->website['data'] = new stdClass();
				$this->website['data']->company_name = '';
				$this->website['data']->company_logo = '';
				foreach ($field as $val)
				{
					$this->website['data']->{$val} = '';
				}
			}
			$this->website['data']->currency_icon = '<i class="fa fa-inr"></i>';
		/*--------------END Fetch Website data---------*/
		 
	 }




}
