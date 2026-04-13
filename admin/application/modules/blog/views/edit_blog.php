<script>
selector: 'textarea',  // change this value according to your HTML
  relative_urls : true,
remove_script_host : false,
convert_urls : false,

</script>
<!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
                    <li><a href="<?php echo site_url('add-page');?>">Blog Management</a></li>
                    <li class="active"> Edit Blog</li>
                </ul>
                <!-- END BREADCRUMB -->

            <div class="page-content-wrap">
                <div class="row">
                    <div class="col-md-12">
					<?php  foreach ($get_edit_post as $data){ 
					?>
                        <form id="add_page"class="form-horizontal" method="post" action="<?php echo site_url("blog/update_post");?>/<?php echo $data->id;?>" enctype="multipart/form-data" >
                            <div class="panel panel-default">
							    <div class="row">
									<?php $log_s= $this->session->flashdata('msg'); ?>
								   <?php if(!empty($log_s))
									{
									?>
								    <div class="alert alert-success alert-dismissable">
										<i class="fa fa-check"></i>
										<?php echo $this->session->flashdata('msg');?>
							        </div>
							      <?php } ?>
                                </div>
                                <div class="panel-heading">
                                <h3 class="panel-title"><strong>Edit Blog</h3>
                                </div>
                               <p style="margin:7px;"> 
									<a class="btn btn-primary pull-right" style="color:white;" href="<?php echo site_url('Blog');?>">
										<i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back (Blog List)
									</a>
                               </p>
                                <div class="panel-body">
                                    <div class="form-group">                                        
                                        <div class="col-md-12 col-xs-12">
											<div class="col-md-6 col-xs-12">
											 <label>Post Title</label>
												<div class="input-group">
													<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
													<input type="text" name="post_title" placeholder="Enter Post Title"  value="<?php echo $data->post_title; ?>"  onblur="slug_url(this.value,'category_title')" class="form-control" required />
												</div>            
											</div>
											<?php //printarray($data);?>
											<div class="form-group">
												<div class="col-md-5 col-xs-12">
												 <label>Permalink : <?php echo base_url();?>blog/</label>
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
														<input type="text" name="category_title" id="category_title" value="<?php echo $data->Permalink; ?>"  class="form-control" required />
													</div>                                            
												</div>
                                            </div>
                                        </div>
									 </div>	
									 <div class="col-md-12">
										 <div class="form-group">
										   <div class="input-group">
											 <label lass="col-md-3 col-xs-12 control-label">Description</label>
											 <textarea name="summernote" class="" rows="10" cols="100"><?php echo $data->summernote; ?></textarea> 
											 </div><br><br>
										  </div>
									</div>
									<div class="col-md-10 col-xs-12">
											 <label>Post Tag</label>
												<div class="input-group">
													<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
													<input type="text" name="tag" value="<?php echo $data->tag; ?>" placeholder="Enter Post Tag" class="form-control" required />
												</div> <br><br>           
											</div>
										<div class="panel-heading">Post Settings</div>
                                        <div class="col-md-12 col-xs-12">
											<div class="col-md-4 col-xs-12"><br><br>
											 <label>Status</label>
												<select class="form-control type select" name="status" id="status"><?php $trr=$data->status;?>
												<option <?php if($trr=='Yes'){ echo "selected";} ?>   value="Yes">Enable</option>
												<option  <?php if($trr=='No'){ echo "selected";} ?> value="No">Disable</option>
											  </select>         
											</div>
											
											<!--<div class="col-md-4 col-xs-12"><br><br>
												<label>Category</label>
												 <select data-placeholder="Select" name="category" class="form-control select" tabindex="2" required>
											      <option value="">Select</option>
											      <?php foreach($get_category as $cat){ ?>
												  <option value="<?php echo $cat->id;?>" <?php if($data->category == $cat->id){ echo "selected";}?>> <?php echo $cat->name;?> 
												  </option>
											       <?php } ?>
												</select>           
											</div>-->
											<div class="col-md-4 col-xs-12"><br><br>
											 <label>Posted By</label>
												<select class="form-control type select" name="posted" >
												<option value="Admin">Admin</option>
											  </select>         
											</div>
											<!--<div class="col-md-4 col-xs-12"><br><br>
											 <label>Related Post</label>
											  
											  
												<select multiple class="form-control select" name="relatedposts[]">
												
												
												 <?php  $catid= unserialize($data->relatedposts);?>
													<?php foreach($get_related_post as $related_post){ ?>
												 <option value="<?php echo $id=$related_post->id;?>" 
												 <?php if (in_array($related_post->id,$catid)){ echo "selected"; } ?> > <?php echo $related_post->post_title; ?> </option>
											   <?php }
																						
													 ?>
												</select>        
											</div>-->
											<div class="col-md-8 col-xs-12">
											  <div class="col-md-6"><br><br>
											  <label>Image</label>
												  <div class="form-group ">
													  <input type="file" class="fileinput btn-primary" name="uploadedimages[]" multiple id="category_thumb" title="Browse file" /><br><br>
													  <img src="<?php echo site_url('webroot/uploads/blog').'/'.$data->blog_image;?>" alt="Smiley face" height="250" width="300">
										    <input type="hidden" name="prev_image" value="<?php echo $data->blog_image; ?>"/>
												  </div><br><br>
												</div>       
											</div>
                                    </div>
								 </div>	
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-primary" onclick="document.getElementById('add_page').reset();">Clear Form</button>                                    
                                    <button class="btn btn-primary pull-right" type="submit">Submit</button>
                                </div>
                              </div>
						  </div>
                        </form>
					<?php } ?>
                    </div>  
				</div>                    
            </div>
                <!-- END PAGE CONTENT WRAPPER -->  
<script>
function page_order_id(gettid){
	//alert(getid);
    var our= document.getElementById('page_grouo').value;
    //alert(our);
  $.ajax({		
		type: 'post',
		url: '<?php echo site_url();?>Page/c_order_id_cheak/'+gettid+'/'+our,
		success: function(data){
			alert(data);
			if(data=='true'){
				$('#cat_order_mess').html("This is required textarea field");	
			$('#cat_order_mess').css({"color":"#AAB2BD"});	
			
			}else{
			$('#cat_order_mess').html("Category order Allready exists !!!");
			$('#cat_order_mess').css({"color":"red"});
			}
	
		}
		
	});	
}
	   
</script>