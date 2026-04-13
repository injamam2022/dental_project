<div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Error Page</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="<?php echo site_url(); ?>">HOME</a></li>
                    <li class="active">Error Page</li>
                </ul>
            </div>
        </div>
		
		
<section id="content" class="gray-area">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sm-8 col-md-9">
                        <div class="booking-information travelo-box" style="padding: 30px 30px 50px 25px;">
						<?php $error=explode('-',$errormsg);?>
                            <h2>Error Message At <?php echo $error[0]; ?></h2>
                            <hr>
                            <div class="booking-confirmation clearfix">
                                <i class="soap-icon-error icon circle"></i>
                                <div class="message">
                                    <h4 class="main-message"><?php echo $error[1]; ?></h4>
                                    <p>If Any Issue Please Contact Administrator . </p>
                                </div>
                              
                            </div>
                            <hr>
                            
                        </div>
                    </div>
                    <div class="sidebar col-sm-4 col-md-3">
                        <div class="travelo-box contact-box">
                            <h4>Need <?php echo $this->website['data']->company_name;?> Help?</h4>
                            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> <?php echo $this->website['data']->support_contact;?>-HELLO</span>
                                <br>
                                <a class="contact-email" href="#"><?php echo $this->website['data']->support_email;?></a>
                            </address>
                        </div>
                       
                    </div>
                </div>
            </div>
        </section>		