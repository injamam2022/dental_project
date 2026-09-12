<?php
$this->load->view('include/header/header');
$blogs = isset($blog_carousel) && is_array($blog_carousel) ? $blog_carousel : array();

$hf_img_dir = 'assets/images/hydra-facial/';
$hf_img = function ($filename) use ($hf_img_dir) {
    return base_url($hf_img_dir . rawurlencode($filename));
};

$hero_img = $hf_img('section-2-hair-skin-treatment-chair-dontia-care-clinic-skin-and-hair-kolkata-200kb.jpg');
$ba_img = $hf_img('hydrafacial-treatment-in-kolkata-at-dontia-care-clinic-skin-and-hair.jpeg');
$eye_img = $hf_img('Hydrafacial-eye-treament-kolkata.jpg');
$dr_dishari_img = $hf_img('Dr-Dishari-skin-hair-doctor-specialist-dermatologist-kolkata-at-dontia-care-clinic-skin-and-hair (1).jpeg');
$dr_harsha_img = $hf_img('Dr-Harsha-skin-hair-doctor-specialist-dermatologist-kolkata-at-dontia-care-clinic-skin-and-hair (1).jpeg');
$dr_dishari_cert = $hf_img('dr-dishari-dermatologist-certificate (1).jpg');
$dr_harsha_cert = $hf_img('dr-harsha-sawargi-dermatologist-certificate (1).jpeg');

$review_imgs = array(
    array(
        'src' => $hf_img('hydrafacial-patient-google-review-kolkata-dontia-care-clinic-skin-and-hair.png'),
        'alt' => 'Google review for HydraFacial and Medi Facial treatment at Dontia Care Clinic Skin and Hair in Kolkata',
    ),
    array(
        'src' => $hf_img('medifacial-patient-testimonial-in-kolkata-dontia-care-clinic-skin-and-hair.png'),
        'alt' => 'Patient Google review for Medi Facial at Dontia Care Clinic Skin and Hair in Kolkata',
    ),
    array(
        'src' => $hf_img('medifacial-patient-testimonial-kolkata-dontia-care-clinic-skin-and-hair.png'),
        'alt' => 'Medi Facial patient testimonial in Kolkata at Dontia Care Clinic Skin and Hair',
    ),
);

$skin_url = base_url('best-skin-doctor-clinic-in-kolkata');
$hair_url = base_url('best-hair-doctor-dermatologist-clinic-kolkata');

$hf_videos = array(
    array('title' => 'HydraFacial Treatment at Dontia Care Clinic', 'video_id' => 'NVVyApiNmnM'),
    array('title' => 'HydraFacial Care at Dontia Care Clinic, Kolkata', 'video_id' => 'XZtOYOrR7X4'),
);

$hf_advantages = array(
    'Deep cleansing of clogged pores',
    'Removal of dead cells',
    'Improved hydration',
    'Enhanced brightness and glow',
    'Smoother texture',
    'Reduced appearance of fine lines',
    'Better absorption of cosmetic products',
    'Refreshed and youthful-looking skin',
);

$hf_procedure = array(
    array(
        'title' => 'Cleansing and Exfoliation',
        'text' => 'Before a more advanced therapy, the first step extracts contaminants, excess oil and dead cells.',
    ),
    array(
        'title' => 'Gentle Chemical Exfoliation',
        'text' => 'Specially chosen solutions improve smoothness by bringing debris and dirt out of the pores.',
    ),
    array(
        'title' => 'Pore Extraction',
        'text' => 'A pain-free extraction method eliminates blackheads, dirt and excess oil from blocked pores.',
    ),
    array(
        'title' => 'Skin Hydration and Serum Infusion',
        'text' => 'Serum and hydration components are infused so moisture returns and skin looks healthier and more reinvigorated.',
    ),
    array(
        'title' => 'Skin Protection',
        'text' => 'An ultimate dermatological layer protects and maintains the rejuvenated appearance of your skin.',
    ),
);

