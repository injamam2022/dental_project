<?php
$this->load->view('include/header/header');
$blogs = isset($blog_carousel) && is_array($blog_carousel) ? $blog_carousel : array();

$skin_img_dir = 'assets/images/skin-care/';
$skin_img = function ($filename) use ($skin_img_dir) {
    return base_url($skin_img_dir . rawurlencode($filename));
};

$hero_img = $skin_img('header-koel-mallick-at-skin-clinic-in-kolkata.JPG');
$section1_img = $skin_img('section1-dermatlogist-performing-skin-treatment-on-patient-in-kolkata-dontia-care-clinic-skin-and-hair.jpg');
$facial_img = $skin_img('medifacial-treatment-in-kolkata-at-skin-clinic.jpg');
$laser_img = $skin_img('section3-skin-doctor-treating-skin-with-laser-therapy-patient-in-kolkata.jpg');
$clinic_img = $skin_img('skin-treatment-in-the-clinic.jpg');
$why_img = $skin_img('Why Choose Dontia Care Clinic for Skin Treatment in Kolkatadontia-care-clinic-skin-and-hair-treatment-room (1).JPG');

$skin_youtube_id = 'B3xn7yI24EA';
$skin_yt_poster = 'https://i.ytimg.com/vi/' . rawurlencode($skin_youtube_id) . '/hqdefault.jpg';
$skin_embed = 'https://www.youtube-nocookie.com/embed/' . rawurlencode($skin_youtube_id) . '?rel=0&autoplay=1&playsinline=1';

$skin_pillars = array(
    'Recommending treatment specific to individual skin types by our dermatologists.',
    'Rejuvenate beauty naturally with glowing skin.',
    'Provide beautiful, lasting results based on advanced care solutions.',
);

$skin_analysis = array(
    'Skin type and its sensitivity — Dry, Normal & Oily',
    'Pigmentation acuteness',
    'Acne severity',
    'Patterns of ageing',
    'Basic cutis conditions',
);

$skin_facials = array(
    'Facial Rejuvenation Medifacial',
    'Hydra facial treatment for profound hydration and glow',
    'Oxygen (O2) infusion facial for instant glow',
    'Moringa facial revitalisation',
    'Cleopatra premium advanced ritual-rejuvenation treatment',
);

$skin_peels = array(
    'Peeling for tan removal',
    'Peeling to treat acne',
    'Dermatology service for melasma and pigmentation',
    'Peeling for brightening',
);

$skin_peel_helps = array(
    'Visible acne marks',
    'Noticeable damage from the sun',
    'Uneven tone',
    'Dull skin',
);

$skin_ageing = array(
    array('title' => 'Botox', 'text' => 'Temporarily minimise the appearance of dynamic wrinkles caused by facial muscle movement.'),
    array('title' => 'Dermal Fillers', 'text' => 'Regain facial volume with dermal fillers tailored to your facial structure.'),
    array('title' => 'Thread Lift', 'text' => 'Face and neck tightening is possible with a thread lift.'),
    array('title' => 'Exosome therapy', 'text' => 'An emerging therapy being explored for rejuvenation of your skin.'),
);

$skin_lasers = array(
    'Hair reduction with laser therapy',
    'Tattoo removal',
    'Elimination of a birthmark',
    'Face toning',
    'Carbon laser facial therapy for glow',
    'Hollywood facial for celebrity-like glow',
    'PRP-based vampire facial for rejuvenation',
    'Acne scar treatments',
);

$skin_advanced = array(
    array(
        'title' => 'Microneedling Radiofrequency (MNRF)',
        'text' => 'MNRF combines microneedling with radiofrequency. It stimulates collagen and promotes natural healing by creating microchannels in the dermis.',
    ),
    array(
        'title' => 'Mole Removal',
        'text' => 'Our dermatology experts assess a mole first, then cut or shave it under a doctor’s supervision when removal is appropriate.',
    ),
    array(
        'title' => 'Skin Tags Removal',
        'text' => 'Tags are soft, noncancerous growths that can appear on the neck, groin, armpits, breasts, and eyelids. Surgical procedures may provide relief if they cause discomfort.',
    ),
    array(
        'title' => 'Xanthelasma Removal',
        'text' => 'Xanthelasma is a yellow, painless cholesterol deposit that forms at the corners of the eyelids. It does not go away on its own; removal by a healthcare expert may include liquid nitrogen cryotherapy.',
    ),
    array(
        'title' => 'Keloid Treatment',
        'text' => 'A keloid is an elevated scar that can develop months to years after a skin injury. Dermatological care can reduce its appearance on the skin.',
    ),
);

