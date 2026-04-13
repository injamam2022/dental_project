<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Custompagecontent extends MY_Controller {   
	function __construct() {
	 parent::__construct();
	 $this->table_name="careermanagement";
	 $this->load->model('Custompagecontent_Model');
	}
	public function index()
	{
		 $content['HomepageContent_fatch']=$this->Custompagecontent_Model->all_fatch_content($this->table_name);
         $content['subview']="custompage_content_list";
		 $this->load->view('layout', $content);
	}
	
	function add_data_custom()
	{
		$RequestMethod=$this->input->server("REQUEST_METHOD");
		 if($RequestMethod == "POST"){
			 
		     
			$img_name=$this->Custompagecontent_Model->images_upload(); 
			$data=array(
			'top_title'=>$this->input->post('top_title'),
			'top_description'=>$this->input->post('top_description'),
			'list'=>$this->input->post('list'),
			'middle_title'=>$this->input->post('middle_title'),
			'middle_description'=>$this->input->post('middle_description'),
			'middle_image'=>$img_name,
			'content_near_client'=>$this->input->post('content_near_client'),
			'status'=>$this->input->post('status')
			);
			$this->Custompagecontent_Model->insert_data($this->table_name,$data);
			$this->session->set_flashdata('alert', array('message' => 'Home Page Content successfully added','class' => 'success'));
			redirect('Custompagecontent');
		 }else{
		$content['subview']="add_custompage_content";
		$this->load->view('layout', $content);
		 }
		
	}
	
	function delet_data($getid)
	{
		 $id=decode_url($getid);
		 $get_img=$this->Custompagecontent_Model->get_homepage_content($this->table_name,$id);
		
		 if($get_img){
			 $img_name=$get_img[0]->middle_image;
			 $id=$get_img[0]->id;
			 $img_file=FCPATH . '/webroot/uploads/custom/'.$img_name;
			 if(!unlink($img_file)) {} else { }
			 $this->Custompagecontent_Model->delet_single_data($this->table_name,$id);
			 $this->session->set_flashdata('alert', array('message' => 'Deleted  successfully','class' => 'success'));
			 redirect('Custompagecontent');
			 
		 }else{
			 $this->session->set_flashdata('alert', array('message' => 'Deleted  not successfull','class' => 'error'));
			 redirect('Custompagecontent');
			 
		 }
		     
	}
	
	function multi_del()
	{
		$RequestMethod=$this->input->server('REQUEST_METHOD');
		if($RequestMethod== 'POST'){
			
			foreach($_POST['checklist'] as $id){
				$get_img=$this->Custompagecontent_Model->get_homepage_content($this->table_name,$id);
				$img_name=$get_img[0]->middle_image;
			    $id=$get_img[0]->id;
			    $img_file=FCPATH . '/webroot/uploads/custom/'.$img_name;
			    if(!unlink($img_file)) {} else { }
			    $this->Custompagecontent_Model->delet_single_data($this->table_name,$id);
				
			}
			$this->session->set_flashdata('alert', array('message' => 'Deleted successfully','class' => 'success'));
			 redirect('Custompagecontent');
		}else{
			$this->session->set_flashdata('alert', array('message' => 'Not valid page','class' => 'error'));
			redirect('Custompagecontent');
		}
	
		
	}
	
	function edit_data($getid)
	{
	  $id=decode_url($getid);
	  $content['custompage_content_edit']=$this->Custompagecontent_Model->get_homepage_content($this->table_name,$id);
	  $content['subview']="edit_custompage_content";
	  $this->load->view('layout', $content); 
		
	}

	function update_data()
	{
		$RequestMethod=$this->input->server("REQUEST_METHOD");
		if($RequestMethod == "POST"){
			
			
			$id=$this->input->post('con_id');
			if($_FILES['uploadedimages']['error'][0]>0){
				   $tes_img_name=$this->input->post('prev_image');
				
				   } else { 
						$details=$this->Custompagecontent_Model->get_homepage_content($this->table_name,$id);
						$previous_name=$details[0]->middle_image;
						$p_id=$details[0]->id;  
						$img_file=FCPATH . '/webroot/uploads/custom/'.$previous_name;
						if (!unlink($img_file)) {} else { }
						$tes_img_name=$this->Custompagecontent_Model->images_upload(); 
				       }
						
						  
							$data=array(
							'top_title'=>$this->input->post('top_title'),
							'top_description'=>$this->input->post('top_description'),
							'list'=>$this->input->post('list'),
							'middle_title'=>$this->input->post('middle_title'),
							'middle_description'=>$this->input->post('middle_description'),
							'middle_image'=>$tes_img_name,
							'content_near_client'=>$this->input->post('content_near_client'),
							'status'=>$this->input->post('status')
							);
						
						$this->Custompagecontent_Model->update_data($id,$data,$this->table_name);	
							
						$this->session->set_flashdata('alert', array('message' => 'Update successfully','class' => 'success'));
			            redirect('Custompagecontent');
						
						
					 
		}else{
			redirect('Custompagecontent');
		}

	}

	function act_inactive($getid)
	{
		$id=$getid;
		$testimonial_detais=$this->Custompagecontent_Model->get_homepage_content($this->table_name,$id);
		$status=$testimonial_detais[0]->status;
		if($status=='active')
		{
			$data=array('status'=>'inactivate');
			$this->Custompagecontent_Model->update_data($id,$data,$this->table_name);	
							
		    $this->session->set_flashdata('alert', array('message' =>' status Update successfully','class' => 'success'));
			redirect('Custompagecontent');
		}else{
			$data=array('status'=>'active');
			$this->Custompagecontent_Model->update_data($id,$data,$this->table_name);	
							
		    $this->session->set_flashdata('alert', array('message' =>' status Update successfully','class' => 'success'));
			redirect('Custompagecontent');
			
		}
	}
	
	
	
}	