$hf_compare = array(
    array(
        'name' => 'HydraFacial',
        'best' => 'Hydration, dullness, pores and uneven texture',
        'adv' => 'Deep cleansing, hydration and instant glow',
    ),
    array(
        'name' => 'Derma Facial',
        'best' => 'Renewal and exfoliation',
        'adv' => 'Improves texture and removes dead cells',
    ),
    array(
        'name' => 'Medi Facial',
        'best' => 'Specific concerns under expert guidance',
        'adv' => 'Targeted improvement with professional-grade products',
    ),
);

$hf_prices = array(
    array('name' => 'Medi Facial', 'price' => '999*'),
    array('name' => 'HydraFacial', 'price' => '2,999*', 'featured' => true),
    array('name' => 'Derma Elite HF', 'price' => '7,500*'),
);

$derma_for = array(
    'Dull complexion',
    'Uneven texture',
    'Rough appearance',
    'Excess oil buildup',
    'Lack of natural glow',
);

$medi_for = array(
    'Skin dullness',
    'Dehydrated skin',
    'Uneven tone',
    'Signs of ageing',
    'Skin maintenance',
);

$hf_who = array(
    'Dry or dehydrated skin',
    'Oiliness',
    'Enlarged pores',
    'Dull complexion',
    'Uneven texture',
    'Early ageing signs',
    'Tired-looking skin',
);

$hf_why = array(
    'Experienced specialists',
    'Personalised analysis',
    'Advanced facial therapies',
    'Hygienic therapy environment',
    'Focus on natural-looking results',
    'Comprehensive dermatological and hair care solutions',
);

$hf_doctors = array(
    array(
        'name' => 'Dr Dishari',
        'role' => 'Dermatologist & Skin Specialist',
        'photo' => $dr_dishari_img,
        'cert' => $dr_dishari_cert,
        'alt' => 'Dr Dishari, skin and hair doctor specialist dermatologist in Kolkata at Dontia Care Clinic',
        'cert_alt' => 'Dr Dishari dermatologist certificate',
    ),
    array(
        'name' => 'Dr Harsha',
        'role' => 'Dermatologist & Skin Specialist',
        'photo' => $dr_harsha_img,
        'cert' => $dr_harsha_cert,
        'alt' => 'Dr Harsha, skin and hair doctor specialist dermatologist in Kolkata at Dontia Care Clinic',
        'cert_alt' => 'Dr Harsha Sawargi dermatologist certificate',
    ),
);

