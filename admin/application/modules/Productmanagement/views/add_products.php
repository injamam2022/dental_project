               <!-- START BREADCRUMB -->


                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
                    <li><a href="<?php echo site_url('Productmanagement/add_products');?>">Services</a></li>
                  <li class="active">Add service</li>
                </ul>
                <!-- END BREADCRUMB -->
                   <input type="hidden" id="base_url" value="<?php echo base_url();?>">
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
				        <br/>
                            <form id="cat_home" class="form-horizontal" method="post" 
                                  action="<?php echo site_url("Productmanagement/add_products"); ?>" enctype="multipart/form-data"> 
                                     
                                    
                                    
                                  <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Service category</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control" name="cat_id" id="cat_id" required>
                                                 <option selected disabled value="0">Select category</option>
                                                <?php for ($i=0;$i<count($categories);$i++){?>
                                                <option value="<?php echo $categories[$i]->cat_id;?>"><?php echo $categories[$i]->cat_name;?></option>
                                                <?php } ?>
                                            
                                            </select>
                                            
                                            <span class="help-block">Dental Services or Skin Care</span>
                                        </div>
                                    </div>
                                <input type="hidden" name="subcat_id" value="0" />
                                <input type="hidden" name="sub_subcat_id" value="0" />
								
								
								
								<!--<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Add Sub  Subcategory For Only Calibaration </label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control" name="product_sub_sub_catid" id="product_sub_sub_catid" >
                                                <option selected value="0">Select Sub Subcategory</option>
												<option value="1">Electrical Calibartion</option>
												<option value="2">Temp calibration</option>
												<option value="3">Pressure Calibration</option>
												<option value="4">RF calibration</option>
                                            </select>
                                            
                                            <span class="help-block">This is required Select box</span>
                                        </div>
                                </div>-->
                                      
								
								
								
								
                                  <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Service name </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="product_name" class="form-control"  data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                                                        
                                                                        
                                      <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Service description</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea type="text" name="product_description" class="form-control"  data-validation="required"> </textarea>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                      </div>
                                          
                                     <div class="form-group" style="display:none;">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Product Code </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="product_code" class="form-control"  />
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                     </div>
                                      

                                   

                                       <!--<div class="form-group">
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
                                      
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Citation  </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="citation" class="form-control"  data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                     </div>
                                      
                                    <div class="form-group">
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
                                      
                                    <div class="form-group" style="display:none;">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Price  </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="price_of_doc" class="form-control"/>
                                            </div>                                            
                                           
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
                                        <label class="col-md-3 col-xs-12 control-label">Upload image</label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="uploadedimages[]"  title="Browse file" required multiple/>         
                                          <span class="help-block" id="image_size" ></span>
                                           <span class="help-block">Upload service image (required)</span>
                                        </div>
                                    </div>
                                
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Other Document</label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="icon"  title="Browse file" />         
                                          <!--<span class="help-block" id="image_size" ></span>
                                           <span class="help-block">This is required to upload Product Images</span>-->
                                        </div>
                                    </div>
                                   

                                       <div class="form-group" style="display:none;">
                                        <label class="col-md-3 col-xs-12 control-label"> Color Available</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="color" class="form-control" />
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>  

                                    <div class="form-group" style="display:none;">
                                        <label class="col-md-3 col-xs-12 control-label">Mininum order quantity</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="quantity" class="form-control" />
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>   

                                  

                                    <div class="form-group" style="display:none;">
                                        <label class="col-md-3 col-xs-12 control-label">Gsm</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="gsm" class="form-control"/>
                                            </div>                                            
                                           
                                        </div>
                                    </div>  

                                    <div class="form-group" style="display:none;">
                                        <label class="col-md-3 col-xs-12 control-label">Others</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="others" class="form-control" />
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">For Home</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="citation" >
                                              <option value="Yes">Yes</option>
                                              <option value="No" selected>No</option>
                                              
                                            </select>
                                            
                                            <span class="help-block">This is required Select box</span>
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

                                        <button  type="submit" class="btn btn-primary pull-right" id="">Save <span class="fa fa-floppy-o fa-right"></span></button>
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
    
