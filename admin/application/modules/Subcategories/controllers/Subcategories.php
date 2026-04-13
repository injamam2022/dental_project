<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subcategories extends MY_Controller {
	
	function __construct() {		
		     parent::__construct();
			 $this->table_name="sub_categories";
			 $this->load->model("SubCategories_Model");
			 
		}
		public function index()
	{
		 $content['sup_cat_fatch']=$this->SubCategories_Model->all_fatch_sup_category();
		 $content['sup_cat_list']=$this->SubCategories_Model->get_supercat();
         $content['subview']="list_subcategories";
		 $this->load->view('layout', $content);
	}

		
		function add_subcategories(){
                    
                  // printarray($_REQUEST);
                  // die();
		         
		        $RequestMethod = $this->input->server('REQUEST_METHOD');
				if($RequestMethod == "POST")
			    {
					$super_cat_img_name=$this->SubCategories_Model->super_cat_images_upload(); 
   					
					  $data=array(
                                    
                                    'subcat_name'=>$this->input->post('cat_name'),
                                    'description'=>$this->input->post('cat_desc'),
                                    'meta_tag'=>$this->input->post('meta_tag'),
                                    'meta_desc'=>$this->input->post('meta_desc'),
                                    'status'=>$this->input->post('status'),
                                    'cat_id'=>$this->input->post('sup_cat'),
                                    'cat_image'=>$super_cat_img_name,
					             );
/*					  printarray($data);
					  die();*/
				   
		           $this->SubCategories_Model->insert_data($this->table_name,$data);
                      $this->session->set_flashdata('alert', array('message' => 'Data successfully Saved','class' => 'success'));
	              redirect('Subcategories');	
				}
				else{
				     

				    $content['sup_cat_list']=$this->SubCategories_Model->get_supercat();
                    $content['subview']="add_subcategories";
                    $this->load->view('layout',$content);		
				}
				
		}


    function delet_subcategories($getid)
	{
		 $id=decode_url($getid);
		 $get_img=$this->SubCategories_Model->get_data($id);
		
		 if($get_img){
			 $img_name=$get_img[0]->cat_image;
			 $id=$get_img[0]->sub_catid;
			 $img_file=FCPATH . '/webroot/uploads/sub_cat/'.$img_name;
			 if(!unlink($img_file)) {} else { }
			 $this->SubCategories_Model->delete_data($id);
			 $this->session->set_flashdata('alert', array('message' => 'Deleted category successfully','class' => 'success'));
			 redirect('Subcategories');
			 
		 }else{
			 $this->session->set_flashdata('alert', array('message' => 'Deleted category successfully','class' => 'error'));
			 redirect('Subcategories');
			 
		 }
		 
	}

	function multi_cat_del()
	{
		$RequestMethod=$this->input->server('REQUEST_METHOD');
		if($RequestMethod== 'POST'){
			
			foreach($_POST['checklist'] as $id){
				$get_img=$this->SubCategories_Model->get_data($id);
				$img_name=$get_img[0]->cat_image;
			    $id=$get_img[0]->sub_catid;
			    $img_file=FCPATH . '/webroot/uploads/sub_cat/'.$img_name;
			    if(!unlink($img_file)) {} else { }
			    $this->SubCategories_Model->delete_data($id);
				
			}
			$this->session->set_flashdata('alert', array('message' => 'Add category successfully','class' => 'success'));
			 redirect('Subcategories');
		}else{
			$this->session->set_flashdata('alert', array('message' => 'Not valid page','class' => 'error'));
			redirect('Subcategories');
		}
	
		
	}


		
       
	function edit_subcategories($getid)
	{
	  $id=decode_url($getid);
	  $content['cat_edit']=$this->SubCategories_Model->get_data($id);
      $content['sup_cat_list']=$this->SubCategories_Model->get_supercat();
	  $content['subview']="edit_subcategories";
	  $this->load->view('layout', $content); 
		
	}

	function update_subcategories()
	{
		$RequestMethod=$this->input->server("REQUEST_METHOD");
		if($RequestMethod == "POST"){
			
			
			$id=$this->input->post('subcat_id');
			if($_FILES['uploadedimages']['error'][0]>0){
				   $category_img_name=$this->input->post('prev_image');
				
				   } else {
						$category_detais=$this->SubCategories_Model->get_data($id);
						$previous_name=$category_detais[0]->cat_image;
						$p_id=$category_detais[0]->sub_catid; 
						$img_file=FCPATH . '/webroot/uploads/sub_cat/'.$previous_name;
						if (!unlink($img_file)) {} else { }
						$category_img_name=$this->SubCategories_Model->super_cat_images_upload(); 
				       }
						
						$data=array(
						            'subcat_name'=>$this->input->post('cat_name'),
                                    'description'=>$this->input->post('cat_desc'),
                                    'meta_tag'=>$this->input->post('meta_tag'),
                                    'meta_desc'=>$this->input->post('meta_desc'),
                                    'status'=>$this->input->post('status'),
                                    'cat_image'=>$category_img_name,
                                    'cat_id'=>$this->input->post('sup_cat'),
					            
			
			              );
						
						
						$this->SubCategories_Model->update_data($id,$data);	
							
						$this->session->set_flashdata('alert', array('message' => 'Update category successfully','class' => 'success'));
			            redirect('Subcategories');
						
						
					 
		}else{
			redirect('Subcategories');
		}

	}

	function subcategories_act_inactive($getid)
	{
		$id=$getid;
		$category_detais=$this->SubCategories_Model->get_data($id);
		$status=$category_detais[0]->status;
		if($status=='active')
		{
			$data=array('status'=>'inactivate');
			$this->SubCategories_Model->update_data($id,$data);	
							
		    $this->session->set_flashdata('alert', array('message' =>'Category status Update successfully','class' => 'success'));
			redirect('Subcategories');
		}else{
			$data=array('status'=>'active');
			$this->SubCategories_Model->update_data($id,$data);	
							
		    $this->session->set_flashdata('alert', array('message' =>'Category status Update successfully','class' => 'success'));
			redirect('Subcategories');
			
		}
	}
	
	         
       
		
		
	  
	
	
}	