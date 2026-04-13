<?php 

//printarray($this->website['data']);
?>
   <section id="main-container" class="main-container ts-contact-us">
      <div class="container">
         <div class="row no-gutters">
            <div class="col-lg-8 col-md-12">
               <div class="mapouter">
                  <div class="gmap_canvas">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58977.57019537731!2d88.35207819162942!3d22.50050086617226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0271a796bce1c3%3A0xad3d26b15eafdd9f!2sNet+Nest!5e0!3m2!1sen!2sin!4v1542465804364" width="800" height="410" frameborder="0" style="border:1" allowfullscreen></iframe>
                  </div>
               </div>
               <!-- Map End -->
            </div>
            <!-- Col end -->
            <div class="col-lg-4 col-md-12">
               <div class="contact-details">
                  <h2 class="column-title no-border text-white">
                     <span>Contact</span> Details
                  </h2>
                  <div class="contact-info-item">
                     <!--<h3 class="column-title no-border text-white">
                        <span>Find</span> Location
                     </h3>-->
                     <p><?php echo $this->website['data']->address; ?></p>
                  </div>
                  <div class="contact-info-item">
                     <h3 class="column-title no-border text-white">
                        <span>Call</span> Us 24/7
                     </h3>
                     <p><?php echo $this->website['data']->support_contact; ?></p>
                  </div>
                  <div class="contact-info-item">
                     <h5 class="column-title no-border text-white">
                         <p><?php echo $this->website['data']->support_email; ?></p>
                     </h5>
                     
                  </div>
               </div>
               <!-- Contact details end -->
            </div>
            <!-- Col End -->
         </div>
         <!-- row end -->
         <div class="gap-75"></div>
         <div class="row">

            <div class="col-lg-8">
               <h2 class="section-title">
                  <span>Ask</span> A Question
               </h2>
               <div id="contact-form" class="form-container contact-us">
                  <!-- START copy section: Hotel Contact Form -->
                  <form class="contactMe ts-main-form" id="contactMeEstimatedsgdsgsdgsdhdshdshshreh" method="POST" enctype="multipart/form-data">
                         



                        <section>
                           <div class="form-row">
                              <div class="col-lg-6">
                                 <input type="text"  id="name_two" name="name" class="field" placeholder="Name" required>
                                  <span id="show_error_name" style="color:red;display:none;">The name field is Required</span>
                              </div>
                              <div class="col-lg-6">
                                 <input type="tel"  id="phone_number_two" name="phone" class="field" placeholder="Phone Number" required>
                                   <span id="show_error_phone_number" style="color:red;display:none;">The Phone Number field is Required</span>
                              </div>
                           </div>
                           <div class="form-row">
                              <div class="col-md-6">
                                 <input type="email"  id="email_two" name="email" class="field" placeholder="Email" required>
                                   <span id="show_error_email" style="color:red;display:none;">The Email field is Required</span>
                              </div>
                              <div class="col-md-6">
                                  <textarea  id="message_new" name="message" placeholder="Enter Your mEssage" rows="5" cols="40" required></textarea>
                                   <span id="show_error_message" style="color:red;display:none;">The Message field is Required</span>
                              </div>
                              <!--<div class="col-md-6">
                                 <select name="brand" class="field" data-displayname="Brand">
                                    <option value="title">LAPTOP  Brand</option>
                                    <option value="bmw">LAPTOP</option>
                                    <option value="toyota">LAPTOP</option>
                                 </select>
                              </div>-->
                           </div>
                           
            
                           <!-- Google reCAPTCHA -->
                           <!-- Create a site key for your website: https://www.google.com/recaptcha -->
                           <!-- Replace YOUR_SITE_KEY_HERE with your site key -->
                           <!-- To enable Google reCAPTCHA V2, uncomment the next line -->
                           <!-- <div class="re-captcha" data-sitekey="YOUR_SITE_KEY_HERE"></div> -->
                           <!-- To enable Google Invisible reCAPTCHA, uncomment the next line -->
                           <!-- <div class="re-captcha invisible" data-sitekey="YOUR_SITE_KEY_HERE"></div> -->
            
                           <div class="msg"></div>

                      
                             <button type="button" class="btn btn-primary waves-effect waves-light"  id="sendenquirytwo">Reach Us </button>
                            <div class="success_msg_dtata" style="color:#00a63f;display:none">Thank your For your message.We will reach you soon.</div>

                       <!--    <button class="btn btn-primary" type="submit" data-sending="Sending..." id="sendenquirytwo">Reach Us</button>-->
                        </section> <!-- Ection end -->
                     </form><!-- END copy section:Service Contact Form -->
                  <!-- END copy section:Service Contact Form -->
               </div>
               <!-- Contact form end -->
            </div>
            <div class="col-lg-4">
               <div class="sidebar sidebar-right">

                  <div class="widget">
                     <h3 class="widget-title"><span>Working</span> Hours</h3>
                     <ul class="unstyled service-time">
                          <?php 
                      
                         echo $this->website['data']->insurance_pss;
                           ?>
                     </ul>
                  </div>
                  <!-- Working time end -->

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
               </div>
            </div>
         </div>

      </div>
      <!-- Container end -->
   </section>
   <!-- Main container end -->