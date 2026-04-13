               <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
                    <li><a href="<?php echo site_url('Categories/add_categories');?>">AddCategory</a></li>
                  <li class="active">AddCategory</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                   
                                                            
                                <div class="panel panel-default tabs">                            
                                    <!--<ul class="nav nav-tabs" role="tablist">
                                        <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Gentlemen Drycleaning Category </a></li>
                                        <li ><a href="#tab-second" role="tab" data-toggle="tab">Women DryCleaning Category </a></li>
                                        <li><a href="#tab-third" role="tab" data-toggle="tab">Kids Dry Cleaning Category</a></li>
                                        <li><a href="#tab-four" role="tab" data-toggle="tab">Household Drycleaning Category</a></li>
                                        <li><a href="#tab-five" id="button_active" role="tab" data-toggle="tab">Laundry</a></li>
                                    </ul>-->
                                    <div class="panel-body tab-content">
                                        
                                <div class="tab-pane active" id="tab-first">
					           <br/>
                                  <form id="cat_home" class="form-horizontal" method="post" 
                                  action="<?php echo site_url("Categories/add_categories"); ?>" enctype="multipart/form-data">         
                                          
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Category Name </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="cat_name" class="form-control"  data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                                                        
                                                                        
                                      <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Category Description</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="cat_desc" class="form-control"  data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>


                                    <!--<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">SuperCategory List</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="sup_cat" >
                                              <option value="0" >Select an Option</option>
                                             <?php if($sup_cat_list){
                                                 foreach($sup_cat_list as $key=>$list){
                                                echo '<option value="'.$list->super_catid.'">'.$list->supercat_name.'</option>';
                                             } }?>

                                            
                                              
                                            </select>
                                            
                                            <span class="help-block">This is required Select box</span>
                                        </div>
                                    </div>-->
                                          

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
                                        <label class="col-md-3 col-xs-12 control-label"> Meta Description</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="meta_desc" class="form-control"  data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>




                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Upload  Image</label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="uploadedimages[]"  title="Browse file" required />         
                                          <span class="help-block" id="image_size" ></span>
                                           <span class="help-block">This is required to upload Category Images</span>
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
                                        <button type="button" class="btn btn-default" onclick="document.getElementById('cat_home').reset();">Clear Form</button>

                                        <button  type="submit" class="btn btn-primary pull-right" id=""   >Save <span class="fa fa-floppy-o fa-right"></span></button>
                             </div>
                                      </form>
				   
                             </div>
										
                                        
										
                                  										
				                
                                        
                                        
                                        
                                        
										
										
                                    </div>
<!--                                    <div class="panel-footer">      
                                        <button type="button" class="btn btn-default" onclick="document.getElementById('add_hotel').reset();">Clear Form</button>

                                        <button  type="submit" class="btn btn-primary pull-right" id="postcheak_addhotel"   disabled>Save <span class="fa fa-floppy-o fa-right"></span></button>
                                    </div>-->
                            
                            
                            
                        </div>
                    </div>                    
                    
                </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->  
<script>
$("#button_active").click(function(){
$("#postcheak_addhotel").prop('disabled', false);
});

</script>