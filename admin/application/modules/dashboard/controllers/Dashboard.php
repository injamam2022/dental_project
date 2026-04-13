<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {
	

	/* Start  Test credentials */
		/*  private $clientId	='ApiIntegrationNew';
		  private $clientuser='sctech';
		  private $password	='sctech12345';
		  private $Authenticate='http://api.tektravels.com/SharedServices/SharedData.svc/rest/Authenticate'; 
		  private $GetAgencyBalance='http://api.tektravels.com/SharedServices/SharedData.svc/rest/GetAgencyBalance'; 
		  private $Mode='Test';  */          
		/* End  Test credentials */
	
	function __construct() {
	parent::__construct();
	$this->load->helper('dashboard');
	$this->load->model('Dashboard_Model');
	}
	public function index()
	{
	
	$content['subview']="dashboard/dashboard";
	$this->load->view('layout',$content);
	}
	function changepassword()
	{
	$RequestMethod = $this->input->server('REQUEST_METHOD');
	if($RequestMethod == "POST")
	{
	$data=array('password'=>MD5($this->input->post('password')));
	$this->Dashboard_Model->update_profile($data);
	$this->session->set_flashdata('alert', array('message' => 'password successfully changed','class' => 'success'));
	redirect('dashboard');
	}				  
	$content['subview']="dashboard/changepassword";
	$this->load->view('layout', $content);
	}
	function profile()
	{
	$RequestMethod = $this->input->server('REQUEST_METHOD');
	if($RequestMethod == "POST")
	{         		
	if($_FILES['userfile']['error']>0)
	{			
	$img_name=$this->input->post('image');		
	} else {		
	$img_previous=$this->input->post('image');
	$image_data=$this->Dashboard_Model->user_picture();		
	$img_name=$image_data['file_name'];
	$img_file=FCPATH . '/webroot/uploads/profile-pic/'.$img_previous;
	if (!unlink($img_file)) {} else { }
	}
	$data=array(
	'first_name'=>$this->input->post('first_name'),
	'last_name'=>$this->input->post('last_name'),
	'contact_number'=>$this->input->post('contact_number'),
	'city_id'=>$this->input->post('city_id'),
	'state_id'=>$this->input->post('state_id'),
	'country_id'=>$this->input->post('country_id'),
	'pincode'=>$this->input->post('pincode'),
	'profile_pic'=>$img_name,
	);					
	$this->Dashboard_Model->update_profile($data);
	$this->session->set_flashdata('alert', array('message' => 'your profile has been successfully updated','class' => 'success'));
	redirect('dashboard');
	}
	$stateid=$this->website['loginuser']->state_id;	   
	$content['get_country']=$this->Dashboard_Model->get_countrycode();
	$content['get_city_id']=$this->Dashboard_Model->city_city_by();	
	$content['selectcity']=$this->Dashboard_Model->get_selectedcity($stateid);	
	$content['state_id']=$this->Dashboard_Model->get_state_by(); 
	$content['subview']="dashboard/profile";
	$this->load->view('layout', $content);
	}	
	function getstate(){		  
	$id=$_GET['country'];
	$content['get_state']=$this->Dashboard_Model->get_statecode($id);
	echo json_encode($content['get_state']);	
	}
	function getcity(){		  
	$id=$_GET['getval'];
	$content['get_city']=$this->Dashboard_Model->get_citycode($id);
	echo json_encode($content['get_city']);		
	}
	
}	