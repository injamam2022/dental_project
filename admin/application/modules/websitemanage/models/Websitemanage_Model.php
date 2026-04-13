<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Websitemanage_Model  extends MY_Model{
	
	function logo_upload() {	
	     	$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => FCPATH . '/webroot/uploads/logo',
			'max_size' => 20000
		);		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('company_logo');
	    return $image_data = $this->upload->data();
	}

	function favicon_icon_upload() {		
	     	$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => FCPATH . '/webroot/uploads/logo_fab',
			'max_size' => 20000
		);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('favicon_icon');
	    return $image_data = $this->upload->data();
	}

	function seo_og_image_upload() {
		$dir = FCPATH . 'webroot/uploads/seo';
		if ( ! is_dir($dir)) {
			@mkdir($dir, 0755, true);
		}
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png|webp',
			'upload_path' => $dir,
			'max_size' => 20000,
		);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('seo_og_image');
		return $this->upload->data();
	}
	function insert_website_data($data)
	{
		$this->db->insert('website_setting',$data);
	}
	function update_website_data($data)
	{
		$this->db->where('id',1);
		$this->db->update('website_setting',$data);
//        echo $this->db->last_query();die;
	}
	
	
	function get_countrycode(){
	
		 $query=$this->db->get('countries');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
	
	function city_city_by(){
		 $this->db->where("state_id",1);
		 $query=$this->db->get('cities');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
	function get_statecode($id){
	     
		 $this->db->where("country_id",$id);
		 $query=$this->db->get('states');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
	
	function get_state_by(){

		 $this->db->where("country_id",101);
		 $query=$this->db->get('states');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
	function get_citycode($id){
	     
		 $this->db->where("state_id",$id);
		 $query=$this->db->get('cities');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
	
	function get_selectedcity($stateid){
		 $this->db->where("state_id",$stateid);
		 $query=$this->db->get('cities');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
}	