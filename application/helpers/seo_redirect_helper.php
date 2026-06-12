<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('seo_redirect_normalize_path')) {
	/**
	 * Normalize a URL path for redirect matching (no domain, no query, lowercase, no leading/trailing slashes).
	 */
	function seo_redirect_normalize_path($path)
	{
		$path = (string) $path;
		if ($path !== '' && preg_match('#^https?://#i', $path)) {
			$parsed = parse_url($path);
			$path = isset($parsed['path']) ? $parsed['path'] : '';
		}
		$path = strtolower(trim($path, '/'));
		return $path;
	}
}

if ( ! function_exists('seo_redirect_is_home_target')) {
	function seo_redirect_is_home_target($path)
	{
		$t = trim((string) $path);
		return $t === '' || $t === '/';
	}
}

if ( ! function_exists('seo_redirect_normalize_target')) {
	/** Store target for DB: "/" = homepage; other paths normalized; full URLs unchanged. */
	function seo_redirect_normalize_target($path)
	{
		$path = trim((string) $path);
		if (seo_redirect_is_home_target($path)) {
			return '/';
		}
		if (preg_match('#^https?://#i', $path)) {
			return $path;
		}
		return seo_redirect_normalize_path($path);
	}
}

if ( ! function_exists('seo_redirect_resolve_url')) {
	function seo_redirect_resolve_url($target)
	{
		$target = trim((string) $target);
		if (seo_redirect_is_home_target($target)) {
			return base_url();
		}
		if (preg_match('#^https?://#i', $target)) {
			return $target;
		}
		return base_url(ltrim($target, '/'));
	}
}

if ( ! function_exists('seo_redirect_apply_if_match')) {
	/**
	 * If current request matches an active admin redirect, send HTTP redirect and exit.
	 */
	function seo_redirect_apply_if_match()
	{
		$CI =& get_instance();
		if ( ! is_object($CI) || ! isset($CI->uri)) {
			return;
		}
		$CI->load->model('Seo_redirect_model');
		$CI->Seo_redirect_model->ensure_table();

		$request_path = seo_redirect_normalize_path($CI->uri->uri_string());
		$row = $CI->Seo_redirect_model->find_active_for_path($request_path);
		if ( ! $row) {
			return;
		}

		$code = (int) $row->http_code;
		if ($code < 300 || $code > 399) {
			$code = 301;
		}

		if ($code === 410) {
			$CI->output->set_status_header(410);
			$CI->output->set_output('410 Gone');
			$CI->output->_display();
			exit;
		}

		$target = trim((string) $row->target_url);
		if ($target === '') {
			// Older saves turned "/" into empty — treat as homepage when source is set.
			if (trim((string) $row->source_url) === '') {
				return;
			}
			$target = '/';
		}

		$url = seo_redirect_resolve_url($target);

		$qs = isset($_SERVER['QUERY_STRING']) ? trim((string) $_SERVER['QUERY_STRING']) : '';
		if ($qs !== '') {
			$url .= (strpos($url, '?') !== false ? '&' : '?') . $qs;
		}

		$CI->output->set_status_header($code);
		$CI->output->set_header('Location: ' . $url, true);
		$CI->output->_display();
		exit;
	}
}
