<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
	<li><a href="<?php echo site_url('Client_review/edit_data');?>">Edit Content</a></li>
	<li class="active">Edit Content</li>
</ul>
<!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
							  <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Edit Content</h3>
									<div class="btn-group pull-right" style="margin-right: 2%;">
									 <a href="<?php echo site_url('Client_review');?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i>Client Message List</button></a>
								   </div>
                                </div>
                                <div class="panel-body">  
								<?php
								$homepage_content=$content_edit[0];
								//printarray($homepage_content_edit);
								?>
                               <form id="testimonial_home" class="form-horizontal"  method="post" action="<?php echo site_url("Client_review/update_data/"); ?>"  enctype="multipart/form-data">								
                                    
									<input type="hidden" name="con_id" value="<?php echo $homepage_content->id; ?>" />
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Client Name</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="name" class="form-control" 
                                                value="<?php echo $homepage_content->client_name; ?>" />
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Client Message</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea name="message" class="form-control" ><?php echo 
                                                $homepage_content->client_message; ?></textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                   
                                   
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">status</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="status" id="status">
											  <option value="active" <?php if($homepage_content->status=="active"){echo "selected";} ?>>Active</option>
											  <option value="inactivate" <?php if($homepage_content->status=="inactivate"){echo "selected";} ?>>Inactivate</option>
											  
                                            </select>
											
                                            <span class="help-block">This is required Select box</span>
                                        </div>
                                    </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-default" onclick="document.getElementById('testimonial_home').reset();">Clear Form</button>                                    
									<button type="submit" class="btn btn-primary pull-right">Save Changes <span class="fa fa-floppy-o fa-right"></span></button>
                                </div>
							 </form>
					      </div>
					  </div>
				  </div>                    
			    </div>
			 </div>
                <!-- END PAGE CONTENT WRAPPER --> 