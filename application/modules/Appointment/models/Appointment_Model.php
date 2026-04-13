<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment_Model extends MY_Model {

	public function insert_booking(array $data)
	{
		$this->db->insert('appointment_details', $data);
		return (int) $this->db->insert_id();
	}

	public function get_active_service_name($pro_id)
	{
		$this->db->select('product_name');
		$this->db->where('pro_id', (int) $pro_id);
		$this->db->where('status', 'active');
		$q = $this->db->get('product_master');
		if ($q->num_rows() !== 1) {
			return null;
		}
		return $q->row()->product_name;
	}
}
