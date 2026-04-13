<?php class ProductManagement_Model  extends MY_Model{
	function __construct() {
		parent::__construct();
		
	}
	
	function fetch_all_products($table)
	{
		/*$this->db->order_by('pro_id','desc');
		$query=$this->db->get($table);*/
        $sql = "SELECT *, (SELECT c.cat_name FROM categories c WHERE c.cat_id=pm.`cat_id`) AS cat_name, (SELECT s.subcat_name FROM sub_categories s WHERE s.sub_catid=pm.`pro_sub_cat_id`) AS subcat_name, (SELECT sc.supercat_name FROM super_categories sc WHERE sc.super_catid=pm.`product_sub_sub_catid`) AS sub_subcat_name FROM `product_master` pm ORDER BY pm.`pro_id` DESC";
        $query = $this->db->query($sql);
        if($query->num_rows == " ")
		{
			return false;
		}else{
			return $query->result();
		}
	}
    
    function get_all_categories()
    {
       $this->db->select('*');
		
		$query=$this->db->get('categories');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}       
    }

	/** Categories shown when adding/editing services (dental & skin only). */
	function get_service_categories()
	{
		$this->db->select('*');
		$this->db->where('status', 'active');
		$this->db->group_start();
		$this->db->like('cat_name', 'Dental');
		$this->db->or_like('cat_name', 'Skin');
		$this->db->group_end();
		$this->db->order_by('cat_name', 'ASC');
		$query = $this->db->get('categories');
		if ($query->num_rows() == 0) {
			return $this->get_all_categories();
		}
		return $query->result();
	}



	function product_images_upload()
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
      $config['upload_path'] = FCPATH . '/webroot/uploads/product';
      $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
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
			/*$config['width']	 = 1351;
			$config['height']	= 500;*/
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





	
	function product_icon_upload()
	{
		
		/*return "hello";
		die();*/
		$name_array= array();
    $number_of_files = sizeof($_FILES['icon']['tmp_name']);
    $files = $_FILES['icon'];
    $errors = array();
    for($i=0;$i<$number_of_files;$i++)
    {
      if($_FILES['icon']['error'][$i] != 0) $errors[$i][] = 'Couldn\'t upload file '.$_FILES['icon']['name'][$i];
    }
		
		
		
    if(sizeof($errors)==0)
    {
		
      $this->load->library('upload');
      $config['upload_path'] = FCPATH . '/webroot/uploads/product_icon';
      $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
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
			/*$config['width']	 = 1351;
			$config['height']	= 500;*/
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
	
	function update_data($id,$data,$tablename)
	{         
              $this->db->where('pro_id',$id);
              $this->db->update($tablename,$data);
    }
	
	function delete_data($id,$tablename)
	{
                  $this->db->where('pro_id',$id);
		          $this->db->delete($tablename);
    }
	
	function get_data($id,$tablename)
	{
		$this->db->where('pro_id',$id);
		$query=$this->db->get($tablename);
		if($query->num_rows ==" "){
			return false;
		}else{
			return $query->result();
		}
	}
    
    function get_all_subsubcat()
	{
		
        $query=$this->db->group_by('supercat_name'); 
        $query=$this->db->get('super_categories');
        return $query->result();
		
	}
    function get_all_subcat()
	{
		
        $query=$this->db->group_by('subcat_name'); 
        $query=$this->db->get('sub_categories');
        return $query->result();
		
	}
    
    /*function get_all_categories_subcategories_join()
	{
        
        $this->db->select('*');
        $this->db->from('sub_categories sc');
        $this->db->join('categories c', 'sc.cat_id = c.cat_id', 'left');
        $query = $this->db->get(); 
        return $query->result();
     
       
		
	}*/

    function get_all_cat()
	{
		
     
        $query=$this->db->get('categories');
        return $query->result();
		
	}
    

	function Get_subcat($scat)
	{
		 $this->db->select('*');
        $this->db->from('sub_categories sc');
//        $this->db->join('categories c', 'sc.cat_id = c.cat_id', 'left');
        $this->db->where('sc.cat_id',$scat);
        $query = $this->db->get(); 
        return $query->result();
     
	}
    
    function Get_sub_subcat($scat)
	{
		 $this->db->select('*');
        $this->db->from('super_categories sc');
//        $this->db->join('categories c', 'sc.cat_id = c.cat_id', 'left');
        $this->db->where('sc.subcat_id',$scat);
        $query = $this->db->get(); 
        return $query->result();
     
	}
   
	
	
}	