<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Websitemanage extends MY_Controller {
	function __construct() {
	 parent::__construct();
	 $this->load->helper('websitemanage');
	 $this->load->model('Websitemanage_Model');
	}
	public function index()
	{	
		$RequestMethod = $this->input->server('REQUEST_METHOD');
        
//        printarray($_REQUEST);
//        die();
//			   
			   if($RequestMethod == "POST")
			   {
				  
				   if(empty($_POST['id'])) {
					   $_POST['id'] = '1';
					   
		               $image_data=$this->Websitemanage_Model->logo_upload();	
						
		               $_POST['company_logo']=$image_data['file_name'];
					   $favicon_icon_name=$this->Websitemanage_Model->favicon_icon_upload();
					   $_POST['company_favicon']=$favicon_icon_name['file_name'];
					   if (isset($_FILES['seo_og_image']) && isset($_FILES['seo_og_image']['error']) && (int) $_FILES['seo_og_image']['error'] === 0) {
						   $seo_og = $this->Websitemanage_Model->seo_og_image_upload();
						   $_POST['seo_og_image'] = ! empty($seo_og['file_name']) ? ('admin/webroot/uploads/seo/' . $seo_og['file_name']) : '';
					   } else {
						   $_POST['seo_og_image'] = (string) $this->input->post('seo_og_image_current');
					   }
					   unset($_POST['seo_og_image_current']);
					   
					   $this->Websitemanage_Model->insert_website_data($this->input->post());
					   
                       $this->session->set_flashdata('alert', array('message' => 'Data successfully Saved','class' => 'success'));
				       redirect('websitemanage');					   
				   } else {					    						
					        if($_FILES['company_logo']['error']>0)
		                    {			
			                  $logo_name=$this->input->post('company_logo');		
		                    } else {
							  $previous_img=$this->input->post('company_logo');
							  $img_file=FCPATH . '/webroot/uploads/logo/'.$previous_img;
							  if (!unlink($img_file)) {} else { }							
						      $logo_name=$this->Websitemanage_Model->logo_upload();
							  $_POST['company_logo']=$logo_name['file_name'];				 
							}
							if($_FILES['company_favicon']['error']>0)
		                    {			
			                  $favicon_icon_name=$this->input->post('company_favicon');		
		                    }else{
							  $img_previous=$this->input->post('company_favicon');
							  $img_file=FCPATH . '/webroot/uploads/logo_fab/'.$img_previous;
							  if (!unlink($img_file)) {} else { }							  
						      $favicon_icon_name=$this->Websitemanage_Model->favicon_icon_upload();
							  $_POST['company_favicon']=$favicon_icon_name['file_name'];		  
							}
							if (isset($_FILES['seo_og_image']) && isset($_FILES['seo_og_image']['error']) && (int) $_FILES['seo_og_image']['error'] === 0) {
								$prev_seo = (string) $this->input->post('seo_og_image_current');
								if ($prev_seo !== '') {
									$prev_file = basename(str_replace('\\', '/', $prev_seo));
									if ($prev_file !== '' && $prev_file !== '.' && $prev_file !== '..') {
										$prev_path = FCPATH . 'webroot/uploads/seo/' . $prev_file;
										if (is_file($prev_path)) {
											@unlink($prev_path);
										}
									}
								}
								$seo_og = $this->Websitemanage_Model->seo_og_image_upload();
								$_POST['seo_og_image'] = ! empty($seo_og['file_name'])
									? ('admin/webroot/uploads/seo/' . $seo_og['file_name'])
									: $this->input->post('seo_og_image_current');
							} else {
								$_POST['seo_og_image'] = $this->input->post('seo_og_image_current');
							}
							unset($_POST['seo_og_image_current']);
							
								
					  $this->Websitemanage_Model->update_website_data($this->input->post());
					  
					  
                      $this->session->set_flashdata('alert', array('message' => 'Data successfully Updated','class' => 'success'));
				      redirect('websitemanage');						  
				   }
				  				 
			   }
			$stateid=$this->website['data']->state_id;	   
			$content['get_country']=$this->Websitemanage_Model->get_countrycode();
			$content['get_city_id']=$this->Websitemanage_Model->city_city_by();	
			$content['selectcity']=$this->Websitemanage_Model->get_selectedcity($stateid);	
			$content['state_id']=$this->Websitemanage_Model->get_state_by();
			$content['subview']="websitemanage/website_setting";
			$this->load->view('layout', $content);
	}
	
	function getstate(){
	
		  
		 $id=$_GET['country'];
		 $content['get_state']=$this->Websitemanage_Model->get_statecode($id);
          echo json_encode($content['get_state']);
		 
		
		
	}
	function getcity(){
	
		  
		   $id=$_GET['getval'];
		   $content['get_city']=$this->Websitemanage_Model->get_citycode($id);
           echo json_encode($content['get_city']); 
		 
		
		
	}
	
}	