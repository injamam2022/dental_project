<?php class Dashboard_Model  extends MY_Model{
	
	
	
	
	function update_profile($data)
	{
		$this->db->where('id',$this->session->userdata('loginDetail')->id);
		$this->db->update('admin_login',$data);
	}
	function user_picture() {	
     	$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => FCPATH . '/webroot/uploads/profile-pic',
			'max_size' => 20000
		);		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
	    return $image_data = $this->upload->data();
	}	
	
	function get_countrycode(){
	
		 $query=$this->db->get('countries');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
	
	function city_city_by(){
		 $this->db->where("state_id",1);
		 $query=$this->db->get('cities');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
	function get_statecode($id){
	     
		 $this->db->where("country_id",$id);
		 $query=$this->db->get('states');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
	
	function get_state_by(){

		 $this->db->where("country_id",101);
		 $query=$this->db->get('states');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
	function get_citycode($id){
	     
		 $this->db->where("state_id",$id);
		 $query=$this->db->get('cities');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
	
	function get_selectedcity($stateid){
		 $this->db->where("state_id",$stateid);
		 $query=$this->db->get('cities');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
	
	
	
}	