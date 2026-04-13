<?php class Banner_Model  extends MY_Model{
	
	
	function all_fatch_banner()
	{
        //$id
		$this->db->order_by('id','desc');
       // $this->db->where('type', $id);
		$query=$this->db->get('banner');
        
		if($query->num_rows == " ")
		{
			return false;
		}else{
			return $query->result();
		}
	}
	
function banner_images_upload()
	{
		$name_array = array();

		if (empty($_FILES['uploadedimages']['tmp_name']) || ! is_array($_FILES['uploadedimages']['tmp_name']))
		{
			return FALSE;
		}

		$files = $_FILES['uploadedimages'];
		$number_of_files = count($files['tmp_name']);
		$errors = array();

		for ($i = 0; $i < $number_of_files; $i++)
		{
			if ($files['error'][$i] != 0)
			{
				$errors[$i][] = 'Couldn\'t upload file ' . $files['name'][$i];
			}
		}

		if (count($errors) > 0)
		{
			return FALSE;
		}

		$upload_path = FCPATH . 'webroot' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'banner';
		if ( ! is_dir($upload_path) && ! @mkdir($upload_path, 0755, TRUE))
		{
			log_message('error', 'Banner upload: could not create directory: ' . $upload_path);
			return FALSE;
		}

		$this->load->library('upload');
		$upload_config = array(
			'upload_path'   => $upload_path,
			'allowed_types' => 'gif|jpg|jpeg|png',
		);

		for ($i = 0; $i < $number_of_files; $i++)
		{
			$_FILES['uploadedimage']['name']     = $files['name'][$i];
			$_FILES['uploadedimage']['type']     = $files['type'][$i];
			$_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
			$_FILES['uploadedimage']['error']    = $files['error'][$i];
			$_FILES['uploadedimage']['size']     = $files['size'][$i];

			$this->upload->initialize($upload_config);

			if ($this->upload->do_upload('uploadedimage'))
			{
				$upload_data = $this->upload->data();
				$name_array[] = $upload_data['file_name'];

				$resize_config = array(
					'image_library'  => 'gd2',
					'source_image'   => $upload_data['full_path'],
					'maintain_ratio' => FALSE,
					'quality'        => '100%',
					'width'          => 1351,
					'height'         => 500,
				);
				$this->image_lib->initialize($resize_config);
				if ( ! $this->image_lib->resize())
				{
					log_message('error', 'Banner image resize: ' . $this->image_lib->display_errors('', ''));
				}
				$this->image_lib->clear();
			}
			else
			{
				log_message('error', 'Banner upload: ' . $this->upload->display_errors('', ''));
				return FALSE;
			}
		}

		return count($name_array) ? implode(',', $name_array) : FALSE;
	}
	
	
	function insert_banner($data)
	{
		$this->db->insert('banner',$data);
	}
	function get_banner($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('banner');
		if($query->num_rows ==" "){
			return false;
		}else{
			return $query->result();
		}
	}
	function delet_banner_single($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('banner');
	}
	
	function update_banners($id,$data)
	{
		
		$this->db->where('id',$id);
		$this->db->update('banner',$data);
		
	}
}	