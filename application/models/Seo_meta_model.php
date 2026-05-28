<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Resolves meta tags: website_setting → seo_page_meta (default + page) → controller overrides.
 */
class Seo_meta_model extends CI_Model {

	/** @var array<string, object|null> */
	protected $row_cache = array();

	public function detect_page_key()
	{
		$c = strtolower((string) $this->router->class);
		$m = strtolower((string) $this->router->method);

		if ($c === 'services') {
			if ($this->uri->segment(4) === 'detail') {
				return 'service_detail';
			}
			if (strtolower((string) $this->uri->segment(2)) === 'calibration_service') {
				return 'services_calibration';
			}
			return 'services';
		}
		if ($c === 'blog' && $m === 'blogdetails') {
			return 'blog_detail';
		}
		if ($c === 'products' && $m === 'detail') {
			return 'product_detail';
		}
		if ($c === 'dental') {
			if ($m === 'orthodontist') {
				return 'dental_orthodontist';
			}
			if ($m === 'dental_implant') {
				return 'dental_implant';
			}
			if ($m === 'tmj_specialist') {
				return 'dental_tmj';
			}
			return 'dental';
		}

		$map = array(
			'home' => 'home',
			'about' => 'about',
			'contact' => 'contact',
			'whychooseus' => 'whychooseus',
			'gallery' => 'gallery',
			'career' => 'career',
			'products' => 'products',
			'page' => 'page',
			'client' => 'client',
			'appointment' => 'appointment',
		);

		return isset($map[$c]) ? $map[$c] : 'default';
	}

	/**
	 * @param array $overrides Keys: title, meta_title, description, meta_description, keywords, meta_keyword,
	 *   og_title, og_description, og_image (absolute or relative), robots, canonical, og_type
	 * @return array Normalized SEO payload for the head section.
	 */
	public function resolve(array $overrides = array())
	{
		$this->load->helper('url');

		if ( ! $this->db->table_exists('seo_page_meta')) {
			return $this->minimal_resolve($overrides);
		}

		$w = $this->website_data();
		$key = $this->detect_page_key();
		$row_page = $this->get_row_by_key($key);
		$row_default = $this->get_row_by_key('default');

		$title = $this->coalesce(
			$overrides['meta_title'] ?? '',
			$overrides['title'] ?? '',
			$row_page ? $row_page->meta_title : '',
			$row_default ? $row_default->meta_title : '',
			isset($w->meta_title) ? (string) $w->meta_title : '',
			isset($w->company_name) ? (string) $w->company_name : ''
		);

		$description = $this->coalesce(
			$overrides['meta_description'] ?? '',
			$overrides['description'] ?? '',
			$row_page ? (string) $row_page->meta_description : '',
			$row_default ? (string) $row_default->meta_description : '',
			isset($w->meta_description) ? (string) $w->meta_description : ''
		);

		$keywords = $this->coalesce(
			$overrides['meta_keyword'] ?? '',
			$overrides['keywords'] ?? '',
			$row_page ? (string) $row_page->meta_keyword : '',
			$row_default ? (string) $row_default->meta_keyword : '',
			isset($w->meta_keyword) ? (string) $w->meta_keyword : ''
		);

		$og_title = $this->coalesce(
			$overrides['og_title'] ?? '',
			$row_page ? (string) $row_page->og_title : '',
			$row_default ? (string) $row_default->og_title : '',
			$title
		);

		$og_description = $this->coalesce(
			$overrides['og_description'] ?? '',
			$row_page ? (string) $row_page->og_description : '',
			$row_default ? (string) $row_default->og_description : '',
			$description
		);

		$og_image_raw = $this->coalesce(
			$overrides['og_image'] ?? '',
			$row_page ? (string) $row_page->og_image : '',
			$row_default ? (string) $row_default->og_image : '',
			isset($w->seo_og_image) ? (string) $w->seo_og_image : ''
		);

		$twitter_card = $this->coalesce(
			$overrides['twitter_card'] ?? '',
			$row_page ? (string) $row_page->twitter_card : '',
			$row_default ? (string) $row_default->twitter_card : '',
			'summary_large_image'
		);

		$robots = $this->coalesce(
			$overrides['robots'] ?? '',
			$row_page ? (string) $row_page->robots : '',
			$row_default ? (string) $row_default->robots : '',
			isset($w->seo_robots) ? (string) $w->seo_robots : '',
			'index,follow'
		);

		$canonical = $this->coalesce(
			$overrides['canonical'] ?? '',
			$row_page ? (string) $row_page->canonical_url : '',
			$row_default ? (string) $row_default->canonical_url : '',
			current_url()
		);

		$og_image = $this->absolute_og_image($og_image_raw, $w);

		if ($key === 'blog_detail') {
			$og_type = $this->coalesce($overrides['og_type'] ?? '', 'article');
		} else {
			$og_type = $this->coalesce($overrides['og_type'] ?? '', 'website');
		}

		$fb_app = isset($w->seo_facebook_app_id) ? trim((string) $w->seo_facebook_app_id) : '';
		$twitter_site = isset($w->seo_twitter_site) ? trim((string) $w->seo_twitter_site) : '';

		return array(
			'title' => $title,
			'description' => $description,
			'keywords' => $keywords,
			'robots' => $robots,
			'canonical' => $canonical,
			'og_title' => $og_title,
			'og_description' => $og_description,
			'og_image' => $og_image,
			'og_url' => current_url(),
			'og_type' => $og_type,
			'og_site_name' => isset($w->company_name) ? (string) $w->company_name : '',
			'twitter_card' => $twitter_card,
			'fb_app_id' => $fb_app,
			'twitter_site' => $twitter_site,
		);
	}

