<?php
/**
 * One-off: extract inline SVG icons from dontiacareclinic.com homepage HTML (Skin Care tab)
 * and write files + SQL for product_master.pro_image.
 *
 * Usage (from project root):
 *   C:\xampp\php\php.exe scripts\extract_skin_service_svgs.php
 */

$root = dirname(__DIR__);
$htmlPath = $root . DIRECTORY_SEPARATOR . 'tmp_dontia_home.html';
$outDir = $root . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'webroot' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'product';

if (!is_readable($htmlPath)) {
	fwrite(STDERR, "Missing {$htmlPath} — run curl first to save homepage HTML.\n");
	exit(1);
}

$html = file_get_contents($htmlPath);
$start = strpos($html, 'id="wpr-tab-content-2652"');
if ($start === false) {
	fwrite(STDERR, "Skin tab block id wpr-tab-content-2652 not found.\n");
	exit(1);
}
$end = strpos($html, '<h2 class="elementor-heading-title elementor-size-default">Latest Technology</h2>', $start);
if ($end === false) {
	fwrite(STDERR, "Latest Technology marker not found after skin tab.\n");
	exit(1);
}
$chunk = substr($html, $start, $end - $start);

$pattern = '~
	<div\s+class="elementor-element[^"]*elementor-widget-icon-box[^"]*"[^>]*>
	[\s\S]*?
	<div\s+class="elementor-icon-box-icon">\s*
	(?:<span[^>]*>\s*)?
	(<svg\b[\s\S]*?</svg>)
	[\s\S]*?
	<h3\s+class="elementor-icon-box-title">\s*
	<span[^>]*>\s*
	([^<]+?)
	\s*</span>
~ix';

if (!preg_match_all($pattern, $chunk, $matches, PREG_SET_ORDER)) {
	fwrite(STDERR, "No icon-box + SVG + title matches in skin chunk.\n");
	exit(1);
}

if (!is_dir($outDir)) {
	mkdir($outDir, 0755, true);
}

$sql = [];
$sql[] = "-- Skin service icons imported from https://dontiacareclinic.com/ (Elementor inline SVGs)";
$sql[] = 'SET NAMES utf8mb4;';

foreach ($matches as $m) {
	$svg = trim($m[1]);
	$title = html_entity_decode(trim($m[2]), ENT_QUOTES | ENT_HTML5, 'UTF-8');
	$title = preg_replace('/\s+/u', ' ', $title);
	$slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $title));
	$slug = trim($slug, '-');
	$fname = 'skin-live-' . $slug . '.svg';
	$path = $outDir . DIRECTORY_SEPARATOR . $fname;

	if (file_put_contents($path, $svg . "\n") === false) {
		fwrite(STDERR, "Failed to write {$path}\n");
		exit(1);
	}

	$nameEsc = str_replace("'", "''", $title);
	$sql[] = "UPDATE product_master SET pro_image = '{$fname}' WHERE status = 'active' AND LOWER(TRIM(product_name)) = LOWER(TRIM('{$nameEsc}'));";

	echo "Wrote {$fname} ({$title})\n";
}

$sqlFile = $root . DIRECTORY_SEPARATOR . 'scripts' . DIRECTORY_SEPARATOR . 'skin_service_icons_updates.sql';
file_put_contents($sqlFile, implode("\n", $sql) . "\n");
echo "\nSQL written to: {$sqlFile}\n";
