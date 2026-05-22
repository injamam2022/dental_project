<?php
$banner_ok = ! empty($banner_details) && isset($banner_details[0]);
if ($banner_ok) {
	$banner = $banner_details[0];
	$banner_bg = site_url('admin/webroot/uploads/banner/' . $banner->image_name);
	$banner_h1 = $banner->image_seo_title;
	$banner_sub = $banner->image_url_link;
} else {
	$banner_bg = base_url('assets/images/background/1.jpg');
	$banner_h1 = 'About Us';
	$banner_sub = 'Dontia Care Clinic';
}

$this->load->helper('dontia_performance');
$parsed = null;
if (! empty($about_page_con) && is_array($about_page_con) && isset($about_page_con[0]->description)) {
	$parsed = @unserialize($about_page_con[0]->description);
}
$ext = (is_array($parsed) && isset($parsed[4]) && is_array($parsed[4])) ? $parsed[4] : array();

$dental_ba = isset($dental_before_after) && is_array($dental_before_after) ? $dental_before_after : array();
$patient_cases = dontia_about_build_patient_cases($about_page_con, $dental_ba);
$about_img_fallback = '';
$fallback_cases = dontia_about_default_patient_cases();
if (! empty($fallback_cases[0]['before'])) {
	$about_img_fallback = $fallback_cases[0]['before'];
}

$patient_title = 'Patient Cases';
if (! empty($ext['patient_title'])) {
	$patient_title = $ext['patient_title'];
}

$default_highlights = array(
	'<p class="dontia-about-highlight__p">In addition to world-class dentistry, our <strong>Skin Care Division</strong> offers a full range of personalized aesthetic treatments, including acne management, anti-aging therapies, laser hair reduction, PRP, fillers, and exclusive Korean glass skin facials — all designed to enhance your natural beauty safely and effectively.</p>',
	'<p class="dontia-about-highlight__p">Our <strong>ENT specialists</strong> provide expert diagnosis and treatment for a wide spectrum of ear, nose, and throat conditions, ensuring optimal care for both acute and chronic ENT issues in adults and children.</p>',
	'<p class="dontia-about-highlight__p">With an unwavering focus on safety, precision, and patient satisfaction, <strong>Dontia</strong> is where science meets artistry — creating brighter smiles, healthier skin, and better overall well-being every day.</p>',
);
$highlights = array();
if (! empty($ext['highlight']) && is_array($ext['highlight'])) {
	foreach ($ext['highlight'] as $h) {
		$h = trim((string) $h);
		if ($h !== '') {
			$highlights[] = $h;
		}
	}
}
if (count($highlights) < 1) {
	$highlights = $default_highlights;
}

$default_stats = array(
	array('value' => '22', 'suffix' => 'K+', 'label' => 'Patients Consulted', 'icon' => 'user'),
	array('value' => '80', 'suffix' => 'K+', 'label' => 'Best Services', 'icon' => 'shield'),
	array('value' => '9', 'suffix' => 'K+', 'label' => 'Patients Treated', 'icon' => 'hospital-o'),
	array('value' => '100', 'suffix' => '+', 'label' => 'Total Doctors', 'icon' => 'laptop'),
);
$stats_rows = array();
for ($i = 0; $i < 4; $i++) {
	$d = $default_stats[$i];
	if (! empty($ext['stats'][$i]) && is_array($ext['stats'][$i])) {
		$s = $ext['stats'][$i];
		$val = isset($s['value']) ? trim((string) $s['value']) : '';
		$suf = isset($s['suffix']) ? trim((string) $s['suffix']) : '';
		$lab = isset($s['label']) ? trim((string) $s['label']) : '';
		$ico = isset($s['icon']) ? strtolower(preg_replace('/[^a-z0-9\-]/', '', (string) $s['icon'])) : 'user';
		if ($ico === '') {
			$ico = 'user';
		}
		if ($val !== '' && $lab !== '') {
			$stats_rows[] = array('value' => $val, 'suffix' => $suf, 'label' => $lab, 'icon' => $ico);
		} else {
			$stats_rows[] = $d;
		}
	} else {
		$stats_rows[] = $d;
	}
}

$stats_bg_url = base_url('assets/images/background/3.jpg');
	if (! empty($ext['stats_bg'])) {
	$u = trim((string) $ext['stats_bg']);
	$r = dontia_resolve_upload_image_url($u);
	if ($r !== '') {
		$stats_bg_url = $r;
	}
}
?>
<section class="page-title dontia-about-hero" style="background-image:url(<?php echo htmlspecialchars($banner_bg, ENT_QUOTES, 'UTF-8'); ?>);">
	<div class="auto-container">
		<div class="inner-container clearfix">
			<div class="title-box">
				<h1><?php echo $banner_h1; ?></h1>
				<span class="title"><?php echo $banner_sub; ?></span>
			</div>
			<ul class="bread-crumb clearfix">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>About Us</li>
			</ul>
		</div>
	</div>
