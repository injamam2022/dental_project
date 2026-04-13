<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends Frontend_Controller {

  function __construct(){
		parent::__construct();
		$this->load->model('Services_Model');
	}  
    
    public function _remap($cat_id,$sub_catid,$method='')
    {
        if ($this->uri->segment(4) == 'detail')
        {
            $this->detail();
        }
        else if($this->uri->segment(2) == 'calibration_service')
        {
             $this->calibration_service();
        }
        else
        {
            $this->index();
        }
    }
    
	public function index()
	{
        $content['banner_details']=$this->Services_Model->GetBanner();
        $cat_id = (int) $this->uri->segment(2);
        $content['services_cat_title'] = 'Our services';
        $content['appointment_service_preset'] = '';
        if ($cat_id > 0) {
            $row = $this->db->get_where('categories', array('cat_id' => $cat_id, 'status' => 'active'))->row();
            if ($row) {
                $content['services_cat_title'] = $row->cat_name;
                $cn = strtolower((string) $row->cat_name);
                if (strpos($cn, 'skin') !== false) {
                    $content['appointment_service_preset'] = 'Skin Treatment';
                } elseif (strpos($cn, 'ent') !== false) {
                    $content['appointment_service_preset'] = 'ENT';
                } elseif (strpos($cn, 'dental') !== false) {
                    $content['appointment_service_preset'] = 'Dental';
                }
            }
        }
        $content['Services']=$this->Services_Model->GetServices($this->uri->segment(2),$this->uri->segment(3));
		$content['subview']="services";
        
//        echo "<pre>";print_r($content);die;
		$this->load->view('layout/default', $content);
	}
    
    public function detail()
	{
        /*$content['banner_details']=$this->Home_Model->GetBanner();
        $content['blog_details']=$this->Home_Model->GetBlog();
        $content['tes_details']=$this->Home_Model->GetTestimonial();
        $content['cat_details']=$this->Home_Model->get_all_categories();
        $content['con_details']=$this->Home_Model->get_all_content();*/
      
//        $content['Services']=$this->Services_Model->GetServices();
        $content['banner_details']=$this->Services_Model->GetDetailsBanner();
        $content['IndividualService']=$this->Services_Model->GetIndividualService($this->uri->segment(2));
		if ( ! empty($content['IndividualService'][0])) {
			$p = $content['IndividualService'][0];
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
		$content['subview']="services_detail";
//        echo "<pre>";print_r($content);die;
		$this->load->view('layout/default', $content);
	}
	public function calibration_service()
	{
       /* 
        echo "fwefwe";
        
        die();*/
       // echo $this->uri->segment(3);
        $content['banner_details']=$this->Services_Model->GetBanner();
       $content['Services']= $this->Services_Model->GetServicesCalibaration($this->uri->segment(3));
        $content['subview']="services_calibration";
        $this->load->view('layout/default', $content);
    }
    	
	
}
