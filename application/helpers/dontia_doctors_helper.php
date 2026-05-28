<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Public URL for a doctor photo (checks file exists under admin/webroot/uploads/doctors).
 *
 * @param string|null $image_name
 * @param string|null $placeholder
 * @return string
 */
function dontia_doctor_image_url($image_name, $placeholder = null)
{
	if ($placeholder === null) {
		$placeholder = base_url('assets/images/team/placeholder.svg');
	}
	$name = trim((string) $image_name);
	if ($name === '') {
		return $placeholder;
	}
	$name = basename(str_replace('\\', '/', $name));
	$fs = FCPATH . 'admin/webroot/uploads/doctors/' . $name;
	if (is_file($fs)) {
		return base_url('admin/webroot/uploads/doctors/' . $name);
	}
	return $placeholder;
}

/**
 * Admin panel thumbnail URL (same folder, admin base_url).
 *
 * @param string|null $image_name
 * @return string
 */
function dontia_doctor_admin_thumb_url($image_name)
{
	$name = trim((string) $image_name);
	if ($name === '') {
		return '';
	}
	$name = basename(str_replace('\\', '/', $name));
	return site_url('webroot/uploads/doctors/' . $name);
}

/**
 * Map doctor_management rows to home page team card shape.
 *
 * @param array $doctor_rows
 * @return array<int, array<string, mixed>>
 */
function dontia_home_team_from_doctors($doctor_rows)
{
	$out = array();
	if (!is_array($doctor_rows)) {
		return $out;
	}
	foreach ($doctor_rows as $row) {
		if (!is_object($row) || empty($row->doctor_name)) {
			continue;
		}
		$out[] = array(
			'name' => (string) $row->doctor_name,
			'role' => isset($row->designation) ? (string) $row->designation : '',
			'photo_url' => dontia_doctor_image_url(isset($row->image_name) ? $row->image_name : ''),
			'social' => array(
				'facebook' => '',
				'twitter' => '',
				'youtube' => '',
				'linkedin' => '',
			),
		);
	}
	return $out;
}

/**
 * Dental landing: build carousel list — DB doctors only when any exist; else template fallbacks.
 *
 * @param array $db_doctors Active rows from doctor_management
 * @param array $fallback Associative rows with name, role, image keys
 * @return array<int, array{source: string, db?: object, fb?: array}>
 */
function dontia_build_doctor_display_list($db_doctors, $fallback = array())
{
	$list = array();
	if (is_array($db_doctors) && count($db_doctors) > 0) {
		$seen = array();
		foreach ($db_doctors as $row) {
			if (!is_object($row) || !isset($row->doctor_name)) {
				continue;
			}
			$key = strtolower(trim((string) $row->doctor_name));
			if ($key === '' || isset($seen[$key])) {
				continue;
			}
			$seen[$key] = true;
			$list[] = array('source' => 'db', 'db' => $row);
		}
		return $list;
	}

	$seen = array();
	if (!is_array($fallback)) {
		return $list;
	}
	foreach ($fallback as $fb) {
		if (!is_array($fb) || empty($fb['name'])) {
			continue;
		}
		$key = strtolower(trim((string) $fb['name']));
		if ($key === '' || isset($seen[$key])) {
			continue;
		}
		$seen[$key] = true;
		$list[] = array('source' => 'fallback', 'fb' => $fb);
	}
	return $list;
}
