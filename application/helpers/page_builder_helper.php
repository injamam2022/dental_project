<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Page Builder — shared by the public site (application/) and the admin CMS (admin/application/).
 *
 * A page (pb_pages) is an ordered list of sections (pb_sections). Each section has a type
 * (hero, text, cards, ...) and stores its content as JSON: {"fields": {...}, "items": [...]}.
 * Section types and their editable fields are declared once in pb_section_types(); the admin
 * forms and the frontend partials (application/modules/Pagebuilder/views/sections/<type>.php)
 * both read from it, so adding a new type = add it here + add one partial.
 */

if (!function_exists('pb_upload_dir_rel')) {
	/** Upload folder relative to the project root (public URL path). */
	function pb_upload_dir_rel()
	{
		return 'admin/webroot/uploads/page_builder/';
	}
}

if (!function_exists('pb_project_root')) {
	function pb_project_root()
	{
		$fc = rtrim(str_replace('\\', '/', FCPATH), '/') . '/';
		if (is_dir($fc . 'application') && is_dir($fc . 'admin')) {
			return $fc;
		}
		return rtrim(str_replace('\\', '/', dirname(FCPATH)), '/') . '/';
	}
}

if (!function_exists('pb_site_base')) {
	/** Public site base URL (with trailing slash), also correct when called from /admin. */
	function pb_site_base()
	{
		$CI =& get_instance();
		$base = rtrim($CI->config->base_url(), '/');
		if (substr($base, -6) === '/admin') {
			$base = substr($base, 0, -6);
		}
		return $base . '/';
	}
}

if (!function_exists('pb_image_url')) {
	/**
	 * Resolve a stored image value to a URL.
	 * - Absolute http(s) URLs are returned as-is.
	 * - Values containing "/" are paths relative to the site root (e.g. assets/images/x.jpg).
	 * - Bare file names are Page Builder uploads.
	 */
	function pb_image_url($value)
	{
		$value = str_replace('\\', '/', trim((string) $value));
		if ($value === '') {
			return '';
		}
		if (preg_match('#^https?://#i', $value)) {
			return $value;
		}
		$value = ltrim($value, '/');
		if (strpos($value, '/') === false) {
			$value = pb_upload_dir_rel() . $value;
		}
		$parts = explode('/', $value);
		return pb_site_base() . implode('/', array_map('rawurlencode', $parts));
	}
}

if (!function_exists('pb_page_url')) {
	function pb_page_url($slug)
	{
		return pb_site_base() . rawurlencode((string) $slug);
	}
}

if (!function_exists('pb_preview_token')) {
	/** Token that lets the admin preview a draft page on the public site. */
	function pb_preview_token($page_id)
	{
		$CI =& get_instance();
		$key = (string) $CI->config->item('encryption_key');
		return substr(hash_hmac('sha256', 'pb-preview-' . (int) $page_id, $key), 0, 24);
	}
}

if (!function_exists('pb_link')) {
	/**
	 * Build href + extra attributes for a button/link value.
	 * "#book" opens the site-wide appointment modal; "tel:", "mailto:", "#anchor" and absolute
	 * URLs pass through; anything else is treated as a site-relative path.
	 * Returns array('href' => ..., 'attrs' => ' data-...').
	 */
	function pb_link($link)
	{
		$link = trim((string) $link);
		if ($link === '') {
			return array('href' => '', 'attrs' => '');
		}
		if ($link === '#book' || strtolower($link) === 'book') {
			return array('href' => '#', 'attrs' => ' data-toggle="modal" data-target="#dontiaAppointmentModal"');
		}
		if (preg_match('#^(https?:|tel:|mailto:|\#|//)#i', $link)) {
			$ext = preg_match('#^https?://#i', $link) && strpos($link, pb_site_base()) !== 0;
			return array('href' => $link, 'attrs' => $ext ? ' target="_blank" rel="noopener"' : '');
		}
		return array('href' => pb_site_base() . ltrim($link, '/'), 'attrs' => '');
	}
}

if (!function_exists('pb_youtube_id')) {
	function pb_youtube_id($url)
	{
		$url = trim((string) $url);
		if (preg_match('#^[A-Za-z0-9_-]{11}$#', $url)) {
			return $url;
		}
		if (preg_match('#(?:youtu\.be/|youtube\.com/(?:watch\?(?:.*&)?v=|embed/|shorts/|live/))([A-Za-z0-9_-]{11})#', $url, $m)) {
			return $m[1];
		}
		return '';
	}
}

if (!function_exists('pb_common_fields')) {
	/** Design options available on every section type. */
	function pb_common_fields()
	{
		return array(
			array('key' => 'bg', 'label' => 'Background', 'type' => 'select', 'group' => 'design', 'default' => 'white', 'options' => array(
				'white' => 'White', 'light' => 'Light cream', 'warm' => 'Warm beige', 'dark' => 'Dark brown (white text)',
			)),
			array('key' => 'spacing', 'label' => 'Vertical spacing', 'type' => 'select', 'group' => 'design', 'default' => 'normal', 'options' => array(
				'normal' => 'Normal', 'compact' => 'Compact', 'large' => 'Large',
			)),
			array('key' => 'anchor', 'label' => 'Anchor ID (optional)', 'type' => 'text', 'group' => 'design', 'help' => 'Lets you link to this section, e.g. "treatments" → #treatments'),
		);
	}
}

