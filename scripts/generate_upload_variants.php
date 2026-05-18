<?php
/**
 * Generate responsive JPEG + WebP variants for uploads (home, product, dental_media).
 *
 * Usage (project root):
 *   php scripts/generate_upload_variants.php
 *   php scripts/generate_upload_variants.php product svc-kids-dentistry.png
 *   php scripts/generate_upload_variants.php home IMG_1707.jpg
 */

$root = dirname(__DIR__);
$targets_by_dir = array(
	'home' => array(480, 768, 1024, 1280, 1600, 1920),
	'product' => array(224, 336, 480),
	'dental_media' => array(480, 768, 1024, 1400),
	'dental_page/technology' => array(480, 768, 1024, 1400),
);

$single_dir = null;
$single_file = null;
if (isset($argv[1], $argv[2]) && $argv[2] !== '') {
	$single_dir = $argv[1];
	$single_file = basename($argv[2]);
}

if (!function_exists('imagecreatefromjpeg')) {
	fwrite(STDERR, "GD is required.\n");
	exit(1);
}

function dontia_gd_load($path)
{
	$ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
	if (in_array($ext, array('jpg', 'jpeg'), true)) {
		return @imagecreatefromjpeg($path);
	}
	if ($ext === 'png') {
		$im = @imagecreatefrompng($path);
		if ($im) {
			imagealphablending($im, true);
			imagesavealpha($im, true);
		}
		return $im;
	}
	return false;
}

function dontia_write_variant($dst_im, $out_path, $ext_l)
{
	if ($ext_l === 'webp' && function_exists('imagewebp')) {
		return imagewebp($dst_im, $out_path, 82);
	}
	if (in_array($ext_l, array('jpg', 'jpeg'), true)) {
		return imagejpeg($dst_im, $out_path, 82);
	}
	if ($ext_l === 'png') {
		return imagepng($dst_im, $out_path, 8);
	}
	return false;
}

function dontia_process_file($dir_fs, $basename, array $widths)
{
	$src_path = $dir_fs . $basename;
	if (!is_file($src_path)) {
		fwrite(STDERR, "Missing: {$src_path}\n");
		return;
	}
	$img = dontia_gd_load($src_path);
	if (!$img) {
		fwrite(STDERR, "Could not read: {$src_path}\n");
		return;
	}
	$ow = imagesx($img);
	$oh = imagesy($img);
	$pi = pathinfo($basename);
	$stem = $pi['filename'];
	$ext = isset($pi['extension']) ? $pi['extension'] : 'jpg';
	$ext_l = strtolower($ext);

	foreach ($widths as $tw) {
		if ($tw >= $ow) {
			continue;
		}
		$th = (int) max(1, round($oh * ($tw / $ow)));
		$dst = imagecreatetruecolor($tw, $th);
		if (!$dst) {
			continue;
		}
		if ($ext_l === 'png') {
			imagealphablending($dst, false);
			imagesavealpha($dst, true);
			$trans = imagecolorallocatealpha($dst, 0, 0, 0, 127);
			imagefilledrectangle($dst, 0, 0, $tw, $th, $trans);
		}
		imagecopyresampled($dst, $img, 0, 0, 0, 0, $tw, $th, $ow, $oh);
		$out = $dir_fs . $stem . '-' . $tw . 'w.' . $ext;
		dontia_write_variant($dst, $out, $ext_l);
		echo "  " . basename($out) . "\n";
		if (function_exists('imagewebp')) {
			$out_w = $dir_fs . $stem . '-' . $tw . 'w.webp';
			imagewebp($dst, $out_w, 82);
			echo "  " . basename($out_w) . "\n";
		}
		imagedestroy($dst);
	}

	if (function_exists('imagewebp') && $ow > 480) {
		$tw = min(480, $ow);
		$th = (int) max(1, round($oh * ($tw / $ow)));
		$dst = imagecreatetruecolor($tw, $th);
		imagecopyresampled($dst, $img, 0, 0, 0, 0, $tw, $th, $ow, $oh);
		$out_w = $dir_fs . $stem . '.webp';
		imagewebp($dst, $out_w, 82);
		echo "  " . basename($out_w) . "\n";
		imagedestroy($dst);
	}

	imagedestroy($img);
	echo "Done {$basename}\n";
}

foreach ($targets_by_dir as $rel => $widths) {
	if ($single_dir !== null && $single_dir !== $rel) {
		continue;
	}
	$dir_fs = $root . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'webroot'
		. DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $rel)
		. DIRECTORY_SEPARATOR;
	if (!is_dir($dir_fs)) {
		continue;
	}
	$files = $single_file !== null ? array($single_file) : scandir($dir_fs);
	foreach ($files as $f) {
		if ($f === '.' || $f === '..' || is_dir($dir_fs . $f)) {
			continue;
		}
		if ($single_file !== null && $f !== $single_file) {
			continue;
		}
		if (!preg_match('/\.(jpe?g|png)$/i', $f)) {
			continue;
		}
		if (preg_match('/-\d+w\.(jpe?g|png|webp)$/i', $f)) {
			continue;
		}
		echo "{$rel}/{$f}\n";
		dontia_process_file($dir_fs, $f, $widths);
	}
}

echo "All done.\n";
