<?php
/**
 * Generate width-limited JPEGs for the homepage About image (uploads/home).
 *
 * Usage (from project root):
 *   php scripts/generate_home_about_variants.php IMG_1707.jpg
 *
 * Creates alongside the original:
 *   IMG_1707-480w.jpg, IMG_1707-768w.jpg, … up to 1920w (skips if wider than original).
 * Requires GD with JPEG support.
 */

$root = dirname(__DIR__);
$homeDir = $root . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'webroot' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'home' . DIRECTORY_SEPARATOR;

$basename = isset($argv[1]) ? basename($argv[1]) : '';
if ($basename === '' || !is_file($homeDir . $basename)) {
	fwrite(STDERR, "Usage: php scripts/generate_home_about_variants.php <filename-in-uploads-home>\n");
	fwrite(STDERR, "Example: php scripts/generate_home_about_variants.php IMG_1707.jpg\n");
	exit(1);
}

if (!function_exists('imagecreatefromjpeg') || !function_exists('imagejpeg')) {
	fwrite(STDERR, "GD JPEG support is not available in this PHP build.\n");
	exit(1);
}

$srcPath = $homeDir . $basename;
$ext = pathinfo($basename, PATHINFO_EXTENSION);
$ext_l = strtolower((string) $ext);
if (!in_array($ext_l, array('jpg', 'jpeg'), true)) {
	fwrite(STDERR, "Only .jpg / .jpeg sources are supported. Convert the about image to JPEG first.\n");
	exit(1);
}

$img = @imagecreatefromjpeg($srcPath);
if (!$img) {
	fwrite(STDERR, "Could not read JPEG: {$srcPath}\n");
	exit(1);
}

$ow = imagesx($img);
$oh = imagesy($img);
$stem = pathinfo($basename, PATHINFO_FILENAME);
$targets = array(480, 768, 1024, 1280, 1600, 1920);
$quality = 82;

foreach ($targets as $tw) {
	if ($tw >= $ow) {
		continue;
	}
	$th = (int) max(1, round($oh * ($tw / $ow)));
	$dst = imagecreatetruecolor($tw, $th);
	if (!$dst) {
		continue;
	}
	imagecopyresampled($dst, $img, 0, 0, 0, 0, $tw, $th, $ow, $oh);
	$out = $homeDir . $stem . '-' . $tw . 'w.' . $ext;
	imagejpeg($dst, $out, $quality);
	imagedestroy($dst);
	echo "Wrote " . basename($out) . "\n";
}

imagedestroy($img);
echo "Done. Re-upload or commit the new files to production as needed.\n";