$skin_why = array(
    'Cosmetic dermatologists working with aesthetic practitioners',
    'Advanced laser technology',
    'Personalised plans as part of the aesthetic procedure',
    'Safe and hygienic protocols',
    'Observable, longer-lasting results',
);

$skin_conditions = array(
    'Acne scars',
    'Acne treatment in Kolkata',
    'Pigmentation treatment in Kolkata',
    'Wrinkles and ageing',
    'Tanning',
    'Tags and moles',
    'Hair-specific hair problems',
    'Laser vaporisation',
);

$skin_faqs = array(
    array(
        'q' => 'Is aesthetic treatment affordable in Kolkata?',
        'a' => 'Price is discussed during a doctor consultation and may vary based on treatment type, concern, and a personalised treatment plan.',
    ),
    array(
        'q' => 'How to find the best dermatologist for acne treatment in Kolkata?',
        'a' => 'Check whether the dermatologist bases treatment on the outcomes of a proper assessment, not a one-size-fits-all protocol.',
    ),
    array(
        'q' => 'Is it safe to go for skin treatment?',
        'a' => 'Yes. Laser treatments are generally safe when given by an accredited doctor who has carried out an appropriate examination.',
    ),
    array(
        'q' => 'What is the typical length of chemical peeling therapy?',
        'a' => 'Outcomes depend on the kind of peel and the concern. Results vary from patient to patient; observable results may generally appear in 2–3 visits.',
    ),
    array(
        'q' => 'How can I know the best treatment available for pigmentation?',
        'a' => 'A dermatologist can recommend the best treatment for pigmentation in Kolkata after a detailed assessment based on your needs.',
    ),
    array(
        'q' => 'Is personalised analysis offered at Dontia Care Clinic?',
        'a' => 'Yes. Our experts first do a full evaluation to identify severity, then design a personalised plan that caters to varied skin needs.',
    ),
    array(
        'q' => 'Is the laser treatment safe to go for?',
        'a' => 'The dermatologist will discuss the anticipated sensitivity of the procedure at the time of consultation.',
    ),
    array(
        'q' => 'How many sessions do treatments involve?',
        'a' => 'Your dermatologist will schedule sessions depending on your skin needs.',
    ),
);
?>
<style>
.skin-page{overflow-x:hidden}
.skin-page .container{max-width:min(1280px,94vw);width:100%;padding-left:max(22px,calc(env(safe-area-inset-left,0px) + 16px));padding-right:max(22px,calc(env(safe-area-inset-right,0px) + 16px));box-sizing:border-box}

