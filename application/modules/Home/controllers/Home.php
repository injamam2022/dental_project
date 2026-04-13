<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Frontend_Controller {

  function __construct(){
		parent::__construct();
		$this->load->model('Home_Model');
	}  
    
    
    
	public function index()
	{
        $content['Services']=$this->Home_Model->GetProduct();
        $content['banner_details']=$this->Home_Model->GetBanner();
        $content['partner_details']=$this->Home_Model->GetPartner();
        $content['tes_details']=$this->Home_Model->GetTestimonial();
        $content['home_page_con']=$this->Home_Model->get_all_content();
        $content['blog_details_desc']=$this->Home_Model->GetBlogDesc();
		$content['technology_settings'] = $this->Home_Model->get_technology_settings();
		$tech_items = $this->Home_Model->get_technology_items();
		foreach ($tech_items as $t) {
			$t->image_url = $this->Home_Model->technology_image_url($t->image_name);
		}
		$content['technology_items'] = $tech_items;
		$content['subview']="home_page";
//        echo "<pre>";print_r($content);die;
		$this->load->view('layout/default', $content);
	}
 	
}
