<?php
$this->load->view('include/header/header');
$tech_cards = isset($technology_cards) && is_array($technology_cards) ? $technology_cards : array();

$ca_img_dir = 'assets/images/aligners/';
$ca_img = function ($filename) use ($ca_img_dir) {
    return base_url($ca_img_dir . rawurlencode($filename));
};

$what_img = $ca_img('sonia shil 3.jpg');
$review_img = $ca_img('aligners-google-reviews.png');

$patient_images = array(
    array(
        'url' => $ca_img('sonia shil.jpg'),
        'alt' => 'Before and after clear aligner treatment, front view, at Dontia Care Clinic',
        'caption' => 'Front view before and after professionally supervised clear aligner treatment.',
    ),
    array(
        'url' => $ca_img('sonia shil 3.jpg'),
        'alt' => 'Before and after clear aligner treatment, side view',
        'caption' => 'Side view showing improved alignment after aligner treatment.',
    ),
    array(
        'url' => $ca_img('sonia shil 4.jpg'),
        'alt' => 'Close-up before and after clear aligner treatment',
        'caption' => 'Close-up of tooth position before treatment and after aligners.',
    ),
    array(
        'url' => $ca_img('sonia shil 1-50kb.jpg'),
        'alt' => 'Upper arch before and after clear aligner treatment',
        'caption' => 'Upper arch alignment before and after clear aligner treatment.',
    ),
    array(
        'url' => $ca_img('sonia shil 2.jpg'),
        'alt' => 'Lower arch before and after clear aligner treatment',
        'caption' => 'Lower arch alignment before and after clear aligner treatment.',
    ),
);

$ca_videos = array(
    array(
        'title' => 'Teeth straightening without braces',
        'video_id' => 'IN4RpeCVrF4',
    ),
    array(
        'title' => 'An Invisalign journey at Dontia Care Clinic',
        'video_id' => '192rhucBKoo',
    ),
);

$why_points = array(
    array('title' => 'Virtually Invisible', 'text' => 'Clear aligners are designed to be discreet, making them particularly appealing if you don\'t want noticeable orthodontic appliances.'),
    array('title' => 'Removable', 'text' => 'You can remove your aligners when eating, drinking, brushing, and flossing, following your dentist\'s instructions.'),
    array('title' => 'No Metal Brackets or Wires', 'text' => 'Clear aligners use transparent trays instead of the brackets and wires associated with traditional braces.'),
    array('title' => 'Easier Oral Hygiene', 'text' => 'Because the aligners can be removed, you can brush and floss your teeth normally rather than cleaning around fixed brackets and wires.'),
    array('title' => 'Designed Around Your Smile', 'text' => 'Clear aligner treatment uses customized trays and a planned sequence of tooth movements rather than a one-size-fits-all appliance.'),
    array('title' => 'Convenient for Modern Lifestyles', 'text' => 'For working professionals, students, frequent travelers, and people who prefer a discreet orthodontic option, clear aligners can fit more naturally into everyday routines.'),
);

$benefit_cases = array(
    array('title' => 'Crooked Teeth', 'text' => 'If your teeth are misaligned or rotated, clear aligners may help gradually improve their positioning.'),
    array('title' => 'Crowded Teeth', 'text' => 'Limited space can cause teeth to overlap or appear crowded. Depending on the severity and underlying cause, aligner treatment may be an option.'),
    array('title' => 'Gaps Between Teeth', 'text' => 'Certain spaces between teeth can be addressed through planned orthodontic tooth movement.'),
    array('title' => 'Mild to Moderate Alignment Problems', 'text' => 'Clear aligners can be used for many types of alignment concerns, although suitability varies from patient to patient.'),
    array('title' => 'Relapse After Previous Braces', 'text' => 'If your teeth have shifted after previous orthodontic treatment, clear aligners may be considered for certain cases.'),
);

$decision_factors = array(
    'The position of your teeth',
    'Crowding or spacing',
    'Your bite',
    'Jaw relationship',
    'Gum and bone health',
    'Complexity of tooth movement',
    'Your treatment goals',
    'Your ability to consistently wear removable aligners',
);

$steps = array(
    array('title' => 'Dental Consultation', 'text' => 'We examine your teeth, gums, bite, and overall oral health to understand your orthodontic needs.'),
    array('title' => 'Digital Assessment', 'text' => 'Where appropriate, digital scanning and other diagnostic records can be used to plan your treatment.'),
    array('title' => 'Personalized Treatment Plan', 'text' => 'Your dentist develops a treatment plan based on your current alignment and desired treatment objectives.'),
    array('title' => 'Receive Your Aligners', 'text' => 'Your customized aligners are provided along with instructions about how and when to wear them.'),
    array('title' => 'Gradual Tooth Movement', 'text' => 'You progress through your aligner series according to the schedule provided by your dental professional.'),
    array('title' => 'Regular Monitoring', 'text' => 'Your progress is reviewed during follow-up appointments so your dentist can monitor your treatment.'),
    array('title' => 'Retention', 'text' => 'After active treatment, retainers may be recommended to help maintain your new tooth positions.'),
);

$invisalign_points = array(
    'Customised treatment planning',
    'Clear and removable aligners',
    'Digital treatment planning',
    'No traditional metal brackets',
    'Designed for gradual tooth movement',
    'Professional monitoring throughout treatment',
);

