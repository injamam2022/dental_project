<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Performance helpers: responsive/WebP picture attrs, marketing-page detection.
 */

/**
 * Home + dental landing pages use a reduced CSS/JS bundle.
 */
function dontia_is_marketing_lite_page()
{
	$CI =& get_instance();
	if (!is_object($CI) || !isset($CI->router)) {
		return false;
	}
	$class = strtolower((string) $CI->router->fetch_class());
	return in_array($class, array('home', 'dental'), true);
}

/**
 * Footer + scroll-to-top (brown brand) — inlined on every page before theme CSS.
 */
function dontia_global_chrome_css()
{
	$path = FCPATH . 'assets/css/dontia-global-chrome.css';
	if (!is_readable($path)) {
		return '';
	}
	$css = file_get_contents($path);
	return is_string($css) ? trim($css) : '';
}

/**
 * Critical above-the-fold CSS (inlined — avoids render-blocking request).
 */
function dontia_marketing_critical_css()
{
	$path = FCPATH . 'assets/css/critical-marketing.css';
	if (!is_readable($path)) {
		return '';
	}
	$css = file_get_contents($path);
	return is_string($css) ? trim($css) : '';
}

/**
 * YouTube poster for facade / lazy embed (no iframe until interaction).
 */
function dontia_youtube_poster_url($video_id)
{
	$id = preg_replace('/[^a-zA-Z0-9_-]/', '', (string) $video_id);
	if ($id === '') {
		return '';
	}
	return 'https://i.ytimg.com/vi/' . $id . '/mqdefault.jpg';
}

/**
 * Hero facade poster: local asset first, then lighter YouTube mqdefault.
 *
 * @return array{src:string,preload:string,width:int,height:int,local:bool}
 */
function dontia_home_hero_poster($video_id)
{
	$id = preg_replace('/[^a-zA-Z0-9_-]/', '', (string) $video_id);
	$out = array(
		'src' => '',
		'preload' => '',
		'width' => 320,
		'height' => 180,
		'local' => false,
	);
	if ($id === '') {
		return $out;
	}
	$hero_dir = FCPATH . 'assets/images/hero/';
	$hero_url = rtrim(base_url('assets/images/hero/'), '/') . '/';
	foreach (array($id . '-poster.webp', $id . '-poster.jpg', 'home-hero-poster.webp', 'home-hero-poster.jpg') as $fn) {
		if (is_file($hero_dir . $fn)) {
			$out['src'] = $hero_url . rawurlencode($fn);
			$out['preload'] = $out['src'];
			$out['local'] = true;
			$dim = @getimagesize($hero_dir . $fn);
			if (is_array($dim)) {
				$out['width'] = (int) $dim[0];
				$out['height'] = (int) $dim[1];
			}
			return $out;
		}
	}
	return $out;
}

/**
 * When the original upload is huge and width variants exist, force a smaller src.
 */
function dontia_upload_smaller_src_override($subdir, $filename, $max_bytes = 400000)
{
	$filename = basename((string) $filename);
	$subdir = trim(str_replace(array('..', '\\'), array('', '/'), (string) $subdir), '/');
	$dir_fs = FCPATH . 'admin/webroot/uploads/' . ($subdir !== '' ? $subdir . '/' : '');
	$path = $dir_fs . $filename;
	if ($filename === '' || !is_file($path) || filesize($path) <= $max_bytes) {
		return '';
	}
	$pi = pathinfo($filename);
	$stem = isset($pi['filename']) ? $pi['filename'] : $filename;
	$ext = isset($pi['extension']) ? strtolower($pi['extension']) : 'jpg';
	$dir_url = rtrim(base_url('admin/webroot/uploads/' . ($subdir !== '' ? $subdir . '/' : '')), '/') . '/';
	if ($subdir === 'product') {
		$try_ext = array_unique(array_filter(array('webp', 'jpg', 'jpeg', $ext)));
		$width_try = array(100, 200, 400, 480, 768);
	} elseif ($subdir === 'banner') {
		$try_ext = array_unique(array_filter(array('webp', 'jpg', 'jpeg', $ext)));
		$width_try = array(640, 960, 1280, 1920);
	} else {
		$try_ext = array_unique(array_filter(array('jpg', 'jpeg', 'webp', $ext)));
		$width_try = array(480, 768, 1024, 1280);
	}
	foreach ($width_try as $w) {
		foreach ($try_ext as $e) {
			$cand = $stem . '-' . $w . 'w.' . $e;
			if (is_file($dir_fs . $cand)) {
				return $dir_url . rawurlencode($cand);
			}
		}
	}
	return '';
}

