<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->helper('dontia_landing');

if (!isset($doctors) || !is_array($doctors)) {
    $doctors = array();
}

$L = (isset($landing) && is_object($landing)) ? $landing : null;
$LI = (isset($landing_items) && is_array($landing_items)) ? $landing_items : array();

$landing_brand = dontia_landing_text($L, 'brand_name', isset($dental_landing_brand) ? $dental_landing_brand : 'Dontia Care Clinic-Dental');
$dental_landing_brand = $landing_brand;
$dental_landing_brand_esc = htmlspecialchars($landing_brand, ENT_QUOTES, 'UTF-8');

$hero_heading = dontia_landing_text($L, 'hero_heading', $landing_brand);
$hero_subheading = dontia_landing_text($L, 'hero_subheading', 'Your One-Stop Destination for a Radiant Smile & Dental Needs');
$hero_alt = dontia_landing_text($L, 'hero_image_alt', 'Dental Clinic Banner');
$hero_video_id = dontia_landing_text($L, 'hero_video_id', '');
if (!isset($hero_img)) {
    $hero_img = '';
}
if ($L && trim((string) $L->hero_image) !== '') {
    $hero_img = dontia_landing_image_url($L->hero_image);
}

$intro_heading = dontia_landing_text($L, 'intro_heading', 'Welcome To ' . $landing_brand . ' in Kolkata');
$intro_html = ($L && trim((string) $L->intro_html) !== '') ? (string) $L->intro_html : '';
$intro_image_alt = dontia_landing_text($L, 'intro_image_alt', $landing_brand);
if (!isset($about_img)) {
    $about_img = '';
}
if ($L && trim((string) $L->intro_image) !== '') {
    $about_img = dontia_landing_image_url($L->intro_image);
}

$extra_html = ($L && trim((string) $L->extra_html) !== '') ? (string) $L->extra_html : '';
$cta_heading = dontia_landing_text($L, 'cta_heading', 'Book Your Consultation Today');
$cta_html = ($L && trim((string) $L->cta_html) !== '') ? (string) $L->cta_html : '';

$why_heading = dontia_landing_text($L, 'why_heading', 'Why We Are the Best Dental Clinic in Kolkata');
$why_subheading = dontia_landing_text($L, 'why_subheading', 'Why Choose Us');
$specialisations_heading = dontia_landing_text($L, 'specialisations_heading', 'Dental Specialisation');
$specialisations_subheading = dontia_landing_text($L, 'specialisations_subheading', 'We provide a specialised dental doctor for every specialisation at our Smile Dental Clinic in Kolkata.');
$stats_heading = dontia_landing_text($L, 'stats_heading', 'Our Dental Journey');
$services_heading = dontia_landing_text($L, 'services_heading', 'Dental Services');
$services_subheading = dontia_landing_text($L, 'services_subheading', 'Comprehensive dental care solutions tailored to your needs.');
$doctors_heading = dontia_landing_text($L, 'doctors_heading', 'Meet Our Dentist in Kolkata');
$procedures_heading = dontia_landing_text($L, 'procedures_heading', 'Dental Procedures');
$procedures_subheading = dontia_landing_text($L, 'procedures_subheading', 'Comprehensive dental care tailored to your needs.');
$tech_heading = dontia_landing_text($L, 'tech_heading', 'Dental Technology');
$transform_heading = dontia_landing_text($L, 'transform_heading', 'Successful Transformations');
$testimonials_heading = dontia_landing_text($L, 'testimonials_heading', 'Patient Testimonials');
$testimonials_subheading = dontia_landing_text($L, 'testimonials_subheading', 'Real patient experiences and transformations shared directly from our patients');
$reviews_heading = dontia_landing_text($L, 'reviews_heading', 'Google Reviews');
$reviews_subheading = dontia_landing_text($L, 'reviews_subheading', 'See what our patients are saying about their experience at ' . $landing_brand);
$reviews_url = dontia_landing_text($L, 'reviews_url', 'https://maps.app.goo.gl/Ujpqv8hHVHVkWBeL9');
$gallery_heading = dontia_landing_text($L, 'gallery_heading', 'Our Gallery');
$gallery_subheading = dontia_landing_text($L, 'gallery_subheading', 'Meet our team and see our commitment to excellence');
$certs_heading = dontia_landing_text($L, 'certs_heading', 'Dental Certificates & Awards');
$certs_subheading = dontia_landing_text($L, 'certs_subheading', 'Our commitment to excellence recognized through prestigious certifications and awards');
$blog_heading = dontia_landing_text($L, 'blog_heading', 'Latest From Our Blog');
$blog_subheading = dontia_landing_text($L, 'blog_subheading', 'Stay informed with our latest articles on dental health and care');
$faq_heading = dontia_landing_text($L, 'faq_heading', 'Frequently Asked Questions');
$faq_subheading = dontia_landing_text($L, 'faq_subheading', 'Find answers to common questions about our dental services');

