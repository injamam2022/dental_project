<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client_review extends MY_Controller {   
	function __construct() {
	 parent::__construct();
	 $this->table_name="client_review";
	 $this->load->model('Client_Model');
	}
	public function index()
	{
		 $content['HomepageContent_fatch']=$this->Client_Model->all_fatch_content($this->table_name);
         $content['subview']="client_list";
		 $this->load->view('layout', $content);
	}
	
	function add_data()
	{
		$RequestMethod=$this->input->server("REQUEST_METHOD");
		 if($RequestMethod == "POST"){
			 
		     
		
			$data=array(
			'client_name'=>$this->input->post('name'),
			'client_message'=>$this->input->post('message'),
			'status'=>$this->input->post('status')
			);
			$this->Client_Model->insert_data($this->table_name,$data);
			$this->session->set_flashdata('alert', array('message' => ' successfully added','class' => 'success'));
			redirect('Client_review');
		 }else{
			$content['subview']="add_message";
			$this->load->view('layout', $content);
		 }
		
	}
	
	function delet_data($getid)
	{
		 $id=decode_url($getid);
		 $get_img=$this->Client_Model->get_homepage_content($this->table_name,$id);
		
		
			 $this->Client_Model->delet_single_data($this->table_name,$id);
			 $this->session->set_flashdata('alert', array('message' => 'Deleted  successfully','class' => 'success'));
			 redirect('Client_review');
			 
		     
	}
	
	function multi_del()
	{
		$RequestMethod=$this->input->server('REQUEST_METHOD');
		if($RequestMethod== 'POST'){
			
			foreach($_POST['checklist'] as $id){
				
			    $this->Client_Model->delet_single_data($this->table_name,$id);
				
			}
			$this->session->set_flashdata('alert', array('message' => 'Deleted successfully','class' => 'success'));
			 redirect('Client_review');
		}else{
			$this->session->set_flashdata('alert', array('message' => 'Not valid page','class' => 'error'));
			redirect('Client_review');
		}
	
		
	}
	
	function edit_data($getid)
	{
	  $id=decode_url($getid);
	  $content['content_edit']=$this->Client_Model->get_homepage_content($this->table_name,$id);
	  $content['subview']="edit_message";
	  $this->load->view('layout', $content); 
		
	}

	function update_data()
	{
		$RequestMethod=$this->input->server("REQUEST_METHOD");
		if($RequestMethod == "POST"){
			
			
			$id=$this->input->post('con_id');
		
							
			$data=array(
				'client_name'=>$this->input->post('name'),
				'client_message'=>$this->input->post('message'),
				'status'=>$this->input->post('status')
				);
						
						$this->Client_Model->update_data($id,$data,$this->table_name);	
							
						$this->session->set_flashdata('alert', array('message' => 'Update successfully','class' => 'success'));
			            redirect('Client_review');
									 
		}
		else{
			redirect('Client_review');
		}

	}

	function act_inactive($getid)
	{
		$id=$getid;
		$testimonial_detais=$this->Client_Model->get_homepage_content($this->table_name,$id);
		$status=$testimonial_detais[0]->status;
		if($status=='active')
		{
			$data=array('status'=>'inactivate');
			$this->Client_Model->update_data($id,$data,$this->table_name);	
							
		    $this->session->set_flashdata('alert', array('message' =>' status Update successfully','class' => 'success'));
			redirect('Client_review');
		}else{
			$data=array('status'=>'active');
			$this->Client_Model->update_data($id,$data,$this->table_name);	
							
		    $this->session->set_flashdata('alert', array('message' =>' status Update successfully','class' => 'success'));
			redirect('Client_review');
			
		}
	}
	
	
	
}	