<?php
/**
 * Apply database/seo_dental_pages_migration.sql
 * Run: php scripts/apply_seo_dental_migration.php
 */
$root = dirname(__DIR__);
$sql_path = $root . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'seo_dental_pages_migration.sql';
if (!is_readable($sql_path)) {
	fwrite(STDERR, "Missing {$sql_path}\n");
	exit(1);
}

$db = array(
	'hostname' => getenv('DB_HOST') ?: 'localhost',
	'username' => getenv('DB_USER') ?: 'root',
	'password' => getenv('DB_PASS') ?: '',
	'database' => getenv('DB_NAME') ?: 'dental_project',
);

$mysqli = @new mysqli($db['hostname'], $db['username'], $db['password'], $db['database']);
if ($mysqli->connect_error) {
	fwrite(STDERR, "DB connect failed: {$mysqli->connect_error}\n");
	exit(1);
}
$mysqli->set_charset('utf8mb4');

$sql = file_get_contents($sql_path);
$sql = preg_replace('/--[^\n]*\n/', "\n", $sql);
$parts = array_filter(array_map('trim', explode(';', $sql)));
$ok = 0;
foreach ($parts as $stmt) {
	if ($stmt === '') {
		continue;
	}
	if ($mysqli->query($stmt)) {
		$ok++;
		echo "OK: " . substr(str_replace("\n", ' ', $stmt), 0, 100) . "...\n";
	} else {
		fwrite(STDERR, "Error: {$mysqli->error}\n  Statement: " . substr($stmt, 0, 120) . "...\n");
	}
}
echo "\nExecuted {$ok} statement(s).\n";
$mysqli->close();
