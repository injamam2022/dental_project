<?php
$w = isset($this->website['data']) ? $this->website['data'] : null;
$company = ($w && isset($w->company_name)) ? trim((string) $w->company_name) : 'Dontia Care Clinic';
$company_esc = htmlspecialchars($company, ENT_QUOTES, 'UTF-8');

$banner_ok = ! empty($banner_details) && isset($banner_details[0]);
if ($banner_ok) {
	$banner = $banner_details[0];
	$banner_img = base_url('admin/webroot/uploads/banner/' . $banner->image_name);
	$banner_title = htmlspecialchars((string) $banner->image_seo_title, ENT_QUOTES, 'UTF-8');
	$banner_sub = htmlspecialchars((string) $banner->image_url_link, ENT_QUOTES, 'UTF-8');
} else {
	$banner_img = base_url('assets/images/background/1.jpg');
	$banner_title = 'Contact Us';
	$banner_sub = 'We are here to help';
}

$contact = (! empty($contact_us) && isset($contact_us[0])) ? $contact_us[0] : null;
$addr1 = $contact && isset($contact->address) ? nl2br(htmlspecialchars(trim((string) $contact->address), ENT_QUOTES, 'UTF-8')) : '';
$addr2 = $contact && isset($contact->corporate_address) ? nl2br(htmlspecialchars(trim((string) $contact->corporate_address), ENT_QUOTES, 'UTF-8')) : '';
$phones_raw = $contact && isset($contact->support_contact) ? (string) $contact->support_contact : '';
$phones = array_values(array_filter(array_map('trim', preg_split('/[\n\r|]+/', $phones_raw, -1, PREG_SPLIT_NO_EMPTY))));
if (count($phones) === 0 && trim($phones_raw) !== '') {
	$phones = array(trim($phones_raw));
}
$email_raw = $contact && isset($contact->support_email) ? trim((string) $contact->support_email) : '';
$email_esc = htmlspecialchars($email_raw, ENT_QUOTES, 'UTF-8');

/** Only output map HTML if it looks like an embed (avoids showing placeholders like "NA" from admin). */
$dontia_echo_map_embed = static function ($raw) {
	if ($raw === null || $raw === '') {
		return;
	}
	$t = trim((string) $raw);
	if ($t === '') {
		return;
	}
	$u = strtoupper($t);
	if ($u === 'NA' || $u === 'N/A' || $u === '-' || $u === '.') {
		return;
	}
	if (stripos($t, '<iframe') === false && stripos($t, '<embed') === false) {
		return;
	}
	echo $raw;
};

$flash_ok = $this->session->flashdata('contact_success');
$flash_err = $this->session->flashdata('contact_error');
$captcha_is_math = ! empty($captcha_is_math);
$captcha_placeholder = $captcha_is_math ? 'Enter the answer (numbers only)' : 'Enter the code shown';

$topics = array(
	'' => 'Select a topic',
	'General enquiry' => 'General enquiry',
	'Dental' => 'Dental',
	'Skin treatment' => 'Skin treatment',
	'ENT' => 'ENT',
	'Appointment' => 'Appointment',
	'Billing / insurance' => 'Billing / insurance',
	'Other' => 'Other',
);
?>
<section class="page-title dontia-contact-hero" style="background-image:url(<?php echo htmlspecialchars($banner_img, ENT_QUOTES, 'UTF-8'); ?>);">
	<div class="auto-container">
		<div class="inner-container clearfix">
			<div class="title-box">
				<h1><?php echo $banner_title; ?></h1>
				<span class="title"><?php echo $banner_sub; ?></span>
			</div>
			<ul class="bread-crumb clearfix">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>Contact Us</li>
			</ul>
		</div>
	</div>
</section>

