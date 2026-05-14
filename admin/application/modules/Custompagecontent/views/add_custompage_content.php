<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="<?php echo site_url();?>">Home</a></li>
	<li><a href="<?php echo site_url('Custompagecontent/add_data_custom');?>">Add Custompage Content</a></li>
</ul>
<!-- END BREADCRUMB -->
<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Add Custompage Content</h3>
									<div class="btn-group pull-right" style="margin-right: 2%;">
									 <a href="<?php echo site_url('Custompagecontent');?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i> Custompage List</button></a>
								   </div>
                                </div>
                                <div class="panel-body">  
                                   <form id="contentmanagement_home" class="form-horizontal"  method="post" action="<?php echo site_url("Custompagecontent/add_data_custom"); ?>"  enctype="multipart/form-data">								
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Opening Title</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="top_title" class="form-control" />
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Opening Description</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea name="top_description" class="form-control" ></textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>

                                      <!--<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">List</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea name="list" class="form-control" ></textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                     <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Middle Title</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="middle_title" class="form-control" />
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Middle Description</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea name="middle_description" class="form-control" ></textarea>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
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
                                        <label class="col-md-3 col-xs-12 control-label">Content Near Client</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea name="content_near_client" class="form-control" ></textarea>
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
