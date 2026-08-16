<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skin extends Frontend_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dental/Dental_Model', 'dentalModel');
        $this->dentalModel->ensure_table();
    }

    public function index()
    {
        $hero = 'assets/images/skin-care/' . rawurlencode('header-koel-mallick-at-skin-clinic-in-kolkata.JPG');
        $this->seo_overrides = array(
            'title' => 'Best Skin Doctor and Clinic in Kolkata | Best Dermatologist',
            'description' => 'Get personalised skin treatments in Kolkata for acne, pigmentation, ageing, scars and more at Dontia Care Clinic- Skin and Hair, 25+ years of experience. Book your consultation.',
            'canonical' => base_url('best-skin-doctor-clinic-in-kolkata'),
            'og_image' => base_url($hero),
            'lcp_preload_images' => array(base_url($hero)),
            'preconnect_youtube' => true,
        );

        $content = array();
        $content['blog_carousel'] = $this->dentalModel->get_blog_posts_for_dental(6);

        $this->load->view('Skin/skin_page', $content);
    }
}
