<?php class Client_Model  extends MY_Model{
	
	
	function all_fatch_content($table)
	{
		$this->db->order_by('id','desc');
		$query=$this->db->get($table);
		if($query->num_rows == " ")
		{
			return false;
		}else{
			return $query->result();
		}
	}
	

	
	function insert_data($table,$data)
	{
		$this->db->insert($table,$data);
	}
    
	function get_homepage_content($table,$id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get($table);
		if($query->num_rows ==" "){
			return false;
		}else{
			return $query->result();
		}
	}
	function delet_single_data($table,$id)
	{
		$this->db->where('id',$id);
		$this->db->delete($table);
	}
	
	function update_data($id,$data,$table)
	{
		
		$this->db->where('id',$id);
		$this->db->update($table,$data);
		
	}
}	