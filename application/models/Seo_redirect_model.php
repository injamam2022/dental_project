<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo_redirect_model extends CI_Model {

	/** @var array<string, object>|null */
	protected static $lookup = null;

	public function ensure_table()
	{
		if ($this->db->table_exists('seo_redirect')) {
			return;
		}
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

	/**
	 * @return object|null
	 */
	public function find_active_for_path($request_path)
	{
		$key = seo_redirect_normalize_path($request_path);
		if ($key === '') {
			return null;
		}
		$map = $this->active_lookup();
		return isset($map[$key]) ? $map[$key] : null;
	}

	/**
	 * @return array<string, object>
	 */
	protected function active_lookup()
	{
		if (self::$lookup !== null) {
			return self::$lookup;
		}
		self::$lookup = array();
		if ( ! $this->db->table_exists('seo_redirect')) {
			return self::$lookup;
		}
		$this->db->where('status', 'active');
		$rows = $this->db->get('seo_redirect')->result();
		foreach ($rows as $row) {
			$key = seo_redirect_normalize_path($row->source_url);
			if ($key !== '') {
				self::$lookup[$key] = $row;
			}
		}
		return self::$lookup;
	}
}
