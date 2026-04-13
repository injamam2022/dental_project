<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Frontend_Controller {

  function __construct(){
		parent::__construct();
		$this->load->model('Gallery_Model');
	}  
    
    
    
	public function index()
	{
        $content['gallery_details']=$this->Gallery_Model->GetGallery();
        $content['banner_details']=$this->Gallery_Model->GetBanner();
//        $content['about_page_con']=$this->Contact_Model->get_all_content();
		$content['subview']="gallery";
//        echo "<pre>";print_r($content);die;
		$this->load->view('layout/default', $content);
	}
 	
}
