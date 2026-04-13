<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hometechnology_model extends MY_Model {

	private function upload_dir()
	{
		$dir = FCPATH . 'webroot/uploads/home_technology';
		if (!is_dir($dir)) {
			@mkdir($dir, 0755, true);
		}
		return $dir . DIRECTORY_SEPARATOR;
	}

	public function get_settings()
	{
		$q = $this->db->get_where('home_technology_settings', array('id' => 1));
		return $q->num_rows() === 1 ? $q->row() : null;
	}

	public function save_settings(array $data)
	{
		$q = $this->db->get_where('home_technology_settings', array('id' => 1));
		if ($q->num_rows() === 0) {
			$data['id'] = 1;
			return $this->db->insert('home_technology_settings', $data);
		}
		$this->db->where('id', 1);
		return $this->db->update('home_technology_settings', $data);
	}

	public function get_items()
	{
		$this->db->order_by('sort_order', 'asc');
		$this->db->order_by('id', 'asc');
		return $this->db->get('home_technology_items')->result();
	}

	public function get_item($id)
	{
		$this->db->where('id', (int) $id);
		$q = $this->db->get('home_technology_items');
		return $q->num_rows() === 1 ? $q->row() : null;
	}

	public function insert_item(array $data)
	{
		return $this->db->insert('home_technology_items', $data);
	}

	public function update_item($id, array $data)
	{
		$this->db->where('id', (int) $id);
		return $this->db->update('home_technology_items', $data);
	}

	public function delete_item($id)
	{
		$row = $this->get_item($id);
		if ($row && $row->image_name !== '') {
			$f = $this->upload_dir() . basename($row->image_name);
			if (is_file($f)) {
				@unlink($f);
			}
		}
		$this->db->where('id', (int) $id);
		return $this->db->delete('home_technology_items');
	}

	/**
	 * @return string|false file name on success
	 */
	public function upload_image()
	{
		if (empty($_FILES['tech_image']['name']) || (int) $_FILES['tech_image']['error'] !== 0) {
			return false;
		}
		$config = array(
			'upload_path'   => rtrim($this->upload_dir(), DIRECTORY_SEPARATOR),
			'allowed_types' => 'gif|jpg|jpeg|png|webp|svg',
			'max_size'      => 8192,
			'encrypt_name'  => true,
		);
		$this->load->library('upload');
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('tech_image')) {
			return false;
		}
		$d = $this->upload->data();
		return isset($d['file_name']) ? $d['file_name'] : false;
	}
}
