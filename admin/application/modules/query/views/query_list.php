               <!-- START BREADCRUMB -->
			  
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
                    <li><a href="javascript:void(0);">Enquiry Management</a></li>
                    <li class="active">Website Enquiry List</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                           <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Website Enquiry List</h3>
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
                                <div class="panel-body">
								   <div class="table-responsive">
								   <form id="form1" method="post" action="<?php echo site_url("query/deleteallquery");?>">
                                    <table id="customers2" class="table table-striped table-actions datatable">
                                        <thead>
                                            <tr>
											    <th style="padding: 0;">
													<label class="check">
														<input type="checkbox" name="check_all" id="selectall" class="" />
													</label>
												</th>
											    <th>Sr.No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile No.</th>
                                                <th>Details</th>
                                                <th>Message</th>
                                                <th>Category</th>
                                                <th>Date Time</th>
                                                <th>Action</th>
                                            </tr>
											
                                        </thead>
                                        <tbody>
										<?php 
										$i=1;
										if(!empty($customer_query_list)){
										foreach($customer_query_list as $key=>$cval){ 
										//printarray($cval); die();
										?>				
										<tr>
										 <td style="padding: 0;">
													<label class="check">
														<input type="checkbox" name="checklist[]" value="<?php echo $cval->id; ?>" class="checkbox1" />
													</label>
												</td>
										<td><?php echo $i; ?></td>
										<td><?php echo $cval->name; ?></td>
										<td><?php echo $cval->email; ?></td>
										<td><?php echo $cval->mobile; ?></td>
										<td><?php 
                                                $details = @unserialize($cval->details);
                                                $content = '';
                                                if($cval->category == "ContactUs"){
                                                        if (is_array($details)) {
                                                            $content .= "<b>Company :</b> ".htmlspecialchars(isset($details[0]) ? $details[0] : '', ENT_QUOTES, 'UTF-8')."<br>";
                                                            if (!empty($details[1])) {
                                                                $content .= "<b>Topic :</b> ".htmlspecialchars($details[1], ENT_QUOTES, 'UTF-8')."<br>";
                                                            }
                                                        } else {
                                                            $content .= htmlspecialchars((string) $cval->details, ENT_QUOTES, 'UTF-8');
                                                        }
                                                    
                                                } elseif (is_array($details)) {
                                                        $content .= "<b>Company :</b> ".htmlspecialchars(isset($details[0]) ? $details[0] : '', ENT_QUOTES, 'UTF-8')."<br>"; 
                                                        $content .= "<b>Designation :</b> ".htmlspecialchars(isset($details[1]) ? $details[1] : '', ENT_QUOTES, 'UTF-8')."<br>"; 
                                                        $content .= "<b>Experience :</b> ".htmlspecialchars(isset($details[2]) ? $details[2] : '', ENT_QUOTES, 'UTF-8')."<br>"; 
                                                        $content .= "<b>DOB :</b> ".htmlspecialchars(isset($details[3]) ? $details[3] : '', ENT_QUOTES, 'UTF-8')."<br>"; 
                                                        $resume = isset($details[4]) ? $details[4] : '';
                                                        $content .= "<b>Resume :</b> <a target='_blank' href='".htmlspecialchars($this->config->item('ui_url')."/assets/images/resume/".$resume, ENT_QUOTES, 'UTF-8')."' download><i class='fa fa-download' aria-hidden='true'></i></a>"; 
                                                } else {
                                                        $content .= htmlspecialchars((string) $cval->details, ENT_QUOTES, 'UTF-8');
                                                }
                                               
                                                echo $content;
;                                            ?></td>
										<td> <?php echo $cval->message;  ?></td>
										
										<td>
											<?php echo $cval->category; ?>
										</td>
										<td><?php echo $cval->create_date; ?></td>
										<td> 
										<a class="btn btn-danger btn-rounded btn-sm" onClick='confirm_delete("<?php echo $cval->id;?>")'><span class="fa fa-times"></span></a>
										</td>
										</tr>	
										<?php 
										$i++;
										} 
										} 
										?>					
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

                <!-- Modal  Contect-->
				
              <!-- Modal  Contect End -->	
<!-- END PAGE CONTENT WRAPPER -->  
				<script>
				var id="";
				function confirm_delete(getid)
				{   
                   // alert(getid);
				    id=getid;
					var box = $("#mb-remove-row-single");
                    box.addClass("open");
				}
				function delete_single()
				{   
                    //alert(id);
				window.location.href="<?php echo site_url('query/deletequery');?>/"+id;
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
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row-single">
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
		
			  