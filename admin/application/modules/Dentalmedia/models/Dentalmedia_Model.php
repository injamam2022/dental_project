<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dentalmedia_Model extends MY_Model {

    public function ensure_table()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `dental_media` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `section_key` varchar(80) NOT NULL,
            `item_key` varchar(120) DEFAULT NULL,
            `title` varchar(255) DEFAULT NULL,
            `description` text DEFAULT NULL,
            `image_name` varchar(255) DEFAULT NULL,
            `image_name_2` varchar(255) DEFAULT NULL,
            `sort_order` int(11) NOT NULL DEFAULT 0,
            `status` enum('active','inactivate') NOT NULL DEFAULT 'active',
            `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $this->db->query($sql);
    }

    public function all()
    {
        $this->db->order_by('section_key', 'asc');
        $this->db->order_by('sort_order', 'asc');
        $this->db->order_by('id', 'desc');
        return $this->db->get('dental_media')->result();
    }

    public function find($id)
    {
        $this->db->where('id', (int) $id);
        $q = $this->db->get('dental_media');
        return $q->num_rows() ? $q->row() : null;
    }

    public function insert($data)
    {
        $this->db->insert('dental_media', $data);
        return (int) $this->db->insert_id();
    }

    public function update_row($id, $data)
    {
        $this->db->where('id', (int) $id);
        $this->db->update('dental_media', $data);
    }

    public function delete_row($id)
    {
        $this->db->where('id', (int) $id);
        $this->db->delete('dental_media');
    }

    public function upload_image($field)
    {
        if (empty($_FILES[$field]['name'][0])) {
            return '';
        }
        $this->load->library('upload');
        $config['upload_path'] = FCPATH . '/webroot/uploads/dental_media';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp|svg';
        if (!is_dir($config['upload_path'])) {
            @mkdir($config['upload_path'], 0755, true);
        }
        $_FILES['uploadedimage']['name'] = $_FILES[$field]['name'][0];
        $_FILES['uploadedimage']['type'] = $_FILES[$field]['type'][0];
        $_FILES['uploadedimage']['tmp_name'] = $_FILES[$field]['tmp_name'][0];
        $_FILES['uploadedimage']['error'] = $_FILES[$field]['error'][0];
        $_FILES['uploadedimage']['size'] = $_FILES[$field]['size'][0];
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('uploadedimage')) {
            return '';
        }
        return $this->upload->data('file_name');
    }
}

