<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="<?php echo site_url();?>">Home</a></li>
	<li><a href="<?php echo site_url('Testimonial/add_testimonial');?>">Add Testimonial</a></li>
</ul>
<!-- END BREADCRUMB -->
<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Add Testimonial</h3>
									<div class="btn-group pull-right" style="margin-right: 2%;">
									 <a href="<?php echo site_url('Testimonial');?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i> Testimonial List</button></a>
								   </div>
                                </div>
                                <div class="panel-body">  
                                   <form id="testimonial_home" class="form-horizontal"  method="post" action="<?php echo site_url("Testimonial/add_testimonial"); ?>"  enctype="multipart/form-data">								
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Testimonial title</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="title" class="form-control" />
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Description</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea type="text" name="des" class="form-control" ></textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Star Rating(Out of 5 in number)</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="rating" class="form-control" />
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                       
                                     <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Client Name</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="client_name" class="form-control" />
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
									
								   <!--<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Image category</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="image_category" >
											  <option value="home_slider">Home slider</option>
											  <option value="home_slider_bg_img">Home slider bg img</option>
											  <option value="flight_search_bg">Flight search bg </option>
											  <option value="hotel_search_bg">Hotel search bg </option>
											  <option value="bus_search_bg">Bus search bg</option>
											  <option value="car_serach_bg">Car search bg</option>
											  <option value="flight_page_slider">Flight page slider</option>
											  <option value="hotel_page_slider">Hotel page slider</option>
											  <option value="car_page_slider">Car page slider</option>
											  <option value="bus_page_slider">Bus page slider</option>
                                            </select>
											
                                            <span class="help-block">This is required Select box</span>
                                        </div>
                                    </div>-->
									
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
