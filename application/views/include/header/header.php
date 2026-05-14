<?php
$this->load->model('Seo_meta_model');
$_dcc_seo_ov = is_array($this->seo_overrides) ? $this->seo_overrides : array();
$seo = $this->Seo_meta_model->resolve($_dcc_seo_ov);
$h = static function ($s) {
	return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
};
$_dcc_br = rtrim(base_url('assets/images/branding/'), '/') . '/';
$brand_logo_url = $_dcc_br . 'preloader-logo-200w.png';
$header_logo_src = $_dcc_br . 'header-logo-96w.png';
$header_logo_160 = $_dcc_br . 'header-logo-160w.png';
$header_logo_240 = $_dcc_br . 'header-logo-240w.png';
$header_logo_480 = $_dcc_br . 'header-logo-480w.png';
$header_logo_srcset = $h($header_logo_src) . ' 96w, ' . $h($header_logo_160) . ' 160w, ' . $h($header_logo_240) . ' 240w, ' . $h($header_logo_480) . ' 480w';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php
$_dcc_preconnect_youtube = !empty($_dcc_seo_ov['preconnect_youtube']);
if (!$_dcc_preconnect_youtube && !empty($_dcc_seo_ov['lcp_preload_images']) && is_array($_dcc_seo_ov['lcp_preload_images'])) {
	foreach ($_dcc_seo_ov['lcp_preload_images'] as $_lcp_u) {
		if (strpos((string) $_lcp_u, 'i.ytimg.com') !== false) {
			$_dcc_preconnect_youtube = true;
			break;
		}
	}
}
if ($_dcc_preconnect_youtube) {
?>
<link rel="preconnect" href="https://i.ytimg.com">
<?php } ?>
<?php
$ov_head = $_dcc_seo_ov;
if (!empty($ov_head['lcp_preload_images']) && is_array($ov_head['lcp_preload_images'])) {
	foreach (array_slice($ov_head['lcp_preload_images'], 0, 2) as $_lcp_img) {
		$_u = trim((string) $_lcp_img);
		if ($_u !== '') {
			echo '<link rel="preload" as="image" href="' . $h($_u) . '">' . "\n";
		}
	}
}
$dcc_fonts_href = 'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Montserrat:wght@400;500;600;700&display=swap';
?>
<link rel="preload" href="<?php echo $h($dcc_fonts_href); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?php echo $h($dcc_fonts_href); ?>"></noscript>
<title><?php echo $h($seo['title']); ?></title>
<?php if ($seo['description'] !== '') { ?>
<meta name="description" content="<?php echo $h($seo['description']); ?>">
<?php } ?>
<?php if ($seo['keywords'] !== '') { ?>
<meta name="keywords" content="<?php echo $h($seo['keywords']); ?>">
<?php } ?>
<?php if ($seo['robots'] !== '') { ?>
<meta name="robots" content="<?php echo $h($seo['robots']); ?>">
<?php } ?>
<link rel="canonical" href="<?php echo $h($seo['canonical']); ?>">
<meta property="og:type" content="<?php echo $h($seo['og_type']); ?>">
<meta property="og:title" content="<?php echo $h($seo['og_title']); ?>">
<?php if ($seo['og_description'] !== '') { ?>
<meta property="og:description" content="<?php echo $h($seo['og_description']); ?>">
<?php } ?>
<?php if ($seo['og_url'] !== '') { ?>
<meta property="og:url" content="<?php echo $h($seo['og_url']); ?>">
<?php } ?>
<?php if ($seo['og_site_name'] !== '') { ?>
<meta property="og:site_name" content="<?php echo $h($seo['og_site_name']); ?>">
<?php } ?>
<?php if ($seo['og_image'] !== '') { ?>
<meta property="og:image" content="<?php echo $h($seo['og_image']); ?>">
<?php } ?>
<meta name="twitter:card" content="<?php echo $h($seo['twitter_card']); ?>">
<meta name="twitter:title" content="<?php echo $h($seo['og_title']); ?>">
<?php if ($seo['og_description'] !== '') { ?>
<meta name="twitter:description" content="<?php echo $h($seo['og_description']); ?>">
<?php } ?>
<?php if ($seo['og_image'] !== '') { ?>
<meta name="twitter:image" content="<?php echo $h($seo['og_image']); ?>">
<?php } ?>
<?php if ($seo['twitter_site'] !== '') { ?>
<meta name="twitter:site" content="<?php echo $h($seo['twitter_site']); ?>">
<?php } ?>
<?php if ($seo['fb_app_id'] !== '') { ?>
<meta property="fb:app_id" content="<?php echo $h($seo['fb_app_id']); ?>">
<?php } ?>
<!-- Stylesheets: avoid @import inside style.css (chains blocking requests). -->
<?php $_css = rtrim(base_url('assets/css/'), '/') . '/'; ?>
<link href="<?php echo $_css; ?>bootstrap.css" rel="stylesheet">
<link href="<?php echo $_css; ?>flaticon.css" rel="stylesheet">
<link rel="preload" href="<?php echo $_css; ?>slick.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link href="<?php echo $_css; ?>slick.css" rel="stylesheet"></noscript>
<link rel="preload" href="<?php echo $_css; ?>color-switcher-design.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link href="<?php echo $_css; ?>color-switcher-design.css" rel="stylesheet"></noscript>
<link rel="preload" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" as="style" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"></noscript>
<link href="<?php echo $_css; ?>style.css" rel="stylesheet">
<link href="<?php echo $_css; ?>responsive.css" rel="stylesheet">
<link id="theme-color-file" href="<?php echo $_css; ?>color-themes/blue-theme.css" rel="stylesheet">
<link href="<?php echo $_css; ?>dontia-brand.css" rel="stylesheet">
<?php
$router_class = strtolower((string) $this->router->fetch_class());
if ($router_class === 'dental') {
	$_drlook_href = base_url('assets/css/dental-react-look.css');
?>
<link rel="preload" href="<?php echo $h($_drlook_href); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link href="<?php echo $h($_drlook_href); ?>" rel="stylesheet"></noscript>
<?php } ?>
<?php
$_dcc_legacy_fonts = 'https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400;0,700;1,400;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&family=BenchNine:wght@300;400;700&display=swap';
$_defer_css = array(
	$_dcc_legacy_fonts,
	$_css . 'animate.css',
	$_css . 'jquery.mCustomScrollbar.min.css',
	$_css . 'owl.css',
	$_css . 'jquery.bootstrap-touchspin.css',
	$_css . 'jquery-ui.css',
	$_css . 'jquery.fancybox.min.css',
);
foreach ($_defer_css as $_href) {
	if (strpos($_href, 'http') === 0) {
		echo '<link rel="preload" href="' . $h($_href) . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
		echo '<noscript><link rel="stylesheet" href="' . $h($_href) . '"></noscript>' . "\n";
	} else {
		echo '<link rel="preload" href="' . $h($_href) . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
		echo '<noscript><link href="' . $h($_href) . '" rel="stylesheet"></noscript>' . "\n";
	}
}
?>
<link rel="icon" type="image/svg+xml" href="<?php echo base_url('assets/images/favicon.svg'); ?>">
<link rel="alternate icon" href="<?php echo base_url('assets/images/favicon.svg'); ?>" type="image/svg+xml">
<link rel="apple-touch-icon" href="<?php echo base_url('assets/images/favicon.svg'); ?>">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php
$router_class_head = strtolower((string) $this->router->fetch_class());
$router_method_head = strtolower((string) $this->router->fetch_method());
if ($router_class_head === 'dental' && $router_method_head === 'tmj_specialist' && isset($this->website['data'])) {
	$this->load->helper('schema_org');
	$tmj_canonical = isset($seo['canonical']) ? trim((string) $seo['canonical']) : '';
	if ($tmj_canonical === '') {
		$tmj_canonical = current_url();
	}
	$tmj_ld = schema_dentist_local_graph($this->website['data'], $tmj_canonical);
	if (is_array($tmj_ld)) {
		$tmj_json = json_encode($tmj_ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
		if ($tmj_json !== false) {
			echo "<script type=\"application/ld+json\">\n" . $tmj_json . "\n</script>\n";
		}
	}
}
?>

</head>

<body>

	<?php
	$preloader_logo_url = $brand_logo_url;
	$preloader_alt = 'Loading';
	if (isset($this->website['data'])) {
		$wd = $this->website['data'];
		if (isset($wd->company_name) && trim((string) $wd->company_name) !== '') {
			$preloader_alt = $h(trim((string) $wd->company_name));
		}
	}
	?>
	<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader">
		<div class="preloader__inner">
			<?php if ($preloader_logo_url !== '') { ?>
			<img class="preloader__logo" src="<?php echo $h($preloader_logo_url); ?>" alt="<?php echo $preloader_alt; ?>" width="200" height="155" decoding="async" fetchpriority="low">
			<?php } else { ?>
			<span class="preloader__fallback" role="status" aria-label="Loading"></span>
			<?php } ?>
		</div>
	</div>
    
    <!-- Main Header-->
    <header class="main-header header-style-one dontia-main-header">
        <?php
        $w = $this->website['data'];
        $phone_raw = isset($w->support_contact) ? (string) $w->support_contact : '';
        /* Split on newline or | only — avoid breaking "8585029731/32" style numbers */
        $phones = array_values(array_filter(array_map('trim', preg_split('/[\n\r|]+/', $phone_raw, -1, PREG_SPLIT_NO_EMPTY))));
        if (count($phones) === 0 && trim($phone_raw) !== '') {
            $phones = array(trim($phone_raw));
        }
        $addr1 = isset($w->address) ? trim((string) $w->address) : '';
        $addr2 = isset($w->corporate_address) ? trim((string) $w->corporate_address) : '';
        $email = isset($w->support_email) ? trim((string) $w->support_email) : '';
        $hours = isset($w->insurance_pss) ? trim((string) $w->insurance_pss) : '';
        $dcc_social = array(
            array('link' => isset($w->facebook_link) ? trim((string) $w->facebook_link) : '', 'icon' => 'fa-facebook', 'label' => 'Facebook'),
            array('link' => isset($w->instagram_link) ? trim((string) $w->instagram_link) : '', 'icon' => 'fa-instagram', 'label' => 'Instagram'),
            array('link' => isset($w->youtube_link) ? trim((string) $w->youtube_link) : '', 'icon' => 'fa-youtube-play', 'label' => 'YouTube'),
            array('link' => isset($w->linkedin_link) ? trim((string) $w->linkedin_link) : '', 'icon' => 'fa-linkedin', 'label' => 'LinkedIn'),
        );
        ?>
        <div class="dontia-top-bar" role="region" aria-label="Clinic contact and locations">
            <div class="auto-container">
                <div class="dontia-top-bar-inner">
                    <div class="dontia-top-addresses">
                        <?php if ($addr1 !== '') { ?>
                        <p class="dontia-top-line"><i class="fa fa-map-marker" aria-hidden="true"></i><span class="dontia-top-label">Address:</span> <?php echo htmlspecialchars($addr1, ENT_QUOTES, 'UTF-8'); ?></p>
                        <?php } ?>
                        <?php if ($addr2 !== '') { ?>
                        <p class="dontia-top-line"><i class="fa fa-map-marker" aria-hidden="true"></i><span class="dontia-top-label">Address:</span> <?php echo htmlspecialchars($addr2, ENT_QUOTES, 'UTF-8'); ?></p>
                        <?php } ?>
                    </div>
                    <div class="dontia-top-contact">
                        <?php foreach ($phones as $p) { ?>
                        <p class="dontia-top-line"><i class="fa fa-phone" aria-hidden="true"></i><span class="dontia-top-label">Phone No:</span> <?php echo htmlspecialchars($p, ENT_QUOTES, 'UTF-8'); ?></p>
                        <?php } ?>
                        <?php if ($email !== '') { ?>
                        <p class="dontia-top-line"><i class="fa fa-envelope" aria-hidden="true"></i><span class="dontia-top-label">Email:</span> <a href="mailto:<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></a></p>
                        <?php } ?>
                        <?php if ($hours !== '') { ?>
                        <p class="dontia-top-line dontia-top-hours"><i class="fa fa-clock-o" aria-hidden="true"></i><span class="dontia-top-label">Hours:</span> <?php echo htmlspecialchars($hours, ENT_QUOTES, 'UTF-8'); ?></p>
                        <?php } ?>
                    </div>
                    <div class="dontia-top-social">
                        <ul class="dontia-top-social-list">
                            <?php foreach ($dcc_social as $soc) {
                                $href = $soc['link'] !== '' ? htmlspecialchars($soc['link'], ENT_QUOTES, 'UTF-8') : '#';
                                $extra = $soc['link'] !== '' ? ' target="_blank" rel="noopener noreferrer"' : ' tabindex="-1" aria-disabled="true"';
                                $btn_class = 'dontia-social-btn' . ($soc['link'] === '' ? ' dontia-social-btn--disabled' : '');
                            ?>
                            <li><a href="<?php echo $href; ?>" class="<?php echo $btn_class; ?>" aria-label="<?php echo htmlspecialchars($soc['label'], ENT_QUOTES, 'UTF-8'); ?>"<?php echo $extra; ?>><i class="fa <?php echo $soc['icon']; ?>" aria-hidden="true"></i></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid dontia-header-wrap">
            <div class="header-lower">
                <div class="main-box dontia-header-bar">
                    <div class="logo-box">
                        <?php $company_esc = htmlspecialchars(trim((string) $this->website['data']->company_name), ENT_QUOTES, 'UTF-8'); ?>
                        <div class="logo dontia-logo-brand">
                            <a href="<?php echo base_url(); ?>" class="dontia-logo-link">
                                <span class="dontia-logo-mark">
                                    <img src="<?php echo $h($header_logo_src); ?>" srcset="<?php echo $header_logo_srcset; ?>" sizes="80px" alt="<?php echo $company_esc; ?>" width="96" height="74" decoding="async" fetchpriority="high">
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="nav-outer dontia-nav-outer">
                        <nav class="main-menu navbar-expand-lg ">
                            <div class="navbar-header">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon flaticon-menu-button"></span>
                                </button>
                            </div>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navigation dontia-primary-nav">
                                    <li><a href="<?php echo base_url('best-dental-clinic-in-kolkata'); ?>">Dental</a></li>
                                    <li><a href="<?php echo base_url('about-us'); ?>">About</a></li>
                                    <li class="dropdown"><a href="#">Services</a>
                                        <ul>
                                            <?php
                                                $services = GetServices();
                                                if ($services) {
                                                foreach ($services as $service) {
                                                    $cat_name = isset($service['cat_name']) ? trim((string) $service['cat_name']) : '';
                                                    $cat_name_l = strtolower($cat_name);
                                                    $is_dental_service = (strpos($cat_name_l, 'dental') !== false);
                                                    if (count($service['subcategory']) > 0 || $is_dental_service) {
                                                        $dropdownClass = 'dropdown';
                                                        $achor = '#';
                                                    } else {
                                                        $dropdownClass = '';
                                                        $achor = '#';
                                                    }
                                            ?>
                                            <li class="<?php echo $dropdownClass; ?>"><a href="<?php echo $achor; ?>"><?php echo $service['cat_name']; ?></a>
                                                <?php
                                                    if (count($service['subcategory']) > 0 || $is_dental_service) {
                                                ?>
                                                <ul>
                                                <?php
                                                        if ($is_dental_service) {
                                                ?>
                                                    <li><a href="<?php echo base_url('best-orthodontist-in-kolkata'); ?>">Braces</a></li>
                                                    <li><a href="<?php echo base_url('best-dental-implant-clinic-in-kolkata'); ?>">Dental Implant</a></li>
                                                    <li><a href="<?php echo base_url('tmj-specialist-in-kolkata'); ?>">TMJ Specialist</a></li>
                                                <?php
                                                        }
                                                        foreach ($service['subcategory'] as $subcategory) {
                                                            $sub_achor = '#';
                                                ?>
                                                    <li><a href="<?php echo $sub_achor; ?>"><?php echo $subcategory['subcat_name']; ?></a></li>
                                                <?php
                                                        }
                                                ?>
                                                </ul>
                                                <?php
                                                    }
                                                ?>
                                            </li>
                                            <?php
                                                }
                                                }
                                            ?>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo base_url('why-choose-us'); ?>">Why Choose Us</a></li>
                                    <li><a href="<?php echo base_url('blogs'); ?>">Blogs</a></li>
                                    <li><a href="<?php echo base_url('contact-us'); ?>">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <a href="#" class="dontia-header-cta" data-toggle="modal" data-target="#dontiaAppointmentModal">Book an Appointment</a>
                </div>
            </div>
        </div>
    </header>
    