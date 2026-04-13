<?php class Customer_Model  extends MY_Model{
	public function getallcustomer()
    {	  
		$this->db->order_by("customer_id","desc");
		$query=$this->db->get('customer_info');
		if($query->num_rows() ==''){
		return false;
		}else{
		return $query->result();				
		}
	   
	}

   function getallcustomerdetails($cusid){
	    $this->db->where("id",$cusid);
		$query=$this->db->get('customer_info');	
		return $query->row();				
		
   }
   function getallcustomerwalletlog($cusid){
	   $this->db->order_by("id","desc");
	    $this->db->where("customer_id",$cusid);
		$query=$this->db->get('customer_wallet_log');	
		return $query->result();				
		
   }
	function getallcustomerepointslog($cusid){
	   $this->db->order_by("id","desc");
	    $this->db->where("customer_id",$cusid);
		$query=$this->db->get('epoints');	
		return $query->result();				
		
   }

	function get_city_state_country($table,$id){
		 
	      $this->db->where("id",$id);
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->row();
			}
		
	}
	
	function getwalletbalance($cusid){
		$this->db->select('balance');
		$this->db->order_by('id', 'DESC');
		$this->db->where('customer_id',$cusid);
        $query=$this->db->get('customer_wallet_log');		
		return $query->row();
	}
	
	
	function getuserepointbalance($cusid)
	{
		$currentdate=date('Y-m-d');
		$this->db->select('*');		
		$this->db->where('expirydate >=',$currentdate);
		$this->db->where('customer_id',$cusid);
        $query=$this->db->get('epoints');		
		$quer=$query->result();
		$totalamt=0;		
		foreach($quer as $key=>$quer_val)
		{				
			$totalamt +=$quer_val->epointscredit; 	
			
		}
		return $totalamt;
	
	}
	
	function insertwallettransaction($data)
	{
		$this->db->insert('customer_wallet_log',$data);
		return true;
	}
	
	function deletecustomer($id){
		$this->db->where('id',$id);
		$this->db->delete('customer_info');
		 return true;
	}
	
}	