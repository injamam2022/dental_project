<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('dontia_landing_project_root')) {
	function dontia_landing_project_root()
	{
		$fc = rtrim(str_replace('\\', '/', FCPATH), '/') . '/';
		if (is_dir($fc . 'application') && is_dir($fc . 'admin')) {
			return $fc;
		}
		return rtrim(str_replace('\\', '/', dirname(FCPATH)), '/') . '/';
	}
}

if (!function_exists('dontia_landing_site_base')) {
	function dontia_landing_site_base()
	{
		$CI =& get_instance();
		$base = rtrim($CI->config->base_url(), '/');
		if (substr($base, -6) === '/admin') {
			return substr($base, 0, -6) . '/';
		}
		return $base . '/';
	}
}

if (!function_exists('dontia_landing_pages_catalog')) {
	function dontia_landing_pages_catalog()
	{
		return array(
			'dental' => array('label' => 'Best Dental Clinic', 'route' => 'best-dental-clinic-in-kolkata'),
			'orthodontist' => array('label' => 'Orthodontist', 'route' => 'best-orthodontist-in-kolkata'),
			'dental_implant' => array('label' => 'Dental Implant', 'route' => 'best-dental-implant-clinic-in-kolkata'),
			'root_canal' => array('label' => 'Root Canal', 'route' => 'best-root-canal-treatment-in-kolkata'),
			'cosmetic_dentist' => array('label' => 'Cosmetic Dentist', 'route' => 'best-cosmetic-dentist-in-kolkata'),
			'tmj_specialist' => array('label' => 'TMJ Specialist', 'route' => 'tmj-specialist-in-kolkata'),
			'pediatric_dentist' => array('label' => 'Pediatric Dentist', 'route' => 'best-pediatric-dentist-in-kolkata'),
			'clear_aligners' => array('label' => 'Clear Aligners', 'route' => 'best-clear-aligners-clinic-in-kolkata'),
		);
	}
}

if (!function_exists('dontia_landing_section_labels')) {
	function dontia_landing_section_labels()
	{
		return array(
			'why_choose' => 'Why choose us cards',
			'specialisation' => 'Specialisation cards',
			'stat' => 'Stats / journey',
			'service' => 'Service cards',
			'procedure' => 'Procedure cards',
			'technology' => 'Technology cards',
			'transformation' => 'Successful transformations',
			'faq' => 'FAQs',
			'location' => 'About-section locations',
		);
	}
}

if (!function_exists('dontia_landing_shared_sections')) {
	function dontia_landing_shared_sections()
	{
		return array('why_choose', 'specialisation', 'stat', 'procedure', 'location');
	}
}

if (!function_exists('dontia_landing_image_url')) {
	function dontia_landing_image_url($name)
	{
		$name = str_replace('\\', '/', trim((string) $name));
		if ($name === '') {
			return '';
		}
		if (preg_match('#^https?://#i', $name)) {
			return $name;
		}
		$name = ltrim($name, '/');
		$site = dontia_landing_site_base();
		$root = dontia_landing_project_root();

		if (strpos($name, '/') !== false) {
			return $site . $name;
		}

		$dirs = array(
			'admin/webroot/uploads/landing_pages/',
			'admin/webroot/uploads/dental_media/',
			'admin/webroot/uploads/dental_page/defaults/',
			'admin/webroot/uploads/dental_page/services/',
			'admin/webroot/uploads/dental_page/technology/',
			'admin/webroot/uploads/banner/',
		);
		foreach ($dirs as $dir) {
			$fs = $root . $dir . $name;
			if (is_file($fs)) {
				return $site . $dir . rawurlencode($name);
			}
		}
		return $site . 'admin/webroot/uploads/landing_pages/' . rawurlencode($name);
	}
}

if (!function_exists('dontia_landing_admin_thumb')) {
	function dontia_landing_admin_thumb($name)
	{
		return dontia_landing_image_url($name);
	}
}

if (!function_exists('dontia_landing_seed_path')) {
	function dontia_landing_seed_path()
	{
		$root = dontia_landing_project_root();
		return $root . 'application/sql/landing_cms_seed.php';
	}
}

if (!function_exists('dontia_landing_flag')) {
	function dontia_landing_flag($row, $field, $default = 1)
	{
		if (!is_object($row) || !isset($row->{$field})) {
			return (int) $default === 1;
		}
		return (int) $row->{$field} === 1;
	}
}

