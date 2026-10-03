<?php
$this->load->view('include/header/header');
$blogs = isset($blog_carousel) && is_array($blog_carousel) ? $blog_carousel : array();

$hair_img_dir = 'assets/images/hair/';
$hair_img = function ($filename) use ($hair_img_dir) {
    return base_url($hair_img_dir . rawurlencode($filename));
};

$chair_img = $hair_img('section-2-hair-skin-treatment-chair-dontia-care-clinic-skin-and-hair-kolkata-200kb.jpg');
$prp_img = $hair_img('Hair-regrowth-with-PRP-treatment-in-kolkata-at-dontia-care-clinic-skin-and-hai-200kb.jpeg');
$hero_img = $chair_img;
$dr_dishari_img = $hair_img('Dr-Dishari-skin-hair-doctor-specialist-dermatologist-kolkata-at-dontia-care-clinic-skin-and-hair.jpeg');
$dr_harsha_img = $hair_img('Dr-Harsha-skin-hair-doctor-specialist-dermatologist-kolkata-at-dontia-care-clinic-skin-and-hair.jpeg');
$dr_dishari_cert = $hair_img('dr-dishari-dermatologist-certificate.jpg');
$dr_harsha_cert = $hair_img('dr-harsha-sawargi-dermatologist-certificate.jpeg');

$skin_url = base_url('best-skin-doctor-clinic-in-kolkata');
$dental_url = base_url('best-dental-clinic-in-kolkata');

$hair_video = array(
    'title' => 'Hair Treatment at Dontia Care Clinic',
    'video_id' => 'Lc0wGCSwd00',
);

$hair_concerns = array(
    'Hair fall and thinning',
    'Scalp problems',
    'Progressive baldness',
);

$hair_trust = array(
    'Expert trichology care',
    'Expert-level scalp consultation',
    'Regenerative therapies',
    'Personalised treatment plans',
    'Non-surgical, safe treatment options',
    'Advanced scalp diagnosis',
    'Medical treatment in addition to regenerative therapies',
    'Long-term regrowth strategy',
    'Safe and non-surgical procedure',
);

$hair_doctors = array(
    array(
        'name' => 'Dr Dishari',
        'role' => 'Dermatologist & Hair Specialist',
        'photo' => $dr_dishari_img,
        'cert' => $dr_dishari_cert,
        'alt' => 'Dr Dishari, skin and hair doctor specialist dermatologist in Kolkata at Dontia Care Clinic',
        'cert_alt' => 'Dr Dishari dermatologist certificate',
    ),
    array(
        'name' => 'Dr Harsha',
        'role' => 'Dermatologist & Hair Specialist',
        'photo' => $dr_harsha_img,
        'cert' => $dr_harsha_cert,
        'alt' => 'Dr Harsha, skin and hair doctor specialist dermatologist in Kolkata at Dontia Care Clinic',
        'cert_alt' => 'Dr Harsha Sawargi dermatologist certificate',
    ),
);

$hair_treatments = array(
    array(
        'title' => 'Anti-Fall Treatment',
        'lead' => 'If you are searching for the best doctor for hair fall treatment in Elgin Road, Bhowanipore, you are in the right place. We offer treatment for different issues, such as chronic hair loss, based on findings from head analysis and using targeted therapy.',
        'points' => array(
            'Stop excessive shedding',
            'Makes roots stronger',
            'Increases scalp circulation',
        ),
    ),
    array(
        'title' => 'Anti-Dandruff Treatment',
        'lead' => 'What we provide is an advanced scalp treatment for those experiencing breakage, dandruff and itching problems.',
        'points' => array(
            'Controls fungal scalp infections',
            'Reduces the feeling of irritation and flaking',
            'Reinforces scalp balance',
        ),
    ),
    array(
        'title' => 'PRP (Platelet-Rich Plasma) Therapy',
        'lead' => 'There are people curious about finding the right solutions for their problems. PRP therapy may provide relief that:',
        'points' => array(
            'Uses the blood growth factors of the patient',
            'Stimulates follicles that have become inactive',
            'May support growth that leads to better density',
        ),
    ),
    array(
        'title' => 'GFC (Growth Factor Concentrate) Therapy',
        'lead' => 'GFC therapy may be an ideal option for:',
        'points' => array(
            'Quicker regrowth response',
            'Greater concentration of growth factors',
            'Stronger follicle restoration',
        ),
    ),
    array(
        'title' => 'Exosome Therapy as a Growth Treatment',
        'lead' => 'Exosome therapy is a next-generation treatment for regrowth that:',
        'points' => array(
            'May support follicle health',
            'May improve new growth',
            'May recover scalp health at a cellular level',
        ),
    ),
);

