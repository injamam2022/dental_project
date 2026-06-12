<?php
$src = dirname(__DIR__) . '/assets/images/favicon.png';
if (!is_file($src) || !function_exists('imagecreatefrompng')) {
	fwrite(STDERR, "skip\n");
	exit(0);
}
$im = imagecreatefrompng($src);
if (!$im) {
	fwrite(STDERR, "load fail\n");
	exit(1);
}
imagesavealpha($im, true);
foreach (array(32 => 'favicon-32x32.png', 180 => 'apple-touch-icon.png') as $sz => $name) {
	$out = imagecreatetruecolor($sz, $sz);
	imagealphablending($out, false);
	imagesavealpha($out, true);
	$trans = imagecolorallocatealpha($out, 0, 0, 0, 127);
	imagefilledrectangle($out, 0, 0, $sz, $sz, $trans);
	imagecopyresampled($out, $im, 0, 0, 0, 0, $sz, $sz, imagesx($im), imagesy($im));
	imagepng($out, dirname(__DIR__) . '/assets/images/' . $name);
	imagedestroy($out);
}
imagedestroy($im);
echo "ok\n";
