<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends Frontend_Controller {

  function __construct(){
		parent::__construct();
        $this->table_name="query_list";
		$this->load->model('Career_Model');
	}  
    
    
    
	public function index()
	{
        $content['banner_details']=$this->Career_Model->GetBanner();
        $content['carrer_details']=$this->Career_Model->GetCarrerContent();
//        $content['about_page_con']=$this->Contact_Model->get_all_content();
		$content['subview']="career";
//        echo "<pre>";print_r($content);die;
		$this->load->view('layout/default', $content);
	}
    
 	public function career_submit(){
        $type = $this->input->post('type');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $message = $this->input->post('message');
        
        if($type == "QuickQuery"){
            $current_company_name = $this->input->post('current_company_name');
            $designation = $this->input->post('designation');
            $experience = $this->input->post('experience');
            $dob = $this->input->post('dob');
            
            $resume=$this->Career_Model->resume_upload(); 
            
            $Arr = array($current_company_name,$designation,$experience,$dob,$resume);
            $details = serialize($Arr);
        }
        
        
     /*   print_r($Arr);
        
        die();*/
        
        $data=array(    
                'category'=>$type,
                'name'=>$name,
                'email'=>$email,
                'mobile'=>$mobile,
                'message'=>$message,
                'details'=>$details
             );
//        echo json_encode($data);die;
          $this->Career_Model->insert_data($this->table_name,$data);
          //$this->session->set_flashdata('alert', array('message' => 'Data successfully Saved','class' => 'success'));
        $cvsurl = $this->config->item('base_url').'assets/images/resume/'.$resume;
        
         $subject =  "Application For Job At Ifabex";
        $msg_for_user = '<html> 
    
    <head> 
        <title>Recently Someone Applied From Career  Form</title> 
    </head> 
    <body> 
      <div style="width:100%; height: 100vh; display: flex; justify-content: center; align-items: center;">
            <div>
        <h1>Application For Job At Ifabex!</h1> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; padding: 14px; width: 100%; text-align: left;"> 
            <tr> 
                <th style="padding: 10px 0px; width:auto;">Name:</th><td  style="padding: 10px 0px;text-align: right;">'.$name.'</td> 
            </tr> 
            <tr> 
                <th style="padding: 10px 0px; width:auto;">Email:</th><td style="padding: 10px 0px;text-align: right;">'.$_POST['email'].'</td> 
            </tr> 
            <tr> 
                <th style="padding: 10px 0px;width:auto;">Mobile Number:</th><td style="padding: 10px 0px;text-align: right;">'.$mobile.'</td> 
            </tr>
            <tr> 
                <th style="padding: 10px 0px;width:auto;">Company:</th><td style="padding: 10px 0px;text-align: right;">'.$company.'</td> 
            </tr>
            <tr> 
                <th style="padding: 10px 0px;width:auto;">Message:</th><td style="padding: 10px 0px;text-align: right;">'.$message.'</td> 
            </tr>
            <tr> 
                <th style="padding: 10px 0px;width:auto;">Appliers Cv:</th><td style="padding: 10px 0px;text-align: right;"><a href='.$cvsurl.'>Click Here</a></td> 
            </tr> 
        </table> 
        </div>
        </div>
    </body> 
    </html>';
        
        
        
         email_send($email,$subject,$msg_for_user);
        
        
          $this->session->set_flashdata('message','You have Successfully Applied To Our Openings');
          redirect('Career');	
        
        
        
    }
}
