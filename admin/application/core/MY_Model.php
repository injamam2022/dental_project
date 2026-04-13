<?php
class MY_Model extends CI_Model {
	
	
	function __construct() {
		parent::__construct();
		
		
	}
		function loginuser(){		
		$this->db->where('id',$this->session->userdata('loginDetail')->id);
		$query=$this->db->get('admin_login');
        if($query->num_rows()== 1)
	    {
		 return $query->row();
	    }else{
		 return false;
	    }		
		}
		
		function get_website_data()
		{   
		$query = $this->db->get("website_setting");
		if($query->num_rows()== 1)
		{
		 return $query->row();
	    }else{    
		 return false;
	    }		
		}
    
    
		function get_field($table)
		{
		return $fields = $this->db->list_fields($table);
		}
		function get_city_state_country($table,$id){
		 
	      $this->db->where("id",$id);
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
		}
		function checkblockip($ip){		
		$this->db->where('ipaddress',$ip);
		$query=$this->db->get('admin_blockip');
        if($query->num_rows() >= 1)
	    {
		 /* return 'exists'; */
		 return true;
	    }else{
		  /* return 'Notexists'; */
		  return false;
	    }		
		}
		function getblockiplist()
		{   
		$query = $this->db->get("admin_blockip");
		if($query->num_rows()== 1)
		{
		 return $query->result();
	    }else{    
		 return false;
	    }		
		}
	
	
}	