$hf_faqs = array(
    array(
        'q' => 'What is HydraFacial treatment?',
        'a' => 'HydraFacial is a modern clinical facial that helps with non-invasive skin rejuvenation. It combines cleansing, exfoliation, pore extraction and serum infusion to remove dead cells and impurities and infuse nutritious serums deep into the skin.',
    ),
    array(
        'q' => 'Who can get HydraFacial treatment in Kolkata?',
        'a' => 'It is suitable for people with dry or dehydrated skin, oiliness, enlarged pores, dull complexion, uneven texture, early ageing signs or tired-looking skin. A consultation confirms whether HydraFacial, Derma Facial or Medi Facial is the better match.',
    ),
    array(
        'q' => 'How is HydraFacial different from Derma Facial and Medi Facial?',
        'a' => 'HydraFacial is best for hydration, dullness, pores and uneven texture with deep cleansing and instant glow. Derma Facial focuses on renewal and exfoliation. Medi Facial uses medical-grade products for specific concerns under expert guidance.',
    ),
    array(
        'q' => 'What is the HydraFacial treatment cost in Kolkata at Dontia Care Clinic?',
        'a' => 'Introductory offers currently start at ₹999* for Medi Facial, ₹2,999* for HydraFacial and ₹7,500* for Derma Elite HF. Prices may change with the therapy plan, skin evaluation and clinic offers. Confirm current pricing at consultation.',
    ),
    array(
        'q' => 'How many steps are there in the HydraFacial procedure?',
        'a' => 'At Dontia Care Clinic the treatment follows five steps: cleansing and exfoliation, gentle chemical exfoliation, pore extraction, hydration with serum infusion, and skin protection.',
    ),
);
?>
<style>
.page-wrapper{overflow-x:hidden}
.hf-page{overflow-x:hidden}
.hf-page .container{max-width:min(1280px,94vw)!important;width:100%;margin-left:auto;margin-right:auto;padding-left:max(32px,calc(env(safe-area-inset-left,0px) + 24px));padding-right:max(32px,calc(env(safe-area-inset-right,0px) + 24px));box-sizing:border-box}
.hf-page .dcc-hero{min-height:min(72vh,620px);background-position:center 42%;background-size:cover}
.hf-page .dcc-hero::before{background:linear-gradient(180deg,rgba(18,12,8,.35) 0%,rgba(18,12,8,.28) 42%,rgba(18,12,8,.78) 100%)}
.hf-page .dcc-hero-inner{width:min(760px,calc(100% - 32px));max-width:100%;margin-bottom:36px;box-sizing:border-box;padding:0 12px}
.hf-page .dcc-hero h1{font-size:clamp(20px,2.8vw,34px)!important;max-width:min(22ch,100%);margin-left:auto;margin-right:auto}
.hf-page .dcc-hero-sub{max-width:min(42ch,100%)}
@media (max-width:900px){
.hf-page .dcc-hero{min-height:min(62vh,480px);background-position:center 38%}
.hf-page .dcc-hero-inner{margin-bottom:24px;width:min(760px,calc(100% - 24px))}
.hf-page .dcc-hero h1{font-size:clamp(18px,5.2vw,26px)!important;max-width:100%}
.hf-page .dcc-hero-sub{font-size:clamp(13px,3.7vw,16px);max-width:100%}
}

