<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Aboutpagecontent extends MY_Controller {   
	function __construct() {
	 parent::__construct();
	 $this->table_name="aboutpagecontent";
	 $this->load->model('Aboutpagecontent_Model');
	}
	public function index()
	{
		 $content['Aboutpagecontent_fatch']=$this->Aboutpagecontent_Model->all_fatch_content($this->table_name);
         $content['subview']="page";
//        echo "<pre>";print_r($content);die;
		 $this->load->view('layout', $content);
	}
	
	function update_data()
	{
		$RequestMethod=$this->input->server("REQUEST_METHOD");
		if($RequestMethod == "POST"){
			$id = (int) $this->input->post('homepageContent_id');

			$row = $this->db->get_where($this->table_name, array('id' => $id))->row();
			$prev = ($row && ! empty($row->description)) ? @unserialize($row->description) : array();
			if (! is_array($prev)) {
				$prev = array();
			}
			$s0 = array('');
			if (isset($prev[0]) && is_array($prev[0]) && array_key_exists(0, $prev[0])) {
				$s0 = array($prev[0][0]);
			}
			if (! isset($prev[1]) || ! is_array($prev[1])) {
				$s1 = array('', '', '');
			} else {
				$s1 = array(
					isset($prev[1][0]) ? $prev[1][0] : '',
					isset($prev[1][1]) ? $prev[1][1] : '',
					isset($prev[1][2]) ? $prev[1][2] : '',
				);
			}
			if (! isset($prev[2]) || ! is_array($prev[2])) {
				$s2 = array('', '', '');
			} else {
				$s2 = array(
					isset($prev[2][0]) ? $prev[2][0] : '',
					isset($prev[2][1]) ? $prev[2][1] : '',
					isset($prev[2][2]) ? $prev[2][2] : '',
				);
			}
			$s3 = array(array('', ''), array('', ''), array('', ''));
			if (isset($prev[3]) && is_array($prev[3])) {
				for ($j = 0; $j < 3; $j++) {
					if (isset($prev[3][$j]) && is_array($prev[3][$j])) {
						$s3[$j][0] = isset($prev[3][$j][0]) ? $prev[3][$j][0] : '';
						$s3[$j][1] = isset($prev[3][$j][1]) ? $prev[3][$j][1] : '';
					}
				}
			}

			$icon_whitelist = array('user','shield','hospital-o','laptop','stethoscope','user-md','smile-o','heart-o','heart','users','trophy','star','check','plus-square','medkit','ambulance');
			$sanitize_fa = function ($raw) use ($icon_whitelist) {
				$i = strtolower(preg_replace('/[^a-z0-9\-]/', '', (string) $raw));
				return in_array($i, $icon_whitelist, true) ? $i : 'user';
			};
			$case_pair = function ($n) {
				$b = trim((string) $this->input->post('ext_case' . $n . '_before', true));
				$a = trim((string) $this->input->post('ext_case' . $n . '_after', true));
				return array('before' => $b, 'after' => $a);
			};
			$stats_bg = trim((string) $this->input->post('ext_stats_bg', true));
			$ext4 = array(
				'patient_title' => trim((string) $this->input->post('ext_patient_title', true)),
				'highlight' => array(
					$this->input->post('ext_highlight_1', false),
					$this->input->post('ext_highlight_2', false),
					$this->input->post('ext_highlight_3', false),
				),
				'cases' => array($case_pair(1), $case_pair(2), $case_pair(3)),
				'stats' => array(
					array(
						'value' => trim((string) $this->input->post('ext_stat1_value', true)),
						'suffix' => trim((string) $this->input->post('ext_stat1_suffix', true)),
						'label' => trim((string) $this->input->post('ext_stat1_label', true)),
						'icon' => $sanitize_fa($this->input->post('ext_stat1_icon', true)),
					),
					array(
						'value' => trim((string) $this->input->post('ext_stat2_value', true)),
						'suffix' => trim((string) $this->input->post('ext_stat2_suffix', true)),
						'label' => trim((string) $this->input->post('ext_stat2_label', true)),
						'icon' => $sanitize_fa($this->input->post('ext_stat2_icon', true)),
					),
					array(
						'value' => trim((string) $this->input->post('ext_stat3_value', true)),
						'suffix' => trim((string) $this->input->post('ext_stat3_suffix', true)),
						'label' => trim((string) $this->input->post('ext_stat3_label', true)),
						'icon' => $sanitize_fa($this->input->post('ext_stat3_icon', true)),
					),
					array(
						'value' => trim((string) $this->input->post('ext_stat4_value', true)),
						'suffix' => trim((string) $this->input->post('ext_stat4_suffix', true)),
						'label' => trim((string) $this->input->post('ext_stat4_label', true)),
						'icon' => $sanitize_fa($this->input->post('ext_stat4_icon', true)),
					),
				),
				'stats_bg' => $stats_bg,
			);
 
            $arr = array($s0, $s1, $s2, $s3, $ext4);
            $data = array('description'=>serialize($arr),"status"=>$this->input->post('status'));
						
            $this->Aboutpagecontent_Model->update_data($id,$data,$this->table_name);	

            $this->session->set_flashdata('alert', array('message' => 'Update successfully','class' => 'success'));
            redirect('Aboutpagecontent');
						
						
					 
		}else{
			redirect('Aboutpagecontent');
		}

	}

}	