 
<?php
$this->load->helper('dontia_performance');
$_dcc_router_class_footer = strtolower((string) $this->router->fetch_class());
$dental_lite_scripts = ($_dcc_router_class_footer === 'dental');
$home_lite_scripts = ($_dcc_router_class_footer === 'home');
$w = isset($this->website['data']) ? $this->website['data'] : new stdClass();
$company = isset($w->company_name) ? trim((string) $w->company_name) : '';
$company_esc = htmlspecialchars($company !== '' ? $company : 'Clinic', ENT_QUOTES, 'UTF-8');
$phone_raw = isset($w->support_contact) ? (string) $w->support_contact : '';
$phones = array_values(array_filter(array_map('trim', preg_split('/[\n\r|]+/', $phone_raw, -1, PREG_SPLIT_NO_EMPTY))));
if (count($phones) === 0 && trim($phone_raw) !== '') {
    $phones = array(trim($phone_raw));
}
$email = isset($w->support_email) ? trim((string) $w->support_email) : '';
$addr1 = isset($w->address) ? trim((string) $w->address) : '';
$addr2 = isset($w->corporate_address) ? trim((string) $w->corporate_address) : '';
$copy = isset($w->copy_right) ? trim((string) $w->copy_right) : ('© ' . date('Y') . ' ' . $company_esc);
$brand_logo_url = base_url('assets/images/branding/preloader-logo-200w.png');
$dontia_footer_social = array(
    array('link' => isset($w->instagram_link) ? trim((string) $w->instagram_link) : '', 'icon' => 'fa-instagram', 'label' => 'Instagram'),
    array('link' => isset($w->youtube_link) ? trim((string) $w->youtube_link) : '', 'icon' => 'fa-youtube-play', 'label' => 'YouTube'),
    array('link' => isset($w->linkedin_link) ? trim((string) $w->linkedin_link) : '', 'icon' => 'fa-linkedin', 'label' => 'LinkedIn'),
);
?>
    <footer class="main-footer dontia-footer">
        <div class="auto-container">
            <div class="widgets-section dontia-footer-widgets">
                <div class="row dontia-footer-row">
                    <div class="col-xl-4 col-lg-6 col-md-12 dontia-footer-brand-col">
                        <div class="dontia-footer-brand">
                            <a href="<?php echo base_url(); ?>" class="dontia-footer-logo-link">
                                <img src="<?php echo htmlspecialchars($brand_logo_url, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo $company_esc; ?>" width="200" height="155" loading="lazy" decoding="async">
                            </a>
                            <p class="dontia-footer-tagline"><?php echo $company_esc; ?></p>
                            <p class="dontia-footer-about">
                                We offer a wide range of dental and skin care services. For appointments or questions, reach us by phone or email—we are happy to help.
                            </p>
                            <ul class="dontia-footer-contact-inline">
                                <?php foreach ($phones as $p) { ?>
                                <li><a href="tel:<?php echo preg_replace('/\s+/', '', $p); ?>"><i class="fa fa-phone" aria-hidden="true"></i><?php echo htmlspecialchars($p, ENT_QUOTES, 'UTF-8'); ?></a></li>
                                <?php } ?>
                                <?php if ($email !== '') { ?>
                                <li><a href="mailto:<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 dontia-footer-locations-col">
                        <h2 class="dontia-footer-heading">Reach us at</h2>
                        <div class="dontia-footer-locations">
                            <?php if ($addr1 !== '') { ?>
                            <div class="dontia-footer-location">
                                <span class="dontia-footer-location-label">Registered office</span>
                                <p><?php echo htmlspecialchars($addr1, ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                            <?php } ?>
                            <?php if ($addr2 !== '') { ?>
                            <div class="dontia-footer-location">
                                <span class="dontia-footer-location-label">Corporate office</span>
                                <p><?php echo htmlspecialchars($addr2, ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                            <?php } ?>
                            <?php if ($addr1 === '' && $addr2 === '') { ?>
                            <p class="dontia-footer-muted">Add addresses in Admin → Website settings.</p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-12 dontia-footer-links-col">
                        <h2 class="dontia-footer-heading">Useful links</h2>
                        <ul class="dontia-footer-links">
                            <li><a href="<?php echo base_url('best-dental-clinic-in-kolkata'); ?>">Dental</a></li>
                            <li><a href="<?php echo base_url('about-us'); ?>">About</a></li>
                            <li><a href="<?php echo base_url('blogs'); ?>">Blog</a></li>
                            <li><a href="<?php echo base_url('Gallery'); ?>">Gallery</a></li>
                            <li><a href="<?php echo base_url('contact-us'); ?>">Contact us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom dontia-footer-bottom">
            <div class="auto-container">
                <div class="inner-container clearfix dontia-footer-bottom-inner">
                    <div class="copyright-text dontia-footer-copyright">
                        <p><?php echo htmlspecialchars($copy, ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="social-links dontia-footer-social">
                        <ul class="dontia-footer-social-list">
                            <?php foreach ($dontia_footer_social as $soc) {
                                $href = $soc['link'];
                                if ($href === '') {
                                    continue;
                                }
                                $h = htmlspecialchars($href, ENT_QUOTES, 'UTF-8');
                                ?>
                            <li>
                                <a href="<?php echo $h; ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo htmlspecialchars($soc['label'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <i class="fa <?php echo $soc['icon']; ?>" aria-hidden="true"></i>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-o-up"></span></div>
<?php $_dcc_assets = rtrim(base_url('assets/'), '/') . '/'; ?>
<script defer src="<?php echo $_dcc_assets; ?>js/jquery.js"></script>
<script defer src="<?php echo $_dcc_assets; ?>js/popper.min.js"></script>
<script defer src="<?php echo $_dcc_assets; ?>js/bootstrap.min.js"></script>
<script defer src="<?php echo $_dcc_assets; ?>js/dontia-appointment-modal.js"></script>
<?php if (empty($dental_lite_scripts) && empty($home_lite_scripts)) { ?>
<script defer src="<?php echo $_dcc_assets; ?>js/owl.js"></script>
<?php } elseif (!empty($home_lite_scripts)) { ?>
<script>window.__dontiaOwlSrc=<?php echo json_encode($_dcc_assets . 'js/owl.js'); ?>;</script>
<?php } ?>
<?php if (empty($dental_lite_scripts) && empty($home_lite_scripts)) { ?>
<script defer src="<?php echo $_dcc_assets; ?>js/wow.js"></script>
<script defer src="<?php echo $_dcc_assets; ?>js/appear.js"></script>
<script defer src="<?php echo $_dcc_assets; ?>js/jquery.fancybox.js"></script>
<script defer src="<?php echo $_dcc_assets; ?>js/mixitup.js"></script>
<script defer src="<?php echo $_dcc_assets; ?>js/slick.js"></script>
<?php } ?>
<script defer src="<?php echo $_dcc_assets; ?>js/script.js"></script>
<?php if (empty($dental_lite_scripts) && empty($home_lite_scripts)) { ?>
<script defer src="<?php echo $_dcc_assets; ?>js/color-settings.js"></script>
<?php } ?>
<script defer>
document.addEventListener('DOMContentLoaded', function () {
	if (typeof jQuery === 'undefined') {
		return;
	}
	if (jQuery('.product-slide').length) {
		jQuery('.product-slide').slick({
			dots: false,
			autoplay: true,
			infinite: true,
			speed: 300,
			slidesToShow: 3,
			slidesToScroll: 1,
			responsive: [{
					breakpoint: 1025,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 850,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});
	}
	(function ($) {
		var $sec = $('.dontia-services-section');
		if (!$sec.length) return;
		$sec.on('click', '.dontia-services-tab[data-target]', function () {
			var $t = $(this);
			var id = $t.attr('data-target');
			if (!id) return;
			$sec.find('.dontia-services-tab[role="tab"]').removeClass('is-active').attr('aria-selected', 'false');
			$t.addClass('is-active').attr('aria-selected', 'true');
			$sec.find('.dontia-services-panel').attr('hidden', true);
			$sec.find('#' + id).removeAttr('hidden');
		});
	})(jQuery);
});
</script>
<script>
window.addEventListener('load', function () {
	(function (c, l, a, r, i, t, y) {
		c[a] = c[a] || function () { (c[a].q = c[a].q || []).push(arguments); };
		t = l.createElement(r);
		t.async = 1;
		t.src = 'https://www.clarity.ms/tag/' + i;
		y = l.getElementsByTagName(r)[0];
		y.parentNode.insertBefore(t, y);
	})(window, document, 'clarity', 'script', 'wrx8wpb91v');
}, { once: true });
</script>





<?php
$flash_message = $this->session->flashdata('message');
if ($flash_message != '') {
?>
<div class="modal fade" id="flashMessageModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title">Message</h4>
            </div>
            <div class="modal-body"><?php echo $flash_message; ?></div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof jQuery !== 'undefined' && jQuery('#flashMessageModal').length) {
        jQuery('#flashMessageModal').modal('show');
    }
});
</script>
<?php } ?>
</body>


</html>