.ortho-page .ortho-sec{padding:60px 0}
.ortho-page .ortho-sec h2,.ortho-page .ortho-sec h3,.ortho-page .ortho-sec h4{margin:0 0 16px}
.ortho-page .ortho-sub{font-size:18px;line-height:1.8;color:#4b4b4b}
.ortho-page .ortho-grid-2{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:36px;align-items:start}
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

.hf-page .hf-sec-alt{background:#f8fbff}
.hf-page .hf-media{width:100%;border-radius:14px;overflow:hidden;box-shadow:0 14px 32px rgba(49,19,0,.12);border:1px solid #ece6df;background:#fff}
.hf-page .hf-media img{width:100%;height:auto;display:block}
.hf-page .hf-media.hf-media-ba{padding:14px;background:#fff;box-sizing:border-box}
.hf-page .hf-media.hf-media-ba img,.hf-page .hf-media img.hf-ba{width:100%;height:auto!important;max-height:none!important;aspect-ratio:unset!important;object-fit:contain!important;object-position:center;background:#fff;display:block}
.hf-page .hf-callout{margin-top:18px;padding:14px 18px;border-left:4px solid #b78333;background:#fff8ef;border-radius:0 10px 10px 0;color:#3f3731;line-height:1.65;font-weight:600}
.hf-page .hf-pillar-grid{display:grid;grid-template-columns:1fr;gap:12px;margin-top:22px;padding:0;list-style:none;counter-reset:hfpillar}
.hf-page .hf-pillar-grid li{margin:0;background:#fff;border:1px solid #ece6df;border-radius:14px;padding:20px 18px 18px 20px;box-shadow:0 8px 20px rgba(0,0,0,.07);position:relative}
.hf-page .hf-pillar-grid li::before{counter-increment:hfpillar;content:counter(hfpillar);display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,#7a5140,#5b2f1d);color:#fff;font-weight:700;font-size:14px;margin-bottom:10px}
.hf-page .hf-pillar-grid strong{display:block;margin:0 0 6px;color:#5b2f1d;font-size:18px}
.hf-page .hf-svc-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px;margin-top:8px}
.hf-page .hf-svc-card{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:22px 22px 20px;box-shadow:0 10px 22px rgba(0,0,0,.07);height:100%}
.hf-page .hf-svc-card h3{margin:0 0 10px;font-size:20px;color:#5b2f1d}
.hf-page .hf-svc-card p{margin:0 0 12px;color:#4b4b4b;line-height:1.7}
.hf-page .hf-svc-card p:last-child{margin-bottom:0}
.hf-page .hf-check{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px;margin-top:18px;padding:0;list-style:none}
.hf-page .hf-check li{margin:0;background:#fff;border:1px solid #ece6df;border-radius:12px;padding:14px 16px 14px 44px;position:relative;line-height:1.55;box-shadow:0 6px 14px rgba(0,0,0,.05)}
.hf-page .hf-check li::before{content:"✓";position:absolute;left:14px;top:13px;width:22px;height:22px;border-radius:50%;background:linear-gradient(135deg,#c59a4d,#b78333);color:#fff;font-size:12px;font-weight:700;display:flex;align-items:center;justify-content:center}
.hf-page .hf-doc-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:22px;max-width:920px;margin:0 auto}
.hf-page .hf-doc-card{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:16px;box-shadow:0 10px 24px rgba(0,0,0,.08);text-align:center}
.hf-page .hf-doc-card img.hf-doc-photo{width:100%;height:480px;object-fit:cover;object-position:center top;border-radius:10px;display:block;margin:0 0 14px}
.hf-page .hf-doc-card h3{margin:0 0 6px;font-size:22px;color:#5b2f1d}
.hf-page .hf-doc-card .hf-doc-role{margin:0 0 14px;color:#675f57;font-size:15px}
.hf-page .hf-doc-card img.hf-doc-cert{width:100%;max-height:280px;object-fit:contain;background:#f7f3ee;border-radius:8px;border:1px solid #ece6df;padding:8px}
.hf-page .hf-video-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px;max-width:920px;margin:0 auto}
.hf-page .hf-video-aspect{position:relative;aspect-ratio:16/9;border-radius:14px;overflow:hidden;background:#1a1614;box-shadow:0 16px 36px rgba(0,0,0,.18)}
.hf-page .hf-yt-facade{position:absolute;inset:0;width:100%;height:100%;border:0;padding:0;cursor:pointer;background:#1a1614}
.hf-page .hf-yt-facade img{width:100%;height:100%;object-fit:cover;display:block}
.hf-page .hf-yt-play{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:64px;height:64px;border-radius:50%;background:rgba(183,131,51,.94);color:#fff;display:flex;align-items:center;justify-content:center;font-size:26px;box-shadow:0 8px 20px rgba(0,0,0,.28)}
.hf-page .hf-video-aspect iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
.hf-page .hf-video-card h3{margin:12px 0 0;font-size:16px;line-height:1.35;color:#3d342d;text-align:center}
.hf-page .hf-inline-link{color:#5b2f1d;font-weight:700;text-decoration:underline}
.hf-page .hf-inline-link:hover,.hf-page .hf-inline-link:focus{color:#b78333}
.hf-page .hf-table-wrap{min-width:0;max-width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;margin-top:8px;border-radius:14px;box-shadow:0 10px 22px rgba(0,0,0,.07)}
.hf-page .hf-table{width:100%;min-width:0;border-collapse:collapse;background:#fff;border:1px solid #ece6df}
.hf-page .hf-table th,.hf-page .hf-table td{padding:14px 18px;text-align:left;border-bottom:1px solid #ece6df;vertical-align:top;line-height:1.55}
.hf-page .hf-table th{background:#5b2f1d;color:#fff;font-weight:700;letter-spacing:.02em}
.hf-page .hf-table tr:last-child td{border-bottom:0}
.hf-page .hf-table tbody tr:nth-child(even){background:#faf7f3}
.hf-page .hf-table .hf-featured td{background:#fff8ef;font-weight:600}
.hf-page .hf-price{white-space:nowrap;font-weight:700;color:#5b2f1d}
.hf-page .hf-review-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px;align-items:stretch}
.hf-page .hf-review-card{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:12px;box-shadow:0 10px 22px rgba(0,0,0,.07)}
.hf-page .hf-review-card img{width:100%;height:auto;display:block;border-radius:8px;background:#fff}
.hf-page .ortho-doctor-layout > div{height:100%;min-height:100%}
.hf-page .ortho-doctor-card{height:100%;display:flex;flex-direction:column;padding:10px;box-sizing:border-box}
.hf-page .ortho-doctor-photo{flex:1 1 auto;width:100%;height:100%;min-height:560px;margin:0;object-fit:cover;object-position:center top;border-radius:10px}

@media (max-width:1024px){.hf-page .hf-svc-grid,.hf-page .hf-check,.hf-page .hf-review-grid{grid-template-columns:1fr}}
@media (max-width:768px){
.hf-page .hf-sec-alt{background:linear-gradient(180deg,#f3ece6 0%,#e8e0d8 100%)}
.hf-page .ortho-sub{color:#3a3836!important;line-height:1.75}
.hf-page .ortho-doctor-photo{min-height:min(78vw,420px);height:min(78vw,420px)}
.hf-page .hf-doc-card img.hf-doc-photo{height:min(85vw,420px)}
.hf-page .hf-doc-grid,.hf-page .hf-video-grid{grid-template-columns:1fr}
}
</style>

<div class="ortho-page implant-page hf-page">
    <section class="dcc-hero" style="background-image:url('<?php echo htmlspecialchars($hero_img, ENT_QUOTES, 'UTF-8'); ?>')">
        <div class="dcc-hero-inner">
            <h1>HydraFacial Treatment in Kolkata at Dontia Care Clinic – Skin and Hair</h1>
            <p class="dcc-hero-sub">Advanced HydraFacial treatment for healthy, glowing and rejuvenated skin.</p>
            <div class="dcc-hero-cta">
                <a class="ortho-btn ortho-btn-gold" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal" data-preselect-service="Skin Treatment">Book a consultation</a>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-grid-2">
                <div>
                    <p class="ortho-sub">To enhance your skin quality, you need something more than just using cleansing and cosmetic products. There is a need for an advanced professional facial therapy like HydraFacial Treatment.</p>
                    <p class="ortho-sub" style="margin-top:16px;">Equipped with the necessary skills and expertise, we provide HydraFacial Treatment in Kolkata at Dontia Care Clinic – Skin and Hair. Our clinic is at 78, Shambhunath Pandit Street. Professional facial therapies such as deep cleansing, hydration, exfoliation and skin rejuvenation are part of the services we provide.</p>
                    <p class="ortho-sub" style="margin-top:16px;">We treat dermatological issues with HydraFacial, Medi Facial and Derma Facial procedures customised to match skin texture. These techniques improve natural brightness, remove contaminants and restore hydration.</p>
                    <p class="hf-callout">A dedicated specialist team prepares facial therapies suited to your skin type and concerns.</p>
                </div>
                <div class="hf-media hf-media-ba">
                    <img class="hf-ba" src="<?php echo htmlspecialchars($ba_img, ENT_QUOTES, 'UTF-8'); ?>" alt="HydraFacial treatment before and after at Dontia Care Clinic Skin and Hair in Kolkata" decoding="async" fetchpriority="high">
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec hf-sec-alt" id="what-is-hydrafacial">
        <div class="container">
            <div class="ortho-section-head">
                <h2>What is HydraFacial Treatment?</h2>
                <p>A modern clinical facial for non-invasive skin rejuvenation.</p>
            </div>
            <p class="ortho-sub">This is a modern clinical facial treatment regimen that helps with non-invasive skin rejuvenation while bringing together several steps into distinct advanced facial care procedures. To eliminate dead cells and impurities, cleanse, and infuse nutritious serums deep into the skin, a specific technology is used.</p>
            <p class="ortho-sub" style="margin-top:16px;">This professional facial therapy helps improve texture and also enhances your overall dermatological condition.</p>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Why Choose HydraFacial Treatment?</h2>
                <p>Excessive sunlight, pollution and poor everyday choices affect dermatological health. Intensive cleansing and hydration with this professional facial therapy is the solution.</p>
            </div>
            <ul class="hf-check">
                <?php foreach ($hf_advantages as $item) { ?>
                <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php } ?>
            </ul>
            <p class="ortho-sub" style="margin-top:18px;">At Dontia Care Clinic we give utmost care and attention to every therapy that is suitable for you. This helps in the delivery of safe and effective outcomes.</p>
        </div>
    </section>

    <section class="ortho-sec hf-sec-alt" id="hydrafacial-procedure">
        <div class="container">
            <div class="ortho-grid-2">
                <div>
                    <div class="ortho-section-head" style="text-align:left;margin-bottom:18px;">
                        <h2>HydraFacial Treatment Procedure at Dontia Care Clinic</h2>
                        <p style="margin:0;max-width:none;">At our clinic, we follow a multi-step approach:</p>
                    </div>
                    <ol class="hf-pillar-grid">
                        <?php foreach ($hf_procedure as $step) { ?>
                        <li>
                            <strong><?php echo htmlspecialchars($step['title'], ENT_QUOTES, 'UTF-8'); ?></strong>
                            <?php echo htmlspecialchars($step['text'], ENT_QUOTES, 'UTF-8'); ?>
                        </li>
                        <?php } ?>
                    </ol>
                </div>
                <div class="hf-media hf-media-ba">
                    <img class="hf-ba" src="<?php echo htmlspecialchars($eye_img, ENT_QUOTES, 'UTF-8'); ?>" alt="HydraFacial eye treatment before and after in Kolkata at Dontia Care Clinic" loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec" id="hydrafacial-vs-derma-vs-medi">
        <div class="container">
            <div class="ortho-section-head">
                <h2>HydraFacial vs Derma Facial vs Medi Facial – Which One is Right for You?</h2>
                <p>Different issues require different facial therapies. Our professionals at Dontia Care Clinic suggest the most appropriate option after evaluating your skin.</p>
            </div>
            <div class="hf-table-wrap">
                <table class="hf-table">
                    <thead>
                        <tr>
                            <th>Treatment</th>
                            <th>Best For</th>
                            <th>Key Advantages</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hf_compare as $row) { ?>
                        <tr<?php echo $row['name'] === 'HydraFacial' ? ' class="hf-featured"' : ''; ?>>
                            <td><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['best'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['adv'], ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="ortho-sec hf-sec-alt">
        <div class="container">
            <div class="hf-svc-grid">
                <article class="hf-svc-card">
                    <h3>Derma Facial Treatment in Kolkata</h3>
                    <p>Derma Facial is an expert treatment that helps you experience a complete improvement in your dermatological condition. It carries out deep cleansing and exfoliation to make skin feel smooth and healthy.</p>
                    <p>By getting rid of dead cells, this therapy is suggested for people who have:</p>
                    <ul class="hf-check" style="grid-template-columns:1fr;margin-top:12px;">
                        <?php foreach ($derma_for as $item) { ?>
                        <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php } ?>
                    </ul>
                    <p style="margin-top:14px;">We can prepare a custom-made plan with this professional facial therapy as per your skin type at our clinic.</p>
                </article>
                <article class="hf-svc-card">
                    <h3>Medi Facial Treatment in Kolkata</h3>
                    <p>To address particular issues with specialised methods, an advanced medical-grade facial such as Medi Facial is applied. This clinical facial is not similar to general facials done in salons. It improves skin health with custom-made processes and superior skincare preparations.</p>
                    <p>It may be advantageous for issues like:</p>
                    <ul class="hf-check" style="grid-template-columns:1fr;margin-top:12px;">
                        <?php foreach ($medi_for as $item) { ?>
                        <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php } ?>
                    </ul>
                    <p style="margin-top:14px;">Before suggesting the correct Medi Facial method, your skin is assessed by our skilled professionals.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Who Can Get HydraFacial Treatment?</h2>
                <p>Through proper consultation, we determine whether this or another clinical facial is the most suitable option for you.</p>
            </div>
            <p class="ortho-sub">It is appropriate for individuals with:</p>
            <ul class="hf-check">
                <?php foreach ($hf_who as $item) { ?>
                <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php } ?>
            </ul>
        </div>
    </section>

    <section class="ortho-sec hf-sec-alt" id="our-skin-doctors">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Our Skin Doctors</h2>
                <p>Dr Dishari &amp; Dr Harsha — dermatologists leading HydraFacial, Derma Facial and Medi Facial care at Dontia Care Clinic.</p>
            </div>
            <div class="hf-doc-grid">
                <?php foreach ($hf_doctors as $doc) { ?>
                <article class="hf-doc-card">
                    <img class="hf-doc-photo" src="<?php echo htmlspecialchars($doc['photo'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($doc['alt'], ENT_QUOTES, 'UTF-8'); ?>" width="400" height="480" loading="lazy" decoding="async">
                    <h3><?php echo htmlspecialchars($doc['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p class="hf-doc-role"><?php echo htmlspecialchars($doc['role'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <img class="hf-doc-cert" src="<?php echo htmlspecialchars($doc['cert'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($doc['cert_alt'], ENT_QUOTES, 'UTF-8'); ?>" width="400" height="280" loading="lazy" decoding="async">
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="ortho-sec" id="hydrafacial-videos">
        <div class="container">
            <div class="ortho-section-head">
                <h2>HydraFacial at Dontia Care Clinic</h2>
                <p>See how our team approaches HydraFacial treatment in Kolkata.</p>
            </div>
            <div class="hf-video-grid">
                <?php foreach ($hf_videos as $vid) {
                    $poster = 'https://i.ytimg.com/vi/' . rawurlencode($vid['video_id']) . '/hqdefault.jpg';
                    $embed = 'https://www.youtube-nocookie.com/embed/' . rawurlencode($vid['video_id']) . '?rel=0&autoplay=1&playsinline=1';
                ?>
                <article class="hf-video-card">
                    <div class="hf-video-aspect">
                        <button type="button" class="hf-yt-facade" data-embed="<?php echo htmlspecialchars($embed, ENT_QUOTES, 'UTF-8'); ?>" aria-label="Play <?php echo htmlspecialchars($vid['title'], ENT_QUOTES, 'UTF-8'); ?>">
                            <img src="<?php echo htmlspecialchars($poster, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($vid['title'], ENT_QUOTES, 'UTF-8'); ?>" width="480" height="270" loading="lazy" decoding="async">
                            <span class="hf-yt-play" aria-hidden="true">&#9654;</span>
                        </button>
                    </div>
                    <h3><?php echo htmlspecialchars($vid['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="ortho-sec hf-sec-alt" id="hydrafacial-cost">
        <div class="container">
            <div class="ortho-section-head">
                <h2>HydraFacial Treatment Cost in Kolkata</h2>
                <p>Introductory offers for clinical facial therapies at Dontia Care Clinic.</p>
            </div>
            <div class="hf-table-wrap">
                <table class="hf-table">
                    <thead>
                        <tr>
                            <th>Treatment</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hf_prices as $row) { ?>
                        <tr<?php echo !empty($row['featured']) ? ' class="hf-featured"' : ''; ?>>
                            <td><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td class="hf-price">₹<?php echo htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <p class="ortho-sub" style="margin-top:16px;">The abovementioned prices are introductory offers and may fluctuate as per the therapy plan, skin evaluation and pertinent clinic deals. Kindly confirm the current pricing at the time of consultation.</p>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Patient Reviews</h2>
                <p>What patients say about HydraFacial and Medi Facial at Dontia Care Clinic.</p>
            </div>
            <div class="hf-review-grid">
                <?php foreach ($review_imgs as $rev) { ?>
                <article class="hf-review-card">
                    <img src="<?php echo htmlspecialchars($rev['src'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($rev['alt'], ENT_QUOTES, 'UTF-8'); ?>" width="420" height="280" loading="lazy" decoding="async">
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="ortho-sec hf-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Why Choose Dontia Care Clinic for this therapy?</h2>
                <p>Patients choose us for professional dermatological and hair treatment care, delivered in a safe and effective way.</p>
            </div>
            <div class="ortho-doctor-layout">
                <div>
                    <article class="ortho-doctor-card">
                        <img class="ortho-doctor-photo" src="<?php echo htmlspecialchars($hero_img, ENT_QUOTES, 'UTF-8'); ?>" alt="HydraFacial treatment room at Dontia Care Clinic Skin and Hair in Kolkata" width="480" height="560" loading="lazy" decoding="async">
                    </article>
                </div>
                <aside class="ortho-doctor-note">
                    <h3>Patients choose us because of</h3>
                    <ul class="ortho-benefit-list">
                        <?php foreach ($hf_why as $point) { ?>
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
            <div class="ortho-cta-wrap">
                <div class="ortho-cta-card">
                    <h2>Start experiencing reinvigorated, youthful-looking skin</h2>
                    <p>Taking care of one’s skin has now become a priority. Instead of trying out normal facials, you need more specialised care. Advanced clinical facial treatments like HydraFacial, Derma Facial and Medi Facial are performed at Dontia Care Clinic at Elgin Road, Bhowanipore.</p>
                    <p>After the very first session at our Skin Clinic in Kolkata, you can start seeing improvements — better hydration, radiance and brightness. Our team works with complete dedication so you can once again experience reinvigorated, youthful-looking skin.</p>
                    <p>We also offer <a class="hf-inline-link" href="<?php echo htmlspecialchars($skin_url, ENT_QUOTES, 'UTF-8'); ?>">skin treatment in Kolkata</a> and <a class="hf-inline-link" href="<?php echo htmlspecialchars($hair_url, ENT_QUOTES, 'UTF-8'); ?>">hair treatment in Kolkata</a>.</p>
                    <a class="ortho-btn" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal" data-preselect-service="Skin Treatment">Book consultation</a>
                    <p style="margin-top:14px;margin-bottom:0;"><a href="<?php echo base_url('contact-us'); ?>" class="ortho-note">Contact page</a> — directions and clinic details.</p>
                </div>
            </div>
            <?php $this->load->view('Dental/partials/clinic_location_cards'); ?>
        </div>
    </section>

    <section class="ortho-sec ortho-faq hf-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Frequently Asked Questions (FAQ)</h2>
            </div>
            <?php foreach ($hf_faqs as $faq) { ?>
            <details>
                <summary><?php echo htmlspecialchars($faq['q'], ENT_QUOTES, 'UTF-8'); ?></summary>
                <p><?php echo htmlspecialchars($faq['a'], ENT_QUOTES, 'UTF-8'); ?></p>
            </details>
            <?php } ?>
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
    document.querySelectorAll('.hf-yt-facade').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var embed = btn.getAttribute('data-embed');
            var aspect = btn.parentNode;
            if (!embed || !aspect) { return; }
            var iframe = document.createElement('iframe');
            iframe.src = embed;
            iframe.setAttribute('title', 'HydraFacial treatment at Dontia Care Clinic, Kolkata');
            iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
            iframe.setAttribute('allowfullscreen', '');
            iframe.setAttribute('loading', 'eager');
            aspect.replaceChild(iframe, btn);
        });
    });
})();
</script>

<?php $this->load->view('include/footer/footer'); ?>