$hair_complete_care = array(
    'Inclusive care for the scalp',
    'Treatment for fall and thinning',
    'Science-based regenerative therapies',
    'Treatment plans adapted to patient medical history',
    'Advanced medical fall treatment',
);

$hair_conditions = array(
    'Chronic hair fall',
    'Male pattern loss',
    'Female pattern loss',
    'Spot baldness',
    'Pityriasis capitis (dandruff)',
    'Scalp inflammation',
    'Post-pregnancy loss',
    'Loss due to stress',
    'Diffuse thinning',
    'Weak roots',
);

$hair_who = array(
    'Patients experiencing chronic hair fall and progressive thinning',
    'Those who are noticing scalp infections or dandruff',
    'Those worried about their weak roots or baldness',
    'Women experiencing loss after pregnancy',
);

$hair_approach = array(
    'The first thing we do is a detailed scalp diagnosis and analysis of your condition.',
    'Then, we identify its root causes, which could be nutritional, genetic, hormonal, and lifestyle factors.',
    'Afterwards, we plan out a personalised treatment plan, such as customised therapy using medications, GFC, or PRP.',
    'Finally, we focus on long-term reinforcement along with a prevention strategy.',
);

$hair_why_trust = array(
    'Advanced regenerative therapies',
    'Expert dermatology and trichology solutions',
    'Scientific treatments',
    'Personalised care plans',
    'Safe and hygienic clinic environment',
);

$hair_recommend = array(
    'Hair loss treatment',
    'Personalised treatment for fall',
    'Advanced care for loss management',
);

$hair_faqs = array(
    array(
        'q' => 'What factors should I focus on for choosing the best doctor in Kolkata?',
        'a' => 'Choose one who prioritises identification of the root cause of loss and is an expert at offering medical, along with regenerative, treatment plans for solutions.',
    ),
    array(
        'q' => 'Do you treat severe hair fall?',
        'a' => 'Indeed, we are known for treating thinning, chronic fall, and baldness using GFC treatment, exosome treatment, and PRP treatment.',
    ),
    array(
        'q' => 'Is PRP effective for growth?',
        'a' => 'Yes, PRP is a natural way of healing declining density and stimulate dormant follicles.',
    ),
    array(
        'q' => 'Do you treat dandruff and scalp infections?',
        'a' => 'You would be glad to know that we also have expertise in advanced treatments for anti-dandruff and scalp correction.',
    ),
);
?>
<style>
.hair-page{overflow-x:hidden}
.hair-page .container{max-width:min(1280px,94vw);width:100%;padding-left:max(22px,calc(env(safe-area-inset-left,0px) + 16px));padding-right:max(22px,calc(env(safe-area-inset-right,0px) + 16px));box-sizing:border-box}
.hair-page .dcc-hero{min-height:min(72vh,620px);background-position:center 42%;background-size:cover}
.hair-page .dcc-hero::before{background:linear-gradient(180deg,rgba(18,12,8,.35) 0%,rgba(18,12,8,.28) 42%,rgba(18,12,8,.78) 100%)}
.hair-page .dcc-hero-inner{width:min(720px,calc(100% - 32px));margin-bottom:36px}
.hair-page .dcc-hero h1{font-size:clamp(22px,2.8vw,34px)!important;max-width:22ch;margin-left:auto;margin-right:auto}
.hair-page .dcc-hero-sub{max-width:38ch}
@media (max-width:900px){
.hair-page .dcc-hero{min-height:min(62vh,480px);background-position:center 38%}
.hair-page .dcc-hero-inner{margin-bottom:24px}
}

