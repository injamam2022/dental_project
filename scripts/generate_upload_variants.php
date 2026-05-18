<?php
/**
 * Generate responsive width + WebP variants for clinic uploads.
 *
 * Usage (from project root):
 *   php scripts/generate_upload_variants.php
 *   php scripts/generate_upload_variants.php home IMG_1707.jpg
 *   php scripts/generate_upload_variants.php product
 *
 * Requires PHP GD (JPEG/PNG/WebP).
 */

$root = dirname(__DIR__);
$uploads = $root . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'webroot' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;

$presets = array(
	'home' => array(
		'dir' => 'home',
		'widths' => array(480, 768, 1024, 1280, 1600, 1920),
		'quality' => 82,
		'webp_quality' => 80,
	),
	'product' => array(
		'dir' => 'product',
		'widths' => array(100, 200, 400),
		'quality' => 85,
		'webp_quality' => 82,
	),
	'dental_media' => array(
		'dir' => 'dental_media',
		'widths' => array(400, 700, 1024, 1400),
		'quality' => 82,
		'webp_quality' => 80,
	),
	'technology' => array(
		'dir' => 'dental_page' . DIRECTORY_SEPARATOR . 'technology',
		'widths' => array(400, 700, 1024),
		'quality' => 82,
		'webp_quality' => 80,
	),
);

if (!function_exists('imagecreatefromjpeg')) {
	fwrite(STDERR, "GD is required.\n");
	exit(1);
}

function dcc_load_image($path)
{
	$ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
	if ($ext === 'jpg' || $ext === 'jpeg') {
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
	if ($ext === 'webp' && function_exists('imagecreatefromwebp')) {
		return @imagecreatefromwebp($path);
	}
	return false;
}

function dcc_save_resized($dst, $path, $ext, $quality, $webp_quality)
{
	$ext = strtolower($ext);
	if ($ext === 'jpg' || $ext === 'jpeg') {
		return imagejpeg($dst, $path, $quality);
	}
	if ($ext === 'png') {
		return imagepng($dst, $path, 6);
	}
	if ($ext === 'webp' && function_exists('imagewebp')) {
		return imagewebp($dst, $path, $webp_quality);
	}
	return false;
}

function dcc_process_file($dir, array $preset, $basename)
{
	$path = $dir . $basename;
	if (!is_file($path)) {
		fwrite(STDERR, "Skip missing: {$basename}\n");
		return;
	}
	if (preg_match('/-\d+w\.(jpe?g|png|webp)$/i', $basename)) {
		return;
	}

	$img = dcc_load_image($path);
	if (!$img) {
		fwrite(STDERR, "Could not read: {$basename}\n");
		return;
	}

	$ow = imagesx($img);
	$oh = imagesy($img);
	$pi = pathinfo($basename);
	$stem = $pi['filename'];
	$ext = isset($pi['extension']) ? $pi['extension'] : 'jpg';

	foreach ($preset['widths'] as $tw) {
		if ($tw >= $ow) {
			continue;
		}
		$th = (int) max(1, round($oh * ($tw / $ow)));
		$dst = imagecreatetruecolor($tw, $th);
		if (!$dst) {
			continue;
		}
		if (strtolower($ext) === 'png') {
			imagealphablending($dst, false);
			imagesavealpha($dst, true);
		}
		imagecopyresampled($dst, $img, 0, 0, 0, 0, $tw, $th, $ow, $oh);

		$out_raster = $dir . $stem . '-' . $tw . 'w.' . $ext;
		dcc_save_resized($dst, $out_raster, $ext, $preset['quality'], $preset['webp_quality']);
		echo "  " . basename($out_raster) . "\n";

		if (function_exists('imagewebp')) {
			$out_webp = $dir . $stem . '-' . $tw . 'w.webp';
			imagewebp($dst, $out_webp, $preset['webp_quality']);
			echo "  " . basename($out_webp) . "\n";
		}
		imagedestroy($dst);
	}

	if (function_exists('imagewebp')) {
		$full_webp = $dir . $stem . '.webp';
		if (!is_file($full_webp)) {
			imagewebp($img, $full_webp, $preset['webp_quality']);
			echo "  " . basename($full_webp) . "\n";
		}
	}

	imagedestroy($img);
	echo "Done {$basename}\n";
}

$only_preset = isset($argv[1]) ? $argv[1] : '';
$only_file = isset($argv[2]) ? basename($argv[2]) : '';

foreach ($presets as $key => $preset) {
	if ($only_preset !== '' && $only_preset !== $key) {
		continue;
	}
	$dir = $uploads . str_replace('/', DIRECTORY_SEPARATOR, $preset['dir']) . DIRECTORY_SEPARATOR;
	if (!is_dir($dir)) {
		echo "Skip {$key} (no directory)\n";
		continue;
	}
	echo "=== {$key} ===\n";
	if ($only_file !== '') {
		dcc_process_file($dir, $preset, $only_file);
		continue;
	}
	$files = glob($dir . '*.{jpg,jpeg,png,JPG,JPEG,PNG}', GLOB_BRACE);
	if (!$files) {
		echo "  (no source images)\n";
		continue;
	}
	foreach ($files as $f) {
		dcc_process_file($dir, $preset, basename($f));
	}
}

echo "All done.\n";
