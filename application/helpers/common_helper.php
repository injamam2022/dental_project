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
   

if (!function_exists('dontia_company_logo_url')) {
	/**
	 * Logo URL from admin Website Settings, or a static fallback.
	 *
	 * @param string $fallback_relative Path under site root, e.g. assets/images/branding/header-logo-96w.png
	 */
	function dontia_company_logo_url($fallback_relative = 'assets/images/branding/header-logo-96w.png')
	{
		$CI =& get_instance();
		$filename = '';
		if (isset($CI->website['data']->company_logo)) {
			$filename = trim((string) $CI->website['data']->company_logo);
		}
		if ($filename !== '') {
			return base_url('admin/webroot/uploads/logo/' . $filename);
		}
		return base_url(ltrim($fallback_relative, '/'));
	}
}

if (!function_exists('dontia_company_logo_is_uploaded')) {
	function dontia_company_logo_is_uploaded()
	{
		$CI =& get_instance();
		return isset($CI->website['data']->company_logo)
			&& trim((string) $CI->website['data']->company_logo) !== '';
	}
}

if (!function_exists('dontia_favicon_links')) {
	/**
	 * Favicon URLs for <head>: admin upload, else site monogram PNG.
	 *
	 * @return array{icon:string,icon_type:string,apple:string}
	 */
	function dontia_favicon_links()
	{
		$CI =& get_instance();
		$fab = '';
		if (isset($CI->website['data']->company_favicon)) {
			$fab = trim((string) $CI->website['data']->company_favicon);
		}
		if ($fab !== '') {
			$icon = base_url('admin/webroot/uploads/logo_fab/' . $fab);
			$ext = strtolower(pathinfo($fab, PATHINFO_EXTENSION));
			$type = $ext === 'svg' ? 'image/svg+xml' : ($ext === 'png' ? 'image/png' : ($ext === 'gif' ? 'image/gif' : 'image/x-icon'));
			return array('icon' => $icon, 'icon_type' => $type, 'apple' => $icon);
		}
		$icon32 = base_url('assets/images/favicon-32x32.png');
		$apple = base_url('assets/images/apple-touch-icon.png');
		if ( ! is_file(FCPATH . 'assets/images/favicon-32x32.png')) {
			$icon32 = base_url('assets/images/favicon.png');
		}
		return array('icon' => $icon32, 'icon_type' => 'image/png', 'apple' => $apple);
	}
}

if (!function_exists('dontia_resolve_media_link')) {
	/** Turn admin link slug or full URL into a safe href. */
	function dontia_resolve_media_link($url)
	{
		$url = trim((string) $url);
		if ($url === '') {
			return '';
		}
		if (preg_match('#^https?://#i', $url)) {
			return $url;
		}
		return base_url(ltrim($url, '/'));
	}
}

if (!function_exists('dontia_header_address_display')) {
	/** Compact one-line address for header (truncates only; never replaces admin text). */
	function dontia_header_address_display($address, $max = 88)
	{
		$address = trim(preg_replace('/\s+/u', ' ', (string) $address));
		if ($address === '') {
			return '';
		}
		if (function_exists('mb_strlen') && mb_strlen($address) > $max) {
			$cut = mb_substr($address, 0, $max);
			$sp = mb_strrpos($cut, ' ');
			if ($sp !== false && $sp > (int) ($max * 0.5)) {
				$cut = mb_substr($cut, 0, $sp);
			}
			return rtrim($cut) . '…';
		}
		if (strlen($address) > $max) {
			$cut = substr($address, 0, $max);
			$sp = strrpos($cut, ' ');
			if ($sp !== false && $sp > (int) ($max * 0.5)) {
				$cut = substr($cut, 0, $sp);
			}
			return rtrim($cut) . '…';
		}
		return $address;
	}
}

if (!function_exists('dontia_header_address_line')) {
	/**
	 * Header top bar line: optional admin override, else shortened full address.
	 *
	 * @param string $full_address       website_setting address / corporate_address
	 * @param string $header_override    website_setting address_header_display (if column exists)
	 */
	function dontia_header_address_line($full_address, $header_override = '')
	{
		$override = trim(preg_replace('/\s+/u', ' ', (string) $header_override));
		if ($override !== '') {
			return $override;
		}
		return dontia_header_address_display($full_address);
	}
}

if (!function_exists('dontia_default_blog_categories')) {
	/**
	 * Built-in blog sections. More can be added from Admin → Blog → Categories.
	 */
	function dontia_default_blog_categories()
	{
		return array(
			array('name' => 'Skin Care Blog', 'slug' => 'skin-care'),
			array('name' => 'Dental Blog', 'slug' => 'dental'),
		);
	}
}

