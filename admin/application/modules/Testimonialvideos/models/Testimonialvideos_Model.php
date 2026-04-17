<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonialvideos_Model extends MY_Model {

    public function ensure_table()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `testimonial_videos` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `title` varchar(255) NOT NULL,
            `youtube_id` varchar(64) NOT NULL,
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
        $this->db->order_by('sort_order', 'asc');
        $this->db->order_by('id', 'desc');
        return $this->db->get('testimonial_videos')->result();
    }

    public function find($id)
    {
        $this->db->where('id', (int) $id);
        $q = $this->db->get('testimonial_videos');
        return $q->num_rows() ? $q->row() : null;
    }

    public function insert($data)
    {
        $this->db->insert('testimonial_videos', $data);
        return (int) $this->db->insert_id();
    }

    public function update_row($id, $data)
    {
        $this->db->where('id', (int) $id);
        $this->db->update('testimonial_videos', $data);
    }

    public function delete_row($id)
    {
        $this->db->where('id', (int) $id);
        $this->db->delete('testimonial_videos');
    }
}

