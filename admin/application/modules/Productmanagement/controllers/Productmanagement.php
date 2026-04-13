<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productmanagement extends MY_Controller {
	
	function __construct() {		
		     parent::__construct();
			 $this->table_name="product_master";
			 $this->load->model("ProductManagement_Model");
			 
		}
		public function index()
	{
         $content['sub_cat_list']=$this->ProductManagement_Model->get_all_subcat();
         $content['cat_list']=$this->ProductManagement_Model->get_all_cat();
		 $content['products']=$this->ProductManagement_Model->fetch_all_products($this->table_name);
         $content['subview']="product_list";
		 $this->load->view('layout', $content);
	}
    
     public function catwisesubcat()
    {   
        $scat = $this->input->post('scat');

       $response=$this->ProductManagement_Model ->Get_subcat($scat);
      
       echo json_encode($response);
        
    }
    
    public function subcat_wise_subsub()
    {   
        $scat = $this->input->post('scat');

       $response=$this->ProductManagement_Model ->Get_sub_subcat($scat);
      
       echo json_encode($response);
        
    }
    
    public function cat()
    {   
        $scat = $this->input->post('scat');

       $response=$this->ProductManagement_Model ->Get_subcat($scat);
      
       echo json_encode($response);
        
    }
		
		function add_products(){
                    
               
                  
		        $content['sub_cat_list']=$this->ProductManagement_Model->get_all_subcat();
                $content['categories']=$this->ProductManagement_Model->get_service_categories();
		        $RequestMethod = $this->input->server('REQUEST_METHOD');
				if($RequestMethod == "POST")
			    {
					$product_images=$this->ProductManagement_Model->product_images_upload(); 
					$product_icon=$this->ProductManagement_Model->product_icon_upload();
					if ($product_icon === false) {
						$product_icon = '';
					}

					$subcat = $this->input->post('subcat_id');
					$subsub = $this->input->post('sub_subcat_id');
					$pro_sub = ($subcat === '' || $subcat === null || (int) $subcat === 0) ? null : (int) $subcat;
					$pro_subsub = ($subsub === '' || $subsub === null) ? 0 : (int) $subsub;

					  $data=array(
                                    
                                    'product_name'=>$this->input->post('product_name'),
                                    'cat_id'=>(int) $this->input->post('cat_id'),
                                    'pro_sub_cat_id'=>$pro_sub,
                                    'product_sub_sub_catid'=>$pro_subsub,
                                    'product_description'=>$this->input->post('product_description'),
                                    'product_code'=>$this->input->post('product_code'),
                                    'citation'=>$this->input->post('citation'),
                                    'no_of_words'=>$this->input->post('no_of_words'),
                                    'price_of_doc'=>$this->input->post('price_of_doc'),
                                    'discount_apply'=>$this->input->post('discount_apply'),
                                    'meta_tag'=>$this->input->post('meta_tag'),
                                    'meta_title'=>$this->input->post('meta_title'),
                                    'page_title'=>$this->input->post('page_title'),
                                    'meta_description'=>$this->input->post('meta_description'),
                                    'status'=>$this->input->post('status'),
                                    'pro_image'=>$product_images,
                                    'icon'=>$product_icon,
                                    'domain'=>$this->input->post('domain'),
                                    'type'=>$this->input->post('type'),
                                    'color'=>$this->input->post('color'),
                                    'quantity'=>$this->input->post('quantity'),
                                    'terms'=>$this->input->post('terms'),
                                    'gsm'=>$this->input->post('gsm'),
                                    'others'=>$this->input->post('others')
					             );
                                  /*printarray($data);
                                  die();*/
				   
		              $this->ProductManagement_Model->insert_data($this->table_name,$data);
                      $this->session->set_flashdata('alert', array('message' => 'Service saved successfully','class' => 'success'));
	                  redirect('Productmanagement');	
				}
				else{
				   
                    $content['subview']="add_products";
                    $this->load->view('layout', $content);		
				}
				
		}


    function delet_products($getid)
	{
		 $id=decode_url($getid);
		 $get_img=$this->ProductManagement_Model->get_data($id,$this->table_name);
		
		 if($get_img){
			 $img_name=$get_img[0]->pro_image;
			 $id=$get_img[0]->pro_id;
			 $img_file=FCPATH . '/webroot/uploads/product/'.$img_name;
			 if(!unlink($img_file)) {} else { }
			 $this->ProductManagement_Model->delete_data($id,$this->table_name);
			 $this->session->set_flashdata('alert', array('message' => 'Service deleted successfully','class' => 'success'));
			 redirect('Productmanagement');
			 
		 }else{
			 $this->session->set_flashdata('alert', array('message' => 'Could not delete service','class' => 'error'));
			 redirect('Productmanagement');
			 
		 }
		 
	}

	function multi_pro_del()
	{
		$RequestMethod=$this->input->server('REQUEST_METHOD');
		if($RequestMethod== 'POST'){
			
			foreach($_POST['checklist'] as $id){
				$get_img=$this->ProductManagement_Model->get_data($id,$this->table_name);
				$img_name=$get_img[0]->pro_image;
			    $id=$get_img[0]->pro_id;
              /*  echo $id;
                die();*/
			    $img_file=FCPATH . '/webroot/uploads/product/'.$img_name;
			    if(!unlink($img_file)) {} else { }
			    $this->ProductManagement_Model->delete_data($id,$this->table_name);
				
			}
			$this->session->set_flashdata('alert', array('message' => 'Selected services deleted successfully','class' => 'success'));
			 redirect('Productmanagement');
		}else{
			$this->session->set_flashdata('alert', array('message' => 'Not valid page','class' => 'error'));
			redirect('Productmanagement');
		}
	
		
	}


		
       
	function edit_product($getid)
	{
	  $id=decode_url($getid);
     /* $content['sub_cat_list']=$this->ProductManagement_Model->get_all_subcat();
      $content['cat']=$this->ProductManagement_Model->get_all_cat();
      $content['cat_list']=$this->ProductManagement_Model->get_all_categories_subcategories_join();*/
	  $content['product_edit']=$this->ProductManagement_Model->get_data($id,$this->table_name);
      $content['categories_asas']=$this->ProductManagement_Model->get_service_categories();
      $content['sub_cat_list']=$this->ProductManagement_Model->get_all_subcat();
      $content['sub_subcat_list']=$this->ProductManagement_Model->get_all_subsubcat();
       // printarray($content['categories_asas']);
	  $content['subview']="edit_product";
	  $this->load->view('layout', $content); 
		
	}
	function update_product()
	{
        
     
		$RequestMethod=$this->input->server("REQUEST_METHOD");
		if($RequestMethod == "POST"){
			
			
			$id=$this->input->post('product_id');
			if($_FILES['uploadedimages']['error'][0]>0){
				   $product_img_name=$this->input->post('prev_image_multipal');
				
				   } else {
						$product_detais=$this->ProductManagement_Model->get_data($id,$this->table_name);
						$previous_name=$product_detais[0]->pro_image;
						$p_id=$product_detais[0]->pro_id; 
						$img_file=FCPATH . '/webroot/uploads/product/'.$previous_name;
						if (!unlink($img_file)) {} else { }
						$product_img_name=$this->ProductManagement_Model->product_images_upload(); 
				       }
						

			
			if($_FILES['icon']['error'][0]>0){
				   $product_icon_name=$this->input->post('prev_image');
				
				   } else {
						/*$product_detais=$this->ProductManagement_Model->get_data($id,$this->table_name);
                        printarray($product_detais);
						$previous_name=$product_detais[0]->icon;
						$p_id=$product_detais[0]->pro_id; 
						$img_file=FCPATH . '/webroot/uploads/product_icon/'.$previous_name;
						if (!unlink($img_file)) {} else { }*/
					    $product_icon_name=$this->ProductManagement_Model->product_icon_upload(); 
				       }
					if ($product_icon_name === false) {
						$product_icon_name = $this->input->post('prev_image');
					}

					$subcat = $this->input->post('subcat_id');
					$subsub = $this->input->post('sub_subcat_id');
					$pro_sub = ($subcat === '' || $subcat === null || (int) $subcat === 0) ? null : (int) $subcat;
					$pro_subsub = ($subsub === '' || $subsub === null) ? 0 : (int) $subsub;

						$data=array(
						            'product_name'=>$this->input->post('product_name'),
                                    'product_sub_sub_catid'=>$pro_subsub,
                                    'cat_id'=>(int) $this->input->post('cat_id'),
                                    'pro_sub_cat_id'=>$pro_sub,
                                    'meta_title'=>$this->input->post('meta_title'),
                                    'product_description'=>$this->input->post('product_description'),
                                    'product_code'=>$this->input->post('product_code'),
                                    'citation'=>$this->input->post('citation'),
                                    'no_of_words'=>$this->input->post('no_of_words'),
                                    'price_of_doc'=>$this->input->post('price_of_doc'),
                                    'discount_apply'=>$this->input->post('discount_apply'),
                                    'meta_tag'=>$this->input->post('meta_tag'),
                                    'meta_description'=>$this->input->post('meta_description'),
                                    'page_title'=>$this->input->post('page_title'),
                                    'pro_image'=>$product_img_name,
                                    'status'=>$this->input->post('status'),
                                    'citation'=>$this->input->post('citation'),
                                    'icon'=>$product_icon_name,
                                    'domain'=>$this->input->post('domain'),
                                    'type'=>$this->input->post('type'),
                                   'color'=>$this->input->post('color'),
                                    'quantity'=>$this->input->post('quantity'),
                                    'terms'=>$this->input->post('terms'),
                                    'gsm'=>$this->input->post('gsm'),
                                    'others'=>$this->input->post('others')
                                   
			              );

						//printarray($_FILES['icon']['name']);
//                        echo $id;
						/*printarray($data);
                        die();*/
						$this->ProductManagement_Model->update_data($id,$data,$this->table_name);	
							
						$this->session->set_flashdata('alert', array('message' => 'Service updated successfully','class' => 'success'));
			           redirect('Productmanagement');
						
						
					 
		}else{
			redirect('Productmanagement');
		}

	}

	function product_act_inactive($getid)
	{
		$id=$getid;
		$product_details=$this->ProductManagement_Model->get_data($id,$this->table_name);
		$status=$product_details[0]->status;
        
    
     
		if($status=='active')
		{
			$data=array('status'=>'inactivate');
           
			$this->ProductManagement_Model->update_data($id,$data,$this->table_name);	
							
		    $this->session->set_flashdata('alert', array('message' =>'Service status updated successfully','class' => 'success'));
			redirect('Productmanagement');
		}else{
			$data=array('status'=>'active');
			$this->ProductManagement_Model->update_data($id,$data,$this->table_name);	
							
		    $this->session->set_flashdata('alert', array('message' =>'Service status updated successfully','class' => 'success'));
			redirect('Productmanagement');
			
		}
	}
    
        
       
		
		
	  
	
	
}	