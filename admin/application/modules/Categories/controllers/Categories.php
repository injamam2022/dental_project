<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categories extends MY_Controller {
	
	function __construct() {		
		     parent::__construct();
			 $this->table_name="categories";
			 $this->load->model("Categories_Model");
			 
		}
		public function index()
	{
		 $content['sup_cat_fatch']=$this->Categories_Model->all_fatch_sup_category();
		 $content['sup_cat_list']=$this->Categories_Model->get_supercat();
         $content['subview']="list_categories";
		 $this->load->view('layout', $content);
	}

		
		function add_categories(){
                    
                  
		         
		        $RequestMethod = $this->input->server('REQUEST_METHOD');
				if($RequestMethod == "POST")
			    {
					$super_cat_img_name=$this->Categories_Model->super_cat_images_upload(); 
   					
					  $data=array(
                                    
                                    'cat_name'=>$this->input->post('cat_name'),
                                    'description'=>$this->input->post('cat_desc'),
                                    'meta_tag'=>$this->input->post('meta_tag'),
                                    'meta_desc'=>$this->input->post('meta_desc'),
                                    'status'=>$this->input->post('status'),
                                    'super_catid'=>0,
                                    'cat_image'=>$super_cat_img_name,
					             );

				   
		           $this->Categories_Model->insert_data($this->table_name,$data);
                   $this->session->set_flashdata('alert', array('message' => 'Data successfully Saved','class' => 'success'));
	              redirect('Categories');	
				}
				else{
				     

				    $content['sup_cat_list']=$this->Categories_Model->get_supercat();
                    $content['subview']="add_categories";
                    $this->load->view('layout', $content);		
				}
				
		}


    function delet_categories($getid)
	{
		 $id=decode_url($getid);
		 $get_img=$this->Categories_Model->get_data($id);
		
		 if($get_img){
			 $img_name=$get_img[0]->cat_image;
			 $id=$get_img[0]->cat_id;
			 $img_file=FCPATH . '/webroot/uploads/cat/'.$img_name;
			 if(!unlink($img_file)) {} else { }
			 $this->Categories_Model->delete_data($id);
			 $this->session->set_flashdata('alert', array('message' => 'Deleted category successfully','class' => 'success'));
			 redirect('Categories');
			 
		 }else{
			 $this->session->set_flashdata('alert', array('message' => 'Deleted category successfully','class' => 'error'));
			 redirect('Categories');
			 
		 }
		 
	}

	function multi_cat_del()
	{
		$RequestMethod=$this->input->server('REQUEST_METHOD');
		if($RequestMethod== 'POST'){
			
			foreach($_POST['checklist'] as $id){
				$get_img=$this->Categories_Model->get_data($id);
				$img_name=$get_img[0]->cat_image;
			    $id=$get_img[0]->cat_id;
			    $img_file=FCPATH . '/webroot/uploads/super_cat/'.$img_name;
			    if(!unlink($img_file)) {} else { }
			    $this->Categories_Model->delete_data($id);
				
			}
			$this->session->set_flashdata('alert', array('message' => 'Add category successfully','class' => 'success'));
			 redirect('Categories');
		}else{
			$this->session->set_flashdata('alert', array('message' => 'Not valid page','class' => 'error'));
			redirect('Categories');
		}
	
		
	}


		
       
	function edit_categories($getid)
	{
	  $id=decode_url($getid);
	  $content['cat_edit']=$this->Categories_Model->get_data($id);
      $content['sup_cat_list']=$this->Categories_Model->get_supercat();
	  $content['subview']="edit_categories";
	  $this->load->view('layout', $content); 
		
	}

	function update_categories()
	{
		$RequestMethod=$this->input->server("REQUEST_METHOD");
		if($RequestMethod == "POST"){
			
			
			$id=$this->input->post('cat_id');
			if($_FILES['uploadedimages']['error'][0]>0){
				   $category_img_name=$this->input->post('prev_image');
				
				   } else {
						$category_detais=$this->Categories_Model->get_data($id);
						$previous_name=$category_detais[0]->cat_image;
						$p_id=$category_detais[0]->cat_id; 
						$img_file=FCPATH . '/webroot/uploads/cat/'.$previous_name;
						if (!unlink($img_file)) {} else { }
						$category_img_name=$this->Categories_Model->super_cat_images_upload(); 
				       }
						
						$data=array(
						            'cat_name'=>$this->input->post('cat_name'),
                                    'description'=>$this->input->post('cat_desc'),
                                    'meta_tag'=>$this->input->post('meta_tag'),
                                    'meta_desc'=>$this->input->post('meta_desc'),
                                    'status'=>$this->input->post('status'),
                                    'cat_image'=>$category_img_name,
                                    'super_catid'=>$this->input->post('sup_cat'),
					            
			
			              );
						
						
						$this->Categories_Model->update_data($id,$data);	
							
						$this->session->set_flashdata('alert', array('message' => 'Update category successfully','class' => 'success'));
			            redirect('Categories');
						
						
					 
		}else{
			redirect('Categories');
		}

	}

	function categories_act_inactive($getid)
	{
		$id=$getid;
		$category_detais=$this->Categories_Model->get_data($id);
		$status=$category_detais[0]->status;
		if($status=='active')
		{
			$data=array('status'=>'inactivate');
			$this->Categories_Model->update_data($id,$data);	
							
		    $this->session->set_flashdata('alert', array('message' =>'Category status Update successfully','class' => 'success'));
			redirect('Categories');
		}else{
			$data=array('status'=>'active');
			$this->Categories_Model->update_data($id,$data);	
							
		    $this->session->set_flashdata('alert', array('message' =>'Category status Update successfully','class' => 'success'));
			redirect('Categories');
			
		}
	}
	
	         
       
		
		
	  
	
	
}	