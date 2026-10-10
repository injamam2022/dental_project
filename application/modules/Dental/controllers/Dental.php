<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dental extends Frontend_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home/Home_Model', 'homeModel');
        $this->load->model('Page/Page_Model', 'pageModel');
        $this->load->model('Dental_Model', 'dentalModel');
        $this->load->helper('dontia_landing');
        $this->dentalModel->ensure_table();
        $this->dentalModel->ensure_landing_tables();
    }

    protected function landing_shared_content($page_key)
    {
        $gallery = $this->pageModel->GetGallery();
        $gallery_images = array();
        if (is_array($gallery)) {
            foreach ($gallery as $g) {
                if (!empty($g->image_name)) {
                    $gallery_images[] = $g;
                }
            }
        }
        $content = array();
        $content['page_key'] = $page_key;
        $content['landing'] = $this->dentalModel->get_landing_page($page_key);
        $content['landing_items'] = $this->dentalModel->get_landing_items_grouped($page_key);
        $content['gallery_images'] = $gallery_images;
        $content['doctor_list'] = $this->dentalModel->get_active_doctors();
        $content['testimonial_videos'] = $this->dentalModel->get_active_testimonial_videos();
        $content['media_certificates'] = $this->dentalModel->get_media_by_section('certificates');
        $content['blog_carousel'] = $this->dentalModel->get_blog_posts_for_dental(($page_key === 'dental') ? 12 : 6);
        return $content;
    }

    protected function apply_landing_seo($page_key, array $seo)
    {
        $landing = $this->dentalModel->get_landing_page($page_key);
        if ($landing && !empty($landing->hero_image)) {
            $hero_url = dontia_landing_image_url($landing->hero_image);
            if ($hero_url !== '') {
                $seo['lcp_preload_images'] = array($hero_url);
            }
        }
        $this->seo_overrides = $seo;
        return $landing;
    }

    protected function render_landing($page_key, array $seo)
    {
        $this->apply_landing_seo($page_key, $seo);
        $content = $this->landing_shared_content($page_key);
        $this->load->view('Dental/dental_page', $content);
    }

    public function index()
    {
        $this->render_landing('dental', array(
            'title' => 'Best Dental Clinic in Kolkata, WB | 25+ Experience in Dental Care',
            'description' => 'Experience gentle, professional dental care in Kolkata from our 25+ years experienced dentist. From checkup to advanced treatment, we make your smile shine.',
        ));
    }

    public function orthodontist()
    {
        $this->render_landing('orthodontist', array(
            'title' => 'Best Orthodontist in Kolkata | Braces & Invisalign Treatment',
            'description' => 'Transform your smile with expert orthodontic treatment in Kolkata. Explore braces, aligners, retainers, and personalized care at Dontia Care Clinic.',
        ));
    }

    public function dental_implant()
    {
        $this->render_landing('dental_implant', array(
            'title' => 'Best Dental Implant Clinic in Kolkata | Expert Implant Specialists',
            'description' => 'Restore missing teeth with expert dental implantologists, advanced implant systems, and personalized care at Dontia Dental Care in Kolkata.',
        ));
    }

    public function root_canal()
    {
        $this->render_landing('root_canal', array(
            'title' => 'Root Canal Treatment in Kolkata – Painless & Advanced Care',
            'description' => 'Get painless and affordable root canal treatment at Dontia Care Clinic-Dental. Expert endodontists, modern technology, and same-day relief from tooth pain.',
            'canonical' => base_url('best-root-canal-treatment-in-kolkata'),
        ));
    }

    public function cosmetic_dentist()
    {
        $this->render_landing('cosmetic_dentist', array(
            'title' => 'Best Cosmetic Dentist in Kolkata at Dontia Care Clinic – Transform Your Smile',
            'description' => 'Transform your smile with expert cosmetic dentistry in Kolkata — teeth whitening, veneers, bonding, smile makeovers, and more at Dontia Care Clinic-Dental.',
            'canonical' => base_url('best-cosmetic-dentist-in-kolkata'),
        ));
    }

    public function tmj_specialist()
    {
        $this->render_landing('tmj_specialist', array(
            'title' => 'Best TMJ Specialist in Kolkata, India | Expert Treatment for TMJ Disorders',
            'description' => 'Jaw pain, clicking, headaches, or ear symptoms? Visit Dontia Care Clinic for TMJ / TMD care in Kolkata — Dawson Certified specialist, splints, physiotherapy, Botox for TMJ, and conservative-first treatment.',
            'canonical' => base_url('tmj-specialist-in-kolkata'),
        ));
    }

    public function pediatric_dentist()
    {
        $this->render_landing('pediatric_dentist', array(
            'title' => 'Pediatric Dentist in Kolkata | Gentle Kids Dental Care at Dontia Care Clinic',
            'description' => 'Gentle, expert pediatric dentistry in South Kolkata at Dontia Care Clinic-Dental. Dr. Suparna Roy provides kid-friendly check-ups, cavity care, sealants, fluoride, and emergency kids dental treatment.',
            'canonical' => base_url('best-pediatric-dentist-in-kolkata'),
        ));
    }

    public function clear_aligners()
    {
        $this->render_landing('clear_aligners', array(
            'title' => 'Best Clear Aligners Clinic in Kolkata | Invisalign Treatment',
            'description' => 'Discreet, removable clear aligners and Invisalign at Dontia Care Clinic, Kolkata. Personalised treatment after a professional assessment of your teeth and bite.',
            'canonical' => base_url('best-clear-aligners-clinic-in-kolkata'),
        ));
    }
}
