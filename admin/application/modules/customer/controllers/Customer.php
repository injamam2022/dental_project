<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends MY_Controller {
	function __construct() {
	 parent::__construct();
	 $this->load->helper('customer');
	 $this->load->model('Customer_Model');
	 $this->customersuffix='CUS-00';
	}
	public function index()
	{
		$content['customer_list']=$this->Customer_Model->getallcustomer();
		$content['subview']="customer/customer_list";
		$this->load->view('layout', $content);
	}
	function details($cusid){		
		$content['customer_details']=$this->Customer_Model->getallcustomerdetails($cusid);
		if(!empty($content['customer_details'])){			
			$getwalletbalance=$this->Customer_Model->getwalletbalance($cusid);
			$userepointbalance=$this->Customer_Model->getuserepointbalance($cusid);
			if(empty($getwalletbalance)){
			$content['loginuserbalance']=0;	
			}else{
			$content['loginuserbalance']=$getwalletbalance->balance;
			}
			if(empty($userepointbalance)){
			$content['epoints']=0;	
			}else{
			$content['epoints']=$userepointbalance;
			}	
		$content['subview']="customer/customer_details";
		$this->load->view('layout', $content);
		}else{echo 'No User Detail Found !!';}	
	}
	
	function walletlogs($cusid)
	{
		$content['customer_walletlog']=$this->Customer_Model->getallcustomerwalletlog($cusid);
		$content['CustomerId']=$cusid;
		$content['subview']="customer/customer_walletlog";
		$this->load->view('layout', $content);
	}
	
	function epointlogs($cusid)
	{
		$content['customer_epointlog']=$this->Customer_Model->getallcustomerepointslog($cusid);
		$content['CustomerId']=$cusid;
		$content['subview']="customer/customer_epointlog";
		$this->load->view('layout', $content);
	}
	
	function virtualtopup()
	{
		if(isset($_POST['customer_id'])){
		$getwalletbalance=$this->Customer_Model->getwalletbalance($_POST['customer_id']);
		if(empty($getwalletbalance)){
		$currentbalance=0;	
		}else{
		$currentbalance=$getwalletbalance->balance;
		}
		$_POST['balance']=$currentbalance+$_POST['credit'];	
		$_POST['updated_by']='Admin';	
		$_POST['package_ref_id']=null;	
		$_POST['payment_ref_id']=null;	
		$this->Customer_Model->insertwallettransaction($_POST);
		$this->session->set_flashdata('alert', array('message' => 'Virtual TopUp To '.$this->customersuffix.$_POST['customer_id'].' Sucessfully','class' => 'success'));
		redirect('customer/details/'.$_POST['customer_id'].'');
		}else{
			echo 'Illigal Acesss ';
		}
	}
	function virtualdeduct()
	{
		if(isset($_POST['customer_id'])){
		$getwalletbalance=$this->Customer_Model->getwalletbalance($_POST['customer_id']);
		if(empty($getwalletbalance)){
		$currentbalance=0;	
		}else{
		$currentbalance=$getwalletbalance->balance;
		}
		$_POST['balance']=$currentbalance-$_POST['debit'];	
		$_POST['updated_by']='Admin';
		$_POST['package_ref_id']=null;	
		$_POST['payment_ref_id']=null;	
		$this->Customer_Model->insertwallettransaction($_POST);
		$this->session->set_flashdata('alert', array('message' => 'Virtual Deduct Amount To '.$this->customersuffix.$_POST['customer_id'].' Sucessfully','class' => 'success'));
		redirect('customer/details/'.$_POST['customer_id'].'');
		}else{
			echo 'Illigal Acesss ';
		}
	}
	
	function delete($id)
	{
	$this->Customer_Model->deletecustomer($id);	
	$this->session->set_flashdata('alert', array('message' => 'Customer Delete Sucessfully','class' => 'success'));
	redirect('customer');	
	}
	
	
}	