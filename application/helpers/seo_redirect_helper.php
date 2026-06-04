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
			return;
		}

		if (preg_match('#^https?://#i', $target)) {
			$url = $target;
		} else {
			$url = base_url(ltrim($target, '/'));
		}

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
