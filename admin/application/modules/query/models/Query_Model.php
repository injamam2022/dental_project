<?php class Query_Model  extends MY_Model{
	
	
	
	public function getallquery()
    {	  
		$this->db->order_by("id","desc");
		$query=$this->db->get('query_list');
		if($query->num_rows() ==''){
		return false;
		}else{
		return $query->result();				
		}
	   
	}
	public function getallnewsletter()
    {	  
		$this->db->order_by("id","desc");
		$query=$this->db->get('newsletter');
		if($query->num_rows() ==''){
		return false;
		}else{
		return $query->result();				
		}
	   
	}
	
	function delete_data($table,$id)
	{	
          $this->db->where('id',$id);
		  $this->db->delete($table);
    }
	
}	