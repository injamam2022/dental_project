<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 404 handler — runs admin SEO redirects for unknown URLs, then Page Builder pages, then shows 404.
 * MY_Controller::__construct already calls seo_redirect_apply_if_match().
 */
class Seo_redirect extends Frontend_Controller {

	public function missing()
	{
		if ($this->pb_render_builder_page($this->uri->uri_string())) {
			return;
		}
		show_404();
	}
}
