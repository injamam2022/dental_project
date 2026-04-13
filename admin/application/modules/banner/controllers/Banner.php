<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Banner extends MY_Controller {
	function __construct() {
	 parent::__construct();
        
$this->load->library('ckeditor');
$this->load->library('ckfinder');
$this->ckeditor->basePath = base_url().'assets/ckeditor/';
$this->ckeditor->config['toolbar'] = array(
            array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
                                                );
$this->ckeditor->config['language'] = 'it';
$this->ckeditor->config['width'] = '730px';
$this->ckeditor->config['height'] = '300px';            

//Add Ckfinder to Ckeditor
$this->ckfinder->SetupCKEditor($this->ckeditor,'./assets/ckfinder/'); 
	 
	 $this->load->model('Banner_Model');
	}
    
    public function _remap($function, $encrypt_id = array(), $id = '')
    {
        if ( ! is_array($encrypt_id))
        {
            $encrypt_id = array();
        }
        /* No encrypted id segment: defaults to Home Page type 1 — full banner list (same as list case). */
        if ( ! isset($encrypt_id[0]))
        {
            $content['type'] = 1;
            $content['Banner_fatch'] = $this->Banner_Model->all_fatch_banner();
            $content['subview'] = 'banner/banner/bannerlist';
            $this->load->view('layout', $content);
            return;
        }
        $decrypt_id = DecryptID($encrypt_id[0]);
        $function = base64_decode($function);
   //     echo $function."--".$decrypt_id."--".$id;die;
        switch ($function){
            case "list":
                $content['type'] = $decrypt_id;
                //$decrypt_id
                $content['Banner_fatch']=$this->Banner_Model->all_fatch_banner();
                $content['subview']="banner/banner/bannerlist";
//                print_r($content);die;
                $this->load->view('layout', $content);
                break;
            case "add_banner":
                 $RequestMethod=$this->input->server("REQUEST_METHOD");
                 if($RequestMethod == "POST"){

                    $banner_img_name = $this->Banner_Model->banner_images_upload();
                    if ($banner_img_name === FALSE || $banner_img_name === '')
                    {
                        $this->session->set_flashdata('alert', array(
                            'message' => 'Image upload failed. Use JPG, PNG or GIF and ensure the banner uploads folder exists and is writable.',
                            'class'   => 'error',
                        ));
                        redirect('banner/' . base64_encode('add_banner') . '/' . EncryptID($decrypt_id));
                        return;
                    }
                    $data=array(
                    'image_seo_title'=>$this->input->post('image_seo_title'),
                    'image_url_link'=>$this->input->post('image_url_link'),
                    'image_name'=>$banner_img_name,
                    'status'=>$this->input->post('status'),
                    'type'=>$this->input->post('type')

                    );
                    $this->Banner_Model->insert_banner($data);
                    $this->session->set_flashdata('alert', array('message' => 'Add banner successfully','class' => 'success'));
                    redirect('banner/'.base64_encode('list').'/'.EncryptID($decrypt_id));
                 }else{
                    $content['type']=$decrypt_id;
                    $content['subview']="banner/banner/addbanner";
                    $this->load->view('layout', $content);
                 }
                break;
            case "banner_act_inactive":
                $id = DecryptID($this->uri->segment(4));
                $banner_detais=$this->Banner_Model->get_banner($id);
                $status=$banner_detais[0]->status;
                if($status=='active')
                {
                    $data=array('status'=>'inactivate');
                    $this->Banner_Model->update_banners($id,$data);	

                    $this->session->set_flashdata('alert', array('message' =>'Banner status Update successfully','class' => 'success'));
                    redirect('banner/'.base64_encode('list').'/'.EncryptID($decrypt_id));
                }else{
                    $data=array('status'=>'active');
                    $this->Banner_Model->update_banners($id,$data);	

                    $this->session->set_flashdata('alert', array('message' =>'Banner status Update successfully','class' => 'success'));
                    redirect('banner/'.base64_encode('list').'/'.EncryptID($decrypt_id));

                }
                break;
            case "edit_banner":
                  $id=DecryptID($this->uri->segment(4));
                  $content['type']=$decrypt_id;
                  $content['banner_edit']=$this->Banner_Model->get_banner($id);
                  $content['subview']="banner/banner/editbanner";
                  $this->load->view('layout', $content);
                break;
            case "update_banner":
                $RequestMethod=$this->input->server("REQUEST_METHOD");
                if($RequestMethod == "POST"){


                    $id=$this->input->post('banner_id');
                    $file_err = (isset($_FILES['uploadedimages']['error'][0]))
                        ? (int) $_FILES['uploadedimages']['error'][0]
                        : UPLOAD_ERR_NO_FILE;

                    if ($file_err !== UPLOAD_ERR_OK)
                    {
                        $banner_img_name = $this->input->post('prev_image');
                    }
                    else
                    {
                        $banner_detais = $this->Banner_Model->get_banner($id);
                        $previous_name = $banner_detais[0]->image_name;

                        $banner_img_name = $this->Banner_Model->banner_images_upload();
                        if ($banner_img_name === FALSE || $banner_img_name === '')
                        {
                            $this->session->set_flashdata('alert', array(
                                'message' => 'Image upload failed. Your previous image was kept. Check file type (JPG, PNG, GIF) and folder permissions.',
                                'class'   => 'error',
                            ));
                            redirect('banner/' . base64_encode('edit_banner') . '/' . EncryptID($decrypt_id) . '/' . EncryptID($id));
                            return;
                        }

                        $img_file = FCPATH . 'webroot' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'banner' . DIRECTORY_SEPARATOR . $previous_name;
                        if ($previous_name !== '' && is_file($img_file))
                        {
                            @unlink($img_file);
                        }
                    }

                                $data=array(
                                'image_seo_title'=>$this->input->post('image_seo_title'),
                                'image_url_link'=>$this->input->post('image_url_link'),
                                'image_name'=>$banner_img_name,
                                'status'=>$this->input->post('status'),
                                'type'=>$this->input->post('type')

                                  );

                                $this->Banner_Model->update_banners($id,$data);	

                                $this->session->set_flashdata('alert', array('message' => 'Update banner successfully','class' => 'success'));
                                redirect('banner/'.base64_encode('list').'/'.EncryptID($decrypt_id));



                }else{
                    redirect('banner/'.base64_encode('list').'/'.EncryptID($decrypt_id));
                }
                break;
            case "delet_banner":
                 $id=DecryptID($this->uri->segment(4));
                 $get_img=$this->Banner_Model->get_banner($id);

                 if($get_img){
                     $img_name=$get_img[0]->image_name;
                     $id=$get_img[0]->id;
                     $img_file=FCPATH . '/webroot/uploads/banner/'.$img_name;
                     if(!unlink($img_file)) {} else { }
                     $this->Banner_Model->delet_banner_single($id);
                     $this->session->set_flashdata('alert', array('message' => 'Deleted banner successfully','class' => 'success'));
                     redirect('banner/'.base64_encode('list').'/'.EncryptID($decrypt_id));

                 }else{
                     $this->session->set_flashdata('alert', array('message' => 'Deleted banner successfully','class' => 'error'));
                     redirect('banner/'.base64_encode('list').'/'.EncryptID($decrypt_id));

                 }
                break;
            case "multi_banner_del":
                $RequestMethod=$this->input->server('REQUEST_METHOD');
                if($RequestMethod== 'POST'){

                    foreach($_POST['checklist'] as $id){
                        $get_img=$this->Banner_Model->get_banner($id);
                        $img_name=$get_img[0]->image_name;
                        $id=$get_img[0]->id;
                        $img_file=FCPATH . '/webroot/uploads/banner/'.$img_name;
                        if(!unlink($img_file)) {} else { }
                        $this->Banner_Model->delet_banner_single($id);

                    }
                    $this->session->set_flashdata('alert', array('message' => 'Add banner successfully','class' => 'success'));
                     redirect('banner/'.base64_encode('list').'/'.EncryptID($decrypt_id));
                }else{
                    $this->session->set_flashdata('alert', array('message' => 'Not valid page','class' => 'error'));
                    redirect('banner/'.base64_encode('list').'/'.EncryptID($decrypt_id));
                }
                break;
            default:
                $content['type'] = $decrypt_id;
                $content['Banner_fatch'] = $this->Banner_Model->all_fatch_banner();
                $content['subview'] = 'banner/banner/bannerlist';
                $this->load->view('layout', $content);
                break;
        }
    }
   
}	