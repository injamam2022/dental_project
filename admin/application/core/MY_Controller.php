<?php defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller{
		
		
     function __construct()
	 {
		 parent::__construct();
		  
			$this->load->library(array('form_validation','image_lib','encrypt'));
			$this->load->helper(array('string','common'));
			$this->load->model(array('MY_Model'));
			
			
			
		/*--------------Start Fetch Website data---------*/
			if($this->MY_Model->get_website_data())
			{
			$this->website['data']=$this->MY_Model->get_website_data();
			}else{
			$field=$this->MY_Model->get_field('website_setting');
			$this->website['data'] = get_instance();
			foreach($field as $key=>$val){
			$this->website['data']->$val=''; 
			}
			}
			$this->website['data']->currency_icon='<i class="fa fa-inr"></i>';
		/*--------------END Fetch Website data---------*/
			
			if(($this->session->userdata('loginDetail')!==NULL))

				{

					$this->website['loginuser']=$this->MY_Model->loginuser();

				}
				
		
		
			$checkblockip=$this->MY_Model->checkblockip($this->input->ip_address());
			if($checkblockip){
				//$this->load->view('include/blockip');
			redirect('blockip');
			/* redirect('login/noauth'); */
			}else{
			
			}
			/*----------------- Permissions --------------------------*/	
			$exception_uris = array('login','login/verify','login/verifyotp','login/checkloginattempt','login/forgot_password','login/logout');
   		      if (in_array(uri_string(), $exception_uris) == FALSE) {
				  $loginDetail=$this->session->userdata('loginDetail');
		   	   if(($loginDetail==NULL) || empty($loginDetail))
				{
				  
				  $this->session->set_flashdata('alert', array('message' => 'You are not authorized to access that location. ','class' => 'error'));
				    redirect('login'); 
				}
               else
			   {
				   if($loginDetail->role == "Super Admin")
			       {
					   
				   } else{
                        $class=ucfirst($this->router->fetch_class()); 
						$userpermission=unserialize($loginDetail->permissions);
						$other_url=array('dashboard/profile','dashboard/change_password','dashboard');
						if(in_array($class,$userpermission) OR in_array(uri_string(), $other_url))
						{
                             
						} else {
						
							$this->session->set_flashdata('alert', array('message' => 'You are not authorized to access that location.','class' => 'error'));
				            redirect('dashboard');
						
						}
			
				   } 
				   
			   }					
			}		
			
			$this->loginattempt=3;
			
			
	 }
	 
	 function authenticate()
	{
		
		/*$this->load->model('Token_Model');

		$token_value=$this->Token_Model->fetch($this->Mode);	
		if(empty($token_value)) {
				$data = array(
								"ClientId" =>$this->clientId,
								"UserName" =>$this->clientuser,
								"Password" =>$this->password,
								"EndUserIp"=>$this->input->ip_address()
							 );
							 
				$url=$this->Authenticate;	
				$Service='Authenticate';
				$Type='Token';				
				$responce=TBO_Request($data,$url,$Service,$Type);	 
				if($responce->Status==1)
				{
					$data=array('token_id'=>$responce->TokenId,'date_time'=>date('Y-m-d'),'mode'=>$this->Mode);
					$this->Token_Model->insert($data);
					return $responce->TokenId;					
					
				} else {
					---- Error Responce ---
					echo $responce->Error->ErrorMessage;
				}
		} else {
			    
		        return $token_value->token_id;
			}*/
		
	}
	
	
	
  
}