if (!function_exists('pb_section_types')) {
	function pb_section_types()
	{
		$btn_help = 'Use #book to open the appointment form, tel:9073313193 to call, or a page slug like best-orthodontist-in-kolkata.';
		$cols = array('2' => '2 per row', '3' => '3 per row', '4' => '4 per row');
		return array(
			'hero' => array(
				'label' => 'Hero banner',
				'icon' => 'fa-image',
				'description' => 'Big image banner at the top of the page with the main heading (H1) and buttons.',
				'fields' => array(
					array('key' => 'heading', 'label' => 'Heading (H1)', 'type' => 'text', 'required' => true),
					array('key' => 'subheading', 'label' => 'Sub heading', 'type' => 'textarea'),
					array('key' => 'image', 'label' => 'Background image', 'type' => 'image', 'help' => 'Wide photo, at least 1600px wide.'),
					array('key' => 'image_alt', 'label' => 'Image alt text', 'type' => 'text'),
					array('key' => 'fit', 'label' => 'Image fit', 'type' => 'select', 'default' => 'cover', 'options' => array('cover' => 'Fill banner (crop)', 'contain' => 'Show whole image')),
					array('key' => 'button_text', 'label' => 'Button 1 text', 'type' => 'text'),
					array('key' => 'button_link', 'label' => 'Button 1 link', 'type' => 'text', 'help' => $btn_help),
					array('key' => 'button2_text', 'label' => 'Button 2 text', 'type' => 'text'),
					array('key' => 'button2_link', 'label' => 'Button 2 link', 'type' => 'text', 'help' => $btn_help),
				),
				'items' => null,
			),
			'text' => array(
				'label' => 'Text block',
				'icon' => 'fa-align-left',
				'description' => 'Heading with rich text (paragraphs, bold, lists, links).',
				'fields' => array(
					array('key' => 'heading', 'label' => 'Heading (H2)', 'type' => 'text'),
					array('key' => 'subheading', 'label' => 'Sub heading', 'type' => 'text'),
					array('key' => 'body', 'label' => 'Content', 'type' => 'richtext'),
					array('key' => 'align', 'label' => 'Alignment', 'type' => 'select', 'default' => 'left', 'options' => array('left' => 'Left', 'center' => 'Center')),
					array('key' => 'button_text', 'label' => 'Button text', 'type' => 'text'),
					array('key' => 'button_link', 'label' => 'Button link', 'type' => 'text', 'help' => $btn_help),
				),
				'items' => null,
			),
			'text_image' => array(
				'label' => 'Text + image',
				'icon' => 'fa-columns',
				'description' => 'Rich text on one side, a photo on the other.',
				'fields' => array(
					array('key' => 'heading', 'label' => 'Heading (H2)', 'type' => 'text'),
					array('key' => 'body', 'label' => 'Content', 'type' => 'richtext'),
					array('key' => 'image', 'label' => 'Image', 'type' => 'image'),
					array('key' => 'image_alt', 'label' => 'Image alt text', 'type' => 'text'),
					array('key' => 'image_position', 'label' => 'Image position', 'type' => 'select', 'default' => 'right', 'options' => array('right' => 'Right', 'left' => 'Left')),
					array('key' => 'button_text', 'label' => 'Button text', 'type' => 'text'),
					array('key' => 'button_link', 'label' => 'Button link', 'type' => 'text', 'help' => $btn_help),
				),
				'items' => null,
			),
			'cards' => array(
				'label' => 'Cards grid',
				'icon' => 'fa-th-large',
				'description' => 'Grid of cards (treatments, features, reasons) — each card can have an image, text and link.',
				'fields' => array(
					array('key' => 'heading', 'label' => 'Heading (H2)', 'type' => 'text'),
					array('key' => 'intro', 'label' => 'Intro text', 'type' => 'richtext'),
					array('key' => 'columns', 'label' => 'Cards per row', 'type' => 'select', 'default' => '3', 'options' => $cols),
					array('key' => 'numbered', 'label' => 'Number the cards (1, 2, 3...)', 'type' => 'select', 'default' => '0', 'options' => array('0' => 'No', '1' => 'Yes')),
					array('key' => 'image_height', 'label' => 'Card image height', 'type' => 'select', 'default' => '200', 'options' => array('160' => 'Small', '200' => 'Medium', '260' => 'Large')),
					array('key' => 'outro', 'label' => 'Text below cards', 'type' => 'richtext'),
				),
				'items' => array(
					'label' => 'Card',
					'title_field' => 'title',
					'fields' => array(
						array('key' => 'title', 'label' => 'Title', 'type' => 'text'),
						array('key' => 'text', 'label' => 'Text', 'type' => 'textarea', 'help' => 'Blank lines start a new paragraph. Basic HTML like <a> and <strong> is allowed.'),
						array('key' => 'image', 'label' => 'Image (optional)', 'type' => 'image'),
						array('key' => 'image_alt', 'label' => 'Image alt text', 'type' => 'text'),
						array('key' => 'link', 'label' => 'Link (optional)', 'type' => 'text', 'help' => $btn_help),
						array('key' => 'link_text', 'label' => 'Link text', 'type' => 'text', 'placeholder' => 'Learn more'),
					),
				),
			),
			'checklist' => array(
				'label' => 'Checklist',
				'icon' => 'fa-check-square-o',
				'description' => 'Bullet list with tick icons — areas served, benefits, symptoms.',
				'fields' => array(
					array('key' => 'heading', 'label' => 'Heading (H2)', 'type' => 'text'),
					array('key' => 'intro', 'label' => 'Intro text', 'type' => 'richtext'),
					array('key' => 'columns', 'label' => 'Columns', 'type' => 'select', 'default' => '2', 'options' => array('1' => '1 column', '2' => '2 columns', '3' => '3 columns')),
					array('key' => 'outro', 'label' => 'Text below list', 'type' => 'richtext'),
				),
				'items' => array(
					'label' => 'List item',
					'title_field' => 'text',
					'fields' => array(
						array('key' => 'text', 'label' => 'Text', 'type' => 'text'),
						array('key' => 'link', 'label' => 'Link (optional)', 'type' => 'text'),
					),
				),
			),
			'contact' => array(
				'label' => 'Clinic / contact details',
				'icon' => 'fa-map-marker',
				'description' => 'Address, phone and timings with an optional Google Map.',
				'fields' => array(
					array('key' => 'heading', 'label' => 'Heading (H2)', 'type' => 'text'),
					array('key' => 'intro', 'label' => 'Intro text', 'type' => 'richtext'),
					array('key' => 'map', 'label' => 'Google Map', 'type' => 'textarea', 'help' => 'Paste the address (e.g. "PS Aviator, Chinar Park, Kolkata 700136"), a Google Maps embed link, or the full <iframe> code from Google Maps → Share → Embed.'),
					array('key' => 'image', 'label' => 'Image (shown if no map)', 'type' => 'image'),
					array('key' => 'image_alt', 'label' => 'Image alt text', 'type' => 'text'),
					array('key' => 'button_text', 'label' => 'Button text', 'type' => 'text'),
					array('key' => 'button_link', 'label' => 'Button link', 'type' => 'text', 'help' => $btn_help),
				),
				'items' => array(
					'label' => 'Detail row',
					'title_field' => 'label',
					'fields' => array(
						array('key' => 'icon', 'label' => 'Icon', 'type' => 'select', 'default' => 'map-marker', 'options' => array(
							'hospital-o' => 'Clinic', 'map-marker' => 'Location', 'phone' => 'Phone', 'whatsapp' => 'WhatsApp',
							'envelope' => 'Email', 'clock-o' => 'Clock', 'calendar' => 'Calendar', 'info-circle' => 'Info',
						)),
						array('key' => 'label', 'label' => 'Label', 'type' => 'text'),
						array('key' => 'value', 'label' => 'Value', 'type' => 'textarea'),
						array('key' => 'link', 'label' => 'Link (optional)', 'type' => 'text', 'help' => 'e.g. tel:9073313193'),
					),
				),
			),
			'faq' => array(
				'label' => 'FAQ accordion',
				'icon' => 'fa-question-circle',
				'description' => 'Questions & answers. Also adds FAQ rich results markup for Google.',
				'fields' => array(
					array('key' => 'heading', 'label' => 'Heading (H2)', 'type' => 'text'),
					array('key' => 'subheading', 'label' => 'Sub heading', 'type' => 'text'),
				),
				'items' => array(
					'label' => 'Question',
					'title_field' => 'question',
					'fields' => array(
						array('key' => 'question', 'label' => 'Question', 'type' => 'text'),
						array('key' => 'answer', 'label' => 'Answer', 'type' => 'textarea'),
					),
				),
			),
			'gallery' => array(
				'label' => 'Image gallery',
				'icon' => 'fa-picture-o',
				'description' => 'Grid of photos with optional captions (click to enlarge).',
				'fields' => array(
					array('key' => 'heading', 'label' => 'Heading (H2)', 'type' => 'text'),
					array('key' => 'subheading', 'label' => 'Sub heading', 'type' => 'text'),
					array('key' => 'columns', 'label' => 'Images per row', 'type' => 'select', 'default' => '3', 'options' => $cols),
				),
				'items' => array(
					'label' => 'Image',
					'title_field' => 'caption',
					'fields' => array(
						array('key' => 'image', 'label' => 'Image', 'type' => 'image'),
						array('key' => 'image_alt', 'label' => 'Alt text', 'type' => 'text'),
						array('key' => 'caption', 'label' => 'Caption', 'type' => 'text'),
					),
				),
			),
			'video' => array(
				'label' => 'YouTube video',
				'icon' => 'fa-youtube-play',
				'description' => 'Embedded YouTube video with optional text.',
				'fields' => array(
					array('key' => 'heading', 'label' => 'Heading (H2)', 'type' => 'text'),
					array('key' => 'youtube', 'label' => 'YouTube URL', 'type' => 'text', 'required' => true),
					array('key' => 'body', 'label' => 'Text', 'type' => 'richtext'),
				),
				'items' => null,
			),
			'cta' => array(
				'label' => 'Call to action',
				'icon' => 'fa-bullhorn',
				'description' => 'Highlighted box with a message and buttons (Book / Call).',
				'fields' => array(
					array('key' => 'heading', 'label' => 'Heading (H2)', 'type' => 'text'),
					array('key' => 'body', 'label' => 'Text', 'type' => 'richtext'),
					array('key' => 'image', 'label' => 'Background image (optional)', 'type' => 'image'),
					array('key' => 'button_text', 'label' => 'Button 1 text', 'type' => 'text'),
					array('key' => 'button_link', 'label' => 'Button 1 link', 'type' => 'text', 'help' => $btn_help),
					array('key' => 'button2_text', 'label' => 'Button 2 text', 'type' => 'text'),
					array('key' => 'button2_link', 'label' => 'Button 2 link', 'type' => 'text', 'help' => $btn_help),
				),
				'items' => null,
			),
			'html' => array(
				'label' => 'Custom HTML',
				'icon' => 'fa-code',
				'description' => 'Advanced: paste your own HTML/embed code.',
				'fields' => array(
					array('key' => 'heading', 'label' => 'Heading (H2, optional)', 'type' => 'text'),
					array('key' => 'html', 'label' => 'HTML code', 'type' => 'code'),
					array('key' => 'container', 'label' => 'Width', 'type' => 'select', 'default' => 'boxed', 'options' => array('boxed' => 'Boxed (site width)', 'full' => 'Full width')),
				),
				'items' => null,
			),
		);
	}
}

