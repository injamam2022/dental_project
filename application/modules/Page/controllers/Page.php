<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Frontend_Controller {

	function __construct() {
	 parent::__construct();
	  $this->load->model('Page_Model');
	}	

	public function index()
	{   
        
		 $slug_url=$this->uri->segment(2);
          $data['tes_details']=$this->Page_Model->GetTestimonial();
		 $data['result']=$this->Page_Model->get_info($slug_url);
		 $data['subview']="pagedetails";
		 $this->load->view('layout/default',$data); 
	}

	public function disclaimer(){


		
		$data['subview']="pagedetails";

		$this->load->view('layout/default',$data); 
	}

		public function career(){


		$data['result']=$this->Page_Model->all_fatch_content();
		$data['subview']="career";

		$this->load->view('layout/default',$data); 
	}

			public function privacy_policy(){


		
		$data['subview']="privacy_policy";

		$this->load->view('layout/default',$data); 
	}

			public function terms_conditions(){


		
		$data['subview']="termsandconditions";

		$this->load->view('layout/default',$data); 
	}

			public function blog(){


		
		$data['subview']="blog";

		$this->load->view('layout/default',$data); 
	}

			public function services(){


		
		$data['subview']="services";

		$this->load->view('layout/default',$data); 
	}

			public function aboutus(){


		
		 $data['subview']="aboutus";
         $data['tes_details']=$this->Page_Model->GetTestimonial();
		 $this->load->view('layout/default',$data); 
	}
    
    public function annualmaintainance(){


		
		 $data['subview']="annualmaintainance";
         $data['tes_details']=$this->Page_Model->GetTestimonial();
		 $this->load->view('layout/default',$data); 
	}

			public function gallery(){


        $data['gallery_details']=$this->Page_Model->GetGallery();
		$data['subview']="gallery";

		$this->load->view('layout/default',$data); 
	}


	public function contactus(){


		
		$data['subview']="contact";

		$this->load->view('layout/default',$data); 
	}
	
	
	public function our_clients()
	{
		
		$content['banner_details']=$this->Page_Model->GetBanner();
        $content['partner_details']=$this->Page_Model->GetPartner();
		$content['subview']="our_clients";

		$this->load->view('layout/default',$content); 
	}
	


	
		

 
		
   
}