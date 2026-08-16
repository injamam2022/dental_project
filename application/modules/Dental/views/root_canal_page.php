<?php
$this->load->view('include/header/header');
$doctors = isset($doctor_list) && is_array($doctor_list) ? $doctor_list : array();
$tech_cards = isset($technology_cards) && is_array($technology_cards) ? $technology_cards : array();
$certs = isset($media_certificates) && is_array($media_certificates) ? $media_certificates : array();
$blogs = isset($blog_carousel) && is_array($blog_carousel) ? $blog_carousel : array();
$dontia_branding_dir = rtrim(base_url('assets/images/branding/'), '/');
$dontia_dr_prabhjeet_photo = $dontia_branding_dir . '/dr-prabhjeet-tmj-360w.jpg';
$dontia_dr_prabhjeet_srcset = htmlspecialchars(
    $dontia_branding_dir . '/dr-prabhjeet-tmj-360w.jpg 360w, ' .
    $dontia_branding_dir . '/dr-prabhjeet-tmj-480w.jpg 480w, ' .
    $dontia_branding_dir . '/dr-prabhjeet-tmj-560w.jpg 560w',
    ENT_QUOTES,
    'UTF-8'
);
$dontia_dr_sizes_esc = htmlspecialchars('(max-width: 900px) min(92vw, 360px), min(480px, 48vw)', ENT_QUOTES, 'UTF-8');
$dontia_dr_resp_attrs = ' srcset="' . $dontia_dr_prabhjeet_srcset . '" sizes="' . $dontia_dr_sizes_esc . '"';

$rct_img_dir = 'assets/images/root-canal-treatment/';
$rct_img = function ($filename) use ($rct_img_dir) {
    return base_url($rct_img_dir . rawurlencode($filename));
};

$hero_img = $rct_img('section-1-Root-canal-treatment-in-kolkat (1).jpeg');
$what_rct_img = $rct_img('section-7-WhatisRootCanalTreatmentRCT_.jpg');
$painless_img = $rct_img('section5 (1).JPG');
$doctor_rct_img = $rct_img('endontist-in-kolkata-dr-prabhjeet-singh-sethi-performing-root-canal-treatment.JPG');

$patient_images = array(
    array(
        'url' => $rct_img('root-canal-treatment-patient-in-kolkata.webp'),
        'alt' => 'Root canal treatment patient at Dontia Care Clinic, Kolkata',
        'caption' => 'Comfortable, painless root canal care that saves your natural tooth.',
    ),
    array(
        'url' => $rct_img('root-canal-patient-treatment-in-kolkata (1).jpeg'),
        'alt' => 'Root canal patient treatment in Kolkata',
        'caption' => 'Same-day relief from tooth pain with expert endodontic care.',
    ),
    array(
        'url' => $rct_img('endontist-in-kolkata-dr-prabhjeet-singh-sethi-performing-root-canal-treatment.JPG'),
        'alt' => 'Endodontist performing root canal treatment in Kolkata',
        'caption' => 'Modern rotary endodontics and gentle anaesthesia for a calmer visit.',
    ),
);

$rct_videos = array(
    array('title' => 'Patient Feedback', 'video_id' => 'lM7QBzXFFAc'),
    array('title' => 'Best Clinic in Kolkata', 'video_id' => 'RnUzeg5CcyU'),
    array('title' => 'Root Canal Treatment', 'video_id' => 'tTHsI5qP1wU'),
);

$rct_signs = array(
    'Unbearable tooth pain at the time of biting or chewing',
    'Increased sensitivity to hot and cold things',
    'Tooth discolouration',
    'Swollen gums',
    'Dental abscess',
    'A deeper cavity in the tooth is causing decay',
    'Continual palpitating tooth pain',
    'Inflammation around the infected tooth',
);

$rct_why_points = array(
    'Experienced endodontic specialists - Dr. Prabhjeet Singh Sethi',
    'He has 25+ years of experience and has done thousands of root canal procedures and treated patients to alleviate pain',
    'Cutting-edge rotary root canal technology',
    'Painless and comfortable processes',
    'High treatment success rate',
    'Precise sterilisation and safety protocols',
    'Treatment package affordability',
);

$rct_painless_points = array(
    'Minimal Pain',
    'Quicker compared to earlier methods',
    'Significantly specific and sterile',
    'Highly comfortable for the patients',
    'Efficient, cutting the entire treatment time to a considerably low figure',
);

