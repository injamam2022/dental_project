<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_Model extends MY_Model{
	
    function GetBanner(){
	
		$this->db->select('*');
		$this->db->where('status','active');
		$this->db->where('type','3');
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
		$this->db->where('type','7');
		$query=$this->db->get('banner');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}
    

     function  GetServices($cat_id,$sub_catid){

        $w = '';
         if($sub_catid != 0){
                $w = "AND `pro_sub_cat_id` = '".$this->db->escape_str($sub_catid)."'";
            }
            $cat_id = $this->db->escape_str($cat_id);
            $sql = "SELECT *, (SELECT supercat_name FROM super_categories sc WHERE sc.super_catid=product_master.product_sub_sub_catid) AS supercat_name FROM `product_master` WHERE `cat_id` = '".$cat_id."' ".$w." and `status`='active' ";
            $query = $this->db->query($sql);
            /*$this->db->where('cat_id',$cat_id);
            if($sub_catid != 0){
                $this->db->where('pro_sub_cat_id',$sub_catid);
            }
            $this->db->from('product_master');
            $this->db->limit(60);
            $query=$this->db->get();*/
//         echo $this->db->last_query();die;
            if($query->num_rows()==''){
                  return false;
            }else{
                  return $query->result();
            }    
      }
    
    function GetIndividualService($ser_id)
  {
        $this->db->where('pro_id',$ser_id);
        $this->db->from('product_master');
		 $this->db->where('status',"active");
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
    
    
    function GetServicesCalibaration($dataid)
    {
          $this->db->where('product_sub_sub_catid',$dataid);
          $this->db->where('status',"active");		
          $this->db->from('product_master');
            $this->db->limit(60);
            $query=$this->db->get();
        // echo $this->db->last_query();
            if($query->num_rows()==''){
                  return false;
            }else{
                  return $query->result();
            } 
    }

  
	
}