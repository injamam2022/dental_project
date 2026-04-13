<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Servicemanagement extends MY_Controller {
	
	function __construct() {		
		     parent::__construct();
			 $this->table_name="service_master";
			 $this->load->model("Servicemanagement_Model");
			 
		}
		public function index()
	{
         $content['sub_cat_list']=$this->Servicemanagement_Model->get_all_subcat();
         $content['cat_list']=$this->Servicemanagement_Model->get_all_cat();
		 $content['products']=$this->Servicemanagement_Model->fetch_all_products($this->table_name);
         $content['subview']="service_list";
		 $this->load->view('layout', $content);
	}
    
     public function cat()
    {   
        $scat = $this->input->post('scat');

       $response=$this->Servicemanagement_Model->Get_subcat($scat);
      
       echo json_encode($response);

     

        
    }
		
		function add_services(){
                    
               
                  
		        $content['sub_cat_list']=$this->Servicemanagement_Model->get_all_subcat();
		        $RequestMethod = $this->input->server('REQUEST_METHOD');
				if($RequestMethod == "POST")
			    {
					$product_images=$this->Servicemanagement_Model->product_images_upload(); 
					$product_icon=$this->Servicemanagement_Model->product_icon_upload();
                    
                   $arr=explode(',',$this->input->post('cat_id'));
                   $cat_id=$arr[1];

					  $data=array(
                                    
                                    'product_name'=>$this->input->post('product_name'),
                                    'pro_sub_cat_id'=>$this->input->post('pro_sub_cat_id'),
                                  /*  'pro_cat_id'=>$cat_id,*/
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
                                    'citation'=>$this->input->post('citation'),
                                    'status'=>$this->input->post('status'),
                                    'pro_image'=>$product_images,
                                    'icon'=>$product_icon,
                                    'domain'=>$this->input->post('domain'),
                                    'type'=>$this->input->post('type'),
					             );
                                 /* printarray($data);
                                  die();*/
				   
		              $this->Servicemanagement_Model->insert_data($this->table_name,$data);
                      $this->session->set_flashdata('alert', array('message' => 'Data successfully Saved','class' => 'success'));
	                  redirect('Servicemanagement');	
				}
				else{
				   
                    $content['subview']="add_service";
                    $this->load->view('layout', $content);		
				}
				
		}


    function delet_products($getid)
	{
		 $id=decode_url($getid);
       /* echo $id;
        die();*/
		 $get_img=$this->Servicemanagement_Model->get_data($id,$this->table_name);
		
		 if($get_img){
			 $img_name=$get_img[0]->pro_image;
			 $id=$get_img[0]->ser_id;
			 $img_file=FCPATH . '/webroot/uploads/product/'.$img_name;
			 if(!unlink($img_file)) {} else { }
             
            
			 $this->Servicemanagement_Model->delete_data($id,$this->table_name);
			 $this->session->set_flashdata('alert', array('message' => 'Deleted Product successfully','class' => 'success'));
			 redirect('Servicemanagement');
			 
		 }else{
			 $this->session->set_flashdata('alert', array('message' => 'Deleted Product successfully','class' => 'error'));
			 redirect('Servicemanagement');
			 
		 }
		 
	}

	function multi_pro_del()
	{
		$RequestMethod=$this->input->server('REQUEST_METHOD');
		if($RequestMethod== 'POST'){
			
			foreach($_POST['checklist'] as $id){
				$get_img=$this->Servicemanagement_Model->get_data($id,$this->table_name);
				$img_name=$get_img[0]->pro_image;
			    $id=$get_img[0]->pro_id;
              /*  echo $id;
                die();*/
			    $img_file=FCPATH . '/webroot/uploads/product/'.$img_name;
			    if(!unlink($img_file)) {} else { }
			    $this->Servicemanagement_Model->delete_data($id,$this->table_name);
				
			}
			$this->session->set_flashdata('alert', array('message' => 'Deleted Product successfully','class' => 'success'));
			 redirect('Servicemanagement');
		}else{
			$this->session->set_flashdata('alert', array('message' => 'Not valid page','class' => 'error'));
			redirect('Servicemanagement');
		}
	
		
	}


		
       
	function edit_service($getid)
	{
	  $id=decode_url($getid);
      /*  echo $id;
        die();*/
      /*$content['sub_cat_list']=$this->Servicemanagement_Model->get_all_subcat();
      $content['cat']=$this->Servicemanagement_Model->get_all_cat();*/
      /*$content['cat_list']=$this->Servicemanagement_Model->get_all_categories_subcategories_join();*/
	  $content['product_edit']=$this->Servicemanagement_Model->get_data($id,$this->table_name);
	  $content['subview']="edit_service";
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
						$product_detais=$this->Servicemanagement_Model->get_data($id,$this->table_name);
                    /*    printarray($product_detais);*/
						$previous_name=$product_detais[0]->pro_image;
						$p_id=$product_detais[0]->pro_id; 
						$img_file=FCPATH . '/webroot/uploads/product/'.$previous_name;
						if (!unlink($img_file)) {} else { }
						$product_img_name=$this->Servicemanagement_Model->product_images_upload(); 
				       }
						

			if($_FILES['icon']['error']>0){
				   $product_icon_name=$this->input->post('prev_image');
				
				   } else {
						$product_detais=$this->Servicemanagement_Model->get_data($id,$this->table_name);
                       /* printarray($product_detais);*/
						$previous_name=$product_detais[0]->icon;
						$p_id=$product_detais[0]->pro_id; 
						$img_file=FCPATH . '/webroot/uploads/product_icon/'.$previous_name;
						if (!unlink($img_file)) {} else { }
					    $product_icon_name=$this->Servicemanagement_Model->product_icon_upload(); 
				       }

				   $arr=explode(',',$this->input->post('cat_id'));
                   $cat_id=$arr[1];
						$data=array(
						            'product_name'=>$this->input->post('product_name'),
                                    'pro_sub_cat_id'=>$this->input->post('pro_sub_cat_id'),
                                     /*'pro_cat_id'=>$cat_id,*/
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
                                    'icon'=>$product_icon_name,
                                    'domain'=>$this->input->post('domain'),
                                    'type'=>$this->input->post('type')
                                   
			              );
                        /*printarray($data);
                        die();*/

						//printarray($_FILES['icon']['name']);
                      /*  echo $id;
						*/
						$this->Servicemanagement_Model->update_data($id,$data,$this->table_name);	
							
						$this->session->set_flashdata('alert', array('message' => 'Update Product successfully','class' => 'success'));
			           redirect('Servicemanagement');
						
						
					 
		}else{
			redirect('Servicemanagement');
		}

	}

	function product_act_inactive($getid)
	{
		$id=$getid;
		$product_details=$this->Servicemanagement_Model->get_data($id,$this->table_name);
		$status=$product_details[0]->status;
        
    
     
		if($status=='active')
		{
			$data=array('status'=>'inactivate');
           
			$this->Servicemanagement_Model->update_data($id,$data,$this->table_name);	
							
		    $this->session->set_flashdata('alert', array('message' =>'Product status Update successfully','class' => 'success'));
			redirect('Servicemanagement');
		}else{
			$data=array('status'=>'active');
			$this->Servicemanagement_Model->update_data($id,$data,$this->table_name);	
							
		    $this->session->set_flashdata('alert', array('message' =>'Product status Update successfully','class' => 'success'));
			redirect('Servicemanagement');
			
		}
	}
    
        
       
		
		
	  
	
	
}	