$show_specialisations = dontia_landing_flag($L, 'show_specialisations', 1);
$show_stats = dontia_landing_flag($L, 'show_stats', 1);
$show_services = dontia_landing_flag($L, 'show_services', 1);
$show_doctors = dontia_landing_flag($L, 'show_doctors', 1);
$show_procedures = dontia_landing_flag($L, 'show_procedures', 1);
$show_tech = dontia_landing_flag($L, 'show_tech', 1);
$show_transformations = dontia_landing_flag($L, 'show_transformations', 1);
$show_videos = dontia_landing_flag($L, 'show_videos', 1);
$show_reviews = dontia_landing_flag($L, 'show_reviews', 1);
$show_gallery = dontia_landing_flag($L, 'show_gallery', 1);
$show_certs = dontia_landing_flag($L, 'show_certs', 1);
$show_blogs = dontia_landing_flag($L, 'show_blogs', 1);
$show_faqs = dontia_landing_flag($L, 'show_faqs', 1);
$show_locations = dontia_landing_flag($L, 'show_locations', 0);
$show_extra = dontia_landing_flag($L, 'show_extra', 0) && $extra_html !== '';
$show_cta = dontia_landing_flag($L, 'show_cta', 0);

if (!empty($LI['why_choose'])) {
    $media_why_choose_list = $LI['why_choose'];
}
if (!empty($LI['specialisation'])) {
    $media_specialisations_list = $LI['specialisation'];
    $specialisations = array();
}
if (!empty($LI['stat'])) {
    $media_stats_list = $LI['stat'];
    $stats = array();
}
if (!empty($LI['service'])) {
    $service_cards = array();
    foreach ($LI['service'] as $it) {
        $service_cards[] = array(
            'name' => (string) $it->title,
            'description' => (string) $it->description,
            'image_url' => dontia_landing_image_url($it->image_name),
            'image_alt' => trim((string) $it->image_alt) !== '' ? (string) $it->image_alt : (string) $it->title,
        );
    }
}
if (!empty($LI['procedure'])) {
    $procedures = array();
    foreach ($LI['procedure'] as $it) {
        $procedures[] = array(
            'title' => (string) $it->title,
            'description' => (string) $it->description,
        );
    }
}
if (!empty($LI['technology'])) {
    $technology_cards = array();
    foreach ($LI['technology'] as $it) {
        $technology_cards[] = array(
            'id' => (int) $it->id,
            'title' => (string) $it->title,
            'description' => (string) $it->description,
            'image_url' => dontia_landing_image_url($it->image_name),
            'image_alt' => trim((string) $it->image_alt) !== '' ? (string) $it->image_alt : (string) $it->title,
        );
    }
    $this->load->helper('dontia_responsive_images');
    foreach ($technology_cards as &$tc) {
        dontia_enrich_technology_card_image($tc);
    }
    unset($tc);
    $technology_cards_view = $technology_cards;
}
if (!empty($LI['transformation'])) {
    $before_after = array();
    foreach ($LI['transformation'] as $it) {
        $before_after[] = array(
            'title' => (string) $it->title,
            'image' => (string) $it->image_name,
            'alt' => trim((string) $it->image_alt) !== '' ? (string) $it->image_alt : ((string) $it->title . ' before and after'),
            'image_url' => dontia_landing_image_url($it->image_name),
        );
    }
}
if (!empty($LI['faq'])) {
    $faqs = array();
    foreach ($LI['faq'] as $it) {
        $faqs[] = array(
            'q' => (string) $it->title,
            'a' => (string) $it->description,
        );
    }
}
$location_items = !empty($LI['location']) ? $LI['location'] : array();
