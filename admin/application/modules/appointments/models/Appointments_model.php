<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments_model extends MY_Model {

	public function get_all()
	{
		$this->db->order_by('id', 'desc');
		$q = $this->db->get('appointment_details');
		if ($q->num_rows() === 0) {
			return false;
		}
		return $q->result();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', (int) $id);
		$this->db->delete('appointment_details');
	}
}
