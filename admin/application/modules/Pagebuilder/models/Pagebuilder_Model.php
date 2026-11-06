<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagebuilder_Model extends MY_Model {

	const MAX_IMAGE_WIDTH = 1920;

	public function __construct()
	{
		parent::__construct();
		pb_load_shared_helper();
		pb_ensure_tables($this->db);
	}

	/* ---------------- Pages ---------------- */

	public function all_pages()
	{
		$this->db->select('p.*, (SELECT COUNT(*) FROM pb_sections s WHERE s.page_id = p.id) AS section_count', false);
		$this->db->order_by('p.updated_at', 'desc');
		return $this->db->get('pb_pages p')->result();
	}

	public function find_page($id)
	{
		$q = $this->db->where('id', (int) $id)->get('pb_pages');
		return $q->num_rows() ? $q->row() : null;
	}

	public function slug_taken($slug, $except_id = 0)
	{
		$this->db->where('slug', (string) $slug);
		if ($except_id) {
			$this->db->where('id !=', (int) $except_id);
		}
		return $this->db->count_all_results('pb_pages') > 0;
	}

	public function insert_page(array $data)
	{
		$now = pb_now();
		$data['created_at'] = $now;
		$data['updated_at'] = $now;
		$this->db->insert('pb_pages', $data);
		return (int) $this->db->insert_id();
	}

	public function update_page($id, array $data)
	{
		$data['updated_at'] = pb_now();
		$this->db->where('id', (int) $id)->update('pb_pages', $data);
	}

	public function touch_page($id)
	{
		$this->db->where('id', (int) $id)->update('pb_pages', array('updated_at' => pb_now()));
	}

	public function delete_page($id)
	{
		$this->db->where('page_id', (int) $id)->delete('pb_sections');
		$this->db->where('id', (int) $id)->delete('pb_pages');
	}

	public function duplicate_page($id)
	{
		$page = $this->find_page($id);
		if (!$page) {
			return 0;
		}
		$base = $page->slug . '-copy';
		$slug = $base;
		$n = 2;
		while ($this->slug_taken($slug)) {
			$slug = $base . '-' . $n++;
		}
		$new_id = $this->insert_page(array(
			'title' => $page->title . ' (copy)',
			'slug' => $slug,
			'meta_title' => $page->meta_title,
			'meta_description' => $page->meta_description,
			'meta_keywords' => $page->meta_keywords,
			'og_image' => $page->og_image,
			'robots' => $page->robots,
			'status' => 'draft',
		));
		foreach ($this->sections($id) as $s) {
			$this->insert_section($new_id, $s->type, $s->admin_label, $s->data, $s->sort_order, $s->is_active);
		}
		return $new_id;
	}

	/* ---------------- Sections ---------------- */

	public function sections($page_id)
	{
		return $this->db->where('page_id', (int) $page_id)
			->order_by('sort_order', 'asc')->order_by('id', 'asc')
			->get('pb_sections')->result();
	}

	public function find_section($id)
	{
		$q = $this->db->where('id', (int) $id)->get('pb_sections');
		return $q->num_rows() ? $q->row() : null;
	}

	public function next_sort_order($page_id)
	{
		$row = $this->db->select_max('sort_order', 'm')->where('page_id', (int) $page_id)->get('pb_sections')->row();
		return ($row && $row->m !== null) ? ((int) $row->m + 10) : 10;
	}

	public function insert_section($page_id, $type, $label, $data_json, $sort_order = null, $is_active = 1)
	{
		$now = pb_now();
		$this->db->insert('pb_sections', array(
			'page_id' => (int) $page_id,
			'type' => (string) $type,
			'admin_label' => (string) $label,
			'sort_order' => $sort_order === null ? $this->next_sort_order($page_id) : (int) $sort_order,
			'is_active' => (int) $is_active,
			'data' => (string) $data_json,
			'created_at' => $now,
			'updated_at' => $now,
		));
		$id = (int) $this->db->insert_id();
		$this->touch_page($page_id);
		return $id;
	}

	public function update_section($id, array $data)
	{
		$data['updated_at'] = pb_now();
		$this->db->where('id', (int) $id)->update('pb_sections', $data);
	}

	public function delete_section($id)
	{
		$this->db->where('id', (int) $id)->delete('pb_sections');
	}

	/** Save a new order: $ids is the list of section ids top → bottom. */
	public function reorder_sections($page_id, array $ids)
	{
		$order = 10;
		foreach ($ids as $id) {
			$this->db->where('id', (int) $id)->where('page_id', (int) $page_id)
				->update('pb_sections', array('sort_order' => $order));
			$order += 10;
		}
		$this->touch_page($page_id);
	}

	/** Insert a copy of a section directly below the original. */
	public function duplicate_section($id)
	{
		$s = $this->find_section($id);
		if (!$s) {
			return 0;
		}
		$this->db->set('sort_order', 'sort_order + 10', false)
			->where('page_id', (int) $s->page_id)
			->where('sort_order >', (int) $s->sort_order)
			->update('pb_sections');
		return $this->insert_section($s->page_id, $s->type, trim($s->admin_label . ' (copy)'), $s->data, (int) $s->sort_order + 10, 0);
	}

	/* ---------------- Images ---------------- */

	/**
	 * Upload one image from $_FILES[$field]. Returns the stored file name, '' when no file was sent,
	 * or false on failure (error message in $this->upload_error).
	 * Large photos are scaled down to MAX_IMAGE_WIDTH so pages stay fast.
	 */
	public $upload_error = '';

	public function upload_image($field)
	{
		if (empty($_FILES[$field]['name'])) {
			return '';
		}
		$dir = rtrim(pb_project_root() . pb_upload_dir_rel(), '/');
		if (!is_dir($dir)) {
			@mkdir($dir, 0755, true);
		}
		$this->load->library('upload');
		$this->upload->initialize(array(
			'upload_path' => $dir,
			'allowed_types' => 'gif|jpg|jpeg|png|webp',
			'max_size' => 20480,
			'file_ext_tolower' => true,
			'remove_spaces' => true,
			'overwrite' => false,
			'file_name' => $this->seo_file_name($_FILES[$field]['name']),
		), true);
		if (!$this->upload->do_upload($field)) {
			$this->upload_error = trim(strip_tags($this->upload->display_errors('', ''))) . ' (' . $_FILES[$field]['name'] . ')';
			return false;
		}
		$up = $this->upload->data();
		$this->shrink_image($up['full_path'], (int) $up['image_width']);
		return $up['file_name'];
	}

	/** "IMG 1707 Final!!.JPG" → "img-1707-final.jpg" */
	protected function seo_file_name($original)
	{
		$ext = strtolower(pathinfo($original, PATHINFO_EXTENSION));
		$base = pb_slugify(pathinfo($original, PATHINFO_FILENAME));
		if ($base === '') {
			$base = 'image';
		}
		return substr($base, 0, 80) . '.' . $ext;
	}

	/** Scale down wide photos (keeps EXIF rotation from phone cameras, keeps PNG/WebP transparency). */
	protected function shrink_image($path, $width)
	{
		if ($width <= self::MAX_IMAGE_WIDTH || !function_exists('imagecreatetruecolor')) {
			return;
		}
		$info = @getimagesize($path);
		if (!is_array($info)) {
			return;
		}
		$mime = $info['mime'];
		if ($mime === 'image/jpeg') {
			$im = @imagecreatefromjpeg($path);
		} elseif ($mime === 'image/png') {
			$im = @imagecreatefrompng($path);
		} elseif ($mime === 'image/webp' && function_exists('imagecreatefromwebp')) {
			$im = @imagecreatefromwebp($path);
		} else {
			return; // GIFs may be animated — leave untouched.
		}
		if (!$im) {
			return;
		}
		if ($mime === 'image/jpeg' && function_exists('exif_read_data')) {
			$exif = @exif_read_data($path);
			$o = isset($exif['Orientation']) ? (int) $exif['Orientation'] : 1;
			$angle = array(3 => 180, 6 => -90, 8 => 90);
			if (isset($angle[$o])) {
				$rot = imagerotate($im, $angle[$o], 0);
				if ($rot) {
					imagedestroy($im);
					$im = $rot;
				}
			}
		}
		$w = imagesx($im);
		$h = imagesy($im);
		if ($w > self::MAX_IMAGE_WIDTH) {
			$nw = self::MAX_IMAGE_WIDTH;
			$nh = (int) round($h * $nw / $w);
			$out = imagecreatetruecolor($nw, $nh);
			if ($mime !== 'image/jpeg') {
				imagealphablending($out, false);
				imagesavealpha($out, true);
			}
			imagecopyresampled($out, $im, 0, 0, 0, 0, $nw, $nh, $w, $h);
			imagedestroy($im);
			$im = $out;
		}
		if ($mime === 'image/jpeg') {
			imagejpeg($im, $path, 82);
		} elseif ($mime === 'image/png') {
			imagepng($im, $path, 8);
		} else {
			imagewebp($im, $path, 82);
		}
		imagedestroy($im);
	}
}
