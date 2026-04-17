<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dental extends Frontend_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home/Home_Model', 'homeModel');
        $this->load->model('Page/Page_Model', 'pageModel');
        $this->load->model('Dental_Model', 'dentalModel');
        $this->dentalModel->ensure_table();
    }

    public function index()
    {
        $products = $this->homeModel->GetProduct();
        $dental_services = array();
        if (is_array($products)) {
            foreach ($products as $p) {
                $cat_l = isset($p->cat_name) ? strtolower(trim((string) $p->cat_name)) : '';
                if ($cat_l !== '' && (strpos($cat_l, 'skin') !== false || strpos($cat_l, 'derma') !== false || strpos($cat_l, 'facial') !== false)) {
                    continue;
                }
                $dental_services[] = $p;
            }
        }

        // React-reference default 8 dental service cards.
        $service_defaults = array(
            array('name' => 'Full Mouth Rehabilitation', 'icon' => 'Full_Mouth_Rehabilitation.png', 'description' => 'Complete transformation of your smile with smile designing procedure with crown, implant & bridges.'),
            array('name' => 'Dental Implants', 'icon' => 'Dental_Implants.png', 'description' => 'Get back your lost smile with dental implants. All on 4/6 available to fix missing teeth.'),
            array('name' => 'Root Canal Treatment', 'icon' => 'Root_Canal_Treatment.png', 'description' => 'Get relief from tooth pain & sensitivity with Root Canal procedure'),
            array('name' => 'General Dentistry', 'icon' => 'General_Dentistry.png', 'description' => 'Dental checkup, cleanings, x-rays, fillings & gum disease treatment.'),
            array('name' => 'Cosmetic Dentistry', 'icon' => 'Cosmetic_Dentistry.png', 'description' => 'Improves the aesthetic appearance of teeth to boost confidence, discoloration, gaps & misalignment. Procedure includes clear aligners, dental veneers, teeth whitening, bonding, crown & laminates.'),
            array('name' => 'Dentures', 'icon' => 'Dentures.png', 'description' => 'A quick replacement to missing teeth if you do not have teeth or left with few teeth. Easy to wear and remove for old ages.'),
            array('name' => 'Tooth Extractions', 'icon' => 'Tooth_Extractions.png', 'description' => 'This procedure is done if you are suffering from wisdom tooth pain, severe tooth decay, gum disease & dental trauma.'),
            array('name' => 'Dental Emergency', 'icon' => 'Dental_Emergency.png', 'description' => 'Get relief from sudden severe pain, prevent tooth loss, & infections. Visit our clinic during operating hours in bhowanipore & chinar park.'),
        );
        $service_cards = array();
        foreach ($service_defaults as $def) {
            $matched = null;
            foreach ($dental_services as $p) {
                $pname = strtolower(trim((string) $p->product_name));
                $dname = strtolower(trim((string) $def['name']));
                if ($pname === $dname || strpos($pname, $dname) !== false || strpos($dname, $pname) !== false) {
                    $matched = $p;
                    break;
                }
            }
            $card = $def;
            if ($matched) {
                if (!empty($matched->pro_image)) {
                    $card['image_url'] = base_url('admin/webroot/uploads/product/' . $matched->pro_image);
                }
                $desc_raw = trim(preg_replace('/\s+/', ' ', strip_tags((string) $matched->product_description)));
                if ($desc_raw !== '') {
                    $card['description'] = $desc_raw;
                }
                $card['name'] = (string) $matched->product_name;
            } else {
                $card['image_url'] = base_url('admin/webroot/uploads/dental_page/services/' . $def['icon']);
            }
            if (empty($card['image_url'])) {
                $card['image_url'] = base_url('admin/webroot/uploads/dental_page/services/' . $def['icon']);
            }
            $service_cards[] = $card;
        }

        $gallery = $this->pageModel->GetGallery();
        $gallery_images = array();
        if (is_array($gallery)) {
            foreach ($gallery as $g) {
                if (!empty($g->image_name)) {
                    $gallery_images[] = $g;
                }
            }
        }

        $tech_items = $this->homeModel->get_technology_items();
        if (is_array($tech_items)) {
            foreach ($tech_items as $t) {
                $t->image_url = $this->homeModel->technology_image_url($t->image_name);
            }
        }
        $media_technology = $this->dentalModel->get_media_by_section('technology');

        // Default images live under admin/webroot/uploads/dental_page/technology/ (same filenames as the old React public folder).
        // Home technology admin rows can still override title/description and image when a file exists in home_technology uploads.
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
        $media_tech = is_array($media_technology) ? $media_technology : array();
        $tech_match = function ($slug, $title_like) {
            $title_l = strtolower(trim((string) $title_like));
            if ($slug === 'intraoral') {
                return (strpos($title_l, 'intraoral') !== false || strpos($title_l, 'intra oral') !== false);
            }
            if ($slug === 'cerec') {
                return strpos($title_l, 'cerec') !== false;
            }
            if ($slug === 'laser') {
                return strpos($title_l, 'laser') !== false;
            }
            if ($slug === 'baldus') {
                return strpos($title_l, 'baldus') !== false;
            }
            return false;
        };
        $used_media_ids = array();
        $technology_cards = array();
        foreach ($tech_defaults as $def) {
            $card = array(
                'id' => (int) $def['id'],
                'title' => $def['title'],
                'description' => $def['description'],
                'image_url' => (strpos((string) $def['image'], 'http://') === 0 || strpos((string) $def['image'], 'https://') === 0)
                    ? (string) $def['image']
                    : base_url('admin/webroot/uploads/dental_page/technology/' . $def['image']),
            );
            $has_media_override = false;

            // First preference: Dentalmedia admin section_key = "technology".
            foreach ($media_tech as $m) {
                if (!isset($m->id) || in_array((int) $m->id, $used_media_ids, true)) {
                    continue;
                }
                $item_key_l = strtolower(trim((string) (isset($m->item_key) ? $m->item_key : '')));
                $title_l = strtolower(trim((string) (isset($m->title) ? $m->title : '')));
                $is_match = ($item_key_l !== '' && $item_key_l === $def['slug'])
                    || ($item_key_l === '' && $tech_match($def['slug'], $title_l));
                if (!$is_match) {
                    continue;
                }
                $used_media_ids[] = (int) $m->id;
                $m_title = trim((string) (isset($m->title) ? $m->title : ''));
                $m_desc = trim(preg_replace('/\s+/', ' ', strip_tags((string) (isset($m->description) ? $m->description : ''))));
                if ($m_title !== '') {
                    $card['title'] = $m_title;
                }
                if ($m_desc !== '') {
                    $card['description'] = $m_desc;
                }
                $m_img = isset($m->image_name) ? basename((string) $m->image_name) : '';
                if ($m_img !== '') {
                    $media_path = FCPATH . 'admin/webroot/uploads/dental_media/' . $m_img;
                    if (is_file($media_path)) {
                        $card['image_url'] = base_url('admin/webroot/uploads/dental_media/' . $m_img);
                    }
                }
                $has_media_override = true;
                break;
            }
            $technology_cards[] = $card;
        }

        $banners = $this->homeModel->GetBanner();
        $content['hero_banner'] = (is_array($banners) && isset($banners[0])) ? $banners[0] : null;
        $content['services'] = $dental_services;
        $content['service_cards'] = $service_cards;
        $content['tes_details'] = $this->homeModel->GetTestimonial();
        $content['blog_carousel'] = $this->dentalModel->get_blog_posts_for_dental(12);
        $content['technology_items'] = is_array($tech_items) ? $tech_items : array();
        $content['technology_cards'] = $technology_cards;
        $content['gallery_images'] = $gallery_images;
        $content['doctor_list'] = $this->dentalModel->get_active_doctors();
        $content['testimonial_videos'] = $this->dentalModel->get_active_testimonial_videos();
        $content['media_why_choose'] = $this->dentalModel->get_media_by_section('why_choose');
        $content['media_specialisations'] = $this->dentalModel->get_media_by_section('specialisations');
        $content['media_stats'] = $this->dentalModel->get_media_by_section('stats');
        $content['media_before_after'] = $this->dentalModel->get_media_by_section('before_after');
        $content['media_certificates'] = $this->dentalModel->get_media_by_section('certificates');
        $content['media_about'] = $this->dentalModel->get_media_by_section('about');

        $this->load->view('Dental/dental_page', $content);
    }
}
