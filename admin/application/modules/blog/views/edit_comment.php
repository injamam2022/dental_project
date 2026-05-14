<!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
                    <li><a href="<?php echo site_url('blog');?>">Blog Management</a></li>
                    <li class="active"> Edit Blog</li>
                </ul>
                <!-- END BREADCRUMB -->

            <div class="page-content-wrap">
                <div class="row">
                    <div class="col-md-12">
					<?php  foreach ($get_edit_comment as $data){ 
					?>
                        <form id="add_page"class="form-horizontal" method="post" action="<?php echo site_url("blog/update_comment");?>" enctype="multipart/form-data" >
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
                                <h3 class="panel-title"><strong>Edit Comment</h3>
                                </div>
                               <p style="margin:7px;"> 
									<a class="btn btn-primary pull-right" style="color:white;" href="<?php echo site_url('Blog');?>">
										<i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back (Blog List)
									</a>
                               </p>
                                <div class="panel-body">
                                    <div class="form-group">                                        
                                        <div class="col-md-12 col-xs-12">
											<div class="col-md-4 col-xs-12">
											 <label>Name</label>
												<div class="input-group">
													<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
													<input type="text" name="name" placeholder="Enter Post Title"  value="<?php echo $data->name; ?>" class="form-control" required />
												</div>            
											</div>
											
										 
                                        </div>
									 </div>	
									 
									  <div class="form-group">                                        
                                        <div class="col-md-12 col-xs-12">
											<div class="col-md-4 col-xs-12">
											 <label>Email</label>
												<div class="input-group">
													<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
													<input type="text" name="email" placeholder="Enter Post Title"  value="<?php echo $data->email; ?>" class="form-control" required />
												</div>            
											</div>
											
										 </div>
									 </div>	
									 
									 
									 <div class="col-md-12">
										 <div class="form-group">
										   <div class="input-group">
											 <label lass="col-md-3 col-xs-12 control-label">Comment</label>
											 <textarea name="comment" class="summernote"><?php echo $data->comment; ?></textarea> 
											 </div><br><br>
										  </div>
									</div>
									 
									 
									 
									  <div class="form-group">                                        
                                        <div class="col-md-12 col-xs-12">
											<div class="col-md-4 col-xs-12">
											 <label>Comment on</label>
												<div class="input-group">
													<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
													<input type="text" name="comment_at"  value="<?php echo $data->comment_at; ?>" class="form-control" required />
												</div>            
											</div>
											
										 </div>
									 </div>	
									 
									 
									 
									 
									
									
								 </div>	
                                <d 	iv class="panel-footer">
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