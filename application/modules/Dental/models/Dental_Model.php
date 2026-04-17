<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dental_Model extends MY_Model {

    public function ensure_table()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `doctor_management` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `doctor_name` varchar(255) NOT NULL,
            `designation` varchar(255) NOT NULL,
            `image_name` varchar(255) DEFAULT NULL,
            `sort_order` int(11) NOT NULL DEFAULT 0,
            `status` enum('active','inactivate') NOT NULL DEFAULT 'active',
            `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $this->db->query($sql);

        $sql2 = "CREATE TABLE IF NOT EXISTS `testimonial_videos` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `title` varchar(255) NOT NULL,
            `youtube_id` varchar(64) NOT NULL,
            `sort_order` int(11) NOT NULL DEFAULT 0,
            `status` enum('active','inactivate') NOT NULL DEFAULT 'active',
            `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $this->db->query($sql2);

        $sql3 = "CREATE TABLE IF NOT EXISTS `dental_media` (
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
        $this->db->query($sql3);
    }

    public function get_active_doctors()
    {
        $this->db->where('status', 'active');
        $this->db->order_by('sort_order', 'asc');
        $this->db->order_by('id', 'desc');
        return $this->db->get('doctor_management')->result();
    }

    public function get_active_testimonial_videos()
    {
        $this->db->reset_query();
        $this->db->from('testimonial_videos');
        $this->db->where('status', 'active');
        $this->db->order_by('sort_order', 'asc');
        $this->db->order_by('id', 'asc');
        $q = $this->db->get();
        if (!$q) {
            return array();
        }
        return $q->result();
    }

    public function get_media_by_section($section_key)
    {
        $this->db->where('status', 'active');
        $this->db->where('section_key', (string) $section_key);
        $this->db->order_by('sort_order', 'asc');
        $this->db->order_by('id', 'asc');
        return $this->db->get('dental_media')->result();
    }

    /**
     * Published blog posts for the dental landing carousel (tbl_posts_blog + admin uploads).
     *
     * @param int $limit
     * @return array<int, object> rows with dental_* display fields
     */
    public function get_blog_posts_for_dental($limit = 12)
    {
        if (!$this->db->table_exists('tbl_posts_blog')) {
            return array();
        }
        $this->db->reset_query();
        $this->db->select('p.*');
        $fields = $this->db->list_fields('tbl_posts_blog');
        $has_cat = is_array($fields) && in_array('category', $fields, true);
        if ($has_cat && $this->db->table_exists('tbl_blog_category')) {
            $this->db->select('c.name AS category_name');
            $this->db->join('tbl_blog_category c', 'c.id = p.category', 'left');
        }
        $this->db->from('tbl_posts_blog p');
        $this->db->group_start();
        $this->db->where('p.status', 'yes');
        $this->db->or_where('p.status', 'Yes');
        $this->db->or_where('p.status', 'YES');
        $this->db->or_where('p.status', 'active');
        $this->db->or_where('p.status', 'Active');
        $this->db->or_where('p.status', 'ACTIVE');
        $this->db->or_where('p.status', 'enable');
        $this->db->or_where('p.status', 'Enable');
        $this->db->or_where('p.status', 'ENABLED');
        $this->db->or_where('p.status', '1');
        $this->db->group_end();
        $this->db->order_by('p.id', 'desc');
        $this->db->limit((int) $limit);
        $q = $this->db->get();
        if ($q->num_rows() === 0) {
            return array();
        }
        $out = array();
        foreach ($q->result() as $row) {
            $plain = trim(preg_replace('/\s+/', ' ', strip_tags((string) $row->summernote)));
            $excerpt = $plain;
            if (strlen($excerpt) > 170) {
                $excerpt = substr($excerpt, 0, 167) . '...';
            }
            $words = $plain === '' ? 0 : str_word_count($plain);
            $row->dental_excerpt = $excerpt;
            $row->dental_read_min = max(2, (int) ceil($words / 200));
            $cat = isset($row->category_name) ? trim((string) $row->category_name) : '';
            $tag = isset($row->tag) ? trim((string) $row->tag) : '';
            $row->dental_category_label = ($cat !== '') ? $cat : (($tag !== '') ? $tag : 'Article');
            $row->dental_date_label = '';
            if (!empty($row->dat)) {
                $ts = strtotime($row->dat);
                if ($ts) {
                    $row->dental_date_label = date('F j, Y', $ts);
                }
            }
            $out[] = $row;
        }
        return $out;
    }
}

