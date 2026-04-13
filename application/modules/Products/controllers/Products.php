<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Frontend_Controller {

  function __construct(){
		parent::__construct();
		$this->load->model('Product_Model');
	}  
    
    
    
	public function index()
	{
        /*$content['banner_details']=$this->Home_Model->GetBanner();
        $content['blog_details']=$this->Home_Model->GetBlog();
        
        $content['cat_details']=$this->Home_Model->get_all_categories();
        */
      
        $content['tes_details']=$this->Product_Model->GetTestimonial();
        $content['Products']=$this->Product_Model->GetProduct();
		$content['subview']="products";
		$this->load->view('layout/default', $content);
	}
    
    public function detail($pro_id)
	{
        /*$content['banner_details']=$this->Home_Model->GetBanner();
        $content['blog_details']=$this->Home_Model->GetBlog();
        $content['tes_details']=$this->Home_Model->GetTestimonial();
        $content['cat_details']=$this->Home_Model->get_all_categories();
        $content['con_details']=$this->Home_Model->get_all_content();*/
      
        /*echo $pro_id;*/
        $content['IndividualProducts']=$this->Product_Model->GetIndividualProducts($pro_id);
		if ( ! empty($content['IndividualProducts'][0])) {
			$p = $content['IndividualProducts'][0];
			$img = '';
			if ( ! empty($p->pro_image)) {
				$parts = explode(',', (string) $p->pro_image);
				$first = trim($parts[0]);
				if ($first !== '') {
					$img = base_url('admin/webroot/uploads/product/' . $first);
				}
			}
			$this->seo_overrides = array(
				'meta_title' => trim((string) (isset($p->meta_title) ? $p->meta_title : '')),
				'meta_description' => trim((string) (isset($p->meta_description) ? $p->meta_description : '')),
				'og_image' => $img,
			);
		}
		$content['subview']="product_detail";
		$this->load->view('layout/default', $content);
	}
	
    	
	
}
