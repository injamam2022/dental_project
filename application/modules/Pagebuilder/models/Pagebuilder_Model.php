<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagebuilder_Model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('page_builder');
		pb_ensure_tables($this->db);
	}

	public function find_by_slug($slug)
	{
		$q = $this->db->where('slug', (string) $slug)->get('pb_pages');
		return $q->num_rows() ? $q->row() : null;
	}

	/** Active sections in display order, with decoded data attached as ->content. */
	public function active_sections($page_id)
	{
		$rows = $this->db->where('page_id', (int) $page_id)
			->where('is_active', 1)
			->order_by('sort_order', 'asc')
			->order_by('id', 'asc')
			->get('pb_sections')->result();
		$types = pb_section_types();
		$out = array();
		foreach ($rows as $r) {
			if (!isset($types[$r->type])) {
				continue;
			}
			$r->content = pb_decode_data($r->type, $r->data);
			$out[] = $r;
		}
		return $out;
	}
}
