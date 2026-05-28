<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctormanagement_Model extends MY_Model {

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
    }

    public function all()
    {
        $this->db->order_by('sort_order', 'asc');
        $this->db->order_by('id', 'desc');
        return $this->db->get('doctor_management')->result();
    }

    public function find($id)
    {
        $this->db->where('id', (int) $id);
        $q = $this->db->get('doctor_management');
        return $q->num_rows() ? $q->row() : null;
    }

    public function insert($data)
    {
        $this->db->insert('doctor_management', $data);
        return (int) $this->db->insert_id();
    }

    public function update_row($id, $data)
    {
        $this->db->where('id', (int) $id);
        $this->db->update('doctor_management', $data);
    }

    public function delete_row($id)
    {
        $this->db->where('id', (int) $id);
        $this->db->delete('doctor_management');
    }

    /**
     * Import the six legacy dental-page doctors (names, roles, order, photos).
     *
     * @return array{inserted: int, updated: int, errors: array}
     */
    public function import_template_doctors()
    {
        $defaults_dir = rtrim(FCPATH, '/\\') . DIRECTORY_SEPARATOR . 'webroot' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'dental_page' . DIRECTORY_SEPARATOR . 'defaults' . DIRECTORY_SEPARATOR;
        $doctors_dir = rtrim(FCPATH, '/\\') . DIRECTORY_SEPARATOR . 'webroot' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'doctors' . DIRECTORY_SEPARATOR;
        if (!is_dir($doctors_dir)) {
            @mkdir($doctors_dir, 0755, true);
        }

        $template = array(
            array('doctor_name' => 'Dr. Prabhjeet Sethi', 'designation' => 'Implantologist & TMJ Specialist', 'image' => 'dr-prabhjeet-sethi.png', 'sort_order' => 1),
            array('doctor_name' => 'Dr. Harleen Sandhu', 'designation' => 'Cosmetic Dentist', 'image' => 'dr-harleen-sandhu.png', 'sort_order' => 2),
            array('doctor_name' => 'Dr. Aishi Sinha', 'designation' => 'Endodontist', 'image' => 'Aishi_Sinha.png', 'sort_order' => 3),
            array('doctor_name' => 'Dr. Saibal Sen', 'designation' => 'Dental Surgeon', 'image' => 'dr-saibal-sen-purnam-medicare-polyclinic--lala-lajpat-rai-sarani-kolkata-dentists-yjki7.jpg', 'sort_order' => 4),
            array('doctor_name' => 'Dr. Prasoon Killa', 'designation' => 'Orthodontist', 'image' => 'Prasoon_Killa.png', 'sort_order' => 5),
            array('doctor_name' => 'Dr. Navneet', 'designation' => 'Periodontist', 'image' => 'Navneet_.png', 'sort_order' => 6),
        );

        $inserted = 0;
        $updated = 0;
        $errors = array();

        foreach ($template as $doc) {
            $src = $defaults_dir . $doc['image'];
            $dest_name = basename($doc['image']);
            $dest = $doctors_dir . $dest_name;
            if (!is_file($src)) {
                $errors[] = 'Missing image: ' . $doc['image'];
                continue;
            }
            if (!is_file($dest)) {
                if (!@copy($src, $dest)) {
                    $errors[] = 'Could not copy: ' . $doc['image'];
                    continue;
                }
            }

            $existing = $this->db->get_where('doctor_management', array('doctor_name' => $doc['doctor_name']))->row();
            $payload = array(
                'doctor_name' => $doc['doctor_name'],
                'designation' => $doc['designation'],
                'image_name' => $dest_name,
                'sort_order' => (int) $doc['sort_order'],
                'status' => 'active',
            );
            if ($existing) {
                $this->db->where('id', (int) $existing->id);
                $this->db->update('doctor_management', $payload);
                $updated++;
            } else {
                $this->db->insert('doctor_management', $payload);
                $inserted++;
            }
        }

        return array('inserted' => $inserted, 'updated' => $updated, 'errors' => $errors);
    }

    /**
     * @return array{ok: bool, file: string, error: string}
     */
    public function upload_image($field = 'doctor_image')
    {
        $upload_path = rtrim(FCPATH, '/\\') . DIRECTORY_SEPARATOR . 'webroot' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'doctors';
        if (!is_dir($upload_path)) {
            @mkdir($upload_path, 0755, true);
        }

        $file_field = null;
        if (!empty($_FILES[$field]['name']) && (int) $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
            $file_field = $field;
        } elseif (!empty($_FILES['uploadedimages']['name'][0]) && (int) $_FILES['uploadedimages']['error'][0] === UPLOAD_ERR_OK) {
            $_FILES['doctor_image_legacy'] = array(
                'name' => $_FILES['uploadedimages']['name'][0],
                'type' => $_FILES['uploadedimages']['type'][0],
                'tmp_name' => $_FILES['uploadedimages']['tmp_name'][0],
                'error' => $_FILES['uploadedimages']['error'][0],
                'size' => $_FILES['uploadedimages']['size'][0],
            );
            $file_field = 'doctor_image_legacy';
        }

        if ($file_field === null) {
            return array('ok' => true, 'file' => '', 'error' => '');
        }

        $this->load->library('upload');
        $config = array(
            'upload_path' => $upload_path,
            'allowed_types' => 'gif|jpg|jpeg|png|webp',
            'max_size' => 8192,
            'encrypt_name' => true,
        );
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($file_field)) {
            return array(
                'ok' => false,
                'file' => '',
                'error' => strip_tags((string) $this->upload->display_errors('', '')),
            );
        }
        $up = $this->upload->data();
        return array(
            'ok' => true,
            'file' => isset($up['file_name']) ? (string) $up['file_name'] : '',
            'error' => '',
        );
    }
}

