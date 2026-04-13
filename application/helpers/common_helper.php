<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @subpackage  Common Helper
 * @developed by Bhisham Manchanda (bhism@solutioncenter.co.in)
 * @Copyright (C) 2008 -2017 SC Technology Pvt. Ltd. All rights reserved.
 * This file is related to Frontend Controller 
 */
	
    function  GetServices(){
        $CI =& get_instance();
        $CI->db->from('categories');
        $CI->db->where('status', 'active');
        $CI->db->group_start();
        $CI->db->like('cat_name', 'Dental');
        $CI->db->or_like('cat_name', 'Skin');
        $CI->db->group_end();
        $CI->db->order_by('cat_name', 'ASC');
        $query = $CI->db->get();
        if ($query->num_rows() == 0) {
            return false;
        }
        $res = $query->result_array();
        foreach ($res as $k => $r) {
            $res[$k]['subcategory'] = array();
        }
        return $res;
    }


	function printarray($value){
	echo '<pre>';
	print_r($value);
	echo '</pre>';
	}
	function pr($value){
		echo '<pre>';
		print_r($value);
		echo '</pre>';
	}
	
	function encode_url($string, $key="", $url_safe=TRUE)
	{
	$CI =& get_instance();
	$CI->load->library('encrypt');
	if($key==null || $key=="")
	{
	$key="sc_technology";
	}
	$ret = $CI->encrypt->encode($string, $key);
	if ($url_safe)
	{
	$ret = strtr(
	$ret,
	array(
	'+' => '.',
	'=' => '-',
	'/' => '~'
	)
	);
	}
	return $ret; 
	}

	function decode_url($string, $key="")
	{
	$CI =& get_instance();
	$CI->load->library('encrypt');
	if($key==null || $key=="")
	{
	$key="sc_technology";
	}
	$string = strtr(
	$string,
	array(
	'.' => '+',
	'-' => '=',
	'~' => '/'
	)
	);
	return $CI->encrypt->decode($string, $key); 
	}
	
	function myencryption($str){
	return base64_encode($str);	 
	}

	function mydecryption($str){
	return base64_decode($str);	 
	}

	function get_city_state_country($table,$id)
	{   
	$CI = get_instance();
	$CI->load->model('MY_Model');
	return $results = $CI->MY_Model->get_city_state_country($table,$id);
	}	


	function dontia_appointment_services()
	{
		$CI =& get_instance();
		$CI->db->select('pro_id, product_name');
		$CI->db->from('product_master');
		$CI->db->where('status', 'active');
		$CI->db->order_by('product_name', 'ASC');
		$q = $CI->db->get();
		if ($q->num_rows() === 0) {
			return array();
		}
		return $q->result();
	}

	/**
	 * Send HTML mail using website_setting (SMTP or default), same behaviour as admin email_send but no output.
	 */
	function dontia_send_site_email($to, $subject, $msg)
	{
		if (!is_string($to) || !filter_var(trim($to), FILTER_VALIDATE_EMAIL)) {
			return false;
		}
		$to = trim($to);
		$ci =& get_instance();
		if (!isset($ci->website['data']) || !is_object($ci->website['data'])) {
			return false;
		}
		$wd = $ci->website['data'];
		$from = isset($wd->from_email_id) ? trim((string) $wd->from_email_id) : '';
		$from_name = isset($wd->company_name) ? (string) $wd->company_name : 'Clinic';
		if ($from === '' || !filter_var($from, FILTER_VALIDATE_EMAIL)) {
			$fb = isset($wd->support_email) ? trim((string) $wd->support_email) : '';
			$from = filter_var($fb, FILTER_VALIDATE_EMAIL) ? $fb : 'noreply@localhost';
		}
		$protocol = isset($wd->email_protocal) ? $wd->email_protocal : 'Email';
		$ci->load->library('email');
		if ($protocol === 'SMTP Email' && !empty($wd->smtp_host_name)) {
			$config = array(
				'protocol'  => 'smtp',
				'smtp_host' => $wd->smtp_host_name,
				'smtp_port' => $wd->smtp_port,
				'smtp_user' => $wd->email_id,
				'smtp_pass' => $wd->email_password,
				'charset'   => 'utf-8',
				'mailtype'  => 'html',
				'newline'   => "\r\n",
			);
			$ci->email->initialize($config);
		} else {
			$config = array(
				'protocol'  => 'mail',
				'mailtype'  => 'html',
				'charset'   => 'utf-8',
				'newline'   => "\r\n",
				'wordwrap'  => true,
			);
			$ci->email->initialize($config);
		}
		$ci->email->from($from, $from_name);
		$ci->email->to($to);
		if (!empty($wd->bcc_email_id)) {
			$ci->email->bcc($wd->bcc_email_id);
		}
		$ci->email->subject($subject);
		$ci->email->message($msg);
		return (bool) $ci->email->send();
	}

	     function email_send($to,$subject,$msg,$silent = false)
	{
 
        
            $subject = $subject;
            $to = $to;
            $from = "info@ifabex.com";
            $data = "IFABEX:info@ifabex.com";
            $headers  = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            $headers .= "From: ". $from. "\r\n";
            $headers .= "Reply-To: ". $from. "\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();
            $headers .= "X-Priority: 1" . "\r\n"; 

            $mail2 =  mail($to,$subject,$msg,$headers);
         
            $mailtest = mail("injilovesphp@gmail.com","hello","hello",$headers);
            mail("ifabex@outlook.com",$subject,$msg,$headers);

            //if($mailtest)
            //{
            //    echo "send";
            //}
             //$mail_to_bong = mail($rajib_mail,$subject,$message,$headers);
              if($mail2)
              {  
                  $res=array("Stat"=>1,"msg"=>"mail sent");
              }
              else 
              {
                  $res=array("Stat"=>0,"msg"=>"mail not sent");
              }
              if ($silent) {
              	return $mail2 ? true : false;
              }
              echo json_encode($res);

        
          
        
        
           
	
	}
   

        
        
	