if (!function_exists('dontia_landing_text')) {
	function dontia_landing_text($row, $field, $fallback = '')
	{
		if (!is_object($row) || !isset($row->{$field})) {
			return $fallback;
		}
		$val = trim((string) $row->{$field});
		return $val !== '' ? $val : $fallback;
	}
}

if (!function_exists('dontia_landing_page_columns')) {
	function dontia_landing_page_columns()
	{
		return array(
			'page_key' => "varchar(80) NOT NULL",
			'page_label' => "varchar(255) NOT NULL",
			'status' => "enum('active','inactivate') NOT NULL DEFAULT 'active'",
			'brand_name' => "varchar(255) DEFAULT NULL",
			'hero_heading' => "varchar(500) DEFAULT NULL",
			'hero_subheading' => "text DEFAULT NULL",
			'hero_image' => "varchar(512) DEFAULT NULL",
			'hero_image_alt' => "varchar(255) DEFAULT NULL",
			'hero_video_id' => "varchar(64) DEFAULT NULL",
			'intro_heading' => "varchar(500) DEFAULT NULL",
			'intro_html' => "mediumtext DEFAULT NULL",
			'intro_image' => "varchar(512) DEFAULT NULL",
			'intro_image_alt' => "varchar(255) DEFAULT NULL",
			'extra_html' => "mediumtext DEFAULT NULL",
			'why_heading' => "varchar(500) DEFAULT NULL",
			'why_subheading' => "varchar(500) DEFAULT NULL",
			'specialisations_heading' => "varchar(500) DEFAULT NULL",
			'specialisations_subheading' => "varchar(500) DEFAULT NULL",
			'stats_heading' => "varchar(500) DEFAULT NULL",
			'services_heading' => "varchar(500) DEFAULT NULL",
			'services_subheading' => "varchar(500) DEFAULT NULL",
			'doctors_heading' => "varchar(500) DEFAULT NULL",
			'procedures_heading' => "varchar(500) DEFAULT NULL",
			'procedures_subheading' => "varchar(500) DEFAULT NULL",
			'tech_heading' => "varchar(500) DEFAULT NULL",
			'transform_heading' => "varchar(500) DEFAULT NULL",
			'testimonials_heading' => "varchar(500) DEFAULT NULL",
			'testimonials_subheading' => "varchar(500) DEFAULT NULL",
			'reviews_heading' => "varchar(500) DEFAULT NULL",
			'reviews_subheading' => "varchar(500) DEFAULT NULL",
			'reviews_url' => "varchar(512) DEFAULT NULL",
			'gallery_heading' => "varchar(500) DEFAULT NULL",
			'gallery_subheading' => "varchar(500) DEFAULT NULL",
			'certs_heading' => "varchar(500) DEFAULT NULL",
			'certs_subheading' => "varchar(500) DEFAULT NULL",
			'blog_heading' => "varchar(500) DEFAULT NULL",
			'blog_subheading' => "varchar(500) DEFAULT NULL",
			'faq_heading' => "varchar(500) DEFAULT NULL",
			'faq_subheading' => "varchar(500) DEFAULT NULL",
			'cta_heading' => "varchar(500) DEFAULT NULL",
			'cta_html' => "mediumtext DEFAULT NULL",
			'show_specialisations' => "tinyint(1) NOT NULL DEFAULT 1",
			'show_stats' => "tinyint(1) NOT NULL DEFAULT 1",
			'show_services' => "tinyint(1) NOT NULL DEFAULT 1",
			'show_doctors' => "tinyint(1) NOT NULL DEFAULT 1",
			'show_procedures' => "tinyint(1) NOT NULL DEFAULT 1",
			'show_tech' => "tinyint(1) NOT NULL DEFAULT 1",
			'show_transformations' => "tinyint(1) NOT NULL DEFAULT 1",
			'show_videos' => "tinyint(1) NOT NULL DEFAULT 1",
			'show_reviews' => "tinyint(1) NOT NULL DEFAULT 1",
			'show_gallery' => "tinyint(1) NOT NULL DEFAULT 1",
			'show_certs' => "tinyint(1) NOT NULL DEFAULT 1",
			'show_blogs' => "tinyint(1) NOT NULL DEFAULT 1",
			'show_faqs' => "tinyint(1) NOT NULL DEFAULT 1",
			'show_locations' => "tinyint(1) NOT NULL DEFAULT 0",
			'show_extra' => "tinyint(1) NOT NULL DEFAULT 0",
			'show_cta' => "tinyint(1) NOT NULL DEFAULT 0",
		);
	}
}

