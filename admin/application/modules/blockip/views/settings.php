               <!-- START BREADCRUMB -->			  
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
                    <li><a href="javascript:void(0);">Admin Ip Management</a></li>
                    <li class="active">Blockip Settings</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                           <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Blockip Settings</h3>
									
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
									<div class="btn-group pull-right">
										<button class="btn btn-primary" data-toggle="modal" data-target="#modal_addip" >Add Ip For Blacklist</button>
									</div>
									
                                                                     
                                    
                                </div>
                                <div class="panel-body">
								   <div class="table-responsive">
								  
                                    <table id="customers2" class="table table-striped table-actions datatable">
                                        <thead>
                                            <tr>
											    <th>Sr.No.</th>
                                                <th>IP Address</th>                      
                                                <th>Date Time</th>
                                                <th>Action</th>                                      
                                            </tr>
											
                                        </thead>
                                        <tbody>
<?php 
$i=1;
if(!empty($list)){
foreach($list as $fval){ 
?>				
<tr>
<td><?php echo $i; ?></td>
<th><?php echo $fval->ipaddress; ?></th>
<th><?php echo $fval->date_time; ?></th>
<td>
<div>
	<div class="form-group">
	   <div class="col-md-12">
			<div class="btn-group">
				<a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Actions<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="<?php echo site_url('blockip/deleteip/'.$fval->id.''); ?>" onclick="return confirm('Are you sure want to delete ?');">Delete</a></li>	
					
				</ul>
			</div>                                         
		</div>
	</div> 
</div>                            
</td>
</td>                                               
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
<div class="modal" id="modal_addip" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
 <form id="add_airline" class="form-horizontal" method="post" action="<?php echo site_url('blockip/addipllist'); ?>"> 
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		<h4 class="modal-title" id="defModalHead">Add Ip For Blacklist</h4>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<label class="col-md-3 col-xs-12 control-label">Ip Address</label>
			<div class="col-md-6 col-xs-12">
			<input type="text" name="ipaddress" requried >						
			</div>
		</div>			   
	</div>
	<div class="modal-footer">
		 <button class="btn btn-primary" type="submit">Save <span class="fa fa-floppy-o fa-right"></span></button>
		 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
 </form>	
</div>
</div>
</div>