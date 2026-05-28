<?php
/**
 * One-time seed: import the six template doctors from dental_page.php into doctor_management.
 * Run: php scripts/seed_doctor_management.php
 */
$root = dirname(__DIR__);
define('BASEPATH', '1');
define('FCPATH', $root . DIRECTORY_SEPARATOR);

require $root . '/application/helpers/dontia_doctors_helper.php';

$defaults_dir = FCPATH . 'admin' . DIRECTORY_SEPARATOR . 'webroot' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'dental_page' . DIRECTORY_SEPARATOR . 'defaults' . DIRECTORY_SEPARATOR;
$doctors_dir = FCPATH . 'admin' . DIRECTORY_SEPARATOR . 'webroot' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'doctors' . DIRECTORY_SEPARATOR;

if (!is_dir($doctors_dir)) {
	mkdir($doctors_dir, 0755, true);
}

$template_doctors = array(
	array('doctor_name' => 'Dr. Prabhjeet Sethi', 'designation' => 'Implantologist & TMJ Specialist', 'image' => 'dr-prabhjeet-sethi.png', 'sort_order' => 1),
	array('doctor_name' => 'Dr. Harleen Sandhu', 'designation' => 'Cosmetic Dentist', 'image' => 'dr-harleen-sandhu.png', 'sort_order' => 2),
	array('doctor_name' => 'Dr. Aishi Sinha', 'designation' => 'Endodontist', 'image' => 'Aishi_Sinha.png', 'sort_order' => 3),
	array('doctor_name' => 'Dr. Saibal Sen', 'designation' => 'Dental Surgeon', 'image' => 'dr-saibal-sen-purnam-medicare-polyclinic--lala-lajpat-rai-sarani-kolkata-dentists-yjki7.jpg', 'sort_order' => 4),
	array('doctor_name' => 'Dr. Prasoon Killa', 'designation' => 'Orthodontist', 'image' => 'Prasoon_Killa.png', 'sort_order' => 5),
	array('doctor_name' => 'Dr. Navneet', 'designation' => 'Periodontist', 'image' => 'Navneet_.png', 'sort_order' => 6),
);

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

$create = "CREATE TABLE IF NOT EXISTS `doctor_management` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`doctor_name` varchar(255) NOT NULL,
	`designation` varchar(255) NOT NULL,
	`image_name` varchar(255) DEFAULT NULL,
	`sort_order` int(11) NOT NULL DEFAULT 0,
	`status` enum('active','inactivate') NOT NULL DEFAULT 'active',
	`created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
	`updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$mysqli->query($create);

$inserted = 0;
$updated = 0;
$skipped = 0;

foreach ($template_doctors as $doc) {
	$src = $defaults_dir . $doc['image'];
	$dest_name = basename($doc['image']);
	$dest = $doctors_dir . $dest_name;

	if (!is_file($src)) {
		fwrite(STDERR, "Missing source image: {$src}\n");
		continue;
	}
	if (!is_file($dest)) {
		if (!copy($src, $dest)) {
			fwrite(STDERR, "Failed to copy: {$src}\n");
			continue;
		}
	}

	$name_esc = $mysqli->real_escape_string($doc['doctor_name']);
	$check = $mysqli->query("SELECT id, sort_order, designation, image_name, status FROM doctor_management WHERE doctor_name = '{$name_esc}' LIMIT 1");
	if ($check && $check->num_rows > 0) {
		$row = $check->fetch_assoc();
		$des_esc = $mysqli->real_escape_string($doc['designation']);
		$img_esc = $mysqli->real_escape_string($dest_name);
		$sort = (int) $doc['sort_order'];
		$sql = "UPDATE doctor_management SET designation = '{$des_esc}', image_name = '{$img_esc}', sort_order = {$sort}, status = 'active' WHERE id = " . (int) $row['id'];
		$mysqli->query($sql);
		$updated++;
		echo "Updated: {$doc['doctor_name']}\n";
		continue;
	}

	$des_esc = $mysqli->real_escape_string($doc['designation']);
	$img_esc = $mysqli->real_escape_string($dest_name);
	$sort = (int) $doc['sort_order'];
	$sql = "INSERT INTO doctor_management (doctor_name, designation, image_name, sort_order, status) VALUES ('{$name_esc}', '{$des_esc}', '{$img_esc}', {$sort}, 'active')";
	if ($mysqli->query($sql)) {
		$inserted++;
		echo "Inserted: {$doc['doctor_name']}\n";
	} else {
		fwrite(STDERR, "Insert failed for {$doc['doctor_name']}: {$mysqli->error}\n");
	}
}

echo "\nDone. Inserted: {$inserted}, updated: {$updated}, skipped: {$skipped}\n";
$mysqli->close();
