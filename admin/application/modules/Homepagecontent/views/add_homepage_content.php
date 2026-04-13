<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="<?php echo site_url();?>">Home</a></li>
	<li><a href="<?php echo site_url('Homepagecontent/add_data');?>">Add Homepage Content</a></li>
</ul>
<!-- END BREADCRUMB -->

<?php
    $HomepageContent = unserialize($HomepageContent_fatch[0]->banner_description);
    //echo "<pre>";print_r($HomepageContent);die;
?>

<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Homepage Content</h3>
									<!--<div class="btn-group pull-right" style="margin-right: 2%;">
									 <a href="<?php echo site_url('Homepagecontent');?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i> Homepage List</button></a>
								   </div>-->
                                </div>
                                <div class="panel-body">  
                                   <form id="contentmanagement_home" class="form-horizontal"  method="post" action="<?php echo site_url("Homepagecontent/update_data"); ?>"  enctype="multipart/form-data">					
                                       
                                    <input type="hidden" name="homepageContent_id" value="<?php echo $HomepageContent_fatch[0]->id; ?>">
                                       
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Section Below Banner About Us</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea type="text" name="about_content" class="form-control ckeditor" >
                                                <?php echo $HomepageContent[0][0]; ?>
                                                </textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                       
                                       
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Image Upload About Us</label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="about_uploadedimages[]"  title="Browse file" />	
										  <span class="help-block" id="image_size" ></span>
                                           <span class="help-block">This is required to upload Banner Images</span>
                                            <img src="<?php echo site_url('webroot/uploads/home/'.$HomepageContent[0][1]);?>" alt="Smiley face" height="50" width="50"/>
                                        </div>
                                    </div>
                                    <input type="hidden" name="about_prev_image" value="<?php echo $HomepageContent[0][1]; ?>">   
                                       
                                       
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">  Mission </label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea type="text" name="mission_content" class="form-control ckeditor" >
                                                <?php echo $HomepageContent[1][0]; ?>
                                                </textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                       
                                       
                                     <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Mission Image Upload </label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="mission_uploadedimages[]"  title="Browse file" />			
										  <span class="help-block" id="image_size" ></span>
                                           <span class="help-block">This is required to upload Mission Images</span>
                                            <img src="<?php echo site_url('webroot/uploads/home/'.$HomepageContent[1][1]);?>" alt="Smiley face" height="50" width="50"/>
                                        </div>
                                    </div>
                                    <input type="hidden" name="mission_prev_image" value="<?php echo $HomepageContent[1][1]; ?>">     
                                       
                                       
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">  Vission </label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea type="text" name="vision_content" class="form-control ckeditor" >
                                                <?php echo $HomepageContent[2][0]; ?>
                                                </textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                       
                                       
                                     <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Vission Image Upload </label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="vision_uploadedimages[]"  title="Browse file" />			
										  <span class="help-block" id="image_size" ></span>
                                           <span class="help-block">This is required to upload Vission Images</span>
                                            <img src="<?php echo site_url('webroot/uploads/home/'.$HomepageContent[2][1]);?>" alt="Smiley face" height="50" width="50"/>
                                        </div>
                                    </div>
                                    <input type="hidden" name="vision_prev_image" value="<?php echo $HomepageContent[2][1]; ?>">     
                                       
                                       
                                    <!--<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Content Below Hand Made Love</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea type="text" name="content_above_handmade" class="form-control" ></textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                       
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Content Near Freelancer</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea type="text" name="content_near_feelancer" class="form-control" ></textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>-->
									
								   
									
									
                                       
                                       
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">status</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="status" >
											  <option value="active">Active</option>
											  <option value="inactivate">Inactivate</option>
                                            </select>
											
                                            <span class="help-block">This is required Select box</span>
                                        </div>
                                    </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-default" onclick="document.getElementById('contentmanagement_home').reset();">Clear Form</button>                                    
									<button type="submit" class="btn btn-primary pull-right">Save Changes <span class="fa fa-floppy-o fa-right"></span></button>
                                </div>
							 </form>	
                         </div>
                      </div>
                    </div>                    
                </div>				
</div>
                <!-- END PAGE CONTENT WRAPPER -->  
