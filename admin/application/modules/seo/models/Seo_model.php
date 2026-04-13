<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo_model extends CI_Model {

	public function get_all()
	{
		if ( ! $this->db->table_exists('seo_page_meta')) {
			return array();
		}
		$this->db->order_by('page_label', 'ASC');
		return $this->db->get('seo_page_meta')->result();
	}

	public function get_by_id($id)
	{
		if ( ! $this->db->table_exists('seo_page_meta')) {
			return null;
		}
		$id = (int) $id;
		if ($id < 1) {
			return null;
		}
		return $this->db->get_where('seo_page_meta', array('id' => $id))->row();
	}

	public function update_row($id, array $data)
	{
		$id = (int) $id;
		if ($id < 1 || ! $this->db->table_exists('seo_page_meta')) {
			return false;
		}
		$this->db->where('id', $id);
		return $this->db->update('seo_page_meta', $data);
	}
}
