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
	$out['src'] = 'https://i.ytimg.com/vi/' . $id . '/mqdefault.jpg';
	$out['preload'] = $out['src'];
	$out['width'] = 320;
	$out['height'] = 180;
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
	$try_ext = array_unique(array_filter(array('webp', 'jpg', 'jpeg', $ext)));
	foreach (array(480, 768, 1024, 1280) as $w) {
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

	$resp = dontia_responsive_upload_image($subdir, $filename, $card_sizes);
	$out = array_merge($empty, array(
		'src' => $resp['src'],
		'srcset' => $resp['srcset'],
		'sizes' => $resp['sizes'],
		'width' => (int) $resp['width'],
		'height' => (int) $resp['height'],
	));

	$dir_rel = 'admin/webroot/uploads/' . ($subdir !== '' ? $subdir . '/' : '');
	$dir_fs = FCPATH . $dir_rel;
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
