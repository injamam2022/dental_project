<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('seo_redirect_normalize_path')) {
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

if ( ! function_exists('seo_redirect_http_code_options')) {
	function seo_redirect_http_code_options()
	{
		return array(
			301 => '301 — Permanent (recommended for SEO)',
			302 => '302 — Temporary',
			307 => '307 — Temporary (preserve method)',
			410 => '410 — Gone (no target URL)',
		);
	}
}
