<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_Model extends MY_Model{
	
	
/*========================================= STRART BANNER SECTION  HERE ==================================================*/
	function GetBanner(){
	
		$this->db->select('*');
		$this->db->where('status','active');
		$this->db->where('type','4');
		$query=$this->db->get('banner');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}


  function get_all_partner()
  {

		$this->db->select('*');
		$this->db->where('status','active');
		$query=$this->db->get('partner');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}      
  }
    
}