$rct_aftercare = array(
    'Avoid using the treated tooth for chewing both sticky and hard foods.',
    'Take the prescribed toothpaste and medications as advised.',
    'Visit for regular check-ups and crown placement as needed.',
    'Never miss any scheduled routine check-ups.',
);
?>
<style>
.rct-page{overflow-x:hidden}
.rct-page .container{max-width:min(1280px,94vw);width:100%;padding-left:max(22px,calc(env(safe-area-inset-left,0px) + 16px));padding-right:max(22px,calc(env(safe-area-inset-right,0px) + 16px));box-sizing:border-box}

.ortho-page .ortho-sec{padding:60px 0}
.ortho-page .ortho-sec h2,.ortho-page .ortho-sec h3,.ortho-page .ortho-sec h4{margin:0 0 16px}
.ortho-page .ortho-sub{font-size:18px;line-height:1.8;color:#4b4b4b}
.ortho-page .ortho-grid-2{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:28px;align-items:center}
.ortho-page .ortho-card{background:#fff;border-radius:12px;padding:22px;box-shadow:0 8px 20px rgba(0,0,0,.08);height:100%}
.ortho-page .ortho-card img{width:100%;height:190px;object-fit:cover;border-radius:8px;margin-bottom:12px}
.ortho-page .ortho-section-head{text-align:center;margin-bottom:26px}
.ortho-page .ortho-section-head h2{display:inline-block;margin:0 auto 10px}
.ortho-page .ortho-section-head p{margin:0 auto;color:#675f57;max-width:760px}
.ortho-page .ortho-doctor-layout{display:grid;grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr);gap:22px;align-items:stretch;max-width:1080px;margin:0 auto}
.ortho-page .ortho-doctor-card{background:#fff;border-radius:14px;padding:12px;box-shadow:0 10px 24px rgba(0,0,0,.08);border:1px solid #ece6df;text-align:center}
.ortho-page .ortho-doctor-photo{width:100%;height:280px;object-fit:cover;object-position:center 18%;border-radius:10px;display:block;margin:0 0 12px}
.ortho-page .ortho-doctor-card h3{margin:0 0 6px;font-size:18px;line-height:1.25}
.ortho-page .ortho-doctor-card p{margin:0;color:#6d6258;font-size:16px}
.ortho-page .ortho-doctor-note{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:22px 24px;box-shadow:0 10px 24px rgba(0,0,0,.07);display:flex;flex-direction:column;justify-content:center;text-align:left}
.ortho-page .ortho-doctor-note h3{margin:0 0 12px;font-size:28px;line-height:1.2}
.ortho-page .ortho-doctor-note p{margin:0 0 10px;color:#4b4b4b;line-height:1.7}
.ortho-page .ortho-benefit-list,.ortho-page .ortho-service-bullets{list-style:none;padding:0;margin:14px 0 0;display:grid;gap:12px}
.ortho-page .ortho-benefit-list li,.ortho-page .ortho-service-bullets li{position:relative;background:#fff;border:1px solid #ece6df;border-radius:10px;padding:12px 14px 12px 42px;box-shadow:0 6px 14px rgba(0,0,0,.06);margin:0;line-height:1.7}
.ortho-page .ortho-benefit-list li::before,.ortho-page .ortho-service-bullets li::before{content:"";position:absolute;left:16px;top:18px;width:12px;height:12px;border-radius:50%;background:linear-gradient(135deg,#7a5140 0%,#5b2f1d 100%);box-shadow:0 0 0 4px rgba(122,81,64,.15)}
.ortho-page .ortho-cert-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:20px}
.ortho-page .ortho-cert-card{background:#fff;border:1px solid #ece6df;border-radius:12px;padding:14px;box-shadow:0 10px 20px rgba(0,0,0,.08);transition:transform .2s ease,box-shadow .2s ease}
.ortho-page .ortho-cert-card:hover{transform:translateY(-3px);box-shadow:0 14px 24px rgba(0,0,0,.12)}
.ortho-page .ortho-cert-card img{width:100%;height:220px;object-fit:contain;object-position:center;background:#f7f6f3;border-radius:8px;display:block}
.ortho-page .ortho-cta-wrap{max-width:920px;margin:0 auto}
.ortho-page .ortho-cta-card{background:linear-gradient(135deg,#ffffff 0%,#f7f4ef 100%);border:1px solid #e9e2d8;border-radius:14px;padding:28px 30px;box-shadow:0 10px 24px rgba(0,0,0,.08)}
.ortho-page .ortho-cta-card h2{margin:0 0 12px}
.ortho-page .ortho-cta-card p{margin:0 0 18px;color:#4f4b46;line-height:1.7;max-width:760px}
.ortho-page .ortho-faq{max-width:980px;margin:0 auto}
.ortho-page .ortho-faq details{border:1px solid #ebe8e2;border-radius:8px;padding:0;margin-bottom:10px;background:#f7f6f3;overflow:hidden}
.ortho-page .ortho-faq summary{cursor:pointer;font-weight:700;padding:13px 16px;list-style:revert}
.ortho-page .ortho-faq details p{margin:0;padding:0 16px 14px 34px;color:#4f4b46;line-height:1.7;background:#fff;border-top:1px solid #ece7df}
.ortho-page .ortho-btn{display:inline-flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#7a5140 0%,#5b2f1d 100%);color:#fff;padding:12px 24px;border-radius:999px;font-size:13px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;border:0;box-shadow:0 8px 20px rgba(91,47,29,.28);transition:transform .2s ease,box-shadow .2s ease,opacity .2s ease}
.ortho-page .ortho-btn:hover,.ortho-page .ortho-btn:focus{color:#fff;text-decoration:none;transform:translateY(-1px);box-shadow:0 12px 24px rgba(91,47,29,.34)}
.ortho-page .ortho-btn-gold{background:linear-gradient(135deg,#c59a4d 0%,#b78333 100%);box-shadow:0 8px 20px rgba(183,131,51,.28)}
.ortho-page .ortho-btn-gold:hover,.ortho-page .ortho-btn-gold:focus{box-shadow:0 12px 24px rgba(183,131,51,.35)}
.ortho-page .ortho-note{font-weight:700;color:#1f6fd0}
@media (max-width:900px){.ortho-page .ortho-grid-2,.ortho-page .ortho-doctor-layout,.ortho-page .ortho-cert-grid{grid-template-columns:1fr}}

.rct-page .rct-sec-alt{background:#f8fbff}
.rct-page .rct-media{width:100%;border-radius:14px;overflow:hidden;box-shadow:0 14px 32px rgba(49,19,0,.12);border:1px solid #ece6df;background:#f3efe9}
.rct-page .rct-media img{width:100%;height:auto;display:block;aspect-ratio:4/3;object-fit:cover}
.rct-page .rct-callout{margin-top:18px;padding:14px 18px;border-left:4px solid #b78333;background:#fff8ef;border-radius:0 10px 10px 0;color:#3f3731;line-height:1.65;font-weight:600}
.rct-page .rct-signs{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px;margin-top:18px}
.rct-page .rct-signs li{list-style:none;margin:0;background:#fff;border:1px solid #ece6df;border-radius:12px;padding:14px 16px 14px 44px;position:relative;line-height:1.55;box-shadow:0 6px 14px rgba(0,0,0,.05)}
.rct-page .rct-signs li::before{content:"✓";position:absolute;left:14px;top:13px;width:22px;height:22px;border-radius:50%;background:linear-gradient(135deg,#c59a4d,#b78333);color:#fff;font-size:12px;font-weight:700;display:flex;align-items:center;justify-content:center}
.rct-page .rct-proc-steps{list-style:none;padding:0;margin:18px 0 0;display:grid;gap:14px;counter-reset:rctstep}
.rct-page .rct-proc-steps li{margin:0;background:#fff;border:1px solid #ece6df;border-radius:12px;padding:18px 20px 18px 72px;box-shadow:0 8px 20px rgba(0,0,0,.07);position:relative}
.rct-page .rct-proc-steps li::before{counter-increment:rctstep;content:counter(rctstep);position:absolute;left:18px;top:18px;width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#7a5140,#5b2f1d);color:#fff;font-weight:700;font-size:15px;display:flex;align-items:center;justify-content:center}
.rct-page .rct-proc-steps strong{display:block;color:#5b2f1d;margin-bottom:6px;font-size:17px}
.rct-page .rct-compare{width:100%;border-collapse:separate;border-spacing:0;margin-top:18px;background:#fff;border:1px solid #ece6df;border-radius:14px;overflow:hidden;box-shadow:0 10px 24px rgba(0,0,0,.06)}
.rct-page .rct-compare th,.rct-page .rct-compare td{padding:14px 16px;text-align:left;border-bottom:1px solid #ece6df;vertical-align:top;line-height:1.55}
.rct-page .rct-compare th{background:linear-gradient(135deg,#7a5140,#5b2f1d);color:#fff;font-weight:700}
.rct-page .rct-compare th:first-child{width:50%}
.rct-page .rct-compare tr:last-child td{border-bottom:0}
.rct-page .rct-compare td:first-child{background:#fbf8f4;font-weight:600;color:#3d342d}
.rct-page .rct-chips{display:flex;flex-wrap:wrap;gap:10px;margin-top:16px}
.rct-page .rct-chip{display:inline-flex;align-items:center;padding:10px 14px;border-radius:999px;background:#fff;border:1px solid #e8dfd4;color:#4a3b32;font-weight:600;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,.05)}
.rct-page .rct-stories-slider-outer{width:100vw;max-width:100%;position:relative;left:50%;transform:translateX(-50%);box-sizing:border-box;padding-left:clamp(16px,3.5vw,40px);padding-right:clamp(16px,3.5vw,40px)}
.rct-page .rct-stories-slider-outer .rct-patient-stories-wrap.dr-gallery-slider-wrap{margin-top:14px;padding-left:max(48px,calc(env(safe-area-inset-left,0px) + 42px));padding-right:max(48px,calc(env(safe-area-inset-right,0px) + 42px))}
.rct-page .rct-story-slide-inner{background:#fff;border-radius:12px;padding:14px;box-shadow:0 10px 22px rgba(0,0,0,.12);height:100%;box-sizing:border-box;text-align:left}
.rct-page .rct-story-slide-inner img{width:100%;height:380px;object-fit:cover;object-position:center;border-radius:8px;display:block}
.rct-page .rct-story-slide-inner p{margin:12px 0 0;color:#5a534c;line-height:1.65;font-size:15px}
.rct-page .rct-video-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px;margin-top:18px}
.rct-page .rct-video-card{background:#fff;border:1px solid #ece6df;border-radius:14px;overflow:hidden;box-shadow:0 10px 22px rgba(0,0,0,.08);cursor:pointer;transition:transform .2s ease,box-shadow .2s ease}
.rct-page .rct-video-card:hover{transform:translateY(-3px);box-shadow:0 16px 28px rgba(0,0,0,.12)}
.rct-page .rct-video-thumb{position:relative;aspect-ratio:16/9;background:#1a1614}
.rct-page .rct-video-thumb img{width:100%;height:100%;object-fit:cover;display:block}
.rct-page .rct-video-play{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:54px;height:54px;border-radius:50%;background:rgba(183,131,51,.94);color:#fff;display:flex;align-items:center;justify-content:center;font-size:22px;box-shadow:0 8px 20px rgba(0,0,0,.28)}
.rct-page .rct-video-card h3{margin:0;padding:14px 16px;font-size:16px;line-height:1.35;color:#3d342d}
.rct-video-modal{display:none;position:fixed;inset:0;z-index:10050;background:rgba(0,0,0,.78);align-items:center;justify-content:center;padding:20px}
.rct-video-modal.is-open{display:flex}
.rct-video-modal-inner{position:relative;width:min(920px,100%);aspect-ratio:16/9;background:#000;border-radius:12px;overflow:visible;box-shadow:0 20px 50px rgba(0,0,0,.45)}
.rct-video-modal-inner #rctVideoModalMount{position:absolute;inset:0;border-radius:12px;overflow:hidden;background:#000}
.rct-video-modal-inner iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
.rct-video-modal-close{position:absolute;top:-44px;right:0;z-index:2;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.35);color:#fff;width:36px;height:36px;border-radius:50%;font-size:24px;cursor:pointer;line-height:1;display:flex;align-items:center;justify-content:center}

@media (max-width:1024px){.rct-page .rct-video-grid{grid-template-columns:1fr 1fr}.rct-page .rct-signs{grid-template-columns:1fr}}
@media (max-width:768px){
.rct-page .rct-sec-alt{background:linear-gradient(180deg,#f3ece6 0%,#e8e0d8 100%)}
.rct-page .ortho-sub{color:#3a3836!important;line-height:1.75}
.rct-page .rct-video-grid{grid-template-columns:1fr}
.rct-page .rct-stories-slider-outer{padding-left:10px;padding-right:10px}
.rct-page .rct-stories-slider-outer .rct-patient-stories-wrap.dr-gallery-slider-wrap{padding-left:10px;padding-right:10px;margin-top:8px}
.rct-page .rct-patient-stories-wrap .dr-gallery-slider{gap:12px}
.rct-page .rct-patient-stories-wrap .dr-gallery-slide.rct-patient-story-slide{flex:0 0 calc(100% - 8px);min-width:calc(100% - 8px);max-width:calc(100% - 8px);box-sizing:border-box}
.rct-page .rct-story-slide-inner img{height:min(52vw,260px)}
.rct-page .rct-compare{display:block;overflow-x:auto}
.rct-page .rct-compare th,.rct-page .rct-compare td{min-width:180px}
}
</style>

<div class="ortho-page implant-page rct-page">
    <section class="dcc-hero" style="background-image:url('<?php echo htmlspecialchars($hero_img, ENT_QUOTES, 'UTF-8'); ?>')">
        <div class="dcc-hero-inner">
            <h1>Root Canal Treatment in Kolkata – Painless &amp; Advanced Care</h1>
            <p class="dcc-hero-sub">Expert endodontists, modern technology, and same-day relief from tooth pain at Dontia Care Clinic-Dental.</p>
            <div class="dcc-hero-cta">
                <a class="ortho-btn ortho-btn-gold" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal">Book consultation</a>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-grid-2">
                <div>
                    <p class="ortho-sub">Severe tooth pain doesn't have to become tooth loss. Get painless root canal treatment in Kolkata with advanced technology that saves your natural tooth and restores your smile. At Dontia Care Clinic-Dental, we use modern technology and tools, and anaesthesia techniques to offer painless root canal treatment (RCT) in Kolkata. We strive to do so to help you get rid of intolerable tooth pain quickly by removing the infection and ensuring no damage to your natural tooth.</p>
                    <p class="ortho-sub" style="margin-top:16px;">An infected tooth is the last thing you would want to see, as it can disrupt your daily activities. We have a dedicated team that uses advanced root canal methods to help you overcome infection while preserving your original tooth. We prioritise long-term oral solutions instead of temporary root extraction through a personalised and advanced RCT treatment.</p>
                </div>
                <div class="rct-media">
                    <img src="<?php echo htmlspecialchars($hero_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Root canal treatment in Kolkata at Dontia Care Clinic-Dental" width="640" height="480" decoding="async" fetchpriority="high">
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec rct-sec-alt">
        <div class="container">
            <div class="ortho-grid-2">
                <div class="rct-media">
                    <img src="<?php echo htmlspecialchars($what_rct_img, ENT_QUOTES, 'UTF-8'); ?>" alt="What is root canal treatment (RCT)" loading="lazy" decoding="async" width="640" height="480">
                </div>
                <div>
                    <h2>What is Root Canal Treatment (RCT)?</h2>
                    <p class="ortho-sub">Root canal treatment is an advanced oral health care procedure that helps extract spoiled pulp from inside the tooth. The tooth is coated with a capping system at the end of the RCT procedure to prevent future tooth infection.</p>
                    <p class="ortho-sub" style="margin-top:14px;">The pulp is a sensitive area that comprises nerves, connective tissues, and blood vessels, supporting tooth growth. Infection, which develops after bacteria find their way into the tooth through deep cavities and cracks, causes unbearable pain.</p>
                    <p class="ortho-sub" style="margin-top:14px;">The RCT process includes removing the infected pulp alongside cleaning the canals and sealing the tooth to prevent any possible future occurrence of infection. Tooth sealing, in most cases, incorporates a dental crown to provide firmness to the tooth and make it function normally. This way, it gives you a perfect solution to retain your original tooth instead of getting it extracted, helping you regain your oral health.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Signs You May Need a Root Canal</h2>
                <p>If you notice signs as follows, you may need RCT:</p>
            </div>
            <ul class="rct-signs">
                <?php foreach ($rct_signs as $sign) { ?>
                <li><?php echo htmlspecialchars($sign, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php } ?>
            </ul>
            <p class="rct-callout">If you also notice any or all of these symptoms, get this treated early to save your tooth.</p>
        </div>
    </section>

    <section class="ortho-sec rct-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Testimonial Video</h2>
                <p>Hear from patients who chose Dontia Care Clinic-Dental for root canal care in Kolkata.</p>
            </div>
            <div class="rct-video-grid" id="rctVideoGrid">
                <?php foreach ($rct_videos as $vid) {
                    $thumb = 'https://img.youtube.com/vi/' . $vid['video_id'] . '/hqdefault.jpg';
                ?>
                <article class="rct-video-card" data-video-id="<?php echo htmlspecialchars($vid['video_id'], ENT_QUOTES, 'UTF-8'); ?>" tabindex="0" role="button" aria-label="Play <?php echo htmlspecialchars($vid['title'], ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="rct-video-thumb">
                        <img src="<?php echo htmlspecialchars($thumb, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($vid['title'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async" width="480" height="270">
                        <span class="rct-video-play" aria-hidden="true">&#9658;</span>
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
                <h2>Why Choose Dontia Care Clinic-Dental?</h2>
                <p>A safe and reliable treatment requires choosing the right dental clinic. At Dontia Care Clinic-Dental, we prioritise effective, reliable, safe, and patient-oriented care.</p>
            </div>
            <div class="ortho-doctor-layout">
                <div>
                    <article class="ortho-doctor-card">
                        <?php
                        $featured_doctor = null;
                        if (count($doctors) > 0) {
                            foreach ($doctors as $dr_pick) {
                                if (isset($dr_pick->doctor_name)) {
                                    $featured_doctor = $dr_pick;
                                    break;
                                }
                            }
                        }
                        $img = $doctor_rct_img;
                        $dr_name = $featured_doctor ? (string) $featured_doctor->doctor_name : 'Dr. Prabhjeet Singh Sethi';
                        $dr_desig = $featured_doctor && !empty($featured_doctor->designation)
                            ? (string) $featured_doctor->designation
                            : 'Endodontic specialist · 25+ years experience';
                        ?>
                        <img class="ortho-doctor-photo" src="<?php echo htmlspecialchars($img, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($dr_name . ' performing root canal treatment in Kolkata', ENT_QUOTES, 'UTF-8'); ?>" width="480" height="280" loading="lazy" decoding="async">
                        <h3><?php echo htmlspecialchars($dr_name, ENT_QUOTES, 'UTF-8'); ?></h3>
                        <p><?php echo htmlspecialchars($dr_desig, ENT_QUOTES, 'UTF-8'); ?></p>
                    </article>
                </div>
                <aside class="ortho-doctor-note">
                    <h3>Why Choose Dontia Care Clinic-Dental?</h3>
                    <p>Patients seeking the best and most trusted dental pulp specialist trust our medical specialists for unmatched diagnosis accuracy and compassionate care, along with cutting-edge treatment systems.</p>
                    <ul class="ortho-benefit-list">
                        <?php foreach ($rct_why_points as $point) { ?>
                        <li><?php echo htmlspecialchars($point, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php } ?>
                    </ul>
                    <div style="margin-top:16px;">
                        <a class="ortho-btn" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal">Book consultation</a>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="ortho-sec rct-sec-alt">
        <div class="container">
            <div class="ortho-grid-2">
                <div>
                    <h2>Painless Root Canal Treatment in Kolkata</h2>
                    <p class="ortho-sub">Not all dental clinics in Kolkata offer minimal pain treatment, which is a reason several patients worry about opting for it. But the reality is different, as modern technology has made it possible to offer painless treatment safely.</p>
                    <p class="ortho-sub" style="margin-top:14px;">We make use of new rotary endodontic technology along with unconventional anaesthesia systems to guarantee the entire treatment procedure remains:</p>
                    <div class="rct-chips">
                        <?php foreach ($rct_painless_points as $chip) { ?>
                        <span class="rct-chip"><?php echo htmlspecialchars($chip, ENT_QUOTES, 'UTF-8'); ?></span>
                        <?php } ?>
                    </div>
                    <p class="ortho-sub" style="margin-top:18px;">The best part about our treatment is that it is less painful and more reliable throughout the RCT procedure. The entire treatment process is rapid, usually closing a case in 1-2 visits. Some patients may need to undergo more visits if the condition is severe and not treatable within 2 visits.</p>
                </div>
                <div class="rct-media">
                    <img src="<?php echo htmlspecialchars($painless_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Painless root canal treatment with modern technology in Kolkata" loading="lazy" decoding="async" width="640" height="480">
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec rct-stories-section">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Patient Images</h2>
                <p>Real care moments from root canal treatment at our Kolkata clinic.</p>
            </div>
        </div>
        <div class="rct-stories-slider-outer">
            <div class="dr-gallery-slider-wrap rct-patient-stories-wrap" id="rctPatientStoriesWrap">
                <button type="button" class="dr-gallery-nav dr-gallery-nav-left" id="rctPatientStoriesPrev" aria-label="Previous patient images">&#10094;</button>
                <div class="dr-gallery-slider" id="rctPatientStoriesSlider">
                    <?php foreach ($patient_images as $pi) { ?>
                    <article class="dr-gallery-slide rct-patient-story-slide">
                        <div class="rct-story-slide-inner">
                            <img src="<?php echo htmlspecialchars($pi['url'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($pi['alt'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                            <p><?php echo htmlspecialchars($pi['caption'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                    </article>
                    <?php } ?>
                </div>
                <button type="button" class="dr-gallery-nav dr-gallery-nav-right" id="rctPatientStoriesNext" aria-label="Next patient images">&#10095;</button>
            </div>
        </div>
    </section>

    <section class="ortho-sec rct-sec-alt">
        <div class="container">
            <h3>Step-by-Step Root Canal Procedure</h3>
            <ol class="rct-proc-steps">
                <li>
                    <strong>Diagnosis and X-Ray</strong>
                    <span>We perform digital X-rays of your tooth to accurately identify the infection level and damaged tissues. Key findings of X-rays guide the development of a treatment plan designed to address your oral health needs.</span>
                </li>
                <li>
                    <strong>Local Anaesthesia</strong>
                    <span>It is a process to numb the infected area to give you zero pain during the process, ensuring a comfortable treatment throughout.</span>
                </li>
                <li>
                    <strong>Cleaning the Root Canal</strong>
                    <span>The process involves removing the sick pulp and cleaning the canals entirely using Rotary instruments.</span>
                </li>
                <li>
                    <strong>Filling &amp; Sealing</strong>
                    <span>A biocompatible material is then filled in the canals to protect them from infection in the long term.</span>
                </li>
                <li>
                    <strong>Crown Placement (if needed)</strong>
                    <span>A dental crown is put to that region to reinforce its original functionality.</span>
                </li>
            </ol>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-grid-2" style="align-items:start;">
                <div>
                    <h3>Why Root Canal Treatment is Important</h3>
                    <p class="ortho-sub">It is highly advisable to get the diseased tooth treated; it will harm the adjacent tissues. Below are some symptoms you must pay attention to:</p>
                    <ul class="ortho-service-bullets">
                        <li>Serious pain</li>
                        <li>Loss of bone</li>
                        <li>Formation of an abscess</li>
                        <li>Extraction of the tooth later on</li>
                        <li>Infection in the gum</li>
                        <li>Trouble feeling while chewing</li>
                        <li>Increased problems, resulting in comparatively higher charges</li>
                    </ul>
                    <p class="ortho-sub" style="margin-top:14px;">In contrast, timely treatment may not only help heal the condition faster but also at relatively lower costs.</p>
                </div>
                <div>
                    <h3>Aftercare Tips for Root Canal Treatment</h3>
                    <p class="ortho-sub">You should follow these tips for quick dental recovery as prescribed by the RCT Doctor:</p>
                    <ul class="ortho-benefit-list">
                        <?php foreach ($rct_aftercare as $tip) { ?>
                        <li><?php echo htmlspecialchars($tip, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php } ?>
                    </ul>
                    <p class="ortho-sub" style="margin-top:14px;">It is an overall smoother recovery experience for most patients.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec rct-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h3>Root Canal vs Tooth Extraction</h3>
                <p>If feasible, saving the original tooth is a relatively better option you should consider.</p>
            </div>
            <table class="rct-compare">
                <thead>
                    <tr>
                        <th>Root Canal</th>
                        <th>Tooth Extraction</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>A natural way to save the tooth</td><td>Removal of a tooth and then followed by Dental Implants</td></tr>
                    <tr><td>Helps regain normal functionality</td><td>May lead to additional costs for replacement</td></tr>
                    <tr><td>Helps restore an almost natural appearance</td><td>May deteriorate the smile's appearance</td></tr>
                    <tr><td>Long-term outcome</td><td>Short-term relief</td></tr>
                    <tr><td>Less invasive if treated</td><td>More invasive if left untouched</td></tr>
                </tbody>
            </table>
            <p class="rct-callout">If feasible, saving the original tooth is a relatively better option you should consider.</p>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <h2>Root Canal Treatment Cost in Kolkata</h2>
            <p class="ortho-sub">The cost of RCT in Kolkata varies depending on the tooth involved, the degree of infection, the number of canals, and whether a dental crown is needed.</p>
            <p class="ortho-sub" style="margin-top:14px;">At our clinic we keep treatment affordable and accessible. We discuss the package transparently before treatment begins.</p>
            <?php if (count($tech_cards) > 0) { ?>
            <div class="ortho-grid-2" style="margin-top:28px;align-items:stretch;">
                <?php foreach ($tech_cards as $tc) { ?>
                <article class="ortho-card">
                    <?php
                    $_tc_srcset = isset($tc['image_srcset']) ? (string) $tc['image_srcset'] : '';
                    $_tc_sizes = isset($tc['image_sizes']) ? (string) $tc['image_sizes'] : '';
                    ?>
                    <img src="<?php echo htmlspecialchars((string) $tc['image_url'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars((string) $tc['title'], ENT_QUOTES, 'UTF-8'); ?>"<?php if ($_tc_srcset !== '') { ?> srcset="<?php echo htmlspecialchars($_tc_srcset, ENT_QUOTES, 'UTF-8'); ?>" sizes="<?php echo htmlspecialchars($_tc_sizes, ENT_QUOTES, 'UTF-8'); ?>"<?php } ?> loading="lazy" decoding="async">
                    <h4><?php echo htmlspecialchars((string) $tc['title'], ENT_QUOTES, 'UTF-8'); ?></h4>
                    <p><?php echo htmlspecialchars((string) $tc['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                </article>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </section>

    <section class="ortho-sec rct-sec-alt">
        <div class="container">
            <div class="ortho-cta-wrap">
                <div class="ortho-cta-card">
                    <h2>Book Your Consultation Today</h2>
                    <p>Don't ignore tooth pain before it leads to complications. Choose Dontia Care Clinic-Dental for advanced, painless, and reliable RCT. Schedule your appointment with our experts and see why patients trust us among the top endodontists in Kolkata.</p>
                    <a class="ortho-btn" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal">Book consultation</a>
                    <p style="margin-top:14px;margin-bottom:0;"><a href="<?php echo base_url('contact-us'); ?>" class="ortho-note">Contact page</a> — directions and clinic details.</p>
                </div>
            </div>
            <?php $this->load->view('Dental/partials/clinic_location_cards'); ?>
        </div>
    </section>

    <section class="ortho-sec ortho-faq">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Frequently Asked Questions (FAQs)</h2>
            </div>
            <details>
                <summary>What is the RCT cost in Kolkata at your clinic?</summary>
                <p>The RCT cost ranges from INR 6,500 to INR 14,000, depending on the crown type and treatment approach. Laser RCT costs INR 6,500 to INR 16,000.</p>
            </details>
            <details>
                <summary>Is Laser Root Canal Treatment worth the cost?</summary>
                <p>Yes. Laser RCT improves disinfection, reduces pain, and promotes faster healing.</p>
            </details>
            <details>
                <summary>How many visits are required for RCT?</summary>
                <p>Standard RCT may require 1–2 visits. Laser and single-sitting RCT can often be completed in one appointment.</p>
            </details>
            <details>
                <summary>Is RCT painful?</summary>
                <p>Modern RCT is typically painless due to local anaesthesia and advanced tools.</p>
            </details>
            <details>
                <summary>Do I need a crown after RCT?</summary>
                <p>Yes. RCT-treated teeth become fragile and require a crown for protection and to restore chewing ability.</p>
            </details>
        </div>
    </section>

    <section class="ortho-sec rct-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h4>Certificates</h4>
                <p>Professional training that supports safe, high-standard endodontic care.</p>
            </div>
            <div class="ortho-cert-grid">
                <?php if (count($certs) > 0) {
                    foreach ($certs as $ci) {
                        $cert_img = !empty($ci->image_name) ? site_url('admin/webroot/uploads/dental_media/' . $ci->image_name) : base_url('admin/webroot/uploads/dental_page/defaults/Implantology_Cetificate.jpg');
                ?>
                <article class="ortho-cert-card"><img src="<?php echo htmlspecialchars($cert_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Certificate" loading="lazy" decoding="async"></article>
                <?php
                    }
                } else { ?>
                <article class="ortho-cert-card"><img src="<?php echo base_url('admin/webroot/uploads/dental_page/defaults/Implantology_Cetificate.jpg'); ?>" alt="Certificate" loading="lazy" decoding="async"></article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h4>Google Reviews</h4>
                <p>See what our patients say about Dontia Dental Clinic.</p>
            </div>
            <div style="text-align:center;">
                <a class="ortho-btn ortho-btn-gold" href="https://maps.app.goo.gl/Ujpqv8hHVHVkWBeL9" target="_blank" rel="noopener noreferrer">View reviews on Google</a>
            </div>
        </div>
    </section>

    <?php $this->load->view('Dental/partials/service_blog_cards'); ?>
</div>

<div class="rct-video-modal" id="rctVideoModal" aria-hidden="true">
    <div class="rct-video-modal-inner">
        <button type="button" class="rct-video-modal-close" id="rctVideoModalClose" aria-label="Close video">&times;</button>
        <div id="rctVideoModalMount"></div>
    </div>
</div>

<script>
(function () {
    var slider = document.getElementById('rctPatientStoriesSlider');
    var wrap = document.getElementById('rctPatientStoriesWrap');
    var leftBtn = document.getElementById('rctPatientStoriesPrev');
    var rightBtn = document.getElementById('rctPatientStoriesNext');
    if (slider && leftBtn && rightBtn && wrap) {
        function scrollStepPx() {
            var slide = slider.querySelector('.rct-patient-story-slide');
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
        window.addEventListener('load', function () { startAuto(); window.setTimeout(tickAuto, 400); });
        startAuto();
    }

    var modal = document.getElementById('rctVideoModal');
    var mount = document.getElementById('rctVideoModalMount');
    var closeBtn = document.getElementById('rctVideoModalClose');
    var grid = document.getElementById('rctVideoGrid');
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
        iframe.setAttribute('title', 'Patient testimonial video');
        iframe.setAttribute('frameborder', '0');
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
            playFromCard(e.target.closest('.rct-video-card'));
        });
        grid.addEventListener('keydown', function (e) {
            if (e.key !== 'Enter' && e.key !== ' ') { return; }
            var card = e.target.closest('.rct-video-card');
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
