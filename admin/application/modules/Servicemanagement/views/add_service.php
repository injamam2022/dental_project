               <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
                    <li><a href="<?php echo site_url('Servicemanagement/add_services');?>">Services</a></li>
                  <li class="active">AddServices</li>
                </ul>
                <!-- END BREADCRUMB -->
                   <input type="hidden" id="base_url" value="<?php echo base_url();?>">
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
				        <br/>
                            <form id="cat_home" class="form-horizontal" method="post" 
                                  action="<?php echo site_url("Servicemanagement/add_services"); ?>" enctype="multipart/form-data"> 
                                     
                                    
                                  <!--  <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Add-SUB-Category</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control" name="pro_sub_cat_id" id="pro_sub_cat_id" onchange="subcat()">
                                              <option value="0" >Select an Option</option>
                                             <?php if($sub_cat_list){
                                                 foreach($sub_cat_list as $key=>$list){
                                                echo '<option value="'.$list->sub_catid.','.$list->subcat_name.'">'.$list->subcat_name.'</option>';
                                             } }?>

                                            
                                            </select>
                                            
                                            <span class="help-block">This is required Select box</span>
                                        </div>
                                    </div>-->
                                 <!-- <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Add Category</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control" name="cat_id" id="cat_id" >
                                              <option selected disabled value="0">Select Category</option>
                                            
                                            </select>
                                            
                                            <span class="help-block">This is required Select box</span>
                                        </div>
                                    </div> -->
                                      
                                  <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Service Name </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="product_name" class="form-control"  data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                                                        
                                                                        
                                      <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Service Description</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea type="text" name="product_description" class="form-control "  data-validation="required"> </textarea>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                          
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Service Provided </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                               <!-- <input type="text" name="product_code" class="form-control "  data-validation="required"/>-->
                                                <textarea type="text" name="product_code" class="form-control "  data-validation="required"> </textarea>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                     </div>
                                      
<!--
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Domain</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="domain" class="form-control"  data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                     </div>-->

                                       <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Type </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="type" class="form-control"  data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                     </div>
                                      
                                    <!-- <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Citation  </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="citation" class="form-control"  data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                     </div>-->
                                      
                                   <!-- <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Number Of Words  </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="no_of_words" class="form-control"  data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                     </div>-->
                                      
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                       Starting Price Of Service  </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="price_of_doc" class="form-control"  data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                     </div>
                                      
                                      <!--<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Discounts Needed  </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="discount_apply" class="form-control"  />
                                            </div>                                            
                                             <span class="help-block">This is required text field</span>
                                        </div>
                                     </div>
                                      -->
                                      
                                      
                                      
                                   

                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Meta Tag</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="meta_tag" class="form-control"  data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                      
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Meta Title</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="meta_title" class="form-control"  data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                      
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Page Title</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="page_title" class="form-control"  data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Meta Description</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="meta_description" class="form-control"  data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>


                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Upload  Image</label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="uploadedimages[]"  title="Browse file" required multiple/>         
                                          <span class="help-block" id="image_size" ></span>
                                           <span class="help-block">This is required to upload Product Images</span>
                                        </div>
                                    </div>

                                    <!--<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Upload  Icon</label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="icon"  title="Browse file" required multiple/>         
                                          <span class="help-block" id="image_size" ></span>
                                           <span class="help-block">This is required to upload Product Images</span>
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
                                        <button type="button" class="btn btn-default" onclick="document.getElementById('cat_home').reset();">Clear Form</button>

                                        <button  type="submit" class="btn btn-primary pull-right" id=""   >Save <span class="fa fa-floppy-o fa-right"></span></button>
                             </div>
                        </form>
				   
                </div> 
           </div>
      </div>
                <!-- END PAGE CONTENT WRAPPER -->  
<script>
$("#button_active").click(function(){
$("#postcheak_addhotel").prop('disabled', false);
});

</script>