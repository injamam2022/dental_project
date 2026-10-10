<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpages_Model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $helper = dirname(FCPATH) . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'dontia_landing_helper.php';
        if (is_file($helper)) {
            require_once $helper;
        }
    }

    public function ensure_table()
    {
        if (function_exists('dontia_landing_ensure_tables')) {
            dontia_landing_ensure_tables($this->db);
            dontia_landing_seed_defaults($this->db);
        }
    }

    public function all_pages()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get('landing_pages')->result();
    }

    public function find_page($id)
    {
        $this->db->where('id', (int) $id);
        $q = $this->db->get('landing_pages');
        return $q->num_rows() ? $q->row() : null;
    }

    public function find_page_by_key($key)
    {
        $this->db->where('page_key', (string) $key);
        $q = $this->db->get('landing_pages');
        return $q->num_rows() ? $q->row() : null;
    }

    public function update_page($id, $data)
    {
        $this->db->where('id', (int) $id);
        $this->db->update('landing_pages', $data);
    }

    public function items_for_page($page_key, $section_key = '')
    {
        $this->db->where('page_key', (string) $page_key);
        if ($section_key !== '') {
            $this->db->where('section_key', (string) $section_key);
        }
        $this->db->order_by('section_key', 'asc');
        $this->db->order_by('sort_order', 'asc');
        $this->db->order_by('id', 'asc');
        return $this->db->get('landing_page_items')->result();
    }

    public function find_item($id)
    {
        $this->db->where('id', (int) $id);
        $q = $this->db->get('landing_page_items');
        return $q->num_rows() ? $q->row() : null;
    }

    public function insert_item($data)
    {
        $this->db->insert('landing_page_items', $data);
        return (int) $this->db->insert_id();
    }

    public function update_item($id, $data)
    {
        $this->db->where('id', (int) $id);
        $this->db->update('landing_page_items', $data);
    }

    public function delete_item($id)
    {
        $this->db->where('id', (int) $id);
        $this->db->delete('landing_page_items');
    }

    public function upload_image($field)
    {
        if (empty($_FILES[$field]['name'])) {
            return '';
        }
        $this->load->library('upload');
        $config['upload_path'] = FCPATH . 'webroot/uploads/landing_pages';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp|svg';
        $config['encrypt_name'] = true;
        if (!is_dir($config['upload_path'])) {
            @mkdir($config['upload_path'], 0755, true);
        }
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($field)) {
            return '';
        }
        return $this->upload->data('file_name');
    }
}
