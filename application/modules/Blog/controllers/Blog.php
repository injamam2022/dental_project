<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Frontend_Controller {

  function __construct(){
		parent::__construct();
		$this->load->helper('common');
		$this->load->model('Blog_Model');
	}



	public function index($section = '')
	{
		$section = strtolower(trim((string) $section));
		$uri = strtolower(trim((string) $this->uri->uri_string(), '/'));
		$legacy = array('skin-care-blog' => 'skin-care', 'dental-blog' => 'dental');
		if (isset($legacy[$uri])) {
			redirect(function_exists('dontia_blog_section_url') ? dontia_blog_section_url($legacy[$uri]) : base_url('blog/' . $legacy[$uri]), 'location', 301);
			return;
		}
		$blog_section = null;
		if ($section !== '') {
			$blog_section = function_exists('dontia_blog_section_by_slug') ? dontia_blog_section_by_slug($section) : null;
			if (!$blog_section) {
				show_404();
				return;
			}
			$canonical = function_exists('dontia_blog_section_url') ? dontia_blog_section_url($blog_section->slug) : base_url('blog/' . $blog_section->slug);
			$this->seo_overrides = array(
				'title' => $blog_section->name . ' | Dontia Care Clinic',
				'description' => 'Read ' . $blog_section->name . ' articles from Dontia Care Clinic in Kolkata.',
				'canonical' => $canonical,
			);
		}

		$posts = $this->Blog_Model->GetBlog($section);
		$content['blog_section'] = $blog_section;
	    $content['banner_details']=$this->Blog_Model->GetBanner();
		$content['blog_details'] = $posts;
		$content['blog_details_asc'] = array_reverse($posts);
		$content['blog_details_desc'] = $posts;
		$content['subview']="blog";

		$this->load->view('layout/default',$content);
	}

    public function blogdetails($slug = '')
    {
		$as_section = function_exists('dontia_blog_section_by_slug') ? dontia_blog_section_by_slug($slug) : null;
		if ($as_section) {
			$this->index($as_section->slug);
			return;
		}

        $content['banner_details']=$this->Blog_Model->GetDetailsBanner();
        $content['single_data']=$this->Blog_Model->SingleBlogByIdentifier($slug);
		if (empty($content['single_data'])) {
			show_404();
			return;
		}
		if ( ! empty($content['single_data'][0])) {
			$b = $content['single_data'][0];
			$excerpt = strip_tags((string) (isset($b->summernote) ? $b->summernote : ''));
			$excerpt = preg_replace('/\s+/u', ' ', $excerpt);
			$excerpt = function_exists('mb_substr') ? mb_substr($excerpt, 0, 160) : substr($excerpt, 0, 160);
			$meta_title = trim((string) (isset($b->meta_title) ? $b->meta_title : ''));
			$meta_description = trim((string) (isset($b->meta_description) ? $b->meta_description : ''));
			$post_title = trim((string) (isset($b->post_title) ? $b->post_title : ''));
			$img = '';
			if ( ! empty($b->blog_image)) {
				$img = base_url('admin/webroot/uploads/blog/' . $b->blog_image);
			}
			$this->seo_overrides = array(
				'title' => $meta_title !== '' ? $meta_title : $post_title,
				'description' => $meta_description !== '' ? $meta_description : trim($excerpt),
				'og_image' => $img,
				'og_type' => 'article',
			);
		}
		$content['blog_details_asc']=$this->Blog_Model->GetBlogAsc();
		$content['blog_details_desc']=$this->Blog_Model->GetBlogDesc();
        $content['subview']="blog_details";
		$this->load->view('layout/default',$content);
    }




}
