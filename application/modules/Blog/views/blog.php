<?php
    $banner = (isset($banner_details[0])) ? $banner_details[0] : null;
    $dontia_banner_plain = static function ($raw, $fallback) {
        $s = html_entity_decode((string) $raw, ENT_QUOTES, 'UTF-8');
        $s = trim(preg_replace('/\s+/', ' ', strip_tags($s)));
        return $s !== '' ? $s : $fallback;
    };
    $banner_img = base_url('assets/images/skin-care/' . rawurlencode('Why Choose Dontia Care Clinic for Skin Treatment in Kolkatadontia-care-clinic-skin-and-hair-treatment-room (1).JPG'));
    $banner_title = $dontia_banner_plain(($banner && isset($banner->image_seo_title)) ? $banner->image_seo_title : '', 'Our Blog');
    $banner_subtitle = $dontia_banner_plain(($banner && isset($banner->image_url_link)) ? $banner->image_url_link : '', 'Learn more about dental health and treatments');
?>
<style>
.page-wrapper .page-title.dontia-blog-hero .title-box {
    background: none !important;
    background-color: transparent !important;
    padding: 0 !important;
    float: none;
    max-width: min(520px, 90%);
}
.page-wrapper .page-title.dontia-blog-hero .title-box h2,
.page-wrapper .page-title.dontia-blog-hero .title-box .title {
    color: #fff !important;
    text-shadow: 0 2px 14px rgba(0,0,0,.65) !important;
}
.page-wrapper .page-title.dontia-blog-hero .title-box h2 {
    margin: 0 0 8px;
    font-size: clamp(26px, 3.2vw, 36px);
    line-height: 1.2;
}
.page-wrapper .page-title.dontia-blog-hero .title-box .title {
    font-size: 16px;
    line-height: 1.45;
}
</style>
    <section class="page-title dontia-blog-hero" style="background-image:url('<?php echo htmlspecialchars($banner_img, ENT_QUOTES, 'UTF-8'); ?>');">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h2><?php echo htmlspecialchars($banner_title, ENT_QUOTES, 'UTF-8'); ?></h2>
                    <span class="title"><?php echo htmlspecialchars($banner_subtitle, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li>Blogs</li>
                </ul>
            </div>
        </div>
    </section>
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-classic">
                         <?php 
                
                  $blog_rows = is_array($blog_details) ? $blog_details : array();
                  for($i=0;$i<count($blog_rows);$i++)
                  {
                         $permalink = strtolower(trim((string) $blog_rows[$i]->Permalink));
                         $permalink = preg_replace('/[^a-z0-9\s-]/', '', $permalink);
                         $permalink = trim(preg_replace('/[\s-]+/', '-', $permalink), '-');
                         $url = $permalink !== '' ? base_url('blog/'.$permalink) : base_url('Blog/blogdetails/'.$blog_rows[$i]->id);
                         ?>
                        
                        <div class="news-block-two wow fadeIn">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"> <a href="<?php echo $url; ?>"><img src="<?php echo base_url('/admin/webroot/uploads/blog/'.$blog_rows[$i]->blog_image); ?>" alt=""></a></figure>
                                </div>
                                <div class="caption-box">
                                    <div class="inner">
                                        <h3><a href="<?php echo $url; ?>"><?php echo $blog_rows[$i]->post_title; ?></a></h3>
                                        <ul class="info">
                                            <li><?php  echo $deadline = date('d', strtotime($blog_rows[$i]->dat)); ?>,<?php echo $deadline = date('Y', strtotime($blog_rows[$i]->dat)); ?></li>
                                            <li><a href="#">By <?php echo $blog_rows[$i]->posted; ?></a></li>
                                        </ul>
                                        <div class="text"><?php echo substr($blog_rows[$i]->summernote, 0, 800);    ?>...more</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                   <?php } ?>

                    </div>

                </div>
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar default-sidebar">
                        <div class="sidebar-widget latest-news">
                            <div class="sidebar-title"><h3>Recent Post</h3></div>
                            <div class="widget-content">
                                
                               <?php
    
                           
                           $recent_posts = is_array($blog_details_desc) ? $blog_details_desc : array();
                           for($z=0;$z<count($recent_posts);$z++)
                           {
                               $permalink = strtolower(trim((string) $recent_posts[$z]->Permalink));
                               $permalink = preg_replace('/[^a-z0-9\s-]/', '', $permalink);
                               $permalink = trim(preg_replace('/[\s-]+/', '-', $permalink), '-');
                               $url = $permalink !== '' ? base_url('blog/'.$permalink) : base_url('Blog/blogdetails/'.$recent_posts[$z]->id);
                               ?>  
                                <article class="post">
                                    <div class="post-thumb"> <a href="<?php echo $url; ?>"><img src="<?php echo base_url('/admin/webroot/uploads/blog/'.$recent_posts[$z]->blog_image); ?>" alt=""></a></div>
                                    <h3> <a href="<?php echo $url; ?>"><?php echo  $recent_posts[$z]->post_title; ?></a></h3>
                                    <div class="post-info">by <?php echo $recent_posts[$z]->posted; ?></div>
                                </article>
                                
                        <?php } ?>

                            </div>
                        </div>
             
                    </aside>
                </div>
            </div>
        </div>
    </div>
