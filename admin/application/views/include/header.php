<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Admin | <?php echo $this->website['data']->company_name;?></title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />        
        <?php
        $fab = isset($this->website['data']->company_favicon) ? trim((string) $this->website['data']->company_favicon) : '';
        if ($fab !== '') {
            $fav_href = site_url('webroot/uploads/logo_fab/' . $fab);
            $ext = strtolower(pathinfo($fab, PATHINFO_EXTENSION));
            $fav_type = $ext === 'svg' ? 'image/svg+xml' : ($ext === 'png' ? 'image/png' : ($ext === 'gif' ? 'image/gif' : 'image/x-icon'));
        } else {
            $site_root = rtrim(preg_replace('#/admin/?$#', '', rtrim(base_url(), '/')), '/');
            $fav_href = $site_root . '/assets/images/favicon.svg';
            $fav_type = 'image/svg+xml';
        }
        ?>
        <link rel="icon" type="<?php echo htmlspecialchars($fav_type, ENT_QUOTES, 'UTF-8'); ?>" href="<?php echo htmlspecialchars($fav_href, ENT_QUOTES, 'UTF-8'); ?>">
        <link rel="apple-touch-icon" href="<?php echo htmlspecialchars($fav_href, ENT_QUOTES, 'UTF-8'); ?>">
        <!-- END META SECTION -->
        <?php
        // Appointments use a dedicated flash key so a failed redirect / 404 does not leave a generic
        // "Appointment deleted" toast showing on unrelated admin pages (e.g. Doctormanagement).
        $message = $this->session->flashdata('appointments_alert');
        if (!$message) {
            $message = $this->session->flashdata('alert');
        }
        if ($message && isset($message['message'], $message['class'])) {
            $toast_text = json_encode((string) $message['message'], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE);
            $toast_type = json_encode((string) $message['class'], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE);
            echo '<script>window.onload=function(){noty({text:' . $toast_text . ',layout:"topRight",type:' . $toast_type . '});};</script>';
        }
        ?>
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo site_url('webroot/backend') ?>/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
		<input type="hidden" id="js_url" value="<?php echo base_url();?>">
		<input type="hidden" id="admin_name" value="<?php echo $this->website['data']->company_name;?>">
		<?php $this->load->view('include/left_sidebar'); ?><div class="page-content">                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
				
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SIGN OUT -->
					
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-power-off"></span></a>                        
                    </li> 

                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-user"></span></a>
                      
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging" style="width: 221px !important;">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-user"></span> User </h3>        
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: auto; width: 221px !important;">

							<a class="list-group-item" href="<?php echo site_url('dashboard/changepassword');?>"> <span  class="fa fa-key"></span><strong>Change Password</strong> </a>
                            <a class="list-group-item" href="<?php echo site_url('dashboard/profile');?>"> <span class="fa fa-user"></span><strong> My Profile</strong> </a>
                           
						   </div>     
                                                       
                        </div>                        
                    </li>
                    <!-- END MESSAGES -->
                    <!-- TASKS -->
                    <li class="xn-icon-button pull-right">
                       
                        <a href="#"><span class="glyphicon glyphicon-cog"></span></a>
                        
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging" style="width: 221px !important;">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span  class="fa fa-tasks"></span> Site Settings</h3>   
                            </div>
                            <div class="panel-body list-group scroll" style="height: auto;width: 221px !important;">                                
                                
                                <a class="list-group-item" href="<?php echo site_url('dashboard'); ?>"> <span  class="fa fa-desktop"></span><strong>Dashboard</strong> </a>
                                <a class="list-group-item" href="<?php echo site_url('websitemanage');?>"> <span  class="fa fa-wrench"></span><strong>Website Setting</strong> </a>
                                <a class="list-group-item" href="<?php echo site_url('seo');?>"> <span  class="fa fa-search"></span><strong>SEO — pages</strong> </a>
                                              
                            </div>                               
                        </div>                        
                    </li>
				<li class="xn-icon-button pull-right">
				 <a href="<?php echo $this->website['data']->site_url;?>" target="_blank"><i class="fa fa-desktop"></i></a>
				 </li>
                    <!-- END TASKS -->
                </ul>
				
                <!-- END X-NAVIGATION VERTICAL -->  
   <script src="<?php echo site_url('webroot/backend') ?>/js/jquery-1.10.2.js"></script>
   <script src="<?php echo site_url('webroot/backend') ?>/js/jquery-ui.js"></script>				