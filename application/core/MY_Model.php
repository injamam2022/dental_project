<?php
class MY_Model extends CI_Model {	
	function __construct() {
	parent::__construct();		
	}

	
	
	function loginuser(){
	$this->db->where('email_id',$this->session->userdata('userinfo_login_details')->email_id);
	$query=$this->db->get('customer_info');
	if($query->num_rows()== 1)
	{
	 return $query->row();
	}else{
	 return false;
	}
	}
	
	
	function get_website_data()
	{
		try
		{
			$query = $this->db->get('website_setting');
			if ($query->num_rows() === 1)
			{
				return $query->row();
			}
		}
		catch (Throwable $e)
		{
			log_message('error', 'get_website_data: '.$e->getMessage());
		}
		return false;
	}

	/*function get_allpages($data)
	{   

		
	$query = $this->db->get("pages");
	
	if($query->num_rows()=='')
	{
	 return false;
	}else{    
	 
	 return $query->result();
	}		
	}*/
	function get_field($table)
	{
		try
		{
			return $this->db->list_fields($table);
		}
		catch (Throwable $e)
		{
			log_message('error', 'get_field: '.$e->getMessage());
			return array();
		}
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
	
	
	
	
	
}	