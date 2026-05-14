               <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
                    <li><a href="<?php echo site_url('blog/Comment_list');?>">Blog</a></li>
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
                                    <h3 class="panel-title">Blog Comment  List</h3>
									  <div class="btn-group pull-right">
										<button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                        
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='<?php echo site_url('webroot/backend') ?>/img/icons/csv.png' width="24"/> CSV</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='<?php echo site_url('webroot/backend') ?>/img/icons/txt.png' width="24"/> TXT</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='<?php echo site_url('webroot/backend') ?>/img/icons/xls.png' width="24"/> XLS</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='<?php echo site_url('webroot/backend') ?>/img/icons/word.png' width="24"/> Word</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='<?php echo site_url('webroot/backend') ?>/img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'png',escape:'false'});"><img src='<?php echo site_url('webroot/backend') ?>/img/icons/png.png' width="24"/> PNG</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='<?php echo site_url('webroot/backend') ?>/img/icons/pdf.png' width="24"/> PDF</a></li>
                                        </ul>
                                    </div> 
									
									
									  <div class="btn-group pull-right" style="margin-right: 2%;">
										<button class="btn btn-danger" onClick="ischeckbox()"><i class="fa fa-trash-o"></i> Remove</button>
									  </div>
									 
                                                                     
                                    
                                </div>
		<!--FOR CATEGORY POPUP START HERE-->
								
					   
						

<!--===================FOR CATEGORY POPUP END HERE===================================================-->	
								
                                <div class="panel-body">
								   <div class="table-responsive">
								   <form id="form1"  method="post" action="<?php echo site_url("blog/delete_multiple_comment");?>">
                                    <table id="customers2" class="table table-striped table-actions datatable">
                                        <thead>
                                            <tr>
                                               
                                                <th>#</th>
											    <th style="padding: 0;">
                                                <label class="check"><input type="checkbox" name="check_all" id="selectall" class=""/></label>
                                                </th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Like On</th>
												
												
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php if(!empty($reviews) ) {  ?>
										<?php foreach($reviews as $key=>$comments_lists):?>
                                            <tr>
                                               
                                                <td><?php echo $key+1;?></td>
												 <td style="padding: 0;"><label class="check"><input type="checkbox" name="checklist[]" value="<?php echo $comments_lists->id; ?>" class="checkbox1"/></label></td> 
                                                <td><?php echo $comments_lists->name;?></td>
                                                <td><?php echo $comments_lists->email;?></td>
												
												<?php 
									$this->db->select('post_title');
									$this->db->from('tbl_posts_blog');
									$this->db->where('id',$comments_lists->like_on);
									$query=$this->db->get();
									$result= $query->result();				
								//	echo $this->db->last_query(); die();
									?>	
												
												
												
												 <td><?php if($result[0]->post_title == ''){echo "You Delete this blog";}else{ echo $result[0]->post_title;}?></td>
												 
												  
					
														

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
				window.location.href="<?php echo site_url('blog/delete_single_comment');?>/"+id;
				}
				</script>
				
				
				<script>
				
				function Deactive_package(getids)
				{   
				
				window.location.href="<?php echo site_url('blog/delete_multiple_comment');?>/"+getids;
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