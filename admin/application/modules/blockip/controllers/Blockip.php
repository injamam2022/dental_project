<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Blockip extends CI_Controller {
	function __construct() {
	parent::__construct();
	$this->load->model(array('MY_Model'));
	}
	
	public function index()
	{
	$this->load->view('blockip/blockip');
	}
	
	public function settings()
	{
	$content['list']=$this->MY_Model->getblockiplist();
	$content['subview']="blockip/settings";
	$this->load->view('layout', $content);
	}
	
	public function deleteip($id)
	{
	$this->db->where('id',$id);
	$this->db->delete('admin_blockip');
	$this->session->set_flashdata('alert', array('message' => 'Delete Sucessfully','class' => 'success'));
	redirect('blockip/settings');
	}
	
	public function addipllist()
	{		
	$this->db->insert('admin_blockip',array('ipaddress'=>$_POST['ipaddress']));
	$this->session->set_flashdata('alert', array('message' => 'Add Sucessfully','class' => 'success'));
	redirect('blockip/settings');
	}
	
	
	
}	