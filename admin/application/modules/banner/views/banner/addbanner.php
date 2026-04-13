<?php $type = isset($type) ? $type : 1; ?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="<?php echo site_url();?>">Home</a></li>
	<li><a href="<?php echo site_url('banner/').base64_encode("add_banner")."/".EncryptID($type);?>">Add Banner</a></li>
</ul>
<!-- END BREADCRUMB -->
<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Add Banner</h3>
									<div class="btn-group pull-right" style="margin-right: 2%;">
									 <a href="<?php echo site_url('banner/').base64_encode('list').'/'.EncryptID($type);?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i> Banner List</button></a>
								   </div>
                                </div>
                                <div class="panel-body">  
                                   <form id="banner_home" class="form-horizontal"  method="post" action="<?php echo site_url("banner/").base64_encode("add_banner")."/".EncryptID($type); ?>"  enctype="multipart/form-data">								
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Title On Banner</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea type="text" name="image_seo_title" class="form-control ckeditor" >
                                                </textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Small Content On Banner</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
<!--                                                <input type="text" name="image_url_link" class="form-control" />-->
                                                 <textarea type="text" name="image_url_link" class="form-control ckeditor" >
                                                </textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
									
								   <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Image category</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="type" >
											  <option value="1" selected>Home Page</option>
											  <option value="2">About Us</option>
											  <option value="3">Product & Services </option>
											  <option value="4">Partner</option>
											  <option value="5">Blog</option>
											  <option value="6">Contact</option>
											  <option value="7">Service Details</option>
											  <option value="8">Blog Details</option>
											  <option value="9">Gallery</option>
											  <option value="10">Career</option>
											  <option value="11">Why Choose Us</option>
											  <!--<option value="hotel_search_bg">Hotel search bg </option>-->
											 
                                            </select>
											
                                            <span class="help-block">This is required Select box</span>
                                        </div>
                                    </div>
									
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Upload  Image</label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="uploadedimages[]"  title="Browse file" required />			
										  <span class="help-block" id="image_size" ></span>
                                           <span class="help-block">This is required to upload Banner Images</span>
                                        </div>
                                    </div>
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
