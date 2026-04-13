<?php class Partner_Model  extends MY_Model{
	
	
	function all_fatch_partner($id)
	{
		$this->db->order_by('id','desc');
        $this->db->where('type', $id);
		$query=$this->db->get('partner');
        
		if($query->num_rows == " ")
		{
			return false;
		}else{
			return $query->result();
		}
	}
	
function partner_images_upload()
	{
	$name_array= array();
    $number_of_files = sizeof($_FILES['uploadedimages']['tmp_name']);
    $files = $_FILES['uploadedimages'];
    $errors = array();
    for($i=0;$i<$number_of_files;$i++)
    {
      if($_FILES['uploadedimages']['error'][$i] != 0) $errors[$i][] = 'Couldn\'t upload file '.$_FILES['uploadedimages']['name'][$i];
    }
    if(sizeof($errors)==0)
    {
      $this->load->library('upload');
      $config['upload_path'] = FCPATH . '/webroot/uploads/partner';
      $config['allowed_types'] = 'gif|jpg|png';
      for ($i = 0; $i < $number_of_files; $i++){
        $_FILES['uploadedimage']['name'] = $files['name'][$i];
        $_FILES['uploadedimage']['type'] = $files['type'][$i];
        $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
        $_FILES['uploadedimage']['error'] = $files['error'][$i];
        $_FILES['uploadedimage']['size'] = $files['size'][$i];
        $this->upload->initialize($config);
        if ($this->upload->do_upload('uploadedimage'))
        {
           $data['uploads'][$i] = $this->upload->data();
		    $name_array[] = $data['uploads'][$i]['file_name'];
			
			if("TRUE"=="TRUE"){
		   	$config['image_library'] = 'gd2';
			$config['source_image']  = $data['uploads'][$i]['full_path'];
			//if($this->dev['categories_maintain_ratio']=="TRUE") { $maintain_ratio=TRUE; } else { $maintain_ratio=FALSE; } 
            $config['maintain_ratio'] = false;
			$config['quality'] = '100%';
			$config['width']	 = 1351;
			$config['height']	= 500;
			$this->image_lib->initialize($config); 
		    $this->load->library('image_lib', $config); 
            $this->image_lib->resize();
			}
        }
        else
        {
          $data['upload_errors'][$i] = $this->upload->display_errors();
		  $errors[]=$data['upload_errors'][$i];
		  print_r ($this->upload->display_errors());
		  return FALSE;
        }
      }
    }
    else
    {
     
    }	
	
	 return $names= implode(',', $name_array);
	}
	
	
	function insert_partner($data)
	{
		$this->db->insert('partner',$data);
	}
	function get_partner($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('partner');
		if($query->num_rows ==" "){
			return false;
		}else{
			return $query->result();
		}
	}
	function delet_partner_single($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('partner');
	}
	
	function update_partners($id,$data)
	{
		
		$this->db->where('id',$id);
		$this->db->update('partner',$data);
		
	}
}	