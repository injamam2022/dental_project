<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
	<li><a href="<?php echo site_url('Custompagecontent/edit_data');?>">Edit Custom Page Content</a></li>
	<li class="active">Edit Opening </li>
</ul>
<!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
							  <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Edit Opening</h3>
									<div class="btn-group pull-right" style="margin-right: 2%;">
									 <a href="<?php echo site_url('Custompagecontent');?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i>Opening List</button></a>
								   </div>
                                </div>
                                <div class="panel-body">  
								<?php
								$homepage_content=$custompage_content_edit[0];
								//printarray($homepage_content_edit);
								?>
                               <form id="testimonial_home" class="form-horizontal"  method="post" action="<?php echo site_url("Custompagecontent/update_data/"); ?>"  enctype="multipart/form-data">								
                                    
									<input type="hidden" name="con_id" value="<?php echo $homepage_content->id; ?>" />
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Opening Title</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="top_title" class="form-control" 
                                                value="<?php echo $homepage_content->top_title; ?>" />
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Opening Description</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea name="top_description" class="form-control" ><?php echo 
                                                $homepage_content->top_description; ?></textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                      <!--<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">List</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea name="list" class="form-control" ><?php echo 
                                                $homepage_content->list; ?></textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Middle Title</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="middle_title" class="form-control" 
                                                value="<?php echo $homepage_content->middle_title; ?>" />
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Middle Description</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea name="middle_description" class="form-control" ><?php echo 
                                                $homepage_content->middle_description; ?></textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Upload  Image</label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="uploadedimages[]"  id="category_thumb" title="Browse file"  />         
                                          <span class="help-block" id="image_size" ></span>
                                           <span class="help-block">This is required to upload Images</span>
                                         <img src="<?php echo site_url('webroot/uploads/custom/'. $homepage_content->middle_image);?>" alt="Smiley face" height="50" width="50"/>
                                            <input type="hidden" name="prev_image" value="<?php echo $homepage_content->middle_image; ?>"/>
                                        </div>
                                    </div>
                                       
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Content Near Client</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea  name="content_near_client" class="form-control" ><?php echo $homepage_content->content_near_client; ?></textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>-->
                                       
                                   
                                   
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