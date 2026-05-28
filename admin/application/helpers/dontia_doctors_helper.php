<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin thumbnail URL for doctor uploads.
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
