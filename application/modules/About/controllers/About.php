<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Frontend_Controller {

  function __construct(){
		parent::__construct();
		$this->load->model('About_Model');
	}  
    
    
    
	public function index()
	{
        $content['banner_details']=$this->About_Model->GetBanner();
		$content['about_page_con']=$this->About_Model->get_all_content();
		$content['subview']="about_page";
//        echo "<pre>";print_r($content);die;
		$this->load->view('layout/default', $content);
	}
 	
}