</section>

<section class="dontia-about-highlight">
	<div class="auto-container">
		<div class="dontia-about-highlight__inner">
			<?php foreach ($highlights as $block) { ?>
				<?php echo $block; ?>
			<?php } ?>
		</div>
	</div>
</section>

<section class="dontia-patient-cases">
	<div class="auto-container">
		<header class="dontia-patient-cases__head">
			<h2 class="dontia-patient-cases__title"><?php echo htmlspecialchars($patient_title, ENT_QUOTES, 'UTF-8'); ?></h2>
			<div class="dontia-patient-cases__divider" aria-hidden="true">
				<span class="dontia-patient-cases__divider-line"></span>
				<span class="dontia-patient-cases__divider-icon"><i class="fa fa-shield" aria-hidden="true"></i></span>
				<span class="dontia-patient-cases__divider-line"></span>
			</div>
		</header>
		<div class="row dontia-patient-cases__row">
			<?php foreach ($patient_cases as $idx => $pair) {
				$b = htmlspecialchars($pair['before'], ENT_QUOTES, 'UTF-8');
				$a = htmlspecialchars($pair['after'], ENT_QUOTES, 'UTF-8');
				$fb_attr = $about_img_fallback !== ''
					? ' data-dontia-img-fallback="' . htmlspecialchars($about_img_fallback, ENT_QUOTES, 'UTF-8') . '" onerror="if(this.dataset.dontiaImgFallback&&!this.dataset.dontiaImgFailed){this.dataset.dontiaImgFailed=1;this.src=this.dataset.dontiaImgFallback;}"'
					: '';
			?>
			<div class="col-lg-4 col-md-6 col-sm-12 dontia-patient-cases__col">
				<div class="dontia-ba" data-dontia-ba data-position="50">
					<div class="dontia-ba__inner">
						<div class="dontia-ba__base">
							<img src="<?php echo $a; ?>" alt="After treatment" loading="lazy" decoding="async"<?php echo $fb_attr; ?>>
						</div>
						<div class="dontia-ba__clip" style="width:50%">
							<img src="<?php echo $b; ?>" alt="Before treatment" loading="lazy" decoding="async"<?php echo $fb_attr; ?>>
						</div>
						<button type="button" class="dontia-ba__handle" style="left:50%" aria-label="Drag to compare before and after">
							<span class="dontia-ba__grip"><i class="fa fa-angle-left" aria-hidden="true"></i><i class="fa fa-angle-right" aria-hidden="true"></i></span>
						</button>
						<span class="dontia-ba__label dontia-ba__label--before">Before</span>
						<span class="dontia-ba__label dontia-ba__label--after">After</span>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>

<section class="dontia-success-stats" style="background-image:url(<?php echo htmlspecialchars($stats_bg_url, ENT_QUOTES, 'UTF-8'); ?>);">
	<div class="dontia-success-stats__overlay" aria-hidden="true"></div>
	<div class="auto-container dontia-success-stats__container">
		<div class="row dontia-success-stats__row">
			<?php foreach ($stats_rows as $stat) {
				$to_esc = htmlspecialchars($stat['value'], ENT_QUOTES, 'UTF-8');
				$suf_esc = htmlspecialchars($stat['suffix'], ENT_QUOTES, 'UTF-8');
				$lab_esc = htmlspecialchars($stat['label'], ENT_QUOTES, 'UTF-8');
				$icon_esc = htmlspecialchars($stat['icon'], ENT_QUOTES, 'UTF-8');
			?>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 dontia-success-stats__col">
				<div class="dontia-stat-card">
					<div class="dontia-stat-card__icon-ring">
						<i class="fa fa-<?php echo $icon_esc; ?> dontia-stat-card__icon" aria-hidden="true"></i>
					</div>
					<div class="dontia-stat-card__body">
						<div class="dontia-stat-card__number" data-to="<?php echo $to_esc; ?>" data-from="0" data-suffix="<?php echo $suf_esc; ?>">0</div>
						<div class="dontia-stat-card__label"><?php echo $lab_esc; ?></div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>

<script src="<?php echo base_url('assets/js/dontia-about-page.js'); ?>"></script>
