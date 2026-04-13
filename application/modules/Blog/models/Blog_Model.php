<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_Model extends MY_Model{
	
	
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
		$this->db->where('status','yes');
		$query=$this->db->get('tbl_posts_blog');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}
    
    
    function GetBlogAsc(){
	
		$this->db->select('*');
		$this->db->where('status','yes');
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
		$this->db->where('status','yes');
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
		$this->db->where('status','yes');
	    $this->db->where('id',$id);
		$query=$this->db->get('tbl_posts_blog');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}
	
	
}