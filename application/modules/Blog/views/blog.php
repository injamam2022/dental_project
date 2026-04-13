<?php
    $banner = $banner_details[0];
?>

 
    <section class="page-title" style="background-image:url(<?php echo site_url('admin/webroot/uploads/banner/'.$banner->image_name);?>);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h2><?php echo $banner->image_seo_title; ?></h2>
                    <span class="title"><?php echo $banner->image_url_link; ?></span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="#">Home</a></li>
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
                
                  for($i=0;$i<count($blog_details);$i++)
                  {
                         ?>
                        
                        <div class="news-block-two wow fadeIn">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"> <a href="<?php echo base_url('Blog/blogdetails/'.$blog_details_asc[$i]->id); ?>"><img src="<?php echo base_url('/admin/webroot/uploads/blog/'.$blog_details[$i]->blog_image); ?>" alt=""></a></figure>
                                </div>
                                <div class="caption-box">
                                    <div class="inner">
                                        <h3><a href="<?php echo base_url('Blog/blogdetails/'.$blog_details_desc[$i]->id); ?>"><?php echo $blog_details[$i]->post_title; ?></a></h3>
                                        <ul class="info">
                                            <li><?php  echo $deadline = date('d', strtotime($blog_details[$i]->dat)); ?>,<?php echo $deadline = date('Y', strtotime($blog_details[$i]->dat)); ?></li>
                                            <li><a href="#">By <?php echo $blog_details[$i]->posted; ?></a></li>
                                        </ul>
                                        <div class="text"><?php echo substr($blog_details[$i]->summernote, 0, 800);    ?>...more</div>
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
    
                           
                           for($z=0;$z<count($blog_details_desc);$z++)
                           {
                               ?>  
                                <article class="post">
                                    <div class="post-thumb"> <a href="<?php echo base_url('Blog/blogdetails/'.$blog_details_desc[$z]->id); ?>"><img src="<?php echo base_url('/admin/webroot/uploads/blog/'.$blog_details_desc[$z]->blog_image); ?>" alt=""></a></div>
                                    <h3> <a href="<?php echo base_url('Blog/blogdetails/'.$blog_details_desc[$z]->id); ?>"><?php echo  $blog_details_desc[$z]->post_title; ?></a></h3>
                                    <div class="post-info">by <?php echo $blog_details_desc[$z]->posted; ?></div>
                                </article>
                                
                        <?php } ?>

                            </div>
                        </div>
             
                    </aside>
                </div>
            </div>
        </div>
    </div>