if (!function_exists('pb_type_fields')) {
	/** All fields for a type, including the shared design fields. */
	function pb_type_fields($type)
	{
		$types = pb_section_types();
		if (!isset($types[$type])) {
			return array();
		}
		$fields = $types[$type]['fields'];
		foreach (pb_common_fields() as $cf) {
			if ($type === 'hero' && $cf['key'] === 'bg') {
				continue;
			}
			$fields[] = $cf;
		}
		return $fields;
	}
}

if (!function_exists('pb_decode_data')) {
	/** Decode a section's JSON data, filling defaults so views never hit missing keys. */
	function pb_decode_data($type, $json)
	{
		$data = json_decode((string) $json, true);
		if (!is_array($data)) {
			$data = array();
		}
		$fields = isset($data['fields']) && is_array($data['fields']) ? $data['fields'] : array();
		foreach (pb_type_fields($type) as $f) {
			if (!array_key_exists($f['key'], $fields)) {
				$fields[$f['key']] = isset($f['default']) ? $f['default'] : '';
			}
		}
		$items = isset($data['items']) && is_array($data['items']) ? array_values($data['items']) : array();
		$types = pb_section_types();
		if (isset($types[$type]['items']['fields'])) {
			foreach ($items as $i => $item) {
				$item = is_array($item) ? $item : array();
				foreach ($types[$type]['items']['fields'] as $f) {
					if (!array_key_exists($f['key'], $item)) {
						$item[$f['key']] = isset($f['default']) ? $f['default'] : '';
					}
				}
				$items[$i] = $item;
			}
		}
		return array('fields' => $fields, 'items' => $items);
	}
}

