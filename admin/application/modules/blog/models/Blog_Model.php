<?php class Blog_Model extends MY_Model{
	
	function __construct() {

		parent::__construct();
		
	}

	  public function get_blog(){
	
		$this->db->select('*');
		$this->db->order_by("id","desc");
		$query=$this->db->get('tbl_blog_category');

		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
				
			}
	}
	
	public function get_catid($catid){
	
		$this->db->select('*');
		$this->db->where("id",$catid);
		$query=$this->db->get('tbl_blog_category');

		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
				
			}
	}
	public function get_related_post(){
	
		$this->db->select('*');
		$query=$this->db->get('tbl_posts_blog');

		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
				
			}
	}
	
	
	function delete_data($id){
	 
	    $this->db->where('id',$id);
	    $this->db->delete('tbl_blog_category');
	}
	 
	 
	 
	 
	 
	 function delete_comment($id){
	 
	    $this->db->where('id',$id);
	    $this->db->delete('blog_comments');
	}
	 
	 
	 public function get_category(){
	
		$this->db->select('*');
		$query=$this->db->get('tbl_blog_category');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
				
			}
		
	}
	
	function blog_thumbnail_upload() 
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
      $config['upload_path'] = FCPATH . '/webroot/uploads/blog';
      $config['allowed_types'] = 'gif|jpg|png';
      for ($i = 0; $i < $number_of_files; $i++) {
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
			
			if($this->dev['categories_create_thumb']=="TRUE"){
		   	$config['image_library'] = 'gd2';
			$config['source_image']  = $data['uploads'][$i]['full_path'];
			$config['new_image']  = FCPATH . '/webroot/uploads/blog/thumbnail';
			if($this->dev['categories_maintain_ratio']=="TRUE") { $maintain_ratio=TRUE; } else { $maintain_ratio=FALSE; } 
            $config['maintain_ratio'] = $maintain_ratio;
			$config['width']	 = $this->dev['categories_thumbnail_width'];
			$config['height']	= $this->dev['categories_thumbnail_height'];
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
	
	public function get_post(){
	
		$this->db->select('*');
		$this->db->order_by("id","desc");
		$query=$this->db->get('tbl_posts_blog');

		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
				
			}
	}
	
	function delete_data_post($id){
	 
	    $this->db->where('id',$id);
	    $this->db->delete('tbl_posts_blog');
	}
	
	 public function get_edit_post($id){
	
		$this->db->select('*');
		$this->db->where("id",$id);
		$query=$this->db->get('tbl_posts_blog');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
				
			}
		
	}
	
	
	 public function get_edit_comment($id){
	
		$this->db->select('*');
		$this->db->where("id",$id);
		$query=$this->db->get('blog_comments');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
				
			}
		
	}
	
	function update_post($data,$id)
	{
		
		$this->db->where('id',$id);
		$this->db->update('tbl_posts_blog',$data);
	}
	
	function update_comment($data,$id)
	{
		
		$this->db->where('id',$id);
		$this->db->update('blog_comments',$data);
	}
	function update_category($data,$id)
	{
		
		$this->db->where('id',$id);
		$this->db->update('tbl_blog_category',$data);
		return true;
	}
	
//======================= FOR CLIENT REVIEW SECTION START HERE=========================================
    function get_review(){
	
		$this->db->select('*');
		$this->db->order_by("id","desc");
		$query=$this->db->get('client_reviews');

		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
				
			}
	}
	 function delete_review($id){
	 
	    $this->db->where('id',$id);
	    $this->db->delete('client_reviews');
	}
	
	function fetch_active_review($aid)
	{
		$this->db->where('id',$aid);
		$query=$this->db->get('client_reviews');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}
	 
//======================= FOR CLIENT REVIEW SECTION END HERE=========================================
   
}