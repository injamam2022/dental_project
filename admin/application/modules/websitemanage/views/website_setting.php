               <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
                    <li class="active"><a href="<?php echo site_url('website-setting'); ?>">WebSite Setting</a></li>
                   
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                   
                                <div class="panel panel-default tabs">                            
								<ul class="nav nav-tabs" role="tablist">
									<li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Company Details</a></li>
									<!--<li><a href="#tab-second" role="tab" data-toggle="tab">Email Settings</a></li>-->
									<li><a href="#tab-third" role="tab" data-toggle="tab">Social Media</a></li>
									<li><a href="#tab-appointments" role="tab" data-toggle="tab">Appointment email</a></li>
									<li><a href="#tab-seo-social" role="tab" data-toggle="tab">SEO &amp; social (site-wide)</a></li>
									<!--<li><a href="#tab-fourth" role="tab" data-toggle="tab">SMS Details</a></li>-->
									                                       
									                                      
								</ul>
								<div class="panel-body tab-content">							
								<!-- Tab First Start -->
								   <div class="tab-pane active" id="tab-first">
										<p> &nbsp; </p>
										  <input type="hidden" name="id" value="<?php echo $this->website['data']->id;?>" class="form-control"/>
										  
										  
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Company Name</label>
											<div class="col-md-6 col-xs-12">    
												<input type="text" name="company_name" value="<?php echo $this->website['data']->company_name;?>" class="form-control"   />                                                    
											</div>
										</div>
										
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Company Logo</label>
											<div class="col-md-6 col-xs-12">    
												<input type="file" name="company_logo" class="fileinput btn-primary"/>                                                    
												<input type="hidden" name="company_logo" value="<?php echo $this->website['data']->company_logo;?>"/>                                                    
											</div>
										</div>
								<?php if($this->website['data']->company_logo!=="") { ?>		
										 <div class="form-group">        
										 <label class="col-md-3 col-xs-12 control-label"></label>	
										  <div class="col-md-6 col-xs-12">    									 
											<div class="gallery" id="links">
												<a class="gallery-item" href="<?php echo site_url();?>webroot/uploads/logo/<?php echo $this->website['data']->company_logo;?>" title="<?php echo $this->website['data']->company_logo;?>" data-gallery="">
													<div class="image">                              
														<img src="<?php echo site_url();?>webroot/uploads/logo/<?php echo $this->website['data']->company_logo;?>">                                                       
													</div>                              
												</a>								
											</div>
										  </div>
										</div>
								<?php } ?>	
										<!--<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Favicon Icon</label>
											<div class="col-md-6 col-xs-12">    
												<input type="file" Name="company_favicon"  class="fileinput btn-primary"/>
												<input type="hidden" name="company_favicon" value="<?php echo $this->website['data']->company_favicon;?>"/>                                                     
											</div>
										</div>-->
										
										<?php if($this->website['data']->company_favicon!=="") { ?>		
										 <div class="form-group">        
										 <label class="col-md-3 col-xs-12 control-label"></label>	
										  <div class="col-md-6 col-xs-12">    									 
											<div class="gallery" id="links">
												<a class="gallery-item" href="<?php echo site_url();?>webroot/uploads/logo_fab/<?php echo $this->website['data']->company_favicon;?>" title="<?php echo $this->website['data']->company_favicon;?>" data-gallery="">
													<div class="image">                              
														<img src="<?php echo site_url();?>webroot/uploads/logo_fab/<?php echo $this->website['data']->company_favicon;?>">                                                       
													</div>                              
												</a>								
											</div>
										  </div>
										</div>
								<?php } ?>	

										<div class="form-group push-up-30">
											<label class="col-md-3 col-xs-12 control-label">Site URL</label>
											<div class="col-md-6 col-xs-12">                                            
												<input type="text" name="site_url" value="<?php echo $this->website['data']->site_url;?>" class="form-control" />
											</div>
										</div> 
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Support Email ID  </label>
											<div class="col-md-6 col-xs-12">
											<input type="text" name="support_email" value="<?php echo $this->website['data']->support_email;?>" class="form-control" />
											</div>
										</div>
									<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Support Contact No</label>
											<div class="col-md-6 col-xs-12">                                            
												<input type="text" name="support_contact" value="<?php echo $this->website['data']->support_contact;?>" class="form-control" />
											</div>
									</div> 	
									<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Registered office Address</label>
											<div class="col-md-6 col-xs-12">                                            
												<textarea class="form-control" name="address" rows="5"><?php echo $this->website['data']->address;?></textarea>
												<span class="help-block">Address</span>
											</div>
									</div>
                                       
                                    <div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Registered office Address Iframe</label>
											<div class="col-md-6 col-xs-12">                                            
												<textarea class="form-control" name="address_iframe" rows="5"><?php echo $this->website['data']->address_iframe;?></textarea>
												<span class="help-block">Address</span>
											</div>
									</div>
                                       
                                    <div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Corporate office Address</label>
											<div class="col-md-6 col-xs-12">                                            
												<textarea class="form-control" name="corporate_address" rows="5"><?php echo $this->website['data']->corporate_address;?></textarea>
												<span class="help-block">Address</span>
											</div>
									</div>
                                       
                                    <div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Corporate office Address Iframe</label>
											<div class="col-md-6 col-xs-12">                                            
												<textarea class="form-control" name="corporate_iframe" rows="5"><?php echo $this->website['data']->corporate_iframe;?></textarea>
												<span class="help-block">Address</span>
											</div>
									</div>
                                       
                                       
                                    <div class="form-group push-up-30">
											<label class="col-md-3 col-xs-12 control-label">Working Hours</label>
											<div class="col-md-6 col-xs-12">   
                                                <textarea class="form-control" name="insurance_pss" rows="5"><?php echo $this->website['data']->insurance_pss;?></textarea>
												<span class="help-block">Working Hours</span>
												<!--<input type="text" name="insurance_pss" value="<?php echo $this->website['data']->insurance_pss;?>" class="form-control" />-->
											</div>
								    </div> 
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Country</label>
											<div class="col-md-6 col-xs-12">                                            
												<select class="form-control county" onchange="selectcountry()" name="country_id">
											 <?php foreach($get_country as $country_code){?>
											 <option value="<?php echo $country_code->id?>" countryid="<?php echo $country_code->id;?>" <?php if($country_code->id==$this->website['data']->country_id){echo 'selected';} $country_code->name?>  > <?php echo $country_code->name?> ( <?php echo $country_code->sortname?> )</option>
											 
										     <?php } ?>
										   </select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">State</label>
											<div class="col-md-6 col-xs-12">                                            
												
												<select class="form-control county" onchange="selectstate(this.value)" name="state_id" id="stateid">
											 <?php foreach($state_id as $state){?>
											<option value="<?php echo $state->id;?>" <?php if($state->id==$this->website['data']->state_id){ echo 'selected'; } ?>><?php echo $state->name;?> </option>
											 <?php } ?>
										   </select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">City</label>
											<div class="col-md-6 col-xs-12">                                            
												<select class="form-control county cityremove"  name="city_id" id="cityid">
											  <?php foreach($selectcity as $city){?>
										    <option value="<?php echo $city->id;?>"  <?php if($city->id==$this->website['data']->city_id){ echo 'selected'; } ?> ><?php echo $city->name?>  </option>
											  <?php  } ?>
										   </select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Pincode</label>
											<div class="col-md-6 col-xs-12">                                            
												<input type="text" name="pincode" value="<?php echo $this->website['data']->pincode;?>" class="form-control" />
											</div>
										</div>
                                       <div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Footer Content</label>
											<div class="col-md-6 col-xs-12">                                            
                                                <textarea type="text" name="footer_content" class="form-control"><?php echo $this->website['data']->footer_content;?></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Copy Right</label>
											<div class="col-md-6 col-xs-12">                                            
												<input type="text" name="copy_right" value="<?php echo $this->website['data']->copy_right;?>" class="form-control" />
											</div>
										</div>	                              	
								
										<h5 class="push-up-20">Web Site Meta Configuration Detail.</h5>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Meta Title </label>
											<div class="col-md-6 col-xs-12">                                            
												<input type="text" name="meta_title" value="<?php echo $this->website['data']->meta_title;?>" class="form-control" />
											</div>
										</div>
										
										
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Meta Keyword</label>
											<div class="col-md-6 col-xs-12">                                            
												<textarea class="form-control" name="meta_keyword" rows="5"><?php echo $this->website['data']->meta_keyword;?></textarea>
												<span class="help-block">Website SEO Keyword</span>
											</div>
										</div>  

										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Meta Description</label>
											<div class="col-md-6 col-xs-12">                                            
												<textarea class="form-control" name="meta_description" rows="5"><?php echo $this->website['data']->meta_description;?></textarea>
												<span class="help-block">Website SEO Description</span>
											</div>
										</div>      

																				   

									 
										
									</div>
								<!-- Tab First End -->
								<!-- Tab Second Start -->
								   <div class="tab-pane" id="tab-second">
										<p>&nbsp;</p>
										
										<div class="form-group">                                        
											<label class="col-md-3 col-xs-12 control-label">Default Email Protocal</label>
											<div class="col-md-2">
												<select class="form-control select" name="email_protocal">
												<?php if($this->website['data']->email_protocal=="Email") { ?>
													<option Value="Email" selected>Email</option>
													<option Value="SMTP Email">SMTP Email</option>     
												<?php } elseif($this->website['data']->email_protocal=="SMTP Email") { ?>
													
													<option Value="SMTP Email" selected>SMTP Email</option> 
													<option Value="Email" >Email</option>	
												<?php } else { ?>  
													<option Value="Email" selected>Email</option>
													<option Value="SMTP Email">SMTP Email</option>  
												
												<?php } ?>    													
												</select>
												
											</div>                                            
										 </div>

										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">From E-mail ID</label>
											<div class="col-md-6 col-xs-12">    
												<input type="text" name="from_email_id" value="<?php echo $this->website['data']->from_email_id;?>" class="form-control" />
											</div>
										</div> 
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Bcc E-mail ( Comma Separated )</label>
											<div class="col-md-6 col-xs-12">    
												<input type="text" name="bcc_email_id" value="<?php echo $this->website['data']->bcc_email_id;?>" class="form-control" />
											</div>
										</div>   

										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">SMTP Host Name</label>
											<div class="col-md-6 col-xs-12">    
												<input type="text" name="smtp_host_name" value="<?php echo $this->website['data']->smtp_host_name;?>" class="form-control" />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">SMTP Port</label>
											<div class="col-md-6 col-xs-12">    
												<input type="text" name="smtp_port" value="<?php echo $this->website['data']->smtp_port;?>" class="form-control" />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Email ID</label>
											<div class="col-md-6 col-xs-12">    
												<input type="text" name="email_id" value="<?php echo $this->website['data']->email_id;?>" class="form-control" />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Password</label>
											<div class="col-md-6 col-xs-12">    
												<input type="password" name="email_password" value="<?php echo $this->website['data']->email_password;?>" class="form-control" />
											</div>
										</div>

										
									</div>                                        
								<!-- Tab Second End -->   
								<!-- Tab Third Start -->
								   <div class="tab-pane" id="tab-third">
										<p> &nbsp; </p>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Facebook Link </label>
											<div class="col-md-6 col-xs-12">
											   <div class="input-group">
													<span class="input-group-addon"><i class="fa fa-facebook"></i></span>
													<input type="text" name="facebook_link" value="<?php echo $this->website['data']->facebook_link;?>" class="form-control"/>
												</div>   
											</div>
										</div> 
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Linkedin Link</label>
											<div class="col-md-6 col-xs-12">
											   <div class="input-group">
													<span class="input-group-addon"> <i class="fa fa-linkedin"></i> </span>
													<input type="text" name="linkedin_link" value="<?php echo $this->website['data']->linkedin_link;?>" class="form-control"/>
												</div>   
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Instagram Link</label>
											<div class="col-md-6 col-xs-12">
												 <div class="input-group">
													<span class="input-group-addon"> <i class="fa fa-instagram"></i> </span>
													<input type="text" name="instagram_link" value="<?php echo $this->website['data']->instagram_link;?>" class="form-control"/>
												</div>   
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Twitter Link</label>
											<div class="col-md-6 col-xs-12">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-twitter"></i> </span>
													<input type="text" name="twitter_link" value="<?php echo $this->website['data']->twitter_link;?>" class="form-control"/>
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Google+ Link</label>
											<div class="col-md-6 col-xs-12">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
													<input type="text" name="google_plus_link" value="<?php echo $this->website['data']->google_plus_link;?>" class="form-control"/>
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Youtube Link</label>
											<div class="col-md-6 col-xs-12">
											  <div class="input-group">
													<span class="input-group-addon"><i class="fa fa-youtube"></i></span>
													<input type="text" name="youtube_link" value="<?php echo $this->website['data']->youtube_link;?>" class="form-control"/>
												</div>
											</div>
										</div> 
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Pinterest</label>
											<div class="col-md-6 col-xs-12">
											   <div class="input-group">
													<span class="input-group-addon"><i class="fa fa-pinterest"></i></span>
													<input type="text" name="pinterest_link" value="<?php echo $this->website['data']->pinterest_link;?>" class="form-control"/>
												</div>
											</div>
										</div>									
										
										
										
									</div>
								<!-- Tab Third End -->
								<div class="tab-pane" id="tab-seo-social">
									<p>&nbsp;</p>
									<p class="text-muted col-md-offset-3 col-md-6">Defaults for Open Graph / Twitter. Per-page overrides are under <strong>SEO pages</strong> in the sidebar. Run <code>database/seo_meta_migration.sql</code> once if you have not already.</p>
									<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">Default share image (OG)</label>
										<div class="col-md-6 col-xs-12">
											<input type="file" name="seo_og_image" class="fileinput btn-primary" accept="image/*"/>
											<input type="hidden" name="seo_og_image_current" value="<?php echo isset($this->website['data']->seo_og_image) ? htmlspecialchars($this->website['data']->seo_og_image, ENT_QUOTES, 'UTF-8') : ''; ?>"/>
											<span class="help-block">Used when a page does not set its own image. Recommended 1200×630px.</span>
										</div>
									</div>
									<?php
									$seo_img = isset($this->website['data']->seo_og_image) ? trim((string) $this->website['data']->seo_og_image) : '';
									if ($seo_img !== '') {
										$seo_src = rtrim((string) $this->config->item('ui_url'), '/') . '/' . ltrim($seo_img, '/');
									?>
									<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label"></label>
										<div class="col-md-6 col-xs-12">
											<p class="text-muted">Current file:</p>
											<img src="<?php echo htmlspecialchars($seo_src, ENT_QUOTES, 'UTF-8'); ?>" alt="" style="max-width:320px;height:auto;border:1px solid #ddd;padding:4px;">
										</div>
									</div>
									<?php } ?>
									<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">Default robots</label>
										<div class="col-md-6 col-xs-12">
											<input type="text" name="seo_robots" value="<?php echo isset($this->website['data']->seo_robots) ? htmlspecialchars($this->website['data']->seo_robots, ENT_QUOTES, 'UTF-8') : 'index,follow'; ?>" class="form-control" placeholder="index,follow"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">Twitter @site</label>
										<div class="col-md-6 col-xs-12">
											<input type="text" name="seo_twitter_site" value="<?php echo isset($this->website['data']->seo_twitter_site) ? htmlspecialchars($this->website['data']->seo_twitter_site, ENT_QUOTES, 'UTF-8') : ''; ?>" class="form-control" placeholder="@YourClinic or YourClinic"/>
											<span class="help-block">Optional. Shown as twitter:site meta.</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">Facebook App ID</label>
										<div class="col-md-6 col-xs-12">
											<input type="text" name="seo_facebook_app_id" value="<?php echo isset($this->website['data']->seo_facebook_app_id) ? htmlspecialchars($this->website['data']->seo_facebook_app_id, ENT_QUOTES, 'UTF-8') : ''; ?>" class="form-control" placeholder="Optional fb:app_id"/>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab-appointments">
									<p>&nbsp;</p>
									<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">Appointment notification email</label>
										<div class="col-md-6 col-xs-12">
											<input type="email" name="appointment_notify_email" value="<?php echo isset($this->website['data']->appointment_notify_email) ? htmlspecialchars($this->website['data']->appointment_notify_email, ENT_QUOTES, 'UTF-8') : ''; ?>" class="form-control" placeholder="e.g. reception@clinic.com"/>
											<span class="help-block">Submissions from the website &ldquo;Book an appointment&rdquo; form are emailed here. If empty, Support Email ID (Company Details) is used.</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">Admin email subject</label>
										<div class="col-md-6 col-xs-12">
											<input type="text" name="appointment_admin_subject" value="<?php echo isset($this->website['data']->appointment_admin_subject) ? htmlspecialchars($this->website['data']->appointment_admin_subject, ENT_QUOTES, 'UTF-8') : ''; ?>" class="form-control" placeholder="New appointment request - {company_name}"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">Admin email body</label>
										<div class="col-md-6 col-xs-12">
											<textarea name="appointment_admin_body" class="form-control" rows="6" placeholder="New booking from {name}. Service: {service_name}, Date: {appointment_date}"><?php echo isset($this->website['data']->appointment_admin_body) ? htmlspecialchars($this->website['data']->appointment_admin_body, ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">Patient email subject</label>
										<div class="col-md-6 col-xs-12">
											<input type="text" name="appointment_customer_subject" value="<?php echo isset($this->website['data']->appointment_customer_subject) ? htmlspecialchars($this->website['data']->appointment_customer_subject, ENT_QUOTES, 'UTF-8') : ''; ?>" class="form-control" placeholder="Thank you for booking with {company_name}"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 col-xs-12 control-label">Patient email body</label>
										<div class="col-md-6 col-xs-12">
											<textarea name="appointment_customer_body" class="form-control" rows="6" placeholder="Thank you {name}. Your booking for {service_name} on {appointment_date} is received."><?php echo isset($this->website['data']->appointment_customer_body) ? htmlspecialchars($this->website['data']->appointment_customer_body, ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
											<span class="help-block">Supported placeholders: {name}, {email}, {phone}, {service_name}, {appointment_date}, {company_name}, {company_email}, {company_phone}, {company_address}, {company_corporate_address}, {website_url}</span>
										</div>
									</div>
								</div>
								<!-- Tab Fourth Start -->	
									<div class="tab-pane" id="tab-fourth">
										<p> SMS Country Credentials </p>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">User Name</label>
											<div class="col-md-6 col-xs-12">
											   <div class="input-group">
													<span class="input-group-addon"><i class="fa fa-user"></i></span>
													<input type="text" name="sms_username" value="<?php echo $this->website['data']->sms_username;?>" class="form-control"/>
												</div>   
											</div>
										</div> 
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Password</label>
											<div class="col-md-6 col-xs-12">
											   <div class="input-group">
													<span class="input-group-addon"> <i class="fa fa-key"></i> </span>
													<input type="password" name="sms_password" value="<?php echo $this->website['data']->sms_password;?>" class="form-control"/>
												</div>   
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Sender ID</label>
											<div class="col-md-6 col-xs-12">
												 <div class="input-group">
													<span class="input-group-addon">  <i class="fa fa-credit-card"></i> </span>
													<input type="text" name="sms_sender_id" value="<?php echo $this->website['data']->sms_sender_id;?>" class="form-control"/>
												</div>   
											</div>
										</div>
									</div>
								<!-- Tab Fourth End -->	
								<!-- Tab Five Start -->	
									
								<!-- Tab Five End -->
								
								

								
								</div>
                                    <div class="panel-footer">                                                                        
                                        <button type="submit" class="btn btn-primary pull-right">Save Changes <span class="fa fa-floppy-o fa-right"></span></button>
                                    </div>
                                </div>                                
                            
                            </form>
                            
                        </div>
                    </div>                    
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->  
				     <!-- BLUEIMP GALLERY -->
        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev"><i class="fa fa-caret-left"></i></a>
            <a class="next"><i class="fa fa-caret-right"></i></a>
            <a class="close"><i class="fa fa-times"></i></a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>

<script>
			function selectcountry() {
				$("#stateid").html('');
				$(".cityremove").html('');
				  var element = $(".county").find('option:selected'); 
				    var country = element.attr("countryid");
				    $.ajax({
						 url: "<?php echo site_url('websitemanage/getstate');?>",
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
						 url: "<?php echo site_url('websitemanage/getcity');?>",
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