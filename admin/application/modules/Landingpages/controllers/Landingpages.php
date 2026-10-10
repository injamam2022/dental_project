<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpages extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Landingpages_Model');
        $this->Landingpages_Model->ensure_table();
        $helper = dirname(FCPATH) . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'dontia_landing_helper.php';
        if (is_file($helper)) {
            require_once $helper;
        }
    }

    public function index()
    {
        $content['page_list'] = $this->Landingpages_Model->all_pages();
        $content['subview'] = 'page_list';
        $this->load->view('layout', $content);
    }

    public function edit($enc_id)
    {
        $id = decode_url($enc_id);
        $page = $this->Landingpages_Model->find_page($id);
        if (!$page) {
            redirect('Landingpages');
        }
        $content['page'] = $page;
        $content['subview'] = 'edit_page';
        $this->load->view('layout', $content);
    }

    public function update()
    {
        if (strtoupper($this->input->server('REQUEST_METHOD')) !== 'POST') {
            redirect('Landingpages');
        }
        $id = (int) $this->input->post('id');
        $row = $this->Landingpages_Model->find_page($id);
        if (!$row) {
            redirect('Landingpages');
        }

        $hero_upload = $this->Landingpages_Model->upload_image('hero_image_file');
        $intro_upload = $this->Landingpages_Model->upload_image('intro_image_file');
        $hero_image = $hero_upload !== '' ? $hero_upload : trim((string) $this->input->post('hero_image'));
        $intro_image = $intro_upload !== '' ? $intro_upload : trim((string) $this->input->post('intro_image'));

        $flag_keys = array(
            'show_specialisations', 'show_stats', 'show_services', 'show_doctors', 'show_procedures',
            'show_tech', 'show_transformations', 'show_videos', 'show_reviews', 'show_gallery',
            'show_certs', 'show_blogs', 'show_faqs', 'show_locations', 'show_extra', 'show_cta',
        );
        $data = array(
            'page_label' => trim((string) $this->input->post('page_label')),
            'status' => (string) $this->input->post('status') === 'inactivate' ? 'inactivate' : 'active',
            'brand_name' => trim((string) $this->input->post('brand_name')),
            'hero_heading' => trim((string) $this->input->post('hero_heading')),
            'hero_subheading' => trim((string) $this->input->post('hero_subheading')),
            'hero_image' => $hero_image,
            'hero_image_alt' => trim((string) $this->input->post('hero_image_alt')),
            'hero_video_id' => trim((string) $this->input->post('hero_video_id')),
            'intro_heading' => trim((string) $this->input->post('intro_heading')),
            'intro_html' => (string) $this->input->post('intro_html'),
            'intro_image' => $intro_image,
            'intro_image_alt' => trim((string) $this->input->post('intro_image_alt')),
            'extra_html' => (string) $this->input->post('extra_html'),
            'why_heading' => trim((string) $this->input->post('why_heading')),
            'why_subheading' => trim((string) $this->input->post('why_subheading')),
            'specialisations_heading' => trim((string) $this->input->post('specialisations_heading')),
            'specialisations_subheading' => trim((string) $this->input->post('specialisations_subheading')),
            'stats_heading' => trim((string) $this->input->post('stats_heading')),
            'services_heading' => trim((string) $this->input->post('services_heading')),
            'services_subheading' => trim((string) $this->input->post('services_subheading')),
            'doctors_heading' => trim((string) $this->input->post('doctors_heading')),
            'procedures_heading' => trim((string) $this->input->post('procedures_heading')),
            'procedures_subheading' => trim((string) $this->input->post('procedures_subheading')),
            'tech_heading' => trim((string) $this->input->post('tech_heading')),
            'transform_heading' => trim((string) $this->input->post('transform_heading')),
            'testimonials_heading' => trim((string) $this->input->post('testimonials_heading')),
            'testimonials_subheading' => trim((string) $this->input->post('testimonials_subheading')),
            'reviews_heading' => trim((string) $this->input->post('reviews_heading')),
            'reviews_subheading' => trim((string) $this->input->post('reviews_subheading')),
            'reviews_url' => trim((string) $this->input->post('reviews_url')),
            'gallery_heading' => trim((string) $this->input->post('gallery_heading')),
            'gallery_subheading' => trim((string) $this->input->post('gallery_subheading')),
            'certs_heading' => trim((string) $this->input->post('certs_heading')),
            'certs_subheading' => trim((string) $this->input->post('certs_subheading')),
            'blog_heading' => trim((string) $this->input->post('blog_heading')),
            'blog_subheading' => trim((string) $this->input->post('blog_subheading')),
            'faq_heading' => trim((string) $this->input->post('faq_heading')),
            'faq_subheading' => trim((string) $this->input->post('faq_subheading')),
            'cta_heading' => trim((string) $this->input->post('cta_heading')),
            'cta_html' => (string) $this->input->post('cta_html'),
        );
        foreach ($flag_keys as $fk) {
            $data[$fk] = $this->input->post($fk) ? 1 : 0;
        }
        $this->Landingpages_Model->update_page($id, $data);
        $this->session->set_flashdata('alert', array('message' => 'Page content saved. Changes appear on the website immediately.', 'class' => 'success'));
        redirect('Landingpages/edit/' . encode_url($id));
    }

    public function items($enc_id)
    {
        $id = decode_url($enc_id);
        $page = $this->Landingpages_Model->find_page($id);
        if (!$page) {
            redirect('Landingpages');
        }
        $section = trim((string) $this->input->get('section'));
        $content['page'] = $page;
        $content['section_filter'] = $section;
        $content['item_list'] = $this->Landingpages_Model->items_for_page($page->page_key, $section);
        $content['section_labels'] = function_exists('dontia_landing_section_labels') ? dontia_landing_section_labels() : array();
        $content['subview'] = 'item_list';
        $this->load->view('layout', $content);
    }

    public function add_item($enc_page_id)
    {
        $page = $this->Landingpages_Model->find_page(decode_url($enc_page_id));
        if (!$page) {
            redirect('Landingpages');
        }
        if (strtoupper($this->input->server('REQUEST_METHOD')) === 'POST') {
            $img1 = $this->Landingpages_Model->upload_image('image_file');
            $img2 = $this->Landingpages_Model->upload_image('image_file_2');
            $this->Landingpages_Model->insert_item($this->item_post_data($page->page_key, $img1, $img2, null));
            $this->session->set_flashdata('alert', array('message' => 'Item added.', 'class' => 'success'));
            redirect('Landingpages/items/' . encode_url($page->id));
        }
        $content['page'] = $page;
        $content['item'] = null;
        $content['section_labels'] = function_exists('dontia_landing_section_labels') ? dontia_landing_section_labels() : array();
        $content['subview'] = 'edit_item';
        $this->load->view('layout', $content);
    }

    public function edit_item($enc_id)
    {
        $item = $this->Landingpages_Model->find_item(decode_url($enc_id));
        if (!$item) {
            redirect('Landingpages');
        }
        $page = $this->Landingpages_Model->find_page_by_key($item->page_key);
        if (!$page) {
            redirect('Landingpages');
        }
        $content['page'] = $page;
        $content['item'] = $item;
        $content['section_labels'] = function_exists('dontia_landing_section_labels') ? dontia_landing_section_labels() : array();
        $content['subview'] = 'edit_item';
        $this->load->view('layout', $content);
    }

    public function update_item()
    {
        if (strtoupper($this->input->server('REQUEST_METHOD')) !== 'POST') {
            redirect('Landingpages');
        }
        $id = (int) $this->input->post('id');
        $item = $this->Landingpages_Model->find_item($id);
        if (!$item) {
            redirect('Landingpages');
        }
        $page = $this->Landingpages_Model->find_page_by_key($item->page_key);
        $img1 = $this->Landingpages_Model->upload_image('image_file');
        $img2 = $this->Landingpages_Model->upload_image('image_file_2');
        $this->Landingpages_Model->update_item($id, $this->item_post_data($item->page_key, $img1, $img2, $item));
        $this->session->set_flashdata('alert', array('message' => 'Item updated.', 'class' => 'success'));
        redirect('Landingpages/items/' . encode_url($page ? $page->id : 0));
    }

    public function delete_item($enc_id)
    {
        $item = $this->Landingpages_Model->find_item(decode_url($enc_id));
        if ($item) {
            $page = $this->Landingpages_Model->find_page_by_key($item->page_key);
            $this->Landingpages_Model->delete_item($item->id);
            $this->session->set_flashdata('alert', array('message' => 'Item deleted.', 'class' => 'success'));
            redirect('Landingpages/items/' . encode_url($page ? $page->id : 0));
        }
        redirect('Landingpages');
    }

    protected function item_post_data($page_key, $img1, $img2, $existing)
    {
        $image = $img1 !== '' ? $img1 : trim((string) $this->input->post('image_name'));
        $image2 = $img2 !== '' ? $img2 : trim((string) $this->input->post('image_name_2'));
        if ($existing && $image === '') {
            $image = $existing->image_name;
        }
        if ($existing && $image2 === '') {
            $image2 = $existing->image_name_2;
        }
        return array(
            'page_key' => $page_key,
            'section_key' => trim((string) $this->input->post('section_key')),
            'title' => trim((string) $this->input->post('title')),
            'description' => trim((string) $this->input->post('description')),
            'image_name' => $image,
            'image_alt' => trim((string) $this->input->post('image_alt')),
            'image_name_2' => $image2,
            'image_alt_2' => trim((string) $this->input->post('image_alt_2')),
            'link_url' => trim((string) $this->input->post('link_url')),
            'sort_order' => (int) $this->input->post('sort_order'),
            'status' => (string) $this->input->post('status') === 'inactivate' ? 'inactivate' : 'active',
        );
    }
}
