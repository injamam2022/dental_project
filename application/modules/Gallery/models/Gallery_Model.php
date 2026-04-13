<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_Model extends MY_Model{
	
	
/*========================================= STRART BANNER SECTION  HERE ==================================================*/
	function GetBanner(){
	
		$this->db->select('*');
		$this->db->where('status','active');
		$this->db->where('type','9');
		$query=$this->db->get('banner');
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
    
}