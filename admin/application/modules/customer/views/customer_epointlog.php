               <!-- START BREADCRUMB -->
               <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
                    <li><a href="javascript:void(0);">Customer Management</a></li>
                    <li><a href="<?php echo site_url('customer'); ?>">Customer List</a></li>
                    <li><a href="<?php echo site_url('customer'); ?>">Customer Details</a></li>
                    <li class="active">Customer ePoints Logs (<?php echo $this->customersuffix.$CustomerId; ?>)</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                
                    <div class="row">
                        <div class="col-md-12">
                            
                           <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Customer ePoints Logs List (<?php echo $this->customersuffix.$CustomerId; ?>)</h3>
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
									
									
                                                                     
                                    
                                </div>
                                <div class="panel-body">
								   <div class="table-responsive">
								  
                                    <table id="customers2" class="table table-striped table-actions datatable">
                                        <thead>
										
                                            <tr>
											   <th>Sr.No.</th>
                                                <th>Package Id</th>
                                                <th>Customer Id</th>
                                                <th>Remark</th>                          
                                                <th>Credit Amount</th>
                                                <th>Debit Amount</th>
                                                <th>Generated Date</th>                       
                                                <th>Expiry Date</th>                       
                                            </tr>
											
                                        </thead>
                                        <tbody>
<?php 
$i=1;
if(!empty($customer_epointlog)){
foreach($customer_epointlog as $cval){
?>				
<tr>
<td><?php echo $i;?></td>
<td>
<?php if($cval->package_ref_id==null){ echo '-';}else{ ?>
<a href="<?php echo getdetailurl($cval->packagetype,$cval->package_ref_id); ?>" target="_blank"><span class="label label-success" style="font-size: 100%;cursor: pointer;"><?php echo $cval->package_ref_id; ?></span></a>
<?php } ?>
</td>
<td><a href="<?php echo site_url('customer/details/'.$cval->customer_id.''); ?>" target="_blank"><span class="label label-success" style="font-size: 100%;cursor: pointer;"><?php echo 'CUS-00'.$cval->customer_id; ?></span></a></td>
<td><?php echo $cval->remark; ?></td>
<td><?php if($cval->epointscredit==null){echo '-';}else{echo $cval->epointscredit;} ?></td>
<td><?php if($cval->epointsdebit==null){echo '-';}else{echo $cval->epointsdebit;} ?></td>
<td><?php echo $cval->created_time; ?></td>
<td><?php echo $cval->expirydate; ?></td>
</tr>	
<?php 
$i++;
} 
}
?>					
                                        </tbody>
                                    </table>  
                                     							
                                     </div>
                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT --> 
                            
                        </div>
                    </div>                    
                                           
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->  