$clinic_points = array(
    array('title' => 'Personalized Treatment Planning', 'text' => 'Your treatment is planned around your individual smile and orthodontic needs.'),
    array('title' => 'Professional Dental Supervision', 'text' => 'Your treatment is monitored by dental professionals rather than being an unsupervised DIY process.'),
    array('title' => 'Invisalign Available', 'text' => 'For suitable patients, Dontia Care Clinic provides Invisalign clear aligner treatment.'),
    array('title' => 'Digital Approach', 'text' => 'Modern digital tools can assist with assessment, planning, and treatment monitoring where appropriate.'),
    array('title' => 'Focus on Long-Term Oral Health', 'text' => 'The goal is not simply straighter-looking teeth. Overall oral health and bite are part of treatment planning.'),
);

$candidate_points = array(
    'Want straighter teeth',
    'Prefer a discreet alternative to metal braces',
    'Have crowded or crooked teeth',
    'Have certain spaces between your teeth',
    'Want removable orthodontic appliances',
    'Are willing to wear aligners consistently',
    'Want professionally supervised treatment',
);

$adult_groups = array(
    'Working professionals',
    'Business owners',
    'Students',
    'Public-facing professionals',
    'People preparing for weddings or important events',
    'Adults who previously had braces and experienced tooth movement',
);

$related_links = array(
    array('label' => 'Dental Implants', 'href' => base_url('best-dental-implant-clinic-in-kolkata')),
    array('label' => 'Cosmetic Dentistry', 'href' => base_url('best-cosmetic-dentist-in-kolkata')),
    array('label' => 'Braces & Orthodontics', 'href' => base_url('best-orthodontist-in-kolkata')),
    array('label' => 'Smile Makeover', 'href' => base_url('best-cosmetic-dentist-in-kolkata')),
    array('label' => 'Teeth Whitening', 'href' => base_url('best-cosmetic-dentist-in-kolkata')),
    array('label' => 'General Dentistry', 'href' => base_url('best-dental-clinic-in-kolkata')),
    array('label' => 'Dental Clinic in Kolkata', 'href' => base_url('best-dental-clinic-in-kolkata')),
    array('label' => 'Contact', 'href' => base_url('contact-us')),
);

