<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title><?php echo $this->website['data']->company_name;?> </title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <!--<link rel="icon" href="<?php echo site_url('webroot'); ?>/uploads/logo_fab/<?php echo $this->website['data']->company_favicon;?>" type="image/x-icon" />-->
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo site_url('webroot/backend') ?>/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        <div class="login-container lightmode">
		<?php $message = $this->session->flashdata('alert');
           if($message){ echo "<script language=javascript> window.onload = function(msg) { noty({text: '".$message['message']."', layout: 'topRight', type: '".$message['class']."'}); };</script>"; } ?>
		   
            <div class="login-box animated fadeInDown">
              <!--   <div class="login-logo"></div>  -->
                <div class="login-body">
                    <div class="login-title text-center"><?php echo $this->website['data']->company_name;?><strong> <br/>Admin LogIn</strong></div>
                    <form id="login_form" action="<?php echo site_url('login/verify'); ?>" class="form-horizontal" method="post">
					
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="user_email" class="form-control" placeholder="E-mail"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <!--<div class="col-md-6">
                            <a href="#" data-toggle="modal" data-target="#modal_small" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>-->
                        <div class="col-md-6">
							<button type="button" value="Log In" class="btn btn-info btn-block login_form_btn">Log In</button> 
                        </div>
                    </div>
            
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left"> &copy; Decode Infotech </div>
                    <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </div>
            
        </div>
       <!---- START Forgot Password--->
		<div class="modal" id="modal_small" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog modal-sm" style="margin-top:8%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="smallModalHead">Forgot Password ?</h4>
                    </div>
					<div style="text-align: center; padding-top: 16%; position: absolute; width: 100%; z-index: 9999;">
                       <img id="loading-image" src="<?php echo site_url();?>webroot/backend/img/loaders/default.gif" style="display:none;"/>
                    </div>
					 <form class="form-horizontal" method="post" action="">
                    <div class="modal-body">
                       <p>Please enter your Mobile or e-mail address & we will send you a new password your email id.</p>
					          <div id="form-group" class="form-group">
                                        <label class="col-xs-12">Enter your Mobile or Email</label>
                                        <div class="col-xs-12">  
                                                <input type="text" id="email" name="email_or_mobile" placeholder="Enter your Mobile or Email" class="form-control field"/> 
                                                <span class="text-danger" id="has-error"></span>												
                                        </div>
                                    </div>
						<input type="hidden" id="hiturl" value="<?php echo site_url('login/forgot_password');?>">			
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary validate">Submit</button>                        
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                        
                    </div>
					</form>
                </div>
            </div>
        </div>   
<input type="hidden" id="siteurl" value="<?php echo site_url(); ?>">		
	   <!---- END Forgot Password--->
		
		    <!-- START SCRIPTS -->
            <!-- START PLUGINS -->
			
            <script type="text/javascript" src="<?php echo site_url('webroot');?>/backend/js/plugins/jquery/jquery.min.js"></script>
            <script type="text/javascript" src="<?php echo site_url('webroot');?>/backend/js/plugins/jquery/jquery-ui.min.js"></script>
            <script type="text/javascript" src="<?php echo site_url('webroot');?>/backend/js/plugins/bootstrap/bootstrap.min.js"></script>
<script type='text/javascript' src="<?php echo site_url('webroot/backend') ?>/js/plugins/jquery-validation/jquery.validate.js"></script>			
            <!-- END PLUGINS -->
			
		    <!-- THIS PAGE PLUGINS -->
            <script type='text/javascript' src='<?php echo site_url('webroot');?>/backend/js/plugins/noty/jquery.noty.js'></script>
            <script type='text/javascript' src='<?php echo site_url('webroot');?>/backend/js/plugins/noty/layouts/topRight.js'></script>            
            <script type='text/javascript' src='<?php echo site_url('webroot');?>/backend/js/plugins/noty/themes/default.js'></script>
            <script type='text/javascript' src='<?php echo site_url('webroot');?>/backend/js/customvalidation.js'></script>
           
            <!-- END PAGE PLUGINS -->+
<div id="MjVerifyOtpModal" class="modal fade" data-backdrop="static" role="dialog" keyboard="false" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title"> Verify Your Otp </h4>
      </div>
	  <form action="#" id="verifymjotp" method="POST" >
      <div class="modal-body">
        <p class="verifymyotperror" style="color:red;" ></p>
        <p class="verifymyotpsuccess" style="color:green;" ></p>
		<p class="sendmessage"  style="color:green;" ></p>
		
		<div class="row">
		<div class="col-md-12">
		<input type="text" name="verifyotp" class="form-control verifyotp" data-validation="required" data-validation-error-msg="Please Enter Vaild Otp" autocomplete="off" placeholder="Please Enter Your Enter Otp Here"  >
		</div>
		<div class="row">
		<div class="col-md-6">
		<input value="Verify" class="btn btn-primary checkmjotp center-block" style="margin-top: 20px;" type="button">
		</div>
		
		</div>
		</div>
      </div>
     </form>
    </div>

  </div>
</div>			
<script>
$(".login_form_btn").click(function(){	
$('.login_form_btn').attr('disabled','disabled');
$("#login_form").submit();
});
/* ----------------------- otp Verify start ------------------*/
$(".checkmjotp").click(function(){
$('.sendmessage').text('');	
$('.verifymyotperror').text('');	
$('.verifymyotpsuccess').text('');
var siteurl=$("#siteurl").val();
$.ajax({			
url: siteurl+'login/verifyotp',
type: "POST",
dataType: "json",
data: $("#verifymjotp").serialize(),
success: function(getdata){				
if(getdata['type'] == "success"){
$('.verifymyotpsuccess').text(getdata['message']);
$('.verifyotp').val('');
$( "#login_form" ).submit();
}else{			
$('.verifymyotperror').text(getdata['message']);
}
}
});		
});	
/* ----------------------- otp Verify  End ------------------*/
</script>

    </body>
</html>
