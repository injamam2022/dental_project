<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whychooseus_model extends MY_Model {

	public function get_settings()
	{
		$q = $this->db->get_where('why_choose_us_settings', array('id' => 1));
		if ($q->num_rows() !== 1) {
			return null;
		}
		return $q->row();
	}

	public function save_settings(array $data)
	{
		$q = $this->db->get_where('why_choose_us_settings', array('id' => 1));
		if ($q->num_rows() === 0) {
			$data['id'] = 1;
			return $this->db->insert('why_choose_us_settings', $data);
		}
		$this->db->where('id', 1);
		return $this->db->update('why_choose_us_settings', $data);
	}

	public function get_features()
	{
		$this->db->order_by('sort_order', 'asc');
		$this->db->order_by('id', 'asc');
		$q = $this->db->get('why_choose_us_features');
		return $q->result();
	}

	public function get_feature($id)
	{
		$this->db->where('id', (int) $id);
		$q = $this->db->get('why_choose_us_features');
		if ($q->num_rows() !== 1) {
			return null;
		}
		return $q->row();
	}

	public function insert_feature(array $data)
	{
		return $this->db->insert('why_choose_us_features', $data);
	}

	public function update_feature($id, array $data)
	{
		$this->db->where('id', (int) $id);
		return $this->db->update('why_choose_us_features', $data);
	}

	public function delete_feature($id)
	{
		$this->db->where('id', (int) $id);
		return $this->db->delete('why_choose_us_features');
	}

	public function get_faqs()
	{
		$this->db->order_by('sort_order', 'asc');
		$this->db->order_by('id', 'asc');
		$q = $this->db->get('why_choose_us_faq');
		return $q->result();
	}

	public function get_faq($id)
	{
		$this->db->where('id', (int) $id);
		$q = $this->db->get('why_choose_us_faq');
		if ($q->num_rows() !== 1) {
			return null;
		}
		return $q->row();
	}

	public function insert_faq(array $data)
	{
		return $this->db->insert('why_choose_us_faq', $data);
	}

	public function update_faq($id, array $data)
	{
		$this->db->where('id', (int) $id);
		return $this->db->update('why_choose_us_faq', $data);
	}

	public function delete_faq($id)
	{
		$this->db->where('id', (int) $id);
		return $this->db->delete('why_choose_us_faq');
	}
}
