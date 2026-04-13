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
                    <li>Career</li>
                </ul>
            </div>
        </div>
    </section>
   

  <section class="projects-section career_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="dtls">
                    <h2>Career</h2>
                    <p><?php echo $carrer_details[0]->carrer_content;?></p>
                </div>
            </div>
            <div class="col-md-4">
				<div class="imgclass">
					<div class="image-box" style="padding-top: 0px;">
						<img src="<?php echo site_url('admin/webroot/uploads/carrer/'.$carrer_details[0]->carrer_image);?>" alt="">
					</div>
				</div>
            </div>
        </div>
    </div>

  </section>
<section class="projects-section career_form">
     <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="head">
                    <h4>Just drop by your resume and details.You could be hearing from us soon.</h4>
                </div>
                <form method="post" action="<?php echo base_url();?>Career/career_submit" enctype="multipart/form-data">
                <div class="form">
                    <div class="row">
                        <div class="col-md-4">
                            <p>Your Name</p>
                            <input type="text" placeholder="Name" name="name" required="">
                        </div>
                        <div class="col-md-4">
                            <p>Your Email</p>
                            <input type="text" placeholder="Email" name="email" required="">
                        </div>
                        <div class="col-md-4">
                             <p>Phone Number</p>
                            <input type="text" placeholder="Phone Number" name="mobile" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Current Company Name</p>
                            <input type="text" placeholder="Current Company Name" name="current_company_name" required="">
                        </div>
                        <div class="col-md-6">
                            <p>What You are?</p>
                            <input type="text" placeholder="What You are" name="designation" required="">
                        </div>
                    </div>
                     <div class="row">
                         <div class="col-md-6">
                            <p>Experience</p>
                            <select name="experience" required="">
                                <option value="0-6 Months">0-6 Months</option>
                                <option value="0.6-1 Year">0.6-1 Year</option>
                                <option value="1-3 Year">1-3 Year</option>
                                <option value="3 > Year">3 > Year</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <p>Date of Birth</p>
                            <input type="date" placeholder="mm/dd/yyyy" name="dob" required="">
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12">
                             <p>Upload Your Resume</p>
                            <input type="file" placeholder="Cloose your resume" name="resume[]" required="" multiple >
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                             <p>Your Messege</p>
                            <textarea placeholder="Your Messege" name="message" required=""></textarea>
                        </div>
                     </div>
                    <input type="hidden" value="QuickQuery" name="type">
                     <div class="row">
                        <div class="col-md-12">
                            <div class="form_button">
                                <ul>
                                   
                                    <li><button type="submit">Submit</button></li>
                                   
                                        
                                </ul>
                            </div>
                        </div>
                     </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    
</section>