if (!function_exists('dontia_landing_ensure_tables')) {
	function dontia_landing_ensure_tables($db)
	{
		$db->query("CREATE TABLE IF NOT EXISTS `landing_pages` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`page_key` varchar(80) NOT NULL,
			`page_label` varchar(255) NOT NULL,
			`status` enum('active','inactivate') NOT NULL DEFAULT 'active',
			`created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
			`updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`),
			UNIQUE KEY `page_key` (`page_key`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

		$cols = dontia_landing_page_columns();
		$existing = $db->list_fields('landing_pages');
		if (!is_array($existing)) {
			$existing = array();
		}
		$prev = 'page_label';
		foreach ($cols as $name => $ddl) {
			if (!in_array($name, $existing, true)) {
				$db->query('ALTER TABLE `landing_pages` ADD COLUMN `' . $name . '` ' . $ddl . ' AFTER `' . $prev . '`');
			}
			$prev = $name;
		}

		$db->query("CREATE TABLE IF NOT EXISTS `landing_page_items` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`page_key` varchar(80) NOT NULL,
			`section_key` varchar(80) NOT NULL,
			`title` varchar(500) DEFAULT NULL,
			`description` text DEFAULT NULL,
			`image_name` varchar(512) DEFAULT NULL,
			`image_alt` varchar(255) DEFAULT NULL,
			`image_name_2` varchar(512) DEFAULT NULL,
			`image_alt_2` varchar(255) DEFAULT NULL,
			`link_url` varchar(512) DEFAULT NULL,
			`sort_order` int(11) NOT NULL DEFAULT 0,
			`status` enum('active','inactivate') NOT NULL DEFAULT 'active',
			`created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
			`updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`),
			KEY `page_section` (`page_key`,`section_key`,`sort_order`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
	}
}

if (!function_exists('dontia_landing_seed_defaults')) {
	function dontia_landing_seed_defaults($db)
	{
		$seed_file = dontia_landing_seed_path();
		if (!is_file($seed_file)) {
			return;
		}
		$seed = include $seed_file;
		if (!is_array($seed) || empty($seed['pages'])) {
			return;
		}
		$cols = array_keys(dontia_landing_page_columns());
		foreach ($seed['pages'] as $page) {
			if (empty($page['page_key'])) {
				continue;
			}
			$q = $db->get_where('landing_pages', array('page_key' => $page['page_key']), 1);
			if ($q && $q->num_rows() > 0) {
				continue;
			}
			$row = array();
			foreach ($cols as $c) {
				if (array_key_exists($c, $page)) {
					$row[$c] = $page[$c];
				}
			}
			$db->insert('landing_pages', $row);
		}
		if (empty($seed['items']) || !is_array($seed['items'])) {
			return;
		}
		foreach ($seed['items'] as $it) {
			if (empty($it['page_key']) || empty($it['section_key'])) {
				continue;
			}
			$db->where('page_key', $it['page_key']);
			$db->where('section_key', $it['section_key']);
			$db->where('title', isset($it['title']) ? $it['title'] : '');
			$exists = $db->get('landing_page_items');
			if ($exists && $exists->num_rows() > 0) {
				continue;
			}
			$db->insert('landing_page_items', array(
				'page_key' => $it['page_key'],
				'section_key' => $it['section_key'],
				'title' => isset($it['title']) ? $it['title'] : '',
				'description' => isset($it['description']) ? $it['description'] : '',
				'image_name' => isset($it['image_name']) ? $it['image_name'] : '',
				'image_alt' => isset($it['image_alt']) ? $it['image_alt'] : '',
				'image_name_2' => isset($it['image_name_2']) ? $it['image_name_2'] : '',
				'image_alt_2' => isset($it['image_alt_2']) ? $it['image_alt_2'] : '',
				'link_url' => isset($it['link_url']) ? $it['link_url'] : '',
				'sort_order' => isset($it['sort_order']) ? (int) $it['sort_order'] : 0,
				'status' => isset($it['status']) ? $it['status'] : 'active',
			));
		}
	}
}
