<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Homepagecontent extends MY_Controller {   
	function __construct() {
	 parent::__construct();
	 $this->table_name="homepagecontent";
	 $this->load->model('Homepagecontent_Model');
	}
	public function index()
	{
		 $content['HomepageContent_fatch']=$this->Homepagecontent_Model->all_fatch_content($this->table_name);
         $content['subview']="add_homepage_content";
//        echo "<pre>";print_r($content);die;
		 $this->load->view('layout', $content);
	}
	
	function update_data()
	{
		$RequestMethod=$this->input->server("REQUEST_METHOD");
		if($RequestMethod == "POST"){
			$id=$this->input->post('homepageContent_id');
            
            $about_content = $this->input->post('about_content');
			if($_FILES['about_uploadedimages']['error'][0]>0){
               $about_img_name=$this->input->post('about_prev_image');
           } else { 
                $about_img_name=$this->Homepagecontent_Model->about_images_upload(); 
           }

            $mission_content = $this->input->post('mission_content');
            if($_FILES['mission_uploadedimages']['error'][0]>0){
               $mission_img_name=$this->input->post('mission_prev_image');
           } else { 
                $mission_img_name=$this->Homepagecontent_Model->mission_images_upload(); 
           }
           
            $vision_content = $this->input->post('vision_content');
            if($_FILES['vision_uploadedimages']['error'][0]>0){
               $vision_img_name=$this->input->post('vision_prev_image');
           } else { 
                $vision_img_name=$this->Homepagecontent_Model->vision_images_upload(); 
           }
//					echo $about_content."--".$mission_content."--".$vision_content;die;	 
            $arr=array( 
                    array($about_content,$about_img_name), 
                    array($mission_content,$mission_img_name), 
                    array($vision_content,$vision_img_name), 
                );
            $data = array('banner_description'=>serialize($arr));
						
            $this->Homepagecontent_Model->update_data($id,$data,$this->table_name);	

            $this->session->set_flashdata('alert', array('message' => 'Update testimonial successfully','class' => 'success'));
            redirect('Homepagecontent');
						
						
					 
		}else{
			redirect('Homepagecontent');
		}

	}

}	