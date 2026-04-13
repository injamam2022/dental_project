               <!-- START BREADCRUMB -->
<style>
.box {
    position: relative;
    background: #ffffff;
    border-top: 2px solid #c1c1c1;
    margin-bottom: 20px;
    margin-top: 20px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    width: 100%;
    box-shadow: 0px 1px 3px rgba(0,0,0,0.1);
}
.box .box-header {
    position: relative;
    -webkit-border-top-left-radius: 3px;
    -webkit-border-top-right-radius: 3px;
    -webkit-border-bottom-right-radius: 0;
    -webkit-border-bottom-left-radius: 0;
    -moz-border-radius-topleft: 3px;
    -moz-border-radius-topright: 3px;
    -moz-border-radius-bottomright: 0;
    -moz-border-radius-bottomleft: 0;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    border-bottom: 0px solid #f4f4f4;
    color: #444;
    padding-bottom: 10px;
}

.box-title {
    display: inline-block;
    padding: 10px 0px 10px 10px;
    margin: 0;
    font-size: 20px;
    font-weight: 400;
    float: left;
    cursor: default;
}
.box .box-body {
    padding: 10px;
    -webkit-border-top-left-radius: 0;
    -webkit-border-top-right-radius: 0;
    -webkit-border-bottom-right-radius: 3px;
    -webkit-border-bottom-left-radius: 3px;
    -moz-border-radius-topleft: 0;
    -moz-border-radius-topright: 0;
    -moz-border-radius-bottomright: 3px;
    -moz-border-radius-bottomleft: 3px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}
.box .box-footer {
    border-top: 1px solid #f4f4f4;
    -webkit-border-top-left-radius: 0;
    -webkit-border-top-right-radius: 0;
    -webkit-border-bottom-right-radius: 3px;
    -webkit-border-bottom-left-radius: 3px;
    -moz-border-radius-topleft: 0;
    -moz-border-radius-topright: 0;
    -moz-border-radius-bottomright: 3px;
    -moz-border-radius-bottomleft: 3px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
    background-color: #ffffff;
}
</style>			  
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
                    <li><a href="javascript:void(0);">Customer Management</a></li>
                    <li><a href="<?php echo site_url('customer'); ?>">Customer List</a></li>
                    <li class="active">Customer Details</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                           <!-- START DATATABLE EXPORT -->
                            <div class="">
							
							<div class="row">
				<?php //printarray($customer_details);?>
			<div class="col-md-6 col-xs-offset-3">
                            <div class="box">
                                <div class="box-header" style="cursor: move;">
                                    <h3 class="box-title">Customer Detail Menu</h3>
                                </div><!-- /.box-header -->
						<div class="box-body">
                                    <table class="table table-bordered">
                                        <tbody>
										<tr>
                                            <td style="background: #edf5fd;" >Customer Id</td>
                                            <td><?php echo $this->customersuffix.$customer_details->id;?></td>
                                            
                                        </tr>
										<tr>
                                            <td style="background: #edf5fd;" >Wallet Balance  </td>
                                            <td><?php echo $this->website['data']->currency_icon.' '.$loginuserbalance;?></td>
                                        </tr>
										<tr>
                                            <td style="background: #edf5fd;" >ePoints </td>
                                            <td><?php echo $epoints;?></td>
                                        </tr>
										<tr>
                                            <td style="background: #edf5fd;" >Full Name</td>
                                            <td><?php echo $customer_details->first_name;?> <?php echo $customer_details->last_name;?></td>
                                            
                                        </tr>
										<tr>
                                            <td style="background: #edf5fd;" >Contact No.</td>
                                            <td><?php echo $customer_details->country_dial_code;?> <?php echo mydecryption($customer_details->contact_number);?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td style="background: #edf5fd;" >Email Id</td>
                                            <td><?php echo mydecryption($customer_details->email_id);?></td>
                                        </tr>
										<tr>
                                            <td style="background: #edf5fd;" >Address </td>
                                            <td><?php if(!empty($customer_details->address)){echo $customer_details->address;}else{echo 'Not Filled by User';}?></td>
                                        </tr>
										<tr>
                                            <td style="background: #edf5fd;" >Country </td>
                                            <td><?php if(!empty($customer_details->country_id)){$country=get_city_state_country('countries',$customer_details->country_id);
											echo $country[0]->name;
											}else{echo 'Not Filled by User';}
											?></td>
                                        </tr>
										<tr>
                                            <td style="background: #edf5fd;" >State </td>
                                            <td><?php if(!empty($customer_details->state_id)){$state=get_city_state_country('states',$customer_details->state_id);
											echo $state[0]->name;
											}else{echo 'Not Filled by User';}
											?></td>
                                        </tr>
										<tr>
                                            <td style="background: #edf5fd;" >City </td>
                                            <td><?php if(!empty($customer_details->city_id)){$city= get_city_state_country('cities',$customer_details->city_id);echo $city[0]->name;}else{echo 'Not Filled by User';}?></td>
                                        </tr>
										<tr>
                                            <td style="background: #edf5fd;" >Pincode </td>
                                            <td><?php if(!empty($customer_details->pincode)){echo $customer_details->pincode;}else{echo 'Not Filled by User';}?></td>
                                        </tr>										
										<tr>
                                            <td style="background: #edf5fd;" >Created Date </td>
                                            <td><?php echo userbookingdate($customer_details->create_date);?> </td>
                                        </tr>
										<?php if(!empty($customer_details->about)){?>
										<tr>
                                           <td colspan="2" style="text-align: center;background: #edf5fd;">About Customer </td>
                                        </tr>
										<tr>
                                           <td colspan="2" ><?php echo $customer_details->about;?> </td>
                                        </tr>
										<?php } ?>
                                    </tbody>
									</table>
                                </div><!-- /.box-body -->
								  
								
                                <div class="box-footer clearfix">
                                    <h4 class="text-green text-center">Select from the following Menu</h4>
									<ul class="col-xs-offset-3">
									
                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#MyVirtualTopUp" >Virtual TopUp </a></li>
								<li><a href="javascript:void(0);" data-toggle="modal" data-target="#MyVirtualDeduct" >Virtual Deduct </a></li>
								<li><a href="<?php echo site_url('customer/walletlogs/'.$customer_details->id.''); ?>" target="_blank" >Account Wallet Log</a></li>
								<li><a href="<?php echo site_url('customer/epointlogs/'.$customer_details->id.''); ?>" target="_blank" >Account ePoints Log</a></li>
								
                                    </ul>
                                </div>
								
								 <div class="box-footer clearfix">
							<a href="<?php echo site_url('customer'); ?>"><i class="glyphicon glyphicon-circle-arrow-left"></i> Back To Customer List</a>
		                       </div>
                            </div><!-- /.box -->

                            
                        </div>
                    </div>
                               
                            </div>
                            <!-- END DATATABLE EXPORT --> 
                            
                        </div>
                    </div>                    
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER --> 

