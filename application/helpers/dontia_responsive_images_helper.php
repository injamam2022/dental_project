<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Homepage “About” image (admin/webroot/uploads/home).
 *
 * Picks up optional width derivatives: {stem}-480w.{ext}, {stem}-768w.{ext}, …
 * If none exist, returns the original only (run scripts/generate_home_about_variants.php).
 *
 * @param string $filename Basename only, e.g. IMG_1707.jpg
 * @return array{src:string,srcset:string,sizes:string,width:int,height:int,preload:string}
 */
function dontia_home_about_responsive_attrs($filename)
{
	$filename = basename((string) $filename);
	$dir_rel = 'admin/webroot/uploads/home/';
	$dir_fs = FCPATH . $dir_rel;
	$dir_url = rtrim(base_url($dir_rel), '/') . '/';

	$out = array(
		'src' => '',
		'srcset' => '',
		'sizes' => '(max-width: 991px) 100vw, 50vw',
		'width' => 0,
		'height' => 0,
		'preload' => '',
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

	$widths = array(480, 768, 1024, 1280, 1600, 1920);
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
	$parts[] = array(
		'w' => $orig_w,
		'url' => $dir_url . rawurlencode($filename),
		'file' => $path_orig,
	);

	$srcset_bits = array();
	foreach ($parts as $p) {
		$srcset_bits[] = $p['url'] . ' ' . (int) $p['w'] . 'w';
	}
	$out['srcset'] = implode(', ', $srcset_bits);

	$pick = $parts[0];
	foreach ($parts as $p) {
		if ((int) $p['w'] >= 768) {
			$pick = $p;
			break;
		}
	}
	$out['src'] = $pick['url'];

	$variant_count = count($parts) - 1;
	if ($variant_count > 0) {
		foreach ($parts as $p) {
			if ((int) $p['w'] >= 960 && (int) $p['w'] <= 1280) {
				$out['preload'] = $p['url'];
				break;
			}
		}
		if ($out['preload'] === '') {
			foreach ($parts as $p) {
				if ((int) $p['w'] >= 768 && $p['file'] !== $path_orig) {
					$out['preload'] = $p['url'];
					break;
				}
			}
		}
	}
	if ($out['preload'] === '' && $variant_count === 0) {
		$sz = @filesize($path_orig);
		if (is_int($sz) && $sz < 600 * 1024) {
			$out['preload'] = $dir_url . rawurlencode($filename);
		}
	}

	return $out;
}
