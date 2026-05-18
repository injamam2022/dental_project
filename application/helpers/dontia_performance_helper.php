<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Whether to load a reduced CSS/JS set (homepage + dental landings).
 */
function dontia_is_marketing_lite_page($router = null)
{
	if ($router === null) {
		$CI =& get_instance();
		$class = strtolower((string) $CI->router->fetch_class());
	} else {
		$class = strtolower((string) $router->fetch_class());
	}
	return in_array($class, array('home', 'dental'), true);
}

/**
 * YouTube max-res poster URL (no third-party script until play).
 */
function dontia_youtube_poster_url($video_id)
{
	$id = preg_replace('/[^a-zA-Z0-9_-]/', '', (string) $video_id);
	if ($id === '') {
		return '';
	}
	return 'https://i.ytimg.com/vi_webp/' . $id . '/maxresdefault.webp';
}

/**
 * Picture/srcset data for uploads under admin/webroot/uploads/{subdir}/.
 *
 * @return array{webp_srcset:string,src:string,srcset:string,sizes:string,width:int,height:int}
 */
function dontia_upload_picture_attrs($subdir, $filename, $sizes)
{
	$CI =& get_instance();
	$CI->load->helper('dontia_responsive_images');
	$r = dontia_responsive_upload_image($subdir, $filename, $sizes);

	$subdir = trim(str_replace(array('..', '\\'), array('', '/'), (string) $subdir), '/');
	$filename = basename((string) $filename);
	$dir_fs = FCPATH . 'admin/webroot/uploads/' . ($subdir !== '' ? $subdir . '/' : '');
	$dir_url = rtrim(base_url('admin/webroot/uploads/' . ($subdir !== '' ? $subdir . '/' : '')), '/') . '/';

	$webp_bits = array();
	$pi = pathinfo($filename);
	$stem = isset($pi['filename']) ? $pi['filename'] : $filename;
	$widths = array(224, 336, 480, 768);

	foreach ($widths as $w) {
		$cand = $stem . '-' . $w . 'w.webp';
		if (is_file($dir_fs . $cand)) {
			$webp_bits[] = $dir_url . rawurlencode($cand) . ' ' . $w . 'w';
		}
	}
	$stem_webp = $stem . '.webp';
	if (is_file($dir_fs . $stem_webp)) {
		$ow = $r['width'] > 0 ? $r['width'] : 480;
		$webp_bits[] = $dir_url . rawurlencode($stem_webp) . ' ' . (int) $ow . 'w';
	}

	return array(
		'webp_srcset' => implode(', ', array_unique($webp_bits)),
		'src' => $r['src'],
		'srcset' => $r['srcset'],
		'sizes' => $r['sizes'],
		'width' => $r['width'],
		'height' => $r['height'],
	);
}

/**
 * Service card icon (product upload) — ~112px ring, 2x srcset.
 *
 * @return array{webp_srcset:string,src:string,srcset:string,sizes:string,width:int,height:int,alt:string}
 */
function dontia_service_card_picture($filename, $alt = '')
{
	return dontia_upload_picture_attrs('product', $filename, '112px');
}
