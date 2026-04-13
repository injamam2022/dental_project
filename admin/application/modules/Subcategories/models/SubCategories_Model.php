<?php class SubCategories_Model  extends MY_Model{
	function __construct() {
		parent::__construct();
		
	}
	
	function all_fatch_sup_category()
	{
		$this->db->order_by('sub_catid','desc');
		$query=$this->db->get('sub_categories');
		if($query->num_rows == " ")
		{
			return false;
		}
		else{
			return $query->result();
		}
	}


	function super_cat_images_upload()
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
      $config['upload_path'] = FCPATH . '/webroot/uploads/sub_cat';
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
	function insert_data($table,$data)
	{
              $this->db->insert($table,$data);
    }
	
	function update_data($id,$data)
	{         
              $this->db->where('sub_catid',$id);
              $this->db->update('sub_categories',$data);
    }
	
	function delete_data($id)
	{
                  $this->db->where('sub_catid',$id);
		          $this->db->delete('sub_categories');
    }
	
	function get_data($id)
	{
		$this->db->where('sub_catid',$id);
		$query=$this->db->get('sub_categories');
		if($query->num_rows ==" "){
			return false;
		}else{
			return $query->result();
		}
	}

	function get_supercat()
	{
		
		$query=$this->db->get('categories');
		if($query->num_rows ==" "){
			return false;
		}else{
			return $query->result();
		}
	}
   
	
	
}	