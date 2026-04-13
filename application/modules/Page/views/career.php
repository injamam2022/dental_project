<div class="banner-area bg-overlay" id="banner-area" style="background-image:url(<?php echo base_url('assets/images/banner/about_banner.jpg'); ?>">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="banner-heading">
                  <h1 class="banner-title">Our <span>Career</span></h1>
                  <ol class="breadcrumb">
                     <li>Home</li>
                     <li><a href="#">Career</a></li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
   </div>

<?php

?>
   <section id="main-container" class="main-container pb-120">
		<div class="container">
         <div class="row">
            <div class="col-lg-8 col-md-12">
               <div class="row">
                  <div class="col-md-12">
                     <h2 class="section-title">
                        <span>Current</span> Opening
                     </h2>
                  </div>
                  <div class="col-md-12">
                     <div id="accordion">
                         
                         
                         <?php
                         $m=0;
                         $c=0;
                            for($i=0;$i<count($result);$i++)
                            {
                         ?>
                         
                         <div class="card">
                           <div class="card-header" id="headingOne">
                              <div class="card-button active">
                                 <a href="#">
                                     
                                     <?php echo ($i+1.).".".$result[$i]->top_title; ?>
                                    
                                 </a>
                              </div> 
                           </div> 
                           <div id="collapseOne" class="collapse show" data-parent="#accordion" style="">
                              <div class="card-body">
                                  
<!--                                  A wonderful serenity taken possession  into entire soul  like to these sweet mornings of spring which thing of existence  this spot which was the main part.-->
                                    <?php echo $result[$i]->top_description; ?>
                                  
                              </div> 
                           </div> 
                        </div> 
                         <?php
                            }
                         ?>
                         
                         
                         
                     </div>
                  </div> 
               </div> 
               <div class="gap-60"></div>
               <div class="row">
                  <div class="col-md-12">
                     <h2 class="section-title">
                        <span>You Can</span> APPLY WITH YOUR CV
                     </h2>
                  </div>
                  <div class="col-md-12">
                     <div class="comments-form border-box">
                       
                           <div class="row">
                              
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input class="form-control" name="first_name_join" id="first_name_join" placeholder="Full Name" type="text" >
                                     <span id="show_error_name" style="color:red;display:none;">The name field is Required</span>
                                 </div>
                              </div>
      
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input class="form-control" name="email_join" id="email_join" placeholder="Email Address" type="email" >
                                     <span id="show_error_email" style="color:red;display:none;">The Email field is Required</span>
                                 </div>
                              </div>
                               
                                <div class="col-md-6">
                                 <div class="form-group">
                                    <input class="form-control" name="phone_num_join" id="phone_num_join" placeholder="Phone" type="email" >
                                      <span id="show_error_phone_number" style="color:red;display:none;">The Phone Number field is Required</span>
                                 </div>
                              </div>
      
                              <div class="col-md-6">
                                 
                                 <div class="form-group">
                                    <input class="form-control" placeholder="Your  cv" type="file" name="cv_join_us" id="cv_join_us" >
                                     <span id="show_error_message_cv" style="color:red;display:none;">The Cv field is Required</span>
                                 </div>
                              </div>
      
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <textarea class="form-control required-field" id="message_join_us" placeholder="Message" rows="6" ></textarea>
                                     <span id="show_error_message" style="color:red;display:none;">The Message field is Required</span>
                                 </div>
                              </div>
                               
                              
      
                           </div>
                           <div class="clearfix text-right">
                              <button class="btn btn-primary" type="submit" onclick="career_join_us();">Apply Now</button> 
                               <div class="success_msg_dtata_career" style="color:#00a63f;display:none">Thank your For your message.We will reach you soon.</div>
                           </div>
                        
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-12">
               <div class="sidebar sidebar-right">
                  <div class="widget widget-social">
                     <h3 class="widget-title"><span>On</span> Socials</h3>
                     <ul class="unstyled social-icons">
                        <li><a    target="_blank" href="<?php echo $this->website['data']->facebook_link; ?>" ><i class="fa fa-facebook"></i></a></li>
                        <li><a  target="_blank"  href="<?php echo $this->website['data']->twitter_link; ?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a  target="_blank"  href="<?php echo $this->website['data']->google_plus_link; ?>"><i class="fa fa-google-plus"></i></a></li>
                        <li><a  target="_blank"  href="<?php echo $this->website['data']->linkedin_link; ?>"><i class="fa fa-linkedin"></i></a></li>
                        <li><a  target="_blank"  href="<?php echo $this->website['data']->instagram_link; ?>"><i class="fa fa-instagram"></i></a></li>
                        <li><a  target="_blank" href="<?php echo $this->website['data']->youtube_link; ?>"><i class="fa fa-youtube"></i></a></li>
                     </ul>
                  </div>

                  <div class="widget">
                     <h3 class="widget-title"><span>Working</span> Hours</h3>
                     <ul class="unstyled service-time">
                          <?php 
                              echo $this->website['data']->insurance_pss;
                           ?>
                     </ul>
                  </div>
                   
               </div>
            </div>
         </div>

		</div>
	</section>