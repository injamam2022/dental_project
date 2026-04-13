 </div>
 </div>
 
        <!-- END PAGE CONTAINER -->
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container" style="background: rgb(158, 157, 157) !important;">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if you want to continue work. Press Yes to Signout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="<?php echo site_url('login/logout') ?>" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
		
        <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?php echo site_url('webroot/backend') ?>/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="<?php echo site_url('webroot/backend') ?>/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
		
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->
 
        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='<?php echo site_url('webroot/backend') ?>/js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='<?php echo site_url('webroot/backend') ?>/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='<?php echo site_url('webroot/backend') ?>/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='<?php echo site_url('webroot/backend') ?>/js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/owl/owl.carousel.min.js"></script>      
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/daterangepicker/daterangepicker.js"></script>
		<script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/fullcalendar/fullcalendar.min.js"></script>
		<script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
		<script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/smartwizard/jquery.smartWizard-2.0.min.js"></script>    
	<script type='text/javascript' src="<?php echo site_url('webroot/backend') ?>/js/plugins/jquery-validation/jquery.validate.js"></script>
    <script type='text/javascript' src="<?php echo site_url('webroot/backend') ?>/js/plugins/maskedinput/jquery.maskedinput.min.js"></script>	
    <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/summernote/summernote.js"></script>
    <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/tableexport/tableExport.js"></script>
	<script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/tableexport/jquery.base64.js"></script>
	<script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/tableexport/html2canvas.js"></script>
	<script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
	<script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/tableexport/jspdf/jspdf.js"></script>
	<script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/tableexport/jspdf/libs/base64.js"></script>   <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins/dropzone/dropzone.min.js"></script> 		
		
        <!-- END THIS PAGE PLUGINS-->        
		
		<!-- THIS Notifications PLUGINS -->
            <script type='text/javascript' src='<?php echo site_url('webroot');?>/backend/js/plugins/noty/jquery.noty.js'></script>
            <script type='text/javascript' src='<?php echo site_url('webroot');?>/backend/js/plugins/noty/layouts/topRight.js'></script>            
            <script type='text/javascript' src='<?php echo site_url('webroot');?>/backend/js/plugins/noty/themes/default.js'></script>
			
           
        <!-- END Notifications PLUGINS -->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/settings.js"></script>
        
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/plugins.js"></script>        
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/actions.js"></script>
		<script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/demo_icons.js"></script>
	
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/demo_dashboard.js"></script>
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/customvalidation.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
        <script type="text/javascript" src="<?php echo site_url('webroot/backend') ?>/js/product.js"></script>



<script type="text/javascript" src="<?php echo site_url('') ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo site_url('') ?>ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="<?php echo site_url('') ?>webroot/backend/js/custom.js"></script>
		<script>
		$.validate({lang: 'en',modules : 'security'});    
		</script>

        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>

