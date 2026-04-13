<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_Model extends MY_Model{
	
	
/*========================================= STRART BANNER SECTION  HERE ==================================================*/
	function GetBanner(){
	
		$this->db->select('*');
		$this->db->where('status','active');
		$this->db->where('type','6');
		$query=$this->db->get('banner');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}


  function get_all_content()
  {

		$this->db->select('*');
		$query=$this->db->get('website_setting');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}      
  }
    
    function insert_data($table,$data)
	{
        $this->db->insert($table,$data);
    }
    
}