<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Testimonial extends MY_Controller {
	function __construct() {
	 parent::__construct();
	 
	 $this->load->model('Testimonial_Model');
	}
	public function index()
	{
		$content['Testimonial_fatch']=$this->Testimonial_Model->all_fatch_testimonial();
         $content['subview']="testimonial_list";
		 $this->load->view('layout', $content);
	}
	
	function add_testimonial()
	{
		$RequestMethod=$this->input->server("REQUEST_METHOD");
		 if($RequestMethod == "POST"){
			 
			$tes_img_name=$this->Testimonial_Model->testimonial_images_upload(); 
			$data=array(
			'test_title'=>$this->input->post('title'),
			'tes_description'=>$this->input->post('des'),
			'image_name'=>$tes_img_name,
			'rating'=>$this->input->post('rating'),
			'client_name'=>$this->input->post('client_name'),
			'status'=>$this->input->post('status')
			
			);
			$this->Testimonial_Model->insert_testimonial($data);
			$this->session->set_flashdata('alert', array('message' => 'Testimonial successfully added','class' => 'success'));
			redirect('Testimonial');
		 }else{
		$content['subview']="add_testimonial";
		$this->load->view('layout', $content);
		 }
		
	}
	
	function delet_testimonial($getid)
	{
		 $id=decode_url($getid);
		 $get_img=$this->Testimonial_Model->get_testimonial($id);
		
		 if($get_img){
			 $img_name=$get_img[0]->image_name;
			 $id=$get_img[0]->tes_id;
			 $img_file=FCPATH . '/webroot/uploads/testimonial/'.$img_name;
			 if(!unlink($img_file)) {} else { }
			 $this->Testimonial_Model->delet_testimonial_single($id);
			 $this->session->set_flashdata('alert', array('message' => 'Deleted testimonial successfully','class' => 'success'));
			 redirect('Testimonial');
			 
		 }else{
			 $this->session->set_flashdata('alert', array('message' => 'Deleted testimonial successfully','class' => 'error'));
			 redirect('Testimonial');
			 
		 }
		     
	}
	
	function multi_tes_del()
	{
		$RequestMethod=$this->input->server('REQUEST_METHOD');
		if($RequestMethod== 'POST'){
			
			foreach($_POST['checklist'] as $id){
				$get_img=$this->Testimonial_Model->get_testimonial($id);
				$img_name=$get_img[0]->image_name;
			    $id=$get_img[0]->tes_id;
			    $img_file=FCPATH . '/webroot/uploads/testimonial/'.$img_name;
			    if(!unlink($img_file)) {} else { }
			    $this->Testimonial_Model->delet_testimonial_single($id);
				
			}
			$this->session->set_flashdata('alert', array('message' => 'Deleted testimonial successfully','class' => 'success'));
			 redirect('Testimonial');
		}else{
			$this->session->set_flashdata('alert', array('message' => 'Not valid page','class' => 'error'));
			redirect('Testimonial');
		}
	
		
	}
	
	function edit_testimonial($getid)
	{
	  $id=decode_url($getid);
	  $content['testimonial_edit']=$this->Testimonial_Model->get_testimonial($id);
	  $content['subview']="edit_testimonial";
	  $this->load->view('layout', $content); 
		
	}
	function update_testimonial()
	{
		$RequestMethod=$this->input->server("REQUEST_METHOD");
		if($RequestMethod == "POST"){
			
			
			$id=$this->input->post('testimonial_id');
			if($_FILES['uploadedimages']['error'][0]>0){
				   $tes_img_name=$this->input->post('prev_image');
				
				   } else { 
						$testimonial_detais=$this->Testimonial_Model->get_testimonial($id);
						$previous_name=$testimonial_detais[0]->image_name;
						$p_id=$testimonial_detais[0]->id;  
						$img_file=FCPATH . '/webroot/uploads/testimonial/'.$previous_name;
						if (!unlink($img_file)) {} else { }
						$tes_img_name=$this->Testimonial_Model->testimonial_images_upload(); 
				       }
						
						$data=array(
						'test_title'=>$this->input->post('title'),
						'tes_description'=>$this->input->post('des'),
						'image_name'=>$tes_img_name,
						'rating'=>$this->input->post('rating'),
						'client_name'=>$this->input->post('client_name'),
						'status'=>$this->input->post('status')
			
			              );
						
						$this->Testimonial_Model->update_testimonial($id,$data);	
							
						$this->session->set_flashdata('alert', array('message' => 'Update testimonial successfully','class' => 'success'));
			            redirect('Testimonial');
						
						
					 
		}else{
			redirect('Testimonial');
		}

	}

	function testimonial_act_inactive($getid)
	{
		$id=$getid;
		$testimonial_detais=$this->Testimonial_Model->get_testimonial($id);
		$status=$testimonial_detais[0]->status;
		if($status=='active')
		{
			$data=array('status'=>'inactivate');
			$this->Testimonial_Model->update_testimonial($id,$data);	
							
		    $this->session->set_flashdata('alert', array('message' =>'Testimonial status Update successfully','class' => 'success'));
			redirect('Testimonial');
		}else{
			$data=array('status'=>'active');
			$this->Testimonial_Model->update_testimonial($id,$data);	
							
		    $this->session->set_flashdata('alert', array('message' =>'Testimonial status Update successfully','class' => 'success'));
			redirect('Testimonial');
			
		}
	}
	
	
	
}	