if (!function_exists('dontia_ensure_blog_categories')) {
	function dontia_ensure_blog_categories()
	{
		$CI =& get_instance();
		if (!isset($CI->db) || !$CI->db->table_exists('tbl_blog_category')) {
			return;
		}
		foreach (array('skin-care-blog' => 'skin-care', 'dental-blog' => 'dental') as $old_slug => $new_slug) {
			$CI->db->where('slug', $old_slug);
			$CI->db->update('tbl_blog_category', array('slug' => $new_slug));
		}
		foreach (dontia_default_blog_categories() as $def) {
			$q = $CI->db->get_where('tbl_blog_category', array('slug' => $def['slug']), 1);
			if ($q && $q->num_rows() > 0) {
				continue;
			}
			$CI->db->insert('tbl_blog_category', array(
				'name' => $def['name'],
				'slug' => $def['slug'],
				'status' => 'Yes',
			));
		}
	}
}

if (!function_exists('dontia_blog_category_is_enabled')) {
	function dontia_blog_category_is_enabled($status)
	{
		$s = strtolower(trim((string) $status));
		return in_array($s, array('yes', 'enable', 'enabled', 'active', '1'), true);
	}
}

if (!function_exists('dontia_blog_nav_categories')) {
	/**
	 * Enabled blog categories for the header submenu (admin-managed).
	 *
	 * @return array<int, object> id, name, slug
	 */
	function dontia_blog_nav_categories()
	{
		$CI =& get_instance();
		dontia_ensure_blog_categories();
		$fallback = array();
		foreach (dontia_default_blog_categories() as $d) {
			$fallback[] = (object) array('id' => 0, 'name' => $d['name'], 'slug' => $d['slug']);
		}
		if (!isset($CI->db) || !$CI->db->table_exists('tbl_blog_category')) {
			return $fallback;
		}
		$rows = $CI->db->order_by('id', 'asc')->get('tbl_blog_category')->result();
		$out = array();
		$preferred = array('skin-care' => 0, 'dental' => 1, 'skin-care-blog' => 0, 'dental-blog' => 1);
		foreach ($rows as $row) {
			if (!dontia_blog_category_is_enabled(isset($row->status) ? $row->status : 'Yes')) {
				continue;
			}
			$slug = isset($row->slug) ? trim((string) $row->slug) : '';
			$name = isset($row->name) ? trim((string) $row->name) : '';
			if ($slug === '' || $name === '') {
				continue;
			}
			$out[] = $row;
		}
		if (count($out) === 0) {
			return $fallback;
		}
		usort($out, static function ($a, $b) use ($preferred) {
			$as = isset($a->slug) ? $a->slug : '';
			$bs = isset($b->slug) ? $b->slug : '';
			$ao = array_key_exists($as, $preferred) ? $preferred[$as] : 100;
			$bo = array_key_exists($bs, $preferred) ? $preferred[$bs] : 100;
			if ($ao === $bo) {
				return strcasecmp((string) $a->name, (string) $b->name);
			}
			return $ao - $bo;
		});
		return $out;
	}
}

if (!function_exists('dontia_blog_section_by_slug')) {
	function dontia_blog_section_by_slug($slug)
	{
		$slug = strtolower(trim((string) $slug));
		if ($slug === '') {
			return null;
		}
		$aliases = array('skin-care-blog' => 'skin-care', 'dental-blog' => 'dental');
		if (isset($aliases[$slug])) {
			$slug = $aliases[$slug];
		}
		foreach (dontia_blog_nav_categories() as $cat) {
			if (strtolower((string) $cat->slug) === $slug) {
				return $cat;
			}
		}
		return null;
	}
}

if (!function_exists('dontia_blog_section_url')) {
	function dontia_blog_section_url($slug)
	{
		$slug = trim((string) $slug, '/');
		$aliases = array('skin-care-blog' => 'skin-care', 'dental-blog' => 'dental');
		if (isset($aliases[$slug])) {
			$slug = $aliases[$slug];
		}
		if (strpos($slug, 'blog/') === 0) {
			return base_url($slug);
		}
		return base_url('blog/' . $slug);
	}
}

if (!function_exists('dontia_blog_post_matches_section')) {
	/**
	 * Whether a tbl_posts_blog row belongs to an admin blog category.
	 * Uncategorized posts are treated as Dental Blog so existing articles still appear.
	 *
	 * @param object|array $row
	 * @param object|null  $section
	 */
	function dontia_blog_post_matches_section($row, $section)
	{
		if (!$section) {
			return true;
		}
		$raw = '';
		if (is_object($row) && isset($row->category)) {
			$raw = trim((string) $row->category);
		} elseif (is_array($row) && isset($row['category'])) {
			$raw = trim((string) $row['category']);
		}
		$raw_l = strtolower($raw);
		$is_uncat = ($raw === '' || $raw === '0');
		$cat_id = isset($section->id) ? (string) (int) $section->id : '';
		$cat_slug = strtolower(trim((string) $section->slug));
		$cat_name = strtolower(trim((string) $section->name));
		if (!$is_uncat && $cat_id !== '' && $cat_id !== '0' && $raw === $cat_id) {
			return true;
		}
		if ($raw_l !== '' && ($raw_l === $cat_slug || $raw_l === $cat_name)) {
			return true;
		}
		if ($is_uncat && in_array($cat_slug, array('dental', 'dental-blog'), true)) {
			return true;
		}
		return false;
	}
}

        