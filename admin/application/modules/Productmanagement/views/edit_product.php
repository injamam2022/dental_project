
<ul class="breadcrumb">
  <li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
  <li><a href="<?php echo site_url('Productmanagement');?>">Services</a></li>
  <li class="active">Edit service</li>
</ul>
<!-- END BREADCRUMB -->
     <input type="hidden" id="base_url" value="<?php echo base_url();?>">
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Edit service</strong></h3>
                  <div class="btn-group pull-right" style="margin-right: 2%;">
                   <a href="<?php echo site_url('Productmanagement');?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i> Service list</button></a>
                   </div>
                </div>
                                <div class="panel-body">  
                 <?php //printarray($categories_asas);   ?>
                 <?php //printarray($product_edit);   ?>
                    <form id="cat_home" class="form-horizontal"  method="post" action="<?php echo site_url("Productmanagement/update_product/"); ?>"  enctype="multipart/form-data">                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Service category</label>
                                    <div class="col-md-6 col-xs-12">
                                        <select class="form-control" name="cat_id" id="cat_id" required>

                                         <?php 

                                             for($i=0;$i<count($categories_asas);$i++) {
                                                 ?>
                                             <option value="<?php echo $categories_asas[$i]->cat_id;?>" <?php if($categories_asas[$i]->cat_id == $product_edit[0]->cat_id ) { echo "selected"; } ?>><?php echo $categories_asas[$i]->cat_name;?></option>
                                            <?php
                                         } ?>


                                        </select>

                                        <span class="help-block">Dental Services or Skin Care</span>
                                    </div>
                                </div>
                                <input type="hidden" name="subcat_id" value="0" />
                                <input type="hidden" name="sub_subcat_id" value="0" />

                                      
                                  <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Service name </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="product_name" class="form-control"  data-validation="required" value="<?php echo $product_edit[0]->product_name; ?>"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                                                        
                                                                        
                                      <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Service description</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea type="text" name="product_description" class="form-control"  data-validation="required"><?php echo $product_edit[0]->product_description; ?> </textarea>
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
                                                <input type="text" name="product_code" class="form-control" value="<?php echo $product_edit[0]->product_code; ?>" />
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                     </div>



                                   <!--  <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Domain</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="domain" class="form-control"  data-validation="required"  value="<?php echo $product_edit[0]->domain; ?>"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                     </div>

                                       <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Type </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="type" class="form-control"  data-validation="required"  value="<?php echo $product_edit[0]->type; ?>"/>
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
                                                <input type="text" name="citation" class="form-control"  data-validation="required" value="<?php echo $product_edit[0]->product_code; ?> "/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                     </div>-->
                                    
                                    <!--<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Number Of Words  </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="no_of_words" class="form-control"  data-validation="required" value="<?php echo $product_edit[0]->no_of_words; ?>" />
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                     </div>-->
                                      
                                    <div class="form-group" style="display:none;">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Price Of Product  </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="price_of_doc" class="form-control" value="<?php echo $product_edit[0]->price_of_doc; ?>" />
                                            </div>                                            
                                          
                                        </div>
                                     </div>
                                      
                                     <!-- <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Discounts Needed  </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="discount_apply" class="form-control" value="<?php echo $product_edit[0]->discount_apply; ?>"  />
                                            </div>                                            
                                             <span class="help-block">This is required text field</span>
                                        </div>
                                     </div>-->
                                      
                                      
                                  
                                      
                                   

                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Meta Tag</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="meta_tag" class="form-control"  data-validation="required" value="<?php echo $product_edit[0]->meta_tag; ?>"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                      
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Meta Title</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="meta_title" class="form-control"  data-validation="required" value="<?php echo $product_edit[0]->meta_title; ?>"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                      
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Page Title</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="page_title" class="form-control"  data-validation="required" value="<?php echo $product_edit[0]->page_title; ?>"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Meta Description</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="meta_description" class="form-control"  data-validation="required" value="<?php echo $product_edit[0]->meta_description; ?>"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>


                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Upload Image</label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="uploadedimages[]"  title="Browse file"  multiple/>         
                                          <span class="help-block" id="image_size" ></span>
                                           <span class="help-block">Upload service images</span>
                                        </div>
                                    </div>
                                    <?php
                                        
                        
                                       $added_product_img = $product_edit[0]->pro_image;
                        
                                       
                                    ?>
                                      <?php if(!empty($added_product_img)){?>
										 <div class="multi_imgs">
										<?php
										  $imge=explode(',',$added_product_img);
										  foreach($imge as $imges)
										  {
                                               
                                             $exp_file = explode('.',$imges); 
                                           
                                              if($exp_file[1] == 'pdf')
                                              {
                                             ?>
                                             <a href="<?php echo site_url('webroot/uploads/product').'/'.$imges;?>"> <img src="<?php echo site_url('webroot/uploads/product/download.png'); ?>" alt="Smiley face" height="100" width="150"></a>
                                             <?php
                                              }
                                              else
                                              {
                                                  
                                             
										  ?>  
							                   
								   <img src="<?php echo site_url('webroot/uploads/product').'/'.$imges;?>" alt="Smiley face" height="100" width="100">
								   <?php 
                                            }
										  }
										  ?>
					 					 </div>	<?php }?>
                        
                        
                                <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Other Document</label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="icon[]"  title="Browse file" />         
                                          <!--<span class="help-block" id="image_size" ></span>
                                           <span class="help-block">Upload service images</span>-->
                                        </div>
                                    </div>
                                    <?php
                                        
                        
                                       $added_product_icon = $product_edit[0]->icon;
                        
                                       
                                    ?>
                                      <?php if(!empty($added_product_icon)){?>
										 <div class="multi_imgs">
										<?php
										  $imge=explode(',',$added_product_icon);
										  foreach($imge as $imges)
										  {
                                               
                                             $exp_file = explode('.',$imges); 
                                           
                                              if($exp_file)
                                              {
                                             ?>
                                             <a href="<?php echo site_url('webroot/uploads/product_icon').'/'.$imges;?>" download="Other Doc" > <img src="<?php echo site_url('webroot/uploads/product/download.png'); ?>" alt="Smiley face" height="100" width="150"></a>
                                             <?php
                                              }
                                              else
                                              {
                                                  
                                             
										  ?>  
							                   
								   <img src="<?php echo site_url('webroot/uploads/product').'/'.$imges;?>" alt="Smiley face" height="100" width="100">
								   <?php 
                                            }
										  }
										  ?>
					 					 </div>	<?php }?>


                                    
                                    <div class="form-group" style="display:none;">
                                        <label class="col-md-3 col-xs-12 control-label"> Color Available</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="color" class="form-control"  value="<?php echo $product_edit[0]->color; ?>" />
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>  

                                    <div class="form-group" style="display:none;">
                                        <label class="col-md-3 col-xs-12 control-label">Mininum order quantity</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="quantity" class="form-control"  value="<?php echo $product_edit[0]->quantity; ?>"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>   

                                  

                                    <div class="form-group" style="display:none;">
                                        <label class="col-md-3 col-xs-12 control-label">Gsm</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="gsm" class="form-control" value="<?php echo $product_edit[0]->gsm; ?>"/>
                                            </div>                                            
                                           
                                        </div>
                                    </div>  

                                    <div class="form-group" style="display:none;">
                                        <label class="col-md-3 col-xs-12 control-label">Others</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="others" class="form-control"  value="<?php echo $product_edit[0]->others; ?>"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                 
                                 <input type="hidden" name="prev_image_multipal" value="<?php echo $added_product_img; ?>"/>
                        
                                  <input type="hidden" name="prev_image" value="<?php echo $added_product_icon; ?>"/>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">status</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="status" id="status">
											           <option value="active" <?php if($product_edit[0]->status=="active"){echo "selected";} ?>>Active</option>
											           <option value="inactivate" <?php if($product_edit[0]->status=="inactivate"){echo "selected";} ?>>Inactivate</option>
											  
                                            </select>
											
                                            <span class="help-block">This is required Select box</span>
                                        </div>
                                    </div>
                        
                                <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">For Home</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="citation" id="citation">
											           <option value="Yes" <?php if($product_edit[0]->citation=="Yes"){echo "selected";} ?>>Yes</option>
											           <option value="No" <?php if($product_edit[0]->citation=="No"){echo "selected";} ?>>No</option>
											  
                                            </select>
											
                                            <span class="help-block">This is required Select box</span>
                                        </div>
                                    </div>
                                      
                                <input type="hidden" name="product_id" value="<?php echo $product_edit[0]->pro_id ?>">
                                          
			                    <div class="panel-footer">      
                                        <button type="button" class="btn btn-default" onclick="document.getElementById('cat_home').reset();">Clear Form</button>

                                        <button  type="submit" class="btn btn-primary pull-right" id="">Save <span class="fa fa-floppy-o fa-right"></span></button>
                             </div>
               </form>
                </div>
            </div>
          </div>                    
          </div>
       </div>

      