.ortho-page .ortho-sec{padding:60px 0}
.ortho-page .ortho-sec h2,.ortho-page .ortho-sec h3,.ortho-page .ortho-sec h4{margin:0 0 16px}
.ortho-page .ortho-sub{font-size:18px;line-height:1.8;color:#4b4b4b}
.ortho-page .ortho-grid-2{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:28px;align-items:center}
.ortho-page .ortho-section-head{text-align:center;margin-bottom:26px}
.ortho-page .ortho-section-head h2{display:inline-block;margin:0 auto 10px}
.ortho-page .ortho-section-head p{margin:0 auto;color:#675f57;max-width:760px}
.ortho-page .ortho-doctor-layout{display:grid;grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr);gap:22px;align-items:stretch;max-width:1080px;margin:0 auto}
.ortho-page .ortho-doctor-card{background:#fff;border-radius:14px;padding:12px;box-shadow:0 10px 24px rgba(0,0,0,.08);border:1px solid #ece6df;text-align:center}
.ortho-page .ortho-doctor-photo{width:100%;height:360px;object-fit:cover;object-position:center;border-radius:10px;display:block;margin:0 0 12px}
.ortho-page .ortho-doctor-note{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:22px 24px;box-shadow:0 10px 24px rgba(0,0,0,.07);display:flex;flex-direction:column;justify-content:center;text-align:left}
.ortho-page .ortho-doctor-note h3{margin:0 0 12px;font-size:28px;line-height:1.2}
.ortho-page .ortho-doctor-note p{margin:0 0 10px;color:#4b4b4b;line-height:1.7}
.ortho-page .ortho-benefit-list,.ortho-page .ortho-service-bullets{list-style:none;padding:0;margin:14px 0 0;display:grid;gap:12px}
.ortho-page .ortho-benefit-list li,.ortho-page .ortho-service-bullets li{position:relative;background:#fff;border:1px solid #ece6df;border-radius:10px;padding:12px 14px 12px 42px;box-shadow:0 6px 14px rgba(0,0,0,.06);margin:0;line-height:1.7}
.ortho-page .ortho-benefit-list li::before,.ortho-page .ortho-service-bullets li::before{content:"";position:absolute;left:16px;top:18px;width:12px;height:12px;border-radius:50%;background:linear-gradient(135deg,#7a5140 0%,#5b2f1d 100%);box-shadow:0 0 0 4px rgba(122,81,64,.15)}
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
@media (max-width:900px){.ortho-page .ortho-grid-2,.ortho-page .ortho-doctor-layout{grid-template-columns:1fr}}

.skin-page .skin-sec-alt{background:#f8fbff}
.skin-page .skin-media{width:100%;border-radius:14px;overflow:hidden;box-shadow:0 14px 32px rgba(49,19,0,.12);border:1px solid #ece6df;background:#f3efe9}
.skin-page .skin-media img{width:100%;height:auto;display:block;aspect-ratio:4/3;object-fit:cover}
.skin-page .skin-callout{margin-top:18px;padding:14px 18px;border-left:4px solid #b78333;background:#fff8ef;border-radius:0 10px 10px 0;color:#3f3731;line-height:1.65;font-weight:600}
.skin-page .skin-pillar-grid{display:grid;grid-template-columns:1fr;gap:12px;margin-top:22px;padding:0;list-style:none;counter-reset:skinpillar}
.skin-page .skin-pillar-grid li{margin:0;background:#fff;border:1px solid #ece6df;border-radius:14px;padding:20px 18px 18px 20px;box-shadow:0 8px 20px rgba(0,0,0,.07);position:relative}
.skin-page .skin-pillar-grid li::before{counter-increment:skinpillar;content:counter(skinpillar);display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,#7a5140,#5b2f1d);color:#fff;font-weight:700;font-size:14px;margin-bottom:10px}
.skin-page .skin-svc-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px;margin-top:8px}
.skin-page .skin-svc-card{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:22px 22px 20px;box-shadow:0 10px 22px rgba(0,0,0,.07);height:100%}
.skin-page .skin-svc-card h3{margin:0 0 10px;font-size:20px;color:#5b2f1d}
.skin-page .skin-svc-card p{margin:0;color:#4b4b4b;line-height:1.7}
.skin-page .skin-check{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px;margin-top:18px;padding:0;list-style:none}
.skin-page .skin-check li{margin:0;background:#fff;border:1px solid #ece6df;border-radius:12px;padding:14px 16px 14px 44px;position:relative;line-height:1.55;box-shadow:0 6px 14px rgba(0,0,0,.05)}
.skin-page .skin-check li::before{content:"✓";position:absolute;left:14px;top:13px;width:22px;height:22px;border-radius:50%;background:linear-gradient(135deg,#c59a4d,#b78333);color:#fff;font-size:12px;font-weight:700;display:flex;align-items:center;justify-content:center}
.skin-page .skin-video-wrap{max-width:920px;margin:0 auto}
.skin-page .skin-video-aspect{position:relative;aspect-ratio:16/9;border-radius:14px;overflow:hidden;background:#1a1614;box-shadow:0 16px 36px rgba(0,0,0,.18)}
.skin-page .skin-yt-facade{position:absolute;inset:0;width:100%;height:100%;border:0;padding:0;cursor:pointer;background:#1a1614}
.skin-page .skin-yt-facade img{width:100%;height:100%;object-fit:cover;display:block}
.skin-page .skin-yt-play{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:64px;height:64px;border-radius:50%;background:rgba(183,131,51,.94);color:#fff;display:flex;align-items:center;justify-content:center;font-size:26px;box-shadow:0 8px 20px rgba(0,0,0,.28)}
.skin-page .skin-video-aspect iframe{position:absolute;inset:0;width:100%;height:100%;border:0}

@media (max-width:1024px){.skin-page .skin-svc-grid,.skin-page .skin-check{grid-template-columns:1fr}}
@media (max-width:768px){
.skin-page .skin-sec-alt{background:linear-gradient(180deg,#f3ece6 0%,#e8e0d8 100%)}
.skin-page .ortho-sub{color:#3a3836!important;line-height:1.75}
.skin-page .ortho-doctor-photo{height:min(70vw,360px)}
}
</style>

<div class="ortho-page implant-page skin-page">
    <section class="dcc-hero" style="background-image:url('<?php echo htmlspecialchars($hero_img, ENT_QUOTES, 'UTF-8'); ?>')">
        <div class="dcc-hero-inner">
            <h1>Best Skin Treatment in Kolkata | Best Dermatologist &amp; Doctors | 25+ Experience</h1>
            <p class="dcc-hero-sub">Personalised, science-driven dermatological care at Dontia Care Clinic – Skin &amp; Hair.</p>
            <div class="dcc-hero-cta">
                <a class="ortho-btn ortho-btn-gold" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal" data-preselect-service="Skin Treatment">Book a consultation</a>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-grid-2">
                <div>
                    <p class="ortho-sub">Considering the best skin treatment in Kolkata? At Dontia Care Clinic – Skin &amp; Hair, we deliver personalised, science-driven dermatological care, incorporating state-of-the-art aesthetic technology, to address your unique concerns, including acne, pigmentation, anti-ageing, or advanced treatment by the best skin doctors in Kolkata.</p>
                    <p class="ortho-sub" style="margin-top:16px;">There are three pillars that we focus on:</p>
                    <ol class="skin-pillar-grid">
                        <?php foreach ($skin_pillars as $pillar) { ?>
                        <li><?php echo htmlspecialchars($pillar, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php } ?>
                    </ol>
                    <p class="skin-callout">Be the first to book a consultation with our Dermatologist in Kolkata today.</p>
                </div>
                <div class="skin-media">
                    <img src="<?php echo htmlspecialchars($section1_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Dermatologist performing skin treatment on a patient at Dontia Care Clinic Skin and Hair in Kolkata" width="640" height="480" decoding="async" fetchpriority="high">
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec skin-sec-alt">
        <div class="container">
            <div class="ortho-grid-2">
                <div class="skin-media">
                    <img src="<?php echo htmlspecialchars($clinic_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Advanced skin analysis and personalised diagnosis at a skin clinic in Kolkata" loading="lazy" decoding="async" width="640" height="480">
                </div>
                <div>
                    <h2>Advanced Skin Analysis (Personalised Diagnosis)</h2>
                    <p class="ortho-sub">What sets us apart as the best skin clinic in Kolkata is that we begin with a thorough evaluation of your outer layer of the body before concluding any dermatology care customised to the patient's needs. With the advanced analysis process, we try to identify:</p>
                    <ul class="skin-check">
                        <?php foreach ($skin_analysis as $item) { ?>
                        <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php } ?>
                    </ul>
                    <p class="ortho-sub" style="margin-top:16px;">This advanced assessment allows us to construct a solution tailored to each patient rather than applying generic methods.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-grid-2">
                <div>
                    <h2>Best Facial Treatments in Kolkata</h2>
                    <p class="ortho-sub">It is easier now to regain balance, glow, and hydration with medically proven facials:</p>
                    <ul class="ortho-service-bullets">
                        <?php foreach ($skin_facials as $item) { ?>
                        <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php } ?>
                    </ul>
                    <p class="ortho-sub" style="margin-top:16px;">Tired of blemished facial spots, acne, tanning, and uneven tone? Chemical peeling provides a dermatological solution to all these. We offer personalised facial treatment only after assessing the conditions.</p>
                </div>
                <div class="skin-media">
                    <img src="<?php echo htmlspecialchars($facial_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Medifacial treatment in Kolkata at Dontia Care Clinic Skin and Hair" loading="lazy" decoding="async" width="640" height="480">
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec skin-sec-alt" id="skin-clinic-video">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Skin Care at Dontia Care Clinic</h2>
                <p>See how our dermatologists approach personalised skin treatment in Kolkata.</p>
            </div>
            <div class="skin-video-wrap">
                <div class="skin-video-aspect" id="skinVideoAspect">
                    <button type="button" class="skin-yt-facade" id="skinYoutubeFacade" data-embed="<?php echo htmlspecialchars($skin_embed, ENT_QUOTES, 'UTF-8'); ?>" aria-label="Play skin treatment video from Dontia Care Clinic">
                        <img src="<?php echo htmlspecialchars($skin_yt_poster, ENT_QUOTES, 'UTF-8'); ?>" alt="Skin treatment video at Dontia Care Clinic in Kolkata" width="480" height="270" loading="lazy" decoding="async">
                        <span class="skin-yt-play" aria-hidden="true">&#9654;</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Chemical Peel Treatment in Kolkata</h2>
                <p>We specialise in deep chemical peel treatments that help restore damaged layers and facial texture.</p>
            </div>
            <p class="ortho-sub">The following are some peeling solutions we specialise in:</p>
            <ul class="skin-check">
                <?php foreach ($skin_peels as $item) { ?>
                <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php } ?>
            </ul>
            <p class="ortho-sub" style="margin-top:22px;">These aesthetic procedures are highly effective for facial conditions:</p>
            <ul class="skin-check">
                <?php foreach ($skin_peel_helps as $item) { ?>
                <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php } ?>
            </ul>
            <p class="ortho-sub" style="margin-top:18px;">If you are considering chemical peeling in Kolkata, we offer rejuvenation treatment tailored to your conditions.</p>
        </div>
    </section>

    <section class="ortho-sec skin-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Anti-Ageing Treatment in Kolkata</h2>
                <p>Visible signs of ageing can be addressed with progressive dermatology techniques, personalised to your conditions and recovery goals.</p>
            </div>
            <div class="skin-svc-grid">
                <?php foreach ($skin_ageing as $svc) { ?>
                <article class="skin-svc-card">
                    <h3><?php echo htmlspecialchars($svc['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p><?php echo htmlspecialchars($svc['text'], ENT_QUOTES, 'UTF-8'); ?></p>
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="ortho-sec" id="laser-skin-treatment">
        <div class="container">
            <div class="ortho-grid-2">
                <div class="skin-media">
                    <img src="<?php echo htmlspecialchars($laser_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Skin doctor treating a patient with laser therapy in Kolkata" loading="lazy" decoding="async" width="640" height="480">
                </div>
                <div>
                    <h2>Advanced Laser Skin Treatment in Kolkata</h2>
                    <p class="ortho-sub">A sustained, healthier face texture can be achieved through advanced laser treatment that stimulates collagen, reducing fine lines.</p>
                    <p class="ortho-sub" style="margin-top:14px;">At Dontia Care Clinic – Skin &amp; Hair, we offer various treatment options in Kolkata:</p>
                    <ul class="ortho-service-bullets">
                        <?php foreach ($skin_lasers as $item) { ?>
                        <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php } ?>
                    </ul>
                    <p class="ortho-sub" style="margin-top:16px;">These advanced aesthetic procedures are safe and produce noticeable results when performed under the supervision of our dermatologists. Our dermatologists can plan a relevant laser treatment for concerns such as pigmentation and unwanted hair after a detailed assessment.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec skin-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Skin Glow Treatments in Kolkata</h2>
                <p>Pollution, changing lifestyles, environmental stress, and screen time can leave skin tired and dull. These rejuvenation treatments in Kolkata work well for dull, tired skin — including when you are preparing for an event.</p>
            </div>
            <div class="skin-svc-grid">
                <article class="skin-svc-card">
                    <h3>IV Drip Therapy</h3>
                    <p>IV fluids can help promote hydration and general health. Appropriateness depends on an individual's health and should be discussed with a trained health care provider. As part of a bespoke wellness strategy, IV Glow Drip provides key nutrients straight into the bloodstream.</p>
                </article>
                <article class="skin-svc-card">
                    <h3>Skin Booster Therapy</h3>
                    <p>Booster therapy involves injecting a soft, gel-type substance through the skin. This promotes collagen production that may make skin appear more hydrated and softer, reducing visible marks of wrinkles on the face. The same therapy can work for other parts of the body, including hands.</p>
                </article>
            </div>
            <p class="ortho-sub" style="margin-top:18px;">We offer glow treatments following a thorough assessment of your epidermis to identify specific rejuvenation needs — including for people seeking rejuvenation just before special occasions.</p>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Other Advanced Dermatology Treatments</h2>
                <p>At Dontia Clinic for Skin &amp; Hair, we also provide advanced and clinically proven dermatological care.</p>
            </div>
            <div class="skin-svc-grid">
                <?php foreach ($skin_advanced as $svc) { ?>
                <article class="skin-svc-card">
                    <h3><?php echo htmlspecialchars($svc['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p><?php echo htmlspecialchars($svc['text'], ENT_QUOTES, 'UTF-8'); ?></p>
                </article>
                <?php } ?>
            </div>
            <p class="ortho-sub" style="margin-top:18px;">The above-stated treatments are safe ways to manage conditions under the supervision of an expert medical team.</p>
        </div>
    </section>

    <section class="ortho-sec skin-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Why Choose Dontia Care Clinic for Skin Treatment in Kolkata</h2>
                <p>Patients in Kolkata trust us as a reputed skin clinic for aesthetic care supported by cutting-edge technology and well-administered processes.</p>
            </div>
            <div class="ortho-doctor-layout">
                <div>
                    <article class="ortho-doctor-card">
                        <img class="ortho-doctor-photo" src="<?php echo htmlspecialchars($why_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Dontia Care Clinic skin and hair treatment room in Kolkata" width="480" height="360" loading="lazy" decoding="async">
                    </article>
                </div>
                <aside class="ortho-doctor-note">
                    <h3>A trusted skin clinic in Kolkata</h3>
                    <p>If you are searching for a skin specialist in Kolkata, our team of dermatologists can suggest a treatment tailored to your specific type and concerns.</p>
                    <ul class="ortho-benefit-list">
                        <?php foreach ($skin_why as $point) { ?>
                        <li><?php echo htmlspecialchars($point, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php } ?>
                    </ul>
                    <div style="margin-top:16px;">
                        <a class="ortho-btn" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal" data-preselect-service="Skin Treatment">Book a consultation</a>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <h2>Skin Conditions We Treat</h2>
            <p class="ortho-sub">The list of our dermatology treatments also includes pigmentation treatment and acne treatment, among others.</p>
            <ul class="skin-check">
                <?php foreach ($skin_conditions as $item) { ?>
                <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php } ?>
            </ul>
        </div>
    </section>

    <section class="ortho-sec skin-sec-alt">
        <div class="container">
            <div class="ortho-cta-wrap">
                <div class="ortho-cta-card">
                    <h2>Get an Appointment for Skin Consultation in Kolkata</h2>
                    <p>If you are seeking the best dermatology treatment in Kolkata, especially near Bhowanipore, Park Street, and South Kolkata, Dontia Clinic for Skin &amp; Hair at Elgin Road and Chinar Park stands as your go-to choice.</p>
                    <p>Book your consultation with our dermatologists at Dontia Care Clinic for a customised evaluation and treatment adapted to your issues.</p>
                    <a class="ortho-btn" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal" data-preselect-service="Skin Treatment">Book consultation</a>
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
            <?php foreach ($skin_faqs as $faq) { ?>
            <details>
                <summary><?php echo htmlspecialchars($faq['q'], ENT_QUOTES, 'UTF-8'); ?></summary>
                <p><?php echo htmlspecialchars($faq['a'], ENT_QUOTES, 'UTF-8'); ?></p>
            </details>
            <?php } ?>
        </div>
    </section>

    <section class="ortho-sec skin-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h4>Google Reviews</h4>
                <p>See what our patients say about Dontia Care Clinic.</p>
            </div>
            <div style="text-align:center;">
                <a class="ortho-btn ortho-btn-gold" href="https://maps.app.goo.gl/Ujpqv8hHVHVkWBeL9" target="_blank" rel="noopener noreferrer">View reviews on Google</a>
            </div>
        </div>
    </section>

    <?php $this->load->view('Dental/partials/service_blog_cards'); ?>
</div>

<script>
(function () {
    var btn = document.getElementById('skinYoutubeFacade');
    var aspect = document.getElementById('skinVideoAspect');
    if (!btn || !aspect) { return; }
    btn.addEventListener('click', function () {
        var embed = btn.getAttribute('data-embed');
        if (!embed) { return; }
        var iframe = document.createElement('iframe');
        iframe.src = embed;
        iframe.setAttribute('title', 'Skin treatment at Dontia Care Clinic, Kolkata');
        iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
        iframe.setAttribute('allowfullscreen', '');
        iframe.setAttribute('loading', 'eager');
        aspect.replaceChild(iframe, btn);
    });
})();
</script>

<?php $this->load->view('include/footer/footer'); ?>
