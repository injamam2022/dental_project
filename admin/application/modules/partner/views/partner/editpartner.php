<?php
    $partner=$partner_edit[0];
?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
<!--	<li><a href="<?php echo site_url('partner/').base64_encode('edit-partner').'/'.EncryptID($type).'/'.EncryptID($partner->id);?>">Edit Partner</a></li>-->
	<li class="active">Edit Partner</li>
</ul>
<!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
							  <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Edit Partner</h3>
									<div class="btn-group pull-right" style="margin-right: 2%;">
									 <a href="<?php echo site_url('partner/').base64_encode('list').'/'.EncryptID($type);?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i> Partner List</button></a>
								   </div>
                                </div>
                                <div class="panel-body">  
								
                               <form id="partner_home" class="form-horizontal"  method="post" action="<?php echo site_url("partner/").base64_encode('update_partner').'/'.EncryptID($type); ?>"  enctype="multipart/form-data">								
									<input type="hidden" name="partner_id" value="<?php echo $partner->id; ?>" />
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Upload  Image</label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="uploadedimages[]"  id="category_thumb" title="Browse file"  />			
										  <span class="help-block" id="image_size" ></span>
                                           <span class="help-block">This is required to upload Partner Images</span>
										 <img src="<?php echo site_url('webroot/uploads/partner/'.$partner->image_name);?>" alt="Smiley face" height="50" width="50"/>
										    <input type="hidden" name="prev_image" value="<?php echo $partner->image_name; ?>"/>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">status</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="status" id="status">
											  <option value="active" <?php if($partner->status=="active"){echo "selected";} ?>>Active</option>
											  <option value="inactivate" <?php if($partner->status=="inactivate"){echo "selected";} ?>>Inactivate</option>
											  
                                            </select>
											
                                            <span class="help-block">This is required Select box</span>
                                        </div>
                                    </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-default" onclick="document.getElementById('partner_home').reset();">Clear Form</button>                                    
									<button type="submit" class="btn btn-primary pull-right">Save Changes <span class="fa fa-floppy-o fa-right"></span></button>
                                </div>
							 </form>
					      </div>
					  </div>
				  </div>                    
			    </div>
			 </div>
                <!-- END PAGE CONTENT WRAPPER --> 