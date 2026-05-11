<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends MY_Controller {
	
	    function __construct() {		
		     parent::__construct();
			 $this->load->Model('Blog_Model');	
			 $this->table_name="tbl_blog_category";
			 $this->table_name="tbl_posts_blog";
			 $this->table_name="client_reviews";
		}
		
	   function index() {
				$content['get_post']=$this->Blog_Model->get_post();
                $content['subview']="blog/posts";
				$this->load->view('layout', $content);	
				
				
		}
		
	 function addblog() 
	 {
             
		 
		        $content['get_related_post']=$this->Blog_Model->get_related_post();
		        $content['get_category']=$this->Blog_Model->get_category();
                        $content['subview']="blog/add_blog";
		        $this->load->view('layout', $content);			  
		}	
			
	  function categories() {
	              $content['get_blog']=$this->Blog_Model->get_blog();
		          $content['subview']="blog/category";
				  $this->load->view('layout', $content);	 
		   
	   }
      
      function category(){
	   
		  if($_POST){
		   
			  $data=array(
			 'name'=>$this->input->post('category_name'), 
			 'slug'=>$this->input->post('category_title'),
			 'status'=>$this->input->post('status')
			 );
			 $res=$this->db->insert('tbl_blog_category',$data);
			 if($res)
			   {
			   $this->session->set_flashdata('alert', array('message' => 'Categories  Saved Successfully','class' => 'success'));
			   redirect('blog/categories');
			   }
		    }
			else{ 
			  redirect('category');
			  }
	   }  
	   function updatecategory(){
	   
		  if($_POST){
		   
			  $data=array(
			 'name'=>$this->input->post('category_name'), 
			 'slug'=>$this->input->post('category_title'),
			 'status'=>$this->input->post('status')
			 );
			
			 $id=$this->input->post('categoryid');
			 $res= $this->Blog_Model->update_category($data,$id); ;
			 if($res)
			   {
			   $this->session->set_flashdata('alert', array('message' => 'Categories  Successfully Update','class' => 'success'));
			   redirect('blog/categories');
			   }
		    }
			else{ 
			  redirect('category');
			  }
	   }
	   
	  function delete_single_blog($id){
		      
			  $this->Blog_Model->delete_data($id);
			  $this->session->set_flashdata('alert', array('message' => 'Row successfully deleted !','class' => 'success'));
			  redirect('blog/categories');

		}
		
	function delete_multiple_blog(){
		
		   foreach ($_POST['checklist'] as $enqid){
			
				$this->Blog_Model->delete_data($enqid);
			  }
			  $this->session->set_flashdata('alert', array('message' => 'Row successfully deleted !','class' => 'success'));
			  redirect('blog/categories');

		}
	  
	function insert()
	{
		
		 $image_name=$this->Blog_Model->blog_thumbnail_upload();
	
		 if($_POST)
		  {
		  $posted = trim((string) $this->input->post('posted'));
		  if ($posted === '') { $posted = 'Admin'; }
		  $data=array(
		 'post_title'=>$this->input->post('post_title'),
		 'Permalink'=>$this->input->post('category_title'),
		 'summernote'=>$this->input->post('summernote'),
		 'tag'=>$this->input->post('tag'),
		 'status'=>$this->input->post('status'),
		 'category'=>$this->input->post('category'),
		 'relatedposts'=>serialize($this->input->post('relatedposts')),
		 'blog_image'=>$image_name,
		 'posted'=>$posted,
		 'dat'=>date('Y-m-d H:i:s'),
		 );
		
		 $res=$this->db->insert('tbl_posts_blog',$data);
		
		 if($res)
		 {
		   $this->session->set_flashdata('alert', array('message' => 'Posts Blog Saved Successfully','class' => 'success'));
		 redirect('blog');
		 }
	   }
	    else{ 
	   redirect('insert');
	   }
		 
		 
	 }
	  function delete_single_post($id)
	  {
		  
		
			     $this->db->where('id',$id);
     	         $res=$this->db->get('tbl_posts_blog')->result();
		         $image=$res[0]->blog_image; 
				 unlink("webroot/uploads/blog/".$image);
				 unlink("webroot/uploads/blog/thumbnail/".$image);
				 $this->db->where('id',$this->uri->segment(3));
				 $this->db->delete('tbl_posts_blog');
				echo "true";
			    $this->Blog_Model->delete_data_post($id);
			    $this->session->set_flashdata('alert', array('message' => 'Row successfully deleted !','class' => 'success'));
			    redirect('blog');

		}
		
	function delete_multiple_post()
	{
		foreach ( $_POST['checklist'] as $enqid){
			
				 $this->db->where('id',$enqid);
     	         $res=$this->db->get('tbl_posts_blog')->result();
		         $image=$res[0]->blog_image; 
				 unlink("webroot/uploads/blog/".$image);
				 unlink("webroot/uploads/blog/thumbnail/".$image);
				 $this->db->where('id',$this->uri->segment(3));
				 $this->db->delete('tbl_posts_blog');
				echo "true";
			
				$this->Blog_Model->delete_data_post($enqid);
			  }
			  $this->session->set_flashdata('alert', array('message' => 'Row successfully deleted !','class' => 'success'));
			  redirect('Blog');

		}
		function edit_comment($id)
		{
			  
				$content['get_edit_comment']=$this->Blog_Model->get_edit_comment($id);
                $content['subview']="blog/edit_comment";
				$this->load->view('layout', $content);	
		}
		
		function update_comment() 
		{
		  $data=array(
						'comment_at'=>$this->input->post('comment_at'),
						'name'=>$this->input->post('name'),
						'email'=>$this->input->post('email'),
						'comment'=>$this->input->post('comment')
					 );
		   $id=$this->input->post('id');
		   $this->Blog_Model->update_comment($data,$id); 
		   $this->session->set_flashdata('alert', array('message' => 'Comment Update Successfully','class' => 'success'));
		   redirect('comment-list');
	    }
		
	
		function edit_post($id) 
		{
				$content['get_related_post']=$this->Blog_Model->get_related_post();
				$content['get_category']=$this->Blog_Model->get_category();
				$content['get_edit_post']=$this->Blog_Model->get_edit_post($id);
                $content['subview']="blog/edit_blog";
				$this->load->view('layout', $content);			  
		}	
		

		function update_post() {
			  $id=$this->uri->segment(3); 
			if($_FILES['uploadedimages']['error'][0]>0){
		
			 $image_name=$this->input->post('prev_image');
		
		    }else{
				
			$image_name=$this->Blog_Model->blog_thumbnail_upload();
			}

			 if($_POST)
			  {
			  $posted = trim((string) $this->input->post('posted'));
			  if ($posted === '') { $posted = 'Admin'; }
			  $data=array(
			 'post_title'=>$this->input->post('post_title'),
			 'Permalink'=>$this->input->post('category_title'),
			 'summernote'=>$this->input->post('summernote'),
			 'status'=>$this->input->post('status'),
			 'tag'=>$this->input->post('tag'),
			 'category'=>$this->input->post('category'),
			 'relatedposts'=>serialize($this->input->post('relatedposts')),
			 'blog_image'=>$image_name,
			 'posted'=>$posted,
			 );
			 
			 
			 
			   $this->Blog_Model->update_post($data,$id); 
			   $this->session->set_flashdata('alert', array('message' => 'Posts Blog Update Successfully','class' => 'success'));
			 redirect('blog');
			 }
	
			else{ 
		     redirect('blog/edit_post');
		    }
	 }		  
	function Comment_list()
    {
		        $this->db->select("*");
				$this->db->from('blog_comments');
				$this->db->order_by('id', 'desc');
				$query=$this->db->get();
				$content['reviews']=$query->result();
				$content['subview'] =  "blog/blog_comnt_list";
				$this->load->view('layout', $content);	
		
	}
	
	
	
	function Likers_list()
    {
		        $this->db->select("*");
				$this->db->from('like_comments');
				$this->db->order_by('id', 'desc');
				$query=$this->db->get();
				$content['reviews']=$query->result();
				$content['subview'] =  "blog/likers_list";
				$this->load->view('layout', $content);	
		
	        }
	
	
	 function delete_single_comment($id){
		      
			  $this->Blog_Model->delete_comment($id);
			  $this->session->set_flashdata('alert', array('message' => 'Row successfully deleted !','class' => 'success'));
			  redirect('Comment-list');

		}
		
	function delete_multiple_comment(){
		foreach ($_POST['checklist'] as $enqid){
			
				$this->Blog_Model->delete_comment($enqid);
			  }
			  $this->session->set_flashdata('alert', array('message' => 'Row successfully deleted !','class' => 'success'));
			  redirect('Comment-list');

		}
	public function change_status_comment()
	 {
		$status=$_POST['status'];	
		if($status=="Unpublish")
		{
		$a="publish";
		}
		else
		{
		$a="Unpublish";	
		}
		
		$data = array('status' =>$a);
		$this->db->where('id',$this->uri->segment(3));
		$this->db->update('blog_comments',$data);
		$this->session->set_flashdata('alert', array('message' => 'Status Successfully Changed !!!','class' => 'success'));
		redirect('Comment-list');
	

	}
//=========================FOR CLIENT REVIEW SECTION START HERE=========================================
	public function client_review()
	 {
				$content['get_review']=$this->Blog_Model->get_review();
		        $content['subview']="blog/client_review";
				$this->load->view('layout', $content);
		/* $status=$_POST['status'];	
		if($status=="Unpublish")
		{
		$a="publish";
		}
		else
		{
		$a="Unpublish";	
		}
		
		$data = array('status' =>$a);
		$this->db->where('id',$this->uri->segment(3));
		$this->db->update('blog_comments',$data);
		$this->session->set_flashdata('alert', array('message' => 'Status Successfully Changed !!!','class' => 'success'));
		redirect('Comment-list'); */
	

	}
	 function delete_single_review($id){
		    
			  $this->Blog_Model->delete_review($id);
			  $this->session->set_flashdata('alert', array('message' => 'Row successfully deleted !','class' => 'success'));
			  redirect('Client-Review');

		}
	function delete_all_review(){
		
		foreach ($_POST['checklist'] as $revid){
			
				$this->Blog_Model->delete_review($revid);
			  }
			  $this->session->set_flashdata('alert', array('message' => 'Row successfully deleted !','class' => 'success'));
			  redirect('Client-Review');

		}
	
	function Deactive_Active_Review(){
	
		
		  $aid=$this->uri->segment(3);  
          
		 if(!empty($aid))
		 {
			   $active_detais=$this->Blog_Model->fetch_active_review($aid);
			   $active_det=$active_detais[0]->publish_unpublish;
			   $statusd="unpublish";
			   $statuss="publish";
			   $datas=array('publish_unpublish'=>$statuss,);
			   $data=array('publish_unpublish'=>$statusd,);
			   if($active_det=='publish')
			   {
				   $this->db->where('id',$aid);
				   $this->db->update('client_reviews',$data);
				   redirect('Client-Review');
			   }
			  else{
				  $this->db->where('id',$aid);
				   $this->db->update('client_reviews',$datas);
				   redirect('Client-Review');
			  }
		 }	 
		
	}
//=========================FOR CLIENT REVIEW SECTION END HERE========================================= 
}	