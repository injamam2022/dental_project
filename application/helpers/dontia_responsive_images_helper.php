<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Build responsive src/srcset for files under admin/webroot/uploads/{subdir}/.
 * Optional width derivatives: {stem}-480w.{ext}, {stem}-768w.{ext}, …
 *
 * @param string $subdir Relative folder under uploads/, e.g. home | dental_media | dental_page/technology
 * @param string $filename Basename only
 * @param string $sizes Value for the sizes attribute
 * @return array{src:string,srcset:string,sizes:string,width:int,height:int,has_variants:bool,preload_mid:string}
 */
function dontia_responsive_upload_image($subdir, $filename, $sizes, array $widths = null)
{
	$subdir = trim(str_replace(array('..', '\\'), array('', '/'), (string) $subdir), '/');
	$filename = basename((string) $filename);
	$dir_rel = 'admin/webroot/uploads/' . ($subdir !== '' ? $subdir . '/' : '');
	$dir_fs = FCPATH . $dir_rel;
	$dir_url = rtrim(base_url($dir_rel), '/') . '/';

	$out = array(
		'src' => '',
		'srcset' => '',
		'sizes' => (string) $sizes,
		'width' => 0,
		'height' => 0,
		'has_variants' => false,
		'preload_mid' => '',
	);

	if ($filename === '' || !is_file($dir_fs . $filename)) {
		if ($filename !== '') {
			$out['src'] = $dir_url . rawurlencode($filename);
		}
		return $out;
	}

	$path_orig = $dir_fs . $filename;
	$info = @getimagesize($path_orig);
	if (is_array($info)) {
		$out['width'] = (int) $info[0];
		$out['height'] = (int) $info[1];
	}

	$pi = pathinfo($filename);
	$stem = isset($pi['filename']) ? $pi['filename'] : $filename;
	$ext = isset($pi['extension']) ? $pi['extension'] : '';

	if ($widths === null) {
		$widths = ($subdir === 'product')
			? array(100, 200, 400)
			: array(480, 768, 1024, 1280, 1600, 1920);
	}
	$ext_variants = array_unique(array_filter(array($ext, strtolower((string) $ext), strtoupper((string) $ext))));
	$parts = array();
	foreach ($widths as $w) {
		foreach ($ext_variants as $ext_try) {
			if ($ext_try === '') {
				continue;
			}
			$cand = $stem . '-' . $w . 'w.' . $ext_try;
			if (is_file($dir_fs . $cand)) {
				$parts[] = array('w' => $w, 'url' => $dir_url . rawurlencode($cand), 'file' => $dir_fs . $cand);
				break;
			}
		}
	}

	$orig_w = $out['width'] > 0 ? $out['width'] : 2400;
	$variant_count = count($parts);
	$orig_bytes = filesize($path_orig);
	$skip_huge_orig = ($subdir === 'product' && $orig_bytes > 80000)
		|| ($subdir === 'home' && $orig_bytes > 250000);
	if (!$skip_huge_orig) {
		$parts[] = array(
			'w' => $orig_w,
			'url' => $dir_url . rawurlencode($filename),
			'file' => $path_orig,
		);
	} elseif ($variant_count === 0) {
		return $out;
	}
	$out['has_variants'] = $variant_count > 0;

	$srcset_bits = array();
	foreach ($parts as $p) {
		$srcset_bits[] = $p['url'] . ' ' . (int) $p['w'] . 'w';
	}
	$out['srcset'] = implode(', ', $srcset_bits);

	$pick = $parts[0];
	$pick_target = ($subdir === 'product') ? 200 : 768;
	foreach ($parts as $p) {
		if ((int) $p['w'] >= $pick_target) {
			$pick = $p;
			break;
		}
	}
	$out['src'] = $pick['url'];

	if ($variant_count > 0) {
		foreach ($parts as $p) {
			if ((int) $p['w'] >= 960 && (int) $p['w'] <= 1280) {
				$out['preload_mid'] = $p['url'];
				break;
			}
		}
		if ($out['preload_mid'] === '') {
			foreach ($parts as $p) {
				if ((int) $p['w'] >= 768 && $p['file'] !== $path_orig) {
					$out['preload_mid'] = $p['url'];
					break;
				}
			}
		}
	}

	return $out;
}

/**
 * Add image_srcset / image_sizes / adjusted image_url when -480w variants exist (uploads folder).
 *
 * @param array $card technology card with image_url
 */
function dontia_enrich_technology_card_image(array &$card)
{
	$card['image_srcset'] = '';
	$card['image_sizes'] = '(max-width: 767px) 100vw, 50vw';
	$img_url_str = isset($card['image_url']) ? (string) $card['image_url'] : '';
	if ($img_url_str === '') {
		return;
	}
	$path_part = parse_url($img_url_str, PHP_URL_PATH);
	$bn = is_string($path_part) ? basename($path_part) : '';
	if ($bn === '') {
		return;
	}
	$subdir = 'dental_page/technology';
	if (strpos($img_url_str, '/dental_media/') !== false) {
		$subdir = 'dental_media';
	}
	$resp = dontia_responsive_upload_image($subdir, $bn, '(max-width: 767px) 100vw, 50vw');
	if ($resp['src'] !== '') {
		$card['image_url'] = $resp['src'];
	}
	if (!empty($resp['has_variants']) && $resp['srcset'] !== '') {
		$card['image_srcset'] = $resp['srcset'];
		$card['image_sizes'] = $resp['sizes'];
	}
	$CI =& get_instance();
	$CI->load->helper('dontia_performance');
	$pic = dontia_upload_picture_attrs($subdir, $bn, $card['image_sizes']);
	if ($pic['webp_srcset'] !== '') {
		$card['image_webp_srcset'] = $pic['webp_srcset'];
	}
}

/**
 * Homepage “About” image — adds LCP preload when safe.
 *
 * @param string $filename Basename only, e.g. IMG_1707.jpg
 * @return array{src:string,srcset:string,sizes:string,width:int,height:int,preload:string}
 */
function dontia_home_about_responsive_attrs($filename)
{
	$r = dontia_responsive_upload_image('home', $filename, '(max-width: 991px) 100vw, 50vw');
	$CI =& get_instance();
	$CI->load->helper('dontia_performance');
	$smaller = dontia_upload_smaller_src_override('home', $filename);
	if ($smaller !== '') {
		$orig_fs = FCPATH . 'admin/webroot/uploads/home/' . basename((string) $filename);
		if (is_file($orig_fs) && filesize($orig_fs) > 400000) {
			$r['src'] = $smaller;
			$r['has_variants'] = true;
		}
	}
	$orig_fs = FCPATH . 'admin/webroot/uploads/home/' . basename((string) $filename);
	$src = $r['src'];
	if ($src === '' && $filename !== '' && is_file($orig_fs)) {
		$src = rtrim(base_url('admin/webroot/uploads/home/'), '/') . '/' . rawurlencode(basename((string) $filename));
	}
	if ($smaller !== '') {
		$src = $smaller;
	} elseif ($src === '' && $r['srcset'] !== '') {
		$first = trim(explode(',', $r['srcset'])[0]);
		$src = trim(explode(' ', $first)[0]);
	}

	$preload = $r['preload_mid'] !== '' ? $r['preload_mid'] : $src;
	return array(
		'src' => $src,
		'srcset' => $r['srcset'],
		'sizes' => $r['sizes'],
		'width' => $r['width'],
		'height' => $r['height'],
		'preload' => $preload,
		'skip_huge' => false,
	);
}