<section class="dontia-contact-section">
	<div class="auto-container">
		<?php if ($flash_ok) { ?>
		<div class="dontia-contact-alert dontia-contact-alert--success" role="alert"><?php echo htmlspecialchars($flash_ok, ENT_QUOTES, 'UTF-8'); ?></div>
		<?php } ?>
		<?php if ($flash_err) { ?>
		<div class="dontia-contact-alert dontia-contact-alert--error" role="alert"><?php echo htmlspecialchars($flash_err, ENT_QUOTES, 'UTF-8'); ?></div>
		<?php } ?>

		<div class="row dontia-contact-row">
			<div class="col-lg-7 col-md-12 col-sm-12">
				<div class="dontia-contact-card">
					<header class="dontia-contact-card__head">
						<span class="dontia-contact-card__kicker">Get in touch</span>
						<h2 class="dontia-contact-card__title">Send us a message</h2>
						<p class="dontia-contact-card__lead">Share your question or request. We will reply as soon as we can.</p>
					</header>

					<form class="dontia-contact-form" method="post" action="<?php echo base_url('Contact/contact_submit'); ?>" enctype="multipart/form-data">
						<input type="hidden" name="type" value="ContactUs"/>
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<label class="dontia-contact-label" for="dc-name">Full name <span class="dontia-req">*</span></label>
								<input class="dontia-contact-input" id="dc-name" type="text" name="name" required maxlength="120" placeholder="Your name" autocomplete="name"/>
							</div>
							<div class="col-md-6 col-sm-12">
								<label class="dontia-contact-label" for="dc-phone">Phone <span class="dontia-req">*</span></label>
								<input class="dontia-contact-input" id="dc-phone" type="tel" name="mobile" required maxlength="40" placeholder="Mobile number" autocomplete="tel"/>
							</div>
							<div class="col-md-12 col-sm-12">
								<label class="dontia-contact-label" for="dc-email">Email <span class="dontia-req">*</span></label>
								<input class="dontia-contact-input" id="dc-email" type="email" name="email" required maxlength="191" placeholder="you@example.com" autocomplete="email"/>
							</div>
							<div class="col-md-12 col-sm-12">
								<label class="dontia-contact-label" for="dc-topic">Topic <span class="dontia-req">*</span></label>
								<select class="dontia-contact-input dontia-contact-select" id="dc-topic" name="inquiry_topic" required>
									<?php foreach ($topics as $val => $label) {
										$v = htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
										$l = htmlspecialchars($label, ENT_QUOTES, 'UTF-8');
										$sel = ($val === '') ? ' selected disabled' : '';
										echo '<option value="' . $v . '"' . $sel . '>' . $l . '</option>';
									} ?>
								</select>
							</div>
							<div class="col-md-12 col-sm-12">
								<label class="dontia-contact-label" for="dc-company">Company / organisation <span class="dontia-opt">(optional)</span></label>
								<input class="dontia-contact-input" id="dc-company" type="text" name="company" maxlength="120" placeholder="If applicable"/>
							</div>
							<div class="col-md-12 col-sm-12">
								<label class="dontia-contact-label" for="dc-msg">Message <span class="dontia-req">*</span></label>
								<textarea class="dontia-contact-textarea" id="dc-msg" name="message" required rows="5" placeholder="How can we help you?"></textarea>
							</div>
							<div class="col-md-12 col-sm-12">
								<label class="dontia-contact-label" for="enter_cpatch">Security check <span class="dontia-req">*</span></label>
								<p class="dontia-contact-captcha-hint"><?php echo $captcha_is_math ? 'Solve the sum, or use the refresh button for a new question.' : 'Type the characters you see, or refresh for a new image.'; ?></p>
								<div class="dontia-contact-captcha-row">
									<div class="dontia-contact-captcha-img" id="image_captcha"><?php echo isset($captchaImg) ? $captchaImg : ''; ?></div>
									<div class="dontia-contact-captcha-inputs">
										<button type="button" class="dontia-captcha-refresh captcha-refresh" title="New code" aria-label="New security code"><i class="fa fa-refresh" aria-hidden="true"></i></button>
										<input class="dontia-contact-input" type="text" name="captcha" id="enter_cpatch" required maxlength="12" placeholder="<?php echo htmlspecialchars($captcha_placeholder, ENT_QUOTES, 'UTF-8'); ?>" autocomplete="off" inputmode="<?php echo $captcha_is_math ? 'numeric' : 'text'; ?>"/>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<button class="dontia-contact-submit theme-btn btn-style-one" type="submit" name="submit-form">Submit enquiry</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="col-lg-5 col-md-12 col-sm-12">
				<div class="dontia-contact-side">
					<div class="dontia-contact-side__block">
						<h3 class="dontia-contact-side__title"><?php echo $company_esc; ?></h3>
						<p class="dontia-contact-side__muted">Reach us directly using the details below.</p>
					</div>

					<?php if ($addr1 !== '') { ?>
					<div class="dontia-contact-side__block">
						<h4 class="dontia-contact-side__label"><i class="fa fa-map-marker" aria-hidden="true"></i> Registered office</h4>
						<div class="dontia-contact-side__text"><?php echo $addr1; ?></div>
					</div>
					<?php } ?>
					<?php if ($addr2 !== '') { ?>
					<div class="dontia-contact-side__block">
						<h4 class="dontia-contact-side__label"><i class="fa fa-map-marker" aria-hidden="true"></i> Corporate office</h4>
						<div class="dontia-contact-side__text"><?php echo $addr2; ?></div>
					</div>
					<?php } ?>

					<?php if (count($phones) > 0) { ?>
					<div class="dontia-contact-side__block">
						<h4 class="dontia-contact-side__label"><i class="fa fa-phone" aria-hidden="true"></i> Phone</h4>
						<?php foreach ($phones as $p) {
							$pe = htmlspecialchars($p, ENT_QUOTES, 'UTF-8');
							echo '<p class="dontia-contact-side__text"><a href="tel:' . preg_replace('/\s+/', '', $p) . '">' . $pe . '</a></p>';
						} ?>
					</div>
					<?php } ?>

					<?php if ($email_raw !== '') { ?>
					<div class="dontia-contact-side__block">
						<h4 class="dontia-contact-side__label"><i class="fa fa-envelope" aria-hidden="true"></i> Email</h4>
						<p class="dontia-contact-side__text"><a href="mailto:<?php echo $email_esc; ?>"><?php echo $email_esc; ?></a></p>
					</div>
					<?php } ?>

					<div class="dontia-contact-maps">
						<?php
						if ($contact) {
							$dontia_echo_map_embed(isset($contact->address_iframe) ? $contact->address_iframe : '');
							$dontia_echo_map_embed(isset($contact->corporate_iframe) ? $contact->corporate_iframe : '');
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
$(document).ready(function () {
	$('.captcha-refresh').on('click', function () {
		var $inp = $('#enter_cpatch');
		$inp.val('');
		$.get('<?php echo base_url('Contact/refresh'); ?>', function (data) {
			if (data && String(data).trim() !== '') {
				$('#image_captcha').html(data);
			}
		}).fail(function () {
			alert('Could not load a new security code. Please reload the page.');
		});
	});
});
</script>