<!-- Modal -->
  <div class="modal fade" id="MyVirtualTopUp" role="dialog">
    <div class="modal-dialog">    

      <div class="modal-content">
	  <form action="<?php echo site_url('customer/virtualtopup'); ?>" method="POST" >
	  <input type="hidden" value="<?php echo $customer_details->id;?>" name="customer_id" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Customer Virtual TopUp (<?php echo $this->customersuffix.$customer_details->id;?>)</h4>
        </div>
        <div class="modal-body">
           <div class="form-group clearfix">                                        
						<label class="col-md-3 col-xs-12 control-label">TopUp Value</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><?php echo $this->website['data']->currency_icon; ?></span>
								<input type="text" class="form-control" name="credit" value="0" data-validation="number">
							</div>            
							<span class="help-block">TopUp Value</span>
						</div>
			</div>
			<div class="form-group clearfix">                                        
						<label class="col-md-3 col-xs-12 control-label">Any Remark</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="text" class="form-control" name="remark"  data-validation="required">
							</div>            
							<span class="help-block">Remark Related To TopUp</span>
						</div>
			</div>			
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success pull-right">Submit</button>
        </div>
		</form>
      </div>
      
    </div>
  </div>
  
  <div class="modal fade" id="MyVirtualDeduct" role="dialog">
    <div class="modal-dialog">
   
      <div class="modal-content">
	  <form action="<?php echo site_url('customer/virtualdeduct'); ?>" method="POST" >
	  <input type="hidden" value="<?php echo $customer_details->id;?>" name="customer_id" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Customer Virtual Deduct (<?php echo $this->customersuffix.$customer_details->id;?>)</h4>
        </div>
        <div class="modal-body">
           <div class="form-group clearfix">                                        
						<label class="col-md-3 col-xs-12 control-label">Deduct Value</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><?php echo $this->website['data']->currency_icon; ?></span>
								<input type="text" class="form-control" name="debit" value="0" data-validation="number">
							</div>            
							<span class="help-block">Deduct Value</span>
						</div>
			</div>
			<div class="form-group clearfix">                                        
						<label class="col-md-3 col-xs-12 control-label">Any Remark</label>
						<div class="col-md-6 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
								<input type="text" class="form-control" name="remark"  data-validation="required">
							</div>            
							<span class="help-block">Remark Related To Deduct</span>
						</div>
			</div>
			
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success pull-right">Submit</button>
        </div>
		</form>
      </div>
      
    </div>
  </div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
  $.validate({
    lang: 'en'
  });
</script>  