$book_attrs = 'href="#" data-toggle="modal" data-target="#dontiaAppointmentModal" data-preselect-service="Dental"';
?>
<style>
.ca-page{overflow-x:hidden}
.ca-page .dcc-hero.ca-hero{background:linear-gradient(165deg,#4a2c1e 0%,#241610 48%,#1a120e 100%)!important;min-height:min(52vh,460px)}
.ca-page .dcc-hero.ca-hero::before{display:none}
.ca-page .container{max-width:min(1280px,94vw);width:100%;padding-left:max(22px,calc(env(safe-area-inset-left,0px) + 16px));padding-right:max(22px,calc(env(safe-area-inset-right,0px) + 16px));box-sizing:border-box}
.ca-page .ortho-sec{padding:60px 0}
.ca-page .ortho-sec h2,.ca-page .ortho-sec h3,.ca-page .ortho-sec h4{margin:0 0 16px}
.ca-page .ortho-sub{font-size:18px;line-height:1.8;color:#4b4b4b}
.ca-page .ortho-grid-2{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:28px;align-items:center}
.ca-page .ortho-card{background:#fff;border-radius:12px;padding:22px;box-shadow:0 8px 20px rgba(0,0,0,.08);height:100%;border:1px solid #ece6df}
.ca-page .ortho-card img{width:100%;height:190px;object-fit:cover;border-radius:8px;margin-bottom:12px}
.ca-page .ortho-section-head{text-align:center;margin-bottom:26px}
.ca-page .ortho-section-head h2{display:inline-block;margin:0 auto 10px}
.ca-page .ortho-section-head p{margin:0 auto;color:#675f57;max-width:760px}
.ca-page .ortho-benefit-list{list-style:none;padding:0;margin:14px 0 0;display:grid;gap:12px}
.ca-page .ortho-benefit-list li{position:relative;background:#fff;border:1px solid #ece6df;border-radius:10px;padding:12px 14px 12px 42px;box-shadow:0 6px 14px rgba(0,0,0,.06);margin:0;line-height:1.7}
.ca-page .ortho-benefit-list li::before{content:"";position:absolute;left:16px;top:18px;width:12px;height:12px;border-radius:50%;background:linear-gradient(135deg,#7a5140 0%,#5b2f1d 100%);box-shadow:0 0 0 4px rgba(122,81,64,.15)}
.ca-page .ortho-cta-wrap{max-width:920px;margin:0 auto}
.ca-page .ortho-cta-card{background:linear-gradient(135deg,#ffffff 0%,#f7f4ef 100%);border:1px solid #e9e2d8;border-radius:14px;padding:28px 30px;box-shadow:0 10px 24px rgba(0,0,0,.08)}
.ca-page .ortho-cta-card h2{margin:0 0 12px}
.ca-page .ortho-cta-card p{margin:0 0 18px;color:#4f4b46;line-height:1.7}
.ca-page .ortho-faq{max-width:980px;margin:0 auto}
.ca-page .ortho-faq details{border:1px solid #ebe8e2;border-radius:8px;padding:0;margin-bottom:10px;background:#f7f6f3;overflow:hidden}
.ca-page .ortho-faq summary{cursor:pointer;font-weight:700;padding:13px 16px}
.ca-page .ortho-faq details p{margin:0;padding:0 16px 14px 34px;color:#4f4b46;line-height:1.7;background:#fff;border-top:1px solid #ece7df}
.ca-page .ortho-btn{display:inline-flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#7a5140 0%,#5b2f1d 100%);color:#fff;padding:12px 24px;border-radius:999px;font-size:13px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;border:0;box-shadow:0 8px 20px rgba(91,47,29,.28);transition:transform .2s ease,box-shadow .2s ease}
.ca-page .ortho-btn:hover,.ca-page .ortho-btn:focus{color:#fff;text-decoration:none;transform:translateY(-1px);box-shadow:0 12px 24px rgba(91,47,29,.34)}
.ca-page .ortho-btn-gold{background:linear-gradient(135deg,#c59a4d 0%,#b78333 100%);box-shadow:0 8px 20px rgba(183,131,51,.28)}
.ca-page .ortho-note{font-weight:700;color:#1f6fd0}
.ca-page .ca-sec-alt{background:#f8fbff}
.ca-page .ca-media{width:100%;border-radius:14px;overflow:hidden;box-shadow:0 14px 32px rgba(49,19,0,.12);border:1px solid #ece6df;background:#f3efe9}
.ca-page .ca-media img{width:100%;height:auto;display:block;object-fit:cover}
.ca-page .ca-callout{margin-top:18px;padding:14px 18px;border-left:4px solid #b78333;background:#fff8ef;border-radius:0 10px 10px 0;color:#3f3731;line-height:1.65;font-weight:600}
.ca-page .ca-why-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px}
.ca-page .ca-why-card{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:20px 18px 18px;box-shadow:0 8px 20px rgba(0,0,0,.06);height:100%}
.ca-page .ca-why-num{display:inline-flex;align-items:center;justify-content:center;min-width:42px;height:28px;padding:0 8px;border-radius:999px;background:linear-gradient(135deg,#7a5140,#5b2f1d);color:#fff;font-size:12px;font-weight:700;letter-spacing:.06em;margin-bottom:12px}
.ca-page .ca-why-card h3{margin:0 0 8px;font-size:18px;line-height:1.3}
.ca-page .ca-why-card p{margin:0;color:#4f4b46;line-height:1.65}
.ca-page .ca-compare{width:100%;border-collapse:separate;border-spacing:0;margin-top:8px;background:#fff;border:1px solid #ece6df;border-radius:14px;overflow:hidden;box-shadow:0 10px 24px rgba(0,0,0,.06)}
.ca-page .ca-compare th,.ca-page .ca-compare td{padding:14px 16px;text-align:left;border-bottom:1px solid #ece6df;vertical-align:top;line-height:1.55}
.ca-page .ca-compare th{background:linear-gradient(135deg,#7a5140,#5b2f1d);color:#fff;font-weight:700}
.ca-page .ca-compare tr:last-child td{border-bottom:0}
.ca-page .ca-compare td:first-child{background:#fbf8f4;font-weight:600;color:#3d342d;width:50%}
.ca-page .ca-steps{list-style:none;padding:0;margin:8px 0 0;display:grid;gap:14px;counter-reset:castep}
.ca-page .ca-steps li{margin:0;background:#fff;border:1px solid #ece6df;border-radius:12px;padding:18px 20px 18px 72px;box-shadow:0 8px 20px rgba(0,0,0,.07);position:relative}
.ca-page .ca-steps li::before{counter-increment:castep;content:counter(castep);position:absolute;left:18px;top:18px;width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#7a5140,#5b2f1d);color:#fff;font-weight:700;font-size:15px;display:flex;align-items:center;justify-content:center}
.ca-page .ca-steps strong{display:block;color:#5b2f1d;margin-bottom:6px;font-size:17px}
.ca-page .ca-chips{display:flex;flex-wrap:wrap;gap:10px;margin-top:16px}
.ca-page .ca-chip{display:inline-flex;align-items:center;padding:10px 14px;border-radius:999px;background:#fff;border:1px solid #e8dfd4;color:#4a3b32;font-weight:600;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,.05)}
.ca-page .ca-checks{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px;margin:18px 0 0;padding:0;list-style:none}
.ca-page .ca-checks li{margin:0;background:#fff;border:1px solid #ece6df;border-radius:12px;padding:14px 16px 14px 44px;position:relative;line-height:1.55;box-shadow:0 6px 14px rgba(0,0,0,.05)}
.ca-page .ca-checks li::before{content:"\2713";position:absolute;left:14px;top:13px;width:22px;height:22px;border-radius:50%;background:linear-gradient(135deg,#c59a4d,#b78333);color:#fff;font-size:12px;font-weight:700;display:flex;align-items:center;justify-content:center}
.ca-page .ca-links{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:12px;margin-top:8px}
.ca-page .ca-links a{display:flex;align-items:center;justify-content:center;text-align:center;min-height:72px;padding:14px 12px;background:#fff;border:1px solid #ece6df;border-radius:12px;color:#5b2f1d;font-weight:700;line-height:1.35;box-shadow:0 6px 14px rgba(0,0,0,.05);text-decoration:none}
.ca-page .ca-links a:hover,.ca-page .ca-links a:focus{color:#b78333;text-decoration:none;transform:translateY(-2px)}
.ca-page .ca-review{max-width:640px;margin:0 auto;background:#fff;border:1px solid #ece6df;border-radius:14px;padding:12px;box-shadow:0 10px 24px rgba(0,0,0,.08)}
.ca-page .ca-review img{width:100%;height:auto;display:block;border-radius:8px}
.ca-page .ca-stories-slider-outer{width:100vw;max-width:100%;position:relative;left:50%;transform:translateX(-50%);box-sizing:border-box;padding-left:clamp(16px,3.5vw,40px);padding-right:clamp(16px,3.5vw,40px)}
.ca-page .ca-stories-slider-outer .ca-patient-stories-wrap.dr-gallery-slider-wrap{margin-top:14px;padding-left:max(48px,calc(env(safe-area-inset-left,0px) + 42px));padding-right:max(48px,calc(env(safe-area-inset-right,0px) + 42px))}
.ca-page .ca-story-slide-inner{background:#fff;border-radius:12px;padding:14px;box-shadow:0 10px 22px rgba(0,0,0,.12);height:100%;box-sizing:border-box;text-align:left}
.ca-page .ca-story-slide-inner img{width:100%;height:380px;object-fit:contain;object-position:center;background:#f7f4ef;border-radius:8px;display:block}
.ca-page .ca-story-slide-inner p{margin:12px 0 0;color:#5a534c;line-height:1.65;font-size:15px}
.ca-page .ca-video-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px;margin-top:8px;max-width:860px;margin-left:auto;margin-right:auto}
.ca-page .ca-video-card{background:#fff;border:1px solid #ece6df;border-radius:14px;overflow:hidden;box-shadow:0 10px 22px rgba(0,0,0,.08);cursor:pointer;transition:transform .2s ease,box-shadow .2s ease}
.ca-page .ca-video-card:hover{transform:translateY(-3px);box-shadow:0 16px 28px rgba(0,0,0,.12)}
.ca-page .ca-video-thumb{position:relative;aspect-ratio:16/9;background:#1a1614}
.ca-page .ca-video-thumb img{width:100%;height:100%;object-fit:cover;display:block}
.ca-page .ca-video-play{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:54px;height:54px;border-radius:50%;background:rgba(183,131,51,.94);color:#fff;display:flex;align-items:center;justify-content:center;font-size:22px;box-shadow:0 8px 20px rgba(0,0,0,.28)}
.ca-page .ca-video-card h3{margin:0;padding:14px 16px;font-size:16px;line-height:1.35;color:#3d342d}
.ca-video-modal{display:none;position:fixed;inset:0;z-index:10050;background:rgba(0,0,0,.78);align-items:center;justify-content:center;padding:20px}
.ca-video-modal.is-open{display:flex}
.ca-video-modal-inner{position:relative;width:min(920px,100%);aspect-ratio:16/9;background:#000;border-radius:12px;overflow:visible;box-shadow:0 20px 50px rgba(0,0,0,.45)}
.ca-video-modal-inner #caVideoModalMount{position:absolute;inset:0;border-radius:12px;overflow:hidden;background:#000}
.ca-video-modal-inner iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
.ca-video-modal-close{position:absolute;top:-44px;right:0;z-index:2;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.35);color:#fff;width:36px;height:36px;border-radius:50%;font-size:24px;cursor:pointer;line-height:1;display:flex;align-items:center;justify-content:center}
@media (max-width:1024px){
.ca-page .ca-why-grid,.ca-page .ca-links{grid-template-columns:1fr 1fr}
.ca-page .ca-checks{grid-template-columns:1fr}
}
@media (max-width:900px){
.ca-page .ortho-grid-2{grid-template-columns:1fr}
}
@media (max-width:768px){
.ca-page .ca-sec-alt{background:linear-gradient(180deg,#f3ece6 0%,#e8e0d8 100%)}
.ca-page .ortho-sub{color:#3a3836!important;line-height:1.75}
.ca-page .ca-why-grid,.ca-page .ca-links,.ca-page .ca-video-grid{grid-template-columns:1fr}
.ca-page .ca-compare{display:block;overflow-x:auto}
.ca-page .ca-compare th,.ca-page .ca-compare td{min-width:200px}
.ca-page .ca-stories-slider-outer{padding-left:10px;padding-right:10px}
.ca-page .ca-stories-slider-outer .ca-patient-stories-wrap.dr-gallery-slider-wrap{padding-left:10px;padding-right:10px;margin-top:8px}
.ca-page .ca-patient-stories-wrap .dr-gallery-slide.ca-patient-story-slide{flex:0 0 calc(100% - 8px);min-width:calc(100% - 8px);max-width:calc(100% - 8px);box-sizing:border-box}
.ca-page .ca-story-slide-inner img{height:min(70vw,320px)}
}
</style>

<div class="ortho-page ca-page">
    <section class="dcc-hero ca-hero">
        <div class="dcc-hero-inner">
            <h1>Clear Aligners – A Discreet Alternative to Traditional Braces</h1>
            <p class="dcc-hero-sub">Straighten your smile without the look of metal braces.</p>
            <div class="dcc-hero-cta">
                <a class="ortho-btn ortho-btn-gold" <?php echo $book_attrs; ?>>Book Your Appointment</a>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-grid-2">
                <div>
                    <h2>Straighten Your Smile Without the Look of Metal Braces</h2>
                    <p class="ortho-sub">Want straighter teeth but don't want traditional metal braces?</p>
                    <p class="ortho-sub" style="margin-top:14px;">Clear aligners offer a discreet, removable way to straighten teeth without the brackets and wires associated with conventional braces. At Dontia Care Clinic, we provide personalized clear aligner treatment, including Invisalign, based on your teeth, bite, and treatment goals.</p>
                    <p class="ortho-sub" style="margin-top:14px;">Whether you have crowded teeth, gaps, crooked teeth, or certain bite alignment concerns, our dental team can assess your smile and determine whether clear aligner treatment is suitable for you.</p>
                    <div style="margin-top:18px;">
                        <a class="ortho-btn" <?php echo $book_attrs; ?>>Get a Clear Aligner Consultation</a>
                    </div>
                </div>
                <div class="ca-media">
                    <img src="<?php echo htmlspecialchars($what_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Before and after clear aligner treatment at Dontia Care Clinic, Kolkata" width="640" height="800" decoding="async">
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec ca-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>What Are Clear Aligners?</h2>
            </div>
            <p class="ortho-sub">Clear aligners are a series of custom-made, transparent trays designed to gradually move your teeth into planned positions.</p>
            <p class="ortho-sub" style="margin-top:14px;">Unlike traditional <a href="<?php echo base_url('best-orthodontist-in-kolkata'); ?>">braces</a>, clear aligners don't use metal brackets and wires. The aligners are removable and virtually invisible, making them a popular option for adults and teenagers who want a more discreet orthodontic experience.</p>
            <p class="ortho-sub" style="margin-top:14px;">You typically wear each aligner according to your dentist's instructions before progressing to the next stage of your treatment.</p>
            <p class="ortho-sub" style="margin-top:14px;">At Dontia Care Clinic, your treatment begins with a professional assessment to understand your teeth and bite before recommending whether clear aligners are appropriate for you.</p>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Clear Aligners vs Traditional Braces</h2>
                <p>If you've been considering orthodontic treatment, you may be wondering: can I straighten my teeth without braces? For many suitable cases, clear aligners can provide an alternative to traditional fixed braces.</p>
            </div>
            <table class="ca-compare">
                <thead>
                    <tr>
                        <th>Clear Aligners</th>
                        <th>Traditional Braces</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Transparent and discreet</td><td>Visible brackets and wires</td></tr>
                    <tr><td>Removable</td><td>Fixed to the teeth</td></tr>
                    <tr><td>Can be removed for eating</td><td>Food choices may require additional care</td></tr>
                    <tr><td>Easier access for brushing and flossing</td><td>Cleaning around brackets and wires requires extra attention</td></tr>
                    <tr><td>Smooth plastic trays</td><td>Brackets and wires</td></tr>
                    <tr><td>Digital treatment planning may be used</td><td>Conventional orthodontic planning</td></tr>
                </tbody>
            </table>
            <p class="ca-callout">Both clear aligners and braces can be effective orthodontic treatments. The appropriate option depends on your individual dental condition, bite, treatment objectives, and clinical assessment.</p>
        </div>
    </section>

    <section class="ortho-sec ca-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Why Choose Clear Aligners?</h2>
            </div>
            <div class="ca-why-grid">
                <?php foreach ($why_points as $i => $point) { ?>
                <article class="ca-why-card">
                    <span class="ca-why-num"><?php echo str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT); ?></span>
                    <h3><?php echo htmlspecialchars($point['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p><?php echo htmlspecialchars($point['text'], ENT_QUOTES, 'UTF-8'); ?></p>
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Invisalign at Dontia Care Clinic</h2>
                <p>Advanced clear aligner treatment with Invisalign.</p>
            </div>
            <div class="ortho-grid-2" style="align-items:start;">
                <div>
                    <p class="ortho-sub">At Dontia Care Clinic, Invisalign is one of the clear aligner options available for suitable patients.</p>
                    <p class="ortho-sub" style="margin-top:14px;">Invisalign treatment uses a series of customized, removable clear aligners to gradually move teeth. Treatment planning can incorporate digital scanning and 3D treatment planning to map the planned movement of your teeth.</p>
                    <p class="ortho-sub" style="margin-top:14px;">Invisalign aligners use SmartTrack™ material, and treatment is professionally supervised by a trained Invisalign provider.</p>
                </div>
                <div>
                    <h3>Why Invisalign?</h3>
                    <ul class="ortho-benefit-list">
                        <?php foreach ($invisalign_points as $point) { ?>
                        <li><?php echo htmlspecialchars($point, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php } ?>
                    </ul>
                    <div style="margin-top:18px;">
                        <a class="ortho-btn ortho-btn-gold" <?php echo $book_attrs; ?>>Book an Invisalign Consultation</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec ca-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Who Can Benefit From Clear Aligners?</h2>
                <p>Clear aligners may be suitable for people with certain orthodontic concerns.</p>
            </div>
            <div class="ca-why-grid">
                <?php foreach ($benefit_cases as $case) { ?>
                <article class="ca-why-card">
                    <h3><?php echo htmlspecialchars($case['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p><?php echo htmlspecialchars($case['text'], ENT_QUOTES, 'UTF-8'); ?></p>
                </article>
                <?php } ?>
            </div>
            <p class="ca-callout">Not every orthodontic case is suitable for clear aligners. A dentist or orthodontist needs to examine your teeth and bite before recommending treatment.</p>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Can Clear Aligners Replace Braces?</h2>
                <p>Clear aligners can be an alternative to braces for many patients, but they aren't automatically the right choice for everyone.</p>
            </div>
            <h3>Which option is right for you?</h3>
            <p class="ortho-sub">Your treatment options depend on factors such as:</p>
            <ul class="ca-checks">
                <?php foreach ($decision_factors as $factor) { ?>
                <li><?php echo htmlspecialchars($factor, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php } ?>
            </ul>
            <p class="ortho-sub" style="margin-top:18px;">During your consultation, our dental team can assess your smile and explain whether clear aligners, Invisalign, or traditional braces are more appropriate for your individual needs.</p>
        </div>
    </section>

    <section class="ortho-sec ca-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>How Does Clear Aligner Treatment Work?</h2>
                <p>Your journey to a straighter smile.</p>
            </div>
            <ol class="ca-steps">
                <?php foreach ($steps as $step) { ?>
                <li>
                    <strong><?php echo htmlspecialchars($step['title'], ENT_QUOTES, 'UTF-8'); ?></strong>
                    <span><?php echo htmlspecialchars($step['text'], ENT_QUOTES, 'UTF-8'); ?></span>
                </li>
                <?php } ?>
            </ol>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-grid-2" style="align-items:start;">
                <div>
                    <h2>How Long Do Clear Aligners Take?</h2>
                    <p class="ortho-sub">There is no single treatment duration that applies to everyone.</p>
                    <p class="ortho-sub" style="margin-top:14px;">Your treatment time depends on the complexity of your case, the amount of tooth movement required, your treatment plan, and how consistently you follow your dentist's instructions.</p>
                    <p class="ortho-sub" style="margin-top:14px;">Some Invisalign cases can show visible changes within weeks and may be completed in around six months, but treatment duration varies considerably between patients.</p>
                    <p class="ortho-sub" style="margin-top:14px;">Your dentist can provide a more accurate estimated timeline after evaluating your smile.</p>
                </div>
                <div>
                    <h2>Are Clear Aligners Comfortable?</h2>
                    <p class="ortho-sub">Clear aligners are designed to fit over your teeth and gradually apply controlled forces to move them.</p>
                    <p class="ortho-sub" style="margin-top:14px;">You may experience temporary pressure, tightness, or mild discomfort, particularly when beginning a new aligner. This can be part of the tooth-movement process.</p>
                    <p class="ca-callout">If you experience significant or persistent pain, contact your dental professional.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec ca-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Clear Aligners for Adults</h2>
                <p>Straighten your smile without changing your lifestyle. You don't have to be a teenager to consider orthodontic treatment.</p>
            </div>
            <p class="ortho-sub">Clear aligners are particularly attractive to adults who may want to improve their smile while maintaining a professional and discreet appearance. They can be convenient for:</p>
            <div class="ca-chips">
                <?php foreach ($adult_groups as $group) { ?>
                <span class="ca-chip"><?php echo htmlspecialchars($group, ENT_QUOTES, 'UTF-8'); ?></span>
                <?php } ?>
            </div>
            <p class="ortho-sub" style="margin-top:18px;">Invisalign specifically offers clear aligner treatment for adults as well as younger patients, with suitability determined by the treating dental professional.</p>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <h2>Clear Aligners for Crooked or Crowded Teeth</h2>
            <p class="ortho-sub">Crooked and crowded teeth can affect more than just the appearance of your smile.</p>
            <p class="ortho-sub" style="margin-top:14px;">Misaligned teeth may make some areas harder to clean effectively. Orthodontic treatment can help improve tooth positioning and, when appropriate, make daily oral hygiene easier.</p>
            <p class="ortho-sub" style="margin-top:14px;">Clear aligners can be considered for certain cases of:</p>
            <div class="ca-chips">
                <span class="ca-chip">Crowding</span>
                <span class="ca-chip">Spacing</span>
                <span class="ca-chip">Crooked teeth</span>
                <span class="ca-chip">Tooth rotation</span>
                <span class="ca-chip">Certain bite problems</span>
            </div>
            <p class="ca-callout">The appropriate treatment depends on the underlying dental and orthodontic condition.</p>
        </div>
    </section>

    <section class="ortho-sec ca-sec-alt">
        <div class="container">
            <h2>Invisalign vs Other Clear Aligners</h2>
            <p class="ortho-sub">Not all clear aligner systems are identical.</p>
            <p class="ortho-sub" style="margin-top:14px;">Invisalign is a specific clear aligner system that uses proprietary SmartTrack™ material and ClinCheck® treatment-planning software, with treatment delivered under professional supervision.</p>
            <p class="ortho-sub" style="margin-top:14px;">At Dontia Care Clinic, we focus on clinically supervised treatment rather than simply providing an aligner tray.</p>
            <p class="ortho-sub" style="margin-top:14px;">Your teeth, gums, bite, treatment objectives, and suitability should be assessed before treatment begins.</p>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Why Choose Dontia Care Clinic for Clear Aligners?</h2>
            </div>
            <div class="ca-why-grid">
                <?php foreach ($clinic_points as $point) { ?>
                <article class="ca-why-card">
                    <h3><?php echo htmlspecialchars($point['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p><?php echo htmlspecialchars($point['text'], ENT_QUOTES, 'UTF-8'); ?></p>
                </article>
                <?php } ?>
            </div>
            <?php if (count($tech_cards) > 0) { ?>
            <div class="ca-why-grid" style="margin-top:28px;align-items:stretch;">
                <?php foreach ($tech_cards as $tc) {
                    $_tc_srcset = isset($tc['image_srcset']) ? (string) $tc['image_srcset'] : '';
                    $_tc_sizes = isset($tc['image_sizes']) ? (string) $tc['image_sizes'] : '';
                ?>
                <article class="ortho-card">
                    <img src="<?php echo htmlspecialchars((string) $tc['image_url'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars((string) $tc['title'], ENT_QUOTES, 'UTF-8'); ?>"<?php if ($_tc_srcset !== '') { ?> srcset="<?php echo htmlspecialchars($_tc_srcset, ENT_QUOTES, 'UTF-8'); ?>" sizes="<?php echo htmlspecialchars($_tc_sizes, ENT_QUOTES, 'UTF-8'); ?>"<?php } ?> loading="lazy" decoding="async">
                    <h4><?php echo htmlspecialchars((string) $tc['title'], ENT_QUOTES, 'UTF-8'); ?></h4>
                    <p><?php echo htmlspecialchars((string) $tc['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                </article>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </section>

    <section class="ortho-sec ca-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Is Clear Aligner Treatment Right for You?</h2>
                <p>You may be a candidate if you:</p>
            </div>
            <ul class="ca-checks">
                <?php foreach ($candidate_points as $point) { ?>
                <li><?php echo htmlspecialchars($point, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php } ?>
            </ul>
            <p class="ca-callout">The only way to determine whether clear aligners are suitable for you is through a professional dental assessment.</p>
        </div>
    </section>

    <section class="ortho-sec ca-stories-section">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Clear Aligner Results</h2>
                <p>Clinical photos from aligner treatment at Dontia Care Clinic. Results vary from person to person.</p>
            </div>
        </div>
        <div class="ca-stories-slider-outer">
            <div class="dr-gallery-slider-wrap ca-patient-stories-wrap" id="caPatientStoriesWrap">
                <button type="button" class="dr-gallery-nav dr-gallery-nav-left" id="caPatientStoriesPrev" aria-label="Previous patient images">&#10094;</button>
                <div class="dr-gallery-slider" id="caPatientStoriesSlider">
                    <?php foreach ($patient_images as $pi) { ?>
                    <article class="dr-gallery-slide ca-patient-story-slide">
                        <div class="ca-story-slide-inner">
                            <img src="<?php echo htmlspecialchars($pi['url'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($pi['alt'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                            <p><?php echo htmlspecialchars($pi['caption'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                    </article>
                    <?php } ?>
                </div>
                <button type="button" class="dr-gallery-nav dr-gallery-nav-right" id="caPatientStoriesNext" aria-label="Next patient images">&#10095;</button>
            </div>
        </div>
    </section>

    <section class="ortho-sec ca-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Watch Clear Aligner Stories</h2>
                <p>Hear how patients at Dontia Care Clinic approached teeth straightening with aligners.</p>
            </div>
            <div class="ca-video-grid" id="caVideoGrid">
                <?php foreach ($ca_videos as $vid) {
                    $thumb = 'https://img.youtube.com/vi/' . $vid['video_id'] . '/hqdefault.jpg';
                ?>
                <article class="ca-video-card" data-video-id="<?php echo htmlspecialchars($vid['video_id'], ENT_QUOTES, 'UTF-8'); ?>" tabindex="0" role="button" aria-label="Play <?php echo htmlspecialchars($vid['title'], ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="ca-video-thumb">
                        <img src="<?php echo htmlspecialchars($thumb, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($vid['title'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async" width="480" height="270">
                        <span class="ca-video-play" aria-hidden="true">&#9658;</span>
                    </div>
                    <h3><?php echo htmlspecialchars($vid['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>What Patients Say</h2>
                <p>A Google review from a parent whose child completed aligner treatment at the clinic.</p>
            </div>
            <figure class="ca-review">
                <img src="<?php echo htmlspecialchars($review_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Google review describing aligner treatment and a completed smile at Dontia Care Clinic" loading="lazy" decoding="async">
            </figure>
            <div style="text-align:center;margin-top:18px;">
                <a class="ortho-btn ortho-btn-gold" href="https://maps.app.goo.gl/Ujpqv8hHVHVkWBeL9" target="_blank" rel="noopener noreferrer">View reviews on Google</a>
            </div>
        </div>
    </section>

    <section class="ortho-sec ca-sec-alt">
        <div class="container ortho-faq">
            <div class="ortho-section-head">
                <h2>Frequently Asked Questions</h2>
            </div>
            <details>
                <summary>Are clear aligners the same as invisible braces?</summary>
                <p>The terms are often used interchangeably in everyday conversation. Clear aligners are transparent removable trays, while traditional braces use fixed brackets and wires. Clear aligners are therefore commonly described as an invisible braces alternative.</p>
            </details>
            <details>
                <summary>Can I straighten my teeth without braces?</summary>
                <p>For many suitable cases, yes. Clear aligners such as Invisalign can be used as an alternative orthodontic treatment to traditional braces. Suitability depends on your individual dental condition.</p>
            </details>
            <details>
                <summary>Can clear aligners fix crooked teeth?</summary>
                <p>Clear aligners can treat many types of tooth alignment problems, including certain cases of crooked teeth. Your dentist needs to assess the severity and cause of the misalignment first.</p>
            </details>
            <details>
                <summary>Can clear aligners fix crowded teeth?</summary>
                <p>They may be suitable for certain cases of dental crowding. More complex cases may require another orthodontic approach. A clinical assessment is necessary.</p>
            </details>
            <details>
                <summary>Can I eat while wearing clear aligners?</summary>
                <p>Clear aligners are generally removed for eating and then replaced after cleaning your teeth and the aligners according to your dentist's instructions.</p>
            </details>
            <details>
                <summary>How many hours a day should I wear clear aligners?</summary>
                <p>For Invisalign treatment, patients are generally instructed to wear aligners around 20–22 hours per day, removing them mainly for eating, drinking, and oral hygiene, unless their provider gives different instructions.</p>
            </details>
            <details>
                <summary>How much do clear aligners cost?</summary>
                <p>The cost depends on your case complexity, treatment duration, aligner system, and treatment plan. During your consultation, Dontia Care Clinic can provide a personalized treatment estimate.</p>
            </details>
            <details>
                <summary>Is Invisalign available at Dontia Care Clinic?</summary>
                <p>Yes. Dontia Care Clinic provides Invisalign treatment for suitable patients, along with clear aligner treatment options based on individual clinical requirements.</p>
            </details>
            <details>
                <summary>Are clear aligners better than braces?</summary>
                <p>Clear aligners and braces have different advantages and limitations. The appropriate choice depends on your teeth, bite, treatment complexity, lifestyle, and clinical requirements. Your dentist can help you understand which options are suitable for your case.</p>
            </details>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-cta-wrap">
                <div class="ortho-cta-card">
                    <h2>Start Your Clear Aligner Journey</h2>
                    <p>Want straighter teeth without traditional braces? Your smile doesn't have to be hidden behind metal brackets and wires. Discover whether clear aligners or Invisalign could be suitable for your smile. Book a consultation at Dontia Care Clinic today.</p>
                    <a class="ortho-btn" <?php echo $book_attrs; ?>>Book Your Clear Aligner Consultation</a>
                    <p style="margin-top:14px;margin-bottom:0;">Get assessed. Understand your options. Plan your smile with confidence.</p>
                    <p style="margin-top:10px;margin-bottom:0;"><a href="<?php echo base_url('contact-us'); ?>" class="ortho-note">Contact page</a> — directions and clinic details.</p>
                </div>
            </div>
            <?php $this->load->view('Dental/partials/clinic_location_cards'); ?>
        </div>
    </section>

    <section class="ortho-sec ca-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Related Dental Care</h2>
                <p>Explore other treatments at Dontia Care Clinic.</p>
            </div>
            <nav class="ca-links" aria-label="Related dental services">
                <?php foreach ($related_links as $link) { ?>
                <a href="<?php echo htmlspecialchars($link['href'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($link['label'], ENT_QUOTES, 'UTF-8'); ?></a>
                <?php } ?>
            </nav>
        </div>
    </section>

    <?php $this->load->view('Dental/partials/service_blog_cards'); ?>
</div>

<div class="ca-video-modal" id="caVideoModal" aria-hidden="true">
    <div class="ca-video-modal-inner">
        <button type="button" class="ca-video-modal-close" id="caVideoModalClose" aria-label="Close video">&times;</button>
        <div id="caVideoModalMount"></div>
    </div>
</div>

<script>
(function () {
    var slider = document.getElementById('caPatientStoriesSlider');
    var wrap = document.getElementById('caPatientStoriesWrap');
    var leftBtn = document.getElementById('caPatientStoriesPrev');
    var rightBtn = document.getElementById('caPatientStoriesNext');
    if (slider && leftBtn && rightBtn && wrap) {
        function scrollStepPx() {
            var slide = slider.querySelector('.ca-patient-story-slide');
            if (!slide) { return 420; }
            var cs = window.getComputedStyle(slider);
            var gap = parseFloat(cs.columnGap || cs.gap || '16');
            if (isNaN(gap)) { gap = 16; }
            return Math.round(slide.getBoundingClientRect().width + gap);
        }
        function tickAuto() {
            if (typeof document.visibilityState !== 'undefined' && document.visibilityState !== 'visible') { return; }
            var maxScroll = slider.scrollWidth - slider.clientWidth;
            if (maxScroll <= 8) { return; }
            var step = scrollStepPx();
            if (step < 120) { step = 320; }
            if (slider.scrollLeft >= maxScroll - 8) {
                slider.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                slider.scrollBy({ left: step, behavior: 'smooth' });
            }
        }
        var autoTimer = null;
        function stopAuto() { if (autoTimer) { clearInterval(autoTimer); autoTimer = null; } }
        function startAuto() { stopAuto(); autoTimer = setInterval(tickAuto, 3500); }
        leftBtn.addEventListener('click', function () { slider.scrollBy({ left: -scrollStepPx(), behavior: 'smooth' }); });
        rightBtn.addEventListener('click', function () { slider.scrollBy({ left: scrollStepPx(), behavior: 'smooth' }); });
        document.addEventListener('visibilitychange', function () {
            if (document.visibilityState === 'visible') { startAuto(); } else { stopAuto(); }
        });
        startAuto();
    }

    var modal = document.getElementById('caVideoModal');
    var mount = document.getElementById('caVideoModalMount');
    var closeBtn = document.getElementById('caVideoModalClose');
    var grid = document.getElementById('caVideoGrid');
    function closeModal() {
        if (!modal || !mount) { return; }
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        mount.innerHTML = '';
        document.body.style.overflow = '';
    }
    function openModal(vid) {
        if (!modal || !mount || !vid) { return; }
        mount.innerHTML = '';
        var iframe = document.createElement('iframe');
        iframe.src = 'https://www.youtube.com/embed/' + encodeURIComponent(vid) + '?autoplay=1&rel=0';
        iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
        iframe.setAttribute('allowfullscreen', '');
        iframe.setAttribute('title', 'Clear aligner video');
        iframe.setAttribute('referrerpolicy', 'strict-origin-when-cross-origin');
        mount.appendChild(iframe);
        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }
    if (grid) {
        function playFromCard(card) {
            if (!card) { return; }
            openModal(card.getAttribute('data-video-id'));
        }
        grid.addEventListener('click', function (e) {
            playFromCard(e.target.closest('.ca-video-card'));
        });
        grid.addEventListener('keydown', function (e) {
            if (e.key !== 'Enter' && e.key !== ' ') { return; }
            var card = e.target.closest('.ca-video-card');
            if (!card) { return; }
            e.preventDefault();
            playFromCard(card);
        });
    }
    if (closeBtn) { closeBtn.addEventListener('click', closeModal); }
    if (modal) {
        modal.addEventListener('click', function (e) {
            if (e.target === modal) { closeModal(); }
        });
    }
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') { closeModal(); }
    });
})();
</script>

<?php $this->load->view('include/footer/footer'); ?>
