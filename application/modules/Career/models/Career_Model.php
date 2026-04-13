<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Career_Model extends MY_Model{
	
	
/*========================================= STRART BANNER SECTION  HERE ==================================================*/
	function GetBanner(){
	
		$this->db->select('*');
		$this->db->where('status','active');
		$this->db->where('type','10');
		$query=$this->db->get('banner');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}
    function GetCarrerContent(){
	
		$this->db->select('*');
		$query=$this->db->get('carrerpagecontent');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}

    function insert_data($table,$data)
	{
        $this->db->insert($table,$data);
    }

  function resume_upload()
	{
	$name_array= array();
    $number_of_files = sizeof($_FILES['resume']['tmp_name']);
    $files = $_FILES['resume'];
    $errors = array();
    for($i=0;$i<$number_of_files;$i++)
    {
      if($_FILES['resume']['error'][$i] != 0) $errors[$i][] = 'Couldn\'t upload file '.$_FILES['resume']['name'][$i];
    }
      
    if(sizeof($errors)==0)
    {
      $this->load->library('upload');
      $config['upload_path'] = FCPATH .'assets/images/resume';
      $config['allowed_types'] = 'doc|jpg|png|pdf|jpeg|docx';
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
//            $config['maintain_ratio'] = false;
//			$config['quality'] = '100%';
			/*$config['width']	 = 1351;
			$config['height']	= 500;*/
//			$this->image_lib->initialize($config); 
//		    $this->load->library('image_lib', $config); 
//            $this->image_lib->resize();
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
    
}