if (!function_exists('pb_text_to_html')) {
	/** Plain textarea → paragraphs; keeps simple inline HTML the editor typed. */
	function pb_text_to_html($text)
	{
		$text = trim(str_replace("\r\n", "\n", (string) $text));
		if ($text === '') {
			return '';
		}
		if (preg_match('#<(p|ul|ol|div|h[1-6])[\s>]#i', $text)) {
			return $text;
		}
		$paras = preg_split("/\n{2,}/", $text);
		$out = '';
		foreach ($paras as $p) {
			$out .= '<p>' . nl2br(trim($p)) . '</p>';
		}
		return $out;
	}
}

if (!function_exists('pb_map_src')) {
	/** Turn whatever the editor pasted (address, embed URL, <iframe>) into a safe embed URL. */
	function pb_map_src($value)
	{
		$value = trim((string) $value);
		if ($value === '') {
			return '';
		}
		if (preg_match('#src=["\']([^"\']+)["\']#i', $value, $m)) {
			$value = html_entity_decode($m[1], ENT_QUOTES, 'UTF-8');
		}
		if (preg_match('#^https://(www\.)?google\.[a-z.]+/maps/embed\?#i', $value)) {
			return $value;
		}
		if (preg_match('#^https://maps\.google\.[a-z.]+/maps\?#i', $value) && strpos($value, 'output=embed') !== false) {
			return $value;
		}
		if (preg_match('#^https?://#i', $value)) {
			return '';
		}
		return 'https://maps.google.com/maps?q=' . rawurlencode($value) . '&z=16&output=embed';
	}
}

