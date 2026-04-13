<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Frontend_Controller {

  function __construct(){
		parent::__construct();
		$this->load->model('Blog_Model');
	}  
    
    
    
	public function index()
	{
	    $content['banner_details']=$this->Blog_Model->GetBanner();
		$content['blog_details']=$this->Blog_Model->GetBlog();
		$content['blog_details_asc']=$this->Blog_Model->GetBlogAsc();
		$content['blog_details_desc']=$this->Blog_Model->GetBlogDesc();
		$content['subview']="blog";

		$this->load->view('layout/default',$content);
	}
	
    public function blogdetails($id)
    {		
    	

        $content['banner_details']=$this->Blog_Model->GetDetailsBanner();
       /* $id= $this->uri->segment(3, 0);*/
        $content['single_data']=$this->Blog_Model->SingleBlog($id);
		if ( ! empty($content['single_data'][0])) {
			$b = $content['single_data'][0];
			$excerpt = strip_tags((string) (isset($b->summernote) ? $b->summernote : ''));
			$excerpt = preg_replace('/\s+/u', ' ', $excerpt);
			$excerpt = function_exists('mb_substr') ? mb_substr($excerpt, 0, 160) : substr($excerpt, 0, 160);
			$img = '';
			if ( ! empty($b->blog_image)) {
				$img = base_url('admin/webroot/uploads/blog/' . $b->blog_image);
			}
			$this->seo_overrides = array(
				'title' => trim((string) (isset($b->post_title) ? $b->post_title : '')),
				'description' => trim($excerpt),
				'og_image' => $img,
				'og_type' => 'article',
			);
		}
		$content['blog_details_asc']=$this->Blog_Model->GetBlogAsc();
		$content['blog_details_desc']=$this->Blog_Model->GetBlogDesc();
        $content['subview']="blog_details";
//        echo "<pre>";print_r($content);die;
		$this->load->view('layout/default',$content);
    }
	
	
	
	
}
