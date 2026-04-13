               <!-- START BREADCRUMB -->
               <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
                    <li><a href="javascript:void(0);">Customer Management</a></li>
                    <li><a href="<?php echo site_url('customer'); ?>">Customer List</a></li>
                    <li><a href="<?php echo site_url('customer'); ?>">Customer Details</a></li>
                    <li class="active">Customer Wallet Logs (<?php echo $this->customersuffix.$CustomerId; ?>)</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                
                    <div class="row">
                        <div class="col-md-12">
                            
                           <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Customer Wallet Logs List (<?php echo $this->customersuffix.$CustomerId; ?>)</h3>
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
												<th>Package Ref Id</th>							
                                                <th>Remark</th> 
											    <th>Debit</th>
                                                <th>Credit</th>                       
                                                <th>Payment Ref Id</th>
                                                <th>Updated By</th>
                                                <th>Date</th>                            
                                            </tr>
											
                                        </thead>
                                        <tbody>
<?php 
$i=1;
if(!empty($customer_walletlog)){
foreach($customer_walletlog as $cval){
?>				
<tr>
<td><?php echo $i; ?></td>
<td><?php if($cval->updated_by=='Admin'){ echo 'Updated By Admin';}else{
if(!empty($cval->package_ref_id)){echo $cval->package_ref_id;}else{echo '-';}
}?></td>
<td><?php echo $cval->remark;?></td>
<td><?php if(!empty($cval->debit)){echo $this->website['data']->currency_icon.' '.$cval->debit;}else{echo '-';} ?></td>
<td><?php if(!empty($cval->credit)){echo $this->website['data']->currency_icon.' '.$cval->credit;}else{echo '-';} ?></td>
<td><?php if($cval->updated_by=='Admin'){ echo 'Updated By Admin';}else{
if(!empty($cval->payment_ref_id)){echo $cval->payment_ref_id;}else{echo '-';}
} ?></td>
<td><?php echo $cval->updated_by;?></td>
<td><?php echo userbookingdate($cval->create_date);?></td>
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