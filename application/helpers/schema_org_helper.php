<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Sitewide / local listing JSON-LD for Dentist (Schema.org), driven by website_setting.
 *
 * @param object      $w         Row from website_setting.
 * @param string      $page_url  Absolute canonical URL for the page (e.g. TMJ specialist).
 * @return array|null           Graph object or null if URL/name cannot be resolved.
 */
function schema_dentist_local_graph($w, $page_url)
{
	if (! is_object($w)) {
		return null;
	}
	$url = trim((string) $page_url);
	if ($url === '') {
		return null;
	}

	$name = '';
	if (isset($w->schema_business_name) && trim((string) $w->schema_business_name) !== '') {
		$name = trim((string) $w->schema_business_name);
	} elseif (isset($w->company_name) && trim((string) $w->company_name) !== '') {
		$name = trim((string) $w->company_name) . ' - Dental';
	}
	if ($name === '') {
		return null;
	}

	$street = '';
	if (isset($w->schema_street_address) && trim((string) $w->schema_street_address) !== '') {
		$street = trim((string) $w->schema_street_address);
	} elseif (isset($w->address)) {
		$raw = str_replace(array("\r\n", "\r"), "\n", (string) $w->address);
		$raw = trim(preg_replace('/\s+/', ' ', strip_tags($raw)));
		if ($raw !== '') {
			$lines = preg_split('/\n+/', $raw);
			$street = isset($lines[0]) ? trim((string) $lines[0]) : '';
		}
	}

	$locality = isset($w->schema_address_locality) && trim((string) $w->schema_address_locality) !== ''
		? trim((string) $w->schema_address_locality)
		: 'Kolkata';
	$postal = isset($w->schema_postal_code) && trim((string) $w->schema_postal_code) !== ''
		? trim((string) $w->schema_postal_code)
		: (isset($w->pincode) ? trim((string) $w->pincode) : '');
	if ($postal === '') {
		$postal = '700020';
	}
	$country = isset($w->schema_address_country) && trim((string) $w->schema_address_country) !== ''
		? trim((string) $w->schema_address_country)
		: 'IN';

	$phone = '';
	if (isset($w->support_contact)) {
		$phone = preg_replace('/\D+/', '', (string) $w->support_contact);
	}

	$price = isset($w->schema_price_range) && trim((string) $w->schema_price_range) !== ''
		? trim((string) $w->schema_price_range)
		: '$$';

	$image_raw = '';
	if (isset($w->schema_clinic_image) && trim((string) $w->schema_clinic_image) !== '') {
		$image_raw = trim((string) $w->schema_clinic_image);
	} elseif (isset($w->seo_og_image) && trim((string) $w->seo_og_image) !== '') {
		$image_raw = trim((string) $w->seo_og_image);
	}
	$image = schema_org_resolve_absolute_url($image_raw);

	$opens = isset($w->schema_opens) && trim((string) $w->schema_opens) !== ''
		? trim((string) $w->schema_opens)
		: '10:00';
	$closes = isset($w->schema_closes) && trim((string) $w->schema_closes) !== ''
		? trim((string) $w->schema_closes)
		: '20:00';
	if (! preg_match('/^\d{1,2}:\d{2}$/', $opens)) {
		$opens = '10:00';
	}
	if (! preg_match('/^\d{1,2}:\d{2}$/', $closes)) {
		$closes = '20:00';
	}

	$days_raw = isset($w->schema_opening_days) ? trim((string) $w->schema_opening_days) : '';
	if ($days_raw === '') {
		$days_raw = 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday';
	}
	$day_parts = array_map('trim', explode(',', $days_raw));
	$days = array_values(array_filter($day_parts, static function ($d) {
		return $d !== '';
	}));
	if (count($days) === 0) {
		$days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
	}

	$graph = array(
		'@context' => 'https://schema.org',
		'@type' => 'Dentist',
		'name' => $name,
		'@id' => $url,
		'url' => $url,
		'priceRange' => $price,
		'openingHoursSpecification' => array(
			'@type' => 'OpeningHoursSpecification',
			'dayOfWeek' => $days,
			'opens' => $opens,
			'closes' => $closes,
		),
	);

	if ($image !== '') {
		$graph['image'] = $image;
	}
	if ($phone !== '') {
		$graph['telephone'] = $phone;
	}

	$graph['address'] = array(
		'@type' => 'PostalAddress',
		'streetAddress' => $street,
		'addressLocality' => $locality,
		'postalCode' => $postal,
		'addressCountry' => $country,
	);

	$lat_s = isset($w->schema_latitude) ? trim((string) $w->schema_latitude) : '';
	$lng_s = isset($w->schema_longitude) ? trim((string) $w->schema_longitude) : '';
	if ($lat_s !== '' && $lng_s !== '' && is_numeric($lat_s) && is_numeric($lng_s)) {
		$graph['geo'] = array(
			'@type' => 'GeoCoordinates',
			'latitude' => (float) $lat_s,
			'longitude' => (float) $lng_s,
		);
	}

	return $graph;
}

/**
 * Turn a stored path or absolute URL into an absolute URL for JSON-LD.
 *
 * @param string $path_or_url Relative path (e.g. admin/webroot/...) or http(s) URL.
 * @return string
 */
function schema_org_resolve_absolute_url($path_or_url)
{
	$s = trim((string) $path_or_url);
	if ($s === '') {
		return '';
	}
	if (preg_match('#^https?://#i', $s)) {
		return $s;
	}
	$ci = &get_instance();
	if (! is_object($ci) || ! isset($ci->config)) {
		return $s;
	}
	$base = rtrim((string) $ci->config->item('base_url'), '/');
	if ($base === '') {
		return $s;
	}
	return $base . '/' . ltrim(str_replace('\\', '/', $s), '/');
}
