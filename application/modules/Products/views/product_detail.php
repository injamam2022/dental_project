
   <div class="banner-area bg-overlay" id="banner-area" style="background-image:url(<?php echo base_url('assets/images/banner/about_banner.jpg'); ?>)">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="banner-heading">
                  <h1 class="banner-title">Best <span>Product</span></h1>
                  <ol class="breadcrumb">
                     <li>Home</li>
                     <li>
                         
                         <a href="#">Product</a>
                      
                     </li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
   </div>


<?php 

?>

   <section id="main-container" class="main-container pb-120">
      <div id="ts-service-details" class="ts-service-detials">
         <div class="container">
            <div class="row">

               <div class="col-lg-3 col-md-12">

                  <div class="sidebar sidebar-left">

                     <div class="widget">
                        <h3 class="widget-title"><span>Working</span> Hours(For Service And Product....)</h3>
                        <ul class="unstyled service-time">
                           <?php 
                      
                         echo $this->website['data']->insurance_pss;
                           ?>
                        </ul>
                     </div> 

                  </div>
               </div>

               <div class="col-lg-9 col-md-12">
                  <div class="ts-service-content">
                     <h2 class="section-title">
                        <?php echo $IndividualProducts[0]->product_name; ?>
                     </h2>
                     
                     <span class="service-img">
                        <img class="img-fluid" src="<?php echo base_url('admin/webroot/uploads/product/'.$IndividualProducts[0]->pro_image); ?>" alt="">
                     </span>
                     <h3 class="column-title no-border">
                        <span>Product</span> Description
                     </h3>
                     <p>
                         <?php echo $IndividualProducts[0]->product_description; ?>
                         
                      
                      
                    </p>
                   
                  </div> 
                  <div class="gap-80"></div>
                   
                  
                   
               </div> 
            </div>

         </div>
      </div>
      </section>