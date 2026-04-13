<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct() {

	 parent::__construct();

	 $this->load->helper('login');

	 $this->load->model('Login_Model');

	 $this->_ensure_admin_session();

	}

	/**
	 * Native $_SESSION may be empty or missing keys before first write; PHP 8 warns on undefined offsets.
	 * array_key_exists is used for admin/login keys because isset() is false when the value is NULL.
	 */
	private function _ensure_admin_session()
	{
		if ( ! isset($_SESSION) || ! is_array($_SESSION))
		{
			$_SESSION = array();
		}
		if ( ! array_key_exists('admin', $_SESSION) || ! is_array($_SESSION['admin']))
		{
			$_SESSION['admin'] = array();
		}
		if ( ! array_key_exists('login', $_SESSION['admin']))
		{
			$_SESSION['admin']['login'] = 0;
		}
	}

	/*========== Function For Login Index Or Redirect To Dashboard Start ===========*/

	public function index()

	{

		if(($this->session->userdata('loginDetail')!==NULL))

		{

		   redirect('dashboard');

		}else {

		$this->load->view('login/login');

		}

		

	}

	/*========== Function For Login Index Or Redirect To Dashboard End ===========*/

	/*========== Function For Login Verify Or Redirect To Dashboard Start ===========*/

	function verify() {

		$this->_ensure_admin_session();

		$email =$this->security->xss_clean($this->input->post('user_email'));

		$password = MD5($this->security->xss_clean($this->input->post('password')));

		if($email == "" or $password == "")

		{

		$this->session->set_flashdata('alert', array('message' => 'Please Enter valid login details','class' => 'error'));	

		$_SESSION['admin']['login']=$_SESSION['admin']['login']+1;

		redirect('login');

		} else {

		$result =$this->Login_Model->login($email, $password);

		if($result)

		{

		if($result->active_status=="active")

		{

		$this->session->set_userdata('loginDetail',$result);

		$this->session->set_flashdata('alert', array('message' => 'you have successfully logged in','class' => 'success'));

		$this->Login_Model->update_last_login();

		$this->Login_Model->update_last_ip();

		$_SESSION['admin']['login']=0;

		redirect('dashboard');

		} else {

		$this->session->set_flashdata('alert', array('message' => 'your accout in inactive mode.Contact administrator','class' => 'warning'));

		$_SESSION['admin']['login']=0;

		redirect('login');

		}

		}else{

		$this->session->set_flashdata('alert', array('message' => 'please Enter Valid Email and Password','class' => 'error'));

		$_SESSION['admin']['login']=$_SESSION['admin']['login']+1;		

		redirect('login');

		}									

		}

		}

		/*========== Function For Login Verify Or Redirect To Dashboard End ===========*/	

		/*========== Function For Logout Start ===========*/

		function logout()

		{ 

		

		$this->Login_Model->update_last_ip();

		$this->session->unset_userdata('loginDetail');

		$this->session->set_flashdata('alert', array('message' => 'you are successfully logout','class' => 'success'));

        redirect('login', 'refresh');

		}	

		/*========== Function For Logout End ===========*/	

		/*========== Function For Forgot Password Start ===========*/

		function forgot_password()

		{

		$RequestMethod = $this->input->server('REQUEST_METHOD');

		if($RequestMethod == "POST")

	    {

		if($this->input->post('fieldname')=="emailid")

		{

		$result=$this->Login_Model->check_email_address($this->input->post('fieldvalue'));

		if($result)

		{

		$id=$result->id;

		$random_Pass = strtolower(random());

		$md_pass = MD5($random_Pass);

		$data = array('password' => $md_pass);

		$result=array('random_password'=>$random_Pass,'first_name'=>$result->first_name,'last_name'=>$result->last_name,'user_email'=>$result->email);

		$this->Login_Model->update_data($id,$data);					

		$msg=$this->load->view('login/forgot_password',$result,true);

		email_send('anup.j@impetuslabs.com','Password Recovery Mail',$msg);

		echo "exist";

		}else{

		echo "notexist";

		}

		}else{

		$result=$this->Login_Model->check_mobile_no($this->input->post('fieldvalue'));

		if($result)

		{

		$id=$result->id;

		$random_Pass = strtolower(random());

		$md_pass = MD5($random_Pass);

		$data = array('password' => $md_pass);

		$this->Login_Model->update_data($id,$data);

		$result=array('random_password'=>$random_Pass,'first_name'=>$result->first_name,'last_name'=>$result->last_name,'user_email'=>$result->email);

		$msg=$this->load->view('login/forgot_password',$result,true);

		email_send('anup.j@impetuslabs.com','Password Recovery Mail',$msg);

		echo "exist";

		}else{

		echo "notexist";

		}

		}

		}

		}	

		/*========== Function For Forgot Password End ===========*/	

		/*========== Function For Check Login Attempt ===========*/	

		function checkloginattempt()

		{		

		$this->_ensure_admin_session();
		$login_count = (int) ($_SESSION['admin']['login'] ?? 0);

		if($login_count < $this->loginattempt){

		$data=array('messagetype'=>'Success');	

		}else{

		$email =$this->security->xss_clean($this->input->post('user_email'));

		$password = MD5($this->security->xss_clean($this->input->post('password')));

		$result=$this->Login_Model->check_email_address($this->input->post('user_email'));

		if($result)

		{

		/* printarray($result); */

		$_SESSION['admin']['cod_otp'] = array(
			'pax_info' => $_POST,
			'time_dur' => date('Y-m-d h:i:s A', strtotime('+5 minutes')),
			'rand_Otp' => mt_rand(),
		);	

		$smsmsg= $_SESSION['admin']['cod_otp']['rand_Otp']." Is Your OTP. This Is Confidential. Sharing It With Anyone Gives Them Full Access To You Booking.This OTP Valid For 5 minutes";	

		$tosms=$result->contact_number; 

		$toemail=$result->email; 

		email_send($toemail,'Admin Access OTP',$smsmsg);	 

		sms_send($tosms,$smsmsg);	 

		$data=array('messagetype'=>'OTPSuccess','message'=>'Otp To +'.substr_replace($tosms, '***', -3).'  Send Successfully.This OTP Valid For 5 Minutes.');

		

		}else{			

		$data=array('messagetype'=>'Error','message'=>'Please Enter Valid Details');			

		$this->db->insert('admin_blockip', array('ipaddress'=>$this->input->ip_address())); 

		}

		

		}

		echo json_encode($data);			

		}

		/*========== Function For Check Login Attempt  ===========*/	

	/*----------------------- Verify OTP start --------------------------------*/

	

	 function verifyotp()

	 {

		 /* PrintArray($_POST); */

		$this->_ensure_admin_session();

		 $currenttime=date('Y-m-d h:i:s A');

		$otp_post = $this->input->post('verifyotp');
		$cod = isset($_SESSION['admin']['cod_otp']) && is_array($_SESSION['admin']['cod_otp'])
			? $_SESSION['admin']['cod_otp']
			: array();

		if (isset($cod['rand_Otp'], $otp_post) && (string) $cod['rand_Otp'] === (string) $otp_post)

		{

			if(isset($cod['time_dur']) && $currenttime < $cod['time_dur'])

			{

			$data=array('type'=>"success",'message'=>"OTP Verfication Successfull")	;

			unset($_SESSION['admin']['cod_otp']);

			echo json_encode($data);	

			}

			else{

		$data=array("type"=>"error","message"=>'OTP has been expired');

		echo json_encode($data);		

		}

		}

		else{

		$data=array("type"=>"error","message"=>'OTP is Not Valid. Plase Try Again');

		echo json_encode($data);	

		}

			

	 }

	/*---------------------------  Verify OTP end ------------------------------*/

	

}

	