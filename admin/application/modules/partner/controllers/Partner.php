<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Partner extends MY_Controller {
	function __construct() {
	 parent::__construct();
	 
	 $this->load->model('Partner_Model');
	}
    
    public function _remap($function,$encrypt_id,$id=""){
        $decrypt_id=DecryptID($encrypt_id[0]);
        $function=base64_decode($function);
//        echo $function."--".$decrypt_id."--".$id;die;
        switch ($function){
            case "list":
                $content['type'] = $decrypt_id;
                $content['Partner_fatch']=$this->Partner_Model->all_fatch_partner($decrypt_id);
                $content['subview']="partner/partner/partnerlist";
//                print_r($content);die;
                $this->load->view('layout', $content);
                break;
            case "add_partner":
                 $RequestMethod=$this->input->server("REQUEST_METHOD");
                 if($RequestMethod == "POST"){

                    $partner_img_name=$this->Partner_Model->partner_images_upload(); 
                    $data=array(
                    'image_name'=>$partner_img_name,
                    'status'=>$this->input->post('status'),
                    'type'=>$decrypt_id

                    );
                    $this->Partner_Model->insert_partner($data);
                    $this->session->set_flashdata('alert', array('message' => 'Add banner successfully','class' => 'success'));
                    redirect('partner/'.base64_encode('list').'/'.EncryptID($decrypt_id));
                 }else{
                    $content['type']=$decrypt_id;
                    $content['subview']="partner/partner/addpartner";
                    $this->load->view('layout', $content);
                 }
                break;
            case "partner_act_inactive":
                $id = DecryptID($this->uri->segment(4));
                $partner_detais=$this->Partner_Model->get_partner($id);
                $status=$partner_detais[0]->status;
                if($status=='active')
                {
                    $data=array('status'=>'inactivate');
                    $this->Partner_Model->update_partners($id,$data);	

                    $this->session->set_flashdata('alert', array('message' =>'Partner status Update successfully','class' => 'success'));
                    redirect('partner/'.base64_encode('list').'/'.EncryptID($decrypt_id));
                }else{
                    $data=array('status'=>'active');
                    $this->Partner_Model->update_partners($id,$data);	

                    $this->session->set_flashdata('alert', array('message' =>'Partner status Update successfully','class' => 'success'));
                    redirect('partner/'.base64_encode('list').'/'.EncryptID($decrypt_id));

                }
                break;
            case "edit_partner":
                  $id=DecryptID($this->uri->segment(4));
                  $content['type']=$decrypt_id;
                  $content['partner_edit']=$this->Partner_Model->get_partner($id);
                  $content['subview']="partner/partner/editpartner";
                  $this->load->view('layout', $content);
                break;
            case "update_partner":
                $RequestMethod=$this->input->server("REQUEST_METHOD");
                if($RequestMethod == "POST"){


                    $id=$this->input->post('partner_id');
                    if($_FILES['uploadedimages']['error'][0]>0){
                           $partner_img_name=$this->input->post('prev_image');

                           } else {
                                $partner_detais=$this->Partner_Model->get_partner($id);
                                $previous_name=$partner_detais[0]->image_name;
                                $p_id=$partner_detais[0]->id; 
                                $img_file=FCPATH . '/webroot/uploads/partner/'.$previous_name;
                                if (!unlink($img_file)) {} else { }
                                $partner_img_name=$this->Partner_Model->partner_images_upload(); 
                               }

                                $data=array(
                                'image_name'=>$partner_img_name,
                                'status'=>$this->input->post('status')

                                  );

                                $this->Partner_Model->update_partners($id,$data);	

                                $this->session->set_flashdata('alert', array('message' => 'Update partner successfully','class' => 'success'));
                                redirect('partner/'.base64_encode('list').'/'.EncryptID($decrypt_id));



                }else{
                    redirect('partner/'.base64_encode('list').'/'.EncryptID($decrypt_id));
                }
                break;
            case "delet_partner":
                 $id=DecryptID($this->uri->segment(4));
                 $get_img=$this->Partner_Model->get_partner($id);

                 if($get_img){
                     $img_name=$get_img[0]->image_name;
                     $id=$get_img[0]->id;
                     $img_file=FCPATH . '/webroot/uploads/partner/'.$img_name;
                     if(!unlink($img_file)) {} else { }
                     $this->Partner_Model->delet_partner_single($id);
                     $this->session->set_flashdata('alert', array('message' => 'Deleted partner successfully','class' => 'success'));
                     redirect('partner/'.base64_encode('list').'/'.EncryptID($decrypt_id));

                 }else{
                     $this->session->set_flashdata('alert', array('message' => 'Deleted partner successfully','class' => 'error'));
                     redirect('partner/'.base64_encode('list').'/'.EncryptID($decrypt_id));

                 }
                break;
            case "multi_partner_del":
                $RequestMethod=$this->input->server('REQUEST_METHOD');
                if($RequestMethod== 'POST'){

                    foreach($_POST['checklist'] as $id){
                        $get_img=$this->Partner_Model->get_partner($id);
                        $img_name=$get_img[0]->image_name;
                        $id=$get_img[0]->id;
                        $img_file=FCPATH . '/webroot/uploads/partner/'.$img_name;
                        if(!unlink($img_file)) {} else { }
                        $this->Partner_Model->delet_partner_single($id);

                    }
                    $this->session->set_flashdata('alert', array('message' => 'Add partner successfully','class' => 'success'));
                     redirect('partner/'.base64_encode('list').'/'.EncryptID($decrypt_id));
                }else{
                    $this->session->set_flashdata('alert', array('message' => 'Not valid page','class' => 'error'));
                    redirect('partner/'.base64_encode('list').'/'.EncryptID($decrypt_id));
                }
                break;
            default:
                $content['subview']="partner/partner/type";
                $this->load->view('layout', $content);
           
        }
    }
   
}	