/**
 * Service card on homepage (product uploads).
 *
 * @return array{src:string,srcset:string,webp_srcset:string,sizes:string,width:int,height:int}|null
 */
function dontia_service_card_picture($filename, $label = '')
{
	$filename = basename((string) $filename);
	if ($filename === '') {
		return null;
	}
	$pic = dontia_upload_picture_attrs('product', $filename, '100px');
	if ($pic['src'] === '') {
		return null;
	}
	return $pic;
}

/**
 * Build src/srcset + optional WebP srcset for a file under admin/webroot/uploads/{subdir}/.
 *
 * @return array{src:string,srcset:string,webp_srcset:string,sizes:string,width:int,height:int}
 */
function dontia_upload_picture_attrs($subdir, $filename, $sizes = '100px')
{
	$CI =& get_instance();
	$CI->load->helper('dontia_responsive_images');

	$filename = basename((string) $filename);
	$subdir = trim(str_replace(array('..', '\\'), array('', '/'), (string) $subdir), '/');

	$empty = array(
		'src' => '',
		'srcset' => '',
		'webp_srcset' => '',
		'sizes' => (string) $sizes,
		'width' => 0,
		'height' => 0,
	);

	if ($filename === '') {
		return $empty;
	}

	$card_sizes = $sizes;
	if ($subdir === 'product') {
		$card_sizes = '100px';
	} elseif ($subdir === 'dental_media' || strpos($subdir, 'technology') !== false) {
		$card_sizes = '(max-width: 767px) 100vw, 50vw';
	}

	$dir_rel = 'admin/webroot/uploads/' . ($subdir !== '' ? $subdir . '/' : '');
	$dir_fs = FCPATH . $dir_rel;

	$resp = dontia_responsive_upload_image($subdir, $filename, $card_sizes);
	$out = array_merge($empty, array(
		'src' => $resp['src'],
		'srcset' => $resp['srcset'],
		'sizes' => $resp['sizes'],
		'width' => (int) $resp['width'],
		'height' => (int) $resp['height'],
	));

	if ($subdir === 'product') {
		$orig_path = $dir_fs . $filename;
		if (is_file($orig_path) && filesize($orig_path) > 50000) {
			$smaller = dontia_upload_smaller_src_override('product', $filename, 50000);
			if ($smaller !== '') {
				$out['src'] = $smaller;
			} elseif ($out['srcset'] !== '') {
				$first = trim(explode(',', $out['srcset'])[0]);
				$first_url = trim(explode(' ', $first)[0]);
				if ($first_url !== '' && strpos($first_url, rawurlencode($filename)) === false) {
					$out['src'] = $first_url;
				}
			}
		}
	}

	$dir_url = rtrim(base_url($dir_rel), '/') . '/';

	$pi = pathinfo($filename);
	$stem = isset($pi['filename']) ? $pi['filename'] : $filename;
	$orig_w = $out['width'] > 0 ? $out['width'] : 800;

	$webp_widths = ($subdir === 'product')
		? array(100, 200, 400)
		: array(480, 768, 1024, 1280);

	$webp_parts = dontia_collect_webp_srcset_parts($dir_fs, $dir_url, $stem, $webp_widths, $orig_w);
	$out['webp_srcset'] = implode(', ', $webp_parts);

	if ($out['src'] === '' && is_file($dir_fs . $filename)) {
		$out['src'] = $dir_url . rawurlencode($filename);
	}

	return $out;
}

