<?php class Gallery_Model  extends MY_Model{
	
	
	function all_fatch_banner()
	{
		$this->db->order_by('id','desc');
		$query=$this->db->get('gallery_management');
		if($query->num_rows == " ")
		{
			return false;
		}else{
			return $query->result();
		}
	}
	
function banner_images_upload()
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
      $config['upload_path'] = FCPATH . '/webroot/uploads/banner';
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
	
	
	function insert_banner($data)
	{
		$this->db->insert('gallery_management',$data);
	}
	function get_banner($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('gallery_management');
		if($query->num_rows ==" "){
			return false;
		}else{
			return $query->result();
		}
	}
	function delet_banner_single($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('gallery_management');
	}
	
	function update_banners($id,$data)
	{
		
		$this->db->where('id',$id);
		$this->db->update('gallery_management',$data);
		
	}
}	