<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Carrerpagecontent extends MY_Controller {   
	function __construct() {
	 parent::__construct();
	 $this->table_name="carrerpagecontent";
	 $this->load->model('Carrerpagecontent_Model');
	}
	public function index()
	{
		 $content['Carrerpagecontent_fatch']=$this->Carrerpagecontent_Model->all_fatch_content($this->table_name);
         $content['subview']="page";
//        echo "<pre>";print_r($content);die;
		 $this->load->view('layout', $content);
	}
	
	function update_data()
	{
		$RequestMethod=$this->input->server("REQUEST_METHOD");
//        print_r($this->input->post());die;
		if($RequestMethod == "POST"){
			$carrer_id=$this->input->post('carrer_id');
            $carrer_content = $this->input->post('carrer_content');
            
			if($_FILES['first_uploadedimages']['error'][0]>0){
               $first_image=$this->input->post('first_prev_image');
           } else { 
                $first_image=$this->Carrerpagecontent_Model->first_images_upload(); 
           }
 
            $arr=array( 
                    "carrer_content"=>($carrer_content), 
                    "carrer_image"=>($first_image)
                );
//             print_r($arr);die;   
            $this->Carrerpagecontent_Model->update_data($carrer_id,$arr,$this->table_name);	

            $this->session->set_flashdata('alert', array('message' => 'Update successfully','class' => 'success'));
            redirect('Carrerpagecontent');
						
						
					 
		}else{
			redirect('Carrerpagecontent');
		}

	}

}	