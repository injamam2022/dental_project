<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->helper('dontia_landing');

$L = (isset($landing) && is_object($landing)) ? $landing : null;
$LI = (isset($landing_items) && is_array($landing_items)) ? $landing_items : array();

if (!isset($cms_hero_heading)) {
    $cms_hero_heading = '';
}
if (!isset($cms_hero_subheading)) {
    $cms_hero_subheading = '';
}
if (!isset($cms_hero_alt)) {
    $cms_hero_alt = '';
}

if ($L) {
    $t = trim((string) $L->hero_heading);
    if ($t !== '') {
        $cms_hero_heading = $t;
    }
    $t = trim((string) $L->hero_subheading);
    if ($t !== '') {
        $cms_hero_subheading = $t;
    }
    $t = trim((string) $L->hero_image_alt);
    if ($t !== '') {
        $cms_hero_alt = $t;
    }
    $t = trim((string) $L->hero_image);
    if ($t !== '') {
        $hero_img = dontia_landing_image_url($t);
    }
    $t = trim((string) $L->hero_video_id);
    if ($t !== '') {
        $tmj_youtube_id = $t;
    }
}

if (!empty($LI['faq'])) {
    $faq_items = array();
    foreach ($LI['faq'] as $it) {
        $faq_items[] = array(
            'q' => (string) $it->title,
            'a' => (string) $it->description,
        );
    }
}

if (!empty($LI['technology'])) {
    $tech_cards = array();
    foreach ($LI['technology'] as $it) {
        $tech_cards[] = array(
            'title' => (string) $it->title,
            'description' => (string) $it->description,
            'image_url' => dontia_landing_image_url($it->image_name),
            'image_alt' => trim((string) $it->image_alt) !== '' ? (string) $it->image_alt : (string) $it->title,
        );
    }
    $technology_cards = $tech_cards;
}

if (!isset($faq_items) || !is_array($faq_items)) {
    $faq_items = array();
}
