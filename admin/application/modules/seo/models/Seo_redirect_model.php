<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo_redirect_model extends CI_Model {

	public function ensure_table()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `seo_redirect` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`source_url` varchar(512) NOT NULL,
			`target_url` varchar(512) NOT NULL DEFAULT '',
			`http_code` smallint(5) NOT NULL DEFAULT 301,
			`status` enum('active','inactive') NOT NULL DEFAULT 'active',
			`notes` varchar(255) NOT NULL DEFAULT '',
			`created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
			`updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`),
			UNIQUE KEY `source_url` (`source_url`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
		$this->db->query($sql);
	}

	public function get_all()
	{
		if ( ! $this->db->table_exists('seo_redirect')) {
			return array();
		}
		$this->db->order_by('source_url', 'ASC');
		return $this->db->get('seo_redirect')->result();
	}

	public function get_by_id($id)
	{
		if ( ! $this->db->table_exists('seo_redirect')) {
			return null;
		}
		$id = (int) $id;
		if ($id < 1) {
			return null;
		}
		return $this->db->get_where('seo_redirect', array('id' => $id))->row();
	}

	public function source_exists($source_url, $exclude_id = 0)
	{
		if ( ! $this->db->table_exists('seo_redirect')) {
			return false;
		}
		$this->db->where('source_url', $source_url);
		$exclude_id = (int) $exclude_id;
		if ($exclude_id > 0) {
			$this->db->where('id !=', $exclude_id);
		}
		return $this->db->count_all_results('seo_redirect') > 0;
	}

	public function insert_row(array $data)
	{
		if ( ! $this->db->table_exists('seo_redirect')) {
			return false;
		}
		$this->db->insert('seo_redirect', $data);
		return (int) $this->db->insert_id();
	}

	public function update_row($id, array $data)
	{
		$id = (int) $id;
		if ($id < 1 || ! $this->db->table_exists('seo_redirect')) {
			return false;
		}
		$this->db->where('id', $id);
		return $this->db->update('seo_redirect', $data);
	}

	public function delete_row($id)
	{
		$id = (int) $id;
		if ($id < 1 || ! $this->db->table_exists('seo_redirect')) {
			return false;
		}
		$this->db->where('id', $id);
		return $this->db->delete('seo_redirect');
	}
}
