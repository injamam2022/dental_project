<?php
    $banner = $banner_details[0];
?>
   
    <section class="page-title" style="background-image:url(<?php echo site_url('admin/webroot/uploads/banner/'.$banner->image_name);?>);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1><?php echo $banner->image_seo_title; ?></h1>
                    <span class="title"><?php echo $banner->image_url_link; ?></span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="#">Home</a></li>
                    <li>Gallery</li>
                </ul>
            </div>
        </div>
    </section>

  <section class="projects-section alternate gallery_sec">
        <div class="auto-container">
            <div class="mixitup-gallery">
                                
                <div class="filter-list row">
                    
                    
                     <?php
                    
                 
                    
                    for($i=0;$i<count($gallery_details);$i++)
                    {
                        
                        if($gallery_details[$i]->image_category == 2)
                        {
                      ?>
                    <div class="project-block all mix interior architecture landescape col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="image-box">
                            <figure class="image">
                            	<img src="<?php echo base_url('admin/webroot/uploads/banner/').$gallery_details[$i]->image_name; ?>" alt="">
                            </figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="<?php echo base_url('admin/webroot/uploads/banner/').$gallery_details[$i]->image_name; ?>" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                        }
                        
                         if($gallery_details[$i]->image_category == 1)
                        {
                        ?>
                    <div class="project-block all mix landescape architecture col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="image-box">
                            <iframe width="400" height="300" src="<?php echo $gallery_details[$i]->youtube_url_link ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" ></iframe>
                           
                        </div>
                    </div>
                    
                    <?php } } ?>

                </div>
            </div>

        </div>
    </section>

