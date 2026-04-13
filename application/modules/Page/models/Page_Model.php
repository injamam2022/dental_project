<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_Model extends MY_Model{
	
	
	function get_info($slug_url)
	{
		$this->db->select('*');
		$this->db->where('permalink',$slug_url);
		$this->db->where('page_status','active');
		$query=$this->db->get('pages');
		if($query->num_rows== ' '){
			return false;
		}else{
			return $query->result();
		}	
	}
	
	function save_contact($data) {
	
		 $this->db->insert('query_list',$data);
		 return true;
	  }
	function  GetTestimonial(){


		$this->db->select('*');
		$this->db->where('status','active');
		$query=$this->db->get('testimonial');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}   
  }
    function GetGallery(){
	
		$this->db->select('*');
		$this->db->where('status','active');
		$query=$this->db->get('gallery_management');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}
    
    
    function all_fatch_content()
	{
		$this->db->order_by('id','desc');
		$query=$this->db->get('careermanagement');
		if($query->num_rows == " ")
		{
			return false;
		}else{
			return $query->result();
		}
	}
	
	
	function GetBanner(){
	
		$this->db->select('*');
		$this->db->where('status','active');
		$this->db->where('type','1');
		$query=$this->db->get('banner');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}
 function GetPartner(){
	
		$this->db->select('*');
		$this->db->where('status','active');
		$this->db->where('type','1');
		$query=$this->db->get('partner');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}
}	
	