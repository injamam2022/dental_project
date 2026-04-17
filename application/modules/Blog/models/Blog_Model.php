<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_Model extends MY_Model{
	
	private function apply_published_filter($alias = '')
	{
		$prefix = $alias !== '' ? $alias . '.' : '';
		$this->db->group_start();
		$this->db->where($prefix . 'status', 'yes');
		$this->db->or_where($prefix . 'status', 'Yes');
		$this->db->or_where($prefix . 'status', 'YES');
		$this->db->or_where($prefix . 'status', 'active');
		$this->db->or_where($prefix . 'status', 'Active');
		$this->db->or_where($prefix . 'status', 'ACTIVE');
		$this->db->or_where($prefix . 'status', 'enable');
		$this->db->or_where($prefix . 'status', 'Enable');
		$this->db->or_where($prefix . 'status', 'ENABLED');
		$this->db->or_where($prefix . 'status', '1');
		$this->db->group_end();
	}

	public function normalize_permalink($value)
	{
		$value = strtolower(trim((string) $value));
		if ($value === '') {
			return '';
		}
		$value = preg_replace('/[^a-z0-9\s-]/', '', $value);
		$value = preg_replace('/[\s-]+/', '-', $value);
		return trim($value, '-');
	}
	
/*========================================= STRART BANNER SECTION  HERE ==================================================*/
	function GetBanner(){
	
		$this->db->select('*');
		$this->db->where('status','active');
		$this->db->where('type','5');
		$query=$this->db->get('banner');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}
    function GetDetailsBanner(){
	
		$this->db->select('*');
		$this->db->where('status','active');
		$this->db->where('type','8');
		$query=$this->db->get('banner');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}

  function GetBlog(){
	
		$this->db->select('*');
		$this->apply_published_filter();
		$query=$this->db->get('tbl_posts_blog');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}
    
    
    function GetBlogAsc(){
	
		$this->db->select('*');
		$this->apply_published_filter();
        $this->db->order_by("id", "asc");
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
		$this->apply_published_filter();
        $this->db->order_by("id", "desc");
		$query=$this->db->get('tbl_posts_blog');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
    }

	function SingleBlog($id){
	
		$this->db->select('*');
		$this->apply_published_filter();
	    $this->db->where('id',$id);
		$query=$this->db->get('tbl_posts_blog');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}

	function SingleBlogByIdentifier($identifier){
		$identifier = trim((string) $identifier);
		if ($identifier === '') {
			return false;
		}

		// numeric id support (old URLs)
		if (ctype_digit($identifier)) {
			return $this->SingleBlog((int) $identifier);
		}

		$slug = $this->normalize_permalink($identifier);
		if ($slug === '') {
			return false;
		}

		$this->db->select('*');
		$this->apply_published_filter();
		$query = $this->db->get('tbl_posts_blog');
		if ($query->num_rows() === 0) {
			return false;
		}
		foreach ($query->result() as $row) {
			$row_slug = $this->normalize_permalink(isset($row->Permalink) ? $row->Permalink : '');
			if ($row_slug !== '' && $row_slug === $slug) {
				return array($row);
			}
		}
		return false;
	}
	
	
}