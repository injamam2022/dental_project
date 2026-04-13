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
                    <li>Service Details</li>
                </ul>
            </div>
        </div>
</section>

<div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
                    <div class="service-detail">
                        <div class="inner-box">
                            <?php
                                if($IndividualService){
                                    foreach($IndividualService as $Service){
                            ?>
                            <div class="image-box">
                                <div class="single-item-carousel owl-carousel owl-theme">
                                    <?php
                                        $pro_images = explode(",",$Service->pro_image);
                                        foreach($pro_images as $pro_image){
                                    ?>
                                        <figure class="image"><img src="<?php echo base_url('admin/webroot/uploads/product/').$pro_image; ?>" alt=""></figure>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <h2><?php echo $Service->product_name; ?></h2>
                            <div class="text">
                                <?php echo $Service->product_description; ?>
                            </div>
                            <?php
                                if($Service->icon != '' || $Service->icon != null){
                            ?>
                                <div class="text download">
                                    <a href="<?php echo base_url('admin/webroot/uploads/product_icon').'/'.$Service->icon;?>" download="Other Doc" > Download datasheet
										<img src="<?php echo base_url('admin/webroot/uploads/product/download.png'); ?>" alt="Smiley face" height="100" width="150">
									
									</a>
                                </div>
                            <?php
                                }
                            ?>
                            <?php
                                    }
                                }
                            ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

