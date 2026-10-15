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

    protected function lcp_preload_dr_prabhjeet_responsive()
    {
        return array(
            'href' => base_url('assets/images/branding/dr-prabhjeet-tmj-480w.jpg'),
            'imagesrcset' => base_url('assets/images/branding/dr-prabhjeet-tmj-360w.jpg') . ' 360w, '
                . base_url('assets/images/branding/dr-prabhjeet-tmj-480w.jpg') . ' 480w, '
                . base_url('assets/images/branding/dr-prabhjeet-tmj-560w.jpg') . ' 560w',
            'imagesizes' => '(max-width: 900px) min(92vw, 360px), min(480px, 48vw)',
        );
    }

    protected function enrich_technology_cards(array $cards)
    {
        $this->load->helper('dontia_responsive_images');
        foreach ($cards as &$row) {
            if (is_array($row)) {
                dontia_enrich_technology_card_image($row);
            }
        }
        unset($row);
        return $cards;
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

    protected function render_unique_page($page_key, $view, array $seo, array $tech_cards = array(), array $extra = array())
    {
        $this->apply_landing_seo($page_key, $seo);
        $content = $this->landing_shared_content($page_key);
        if (count($tech_cards) > 0) {
            $content['technology_cards'] = $this->enrich_technology_cards($tech_cards);
        }
        foreach ($extra as $k => $v) {
            $content[$k] = $v;
        }
        $this->load->view($view, $content);
    }

    public function index()
    {
        $this->apply_landing_seo('dental', array(
            'title' => 'Best Dental Clinic in Kolkata, WB | 25+ Experience in Dental Care',
            'description' => 'Experience gentle, professional dental care in Kolkata from our 25+ years experienced dentist. From checkup to advanced treatment, we make your smile shine.',
        ));
        $content = $this->landing_shared_content('dental');
        $this->load->view('Dental/dental_page', $content);
    }

    public function orthodontist()
    {
        $this->render_unique_page('orthodontist', 'Dental/orthodontist_page', array(
            'title' => 'Best Orthodontist in Kolkata | Braces & Invisalign Treatment',
            'description' => 'Transform your smile with expert orthodontic treatment in Kolkata. Explore braces, aligners, retainers, and personalized care at Dontia Care Clinic.',
            'lcp_preload_images' => array(array(
                'href' => base_url('admin/webroot/uploads/doctors/dr-prasoon-killa-best-orthodontist-in-kolkata.jpg'),
            )),
        ), array(
            array(
                'title' => 'Digital Treatment Planning',
                'description' => 'Advanced diagnostics and smile planning for precise and predictable orthodontic outcomes.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/hf_20260408_141453_072419cd-d779-4092-9401-4e7427a126ad.png'),
            ),
            array(
                'title' => 'Modern Braces Systems',
                'description' => 'Updated orthodontic systems designed for better comfort and efficient tooth movement.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/Cerec.png'),
            ),
            array(
                'title' => 'Comfort-Focused Care',
                'description' => 'Patient-friendly treatment process from consultation to post-treatment retention.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/Dental-Laser.jpg'),
            ),
        ), array(
            'media_before_after' => $this->dentalModel->get_media_by_section('before_after'),
        ));
    }

    public function dental_implant()
    {
        $this->render_unique_page('dental_implant', 'Dental/dental_implant_page', array(
            'title' => 'Best Dental Implant Clinic in Kolkata | Expert Implant Specialists',
            'description' => 'Restore missing teeth with expert dental implantologists, advanced implant systems, and personalized care at Dontia Dental Care in Kolkata.',
            'lcp_preload_images' => array($this->lcp_preload_dr_prabhjeet_responsive()),
        ), array(
            array(
                'title' => 'Digital Planning & Diagnostics',
                'description' => 'Careful assessment and treatment planning with modern imaging for precise implant placement.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/hf_20260408_141453_072419cd-d779-4092-9401-4e7427a126ad.png'),
            ),
            array(
                'title' => 'Globally Renowned Implant Systems',
                'description' => 'International-quality implant systems chosen for reliability and long-term outcomes.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/Cerec.png'),
            ),
            array(
                'title' => 'Sedation & Comfortable Surgery',
                'description' => 'Sedation dentistry and local anaesthesia so your surgical visit stays as comfortable as possible.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/Baldus.jpg'),
            ),
        ));
    }

    public function root_canal()
    {
        $rct_hero = 'assets/images/root-canal-treatment/' . rawurlencode('section-1-Root-canal-treatment-in-kolkat (1).jpeg');
        $this->render_unique_page('root_canal', 'Dental/root_canal_page', array(
            'title' => 'Root Canal Treatment in Kolkata – Painless & Advanced Care',
            'description' => 'Get painless and affordable root canal treatment at Dontia Care Clinic-Dental. Expert endodontists, modern technology, and same-day relief from tooth pain.',
            'canonical' => base_url('best-root-canal-treatment-in-kolkata'),
            'lcp_preload_images' => array(base_url($rct_hero)),
        ), array(
            array(
                'title' => 'Rotary Endodontic Technology',
                'description' => 'Modern rotary instruments for precise cleaning of root canals — faster, more comfortable, and highly effective.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/Dental-Laser.jpg'),
            ),
            array(
                'title' => 'Digital Diagnostics',
                'description' => 'Digital X-rays help us map infection accurately and plan a personalised root canal treatment.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/hf_20260408_141453_072419cd-d779-4092-9401-4e7427a126ad.png'),
            ),
            array(
                'title' => 'Comfort-Focused Anaesthesia',
                'description' => 'Advanced anaesthesia techniques keep RCT as painless and comfortable as possible throughout the visit.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/Baldus.jpg'),
            ),
        ));
    }

    public function cosmetic_dentist()
    {
        $hero = base_url('admin/webroot/uploads/banner/Koel_Mallick_with_dentist_in_kolkata_JPG.jpeg');
        $this->render_unique_page('cosmetic_dentist', 'Dental/cosmetic_dentist_page', array(
            'title' => 'Best Cosmetic Dentist in Kolkata at Dontia Care Clinic – Transform Your Smile',
            'description' => 'Transform your smile with expert cosmetic dentistry in Kolkata — teeth whitening, veneers, bonding, smile makeovers, and more at Dontia Care Clinic-Dental.',
            'canonical' => base_url('best-cosmetic-dentist-in-kolkata'),
            'lcp_preload_images' => array($hero),
        ), array(
            array(
                'title' => 'Digital Smile Design',
                'description' => 'Visualise your new smile before treatment begins with digital planning and smile design technology.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/hf_20260408_141453_072419cd-d779-4092-9401-4e7427a126ad.png'),
            ),
            array(
                'title' => '3D Scanning & Precision Fit',
                'description' => 'Accurate digital footprints help us craft veneers, crowns, and restorations that look natural and fit seamlessly.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/Cerec.png'),
            ),
            array(
                'title' => 'Aesthetic Laser Care',
                'description' => 'Modern laser options for comfortable contouring and refined cosmetic outcomes when clinically appropriate.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/Dental-Laser.jpg'),
            ),
        ));
    }

    public function tmj_specialist()
    {
        $this->render_unique_page('tmj_specialist', 'Dental/tmj_page', array(
            'title' => 'Best TMJ Specialist in Kolkata, India | Expert Treatment for TMJ Disorders',
            'description' => 'Jaw pain, clicking, headaches, or ear symptoms? Visit Dontia Care Clinic for TMJ / TMD care in Kolkata — Dawson Certified specialist, splints, physiotherapy, Botox for TMJ, and conservative-first treatment.',
            'canonical' => base_url('tmj-specialist-in-kolkata'),
            'lcp_preload_images' => array(base_url('assets/images/tmj/yt-lcp-poster.jpg')),
        ), array(
            array(
                'title' => 'Digital imaging & diagnosis',
                'description' => 'Digital X-rays and 3D imaging when needed to map your bite, joint, and airway — supporting accurate TMJ diagnosis.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/hf_20260408_141453_072419cd-d779-4092-9401-4e7427a126ad.png'),
            ),
            array(
                'title' => 'Splints & occlusal therapy',
                'description' => 'Custom night guards and splints designed to protect teeth from bruxism and unload the jaw joints.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/Cerec.png'),
            ),
            array(
                'title' => 'Comfort-focused TMJ care',
                'description' => 'From first consultation through physiotherapy or advanced options — we prioritise clear explanations and gentle, staged care.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/Dental-Laser.jpg'),
            ),
        ));
    }

    public function pediatric_dentist()
    {
        $hero = 'assets/images/pediatic-dentist/' . rawurlencode('When You Should Take Your Kid to a Pediatric Dentist-pedodontist-treating-patient-kolkat.jpeg');
        $this->render_unique_page('pediatric_dentist', 'Dental/pediatric_dentist_page', array(
            'title' => 'Pediatric Dentist in Kolkata | Gentle Kids Dental Care at Dontia Care Clinic',
            'description' => 'Gentle, expert pediatric dentistry in South Kolkata at Dontia Care Clinic-Dental. Dr. Suparna Roy provides kid-friendly check-ups, cavity care, sealants, fluoride, and emergency kids dental treatment.',
            'canonical' => base_url('best-pediatric-dentist-in-kolkata'),
            'og_image' => base_url($hero),
            'lcp_preload_images' => array(base_url($hero)),
        ));
    }

    public function clear_aligners()
    {
        $share_img = 'assets/images/aligners/' . rawurlencode('sonia shil.jpg');
        $lcp_img = 'assets/images/aligners/' . rawurlencode('sonia shil 3.jpg');
        $this->render_unique_page('clear_aligners', 'Dental/clear_aligners_page', array(
            'title' => 'Best Clear Aligners Clinic in Kolkata | Invisalign Treatment',
            'description' => 'Discreet, removable clear aligners and Invisalign at Dontia Care Clinic, Kolkata. Personalised treatment after a professional assessment of your teeth and bite.',
            'canonical' => base_url('best-clear-aligners-clinic-in-kolkata'),
            'og_image' => base_url($share_img),
            'lcp_preload_images' => array(base_url($lcp_img)),
        ), array(
            array(
                'title' => 'Digital Scanning',
                'description' => 'Digital impressions can replace messy moulds and help plan aligner fit and tooth movement.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/hf_20260408_141453_072419cd-d779-4092-9401-4e7427a126ad.png'),
            ),
            array(
                'title' => 'Treatment Planning',
                'description' => 'A planned sequence of tooth movements is mapped around your current alignment and treatment goals.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/Cerec.png'),
            ),
            array(
                'title' => 'Professional Monitoring',
                'description' => 'Follow-up visits let your dentist review progress and adjust the plan when needed.',
                'image_url' => base_url('admin/webroot/uploads/dental_page/technology/Dental-Laser.jpg'),
            ),
        ));
    }
}
