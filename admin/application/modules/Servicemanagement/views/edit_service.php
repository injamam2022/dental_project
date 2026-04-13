
<ul class="breadcrumb">
  <li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
  <li><a href="<?php echo site_url('Productmanagement');?>">Edit  Service</a></li>
  <li class="active">Edit Service</li>
</ul>
<!-- END BREADCRUMB -->
     <input type="hidden" id="base_url" value="<?php echo base_url();?>">
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Edit Service</strong></h3>
                  <div class="btn-group pull-right" style="margin-right: 2%;">
                   <a href="<?php echo site_url('Servicemanagement');?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i> Service List</button></a>
                   </div>
                </div>
                                <div class="panel-body">  
                 <?php //printarray($product_edit);   ?>
                    <form id="cat_home" class="form-horizontal"  method="post" action="<?php echo site_url("Servicemanagement/update_product/"); ?>"  enctype="multipart/form-data">                
                                <!--<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Add-SUB-Category</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control" name="pro_sub_cat_id" id="pro_sub_cat_id" onclick="subcat()" >
                                             
                                             <?php if($sub_cat_list){
                                                 foreach($sub_cat_list as $key=>$list){
                                                     ?>
                                                 <option value="<?php echo $list->sub_catid;?>,<?php echo $list->subcat_name; ?>" <?php if($list->sub_catid == $product_edit[0]->pro_sub_cat_id ) { echo "selected"; } ?>><?php echo $list->subcat_name; ?></option>
                                                <?php
                                             } }?>

                                            
                                            </select>
                                            
                                            <span class="help-block">This is required Select box</span>
                                        </div>
                                    </div>-->



                                 <!--
                                  <div class="form-group">
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
                                                <input type="text" name="product_name" class="form-control"  data-validation="required" value="<?php echo $product_edit[0]->product_name; ?>"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                                                        
                                                                        
                                      <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Service Description</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea type="text" name="product_description" class="form-control "  data-validation="required"><?php echo $product_edit[0]->product_description; ?> </textarea>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
                                          
                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">
                                        Service Provided  </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea type="text" name="product_code" class="form-control "  data-validation="required"><?php echo $product_edit[0]->product_code; ?> </textarea>
                                                
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
                                        Price Of Service Approx  </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="price_of_doc" class="form-control"  data-validation="required" value="<?php echo $product_edit[0]->price_of_doc; ?>" />
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                     </div>
                                     
                                      
                                  
                                      
                                   

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
                                        <label class="col-md-3 col-xs-12 control-label">Upload  Image</label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="uploadedimages[]"  title="Browse file"  multiple/>         
                                          <span class="help-block" id="image_size" ></span>
                                           <span class="help-block">This is required to upload Product Images</span>
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

                              <!--  <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Upload  Icon</label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="icon"  title="Browse file"  multiple/>         
                                          <span class="help-block" id="image_size" ></span>
                                           <span class="help-block">This is required to upload Product Icon</span>
                                        </div>
                                    </div>
                                    <?php
                                        
                        
                                       $added_product_icon = $product_edit[0]->icon;
                        
                                       
                                    ?>
                                      <?php if(!empty($added_product_icon)){?>
                     <div class="multi_imgs">
                   
                   <img src="<?php echo site_url('webroot/uploads/product_icon').'/'.$added_product_icon;?>" alt="Smiley face" height="100" width="100">

                     </div> <?php }?> -->
                                 
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
                                      
                                <input type="hidden" name="product_id" value="<?php echo $product_edit[0]->ser_id ?>">
                                          
			                    <div class="panel-footer">      
                                        <button type="button" class="btn btn-default" onclick="document.getElementById('cat_home').reset();">Clear Form</button>

                                        <button  type="submit" class="btn btn-primary pull-right" id=""   >Save <span class="fa fa-floppy-o fa-right"></span></button>
                             </div>
               </form>
                </div>
            </div>
          </div>                    
          </div>
       </div>