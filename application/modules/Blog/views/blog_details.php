<?php
    $banner = (isset($banner_details[0])) ? $banner_details[0] : null;
    $banner_fallback = base_url('admin/webroot/uploads/blog/blog-dental-pexels-3845624.jpg');
    $banner_img = ($banner && !empty($banner->image_name))
        ? site_url('admin/webroot/uploads/banner/'.$banner->image_name)
        : $banner_fallback;
    $banner_title = ($banner && !empty($banner->image_seo_title)) ? $banner->image_seo_title : 'Blog Details';
    $banner_subtitle = ($banner && !empty($banner->image_url_link)) ? $banner->image_url_link : 'Latest insights, updates, and care tips from our specialists';
?>
<style>
.dontia-blog-detail-banner {
    position: relative;
    overflow: hidden;
}
.dontia-blog-detail-banner::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(120deg, rgba(34, 27, 21, 0.76), rgba(34, 27, 21, 0.42));
}
.dontia-blog-detail-banner .auto-container,
.dontia-blog-detail-banner .inner-container {
    position: relative;
    z-index: 1;
}
</style>

<section class="page-title dontia-blog-detail-banner" style="background-image:url(<?php echo htmlspecialchars($banner_img, ENT_QUOTES, 'UTF-8'); ?>);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h2><?php echo htmlspecialchars($banner_title, ENT_QUOTES, 'UTF-8'); ?></h2>
                    <span class="title"><?php echo htmlspecialchars($banner_subtitle, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('blogs'); ?>">Blog</a></li>
                    <li>Blog Details</li>
                </ul>
            </div>
        </div>
</section>

    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-detail">
                        <div class="news-block-two">
                            <div class="inner-box">
                                <?php
                                    if($single_data){
                                        foreach($single_data as $blog){
                                ?>
                                <div class="image-box">
                                    <figure class="image"><img src="<?php echo base_url('/admin/webroot/uploads/blog/'.$blog->blog_image); ?>" alt=""></figure>
                                </div>
                                <div class="caption-box">
                                    <div class="inner">
                                        <h3><?php echo $blog->post_title; ?></h3>
                                        <ul class="info">
                                            <li><?php echo $blog->tag; ?>,</li>
                                            <li><a href="#"><?php echo $blog->posted; ?>,</a></li>
                                        </ul>
										<p> <?php echo $blog->summernote; ?></p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                       <?php
                                        }
                                    }
                        ?>
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

