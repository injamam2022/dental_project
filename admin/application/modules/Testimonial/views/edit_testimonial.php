<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
	<li><a href="<?php echo site_url('Testimonial/edit_testimonial');?>">Edit Testimonial</a></li>
	<li class="active">Edit Testimonial</li>
</ul>
<!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
							  <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Edit Testimonial</h3>
									<div class="btn-group pull-right" style="margin-right: 2%;">
									 <a href="<?php echo site_url('Testimonial');?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i> Testimonial List</button></a>
								   </div>
                                </div>
                                <div class="panel-body">  
								<?php
								$testimonials=$testimonial_edit[0];
								
								?>
                               <form id="testimonial_home" class="form-horizontal"  method="post" action="<?php echo site_url("Testimonial/update_testimonial/"); ?>"  enctype="multipart/form-data">								
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Testimonial title</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="title" class="form-control" value="<?php echo $testimonials->test_title?>" />
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
									<input type="hidden" name="testimonial_id" value="<?php echo $testimonials->tes_id; ?>" />
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Description</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea type="text" name="des" class="form-control" > <?php echo $testimonials->tes_description?></textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Star Rating(Out of 5 in number)</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                               
                                                <input type="text" name="rating" class="form-control" value="<?php echo $testimonials->rating?>" />
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                   
                                   <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Client Name</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                               
                                                <input type="text" name="client_name" class="form-control" value="<?php echo $testimonials->client_name?>" />
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
										 <img src="<?php echo site_url('webroot/uploads/testimonial/'.$testimonials->image_name);?>" alt="Smiley face" height="50" width="50"/>
										    <input type="hidden" name="prev_image" value="<?php echo $testimonials->image_name; ?>"/>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">status</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="status" id="status">
											  <option value="active" <?php if($testimonials->status=="active"){echo "selected";} ?>>Active</option>
											  <option value="inactivate" <?php if($testimonials->status=="inactivate"){echo "selected";} ?>>Inactivate</option>
											  
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