<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_Model  extends MY_Model{

		function login($mail,$password_raw){	
		$this->db->where('email', trim((string) $mail));
        $this->db->limit(1);		
		$query=$this->db->get('admin_login');		
		if($query->num_rows()!== 1)
	    {
		 return false;
	    }
		$row = $query->row();
		$stored = isset($row->password) ? (string) $row->password : '';
		$raw = (string) $password_raw;
		$md5 = md5($raw);
		$is_match = false;
		if ($stored !== '') {
			if (hash_equals($stored, $md5) || hash_equals($stored, $raw)) {
				$is_match = true;
			} elseif (function_exists('password_verify') && password_verify($raw, $stored)) {
				$is_match = true;
			}
		}
		return $is_match ? $row : false;
		}

		function update_last_login(){
		$data=array(
		'last_login'=>date('d-m-Y H:i:s'),
		);
		$this->db->where('id',$this->session->userdata('loginDetail')->id);
		$this->db->update('admin_login',$data);
		}

		function update_last_ip(){
		$data=array(
		'last_login_ip'=>$this->input->ip_address(),
		);
		$this->db->where('id',$this->session->userdata('loginDetail')->id);
		$this->db->update('admin_login',$data);
		}
		
		function check_email_address($mail)
		{
		$this->db->where('email',$mail);		
		$query=$this->db->get('admin_login');		
		if($query->num_rows()== 1)
	    {
		 return $query->row();
	    }
	    else
	    {
		 return false;
	    }
		}
		function update_data($id,$data)
		{
		$this->db->where('id',$id);
		$this->db->update('admin_login',$data);
		}
		function check_mobile_no($mobile_no)
		{
		$this->db->where('contact_number',$mobile_no);		
		$query=$this->db->get('admin_login');		
		if($query->num_rows()== 1)
	    {
		 return $query->row();
	    }
	    else
	    {
		 return false;
	    }
		}
	
}	