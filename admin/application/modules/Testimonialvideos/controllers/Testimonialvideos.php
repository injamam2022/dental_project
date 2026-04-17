<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonialvideos extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Testimonialvideos_Model');
        $this->Testimonialvideos_Model->ensure_table();
    }

    public function index()
    {
        $content['video_list'] = $this->Testimonialvideos_Model->all();
        $content['subview'] = 'video_list';
        $this->load->view('layout', $content);
    }

    public function add()
    {
        if (strtoupper($this->input->server('REQUEST_METHOD')) === 'POST') {
            $youtube_raw = trim((string) $this->input->post('youtube_link'));
            $youtube_id = $this->extract_youtube_id($youtube_raw);
            if ($youtube_id === '') {
                $this->session->set_flashdata('alert', array('message' => 'Please enter a valid YouTube link or video ID.', 'class' => 'error'));
                redirect('Testimonialvideos/add');
            }
            $data = array(
                'title' => trim((string) $this->input->post('title')),
                'youtube_id' => $youtube_id,
                'sort_order' => (int) $this->input->post('sort_order'),
                'status' => (string) $this->input->post('status') === 'inactivate' ? 'inactivate' : 'active',
            );
            $this->Testimonialvideos_Model->insert($data);
            $this->session->set_flashdata('alert', array('message' => 'Video testimonial added', 'class' => 'success'));
            redirect('Testimonialvideos');
        }
        $content['subview'] = 'add_video';
        $this->load->view('layout', $content);
    }

    public function edit($enc_id)
    {
        $id = decode_url($enc_id);
        $content['video'] = $this->Testimonialvideos_Model->find($id);
        if (!$content['video']) {
            redirect('Testimonialvideos');
        }
        $content['subview'] = 'edit_video';
        $this->load->view('layout', $content);
    }

    public function update()
    {
        if (strtoupper($this->input->server('REQUEST_METHOD')) !== 'POST') {
            redirect('Testimonialvideos');
        }
        $id = (int) $this->input->post('id');
        $row = $this->Testimonialvideos_Model->find($id);
        if (!$row) {
            redirect('Testimonialvideos');
        }
        $youtube_raw = trim((string) $this->input->post('youtube_link'));
        $youtube_id = $this->extract_youtube_id($youtube_raw);
        if ($youtube_id === '') {
            $this->session->set_flashdata('alert', array('message' => 'Please enter a valid YouTube link or video ID.', 'class' => 'error'));
            redirect('Testimonialvideos/edit/' . encode_url($id));
        }
        $data = array(
            'title' => trim((string) $this->input->post('title')),
            'youtube_id' => $youtube_id,
            'sort_order' => (int) $this->input->post('sort_order'),
            'status' => (string) $this->input->post('status') === 'inactivate' ? 'inactivate' : 'active',
        );
        $this->Testimonialvideos_Model->update_row($id, $data);
        $this->session->set_flashdata('alert', array('message' => 'Video testimonial updated', 'class' => 'success'));
        redirect('Testimonialvideos');
    }

    public function delete($enc_id)
    {
        $id = decode_url($enc_id);
        $this->Testimonialvideos_Model->delete_row($id);
        $this->session->set_flashdata('alert', array('message' => 'Video testimonial deleted', 'class' => 'success'));
        redirect('Testimonialvideos');
    }

    private function extract_youtube_id($value)
    {
        $value = trim((string) $value);
        if ($value === '') {
            return '';
        }

        // Already an ID format
        if (preg_match('/^[a-zA-Z0-9_-]{6,20}$/', $value)) {
            return $value;
        }

        $parts = @parse_url($value);
        if (!is_array($parts)) {
            return '';
        }

        $host = isset($parts['host']) ? strtolower($parts['host']) : '';
        $path = isset($parts['path']) ? trim($parts['path'], '/') : '';

        if (strpos($host, 'youtu.be') !== false && $path !== '') {
            $id = explode('/', $path)[0];
            return preg_replace('/[^a-zA-Z0-9_-]/', '', $id);
        }

        if (strpos($host, 'youtube.com') !== false || strpos($host, 'youtube-nocookie.com') !== false) {
            if (!empty($parts['query'])) {
                parse_str($parts['query'], $q);
                if (!empty($q['v'])) {
                    return preg_replace('/[^a-zA-Z0-9_-]/', '', $q['v']);
                }
            }
            $segments = explode('/', $path);
            foreach ($segments as $idx => $seg) {
                if (($seg === 'embed' || $seg === 'shorts' || $seg === 'live') && isset($segments[$idx + 1])) {
                    return preg_replace('/[^a-zA-Z0-9_-]/', '', $segments[$idx + 1]);
                }
            }
        }

        return '';
    }
}

