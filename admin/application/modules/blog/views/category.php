               <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
                    <li><a href="<?php echo site_url('add-tour-package');?>">Blog</a></li>
                    <li class="active">Blog  List</li>
                </ul>
                <!-- END BREADCRUMB -->
                <?php
				//printarray($package_list);
				?>
                 <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                             <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Blog Category  List</h3>
									  <div class="btn-group pull-right" style="margin-right: 2%;">
										<button class="btn btn-danger" onClick="ischeckbox()"><i class="fa fa-trash-o"></i> Remove</button>
									  </div>
									  <div class="pull-right" style="margin-right: 2%;">
										<a data-toggle="modal" data-target="#add"><button class="btn btn-danger" style="background-color:black;"><i class="glyphicon glyphicon-plus-sign"></i> Add Categories</button></a>
									  </div>
                                                                     
                                    
                                </div>
                                <div class="panel-body" style="padding-bottom:0;">
                                    <p class="text-muted" style="margin:0 0 12px;font-size:13px;">Enabled categories appear under <strong>Blogs</strong> on the website. The slug is the listing URL after <code>/blog/</code>, for example <code>skin-care</code> becomes <code>/blog/skin-care</code> and <code>dental</code> becomes <code>/blog/dental</code>.</p>
                                </div>
		<!--FOR CATEGORY POPUP START HERE-->
								
					   <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
						  <form action="<?php echo site_url('blog/category');?>" method="POST" id="catrgory">
							 <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title">Add Blog Category Type</h4>
								  </div>
								  <div class="modal-body">
									<div class="form-group form-horizontal">
								  <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Category Name </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="category_name" class="form-control" onblur="slug_url(this.value,'category_title')" required>
                                            </div>                                            
                                            <span class="help-block">Shown in the website Blogs menu.</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">URL slug</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">/</span>
                                                <input type="text" name="category_title" id="category_title" class="form-control" placeholder="skin-care" required>
                                            </div>
                                            <span class="help-block">Use <code>skin-care</code>, <code>dental</code>, or another short slug. This becomes <code>/blog/your-slug</code>.</span>
                                        </div>
                                    </div>  
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label"> Category Status </label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <select class="form-control type" name="status" id="status">
												<option value="Yes">Enable</option>
												<option value="No">Disable</option>
											  </select>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
									</div>
								 </div>
								  <div class="modal-footer">
									<button type="submit" class="btn btn-primary"><span class="fa fa-floppy-o fa-right"></span> Add</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>
								</div>
							  </form>
						</div>
						

<!--=================FOR CATEGORY POPUP END HERE===================================================-->	
								
                                <div class="panel-body">
								   <div class="table-responsive">
								   <form id="form1"  method="post" action="<?php echo site_url("blog/delete_multiple_blog");?>">
                                    <table id="customers2" class="table table-striped table-actions datatable">
                                        <thead>
                                            <tr>
                                               
                                                <th>#</th>
											    <th style="padding: 0;">
                                                <label class="check"><input type="checkbox" name="check_all" id="selectall" class=""/></label>
                                                </th>
                                                <th>Name</th>
                                                <th>slug</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php if(!empty($get_blog) ) {  ?>
										<?php foreach($get_blog as $key=>$blog_lists):?>
                                            <tr>
                                               
                                                <td><?php echo $key+1;?></td>
												<td style="padding: 0;"><label class="check"><input type="checkbox" name="checklist[]" value="<?php echo $blog_lists->id; ?>" class="checkbox1"/></label></td>
                                                <td><?php echo $blog_lists->name;?></td>
                                                <td><?php echo $blog_lists->slug;?></td>
												 <td><?php echo $blog_lists->status;?></td>
                                                <td>
												<?php $packagekey=$blog_lists->id;?>
												<a data-toggle="modal" data-target="#edit_<?php echo $key;?>" class="btn btn-default btn-rounded btn-sm" href=""><span class="fa fa-pencil"></span></a>
												<a class="btn btn-danger btn-rounded btn-sm" onClick='confirm_delete("<?php echo $packagekey;?>")'><span class="fa fa-times"></span></a>
												</td>
                                            </tr>
                                    <?php endforeach;?>
										<?php } ?>
                                        </tbody>
                                    </table>  
                                      </form>									
                                     </div>
                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT --> 
                        </div>
                    </div>                    
                </div>
				<?php if(!empty($get_blog) ) {  ?>
            <?php foreach($get_blog as $key=>$blog_lists):?>
				<!--FOR EDIT CATEGORY  POPUP START HERE-->
					   <div class="modal fade" id="edit_<?php echo $key;?>" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
						  <form action="<?php echo site_url('blog/updatecategory');?>" method="POST" id="catrgory">
						
							 <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title">Edit Blog Category Type</h4>
								  </div>
								  <div class="modal-body">
									<div class="form-group form-horizontal">
								  <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Category Name </label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text"  value="<?php echo htmlspecialchars((string) $blog_lists->name, ENT_QUOTES, 'UTF-8'); ?>" name="category_name" class="form-control" required>
                                            </div>                                            
                                            <span class="help-block">Shown in the website Blogs menu.</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">URL slug</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">/</span>
                                                <input type="text" value="<?php echo htmlspecialchars((string) $blog_lists->slug, ENT_QUOTES, 'UTF-8'); ?>" name="category_title" id="category_title_<?php echo (int) $blog_lists->id; ?>" class="form-control" required>
                                            </div>
                                            <span class="help-block">Changing this changes the public listing URL (e.g. /blog/dental).</span>
                                        </div>
                                    </div>  
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label"> Category Status </label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <select class="form-control type" name="status" id="status">
												<option <?php if($blog_lists->status=='Yes'){echo 'selected';}?> value="Yes">Enable</option>
												<option <?php if($blog_lists->status=='No'){echo 'selected';}?>value="No">Disable</option>
											  </select>
                                            </div>            
                                            <span class="help-block">This is required text field</span>
                                        </div>
                                    </div>
									</div>
								 </div>
								  <div class="modal-footer">
								  <input type="hidden" name="categoryid" value="<?php echo $blog_lists->id;?>" />
									<button type="submit" class="btn btn-primary"><span class="fa fa-floppy-o fa-right"></span> Update</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>
								</div>
							  </form>
						</div>
             <!--=================FOR EDIT CATEGORY POPUP END HERE======================-->
			 <?php endforeach;?>
				<?php } ?>
				
				
				
				
                <!-- END PAGE CONTENT WRAPPER -->
				
				<script>
				var id="";
				function confirm_delete(getid)
				{   
				   id=getid;
					 var box = $("#mb-remove-row-singles");
                     box.addClass("open");
				}
				function delete_single()
				{   
				window.location.href="<?php echo site_url('blog/delete_single_blog');?>/"+id;
				}
				</script>
				
				
				<script>
				
				function Deactive_package(getids)
				{   
				
				window.location.href="<?php echo site_url('blog/delete_multiple_blog');?>/"+getids;
				}
				</script>
				<script>
				function abs()
				{
					
				alert("Ok");
				}
				</script>
				     <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to remove selected row?</p>                    
                        <p>Press Yes if you sure.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-success btn-lg mb-control-yes" onClick="continue_delete()">Yes</button>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->  

		<!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row-singles">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to remove this row?</p>                    
                        <p>Press Yes if you sure.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-success btn-lg mb-control-yes" onClick="delete_single()">Yes</button>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->