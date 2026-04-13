     <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('dashboard');?>">Home</a></li>
                    <li><a href="#">User</a></li>
                    <li class="active">Profile</li>
                </ul>
                <!-- END BREADCRUMB -->
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form id="jvalidate" class="form-horizontal" method="post" action=""  enctype="multipart/form-data">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Profile</strong> Detail</h3>
                                </div>

                                <div class="panel-body" style="margin-top:3%;">                                                                        
                                    
    								<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">First Name</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="first_name" value="<?php echo $this->website['loginuser']->first_name;?>" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Required</span>
                                        </div>
                                    </div>
                                    
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="last_name" value="<?php echo $this->website['loginuser']->last_name;?>" class="form-control"/>
                                            </div>                                            
                                            <span class="help-block">Required</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Email Id</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">@</span>
                                                <input type="text" name="email" value="<?php echo $this->website['loginuser']->email;?>" class="form-control" disabled />
                                            </div>            
                                            <span class="help-block">email id not editable</span>
                                        </div>
                                    </div>

									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Mobile Number</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-mobile-phone"></span></span>
                                                <input type="text" name="contact_number" value="<?php echo $this->website['loginuser']->contact_number;?>" class="form-control"/>
                                            </div>            
                                            <span class="help-block">Required, max size = 10</span>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 control-label">Country</label>
                                        <div class="col-md-6 col-xs-12">
                                            <!--<input type="text" name="country_id" value="<?php echo $this->website['loginuser']->country_id;?>" class="form-control"/>-->
											<select class="form-control county" onchange="selectcountry()" name="country_id">
											 <?php foreach($get_country as $country_code){?>
											 <option value="<?php echo $country_code->id?>" countryid="<?php echo $country_code->id;?>" <?php if($country_code->id==$this->website['loginuser']->country_id){echo 'selected';} $country_code->name?>  > <?php echo $country_code->name?> ( <?php echo $country_code->sortname?> )</option>
											 
										     <?php } ?>
										   </select>
                                            <span class="help-block">Required</span>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 control-label">State</label>
                                        <div class="col-md-6 col-xs-12">
                                            <!--<input type="text" name="state_id" value="<?php echo $this->website['loginuser']->state_id;?>" class="form-control"/>-->
											<select class="form-control county" onchange="selectstate(this.value)" name="state_id" id="stateid">
											 <?php foreach($state_id as $state){?>
											<option value="<?php echo $state->id;?>" <?php if($state->id==$this->website['loginuser']->state_id){ echo 'selected'; } ?>><?php echo $state->name;?> </option>
											 <?php } ?>
										   </select>
                                            <span class="help-block">Required</span>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-3 control-label">City</label>
                                        <div class="col-md-6 col-xs-12">
                                            <!--<input type="text" name="city_id" value="<?php echo $this->website['loginuser']->city_id;?>" class="form-control"/>-->
											<select class="form-control county cityremove"  name="city_id" id="cityid">
											  <?php foreach($selectcity as $city){?>
										    <option value="<?php echo $city->id;?>"  <?php if($city->id==$this->website['loginuser']->city_id){ echo 'selected'; } ?> ><?php echo $city->name?>  </option>
											  <?php  } ?>
										   </select>
                                            <span class="help-block">Required</span>
                                        </div>
                                    </div>									  

									  
                                    
									<div class="form-group">
                                        <label class="col-md-3 control-label">Pincode</label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="text" name="pincode" value="<?php echo $this->website['loginuser']->pincode;?>" class="form-control"/>
                                            <span class="help-block">Required</span>
                                        </div>
                                    </div>  
                                    
                                  
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Profile Pic</label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                                            <input type="file" class="fileinput btn-primary" name="userfile" title="Browse file"/>
                                            <span class="help-block">Input type image</span>
                                        </div>
                                    </div> 
									<?php if(!empty($this->website['loginuser']->profile_pic)) { ?>
									<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"></label>
                                        <div class="col-md-2 col-xs-12">  
										<img src="<?php echo site_url().'/webroot/uploads/profile-pic/'.$this->website['loginuser']->profile_pic;?>" class="img-thumbnail" alt="User Image" />
										</div>
                                    </div>
									<?php } else {  ?>
							   	<div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label"></label>
                                        <div class="col-md-2 col-xs-12">  
										<img src="<?php echo site_url('webroot/uploads/profile-pic/no-image.png');?>" class="img-thumbnail" alt="User Image" />
										</div>
                                    </div>
									<?php }?>	
                                 <input type="hidden" value="<?php echo $this->website['loginuser']->profile_pic;?>" name="image">
                                </div>
                                <div class="panel-footer">
                                  
                                    <button class="btn btn-primary pull-right" type="submit">Update</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div>                    
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                
            </div>            
            <!-- END PAGE CONTENT -->
<script>
			function selectcountry() {
				$("#stateid").html('');
				$(".cityremove").html('');
				  var element = $(".county").find('option:selected'); 
				    var country = element.attr("countryid");
				    $.ajax({
						 url: "<?php echo site_url('dashboard/getstate');?>",
					     dataType: "json",
			             data: {country:country},
			             success:function(data){
					      $.each(data, function( key, value ){
							
							  
						  $("#stateid").append("<option value="+value.id+">"+value.name+"</option>");
						  
		              	});
				         }
	  
				    });
				 
			}
			function selectstate(getval) {
				
				 $(".cityremove").html('');
				 $.ajax({
						 url: "<?php echo site_url('dashboard/getcity');?>",
					     dataType: "json",
			             data: {getval:getval},
			             success:function(data){
					      $.each(data, function( key, value ){
						  $("#cityid").append("<option value="+value.id+">"+value.name+"</option>");
						  
		              	  });
				         }
	  
				    });
			}
			
			
			</script>
		