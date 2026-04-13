<?php 
$banner = $banner_details[0];
//echo "<pre>";print_r(GetServices());
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
                    <li>Service & Product</li>
                </ul>
            </div>
        </div>
</section>

<section class="blog-section baal">
    
    <h1></h1>
        <div class="auto-container">
			
			<?php    
            
           
          
            if($Services){ ?>
            <div class="row">
              
                <?php
				
                 
                        foreach($Services as $Service){
                ?>
                <div class="news-block-two col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="<?php echo base_url('admin/webroot/uploads/product/').$Service->pro_image; ?>" alt=""></figure>

                        </div>
                        <div class="caption-box">
                            <div class="inner">
                                <h3><a href="<?php echo base_url('Services/').$Service->pro_id.'/0/detail';?>"><?php echo $Service->product_name; ?></a></h3>
                                <p><?php  echo substr($Service->product_description,0,400)."....read more"; ?>
                                
                                
                               
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    
                ?>

            </div>

            
			<?php } else { ?>
			
			
			<h2> No Data Found </h2>
			<?php }   ?>
            
            
             
            
            
           
			
        </div>
    
    
    
    </section>
