<?php
    $type = isset($type) ? $type : 1;
    $banners=$banner_edit[0];
?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
<!--	<li><a href="<?php echo site_url('banner/').base64_encode('edit-banner').'/'.EncryptID($type).'/'.EncryptID($banners->id);?>">Edit Banner</a></li>-->
	<li class="active">Edit Banner</li>
</ul>
<!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
							  <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Edit Banner</h3>
									<div class="btn-group pull-right" style="margin-right: 2%;">
									 <a href="<?php echo site_url('banner/').base64_encode('list').'/'.EncryptID($type);?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i> Banner List</button></a>
								   </div>
                                </div>
                                <div class="panel-body">  
								
                               <form id="banner_home" class="form-horizontal"  method="post" action="<?php echo site_url("banner/").base64_encode('update_banner').'/'.EncryptID($type); ?>"  enctype="multipart/form-data">								
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label"> Title On Banner</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                             
                                                
                                                <textarea type="text" name="image_seo_title" class="form-control ckeditor" >
                                                <?php echo $banners->image_seo_title?>
                                                </textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
									<input type="hidden" name="banner_id" value="<?php echo $banners->id; ?>" />
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Small Content On Banner</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                              
                                                
                                                <textarea type="text" name="image_url_link" class="form-control ckeditor" >
                                                <?php echo $banners->image_url_link?>
                                                </textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
									
           <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Image category</label>
                <div class="col-md-6 col-xs-12">
                    <select class="form-control " name="type" id="type">
                      <option value="1" <?php if($banners->type== 1){echo "selected";} ?>>Home Page</option>
                      <option value="2" <?php if($banners->type== 2){echo "selected";} ?>>About Us</option>
                      <option value="3" <?php if($banners->type== 3){echo "selected";} ?>>Product & Services </option>
                      <option value="4" <?php if($banners->type== 4){echo "selected";} ?>>Partner </option>
                      <option value="5" <?php if($banners->type== 5){echo "selected";} ?>>Blog </option>
                      <option value="6" <?php if($banners->type== 6){echo "selected";} ?>>Contact </option>
                      <option value="7" <?php if($banners->type== 7){echo "selected";} ?>>Service Details </option>
                      <option value="8" <?php if($banners->type== 8){echo "selected";} ?>>Blog Details </option>
                      <option value="9" <?php if($banners->type== 9){echo "selected";} ?>>Gallery </option>
                      <option value="10" <?php if($banners->type== 10){echo "selected";} ?>>Career</option>
                      <option value="11" <?php if($banners->type== 11){echo "selected";} ?>>Why Choose Us</option>
                      <!--<option value="hotel_search_bg" <?php if($banners->image_category=="hotel_search_bg"){echo "selected";} ?>>Hotel search bg </option>
                      <option value="bus_search_bg" <?php if($banners->image_category=="bus_search_bg"){echo "selected";} ?>>Bus search bg</option>
                      <option value="car_serach_bg" <?php if($banners->image_category=="car_serach_bg"){echo "selected";} ?>>Car search bg</option>
                      <option value="flight_page_slider" <?php if($banners->image_category=="flight_page_slider"){echo "selected";} ?>>Flight page slider</option>
                      <option value="hotel_page_slider" <?php if($banners->image_category=="hotel_page_slider"){echo "selected";} ?>>Hotel page slider</option>
                      <option value="car_page_slider" <?php if($banners->image_category=="car_page_slider"){echo "selected";} ?>>Car page slider</option>
                      <option value="bus_page_slider" <?php if($banners->image_category=="bus_page_slider"){echo "selected";} ?>>Bus page slider</option>-->
                    </select>

                    <span class="help-block" >This is required Select box</span>
                </div>
            </div>
									
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