/**
 * @param int[] $widths
 * @return string[]
 */
function dontia_collect_webp_srcset_parts($dir_fs, $dir_url, $stem, array $widths, $orig_w)
{
	$parts = array();
	foreach ($widths as $w) {
		if ($w >= $orig_w) {
			continue;
		}
		$cand = $stem . '-' . (int) $w . 'w.webp';
		if (is_file($dir_fs . $cand)) {
			$parts[] = $dir_url . rawurlencode($cand) . ' ' . (int) $w . 'w';
		}
	}
	$full = $stem . '.webp';
	if (is_file($dir_fs . $full)) {
		$parts[] = $dir_url . rawurlencode($full) . ' ' . (int) $orig_w . 'w';
	}
	return $parts;
}

/**
 * LCP preload payload for responsive about image.
 *
 * @param array $hai from dontia_home_about_responsive_attrs()
 * @return array<string, string>|string
 */
function dontia_lcp_preload_entry(array $hai)
{
	$href = '';
	if (!empty($hai['preload'])) {
		$href = (string) $hai['preload'];
	} elseif (!empty($hai['src'])) {
		$href = (string) $hai['src'];
	}
	if ($href === '') {
		return '';
	}
	if (empty($hai['srcset'])) {
		return $href;
	}
	return array(
		'href' => $href,
		'imagesrcset' => (string) $hai['srcset'],
		'imagesizes' => isset($hai['sizes']) ? (string) $hai['sizes'] : '(max-width: 991px) 100vw, 50vw',
	);
}

/**
 * True when the site is served from localhost (external CDN URLs often 404 here).
 *
 * @return bool
 */
function dontia_is_local_dev_host()
{
	$host = isset($_SERVER['HTTP_HOST']) ? strtolower((string) $_SERVER['HTTP_HOST']) : '';
	if ($host === '') {
		return false;
	}
	return ($host === 'localhost'
		|| strpos($host, '127.0.0.1') !== false
		|| strpos($host, 'localhost:') === 0);
}

/**
 * Resolve an About-page image reference to a public URL (local file must exist).
 *
 * @param string $raw Filename, uploads-relative path, or absolute URL
 * @return string
 */
function dontia_resolve_upload_image_url($raw)
{
	$u = trim((string) $raw);
	if ($u === '') {
		return '';
	}
	if (preg_match('#^https?://#i', $u) || strpos($u, '//') === 0) {
		if (preg_match('#dontiacareclinic\.com/wp-content/uploads/#i', $u)) {
			$path = parse_url($u, PHP_URL_PATH);
			$basename = is_string($path) ? basename($path) : '';
			if ($basename !== '') {
				$local = dontia_resolve_upload_image_url($basename);
				if ($local !== '') {
					return $local;
				}
			}
		}
		if (dontia_is_local_dev_host()) {
			return '';
		}
		return $u;
	}

	$u = str_replace('\\', '/', $u);
	$u = ltrim($u, '/');
	$u = preg_replace('#^admin/webroot/uploads/#i', '', $u);

	$upload_fs = rtrim(FCPATH, '/\\') . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'webroot' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
	$upload_url = rtrim(base_url('admin/webroot/uploads/'), '/') . '/';

	if (is_file($upload_fs . str_replace('/', DIRECTORY_SEPARATOR, $u))) {
		return $upload_url . $u;
	}

	$basename = basename($u);
	if ($basename === '') {
		return '';
	}

	$search_dirs = array(
		'about',
		'dental_media',
		'dental_page/defaults',
		'home',
		'banner',
		'dental_page/technology',
		'gallery',
	);

	foreach ($search_dirs as $dir) {
		$rel = $dir . '/' . $basename;
		if (is_file($upload_fs . str_replace('/', DIRECTORY_SEPARATOR, $rel))) {
			return $upload_url . $rel;
		}
	}

	return '';
}

