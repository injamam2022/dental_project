<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gallery extends MY_Controller {
	function __construct() {
	 parent::__construct();
	 
	 $this->load->model('Gallery_Model');
	}
	public function index()
	{
		  $content['Banner_fatch']=$this->Gallery_Model->all_fatch_banner();
          $content['subview']="gallery/gallery/bannerlist";
		  $this->load->view('layout', $content);
	}       
	
	function add_gallery()  
	{
		$RequestMethod=$this->input->server("REQUEST_METHOD");
		 if($RequestMethod == "POST"){
			 
			$banner_img_name=$this->Gallery_Model->banner_images_upload(); 
			$data=array(
			'image_seo_title'=>$this->input->post('image_seo_title'),
			'youtube_url_link'=>$this->input->post('youtube_url_link'),
			'image_category'=>$this->input->post('image_category'),
			'image_name'=>$banner_img_name,
			'status'=>$this->input->post('status')
			
			);
			$this->Gallery_Model->insert_banner($data);
			$this->session->set_flashdata('alert', array('message' => 'Add Gallery successfully','class' => 'success'));
			redirect('gallery');
		 }else{
		$content['subview']="gallery/gallery/addbanner";
		$this->load->view('layout', $content);
		 }
		
	}
	
	function delet_banner($getid)
	{
		 $id=decode_url($getid);
		 $get_img=$this->Gallery_Model->get_banner($id);
		
		 if($get_img){
			 $img_name=$get_img[0]->image_name;
			 $id=$get_img[0]->id;
			 $img_file=FCPATH . '/webroot/uploads/banner/'.$img_name;
			 if(!unlink($img_file)) {} else { }
			 $this->Gallery_Model->delet_banner_single($id);
			 $this->session->set_flashdata('alert', array('message' => 'Add Gallery successfully','class' => 'success'));
			 redirect('gallery');
			 
		 }else{
			 $this->session->set_flashdata('alert', array('message' => 'Add Gallery successfully','class' => 'error'));
			 redirect('gallery');
			 
		 }
		 
	}
	
	function multi_banner_del()
	{
		$RequestMethod=$this->input->server('REQUEST_METHOD');
		if($RequestMethod== 'POST'){
			
			foreach($_POST['checklist'] as $id){
				$get_img=$this->Gallery_Model->get_banner($id);
				$img_name=$get_img[0]->image_name;
			    $id=$get_img[0]->id;
			    $img_file=FCPATH . '/webroot/uploads/banner/'.$img_name;
			    if(!unlink($img_file)) {} else { }
			    $this->Gallery_Model->delet_banner_single($id);
				
			}
			$this->session->set_flashdata('alert', array('message' => 'Add Gallery successfully','class' => 'success'));
			 redirect('gallery');
		}else{
			$this->session->set_flashdata('alert', array('message' => 'Not valid page','class' => 'error'));
			redirect('gallery');
		}
	
		
	}
	
	function edit_banner($getid)
	{
	  $id=decode_url($getid);
	  $content['banner_edit']=$this->Gallery_Model->get_banner($id);
	  $content['subview']="gallery/gallery/editbanner";
	  $this->load->view('layout', $content); 
		
	}
	function update_banner()
	{
		$RequestMethod=$this->input->server("REQUEST_METHOD");
		if($RequestMethod == "POST"){
			
			
			$id=$this->input->post('banner_id');
			if($_FILES['uploadedimages']['error'][0]>0){
				   $banner_img_name=$this->input->post('prev_image');
				
				   } else {
						$banner_detais=$this->Gallery_Model->get_banner($id);
						$previous_name=$banner_detais[0]->image_name;
						$p_id=$banner_detais[0]->id; 
						$img_file=FCPATH . '/webroot/uploads/banner/'.$previous_name;
						if (!unlink($img_file)) {} else { }
						$banner_img_name=$this->Gallery_Model->banner_images_upload(); 
				       }
						
						$data=array(
						'image_seo_title'=>$this->input->post('image_seo_title'),
						'image_category'=>$this->input->post('image_category'),
						'youtube_url_link'=>$this->input->post('youtube_url_link'),
						'image_name'=>$banner_img_name,
						'status'=>$this->input->post('status')
			
			              );
						
						$this->Gallery_Model->update_banners($id,$data);	
							
						$this->session->set_flashdata('alert', array('message' => 'Update Gallery successfully','class' => 'success'));
			            redirect('gallery');
						
						
					 
		}else{
			redirect('gallery');
		}

	}

	function banner_act_inactive($getid)
	{
		$id=$getid;
		$banner_detais=$this->Gallery_Model->get_banner($id);
		$status=$banner_detais[0]->status;
		if($status=='active')
		{
			$data=array('status'=>'inactivate');
			$this->Gallery_Model->update_banners($id,$data);	
							
		    $this->session->set_flashdata('alert', array('message' =>'Gallery status Update successfully','class' => 'success'));
			redirect('gallery');
		}else{
			$data=array('status'=>'active');
			$this->Gallery_Model->update_banners($id,$data);	
							
		    $this->session->set_flashdata('alert', array('message' =>'Gallery status Update successfully','class' => 'success'));
			redirect('gallery');
			
		}
	}
	
	
	
}	