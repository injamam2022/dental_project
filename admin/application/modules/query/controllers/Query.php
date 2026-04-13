<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Query extends MY_Controller {
	function __construct() {
	 parent::__construct();
	 $this->load->helper('query');
	 $this->load->model('Query_Model');
	}
	
	
	public function index()
	{
		$content['customer_query_list']=$this->Query_Model->getallquery();
		$content['subview']="query/query_list";
		$this->load->view('layout', $content);
	}
	
	public function newsletter()
	{
		$content['newsletter_list']=$this->Query_Model->getallnewsletter();
		$content['subview']="query/newsletter_list";
		$this->load->view('layout', $content);
	}
	
	function deletenewsletter()
		{
			echo $id=($this->uri->segment(3));
				   if($id!==NULL)
				  {
					
					$this->Query_Model->delete_data('newsletter',$id);
					$this->session->set_flashdata('alert', array('message' => 'Row Successfully deleted !','class' => 'success'));
					redirect('query/newsletter');
					
				  }
				  else {
				   $this->session->set_flashdata('alert', array('message' => 'row cannot delete !','class' => 'error'));
				   redirect('query/newsletter');
				  } 
		
		}
		
		function deleteallnewsletter() 
		{		
				if(!empty($_POST['checklist']))
					{
					foreach ($_POST['checklist'] as $id)
					{
				    $this->Query_Model->delete_data('newsletter',$id);
					}
				   $this->session->set_flashdata('alert', array('message' => 'Row Successfully deleted !','class' => 'success'));
				   redirect('query/newsletter');
					
					} 
					else {
				   $this->session->set_flashdata('alert', array('message' => 'row cannot delete !','class' => 'error'));
				   redirect('query/newsletter');
				  }
        } 
		
	function deletequery()
		{
		 $id=($this->uri->segment(3));
				   if($id!==NULL)
				  {
					
					$this->Query_Model->delete_data('query_list',$id);
					$this->session->set_flashdata('alert', array('message' => 'Row Successfully deleted !','class' => 'success'));
					redirect('query');
					
				  }
				  else {
				   $this->session->set_flashdata('alert', array('message' => 'row cannot delete !','class' => 'error'));
				   redirect('query');
				  } 
		
		}
		
		function deleteallquery() 
		{		
				if(!empty($_POST['checklist']))
					{
					foreach ($_POST['checklist'] as $id)
					{
				    $this->Query_Model->delete_data('query_list',$id);
					}
				   $this->session->set_flashdata('alert', array('message' => 'Row Successfully deleted !','class' => 'success'));
				   redirect('query');
					
					} 
					else {
				   $this->session->set_flashdata('alert', array('message' => 'row cannot delete !','class' => 'error'));
				   redirect('query');
				  }
        } 
	
	
	
	
}	