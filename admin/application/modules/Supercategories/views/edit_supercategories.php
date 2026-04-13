
<ul class="breadcrumb">
  <li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
  <li><a href="<?php echo site_url('Supercategories/edit_supercategories');?>">EditSubSubCategory</a></li>
  <li class="active">EditSubSubCategory</li>
</ul>
<!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                <div class="panel-heading">
                                <h3 class="panel-title"><strong>EditSubSubCategory</h3>
                  <div class="btn-group pull-right" style="margin-right: 2%;">
                   <a href="<?php echo site_url('Supercategories');?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i> Sub Sub Category List</button></a>
                   </div>
                                </div>
                                <div class="panel-body">  
                <?php
                $category=$cat_edit[0];
                
                ?>
                         <form id="cat_home" class="form-horizontal"  method="post" action="<?php echo site_url("Supercategories/update_supercategories/"); ?>"  enctype="multipart/form-data">  
                             
                             <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Category List</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="cat" onchange="catwisesubcat(this.value);" required>
                                              <option value="0" >Select an Option</option>
                                             <?php if($sup_cat_list)
                                             {
                                                foreach($sup_cat_list as $key=>$list)
                                                {
                                                          if($category->cat_id==$list->cat_id)
                                                          {
                                                              echo '<option value="'.$list->cat_id.'" selected>'.$list->cat_name.'</option>';
                                                          }
                                                          else 
                                                          {
                                                              echo '<option value="'.$list->cat_id.'">'.$list->cat_name.'</option>';
                                                          } 
                                                 } 
                                               }?>
                                            </select>
                                            
                                            <span class="help-block">This is required Select box</span>
                                        </div>
                                    </div>
                             
                                <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Sub Category List</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="subcat" id="subcat_id">
                                              <option value="0" >Select an Option</option>
                                             <?php if($subcat_list)
                                             {
                                                foreach($subcat_list as $key=>$list)
                                                {
                                                          if($category->cat_id==$list->cat_id)
                                                          {
                                                              if($category->subcat_id == $list->sub_catid){
                                                                 echo '<option value="'.$list->sub_catid.'" selected>'.$list->subcat_name.'</option>';
                                                              } else{
                                                                 echo '<option value="'.$list->sub_catid.'" >'.$list->subcat_name.'</option>';
                                                              }
                                                              
                                                          }
                                                           
                                                 } 
                                               }?>
                                            </select>
                                            
<!--                                            <span class="help-block">This is required Select box</span>-->
                                        </div>
                                    </div>
                             
                                <div class="form-group">                                        
                                     <label class="col-md-3 col-xs-12 control-label"> Sub Subcategory Name </label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="cat_name" class="form-control" value="<?php echo $category->supercat_name?>" />
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                </div>

                                                                    
                                      <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Category Description</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="cat_desc" class="form-control"  value="<?php echo $category->description?>" data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Meta Tag</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="meta_tag" class="form-control"  value="<?php echo $category->meta_tag?>" data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"> Meta Description</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="meta_desc" class="form-control"  value="<?php echo $category->meta_desc?>" data-validation="required"/>
                                            </div>                                            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>


                                <input type="hidden" name="cat_id" value="<?php echo $category->super_catid; ?>" />
                             

                  
                               <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Upload  Image</label>
                                        <div class="col-md-6 col-xs-12">
                                          <input type="file" class="fileinput btn-primary" name="uploadedimages[]"  id="category_thumb" title="Browse file"  />     
                                <span class="help-block" id="image_size" ></span>
                                           <span class="help-block">This is required to upload Category Images</span>
                          <img src="<?php echo site_url('webroot/uploads/super_cat/'.$category->cat_image);?>" alt="Smiley face" height="50" width="50"/>
                            <input type="hidden" name="prev_image" value="<?php echo $category->cat_image; ?>"/>
                                        </div>
                                    </div>
                           <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">status</label>
                                        <div class="col-md-6 col-xs-12">
                                            <select class="form-control " name="status" id="status">
                        <option value="active" <?php if($category->status=="active"){echo "selected";} ?>>Active</option>
                        <option value="inactivate" <?php if($category->status=="inactivate"){echo "selected";} ?>>Inactivate</option>
                        
                                            </select>
                      
                                            <span class="help-block">This is required Select box</span>
                                        </div>
                                    </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-default" onclick="document.getElementById('cat_home').reset();">Clear Form</button>                                    
                  <button type="submit" class="btn btn-primary pull-right">Save Changes <span class="fa fa-floppy-o fa-right"></span></button>
                                </div>
               </form>
                </div>
            </div>
          </div>                    
          </div>
       </div>