	protected function minimal_resolve(array $overrides)
	{
		$this->load->helper('url');
		$w = $this->website_data();
		$title = $this->coalesce(
			$overrides['meta_title'] ?? '',
			$overrides['title'] ?? '',
			isset($w->meta_title) ? (string) $w->meta_title : '',
			isset($w->company_name) ? (string) $w->company_name : ''
		);
		$description = $this->coalesce(
			$overrides['meta_description'] ?? '',
			$overrides['description'] ?? '',
			isset($w->meta_description) ? (string) $w->meta_description : ''
		);
		$keywords = $this->coalesce(
			$overrides['meta_keyword'] ?? '',
			$overrides['keywords'] ?? '',
			isset($w->meta_keyword) ? (string) $w->meta_keyword : ''
		);
		$og_image = $this->absolute_og_image($overrides['og_image'] ?? '', $w);
		return array(
			'title' => $title,
			'description' => $description,
			'keywords' => $keywords,
			'robots' => 'index,follow',
			'canonical' => current_url(),
			'og_title' => $title,
			'og_description' => $description,
			'og_image' => $og_image,
			'og_url' => current_url(),
			'og_type' => 'website',
			'og_site_name' => isset($w->company_name) ? (string) $w->company_name : '',
			'twitter_card' => 'summary_large_image',
			'fb_app_id' => '',
			'twitter_site' => '',
		);
	}

	protected function website_data()
	{
		$ci = get_instance();
		if (isset($ci->website['data']) && is_object($ci->website['data'])) {
			return $ci->website['data'];
		}
		return new stdClass();
	}

	protected function get_row_by_key($key)
	{
		if (array_key_exists($key, $this->row_cache)) {
			return $this->row_cache[$key];
		}
		$row = $this->db->get_where('seo_page_meta', array('page_key' => $key))->row();
		$this->row_cache[$key] = $row ? $row : null;
		return $this->row_cache[$key];
	}

	protected function coalesce()
	{
		foreach (func_get_args() as $v) {
			if ($v === null || $v === false) {
				continue;
			}
			$s = is_string($v) ? trim($v) : trim((string) $v);
			if ($s !== '') {
				return $s;
			}
		}
		return '';
	}

	/**
	 * @param object $w website_setting row
	 */
	protected function absolute_og_image($raw, $w)
	{
		$raw = trim((string) $raw);
		if ($raw !== '' && preg_match('#^https?://#i', $raw)) {
			return $raw;
		}
		if ($raw !== '') {
			return $this->path_to_url($raw);
		}
		$logo = isset($w->company_logo) ? trim((string) $w->company_logo) : '';
		if ($logo !== '') {
			return rtrim(base_url(), '/') . '/admin/webroot/uploads/logo/' . $logo;
		}
		return '';
	}

	protected function path_to_url($path)
	{
		$path = trim(str_replace('\\', '/', $path));
		if ($path === '') {
			return '';
		}
		if (preg_match('#^https?://#i', $path)) {
			return $path;
		}
		if ($path[0] === '/') {
			return (is_https() ? 'https' : 'http') . '://' . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '') . $path;
		}
		return rtrim(base_url(), '/') . '/' . ltrim($path, '/');
	}
}
