
   <div class="banner-area bg-overlay" id="banner-area" style="background-image:url(<?php echo  base_url('assets/images/banner/about_banner.jpg');  ?>);">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="banner-heading">
                  <h1 class="banner-title">Best <span>Products</span></h1>
                  <ol class="breadcrumb">
                     <li>Home</li>
                     <li><a href="#">Products</a></li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
   </div>

   <section id="main-container" class="main-container ts-srevice-inner">
		<div class="container">

         <div class="row">
            <div class="col-md-12">
               <h2 class="section-title">
                  <span>Our</span> Products
               </h2>
            </div>
         </div>
<?php    
         $total_count    =   count($Products);
         $looprow_count  =   ceil($total_count/3);
          
            $m=0;
            $k=0;
            
            for($i=0;$i<$looprow_count;$i++)
            {
                ?>
            
            <div class="row">
             
             
              <?php
                
                 for($j=$k;$j<$total_count;$j++)
            {
                
              ?>
            <div class="col-lg-4 col-md-12">
               <div class="ts-service-wrapper">
                  <span class="service-img">
                     <a href="<?php echo base_url('Products/detail/'.$Products[$j]->pro_id); ?>">
                        <img class="img-fluid" src="<?php echo base_url('admin/webroot/uploads/product/'.$Products[$j]->pro_image); ?>" alt="">
                      </a>
                  </span>
                  <div class="service-content">
                     <div class="service-icon">
                        <i class="fa fa-inr"> <?php echo $Products[$j]->price_of_doc; ?></i>
                        
                     </div> 
                     <h3><a href="<?php echo base_url('Products/detail/'.$Products[$j]->pro_id); ?>"><?php echo $Products[$j]->product_name; ?></a></h3>
                     <p><?php echo $Products[$j]->product_description; ?></p>
                     
                      
                      <a href="javascript:void('null');" data-toggle="modal" data-target=".appointment_modal_two" class="btn btn-primary">
                        Buy Now
                     </a>
                      
                      
                  </div> 
               </div> 
            </div> 
           
                
                 
            <?php
                   if($m==2)
                   {
                       break;
                   }
                     $m++;
            }
            
            ?> 
             
         </div>
            
           <?php if($m==2){ 
             $m=0;
             $k=$j+1;
            ?>
            <div class="gap-30"></div>
            <?php
            } 
            
            ?>
            
         
            
            
            
            
<?php
                
            
            }
            
?>
         
            
            
            
       

		</div>
   </section>
   
   

   <section id="ts-appointment" class="ts-appointment pb-0">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-md-12">
               <div class="row">
                  <div class="col-md-12">
                     <h2 class="section-title">
                        <span>Book</span> An Appointment
                     </h2>
                  </div>
               </div> 
               <div class="row">
                  <div id="contact-form" class="form-container col-lg-12">
                    
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
                           </div>
                           <div class="msg"></div>

                      
                             <button type="button" class="btn btn-primary waves-effect waves-light"  id="sendenquirytwo">Reach Us </button>
                            <div class="success_msg_dtata" style="color:#00a63f;display:none">Thank your For your message.We will reach you soon.</div>

                      
                        </section>
                     </form>
                  </div>
               </div> 
            </div> 
             
            
             
             
            <div class="col-lg-4 col-md-12">
               <div class="row">
                  <div class="col-md-12">
                     <h2 class="section-title">
                        <span>Clients</span> Love
                     </h2>
                  </div> 
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="testimonial-carousel owl-carousel">
                         
                          <?php
             
              
                         
                         for($i=0;$i<count($tes_details);$i++)
                         {
                             ?>
                         
                         <div class="testimonial-container">
                           <div class="testimonial-body">
                              <div class="testimonial-content">
                                 <h4 class="service-name"><?php echo $tes_details[$i]->test_title; ?> </h4>
                                 <ul class="unstyled ts-rating">
                                     
                                     <?php for($j=0;$j<$tes_details[$i]->rating;$j++) { ?>
                                    <li><i class="fa fa-star"></i></li>
                                  
                                     <?php   } ?>
                                 </ul>
                              </div> 
                              <p> <?php echo $tes_details[$i]->tes_description; ?>  </p>
                              <span class="quote-icon"><i class="icon icon-quote22"></i></span>
                           </div> 
                           <div class="testimonial-footer">
                              <img src="<?php echo base_url('admin/webroot/uploads/testimonial/').$tes_details[$i]->image_name; ?>" alt="" class="img-fluid">
                              <div class="client-info">
                                 <h3 class="client-name"><?php echo $tes_details[$i]->client_name; ?></h3>
                                 
                              </div> 
                           </div>
                        </div> 
                         
                         <?php
                         }
             
                         ?>
                         
                        
                       
                    
                     </div> 
                  </div>
               </div> 
            </div> 
             
             
             
             
             
             
         </div> 
      </div> 
   </section> 

   <section id="ts-pertner" class="ts-pertner solid-bg">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="partner-carousel owl-carousel">
                  <figure class="partner-item partner-logo">
                     <a href="#"><img class="img-fluid" src="images/clients/client-img1.png" alt=""></a>
                  </figure> 
                  <figure class="partner-item partner-logo">
                     <a href="#"><img class="img-fluid" src="images/clients/client-img2.png" alt=""></a>
                  </figure> 
                  <figure class="partner-item partner-logo">
                     <a href="#"><img class="img-fluid" src="images/clients/client-img3.png" alt=""></a>
                  </figure>
                  <figure class="partner-item partner-logo">
                     <a href="#"><img class="img-fluid" src="images/clients/client-img4.png" alt=""></a>
                  </figure> 
                  <figure class="partner-item partner-logo">
                     <a href="#"><img class="img-fluid" src="images/clients/client-img5.png" alt=""></a>
                  </figure> 
                  <figure class="partner-item partner-logo">
                     <a href="#"><img class="img-fluid" src="images/clients/client-img1.png" alt=""></a>
                  </figure>
               </div> 
            </div> 
         </div> 
      </div> 
   </section> 