/**
 * Built-in before/after pairs using images that ship with the project.
 *
 * @return array<int, array{before: string, after: string}>
 */
function dontia_about_default_patient_cases()
{
	$candidates = array(
		array('home/IMG_1707-768w.jpg', 'home/IMG_1707-1024w.jpg'),
		array('banner/1.jpg', 'banner/2.jpg'),
		array('dental_page/technology/Baldus.jpg', 'dental_page/technology/Cerec.png'),
		array('dental_page/technology/Dental-Laser.jpg', 'banner/about-us-banner.jpg'),
		array('home/IMG_1707-480w.jpg', 'banner/Koel_Mallick_with_dentist_in_kolkata_JPG.jpeg'),
	);

	$out = array();
	foreach ($candidates as $pair) {
		$b = dontia_resolve_upload_image_url($pair[0]);
		$a = dontia_resolve_upload_image_url($pair[1]);
		if ($b !== '' && $a !== '') {
			$out[] = array('before' => $b, 'after' => $a);
		}
		if (count($out) >= 3) {
			break;
		}
	}

	return $out;
}

/**
 * Build before/after case list for the About page (admin, legacy DB, dental media, then defaults).
 *
 * @param mixed $about_page_con DB rows from About_Model::get_all_content()
 * @param array $dental_before_after Optional rows from Dental_Model::get_media_by_section('before_after')
 * @return array<int, array{before: string, after: string}>
 */
function dontia_about_build_patient_cases($about_page_con, $dental_before_after = array())
{
	$cases = array();
	$seen = array();

	$push = function ($before_raw, $after_raw) use (&$cases, &$seen) {
		$b = dontia_resolve_upload_image_url($before_raw);
		$a = dontia_resolve_upload_image_url($after_raw);
		if ($b === '' || $a === '') {
			return;
		}
		$key = $b . '|' . $a;
		if (isset($seen[$key])) {
			return;
		}
		$seen[$key] = true;
		$cases[] = array('before' => $b, 'after' => $a);
	};

	$parsed = null;
	if (!empty($about_page_con) && is_array($about_page_con) && isset($about_page_con[0]->description)) {
		$parsed = @unserialize($about_page_con[0]->description);
	}
	if (!is_array($parsed)) {
		$parsed = array();
	}

	$ext = (isset($parsed[4]) && is_array($parsed[4])) ? $parsed[4] : array();
	if (!empty($ext['cases']) && is_array($ext['cases'])) {
		foreach ($ext['cases'] as $pair) {
			if (!is_array($pair)) {
				continue;
			}
			$push(
				isset($pair['before']) ? $pair['before'] : '',
				isset($pair['after']) ? $pair['after'] : ''
			);
		}
	}

	if (count($cases) < 3 && isset($parsed[3]) && is_array($parsed[3])) {
		foreach ($parsed[3] as $pair) {
			if (!is_array($pair)) {
				continue;
			}
			$push(
				isset($pair[0]) ? $pair[0] : '',
				isset($pair[1]) ? $pair[1] : ''
			);
		}
	}

	if (count($cases) < 3 && is_array($dental_before_after)) {
		foreach ($dental_before_after as $row) {
			if (!is_object($row)) {
				continue;
			}
			$push(
				isset($row->image_name) ? $row->image_name : '',
				isset($row->image_name_2) ? $row->image_name_2 : ''
			);
		}
	}

	foreach (dontia_about_default_patient_cases() as $pair) {
		if (count($cases) >= 3) {
			break;
		}
		$key = $pair['before'] . '|' . $pair['after'];
		if (!isset($seen[$key])) {
			$seen[$key] = true;
			$cases[] = $pair;
		}
	}

	return array_slice($cases, 0, 3);
}
