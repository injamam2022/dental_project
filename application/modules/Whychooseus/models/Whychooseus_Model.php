<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whychooseus_Model extends MY_Model {

	public function get_settings()
	{
		$q = $this->db->get_where('why_choose_us_settings', array('id' => 1));
		if ($q->num_rows() !== 1) {
			return null;
		}
		return $q->row();
	}

	public function get_features()
	{
		$this->db->where('status', 'active');
		$this->db->order_by('sort_order', 'asc');
		$this->db->order_by('id', 'asc');
		$q = $this->db->get('why_choose_us_features');
		if ($q->num_rows() === 0) {
			return array();
		}
		return $q->result();
	}

	public function get_faqs()
	{
		$this->db->where('status', 'active');
		$this->db->order_by('sort_order', 'asc');
		$this->db->order_by('id', 'asc');
		$q = $this->db->get('why_choose_us_faq');
		if ($q->num_rows() === 0) {
			return array();
		}
		return $q->result();
	}

	public function get_banner()
	{
		$this->db->where('status', 'active');
		$this->db->where('type', '11');
		$this->db->limit(1);
		$q = $this->db->get('banner');
		if ($q->num_rows() !== 1) {
			return null;
		}
		return $q->row();
	}

	public function feature_icon_url($feature)
	{
		$path = isset($feature->icon_path) ? trim((string) $feature->icon_path) : '';
		if ($path === '') {
			return '';
		}
		if (preg_match('#^https?://#i', $path)) {
			return $path;
		}
		return base_url('assets/images/why-choose-us/'.$path);
	}
}
