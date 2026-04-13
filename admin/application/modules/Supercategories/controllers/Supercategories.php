<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Supercategories extends MY_Controller {
	
	function __construct() {		
		     parent::__construct();
			 $this->table_name="super_categories";
			 $this->load->model("SuperCategories_Model");
			 
		}
		public function index()
	{
		 $content['sup_cat_fatch']=$this->SuperCategories_Model->all_fatch_sup_category();
         $content['subview']="list_supercategories";
		 $this->load->view('layout', $content);
	}

		
		function add_supercategories(){
                    
                  // printarray($_REQUEST);
                  // die();
		         
		        $RequestMethod = $this->input->server('REQUEST_METHOD');
				if($RequestMethod == "POST")
			    {
					$super_cat_img_name=$this->SuperCategories_Model->super_cat_images_upload(); 
   					
					  $data=array(
                                    
                                    'cat_id'=>$this->input->post('cat'),
                                    'subcat_id'=>$this->input->post('subcat'),
                                    'supercat_name'=>$this->input->post('cat_name'),
                                    'description'=>$this->input->post('cat_desc'),
                                    'meta_tag'=>$this->input->post('meta_tag'),
                                    'meta_desc'=>$this->input->post('meta_desc'),
                                    'status'=>$this->input->post('status'),
                                    'cat_image'=>$super_cat_img_name,
					             );
/*					  printarray($data);
					  die();*/
				   
		           $this->SuperCategories_Model->insert_data($this->table_name,$data);
                      $this->session->set_flashdata('alert', array('message' => 'Data successfully Saved','class' => 'success'));
	              redirect('Supercategories');	
				}
				else{
				    $content['sup_cat_list']=$this->SuperCategories_Model->get_category();
                    $content['subview']="add_supercategories";
                    $this->load->view('layout', $content);		
				}
				
		}


    function delet_supercategories($getid)
	{
		 $id=decode_url($getid);
		 $get_img=$this->SuperCategories_Model->get_data($id);
		
		 if($get_img){
			 $img_name=$get_img[0]->cat_image;
			 $id=$get_img[0]->super_catid;
			 $img_file=FCPATH . '/webroot/uploads/super_cat/'.$img_name;
			 if(!unlink($img_file)) {} else { }
			 $this->SuperCategories_Model->delete_data($id);
			 $this->session->set_flashdata('alert', array('message' => 'Deleted category successfully','class' => 'success'));
			 redirect('Supercategories');
			 
		 }else{
			 $this->session->set_flashdata('alert', array('message' => 'Deleted category successfully','class' => 'error'));
			 redirect('Supercategories');
			 
		 }
		 
	}

	function multi_cat_del()
	{
		$RequestMethod=$this->input->server('REQUEST_METHOD');
		if($RequestMethod== 'POST'){
			
			foreach($_POST['checklist'] as $id){
				$get_img=$this->SuperCategories_Model->get_data($id);
				$img_name=$get_img[0]->cat_image;
			    $id=$get_img[0]->super_catid;
			    $img_file=FCPATH . '/webroot/uploads/super_cat/'.$img_name;
			    if(!unlink($img_file)) {} else { }
			    $this->SuperCategories_Model->delete_data($id);
				
			}
			$this->session->set_flashdata('alert', array('message' => 'Add banner successfully','class' => 'success'));
			 redirect('Supercategories');
		}else{
			$this->session->set_flashdata('alert', array('message' => 'Not valid page','class' => 'error'));
			redirect('Supercategories');
		}
	
		
	}


		
       
	function edit_supercategories($getid)
	{
	  $id=decode_url($getid);
      $content['sup_cat_list']=$this->SuperCategories_Model->get_category();
      $content['subcat_list']=$this->SuperCategories_Model->get_subcategory();
	  $content['cat_edit']=$this->SuperCategories_Model->get_data($id);
	  $content['subview']="edit_supercategories";
//        echo "<pre>";print_r($content);die;
	  $this->load->view('layout', $content); 
		
	}
	function update_supercategories()
	{
		$RequestMethod=$this->input->server("REQUEST_METHOD");
		if($RequestMethod == "POST"){
			
			
			$id=$this->input->post('cat_id');
			if($_FILES['uploadedimages']['error'][0]>0){
				   $category_img_name=$this->input->post('prev_image');
				
				   } else {
						$category_detais=$this->SuperCategories_Model->get_data($id);
						$previous_name=$category_detais[0]->cat_image;
						$p_id=$category_detais[0]->super_catid; 
						$img_file=FCPATH . '/webroot/uploads/super_cat/'.$previous_name;
						if (!unlink($img_file)) {} else { }
						$category_img_name=$this->SuperCategories_Model->super_cat_images_upload(); 
				       }
						
						$data=array(
                                    'cat_id'=>$this->input->post('cat'),
                                    'subcat_id'=>$this->input->post('subcat'),
						            'supercat_name'=>$this->input->post('cat_name'),
                                    'description'=>$this->input->post('cat_desc'),
                                    'meta_tag'=>$this->input->post('meta_tag'),
                                    'meta_desc'=>$this->input->post('meta_desc'),
                                    'status'=>$this->input->post('status'),
                                    'cat_image'=>$category_img_name,
					            
			
			              );
						
						$this->SuperCategories_Model->update_data($id,$data);	
							
						$this->session->set_flashdata('alert', array('message' => 'Update banner successfully','class' => 'success'));
			            redirect('Supercategories');
						
						
					 
		}else{
			redirect('Supercategories');
		}

	}

	function supercategories_act_inactive($getid)
	{
		$id=$getid;
		$category_detais=$this->SuperCategories_Model->get_data($id);
		$status=$category_detais[0]->status;
		if($status=='active')
		{
			$data=array('status'=>'inactivate');
			$this->SuperCategories_Model->update_data($id,$data);	
							
		    $this->session->set_flashdata('alert', array('message' =>'Category status Update successfully','class' => 'success'));
			redirect('Supercategories');
		}else{
			$data=array('status'=>'active');
			$this->SuperCategories_Model->update_data($id,$data);	
							
		    $this->session->set_flashdata('alert', array('message' =>'Category status Update successfully','class' => 'success'));
			redirect('Supercategories');
			
		}
	}
	
	         
       
		
		
	  
	
	
}	