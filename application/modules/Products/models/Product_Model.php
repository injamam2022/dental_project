<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Model extends MY_Model{
	
	

 function  GetProduct(){


	/*	$this->db->select('*');*/
		$this->db->from('product_master');
		$query=$this->db->get();
		if($query->num_rows()==''){
			  return false;
		}else{
			  return $query->result();
		}   
  }
    
  function GetIndividualProducts($pro_id)
  {
        $this->db->where('pro_id',$pro_id);
        $this->db->from('product_master');
		$query=$this->db->get();
		if($query->num_rows()==''){
			  return false;
		}else{
			  return $query->result();
		}  
  }

  function get_all_categories()
    {
        $this->db->select('*');
        $this->db->from('product_master pm');
        $this->db->join('categories c', 'pm.pro_cat_id = c.cat_id', 'left');
        $this->db->where('pro_sub_cat_id',12);
        $this->db->group_by('c.cat_name');
        $query = $this->db->get(); 
        return $query->result(); 
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
  
	
}