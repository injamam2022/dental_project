<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
	<li><a href="<?php echo site_url('edit-banner/');?>">Edit Gallery Image</a></li>
	<li class="active">Edit Banner</li>
</ul>
<!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
							  <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Edit Gallery Image</h3>
									<div class="btn-group pull-right" style="margin-right: 2%;">
									 <a href="<?php echo site_url('gallery');?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i> Gallery List</button></a>
								   </div>
                                </div>
                                <div class="panel-body">  
								<?php
								$banners=$banner_edit[0];
								
								?>
                               <form id="banner_home" class="form-horizontal"  method="post" action="<?php echo site_url("gallery/update_banner/"); ?>"  enctype="multipart/form-data">								
                                    <!--<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Image seo title</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="image_seo_title" class="form-control" value="<?php echo $banners->image_seo_title?>" />
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>-->
                                   
                                   <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Youtube url link</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                               
                                                 <input type="text" name="youtube_url_link" class="form-control" value="<?php echo $banners->youtube_url_link?>" />
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                   
                                   
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Category</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="image_category" >
											 <!-- <option value="1">Youtube</option>
											  <option value="2">Image</option>-->
                                                
                                                <option value="1" <?php if($banners->image_category=="1"){echo "selected";} ?>>Youtube</option>
											  <option value="2" <?php if($banners->image_category=="2"){echo "selected";} ?>>Image</option>
                                            </select>
											
                                            <span class="help-block">This is required Select box</span>
                                        </div>
                                    </div>
									<input type="hidden" name="banner_id" value="<?php echo $banners->id; ?>" />

<!--								   <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Image category</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="image_category" id="image_category">
											  <option value="home_slider" <?php if($banners->image_category=="home_slider"){echo "selected";} ?>>Home Page slider</option>
											  
                                            </select>
											
                                            <span class="help-block" >This is required Select box</span>
                                        </div>
                                    </div>-->
									
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Upload  Image</label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="uploadedimages[]"  id="category_thumb" title="Browse file"  />			
										  <span class="help-block" id="image_size" ></span>
                                           <span class="help-block">This is required to upload Banner Images</span>
										 <img src="<?php echo site_url('webroot/uploads/banner/'.$banners->image_name);?>" alt="Smiley face" height="50" width="50"/>
										    <input type="hidden" name="prev_image" value="<?php echo $banners->image_name; ?>"/>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">status</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="status" id="status">
											  <option value="active" <?php if($banners->status=="active"){echo "selected";} ?>>Active</option>
											  <option value="inactivate" <?php if($banners->status=="inactivate"){echo "selected";} ?>>Inactivate</option>
											  
                                            </select>
											
                                            <span class="help-block">This is required Select box</span>
                                        </div>
                                    </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-default" onclick="document.getElementById('banner_home').reset();">Clear Form</button>                                    
									<button type="submit" class="btn btn-primary pull-right">Save Changes <span class="fa fa-floppy-o fa-right"></span></button>
                                </div>
							 </form>
					      </div>
					  </div>
				  </div>                    
			    </div>
			 </div>
                <!-- END PAGE CONTENT WRAPPER --> 