.ortho-page .ortho-sec{padding:60px 0}
.ortho-page .ortho-sec h2,.ortho-page .ortho-sec h3,.ortho-page .ortho-sec h4{margin:0 0 16px}
.ortho-page .ortho-sub{font-size:18px;line-height:1.8;color:#4b4b4b}
.ortho-page .ortho-grid-2{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:28px;align-items:center}
.ortho-page .ortho-section-head{text-align:center;margin-bottom:26px}
.ortho-page .ortho-section-head h2{display:inline-block;margin:0 auto 10px}
.ortho-page .ortho-section-head p{margin:0 auto;color:#675f57;max-width:760px}
.ortho-page .ortho-doctor-layout{display:grid;grid-template-columns:minmax(0,.95fr) minmax(0,1.05fr);gap:22px;align-items:stretch;max-width:1080px;margin:0 auto}
.ortho-page .ortho-doctor-card{background:#fff;border-radius:14px;padding:12px;box-shadow:0 10px 24px rgba(0,0,0,.08);border:1px solid #ece6df;text-align:center}
.ortho-page .ortho-doctor-photo{width:100%;height:360px;object-fit:cover;object-position:center top;border-radius:10px;display:block;margin:0 0 12px}
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

.hair-page .hair-sec-alt{background:#f8fbff}
.hair-page .hair-media{width:100%;border-radius:14px;overflow:hidden;box-shadow:0 14px 32px rgba(49,19,0,.12);border:1px solid #ece6df;background:#f3efe9}
.hair-page .hair-media img{width:100%;height:auto;display:block;aspect-ratio:4/3;object-fit:cover}
.hair-page .hair-callout{margin-top:18px;padding:14px 18px;border-left:4px solid #b78333;background:#fff8ef;border-radius:0 10px 10px 0;color:#3f3731;line-height:1.65;font-weight:600}
.hair-page .hair-pillar-grid{display:grid;grid-template-columns:1fr;gap:12px;margin-top:22px;padding:0;list-style:none;counter-reset:hairpillar}
.hair-page .hair-pillar-grid li{margin:0;background:#fff;border:1px solid #ece6df;border-radius:14px;padding:20px 18px 18px 20px;box-shadow:0 8px 20px rgba(0,0,0,.07);position:relative}
.hair-page .hair-pillar-grid li::before{counter-increment:hairpillar;content:counter(hairpillar);display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,#7a5140,#5b2f1d);color:#fff;font-weight:700;font-size:14px;margin-bottom:10px}
.hair-page .hair-svc-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px;margin-top:8px}
.hair-page .hair-svc-card{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:22px 22px 20px;box-shadow:0 10px 22px rgba(0,0,0,.07);height:100%}
.hair-page .hair-svc-card h3{margin:0 0 10px;font-size:20px;color:#5b2f1d}
.hair-page .hair-svc-card p{margin:0 0 12px;color:#4b4b4b;line-height:1.7}
.hair-page .hair-svc-card p:last-child{margin-bottom:0}
.hair-page .hair-check{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px;margin-top:18px;padding:0;list-style:none}
.hair-page .hair-check li{margin:0;background:#fff;border:1px solid #ece6df;border-radius:12px;padding:14px 16px 14px 44px;position:relative;line-height:1.55;box-shadow:0 6px 14px rgba(0,0,0,.05)}
.hair-page .hair-check li::before{content:"✓";position:absolute;left:14px;top:13px;width:22px;height:22px;border-radius:50%;background:linear-gradient(135deg,#c59a4d,#b78333);color:#fff;font-size:12px;font-weight:700;display:flex;align-items:center;justify-content:center}
.hair-page .hair-svc-card .hair-mini{list-style:none;padding:0;margin:12px 0 0;display:grid;gap:8px}
.hair-page .hair-svc-card .hair-mini li{margin:0;padding:0 0 0 18px;position:relative;color:#4b4b4b;line-height:1.55}
.hair-page .hair-svc-card .hair-mini li::before{content:"";position:absolute;left:0;top:9px;width:8px;height:8px;border-radius:50%;background:linear-gradient(135deg,#7a5140,#5b2f1d)}
.hair-page .hair-doc-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:22px;max-width:920px;margin:0 auto}
.hair-page .hair-doc-card{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:16px;box-shadow:0 10px 24px rgba(0,0,0,.08);text-align:center}
.hair-page .hair-doc-card img.hair-doc-photo{width:100%;height:480px;object-fit:cover;object-position:center top;border-radius:10px;display:block;margin:0 0 14px}
.hair-page .hair-doc-card h3{margin:0 0 6px;font-size:22px;color:#5b2f1d}
.hair-page .hair-doc-card .hair-doc-role{margin:0 0 14px;color:#675f57;font-size:15px}
.hair-page .hair-doc-card img.hair-doc-cert{width:100%;max-height:280px;object-fit:contain;background:#f7f3ee;border-radius:8px;border:1px solid #ece6df;padding:8px}
.hair-page .hair-video-wrap{max-width:920px;margin:0 auto}
.hair-page .hair-video-aspect{position:relative;aspect-ratio:16/9;border-radius:14px;overflow:hidden;background:#1a1614;box-shadow:0 16px 36px rgba(0,0,0,.18)}
.hair-page .hair-yt-facade{position:absolute;inset:0;width:100%;height:100%;border:0;padding:0;cursor:pointer;background:#1a1614}
.hair-page .hair-yt-facade img{width:100%;height:100%;object-fit:cover;display:block}
.hair-page .hair-yt-play{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:64px;height:64px;border-radius:50%;background:rgba(183,131,51,.94);color:#fff;display:flex;align-items:center;justify-content:center;font-size:26px;box-shadow:0 8px 20px rgba(0,0,0,.28)}
.hair-page .hair-video-aspect iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
.hair-page .hair-inline-link{color:#5b2f1d;font-weight:700;text-decoration:underline}
.hair-page .hair-inline-link:hover,.hair-page .hair-inline-link:focus{color:#b78333}
.hair-page .ortho-doctor-layout > div{height:100%;min-height:100%}
.hair-page .ortho-doctor-card{height:100%;display:flex;flex-direction:column;padding:10px;box-sizing:border-box}
.hair-page .ortho-doctor-photo{flex:1 1 auto;width:100%;height:100%;min-height:560px;margin:0;object-fit:cover;object-position:center top;border-radius:10px}

@media (max-width:1024px){.hair-page .hair-svc-grid,.hair-page .hair-check{grid-template-columns:1fr}}
@media (max-width:768px){
.hair-page .hair-sec-alt{background:linear-gradient(180deg,#f3ece6 0%,#e8e0d8 100%)}
.hair-page .ortho-sub{color:#3a3836!important;line-height:1.75}
.hair-page .ortho-doctor-photo{min-height:min(78vw,420px);height:min(78vw,420px)}
.hair-page .hair-doc-card img.hair-doc-photo{height:min(85vw,420px)}
.hair-page .hair-doc-grid{grid-template-columns:1fr}
}
</style>

<div class="ortho-page implant-page hair-page">
    <section class="dcc-hero" style="background-image:url('<?php echo htmlspecialchars($hero_img, ENT_QUOTES, 'UTF-8'); ?>')">
        <div class="dcc-hero-inner">
            <h1>Best Hair Doctor &amp; Clinic in Kolkata, India | Hair Loss Treatment</h1>
            <p class="dcc-hero-sub">Advanced medical and restorative hair care at Dontia Care Clinic – Skin &amp; Hair.</p>
            <div class="dcc-hero-cta">
                <a class="ortho-btn ortho-btn-gold" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal" data-preselect-service="Hair Treatment">Book a consultation</a>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-grid-2">
                <div>
                    <p class="ortho-sub">People with hair fall and a receding hairline might not style it as they wish, affecting their unique identity. Certainly, one can’t afford to leave this untreated, knowing it may lead to total baldness over time. Rather, it is a wiser move to consult an expert in this field for a thorough scalp examination and identification of issues that may vary from patient to patient.</p>
                    <p class="hair-callout">Book a thorough scalp examination with our hair specialists in Kolkata.</p>
                </div>
                <div class="hair-media">
                    <img src="<?php echo htmlspecialchars($prp_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Hair regrowth before and after PRP treatment at Dontia Care Clinic Skin and Hair in Kolkata" width="640" height="480" decoding="async" fetchpriority="high">
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec hair-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Best Hair Treatment in Kolkata, India | Dontia Care Clinic - Skin and Hair</h2>
                <p>If you are among those searching for a trusted clinic for scalp solutions, you are already spending your valuable time in the right place.</p>
            </div>
            <p class="ortho-sub">Dontia Care Clinic – Skin &amp; Hair is the place to go for advanced medical and restorative treatments. It is the one-stop solution for all your hair needs, including hair fall due to nutritional factors, hormonal factors and genetic hair loss, degrading scalp health, and declining hair growth.</p>
            <p class="ortho-sub" style="margin-top:16px;">Patients prefer this clinic over our competitors for various concerns, including:</p>
            <ul class="hair-check">
                <?php foreach ($hair_concerns as $item) { ?>
                <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php } ?>
            </ul>
            <p class="ortho-sub" style="margin-top:16px;">They recognise us for personalised treatment that addresses the essential causes listed above.</p>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Why Choose Dontia Care Clinic for Hair Treatment</h2>
                <p>Hair loss isn’t only a minor cosmetic issue, but a critical medical problem. Finding its root causes is important to treat this medical issue. Our doctors focus on finding the root causes prior to proceeding with the treatment.</p>
            </div>
            <div class="ortho-doctor-layout">
                <div>
                    <article class="ortho-doctor-card">
                        <img class="ortho-doctor-photo" src="<?php echo htmlspecialchars($dr_dishari_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Dr Dishari, dermatologist and hair specialist at Dontia Care Clinic in Kolkata" width="480" height="360" loading="lazy" decoding="async">
                    </article>
                </div>
                <aside class="ortho-doctor-note">
                    <h3>Patients trust us for</h3>
                    <ul class="ortho-benefit-list">
                        <?php foreach ($hair_trust as $point) { ?>
                        <li><?php echo htmlspecialchars($point, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php } ?>
                    </ul>
                    <div style="margin-top:16px;">
                        <a class="ortho-btn" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal" data-preselect-service="Hair Treatment">Book a consultation</a>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="ortho-sec hair-sec-alt" id="our-skin-doctors">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Our Skin Doctors</h2>
                <p>Dr Dishari &amp; Dr Harsha — our dermatologists leading hair and scalp care at Dontia Care Clinic.</p>
            </div>
            <div class="hair-doc-grid">
                <?php foreach ($hair_doctors as $doc) { ?>
                <article class="hair-doc-card">
                    <img class="hair-doc-photo" src="<?php echo htmlspecialchars($doc['photo'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($doc['alt'], ENT_QUOTES, 'UTF-8'); ?>" width="400" height="480" loading="lazy" decoding="async">
                    <h3><?php echo htmlspecialchars($doc['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p class="hair-doc-role"><?php echo htmlspecialchars($doc['role'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <img class="hair-doc-cert" src="<?php echo htmlspecialchars($doc['cert'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($doc['cert_alt'], ENT_QUOTES, 'UTF-8'); ?>" width="400" height="280" loading="lazy" decoding="async">
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="ortho-sec" id="hair-clinic-video">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Hair Care at Dontia Care Clinic</h2>
                <p>See how our team approaches hair loss treatment in Kolkata.</p>
            </div>
            <div class="hair-video-wrap">
                <?php
                    $poster = 'https://i.ytimg.com/vi/' . rawurlencode($hair_video['video_id']) . '/hqdefault.jpg';
                    $embed = 'https://www.youtube-nocookie.com/embed/' . rawurlencode($hair_video['video_id']) . '?rel=0&autoplay=1&playsinline=1';
                ?>
                <div class="hair-video-aspect">
                    <button type="button" class="hair-yt-facade" data-embed="<?php echo htmlspecialchars($embed, ENT_QUOTES, 'UTF-8'); ?>" aria-label="Play <?php echo htmlspecialchars($hair_video['title'], ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="<?php echo htmlspecialchars($poster, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($hair_video['title'], ENT_QUOTES, 'UTF-8'); ?>" width="920" height="518" loading="lazy" decoding="async">
                        <span class="hair-yt-play" aria-hidden="true">&#9654;</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec hair-sec-alt" id="hair-treatments">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Hair Loss Treatments We Offer</h2>
                <p>From anti-fall care to regenerative PRP, GFC and exosome therapy — planned after medical diagnosis.</p>
            </div>
            <div class="hair-svc-grid">
                <?php foreach ($hair_treatments as $svc) { ?>
                <article class="hair-svc-card">
                    <h3><?php echo htmlspecialchars($svc['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p><?php echo htmlspecialchars($svc['lead'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <ul class="hair-mini">
                        <?php foreach ($svc['points'] as $point) { ?>
                        <li><?php echo htmlspecialchars($point, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php } ?>
                    </ul>
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Get Complete Care</h2>
                <p>At our Hair Clinic, medical experts — our <a class="hair-inline-link" href="<?php echo htmlspecialchars($skin_url, ENT_QUOTES, 'UTF-8'); ?>">dermatologists in Kolkata</a> Dr Dishari &amp; Dr Harsha — offer complete restoration solutions for the scalp.</p>
            </div>
            <ul class="hair-check">
                <?php foreach ($hair_complete_care as $item) { ?>
                <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php } ?>
            </ul>
        </div>
    </section>

    <section class="ortho-sec hair-sec-alt">
        <div class="container">
            <h2>Conditions We Treat</h2>
            <p class="ortho-sub">People trust us as a clinic that specialises in treating different hair conditions as follows:</p>
            <ul class="hair-check">
                <?php foreach ($hair_conditions as $item) { ?>
                <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php } ?>
            </ul>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Why Should You Visit Us</h2>
                <p>We are your ideal treatment centre if you are searching for care for:</p>
            </div>
            <ul class="ortho-service-bullets">
                <?php foreach ($hair_who as $item) { ?>
                <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php } ?>
            </ul>
        </div>
    </section>

    <section class="ortho-sec hair-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Hair Treatment Approach We Follow</h2>
                <p>Patients trust us for many reasons. One is our strict adherence to a structured medical procedure as follows:</p>
            </div>
            <ol class="hair-pillar-grid">
                <?php foreach ($hair_approach as $step) { ?>
                <li><?php echo htmlspecialchars($step, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php } ?>
            </ol>
            <p class="ortho-sub" style="margin-top:22px;">The other reasons include:</p>
            <ul class="hair-check">
                <?php foreach ($hair_why_trust as $item) { ?>
                <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php } ?>
            </ul>
            <p class="ortho-sub" style="margin-top:22px;">They keep recommending us for:</p>
            <ul class="hair-check">
                <?php foreach ($hair_recommend as $item) { ?>
                <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php } ?>
            </ul>
        </div>
    </section>

    <section class="ortho-sec ortho-faq">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Frequently Asked Questions (FAQ)</h2>
            </div>
            <?php foreach ($hair_faqs as $faq) { ?>
            <details>
                <summary><?php echo htmlspecialchars($faq['q'], ENT_QUOTES, 'UTF-8'); ?></summary>
                <p><?php echo htmlspecialchars($faq['a'], ENT_QUOTES, 'UTF-8'); ?></p>
            </details>
            <?php } ?>
        </div>
    </section>

    <section class="ortho-sec hair-sec-alt">
        <div class="container">
            <div class="ortho-cta-wrap">
                <div class="ortho-cta-card">
                    <h2>Book an Appointment for Your Treatment</h2>
                    <p>We are your ideal health point if you are looking for a one-stop solution for all your problems in South Kolkata. We use only advanced and scientifically proven solutions to restore and restore your confidence.</p>
                    <p>We also offer <a class="hair-inline-link" href="<?php echo htmlspecialchars($dental_url, ENT_QUOTES, 'UTF-8'); ?>">dental treatment in Kolkata</a>.</p>
                    <a class="ortho-btn" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal" data-preselect-service="Hair Treatment">Book consultation</a>
                    <p style="margin-top:14px;margin-bottom:0;"><a href="<?php echo base_url('contact-us'); ?>" class="ortho-note">Contact page</a> — directions and clinic details.</p>
                </div>
            </div>
            <?php $this->load->view('Dental/partials/clinic_location_cards'); ?>
        </div>
    </section>

    <section class="ortho-sec">
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
    document.querySelectorAll('.hair-yt-facade').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var embed = btn.getAttribute('data-embed');
            var aspect = btn.parentNode;
            if (!embed || !aspect) { return; }
            var iframe = document.createElement('iframe');
            iframe.src = embed;
            iframe.setAttribute('title', 'Hair treatment at Dontia Care Clinic, Kolkata');
            iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
            iframe.setAttribute('allowfullscreen', '');
            iframe.setAttribute('loading', 'eager');
            aspect.replaceChild(iframe, btn);
        });
    });
})();
</script>

<?php $this->load->view('include/footer/footer'); ?>
