<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Frontend_Controller {

  function __construct(){
		parent::__construct();
		$this->load->model('Home_Model');
		$this->load->model('Dental/Dental_Model', 'dentalModel');
		$this->dentalModel->ensure_table();
	}  
    
    
    
	public function index()
	{
		$this->seo_overrides = array(
			'title' => 'Multispeciality clinic in Kolkata, WB | Dental | Skin & Hair | ENT',
			'description' => 'Experience world-class Dental, ENT, and Aesthetic Skin & Hair care at Dontia Care Clinic, Kolkata. Book your appointment for expert health solutions.',
		);
		$this->load->helper(array('dontia_responsive_images', 'dontia_performance'));
        $content['Services']=$this->Home_Model->GetProduct();
        $content['banner_details']=$this->Home_Model->GetBanner();
        $content['partner_details']=$this->Home_Model->GetPartner();
        $content['tes_details']=$this->Home_Model->GetTestimonial();
        $content['home_page_con']=$this->Home_Model->get_all_content();
        $content['blog_details_desc']=$this->Home_Model->GetBlogDesc();
		$content['technology_settings'] = $this->Home_Model->get_technology_settings();
		$content['technology_cards'] = $this->build_dental_technology_cards();
		$tv = $this->dentalModel->get_active_testimonial_videos();
		$content['testimonial_videos'] = is_array($tv) ? $tv : array();

		$content['home_about_image'] = array(
			'src' => '',
			'srcset' => '',
			'sizes' => '(max-width: 991px) 100vw, 50vw',
			'width' => 0,
			'height' => 0,
			'preload' => '',
		);
		if (!empty($content['home_page_con']) && is_array($content['home_page_con']) && !empty($content['home_page_con'][0])) {
			$hp0 = @unserialize($content['home_page_con'][0]->banner_description);
			if (is_array($hp0) && !empty($hp0[0][1])) {
				$content['home_about_image'] = dontia_home_about_responsive_attrs($hp0[0][1]);
			}
		}
		$content['home_hero_poster'] = dontia_home_hero_poster('PqdEzU6_2zg');
		if (!empty($content['home_hero_poster']['preload'])) {
			$this->seo_overrides['lcp_preload_images'] = array($content['home_hero_poster']['preload']);
		}
		if (empty($content['home_hero_poster']['local'])) {
			$this->seo_overrides['dns_prefetch_yt'] = true;
		}

		$content['subview']="home_page";
//        echo "<pre>";print_r($content);die;
		$this->load->view('layout/default', $content);
	}

	private function build_dental_technology_cards()
	{
		$tech_defaults = array(
			array(
				'id' => 1,
				'slug' => 'intraoral',
				'title' => 'Intraoral Scanner',
				'description' => 'Digital impressions without messy moulds—faster visits, better fit for crowns and aligners, and a gentler experience.',
				'image' => 'hf_20260408_141453_072419cd-d779-4092-9401-4e7427a126ad.png',
			),
			array(
				'id' => 2,
				'slug' => 'cerec',
				'title' => 'CEREC',
				'description' => 'Same-day ceramic crowns and inlays: we scan, design, and mill your restoration in one visit when suitable.',
				'image' => 'Cerec.png',
			),
			array(
				'id' => 3,
				'slug' => 'laser',
				'title' => 'Dental Laser',
				'description' => 'Precise soft-tissue work with less bleeding and often quicker healing—used where it benefits your treatment.',
				'image' => 'Dental-Laser.jpg',
			),
			array(
				'id' => 4,
				'slug' => 'baldus',
				'title' => 'Baldus Sedation',
				'description' => 'Safe nitrous oxide (laughing gas) to ease anxiety and make longer appointments more comfortable.',
				'image' => 'Baldus.jpg',
			),
		);
		$media_tech = $this->dentalModel->get_media_by_section('technology');
		$media_tech = is_array($media_tech) ? $media_tech : array();
		$used_media_ids = array();
		$tech_match = function ($slug, $title_like) {
			$title_l = strtolower(trim((string) $title_like));
			if ($slug === 'intraoral') return (strpos($title_l, 'intraoral') !== false || strpos($title_l, 'intra oral') !== false);
			if ($slug === 'cerec') return strpos($title_l, 'cerec') !== false;
			if ($slug === 'laser') return strpos($title_l, 'laser') !== false;
			if ($slug === 'baldus') return strpos($title_l, 'baldus') !== false;
			return false;
		};

		$out = array();
		foreach ($tech_defaults as $def) {
			$card = array(
				'id' => (int) $def['id'],
				'title' => $def['title'],
				'description' => $def['description'],
				'image_url' => base_url('admin/webroot/uploads/dental_page/technology/' . $def['image']),
			);
			foreach ($media_tech as $m) {
				if (!isset($m->id) || in_array((int) $m->id, $used_media_ids, true)) continue;
				$item_key_l = strtolower(trim((string) (isset($m->item_key) ? $m->item_key : '')));
				$title_l = strtolower(trim((string) (isset($m->title) ? $m->title : '')));
				$is_match = ($item_key_l !== '' && $item_key_l === $def['slug']) || ($item_key_l === '' && $tech_match($def['slug'], $title_l));
				if (!$is_match) continue;
				$used_media_ids[] = (int) $m->id;
				$m_title = trim((string) (isset($m->title) ? $m->title : ''));
				$m_desc = trim(preg_replace('/\s+/', ' ', strip_tags((string) (isset($m->description) ? $m->description : ''))));
				if ($m_title !== '') $card['title'] = $m_title;
				if ($m_desc !== '') $card['description'] = $m_desc;
				$m_img = isset($m->image_name) ? basename((string) $m->image_name) : '';
				if ($m_img !== '') {
					$media_path = FCPATH . 'admin/webroot/uploads/dental_media/' . $m_img;
					if (is_file($media_path)) {
						$card['image_url'] = base_url('admin/webroot/uploads/dental_media/' . $m_img);
					}
				}
				break;
			}
			dontia_enrich_technology_card_image($card);
			$card['img_width'] = 0;
			$card['img_height'] = 0;
			$img_url_str = isset($card['image_url']) ? (string) $card['image_url'] : '';
			if ($img_url_str !== '') {
				$fs = $this->local_upload_path_from_url($img_url_str);
				if ($fs !== '' && is_file($fs)) {
					$dim = @getimagesize($fs);
					if (is_array($dim)) {
						$card['img_width'] = (int) $dim[0];
						$card['img_height'] = (int) $dim[1];
					}
				}
			}
			$out[] = $card;
		}
		return $out;
	}

	/**
	 * Map public upload URL to filesystem path when under admin/webroot/uploads.
	 */
	private function local_upload_path_from_url($url)
	{
		$path = parse_url((string) $url, PHP_URL_PATH);
		if (!is_string($path) || $path === '') {
			return '';
		}
		$path = '/' . trim(str_replace('\\', '/', $path), '/');
		$needle = 'admin/webroot/uploads/';
		$pos = strpos($path, $needle);
		if ($pos === false) {
			return '';
		}
		$rel = substr($path, $pos + strlen($needle));
		$rel = ltrim(str_replace('..', '', $rel), '/');
		return FCPATH . 'admin/webroot/uploads/' . $rel;
	}
 	
}
