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
                    <li>Our clients</li>
                </ul>
            </div>
        </div>
</section>

<section class="news-section client_sec">
        <div class="auto-container">
            <div class="sec-title">
                <span class="float-text">Clients</span>
                <h2>Our Clients</h2>
            </div>
            <div class="row">
                <?php
                    if(count($partner_page_con)>0){
                        foreach($partner_page_con as $partner){
                ?>
                <div class="news-block col-lg-2 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="<?php echo site_url('admin/webroot/uploads/partner/'.$partner->image_name);?>" alt=""></figure>
                        </div>
                       
                    </div>
                </div>
                <?php
                        }
                    }
                ?>

            </div>
        </div>
    </section>

