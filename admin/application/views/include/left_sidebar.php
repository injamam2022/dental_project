   <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation" id="navigation">
                    <li class="xn-logo">
                        <a href="<?php echo site_url('dashboard');?>" id="logoclass">
						<?php if(!empty($this->website['loginuser']->profile_pic)) { ?>
						<?php echo $this->website['data']->company_name;?></a>
						<?php }else{ ?>
						Dashboard
						<?php } ?>
                        <a href="javascript:void(0);" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="javascript:void(0);" class="profile-mini">
							<?php if(!empty($this->website['loginuser']->profile_pic)) { ?>
                               <img src="<?php echo site_url().'/webroot/uploads/profile-pic/'.$this->website['loginuser']->profile_pic;?>" class="img-thumbnail" alt="User Image" />
							<?php } else { ?> 
                                <img src="<?php echo site_url('webroot/uploads/profile-pic/no-image.png');?>" class="img-thumbnail" alt="User Image" />

							<?php } ?>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
							<?php if(!empty($this->website['loginuser']->profile_pic)) { ?>
                               <img src="<?php echo site_url().'/webroot/uploads/profile-pic/'.$this->website['loginuser']->profile_pic;?>" class="img-thumbnail" alt="User Image" />
							<?php } else { ?> 
                                <img src="<?php echo site_url('webroot/uploads/profile-pic/no-image.png');?>" class="img-thumbnail" alt="User Image" />

							<?php } ?>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $this->website['loginuser']->first_name.' '.$this->website['loginuser']->last_name;?></div>
                                <div class="profile-data-title">Last Login : <?php echo $this->session->userdata('loginDetail')->last_login;?></div>
                            </div>
                       
                        </div>                                                                        
                    </li>
                   <?php if($this->session->userdata('loginDetail')->role == "Super Admin"){ ?>
                    <li class="not-openable">
                        <a href="<?php echo site_url('dashboard'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                    </li>  
                        
                    
                    <li class="not-openable">
						<a href="<?php echo site_url('banner/');?>"><span class="fa fa-picture-o"></span> <span class="xn-text">Banner Management</span></a>
							 
                     </li>
                    
            <!-- <li><a href="<?php echo site_url('partner/').base64_encode('list').'/'.EncryptID(1);?>"><span class="fa fa-list"></span> Clients Management</a>
            </li> -->
                   
                    
                    <li class="xn-openable">
						<a href="JavaScript:void(0);"><span class="fa fa-picture-o"></span> <span class="xn-text">Gallery Management</span></a>
							 <ul class="ul-open">
							 <li><a href="<?php echo site_url('gallery');?>"><span class="fa fa-list"></span>Gallery list </a></li>
							  <li><a href="<?php echo site_url('gallery/add_gallery');?>"><span class="fa fa-plus-circle"></span> Add Gallery Images </a></li>
							 </ul>
                     </li>

                     <li class="xn-openable">
                        <a href="JavaScript:void(0);"><span class="fa fa-picture-o"></span> <span class="xn-text">Content Management</span></a>
                             <ul class="ul-open">
<!--                                 echo site_url('homecontent/').base64_encode('homecontent').'/'.base64_encode('home');-->
                             <li><a href="<?php echo base_url('Homepagecontent'); ?>"><span class="fa fa-list"></span>Home Page </a></li>
                             <li><a href="<?php echo base_url('Aboutpagecontent'); ?>"><span class="fa fa-list"></span>About Page </a></li>
                             <li><a href="<?php echo base_url('Carrerpagecontent'); ?>"><span class="fa fa-list"></span>Carrer Page </a></li>
                             <li><a href="<?php echo site_url('blog');?>"><span class="fa fa-list"></span>Blog list </a></li>
                              <li><a href="<?php echo site_url('blog/addblog');?>"><span class="fa fa-plus-circle"></span> Add Blog </a></li>
                            <li><a href="<?php echo site_url('Testimonial');?>"><span class="fa fa-list"></span>Testimonial list </a></li>
                               <li><a href="<?php echo site_url('Testimonial/add_testimonial');?>"><span class="fa fa-plus-circle"></span> Add Testimonial </a></li>
                            <li><a href="<?php echo site_url('Whychooseus');?>"><span class="fa fa-star"></span> Why Choose Us — text</a></li>
                            <li><a href="<?php echo site_url('Whychooseus/features');?>"><span class="fa fa-th-large"></span> Why Choose Us — cards</a></li>
                            <li><a href="<?php echo site_url('Whychooseus/faq');?>"><span class="fa fa-question-circle"></span> Why Choose Us — FAQ</a></li>
                            <li><a href="<?php echo site_url('Hometechnology');?>"><span class="fa fa-cog"></span> Latest Technology</a></li>
                            <li><a href="<?php echo site_url('Hometechnology/items');?>"><span class="fa fa-th"></span> Latest Technology — tiles</a></li>
                            <li><a href="<?php echo site_url('Doctormanagement');?>"><span class="fa fa-user-md"></span> Doctors — list</a></li>
                            <li><a href="<?php echo site_url('Doctormanagement/add');?>"><span class="fa fa-plus-circle"></span> Doctors — add</a></li>
                            <li><a href="<?php echo site_url('Testimonialvideos');?>"><span class="fa fa-play-circle"></span> Video Testimonials — list</a></li>
                            <li><a href="<?php echo site_url('Testimonialvideos/add');?>"><span class="fa fa-plus-circle"></span> Video Testimonials — add</a></li>
                            <li><a href="<?php echo site_url('Dentalmedia');?>"><span class="fa fa-picture-o"></span> Dental Media — list</a></li>
                            <li><a href="<?php echo site_url('Dentalmedia/add');?>"><span class="fa fa-plus-circle"></span> Dental Media — add</a></li>
                                 
                             </ul>
                     </li>
                    
					
					
                    <li class="xn-openable">
                        <a href="JavaScript:void(0);"><span class="fa fa-files-o"></span> <span class="xn-text">Category Management </span></a>
                        <ul class="ul-open">
                            <li><a href="<?php echo site_url('Categories/add_categories');?>"><span class="fa fa-plus-circle"></span> Add  Category </a></li>						
                            <li><a href="<?php echo site_url('Categories');?>"><span class="fa fa-list-alt"></span>Added Category List</a></li>      
                        </ul>
                    </li>
                    
                    <li class="xn-openable">
                        <a href="JavaScript:void(0);"><span class="fa fa-files-o"></span> <span class="xn-text">Services</span></a>
                        <ul class="ul-open">
                            <li><a href="<?php echo site_url('Productmanagement/add_products');?>"><span class="fa fa-plus-circle"></span> Add service</a></li>						
                            <li><a href="<?php echo site_url('Productmanagement');?>"><span class="fa fa-list-alt"></span> Service list</a></li>      
                        </ul>
                    </li>
                    
                    
                    
                   
					<li class="xn-openable">
                        <a href="JavaScript:void(0);"><span class="fa fa-question-circle"></span> <span class="xn-text"> Enquiry </span></a>
                        <ul class="ul-open">
                            <li><a href="<?php echo site_url('query');?>"><span class="fa fa-plus-circle"></span>  Enquiry </a></li>

                        </ul>
                    </li>

                    <li class="not-openable">
                        <a href="<?php echo site_url('appointments'); ?>"><span class="fa fa-calendar"></span> <span class="xn-text">Appointments</span></a>
                    </li>

                    <li class="not-openable">
                        <a href="<?php echo site_url('seo'); ?>"><span class="fa fa-search"></span> <span class="xn-text">SEO — pages</span></a>
                    </li>
					
					
					
				<?php 
				 } else{
					$permit=unserialize($this->session->userdata('loginDetail')->permissions);
					
				?>
				<li class="not-openable">
                        <a href="<?php echo site_url('dashboard'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                </li>
					 <?php if(in_array("Banner",$permit)){ ?>
				  <li class="xn-openable">
					 <a href="JavaScript:void(0);"><span class="fa fa-picture-o "></span> <span class="xn-text">Banner Management</span></a>
					 <ul class="ul-open">
					 <li><a href="<?php echo site_url('banner');?>"><span class="fa fa-plus-circle"></span>Banner list </a></li>
					  <li><a href="<?php echo site_url('Add-Banner');?>"><span class="fa fa-plus-circle"></span> Add Banner </a></li>
					 
					 </ul>
              </li>
				 <?php } ?>
				 
				 <?php if(in_array("Staff",$permit)){ ?>
				 <li class="xn-openable">
                        <a href="JavaScript:void(0);"><span class="fa fa-user"></span> <span class="xn-text">Staff Management</span></a>
                      <ul class="ul-open">
                           <li><a href="<?php echo site_url('staff');?>"><span class="fa fa-list-alt"></span>Staff List</a></li>                          
							                                                 
                        </ul>
                    </li>
				   <?php } ?>
				   <?php if(in_array("Customer",$permit)){ ?>
				 <li class="xn-openable">
                        <a href="JavaScript:void(0);"><span class="fa fa-user-plus"></span> <span class="xn-text">Customer Management</span></a>
                      <ul class="ul-open">                            						
                            <li><a href="<?php echo site_url('customer');?>"><span class="fa fa-user-plus"></span>Registred Customer</a></li>
							                                                 
                        </ul>
                    </li>
				   <?php } ?>
				   
				   
				 
				  

				 
				   <?php } ?>
<li class="xn-title"></li>				
                   
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->