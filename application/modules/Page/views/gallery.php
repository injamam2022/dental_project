
   <div class="banner-area bg-overlay" id="banner-area" style="background-image:url(<?php echo base_url('assets/images/banner/about_banner.jpg'); ?>">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="banner-heading">
                  <h1 class="banner-title">Project <span>Gallery</span></h1>
                  <ol class="breadcrumb">
                     <li>Home</li>
                     <li><a href="#">Gallery</a></li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
   </div>

    <section id="main-container" class="main-container">
        <div class="ts-gallery">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section-title">
                            <span>Work</span> Gallery
                        </h2>
                    </div>
                </div>
                
                

                
                <div class="col-lg-6 col-md-6">

                  <div class="sidebar sidebar-left">

                     <div class="widget no-padding no-border">
                      
                         <a href="javascript:void('null');" class="btn btn-primary" onclick="hideshowmagic('images');">Images</a>
                         <a href="javascript:void('null');" class="btn btn-primary" onclick="hideshowmagic('videos');"> Videos</a>
                           
                     </div>

                   
             

                  </div>
               </div>
                
                
                
                
                
    
                <div class="row" id="images_div">
                    
                    <?php
                    
                 
                    
                    for($i=0;$i<count($gallery_details);$i++)
                    {
                        
                        if($gallery_details[$i]->image_category == 2)
                        {
                      ?>
                    <div class="col-lg-4 col-md-6">
                  <div class="img-gallery img-gallery--image">
                     <a class="gallery-popup" href="<?php echo base_url('admin/webroot/uploads/banner/').$gallery_details[$i]->image_name; ?>" title="Image 1">
                        <img class="" src="<?php echo base_url('admin/webroot/uploads/banner').'/'.$gallery_details[$i]->image_name;?>" alt="">
                           <div class="gallery-content">
                                
                           </div>
                     </a>
                  </div>
                  </div>
                    <?php
                        }
                        
                        
                    }
                    
                    
                    ?>
                    
                  
                </div>
                
                
                
                <div class="row" id="youtube_div" style="display:none;">
                    
                    <?php
                    
                 
                    
                    for($i=0;$i<count($gallery_details);$i++)
                    {
                        
                        
                         if($gallery_details[$i]->image_category == 1)
                        {
                        ?>
                    <div class="col-lg-4 col-md-6">
                  <div class="img-gallery img-gallery--video">
                        <iframe src="<?php echo $gallery_details[$i]->youtube_url_link ?>" title="Gallery video" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
                   
                  </div>  
                  </div>
                       
                    <?php     
                         }
                    }
                    
                    
                    ?>
                    
                  
                </div>
                
                
            </div>
        </div>
    </section>