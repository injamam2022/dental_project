<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Model extends MY_Model{
	
	
/*========================================= STRART BANNER SECTION  HERE ==================================================*/
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
	function GetBlog(){
	
		$this->db->select('*');
		$this->db->where('status','yes');
		$query=$this->db->get('tbl_posts_blog');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}
    
      function GetBlogDesc()
    {
        $this->db->select('*');
		$this->db->where('status','yes');
        $this->db->order_by("id", "desc");
        $this->db->limit(3);
        
		$query=$this->db->get('tbl_posts_blog');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
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
    
    function  GetServices(){


	/*	$this->db->select('*');*/
		$this->db->from('service_master');
         /*$this->db->limit(20);*/
		$query=$this->db->get();
       
		if($query->num_rows()==''){
			  return false;
		}else{
			  return $query->result();
		}    
  }

 function  GetProduct(){

		$this->db->reset_query();
		$sql = "SELECT pm.*, (SELECT c.cat_name FROM categories c WHERE c.cat_id = pm.cat_id) AS cat_name FROM product_master pm WHERE pm.status = 'active'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 0) {
			return false;
		}
		return $query->result();
  }

  /*function get_all_categories()
    {
        $this->db->select('*');
        $this->db->from('product_master pm');
        $this->db->join('categories c', 'pm.pro_cat_id = c.cat_id', 'left');
        $this->db->where('pro_sub_cat_id',12);
        $this->db->group_by('c.cat_name');
        $query = $this->db->get(); 
        return $query->result(); 
    }*/

  function get_all_content()
  {

		$this->db->select('*');
		$this->db->where('status','active');
		$query=$this->db->get('homepagecontent');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}      
  }
    
    function inser_query($data)
	{
		$this->db->insert('query_list',$data);
		return true;
		
	}

	public function get_technology_settings()
	{
		$q = $this->db->get_where('home_technology_settings', array('id' => 1));
		if ($q->num_rows() !== 1) {
			return null;
		}
		return $q->row();
	}

	public function get_technology_items()
	{
		$this->db->where('status', 'active');
		$this->db->order_by('sort_order', 'asc');
		$this->db->order_by('id', 'asc');
		$q = $this->db->get('home_technology_items');
		if ($q->num_rows() === 0) {
			return array();
		}
		return $q->result();
	}

	/**
	 * @param string $image_name basename only
	 */
	public function technology_image_url($image_name)
	{
		$name = basename((string) $image_name);
		if ($name === '') {
			return base_url('assets/images/technology/hero.svg');
		}
		$upload = FCPATH . 'admin/webroot/uploads/home_technology/' . $name;
		if (is_file($upload)) {
			return base_url('admin/webroot/uploads/home_technology/' . $name);
		}
		$asset = FCPATH . 'assets/images/technology/' . $name;
		if (is_file($asset)) {
			return base_url('assets/images/technology/' . $name);
		}
		return base_url('assets/images/technology/hero.svg');
	}
	
}