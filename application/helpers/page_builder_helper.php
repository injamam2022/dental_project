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
						array('key' => 'label', 'label' => 'Bold label (optional)', 'type' => 'text', 'help' => 'Shown in bold before the text, e.g. "Bone condition:"'),
						array('key' => 'text', 'label' => 'Text', 'type' => 'textarea'),
						array('key' => 'link', 'label' => 'Link (optional)', 'type' => 'text'),
					),
				),
			),
			'table' => array(
				'label' => 'Table',
				'icon' => 'fa-table',
				'description' => 'Price list or comparison table. Turns into easy-to-read cards on phones.',
				'fields' => array(
					array('key' => 'heading', 'label' => 'Heading (H2)', 'type' => 'text'),
					array('key' => 'intro', 'label' => 'Intro text', 'type' => 'richtext'),
					array('key' => 'caption', 'label' => 'Table title (H3, optional)', 'type' => 'text'),
					array('key' => 'head1', 'label' => 'Column 1 heading', 'type' => 'text'),
					array('key' => 'head2', 'label' => 'Column 2 heading', 'type' => 'text'),
					array('key' => 'head3', 'label' => 'Column 3 heading', 'type' => 'text'),
					array('key' => 'head4', 'label' => 'Column 4 heading (optional)', 'type' => 'text', 'help' => 'Leave empty for a 3-column table.'),
					array('key' => 'row_labels', 'label' => 'First column', 'type' => 'select', 'default' => '1', 'options' => array('1' => 'Row labels (bold, e.g. treatment names)', '0' => 'Normal column (e.g. a side-by-side comparison)')),
					array('key' => 'note', 'label' => 'Text below table', 'type' => 'richtext'),
				),
				'items' => array(
					'label' => 'Row',
					'title_field' => 'c1',
					'fields' => array(
						array('key' => 'c1', 'label' => 'Column 1', 'type' => 'text'),
						array('key' => 'c2', 'label' => 'Column 2', 'type' => 'text'),
						array('key' => 'c3', 'label' => 'Column 3', 'type' => 'text'),
						array('key' => 'c4', 'label' => 'Column 4', 'type' => 'text'),
					),
				),
			),
			'steps' => array(
				'label' => 'Steps / process',
				'icon' => 'fa-list-ol',
				'description' => 'Numbered timeline — treatment steps, what to expect.',
				'fields' => array(
					array('key' => 'heading', 'label' => 'Heading (H2)', 'type' => 'text'),
					array('key' => 'intro', 'label' => 'Intro text', 'type' => 'richtext'),
					array('key' => 'outro', 'label' => 'Text below steps', 'type' => 'richtext'),
				),
				'items' => array(
					'label' => 'Step',
					'title_field' => 'title',
					'fields' => array(
						array('key' => 'title', 'label' => 'Step title', 'type' => 'text'),
						array('key' => 'text', 'label' => 'Text', 'type' => 'textarea', 'help' => 'Blank lines start a new paragraph. Basic HTML like <a> and <strong> is allowed.'),
					),
				),
			),
			'certificates' => array(
				'label' => 'Certificates (live)',
				'icon' => 'fa-certificate',
				'description' => 'Shows the certificates from Content Management → Dental Media (section "certificates").',
				'fields' => array(
					array('key' => 'heading', 'label' => 'Heading (H2)', 'type' => 'text'),
					array('key' => 'intro', 'label' => 'Intro text', 'type' => 'richtext'),
					array('key' => 'outro', 'label' => 'Text below certificates', 'type' => 'richtext'),
				),
				'items' => null,
			),
			'blog_cards' => array(
				'label' => 'Latest blogs (live)',
				'icon' => 'fa-newspaper-o',
				'description' => 'Latest published blog posts, updated automatically.',
				'fields' => array(
					array('key' => 'heading', 'label' => 'Heading (H2)', 'type' => 'text', 'default' => 'From our blog'),
					array('key' => 'intro', 'label' => 'Intro text', 'type' => 'text'),
					array('key' => 'category', 'label' => 'Blog category', 'type' => 'select', 'default' => 'dental', 'options' => array('dental' => 'Dental', 'skin-care' => 'Skin care')),
					array('key' => 'count', 'label' => 'Number of posts', 'type' => 'select', 'default' => '3', 'options' => array('3' => '3', '6' => '6')),
					array('key' => 'button_text', 'label' => 'Button text', 'type' => 'text', 'default' => 'View all blogs'),
				),
				'items' => null,
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
			'video_grid' => array(
				'label' => 'YouTube videos (grid)',
				'icon' => 'fa-film',
				'description' => 'Several YouTube videos as thumbnails; a video loads only when clicked (keeps the page fast).',
				'fields' => array(
					array('key' => 'heading', 'label' => 'Heading (H2)', 'type' => 'text'),
					array('key' => 'subheading', 'label' => 'Sub heading', 'type' => 'text'),
					array('key' => 'columns', 'label' => 'Videos per row', 'type' => 'select', 'default' => '2', 'options' => array('2' => '2 per row', '3' => '3 per row')),
				),
				'items' => array(
					'label' => 'Video',
					'title_field' => 'title',
					'fields' => array(
						array('key' => 'title', 'label' => 'Title', 'type' => 'text'),
						array('key' => 'youtube', 'label' => 'YouTube URL', 'type' => 'text', 'help' => 'e.g. https://www.youtube.com/watch?v=IN4RpeCVrF4 or a Shorts link'),
					),
				),
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

if (!function_exists('pb_site_routes')) {
	/** Single-segment routes of the public site: slug => controller target. */
	function pb_site_routes()
	{
		static $cache = null;
		if ($cache !== null) {
			return $cache;
		}
		$cache = array();
		$routes_file = pb_project_root() . 'application/config/routes.php';
		if (is_file($routes_file)) {
			$route = array();
			include $routes_file;
			foreach ($route as $r => $target) {
				if (is_string($target) && strpos($r, '(') === false && strpos($r, '/') === false) {
					$cache[strtolower($r)] = $target;
				}
			}
		}
		return $cache;
	}
}

if (!function_exists('pb_takeover_slugs')) {
	/**
	 * Existing hand-coded pages that a published builder page may replace on the same URL.
	 * These are the Dental landing pages (their controller checks for a builder page first).
	 */
	function pb_takeover_slugs()
	{
		$out = array();
		foreach (pb_site_routes() as $slug => $target) {
			if (stripos($target, 'Dental/Dental/') === 0 && strpos($slug, '-') !== false) {
				$out[] = $slug;
			}
		}
		return $out;
	}
}

if (!function_exists('pb_reserved_slugs')) {
	/** Slugs already taken by the public site's routes or modules (a builder page there would never show). */
	function pb_reserved_slugs()
	{
		$reserved = array('admin', 'assets', 'uploads', 'application', 'system');
		$takeover = pb_takeover_slugs();
		foreach (array_keys(pb_site_routes()) as $r) {
			if (!in_array($r, $takeover, true)) {
				$reserved[] = $r;
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
		if ($db->table_exists('pb_pages') && $db->table_exists('pb_sections') && $db->table_exists('pb_seeds')) {
			pb_run_seeds($db); // starter pages added in later releases
			return;
		}
		$db->query("CREATE TABLE IF NOT EXISTS `pb_seeds` (
			`name` varchar(100) NOT NULL,
			`created_at` datetime DEFAULT NULL,
			PRIMARY KEY (`name`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
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
		pb_run_seeds($db);
	}
}

if (!function_exists('pb_run_seeds')) {
	/**
	 * Starter pages, each created once per database. A seed is recorded in pb_seeds,
	 * so a page an admin deletes is not re-created.
	 */
	function pb_run_seeds($db)
	{
		$seeds = array(
			'chinar_park_location' => 'pb_seed_chinar_park',
			'dental_implant_2026_11' => 'pb_seed_dental_implant',
			'clear_aligners_2026_11' => 'pb_seed_clear_aligners',
		);
		$done = array();
		foreach ($db->select('name')->get('pb_seeds')->result() as $r) {
			$done[$r->name] = true;
		}
		foreach ($seeds as $name => $fn) {
			if (isset($done[$name])) {
				continue;
			}
			if (function_exists($fn)) {
				$fn($db);
			}
			$db->insert('pb_seeds', array('name' => $name, 'created_at' => pb_now()));
		}
	}
}

if (!function_exists('pb_insert_seed_page')) {
	/** Insert a page and its sections. $sections: list of [type, admin label, fields, items]. */
	function pb_insert_seed_page($db, array $page, array $sections)
	{
		if ($db->where('slug', $page['slug'])->count_all_results('pb_pages') > 0) {
			return 0;
		}
		$now = pb_now();
		$page['created_at'] = $now;
		$page['updated_at'] = $now;
		$db->insert('pb_pages', $page);
		$page_id = (int) $db->insert_id();
		foreach (array_values($sections) as $i => $s) {
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
		return $page_id;
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

if (!function_exists('pb_seed_dental_implant')) {
	/**
	 * Dental implant page rebuilt from "Final Best Dental Implant Clinic in Kolkata_edited.docx" (Nov 2026).
	 * Seeded as a DRAFT on the existing URL: the old hand-coded page stays live until an admin publishes this one.
	 */
	function pb_seed_dental_implant($db)
	{
		$elgin_tel = 'tel:9830411212';
		$chinar_tel = 'tel:9073313193';
		$stories = array();
		foreach (array('0208', '0209', '0210', '0211', '0213', '0214', '0215', '0217', '0218') as $n) {
			$stories[] = array(
				'image' => 'assets/images/dental-implant/patient-stories/IMG-20260502-WA' . $n . '.jpg',
				'image_alt' => 'Dental implant patient at Dontia Care Clinic, Kolkata',
				'caption' => '',
			);
		}

		$sections = array();
		$sections[] = array('hero', 'Hero', array(
			'heading' => 'Best Dental Implant Clinic in Kolkata, India',
			'subheading' => 'Permanent teeth. Personalised implant treatment. Two convenient Kolkata locations.',
			'image' => 'assets/images/dental-implant/hero-banner.jpg',
			'image_alt' => 'Dental implant consultation in Kolkata',
			'fit' => 'cover',
			'button_text' => 'Book a Consultation', 'button_link' => '#book',
			'button2_text' => 'Our Kolkata clinics', 'button2_link' => '#clinics',
		), array());

		$sections[] = array('text', 'Introduction', array(
			'heading' => '',
			'body' => '<p>An unhealthy or missing tooth can affect your confidence to smile wholeheartedly. In some cases, this can create problems while chewing food and speaking, and cause slow degradation of the jawbone. You shouldn’t worry because dental implants provide a solution that can help restore both function and appearance, and also replace missing teeth.</p>'
				. '<p>If you are also searching for the best dental implant clinic in Kolkata, you are already at the right place. If you have lost a tooth because you are old now or due to an accident, we are here for all such needs.</p>'
				. '<p>At Dontia Care Clinic - Dental, we offer treatment for patients with single, multiple, and extensive tooth loss. Dr. Prabhjeet Singh Sethi is the Head of this clinic having over 25 years of experience. He has managed more than 10,000 such cases to date.</p>'
				. '<p>Patients in South Kolkata, Central Kolkata, Bhowanipore, Park Street, Esplanade, Dhakuria, Ballygunge, and Park Circus can visit the Elgin Road branch. Those in New Town, Salt Lake, Rajarhat, and the surrounding areas can avail treatment at clinics in Chinar Park, Rajarhat.</p>'
				. '<p>The first step, regardless of the number of teeth that will be replaced by an implant or multiple implants, an implant-supported bridge, or an All-on-4 or All-on-6, is a proper clinical assessment. This is crucial for you to plan your dental treatment in Kolkata correctly.</p>'
				. '<p>Your consultation in Kolkata allows you to determine the health of your teeth, gums and jawbone before a treatment plan is devised. Schedule an appointment with Dontia Care Clinic and meet with a qualified expert in the field to talk about your dental choices.</p>',
			'align' => 'left',
			'button_text' => 'Book a Consultation', 'button_link' => '#book',
		), array());

		$sections[] = array('text_image', 'Meet the implantologist', array(
			'heading' => 'Meet Our Best Implantologist in Kolkata: Dr. Prabhjeet Singh Sethi',
			'body' => '<p>If you are planning treatment, you should trust only the best for maximum value for your investment. Dr. Prabhjeet Singh Sethi is an experienced implantologist at Dontia Care Clinic. For over 25 years, he has managed various procedures, from single tooth implants to full-arch rehabilitation.</p>'
				. '<p>He takes a holistic view of the patient\'s bite, jaw shape, and dental health when treating. In more complicated situations where multiple teeth must be replaced, this is especially crucial. He also treats patients with jaw pain, and he is a certified &amp; <a href="tmj-specialist-in-kolkata">best TMJ specialist in Kolkata, India</a>.</p>'
				. '<p>During the consultation, patients can inquire directly about their condition and get to know which treatment is right for them.</p>'
				. '<p>The clinic will also, if applicable, be able to give information on professional qualifications, certifications, and experience in the field, so that the patient can make his or her own decision about the treatment.</p>'
				. '<p>If you are also among patients searching for the top high-quality dental implant clinic in Kolkata, always prefer a comprehensive consultation to identify the solution suited to your specific needs.</p>',
			'image' => 'assets/images/branding/dr-prabhjeet-tmj-560w.jpg',
			'image_alt' => 'Dr. Prabhjeet Singh Sethi, implantologist in Kolkata',
			'image_position' => 'left',
			'button_text' => 'Book a Consultation', 'button_link' => '#book',
			'bg' => 'light',
		), array());

		$sections[] = array('text', 'What are dental implants', array(
			'heading' => 'What are Dental Implants?',
			'body' => '<p>Dental implants are small titanium posts placed in the jawbone to replace missing teeth. Once healed, they provide a strong foundation for replacement teeth.</p>',
			'align' => 'center', 'spacing' => 'compact',
		), array());

		$sections[] = array('table', 'Cost table', array(
			'heading' => 'Dental Implant Cost in Kolkata',
			'intro' => '<p>While an indicative package for your oral needs can be gauged online, actual costs can be known only after consulting the dentist. They can confirm the right figure after diagnosing your specific problem.</p>',
			'caption' => 'Indicative Treatment Costs',
			'head1' => 'Treatment', 'head2' => 'Indicative cost', 'head3' => 'What it covers', 'head4' => '',
			'note' => '<p>Note that these numbers represent only estimates and are subject to confirmation from the clinic before publication. The final treatment cost will vary based on the patient\'s clinical condition, restoration, and other additional procedures needed.</p>',
			'bg' => 'light', 'anchor' => 'cost',
		), array(
			array('c1' => 'Single tooth implant', 'c2' => '₹25,000 – ₹45,000', 'c3' => 'Implant, abutment and crown', 'c4' => ''),
			array('c1' => 'Multiple implants', 'c2' => '₹22,000 – ₹40,000 /-', 'c3' => 'Treatment based on case requirements', 'c4' => ''),
			array('c1' => 'Implant-supported bridge', 'c2' => '₹60,000 – ₹95,000', 'c3' => 'Two implants with a three-unit bridge', 'c4' => ''),
			array('c1' => 'All-on-4', 'c2' => '₹2,50,000 – ₹4,00,000 per arch', 'c3' => 'Four implants with fixed full-arch teeth', 'c4' => ''),
			array('c1' => 'All-on-6', 'c2' => '₹3,50,000 – ₹5,50,000 per arch', 'c3' => 'Six implants with fixed full-arch teeth', 'c4' => ''),
			array('c1' => 'Bone graft or sinus lift', 'c2' => '₹8,000 – ₹30,000', 'c3' => 'Subject to clinical requirements', 'c4' => ''),
		));

		$sections[] = array('checklist', 'What affects the cost', array(
			'heading' => 'What Affects the Cost of Dental Implants Services?',
			'intro' => '<p>The cost in Kolkata can vary based on several factors as below:</p>',
			'columns' => '1',
			'outro' => '<p>At <a href="best-dental-clinic-in-kolkata">Dontia Care Clinic-Dental</a>, the goal is to give the patient a clear treatment plan and cost estimate after an evaluation so that he/she can understand what will be included in the treatment before beginning.</p>',
		), array(
			array('label' => 'Cost:', 'text' => 'The type of system used will vary in cost. The implantologist can discuss the different options and what they are best for.', 'link' => ''),
			array('label' => 'Final Crown Material:', 'text' => 'The final Crown Material is one of the various materials used to make the final Crown. There are a range of different material options, including zirconia and porcelain-fused-to-metal, which can vary in size, strength, and cost.', 'link' => ''),
			array('label' => 'Bone condition:', 'text' => 'If the gums have suffered from severe bone loss, they might need to undergo a bone graft or other preparatory process prior to the procedure.', 'link' => ''),
			array('label' => 'Number of missing teeth:', 'text' => 'Treatment will vary by type of procedure.', 'link' => ''),
		));

		$sections[] = array('cards', 'Types of implants', array(
			'heading' => 'Types of Dental Implants We Offer',
			'intro' => '<p>We offer various options, but you should consult us to get the right package for your problem. If you are unsure how to find that, the following details will surely help make the right decision.</p>',
			'columns' => '2', 'numbered' => '0',
			'outro' => '<p><a href="blog/ultimate-guide-to-dental-implants">Learn more about dental implants: The ultimate guide</a></p>',
			'bg' => 'light', 'anchor' => 'types',
		), array(
			array('title' => 'Single Tooth Implant', 'text' => "A single tooth implant is required when one of the teeth is replaced. Its titanium form is inserted into the jawbone and used as an artificial tooth root. Once it heals and stabilises, it serves as a foundation for a fabricated, one-of-a-kind dental crown.\n\nIn contrast to a traditional bridge, where the healthy teeth next to the gap must be trimmed down to accommodate the system, it does not need the adjacent healthy teeth to be shaved down.\n\nIndividuals who have a missing tooth may require a basic evaluation and imaging to decide the suitable treatment option for them."),
			array('title' => 'Multiple Tooth Implants', 'text' => 'Patients with several missing teeth may require multiple implants that form a bridge. Sometimes it offers an adequate solution for more than 2 missing teeth, thus eliminating any such need for each tooth separately. The dentist can suggest the most ideal type based on the health of the bone.'),
			array('title' => 'All-on-4 & All-on-6 Dental Implants', 'text' => "All-on-4 and all-on-6 are for those with many teeth missing in one arch. These are conditions in which a full arch restoration becomes an ideal choice instead of treating one tooth only. All-on-4 and All-on-6 cover replacement of 4 and 6 teeth, respectively.\n\nSelecting one of the two is done after assessing the overall tooth health, which also comprises examining the jaw structure and available bone. The procedure begins after a CBCT scan to grasp a picture of the bone volume.\n\nPlacing temporary teeth after the procedure can be a common practice in some cases before placing the final set. The selection, however, requires expert-level observation by the periodontist.\n\nPatients considering these options may get a hand on an estimated value and duration of healing, which may not be the same for all. A specific package and timeline are decided based on the bone condition and restoration efficiency."),
			array('title' => 'Immediate Implants', 'text' => "In selected cases, an implant can be placed during the same appointment as the extraction of a damaged or failing tooth on an immediate basis.\n\nHowever, this is not appropriate for every patient. The condition of the tooth socket, surrounding bone, gums, and presence of infection all need to be assessed before this approach is considered."),
		));

		$sections[] = array('steps', 'Surgery step by step', array(
			'heading' => 'Tooth Implant Surgery in Kolkata: Step by Step',
			'intro' => '<p>If you know what to expect, the tooth implant surgery in Kolkata may appear to be much simpler. There are a number of steps involved, although each case is unique.</p>',
			'anchor' => 'procedure',
		), array(
			array('title' => 'Consultation and 3D Scan', 'text' => "Your initial appointment will consist of a comprehensive assessment of your teeth, gums and jaw. If necessary, a CBCT scan can give a 3-D picture of the available bone, the position of the surrounding structures, and the position of the nerves.\n\nThis information is crucial for an implantologist to make the appropriate plan for treating a patient."),
			array('title' => 'Planning Involving both Estimated Cost and Treatment', 'text' => "Once assessed, your implantologist discusses the recommended treatment with you. This can include the type of restoration, any extra procedures needed, anticipated treatment phases and a cost estimate.\n\nYou should be given the chance to ask questions and to be informed about the treatment before it is begun."),
			array('title' => 'Implant Placement', 'text' => "Usually, dental implants will be placed with <a href=\"https://en.wikipedia.org/wiki/Local_anesthetic\" target=\"_blank\" rel=\"noopener\">local anaesthetic</a>. The number of such procedures required and the difficulty of the case will influence the length of the procedure.\n\nPatients may be sedated if clinically appropriate to treat dental anxiety."),
			array('title' => 'Healing and Osseointegration', 'text' => "Once in place, this should be allowed to fuse with the rest of the jawbone. This is the biological process of integration into the surrounding tissue.\n\nHealing may take from patient to patient and depend on the quality of the bone, the positioning, and the kind of therapy carried out."),
			array('title' => 'Final Crown, Bridge or Full-Arch Restoration', 'text' => 'The permanent option takes place only after complete healing. A single crown, a bridge on implants, or a full arch restoration could be the viable solution.'),
		));

		$sections[] = array('checklist', 'Who needs implants', array(
			'heading' => 'Wonder if You Also Need Dental Implants',
			'intro' => '<p>Anyone with missing teeth or facing difficulty saving them may find dental implants an ideal solution. However, candidacy needs to be assessed individually.</p><p>You may be considered for it if you:</p>',
			'columns' => '2',
			'outro' => '<p>Patients with other chronic diseases like diabetes should get advice from a dental expert to know if they can also opt for the treatment. The habit of smoking may slow down or disrupt the healing process. Your case expert can talk to you about these factors during your consultation.</p>',
			'bg' => 'light',
		), array(
			array('label' => '', 'text' => 'Have one or more missing teeth', 'link' => ''),
			array('label' => '', 'text' => 'Have a tooth that cannot be restored', 'link' => ''),
			array('label' => '', 'text' => 'Have completed jaw development', 'link' => ''),
			array('label' => '', 'text' => 'Have healthy gums or are prepared to treat existing gum disease', 'link' => ''),
			array('label' => '', 'text' => 'Have enough bone to hold an implant or are an appropriate candidate for bone augmentation', 'link' => ''),
			array('label' => '', 'text' => 'Can keep a clean and healthy mouth and schedule regular check-ups', 'link' => ''),
		));

		$sections[] = array('table', 'Implants vs bridge vs denture', array(
			'heading' => 'Dental Implants vs Bridge vs Denture',
			'intro' => '<p>Patients who are replacing some or all of their missing teeth may make comparisons between implants and bridges and removable dentures. There are varying benefits and drawbacks to each choice, along with various treatment needs and expenses.</p>',
			'caption' => '',
			'head1' => '', 'head2' => 'Dental Implant', 'head3' => 'Bridge', 'head4' => 'Denture',
			'note' => '<p>Selection of an ideal option is done based on the health of the infected tooth and of the adjacent one, the level of bone still present, and of course, your budget and goals.</p>'
				. '<p>If you wish to start treatment immediately without bothering the health of adjacent teeth, a dental implant may be the way. A bridge may be considered when adjacent teeth already require crowns. Dentures can provide a removable solution where implants are unsuitable or where a removable option is preferred.</p>',
		), array(
			array('c1' => 'Stability', 'c2' => 'Fixed', 'c3' => 'Fixed', 'c4' => 'Removable'),
			array('c1' => 'Treatment approach', 'c2' => 'Replaces tooth root and crown', 'c3' => 'Uses supporting teeth', 'c4' => 'Rests on gums'),
			array('c1' => 'Effect on adjacent teeth', 'c2' => 'Usually does not require cutting healthy adjacent teeth', 'c3' => 'Supporting teeth may need preparation', 'c4' => 'Does not require adjacent teeth to be prepared'),
			array('c1' => 'Bone preservation', 'c2' => 'Helps maintain bone around the implant', 'c3' => 'Does not replace the tooth root', 'c4' => 'Does not replace the tooth root'),
			array('c1' => 'Maintenance', 'c2' => 'Regular brushing, flossing, and dental reviews', 'c3' => 'Regular cleaning and dental reviews', 'c4' => 'Requires removal and cleaning'),
			array('c1' => 'Initial cost', 'c2' => 'Generally higher', 'c3' => 'Moderate', 'c4' => 'Generally lower'),
		));

		$sections[] = array('cards', 'Technology', array(
			'heading' => 'Technology and Systems We Use',
			'columns' => '3', 'numbered' => '0', 'bg' => 'light',
		), array(
			array('title' => 'CBCT 3D Imaging', 'text' => 'A 3D CBCT scan can offer detailed information about the jawbone size and other important anatomical structures. This information is especially helpful in planning complicated cases.'),
			array('title' => 'Guided Implant Surgery', 'text' => 'For suitable cases, digital planning and surgical guides can help transfer the planned position to the surgical procedure.'),
			array('title' => 'Implant Systems', 'text' => '<a href="./">Dontia Care Clinic</a> uses <strong>[confirmed implant brands]</strong>. The choice of the perfect procedure involves a close examination of the clinical support needed for the patient.'),
			array('title' => 'Sleep Dentistry', 'text' => 'If you are like others with anxiety about visiting a dental clinic, it is better to consult a dental team first to gain the confidence to go through the procedure. They can guide you to the best option available based on your history of illness.'),
			array('title' => 'Dental Laboratory and CAD/CAM', 'text' => 'Where applicable, digital technology and CAD/CAM processes can be used during the fabrication of crowns and implant-supported restorations to support accurate fit and appearance.'),
		));

		$sections[] = array('checklist', 'Why choose us', array(
			'heading' => 'Why Patients Choose Dontia Care Clinic for Dental Implants',
			'intro' => '<p>Choosing a <strong>clinic in Kolkata</strong> involves more than comparing prices. Patients should also consider the experience, treatment planning, technology, follow-up care, and the range of procedures available.</p><p>Dontia Care Clinic is different from other clinics in several ways:</p>',
			'columns' => '1',
		), array(
			array('label' => 'Qualified implantologist:', 'text' => 'Dr. Prabhjeet Singh Sethi has 25+ years of experience in dentistry.', 'link' => ''),
			array('label' => 'Two clinics in Kolkata:', 'text' => 'There are clinics available at Elgin Road, Bhowanipore, and Chinar Park, Rajarhat.', 'link' => ''),
			array('label' => 'Individual treatment planning:', 'text' => 'Treatment is planned according to the patient\'s dental condition and requirements.', 'link' => ''),
			array('label' => '3D imaging:', 'text' => 'CBCT imaging can be used where clinically required for planning.', 'link' => ''),
			array('label' => 'Different solutions:', 'text' => 'There are a number of different solutions available, such as single, multi, implant-supported bridges and full-arch solutions.', 'link' => ''),
			array('label' => 'Affordable treatment estimates:', 'text' => 'Patients can discuss the different stages of treatment and costs prior to treatment.', 'link' => ''),
			array('label' => 'Long-term follow-up:', 'text' => 'Periodic dental examination of the condition and surrounding tissues.', 'link' => ''),
		));

		$sections[] = array('certificates', 'Certifications', array(
			'heading' => 'Certifications',
			'intro' => '<p>Patients can learn what an implantologist is qualified in through professional training and certifications.</p>'
				. '<p>The clinic can display relevant certificates for:</p>'
				. '<ul><li>Implantology certification</li><li>Dawson Academy certification</li><li>Cosmetic dentistry certification</li><li>Other relevant professional training</li></ul>',
			'outro' => '<p>All certificates come with captions about qualification identification and profession mentioned within them.</p>',
			'bg' => 'light',
		), array());

		$sections[] = array('gallery', 'Patient stories', array(
			'heading' => 'Patient Stories',
			'subheading' => 'Real implant journeys shared by patients at Dontia Care Clinic, Kolkata.',
			'columns' => '3',
		), $stories);

		$sections[] = array('faq', 'FAQs', array(
			'heading' => 'Frequently Asked Questions',
			'subheading' => '',
			'bg' => 'light', 'anchor' => 'faq',
		), array(
			array('question' => 'Are Dental Implants Costly in Kolkata?', 'answer' => "The cost bracket is dependent upon factors including the system and number of sittings required, material involved in the crown or bridge, condition of the bone, and any add-on procedures.\n\nWhile the clinic can only confirm the cost, it may start from about ₹25,000 for a single sitting. The costs for full-arch treatments, like All-on-4, are different. A customised estimate is available following assessment."),
			array('question' => 'Does dental implant surgery hurt?', 'answer' => "The treatment area is usually numbed during the surgery. The post-surgery period may be noticeably different and painful, with swelling.\n\nA feeling of discomfort, swelling, or pain may be common observations post-surgery. It is advisable to strictly follow the aftercare advice of your implant dentist in India."),
			array('question' => 'Does a dental implant require multiple visits?', 'answer' => 'Some cases can be completed relatively quickly, while others require several months. For one tooth, it is likely to take less time than a full-arch procedure.'),
			array('question' => 'Do dental implants offer a permanent solution?', 'answer' => 'The longevity of the outcome may increase if supported through regular monitoring and diligent maintenance of oral hygiene. Going for crown replacement as needed is another way to achieve a lasting solution.'),
			array('question' => 'Can patients with diabetes or hypertension also opt for implants?', 'answer' => 'Yes, people with diabetes and hypertension can also opt for the solution. All it requires is regular diagnosis and management of such diseases. Your implant doctor may also take your medical history into account and inform your specialist doctor when appropriate.'),
			array('question' => 'If I don\'t have enough bone?', 'answer' => 'Sometimes patients whose bones are not thick enough may be considered for bone grafting or other bone enhancement surgeries. In specific cases involving the entire arch, the position of the implants may also be determined based on the amount of existing bone. CBCT scans provide a better view of the situation and enable them to choose options.'),
			array('question' => 'Is it better to have implants than a bridge?', 'answer' => 'Yes, they can be placed on teeth without bothering the health of the adjacent teeth. If teeth already have crowns on them, a bridge may apparently be the right choice then. Your surgeon can make a comparison between both options based on your condition.'),
			array('question' => 'Are dental implants covered by insurance in India?', 'answer' => 'Insurance coverage is available, but it varies across clinics. Dontia Care Clinic doesn’t offer insurance coverage or any EMI plan.'),
		));

		$sections[] = array('cards', 'Clinic locations', array(
			'heading' => 'Book a consultation with Dontia Care Clinic to discuss your dental implant treatment.',
			'columns' => '2', 'numbered' => '0',
			'outro' => '<p>Speak to a dentist and schedule dental implants as per your needs today.</p>',
			'anchor' => 'clinics',
		), array(
			array('title' => 'Dontia Care Clinic – Elgin Road', 'text' => "78 Sambhunath Pandit St, situated close to SSKM Hospital at Bhowanipore, Kolkata 700020\n\n<strong>Call:</strong> 98304 11212\n<strong>Visiting:</strong> 10 AM to 8 PM (Monday to Saturday)", 'link' => $elgin_tel, 'link_text' => 'Call 98304 11212'),
			array('title' => 'Dontia Care Clinic – Chinar Park', 'text' => "PS Aviator, Suite 306, Rajarhat Main Road, Chinar Park, Kolkata 700136\n\n<strong>Call:</strong> 90733 13193\n<strong>Visiting:</strong> Monday to Saturday, 10 AM to 8 PM", 'link' => $chinar_tel, 'link_text' => 'Call 90733 13193'),
		));

		$sections[] = array('cta', 'Google reviews', array(
			'heading' => 'Google Reviews',
			'body' => '<p>See what our patients say about Dontia Care Clinic.</p>',
			'button_text' => 'View reviews on Google', 'button_link' => 'https://maps.app.goo.gl/Ujpqv8hHVHVkWBeL9',
			'button2_text' => 'Book a Consultation', 'button2_link' => '#book',
			'bg' => 'dark',
		), array());

		$sections[] = array('blog_cards', 'Latest blogs', array(
			'heading' => 'From our blog',
			'intro' => 'Practical dental advice and clinic updates from Dontia Care Clinic.',
			'category' => 'dental', 'count' => '3', 'button_text' => 'View all blogs',
		), array());

		pb_insert_seed_page($db, array(
			'title' => 'Best Dental Implant Clinic in Kolkata',
			'slug' => 'best-dental-implant-clinic-in-kolkata',
			'meta_title' => 'Best Dental Implant Clinic in Kolkata | Expert Implant Specialists',
			'meta_description' => 'Restore missing teeth with expert dental implantologists, advanced implant systems, and personalized care at Dontia Dental Care in Kolkata.',
			'og_image' => 'assets/images/dental-implant/hero-banner.jpg',
			'status' => 'draft',
		), $sections);
	}
}

if (!function_exists('pb_seed_clinic_cards')) {
	/** The two clinic address cards used at the bottom of service pages. */
	function pb_seed_clinic_cards()
	{
		return array(
			array('title' => 'Dontia Care Clinic – Elgin Road', 'text' => "78 Sambhunath Pandit St, situated close to SSKM Hospital at Bhowanipore, Kolkata 700020\n\n<strong>Call:</strong> 98304 11212\n<strong>Visiting:</strong> 10 AM to 8 PM (Monday to Saturday)", 'link' => 'tel:9830411212', 'link_text' => 'Call 98304 11212'),
			array('title' => 'Dontia Care Clinic – Chinar Park', 'text' => "PS Aviator, Suite 306, Rajarhat Main Road, Chinar Park, Kolkata 700136\n\n<strong>Call:</strong> 90733 13193\n<strong>Visiting:</strong> Monday to Saturday, 10 AM to 8 PM", 'link' => 'tel:9073313193', 'link_text' => 'Call 90733 13193'),
		);
	}
}

if (!function_exists('pb_seed_clear_aligners')) {
	/**
	 * Clear aligners page rebuilt from "Clear Aligners Service Page HG.docx" (Nov 2026).
	 * Seeded as a DRAFT on the existing URL: the old hand-coded page stays live until an admin publishes this one.
	 */
	function pb_seed_clear_aligners($db)
	{
		$s = array();
		$s[] = array('hero', 'Hero', array(
			'heading' => 'Clear Aligners – A Discreet Alternative to Traditional Braces',
			'subheading' => '',
			'image' => '', 'image_alt' => '', 'fit' => 'cover',
			'button_text' => 'Book Your Appointment', 'button_link' => '#book',
			'button2_text' => '', 'button2_link' => '',
		), array());

		$s[] = array('text_image', 'Introduction', array(
			'heading' => 'Straighten Your Smile without the Look of Metal Braces',
			'body' => '<p>If you would like to have straighter teeth without traditional metal braces</p>'
				. '<p>We at <strong>Dontia Care Clinic-Dental</strong> can offer you a discreet and flexible option using <strong>clear aligners</strong>. Using our customised treatment, like <strong>Invisalign</strong>, we can help straighten your teeth using transparent aligners that have been created around your teeth and bite, and what treatment is required.</p>'
				. '<p>We can assess your smile and advise you whether these would be suitable for treating any overcrowding, spacing, or crooked teeth and some bite alignment issues.</p>',
			'image' => 'clear-aligners-before-after-side-view.jpg',
			'image_alt' => 'Before and after clear aligner treatment at Dontia Care Clinic, Kolkata',
			'image_position' => 'right',
			'button_text' => 'Get a Clear Aligner Consultation', 'button_link' => '#book',
		), array());

		$s[] = array('text', 'What are clear aligners', array(
			'heading' => 'What Are Clear Aligners?',
			'body' => '<p>They are transparent plastic removable aligners that gradually straighten your teeth. Moreover, they work the same way as traditional <a href="best-orthodontist-in-kolkata">braces</a> but are transparent and made without using any metal parts such as wires and brackets. They’re also fully removable, and this means they are very discreet. Because they are so invisible, many adults and teens choose to have them.</p>'
				. '<p>You will normally wear each aligner for as long as advised by your <a href="best-dental-clinic-in-kolkata">dentist</a>.</p>'
				. '<p>Your treatment at our <a href="best-cosmetic-dentist-in-kolkata">cosmetic dental clinic</a> will start with an assessment by our professionals to give us an understanding of your teeth and bite. We will then advise if these would be suitable for you.</p>',
			'align' => 'left', 'bg' => 'light',
		), array());

		$s[] = array('table', 'Aligners vs braces', array(
			'heading' => 'Clear Aligners vs. Traditional Braces',
			'intro' => '<p>As you may be thinking if you\'re planning to have orthodontic treatment:</p>'
				. '<p><strong>“Is there a way to straighten my teeth without braces?”</strong></p>'
				. '<p>In many suitable cases, clear aligner therapy can be used instead of traditional fixed braces.</p>',
			'caption' => '',
			'head1' => 'Clear Aligners', 'head2' => 'Traditional Braces', 'head3' => '', 'head4' => '',
			'row_labels' => '0', 'note' => '',
		), array(
			array('c1' => 'Transparent and discreet', 'c2' => 'Visible brackets and wires', 'c3' => '', 'c4' => ''),
			array('c1' => 'Removable', 'c2' => 'Fixed to the teeth', 'c3' => '', 'c4' => ''),
			array('c1' => 'Can be removed for eating', 'c2' => 'Food choices may require additional care', 'c3' => '', 'c4' => ''),
			array('c1' => 'Easier access for brushing and flossing', 'c2' => 'Cleaning around brackets and wires requires extra attention', 'c3' => '', 'c4' => ''),
			array('c1' => 'Smooth plastic trays', 'c2' => 'Brackets and wires', 'c3' => '', 'c4' => ''),
		));

		$s[] = array('cards', 'Why choose clear aligners', array(
			'heading' => 'Why Choose Clear Aligners?',
			'columns' => '3', 'numbered' => '1', 'bg' => 'light',
		), array(
			array('title' => 'Virtually Invisible', 'text' => 'They are an unobtrusive orthodontic solution.'),
			array('title' => 'Removable', 'text' => 'The aligners can be removed whilst eating, drinking, brushing, and flossing, as advised by your dentist.'),
			array('title' => 'No Metal Brackets or Wires', 'text' => 'They do not require any brackets or wires like traditional braces. Instead, they work with clear plastic.'),
			array('title' => 'Designed Around Your Smile', 'text' => 'They are a personalised treatment using bespoke aligners and careful planning of how your teeth move.'),
			array('title' => 'Convenient for Modern Lifestyles', 'text' => 'They can be a good solution for busy professionals, students and regular travellers, as well as those who want a discreet option.'),
		));

		$s[] = array('checklist', 'Invisalign', array(
			'heading' => 'Invisalign at Dontia Care Clinic-Dental',
			'intro' => '<h3>Advanced Clear Aligner Treatment with Invisalign</h3>'
				. '<p>One option at our <a href="best-dental-clinic-in-kolkata">dental clinic in Kolkata</a> is the <strong>Invisalign</strong> clear aligner.</p>'
				. '<p>Invisalign treatment involves using a series of custom-made clear aligners to gradually shift your teeth. Digital scans and 3D treatment planning can be used in your treatment planning to show you how your teeth will be moved.</p>'
				. '<p>The Invisalign aligners are made from <strong>SmartTrack™ material</strong>, and your treatment will be carried out under professional supervision by a trained Invisalign provider.</p>'
				. '<h3>Why Invisalign?</h3>',
			'columns' => '2', 'anchor' => 'invisalign',
		), array(
			array('label' => '', 'text' => 'Customised treatment planning', 'link' => ''),
			array('label' => '', 'text' => 'Clear and removable aligners', 'link' => ''),
			array('label' => '', 'text' => 'Digital treatment planning', 'link' => ''),
			array('label' => '', 'text' => 'No traditional metal brackets', 'link' => ''),
			array('label' => '', 'text' => 'Designed for gradual tooth movement', 'link' => ''),
			array('label' => '', 'text' => 'Professional monitoring throughout treatment', 'link' => ''),
		));

		$s[] = array('cards', 'Who can benefit', array(
			'heading' => 'Who Can Benefit From Clear Aligners?',
			'intro' => '<p>They can be a good option for addressing specific orthodontic issues such as,</p>',
			'columns' => '3', 'numbered' => '0', 'bg' => 'light',
		), array(
			array('title' => 'Crooked Teeth', 'text' => 'They can assist in steadily making the crooked teeth straight.'),
			array('title' => 'Crowded Teeth', 'text' => 'If you have little room for your teeth, this can cause them to overlap and look crowded. Depending on how severe it is and why you have this issue, you may be able to have them.'),
			array('title' => 'Gaps between Teeth', 'text' => 'Specific gaps between your teeth can be addressed by planned movement of your teeth.'),
			array('title' => 'Mild to Moderate Alignment Problems', 'text' => 'You can have them to help with lots of different alignment issues, but it will depend on the individual.'),
			array('title' => 'Relapse After Previous Braces', 'text' => 'If you have moved your teeth following orthodontic treatment, you may be able to have them in certain cases.'),
		));

		$s[] = array('checklist', 'Can aligners replace braces', array(
			'heading' => 'Can Clear Aligners Replace Braces?',
			'intro' => '<h3>Clear Aligners vs. Braces: Which Option Is Right for You?</h3>'
				. '<p>In several cases, they can be considered an appropriate substitute for braces. However, we will need to consider:</p>',
			'columns' => '2',
		), array(
			array('label' => '', 'text' => 'The position of your teeth', 'link' => ''),
			array('label' => '', 'text' => 'Crowding or spacing', 'link' => ''),
			array('label' => '', 'text' => 'Your bite', 'link' => ''),
			array('label' => '', 'text' => 'Jaw relationship', 'link' => ''),
			array('label' => '', 'text' => 'Gum and bone health', 'link' => ''),
			array('label' => '', 'text' => 'Complexity of tooth movement', 'link' => ''),
			array('label' => '', 'text' => 'Your treatment goals', 'link' => ''),
			array('label' => '', 'text' => 'Your ability to consistently wear removable aligners', 'link' => ''),
		));

		$s[] = array('steps', 'How treatment works', array(
			'heading' => 'How Does Clear Aligner Treatment Work?',
			'intro' => '<p><strong>Your Journey to a Straighter Smile</strong></p>',
			'bg' => 'light', 'anchor' => 'how-it-works',
		), array(
			array('title' => 'Dental Consultation', 'text' => 'An evaluation of an individual’s teeth, gums, and bite capacity is carried out. It helps to understand what will be needed for the person’s dental treatment.'),
			array('title' => 'Digital Assessment', 'text' => 'Where applicable, we will take digital scans and other diagnostic records.'),
			array('title' => 'Personalised Treatment Plan', 'text' => 'Considering an individual’s present alignment, a treatment plan will be prepared by the treating dentist.'),
			array('title' => 'Receive Your Aligners', 'text' => 'You will be given bespoke aligners and information on how and when to wear them.'),
			array('title' => 'Gradual Tooth Movement', 'text' => 'You will work through your aligners at the rate set by your dental professional.'),
			array('title' => 'Regular Monitoring', 'text' => 'Progress will be reviewed at your follow-up appointments.'),
			array('title' => 'Retention', 'text' => 'You may be advised to wear retainers post-treatment. This will help in getting the teeth to comfortably remain in their new place.'),
		));

		$s[] = array('text', 'Comfort', array(
			'heading' => 'Are Clear Aligners Comfortable?',
			'body' => '<p>They are worn over a person’s teeth. The teeth will be rightly placed by the gentle exertion of an external force. As a result, a person might initially experience some uneasiness or tension. If that happens, it is recommended to get in touch with one’s dentist.</p>',
			'align' => 'center', 'spacing' => 'compact',
		), array());

		$s[] = array('checklist', 'Aligners for adults', array(
			'heading' => 'Clear Aligners for Adults',
			'intro' => '<h3>Straighten Your Smile without Changing Your Lifestyle</h3><p>They can be convenient for:</p>',
			'columns' => '1', 'bg' => 'light',
		), array(
			array('label' => '', 'text' => 'Working professionals', 'link' => ''),
			array('label' => '', 'text' => 'Business owners', 'link' => ''),
			array('label' => '', 'text' => 'Students', 'link' => ''),
			array('label' => '', 'text' => 'Public-facing professionals', 'link' => ''),
			array('label' => '', 'text' => 'People preparing for weddings or important events', 'link' => ''),
		));

		$s[] = array('cards', 'Why choose Dontia', array(
			'heading' => 'Why Choose Dontia Care Clinic-Dental for Clear Aligners?',
			'columns' => '3', 'numbered' => '0',
		), array(
			array('title' => 'Personalised Treatment Planning', 'text' => 'Treatment tailored to your smile and orthodontic needs.'),
			array('title' => 'Professional Dental Supervision', 'text' => 'Monitoring by dental professionals.'),
			array('title' => 'Invisalign Available', 'text' => 'Invisalign clear aligners are available at our invisalign clinic for suitable patients.'),
			array('title' => 'Digital Approach', 'text' => 'Use of modern technology helps assess, plan, and monitor treatment where appropriate.'),
			array('title' => 'Focus on Long-Term Oral Health', 'text' => 'We do not solely focus on making your teeth look straight. We will consider your general oral health and bite as part of our treatment planning.'),
		));

		$s[] = array('checklist', 'Is it right for you', array(
			'heading' => 'Is Clear Aligner Treatment Right for You?',
			'intro' => '<p>You may be a candidate if you:</p>',
			'columns' => '2', 'bg' => 'light',
		), array(
			array('label' => '', 'text' => 'Want straighter teeth', 'link' => ''),
			array('label' => '', 'text' => 'Prefer a discreet alternative to metal braces', 'link' => ''),
			array('label' => '', 'text' => 'Have crowded or crooked teeth', 'link' => ''),
			array('label' => '', 'text' => 'Have certain spaces between your teeth', 'link' => ''),
			array('label' => '', 'text' => 'Want removable orthodontic appliances', 'link' => ''),
			array('label' => '', 'text' => 'Are willing to wear aligners consistently', 'link' => ''),
			array('label' => '', 'text' => 'Want professionally supervised treatment', 'link' => ''),
		));

		$s[] = array('gallery', 'Results', array(
			'heading' => 'Clear Aligner Results',
			'subheading' => 'Clinical photos from aligner treatment at Dontia Care Clinic. Results vary from person to person.',
			'columns' => '3',
		), array(
			array('image' => 'clear-aligners-before-after-front-view.jpg', 'image_alt' => 'Before and after clear aligner treatment, front view, at Dontia Care Clinic', 'caption' => 'Front view before and after professionally supervised clear aligner treatment.'),
			array('image' => 'clear-aligners-before-after-side-view.jpg', 'image_alt' => 'Before and after clear aligner treatment, side view', 'caption' => 'Side view showing improved alignment after aligner treatment.'),
			array('image' => 'clear-aligners-before-after-close-up.jpg', 'image_alt' => 'Close-up before and after clear aligner treatment', 'caption' => 'Close-up of tooth position before treatment and after aligners.'),
			array('image' => 'clear-aligners-before-after-upper-arch.jpg', 'image_alt' => 'Upper arch before and after clear aligner treatment', 'caption' => 'Upper arch alignment before and after clear aligner treatment.'),
			array('image' => 'clear-aligners-before-after-lower-arch.jpg', 'image_alt' => 'Lower arch before and after clear aligner treatment', 'caption' => 'Lower arch alignment before and after clear aligner treatment.'),
		));

		$s[] = array('video_grid', 'Patient videos', array(
			'heading' => 'Watch Clear Aligner Stories',
			'subheading' => 'Hear how patients at Dontia Care Clinic approached teeth straightening with aligners.',
			'columns' => '2', 'bg' => 'light',
		), array(
			array('title' => 'Teeth straightening without braces', 'youtube' => 'https://www.youtube.com/watch?v=IN4RpeCVrF4'),
			array('title' => 'An Invisalign journey at Dontia Care Clinic', 'youtube' => 'https://www.youtube.com/watch?v=192rhucBKoo'),
		));

		$s[] = array('text_image', 'Google review', array(
			'heading' => 'What Patients Say',
			'body' => '<p>A Google review from a parent whose child completed aligner treatment at the clinic.</p>',
			'image' => 'assets/images/aligners/aligners-google-reviews.png',
			'image_alt' => 'Google review describing aligner treatment and a completed smile at Dontia Care Clinic',
			'image_position' => 'right',
			'button_text' => 'View reviews on Google', 'button_link' => 'https://maps.app.goo.gl/Ujpqv8hHVHVkWBeL9',
		), array());

		$s[] = array('cta', 'Start your journey', array(
			'heading' => 'Start Your Clear Aligner Journey',
			'body' => '<h3>Want Straighter Teeth Without Traditional Braces?</h3>'
				. '<p>Your smile doesn’t need to be hidden behind metal braces.</p>'
				. '<p>Find out if clear aligners or Invisalign would be right for your smile.</p>'
				. '<p><a href="contact-us">Book a consultation</a><strong> at Dontia Care Clinic-Dental</strong>.</p>',
			'button_text' => 'Book a Consultation', 'button_link' => '#book',
			'button2_text' => 'Call 98304 11212', 'button2_link' => 'tel:9830411212',
			'bg' => 'dark',
		), array());

		$s[] = array('faq', 'FAQs', array(
			'heading' => 'Frequently Asked Questions',
			'subheading' => '', 'anchor' => 'faq',
		), array(
			array('question' => 'Can I straighten my teeth without braces?', 'answer' => 'It is possible in several appropriate cases. As a substitute for traditional braces, Invisalign can be used.'),
			array('question' => 'Can clear aligners fix crooked teeth?', 'answer' => 'Several kinds of tooth alignment issues can be treated by them. These include specific cases concerning crooked teeth. A person’s dentist will be able to determine how severe the case is and what initially caused the misalignment.'),
			array('question' => 'Can they fix crowded teeth?', 'answer' => 'Regarding specific cases of dental crowding, this may be considered appropriate. However, complicated cases may need a different orthodontic approach. Here, it is essential to have a clinical evaluation.'),
			array('question' => 'How many hours a day should I wear them?', 'answer' => 'Patients undergoing Invisalign treatment are normally advised to wear them for approx. 20-22 hours every day. They can be removed only while eating, drinking, and maintaining oral hygiene.'),
			array('question' => 'How much do they cost?', 'answer' => 'There are several factors on which it depends, such as the time period taken for the treatment, complexity of the case, treatment procedure, and aligner process. Our Clear aligners dental clinic, at the time of consultation, offers a tailored treatment estimate.'),
		));

		$s[] = array('cards', 'Clinic locations', array(
			'heading' => 'Visit Our Kolkata Clinics',
			'columns' => '2', 'numbered' => '0', 'bg' => 'light', 'anchor' => 'clinics',
		), pb_seed_clinic_cards());

		$s[] = array('checklist', 'Related dental care', array(
			'heading' => 'Related Dental Care',
			'intro' => '<p>Explore other treatments at Dontia Care Clinic.</p>',
			'columns' => '2',
		), array(
			array('label' => '', 'text' => 'Dental Implants', 'link' => 'best-dental-implant-clinic-in-kolkata'),
			array('label' => '', 'text' => 'Cosmetic Dentistry', 'link' => 'best-cosmetic-dentist-in-kolkata'),
			array('label' => '', 'text' => 'Braces & Orthodontics', 'link' => 'best-orthodontist-in-kolkata'),
			array('label' => '', 'text' => 'Smile Makeover', 'link' => 'best-cosmetic-dentist-in-kolkata'),
			array('label' => '', 'text' => 'Teeth Whitening', 'link' => 'best-cosmetic-dentist-in-kolkata'),
			array('label' => '', 'text' => 'General Dentistry', 'link' => 'best-dental-clinic-in-kolkata'),
			array('label' => '', 'text' => 'Dental Clinic in Kolkata', 'link' => 'best-dental-clinic-in-kolkata'),
			array('label' => '', 'text' => 'Contact', 'link' => 'contact-us'),
		));

		$s[] = array('blog_cards', 'Latest blogs', array(
			'heading' => 'From our blog',
			'intro' => 'Practical dental advice and clinic updates from Dontia Care Clinic.',
			'category' => 'dental', 'count' => '3', 'button_text' => 'View all blogs',
			'bg' => 'light',
		), array());

		pb_insert_seed_page($db, array(
			'title' => 'Best Clear Aligners Clinic in Kolkata',
			'slug' => 'best-clear-aligners-clinic-in-kolkata',
			'meta_title' => 'Clear Aligners in Kolkata | Invisalign Treatment – Dontia Care Clinic-Dental',
			'meta_description' => 'Straighten your teeth discreetly with clear aligners and Invisalign at Dontia Care Clinic-Dental, Kolkata. Get personalised orthodontic treatment. Book a consultation!',
			'og_image' => 'clear-aligners-before-after-front-view.jpg',
			'status' => 'draft',
		), $s);
	}
}
