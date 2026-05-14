<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="<?php echo site_url();?>">Home</a></li>
	<li><a href="<?php echo site_url('Carrerpagecontent');?>">Career Content</a></li>
</ul>


<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>About Content</h3>
									<div class="btn-group pull-right" style="margin-right: 2%;">
									 <a href="<?php echo site_url('Carrerpagecontent');?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i> List</button></a>
								   </div>
                                </div>
                                <div class="panel-body">  
                                   <form id="contentmanagement_home" class="form-horizontal"  method="post" action="<?php echo site_url("Carrerpagecontent/update_data"); ?>"  enctype="multipart/form-data">					
                                       
                                    <input type="hidden" name="carrer_id" value="<?php echo $Carrerpagecontent_fatch[0]->carrer_id; ?>">
                                       
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Section Below Banner About Us</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea type="text" name="carrer_content" class="form-control ckeditor">
                                                <?php echo $Carrerpagecontent_fatch[0]->carrer_content;?>
                                                </textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                       
                                       
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Image Upload About Us</label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="first_uploadedimages[]"  title="Browse file" />	
										  <span class="help-block" id="image_size" ></span>
                                           <span class="help-block"></span>
                                            <img src="<?php echo site_url('webroot/uploads/carrer/'.$Carrerpagecontent_fatch[0]->carrer_image);?>" alt="Smiley face" height="50" width="50"/>
                                        </div>
                                    </div>
                                    <input type="hidden" name="first_prev_image" value="<?php echo $Carrerpagecontent_fatch[0]->carrer_image;?>">   
                                       
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