if (!function_exists('pb_reserved_slugs')) {
	/** Slugs already taken by the public site's routes or modules (a builder page there would never show). */
	function pb_reserved_slugs()
	{
		$reserved = array('admin', 'assets', 'uploads', 'application', 'system');
		$routes_file = pb_project_root() . 'application/config/routes.php';
		if (is_file($routes_file)) {
			$route = array();
			include $routes_file;
			foreach (array_keys($route) as $r) {
				if (strpos($r, '(') === false && strpos($r, '/') === false) {
					$reserved[] = strtolower($r);
				}
			}
		}
		$mods = glob(pb_project_root() . 'application/modules/*', GLOB_ONLYDIR);
		if (is_array($mods)) {
			foreach ($mods as $m) {
				$reserved[] = strtolower(basename($m));
			}
		}
		return array_values(array_unique($reserved));
	}
}

if (!function_exists('pb_slugify')) {
	function pb_slugify($text)
	{
		$text = strtolower(trim((string) $text));
		$text = str_replace('&', ' and ', $text);
		$text = preg_replace('/[^a-z0-9]+/', '-', $text);
		return trim(preg_replace('/-+/', '-', $text), '-');
	}
}

if (!function_exists('pb_ensure_tables')) {
	function pb_ensure_tables($db)
	{
		static $done = false;
		if ($done) {
			return;
		}
		$done = true;
		if ($db->table_exists('pb_pages') && $db->table_exists('pb_sections')) {
			return;
		}
		$db->query("CREATE TABLE IF NOT EXISTS `pb_pages` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`title` varchar(255) NOT NULL,
			`slug` varchar(191) NOT NULL,
			`meta_title` varchar(255) DEFAULT NULL,
			`meta_description` text DEFAULT NULL,
			`meta_keywords` varchar(500) DEFAULT NULL,
			`og_image` varchar(512) DEFAULT NULL,
			`robots` varchar(64) DEFAULT NULL,
			`status` enum('draft','published') NOT NULL DEFAULT 'draft',
			`created_at` datetime DEFAULT NULL,
			`updated_at` datetime DEFAULT NULL,
			PRIMARY KEY (`id`),
			UNIQUE KEY `uniq_slug` (`slug`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
		$db->query("CREATE TABLE IF NOT EXISTS `pb_sections` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`page_id` int(11) NOT NULL,
			`type` varchar(40) NOT NULL,
			`admin_label` varchar(255) DEFAULT NULL,
			`sort_order` int(11) NOT NULL DEFAULT 0,
			`is_active` tinyint(1) NOT NULL DEFAULT 1,
			`data` longtext DEFAULT NULL,
			`created_at` datetime DEFAULT NULL,
			`updated_at` datetime DEFAULT NULL,
			PRIMARY KEY (`id`),
			KEY `idx_page_order` (`page_id`, `sort_order`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
		pb_seed_chinar_park($db);
	}
}

if (!function_exists('pb_seed_chinar_park')) {
	/** First-run content: Chinar Park / New Town / Rajarhat location page (from the client's brief). */
	function pb_seed_chinar_park($db)
	{
		$slug = 'best-dental-clinic-chinar-park-salt-lake-new-town-rajarhat';
		if ($db->where('slug', $slug)->count_all_results('pb_pages') > 0) {
			return;
		}
		$now = pb_now();
		$db->insert('pb_pages', array(
			'title' => 'Dental Clinic — Chinar Park, Salt Lake, New Town & Rajarhat',
			'slug' => $slug,
			'meta_title' => 'Best Dental Clinic in Chinar Park, Salt Lake, New Town & Rajarhat',
			'meta_description' => 'Looking for the best dental clinic in Chinar Park, Salt Lake, New Town, or Rajarhat? Visit Dontia Care Clinic-Dental for expert dental care. Book Now.',
			'og_image' => 'admin/webroot/uploads/home/IMG_1707-1280w.jpg',
			'status' => 'published',
			'created_at' => $now,
			'updated_at' => $now,
		));
		$page_id = (int) $db->insert_id();
		$phone = '9073313193';

		$sections = array();
		$sections[] = array('hero', 'Hero', array(
			'heading' => 'Best Dental Clinic in Chinar Park, Salt Lake, New Town & Rajarhat, Kolkata',
			'subheading' => '25+ years of trusted oral care — PS Aviator, Suite 306, Rajarhat Main Road, Chinar Park.',
			'image' => 'admin/webroot/uploads/home/IMG_1707-1920w.jpg',
			'image_alt' => 'Treatment room at Dontia Care Clinic-Dental, Chinar Park, Kolkata',
			'fit' => 'cover',
			'button_text' => 'Book Appointment', 'button_link' => '#book',
			'button2_text' => 'Call ' . $phone, 'button2_link' => 'tel:' . $phone,
		), array());
		$sections[] = array('text_image', 'Introduction', array(
			'heading' => '',
			'body' => '<p>Several names will appear in front of you when searching for the best dental clinic in Chinar Park, New Town, and Rajarhat. It becomes difficult to find out which one is actually the best. To make it easy for you, let us proudly share the name: <strong>Dontia Care Clinic-Dental</strong>. And yes, we are not a self-proclaimed numero uno clinic. It is the specialised service that we provide to all our satisfied and happy list of clients has helped us to reach the top position.</p>'
				. '<p>We provide complete oral care. The key features of our clinic that made us who we are include skilled professionals, modern treatment methods, and bespoke attention to the oral health requirements of a patient. You can find us at PS Aviator, Suite 306, Rajarhat Main Road, Chinar Park. We mostly get our patients from Salt Lake - Sector 5, 4, 3, 2, 1, New Town, Rajarhat, Chinar Park, Teghoria, Kaikhali, and Baguiati, as well as from adjoining areas of Kolkata.</p>'
				. '<p>Dontia Care Clinic started its operations in 2001 and has 25 years of oral care experience. We have mainly focused on clinical proficiency, patient-focused treatment planning, and advanced dental practices. Moreover, we have a team of professionals who help you make clear decisions concerning your oral health.</p>',
			'image' => 'koel-mallick-with-dr-sethi-dontia-care-clinic.jpg',
			'image_alt' => 'Koel Mallick with Dr. P. S. Sethi at Dontia Care Clinic-Dental',
			'image_position' => 'right',
			'button_text' => 'Book Appointment', 'button_link' => '#book',
		), array());
		$sections[] = array('text', 'Trusted clinic', array(
			'heading' => 'Your Trusted Clinic near Chinar Park, New Town & Rajarhat',
			'body' => '<p>The overall health of a person can be largely determined by the condition of his/her oral health. For example, there is a need to appropriately assess and carry out timely treatment for different types of oral issues. This includes gum issues and toothaches, along with missing teeth and smile issues. We, therefore, focus on providing quality oral support that can be easily accessed by people and families across Chinar Park, Rajarhat, and New Town.</p>'
				. '<p>Our team of expert professionals tries to understand the actual reason behind a patient’s oral problems. After carrying out a proper assessment of a patient’s dental health and depending on personal needs, the appropriate treatment options are suggested to them. Anyone looking for treatment near Chinar Park, New Town, and Rajarhat can easily visit our Chinar Park branch, which offers restorative, cosmetic, and general oral treatments.</p>',
			'align' => 'left', 'bg' => 'light',
		), array());
		$sections[] = array('cards', 'Treatments', array(
			'heading' => 'Comprehensive Treatments at Our Clinic',
			'intro' => '<p>At our clinic, you will find different types of treatments such as,</p>',
			'columns' => '2', 'numbered' => '1', 'anchor' => 'treatments',
		), array(
			array('title' => 'Dental Implants', 'text' => 'A person’s chewing capacity, confidence, and speech can be impacted by missing teeth. The purpose of using implants is to replace missing tooth roots while supporting replacement teeth. Moreover, assessment of a patient’s bone condition, oral health, and personal needs is carried out before suggesting a proper implant treatment strategy.', 'link' => 'best-dental-implant-clinic-in-kolkata', 'link_text' => 'Dental implants in Kolkata'),
			array('title' => 'Root Canal Treatment', 'text' => 'This type of treatment mainly focuses on inflammation and infection that occur within a person’s tooth. It helps in the removal of affected or damaged pulp tissue, cleaning the root canal system, and sealing the tooth.', 'link' => 'best-root-canal-treatment-in-kolkata', 'link_text' => 'Root canal treatment'),
			array('title' => 'TMJD Treatment', 'text' => 'TMJD treatment is provided by our <a href="tmj-specialist-in-kolkata">TMJ specialist in Kolkata</a>, Dr. Prabhjeet Singh Sethi. If you have pain in your jaw and experience clicking sounds in your ear, you can visit our clinic.', 'link' => 'tmj-specialist-in-kolkata', 'link_text' => 'TMJ treatment'),
			array('title' => 'Teeth Whitening', 'text' => 'A person’s teeth sometimes experience discolouration, and specialised teeth whitening may therefore be needed to reduce this issue. Moreover, it also helps in making the appearance of your smile better. Our team of professionals carries out a proper evaluation of the condition of a patient’s teeth and gums before suggesting a proper whitening technique.'),
			array('title' => 'Braces and Orthodontic Treatment', 'text' => 'A person’s appearance and oral function can be impacted by bite issues and uneven teeth. The proper alignment of teeth and bite relationship can be improved by carrying out orthodontic treatment, which is then followed by a personal evaluation.', 'link' => 'best-orthodontist-in-kolkata', 'link_text' => 'Orthodontic treatment'),
			array('title' => 'Smile Makeover and Cosmetic Dentistry', 'text' => "The appearance of a person’s smile can get better through a smile makeover. To carry this out, it combines appropriate cosmetic techniques.\n\nThere may be treatment options based on a person’s dental needs. This may comprise veneers, crowns, teeth whitening, bonding, and other aesthetic methods.", 'link' => 'best-cosmetic-dentist-in-kolkata', 'link_text' => 'Cosmetic dentistry'),
			array('title' => 'Full Mouth Rehabilitation', 'text' => 'This includes the restoration of several teeth and making the complete dental function better. Moreover, it may include a combination of bridges, implants, crowns, restorative techniques, and bite correction as per the patient’s situation.'),
			array('title' => 'Crowns and Bridges', 'text' => 'Crowns are used for restoration of damaged teeth, whereas bridges help in substituting one or more missing teeth. This is carried out by the use of supporting teeth or implants. We carry out a proper assessment of a person’s dental health before suggesting the most suitable repair.'),
			array('title' => 'Scaling, Root Planning, and Teeth Polishing', 'text' => 'Plaque and hardened tartar deposits removal are two major functions carried out by specialised dental cleaning. Patients who are suffering from gum diseases may get suggested to carry out scaling and root planning. This will, however, depend on how difficult their situation is. Maintaining healthy teeth and gums can be carried out with the help of daily oral assessment and specialised cleaning procedures.'),
			array('title' => 'General, Preventive Dentistry, & Pediatric Dentistry', 'text' => 'At an early stage, preventive dentistry assists in the identification of possible dental health issues. The general services provided at Dontia Care Clinic comprise oral assessments, cavity evaluation, specialised cleaning, and tailored guidance regarding oral hygiene.', 'link' => 'best-pediatric-dentist-in-kolkata', 'link_text' => 'Pediatric dentistry'),
		));
		$sections[] = array('cards', 'Why choose us', array(
			'heading' => 'Why Choose Dontia Care Clinic in Chinar Park?',
			'intro' => '<p>It is considered a key decision to select the correct oral treatment. That is why, at our clinic, we concentrate on uniting clinical proficiency, experience, and tailored attention.</p>',
			'columns' => '3', 'numbered' => '0', 'bg' => 'light',
		), array(
			array('title' => '25+ Years of Experience', 'text' => 'Founded in the year 2001, Dontia Care Clinic provides expert services to patients in Kolkata for more than two decades.'),
			array('title' => 'Dawson Academy-Trained Expertise', 'text' => 'We offer exceptional care provided by our Dawson Academy-trained dentist, Dr. Prabhjeet Singh Sethi. Our Clinic offers thorough care and restorative smile treatment.'),
			array('title' => 'Comprehensive Treatments', 'text' => 'There are several treatment possibilities that patients can consider that are carried out at our clinic. These can range from preventive dentistry and root canal treatment to smile makeovers and implants.'),
			array('title' => 'Patient-Centred Treatment Planning', 'text' => 'Every individual has different treatment requirements, so we will assess your personal needs and discuss the best treatment options.'),
			array('title' => 'Safe and Hygienic Environment', 'text' => 'We are very careful to ensure that we are using the correct sterilisation methods, hygiene, and infection control.'),
		));
		$sections[] = array('checklist', 'Location / areas served', array(
			'heading' => 'Conveniently Located Clinic near New Town and Rajarhat',
			'intro' => '<p>Dontia Care Clinic-Dental is located in Chinar Park, making it accessible to patients from several surrounding residential and commercial areas.</p><p>Our location is particularly convenient for people searching for:</p>',
			'columns' => '2',
			'outro' => '<p>Whether you live in New Town, Rajarhat or Chinar Park, you can visit our clinic for consultations and treatment.</p>',
		), array(
			array('text' => 'Dental clinic in Chinar Park'),
			array('text' => 'Dentist near Chinar Park'),
			array('text' => 'Best dental clinic in New Town'),
			array('text' => 'Dentist in Rajarhat'),
			array('text' => 'Dental clinic near City Centre 2'),
			array('text' => 'Dental clinic near Teghoria'),
			array('text' => 'Dentist near Baguiati'),
			array('text' => 'Dental clinic near Kaikhali'),
		));
		$sections[] = array('contact', 'Clinic details', array(
			'heading' => 'Visit Dontia Care Clinic-Dental – Chinar Park Branch',
			'map' => 'PS Aviator, Rajarhat Main Road, Chinar Park, Kolkata 700136',
			'button_text' => 'Book Appointment', 'button_link' => '#book',
			'bg' => 'light', 'anchor' => 'visit',
		), array(
			array('icon' => 'hospital-o', 'label' => 'Clinic Name', 'value' => 'Dontia Care Clinic-Dental'),
			array('icon' => 'map-marker', 'label' => 'Address', 'value' => 'PS Aviator, Suite 306, Rajarhat Main Road, Chinar Park, Dash Drone, Rajarhat, Kolkata, West Bengal – 700136.'),
			array('icon' => 'phone', 'label' => 'Appointment Contact', 'value' => $phone, 'link' => 'tel:' . $phone),
			array('icon' => 'clock-o', 'label' => 'Clinic Timings', 'value' => 'Monday to Saturday, 10:00 AM – 8:00 PM'),
			array('icon' => 'calendar', 'label' => 'Sunday', 'value' => 'Closed'),
		));
		$sections[] = array('cta', 'Closing call to action', array(
			'heading' => 'Take the First Step towards Better Oral Health',
			'body' => '<p>It is important for an individual to experience specialised attention and bespoke care regarding oral health. Dontia Care Clinic-Dental is always ready to provide the necessary support towards better oral health for an individual. This can be a routine oral assessment, consultation regarding smile improvement, or restorative treatment.</p>'
				. '<p>Visit our Chinar Park branch and consult our team for your oral health needs.</p>'
				. '<p><strong>Location:</strong> Chinar Park, Rajarhat, Kolkata – 700136</p>',
			'button_text' => 'Call Now: ' . $phone, 'button_link' => 'tel:' . $phone,
			'button2_text' => 'Book Appointment', 'button2_link' => '#book',
			'bg' => 'dark',
		), array());

		foreach ($sections as $i => $s) {
			$db->insert('pb_sections', array(
				'page_id' => $page_id,
				'type' => $s[0],
				'admin_label' => $s[1],
				'sort_order' => ($i + 1) * 10,
				'is_active' => 1,
				'data' => json_encode(array('fields' => $s[2], 'items' => $s[3]), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
				'created_at' => $now,
				'updated_at' => $now,
			));
		}
	}
}

if (!function_exists('pb_e')) {
	function pb_e($s)
	{
		return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
	}
}

if (!function_exists('pb_button')) {
	/** Render a button if both text and link are set. $variant: primary | gold | light */
	function pb_button($text, $link, $variant = 'primary')
	{
		$text = trim((string) $text);
		$l = pb_link($link);
		if ($text === '' || $l['href'] === '') {
			return '';
		}
		$icon = '';
		if (stripos((string) $link, 'tel:') === 0) {
			$icon = '<i class="fa fa-phone" aria-hidden="true"></i> ';
		} elseif (trim((string) $link) === '#book') {
			$icon = '<i class="fa fa-calendar-check-o" aria-hidden="true"></i> ';
		}
		return '<a class="pb-btn pb-btn--' . pb_e($variant) . '" href="' . pb_e($l['href']) . '"' . $l['attrs'] . '>' . $icon . pb_e($text) . '</a>';
	}
}

if (!function_exists('pb_section_head')) {
	/** Standard centred H2 + optional sub heading / intro HTML. */
	function pb_section_head($heading, $sub = '', $intro_html = '')
	{
		$out = '';
		if (trim((string) $heading) !== '') {
			$out .= '<h2 class="pb-h2">' . pb_e($heading) . '</h2>';
		}
		if (trim((string) $sub) !== '') {
			$out .= '<p class="pb-sub">' . pb_e($sub) . '</p>';
		}
		if (trim(strip_tags((string) $intro_html)) !== '') {
			$out .= '<div class="pb-rich pb-intro">' . $intro_html . '</div>';
		}
		return $out === '' ? '' : '<div class="pb-head">' . $out . '</div>';
	}
}

if (!function_exists('pb_image_path')) {
	/** Local filesystem path for a stored image value ('' for remote/missing). */
	function pb_image_path($value)
	{
		$value = str_replace('\\', '/', trim((string) $value));
		if ($value === '' || preg_match('#^(https?:)?//#i', $value) || strpos($value, '..') !== false) {
			return '';
		}
		$value = ltrim($value, '/');
		if (strpos($value, '/') === false) {
			$value = pb_upload_dir_rel() . $value;
		}
		$fs = pb_project_root() . $value;
		return is_file($fs) ? $fs : '';
	}
}

if (!function_exists('pb_img')) {
	/** <img> with intrinsic width/height (no layout shift) and lazy loading unless $eager. */
	function pb_img($value, $alt = '', $class = '', $eager = false)
	{
		$url = pb_image_url($value);
		if ($url === '') {
			return '';
		}
		$dims = '';
		$fs = pb_image_path($value);
		if ($fs !== '') {
			$sz = @getimagesize($fs);
			if (is_array($sz)) {
				$dims = ' width="' . (int) $sz[0] . '" height="' . (int) $sz[1] . '"';
			}
		}
		return '<img src="' . pb_e($url) . '" alt="' . pb_e($alt) . '"' . ($class !== '' ? ' class="' . pb_e($class) . '"' : '')
			. $dims . ($eager ? ' fetchpriority="high"' : ' loading="lazy"') . ' decoding="async">';
	}
}

if (!function_exists('pb_now')) {
	/** Current time in clinic time (the admin app has no default timezone, the public site uses Asia/Kolkata). */
	function pb_now()
	{
		$dt = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
		return $dt->format('Y-m-d H:i:s');
	}
}
