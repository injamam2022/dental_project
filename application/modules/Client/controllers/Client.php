<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends Frontend_Controller {

  function __construct(){
		parent::__construct();
		$this->load->model('Client_Model');
	}  
    
    
    
	public function index()
	{
        $content['banner_details']=$this->Client_Model->GetBanner();
        $content['partner_page_con']=$this->Client_Model->get_all_partner();
		$content['subview']="client_page";
//        echo "<pre>";print_r($content['banner_details']);die;
		$this->load->view('layout/default', $content);
	}
 	
}
