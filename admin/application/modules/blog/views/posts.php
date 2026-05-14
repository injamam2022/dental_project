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
										<a href="<?php echo site_url('blog/addblog');?>"><button class="btn btn-danger" style="background-color:black;"><i class="glyphicon glyphicon-plus-sign"></i> Add Blog</button></a>
									  </div>
                                </div>
                                <div class="panel-body">
								   <div class="table-responsive">
								   <form id="form1"  method="post" action="<?php echo site_url("blog/delete_multiple_post");?>">
                                    <table id="customers2" class="table table-striped table-actions datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
											    <th style="padding: 0;">
                                                <label class="check"><input type="checkbox" name="check_all" id="selectall" class=""/></label>
                                                </th>
												<th>Image</th>
												 <th>Name</th>
                                                <!--<th>Category</th>-->
												<th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php if(!empty($get_post) ) {  ?>
										<?php foreach($get_post as $key=>$post_lists):?>
                                            <tr>
                                               
                                                <td><?php echo $key+1;?></td>
												<td style="padding: 0;"><label class="check"><input type="checkbox" name="checklist[]" value="<?php echo $post_lists->id; ?>" class="checkbox1"/></label></td>
                                                <?php
                                                    $row_img_raw = isset($post_lists->blog_image) ? trim((string) $post_lists->blog_image) : '';
                                                    $row_first_img = '';
                                                    if ($row_img_raw !== '') {
                                                        $row_parts = array_filter(array_map('trim', explode(',', $row_img_raw)));
                                                        $row_first_img = $row_parts ? reset($row_parts) : '';
                                                    }
                                                ?>
                                                <td>
                                                    <?php if ($row_first_img !== '') { ?>
                                                        <img src="<?php echo site_url('webroot/uploads/blog/' . rawurlencode($row_first_img)); ?>"
                                                             alt="<?php echo htmlspecialchars((string) $post_lists->post_title, ENT_QUOTES, 'UTF-8'); ?>"
                                                             height="42" width="60"
                                                             style="object-fit:cover;border-radius:4px;border:1px solid #e7ebf0;"
                                                             onerror="this.outerHTML='<span style=&quot;color:#b94a48;font-size:11px;&quot;>missing</span>';" />
                                                    <?php } else { ?>
                                                        <span style="color:#888;font-size:11px;font-style:italic;">no image</span>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $post_lists->post_title;?></td>
												 <!--<td><?php  $post_lists->category; $catid=$post_lists->category; 
												 $id=$this->Blog_Model->get_catid($catid);
												 echo $id[0]->name;   
												 ?>
												 </td>-->
													<?php $t=$post_lists->dat;?>			
												 <td><?php echo $date=date("Y-m-d",strtotime($t)); ?></td>
												 <td><?php echo $post_lists->status;?></td>
                                                <td>
												 <?php $id=$post_lists->id;?>
												<a class="btn btn-default btn-rounded btn-sm" href="<?php echo site_url("blog/edit_post/$id");?>" ><span class="fa fa-pencil"></span></a>
                                                 <?php $packagekey=$post_lists->id;?>
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
				window.location.href="<?php echo site_url('blog/delete_single_post');?>/"+id;
				}
				</script>
				
				
				<script>
				
				function Deactive_package(getids)
				{   
				
				window.location.href="<?php echo site_url('blog/delete_multiple_post');?>/"+getids;
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