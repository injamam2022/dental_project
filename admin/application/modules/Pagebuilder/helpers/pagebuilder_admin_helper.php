<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('pb_load_shared_helper')) {
	/** The section definitions live in the public app's helper so both apps share them. */
	function pb_load_shared_helper()
	{
		if (function_exists('pb_section_types')) {
			return;
		}
		$file = dirname(FCPATH) . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'page_builder_helper.php';
		require_once $file;
	}
}
pb_load_shared_helper();

if (!function_exists('pb_admin_field')) {
	/**
	 * Render one form control.
	 * @param array  $f     field definition from pb_section_types()
	 * @param string $name  input name, e.g. f[heading] or items[abc][title]
	 * @param mixed  $value current value
	 * @param string $file  file input name for image fields
	 */
	function pb_admin_field(array $f, $name, $value, $file = '')
	{
		$value = (string) $value;
		$req = !empty($f['required']) ? ' required' : '';
		$ph = isset($f['placeholder']) ? ' placeholder="' . pb_e($f['placeholder']) . '"' : '';
		$html = '';
		switch ($f['type']) {
			case 'textarea':
				$html = '<textarea class="form-control" rows="4" name="' . pb_e($name) . '"' . $req . $ph . '>' . pb_e($value) . '</textarea>';
				break;
			case 'richtext':
				$html = '<textarea class="form-control pb-richtext" rows="6" name="' . pb_e($name) . '">' . pb_e($value) . '</textarea>';
				break;
			case 'code':
				$html = '<textarea class="form-control pb-code" rows="12" spellcheck="false" name="' . pb_e($name) . '">' . pb_e($value) . '</textarea>';
				break;
			case 'select':
				$html = '<select class="form-control" name="' . pb_e($name) . '">';
				foreach ($f['options'] as $k => $label) {
					$html .= '<option value="' . pb_e($k) . '"' . ((string) $k === $value ? ' selected' : '') . '>' . pb_e($label) . '</option>';
				}
				$html .= '</select>';
				break;
			case 'image':
				$url = pb_image_url($value);
				$html = '<div class="pb-img-field">'
					. '<div class="pb-img-preview' . ($url === '' ? ' is-empty' : '') . '">'
					. ($url !== '' ? '<img src="' . pb_e($url) . '" alt="">' : '')
					. '<span class="pb-img-empty"><i class="fa fa-picture-o"></i> No image</span></div>'
					. '<div class="pb-img-controls">'
					. '<label class="btn btn-default btn-sm pb-img-pick"><i class="fa fa-upload"></i> Choose image'
					. '<input type="file" name="' . pb_e($file) . '" accept="image/jpeg,image/png,image/webp,image/gif" class="pb-img-file"></label> '
					. '<button type="button" class="btn btn-link btn-sm pb-img-remove"' . ($url === '' ? ' style="display:none"' : '') . '><i class="fa fa-times"></i> Remove</button>'
					. '<input type="text" class="form-control input-sm pb-img-value" name="' . pb_e($name) . '" value="' . pb_e($value) . '" placeholder="…or paste an image path / URL">'
					. '</div></div>';
				break;
			default:
				$html = '<input type="text" class="form-control" name="' . pb_e($name) . '" value="' . pb_e($value) . '"' . $req . $ph . '>';
		}
		if (!empty($f['help'])) {
			$html .= '<p class="help-block">' . pb_e($f['help']) . '</p>';
		}
		return $html;
	}
}

if (!function_exists('pb_admin_section_summary')) {
	/** One-line description of a section for the builder list. */
	function pb_admin_section_summary($type, $data_json)
	{
		$d = pb_decode_data($type, $data_json);
		$f = $d['fields'];
		$text = '';
		foreach (array('heading', 'youtube', 'html') as $k) {
			if (!empty($f[$k])) {
				$text = trim(strip_tags($f[$k]));
				break;
			}
		}
		if ($text === '' && !empty($f['body'])) {
			$text = trim(strip_tags($f['body']));
		}
		if (mb_strlen($text) > 90) {
			$text = mb_substr($text, 0, 88) . '…';
		}
		return array(
			'text' => $text,
			'items' => count($d['items']),
			'image' => isset($f['image']) ? pb_image_url($f['image']) : '',
		);
	}
}
