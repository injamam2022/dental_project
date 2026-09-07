<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hair extends Frontend_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dental/Dental_Model', 'dentalModel');
        $this->load->helper('common');
        $this->dentalModel->ensure_table();
    }

    public function index()
    {
        $hero = 'assets/images/hair/' . rawurlencode('section-2-hair-skin-treatment-chair-dontia-care-clinic-skin-and-hair-kolkata-200kb.jpg');
        $this->seo_overrides = array(
            'title' => 'Best Hair Doctor, Dermatologist & Hair Clinic in Kolkata',
            'description' => 'Looking for the best hair doctor in Kolkata? Dontia Care Clinic offers advanced hair loss, dandruff, PRP, GFC and exosome treatments with personalised care.',
            'canonical' => base_url('best-hair-doctor-dermatologist-clinic-kolkata'),
            'og_image' => base_url($hero),
            'lcp_preload_images' => array(base_url($hero)),
            'preconnect_youtube' => true,
        );

        $content = array();
        $content['blog_carousel'] = $this->dentalModel->get_blog_posts_for_dental(6, 'skin-care');
        $content['blog_list_url'] = function_exists('dontia_blog_section_url') ? dontia_blog_section_url('skin-care') : base_url('blog/skin-care');
        $content['blog_list_heading'] = 'From our skin & hair blog';
        $content['blog_list_intro'] = 'Hair and scalp advice from Dontia Care Clinic.';

        $this->load->view('Hair/hair_page', $content);
    }
}
