<?php class Frontend_Controller extends MY_Controller{
	
	
    
	 
	function __construct(){
		
		parent::__construct();
		
		$this->load->helper('Common');	
		$this->load->model('MY_Model');
		if(($this->session->userdata('userinfo_login_details')!==NULL))
		{
			$this->website['loginuser']=$this->MY_Model->loginuser();
		
		}

		/* Website data is loaded in MY_Controller; keep a short alias for views/controllers */
		$wd = $this->website['data'];
		$this->CompanyName = (is_object($wd) && property_exists($wd, 'company_name'))
			? $wd->company_name
			: '';
	}
	
	



	
	

}