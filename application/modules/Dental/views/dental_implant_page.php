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
$patient_story_dir = defined('FCPATH') ? FCPATH . 'assets/images/dental-implant/patient-stories/' : '';
$patient_story_images = array();
$story_ext_ok = array('jpg' => true, 'jpeg' => true, 'png' => true, 'webp' => true);
if ($patient_story_dir !== '' && is_dir($patient_story_dir)) {
    foreach (scandir($patient_story_dir) as $_fn) {
        if ($_fn === '.' || $_fn === '..') {
            continue;
        }
        $_ext = strtolower(pathinfo($_fn, PATHINFO_EXTENSION));
        if (!isset($story_ext_ok[$_ext])) {
            continue;
        }
        $_rel = 'assets/images/dental-implant/patient-stories/' . rawurlencode($_fn);
        $patient_story_images[] = base_url($_rel);
    }
    sort($patient_story_images, SORT_NATURAL);
}
$patient_story_captions = array(
    'Real implant journeys shared by patients at Dontia Dental Care, Kolkata.',
    'Comfortable visits, clear planning, and results you can rely on.',
    'Eat, speak, and smile with confidence after implant-supported teeth.',
);
?>
<style>
.implant-page{overflow-x:hidden}
.implant-page .container{max-width:min(1280px,94vw);width:100%;padding-left:max(22px,calc(env(safe-area-inset-left,0px) + 16px));padding-right:max(22px,calc(env(safe-area-inset-right,0px) + 16px));box-sizing:border-box}
.implant-page .implant-stories-slider-outer{width:100vw;max-width:100%;position:relative;left:50%;transform:translateX(-50%);box-sizing:border-box;padding-left:clamp(16px,3.5vw,40px);padding-right:clamp(16px,3.5vw,40px)}
.implant-page .implant-stories-slider-outer .implant-patient-stories-wrap.dr-gallery-slider-wrap{margin-top:14px;padding-left:max(48px,calc(env(safe-area-inset-left,0px) + 42px));padding-right:max(48px,calc(env(safe-area-inset-right,0px) + 42px))}
@media (max-width:768px){.implant-page .implant-stories-slider-outer{padding-left:max(14px,calc(env(safe-area-inset-left,0px) + 10px));padding-right:max(14px,calc(env(safe-area-inset-right,0px) + 10px))}.implant-page .implant-stories-slider-outer .implant-patient-stories-wrap.dr-gallery-slider-wrap{padding-left:max(20px,calc(env(safe-area-inset-left,0px) + 12px));padding-right:max(20px,calc(env(safe-area-inset-right,0px) + 12px));margin-top:10px}}

.implant-page .implant-hero{position:relative;min-height:520px;display:flex;flex-direction:column;align-items:center;justify-content:center;overflow:hidden;background:#1a1614 url('<?php echo base_url('assets/images/dental-implant/hero-banner.jpg'); ?>') center center/cover no-repeat}
.implant-page .implant-hero::before{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(0,0,0,.45) 0%,rgba(0,0,0,.62) 100%)}
.implant-page .implant-hero-inner{position:relative;z-index:2;text-align:center;max-width:980px;margin:0 15px;padding:20px 24px;background:rgba(0,0,0,.4);border-radius:10px}
.implant-page .implant-hero h1{color:#fff !important;margin:0 0 12px;font-size:38px;line-height:1.2;text-shadow:0 2px 12px rgba(0,0,0,.65)}
.implant-page .implant-hero-sub{margin:0;color:#fff!important;font-size:18px;line-height:1.5;text-shadow:0 1px 8px rgba(0,0,0,.55)}
@media (max-width:900px){.implant-page .implant-hero{min-height:400px}.implant-page .implant-hero h1{font-size:28px}}
.implant-page .implant-proc-steps{list-style:none;padding:0;margin:18px 0 0;display:grid;gap:16px}
.implant-page .implant-proc-steps li{margin:0;background:#fff;border:1px solid #ece6df;border-radius:12px;padding:18px 20px;box-shadow:0 8px 20px rgba(0,0,0,.07)}
.implant-page .implant-proc-steps strong{display:block;color:#5b2f1d;margin-bottom:8px;font-size:17px}
.implant-page .implant-story-slide-inner{background:#fff;border-radius:12px;padding:14px;box-shadow:0 10px 22px rgba(0,0,0,.12);height:100%;box-sizing:border-box;text-align:left}
.implant-page .implant-story-slide-inner img{width:100%;height:380px;object-fit:cover;object-position:center;border-radius:8px;display:block;box-shadow:none}
.implant-page .implant-story-slide-inner p{margin:12px 0 0;color:#5a534c;line-height:1.65;font-size:15px}
@media (max-width:1280px){.implant-page .implant-story-slide-inner img{height:340px}}
@media (max-width:768px){.implant-page .implant-story-slide-inner img{height:300px}}

.ortho-page .ortho-sec{padding:60px 0}
.ortho-page .ortho-sec h2,.ortho-page .ortho-sec h3,.ortho-page .ortho-sec h4{margin:0 0 16px}
.ortho-page .ortho-sub{font-size:19px;line-height:1.8}
.ortho-page .ortho-grid-2{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:25px}
.ortho-page .ortho-card{background:#fff;border-radius:12px;padding:22px;box-shadow:0 8px 20px rgba(0,0,0,.08);height:100%}
.ortho-page .ortho-card img{width:100%;height:190px;object-fit:cover;border-radius:8px;margin-bottom:12px}
.ortho-page .ortho-section-head{text-align:center;margin-bottom:22px}
.ortho-page .ortho-section-head h2{display:inline-block;margin:0 auto 10px}
.ortho-page .ortho-section-head p{margin:0 auto;color:#675f57;max-width:760px}
.ortho-page .ortho-doctor-layout{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:18px;align-items:stretch;max-width:980px;margin:0 auto}
.ortho-page .ortho-doctor-grid{display:grid;grid-template-columns:minmax(0,1fr);gap:16px;justify-content:stretch}
.ortho-page .ortho-doctor-card{background:#fff;border-radius:14px;padding:12px;box-shadow:0 10px 24px rgba(0,0,0,.08);border:1px solid #ece6df;text-align:center}
.ortho-page .ortho-doctor-photo{width:100%;height:250px;object-fit:cover;object-position:center 15%;border-radius:10px;display:block;margin:0 0 12px}
.ortho-page .ortho-doctor-card h3{margin:0 0 6px;font-size:18px;line-height:1.25}
.ortho-page .ortho-doctor-card p{margin:0;color:#6d6258;font-size:16px}
.ortho-page .ortho-doctor-note{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:20px 22px;box-shadow:0 10px 24px rgba(0,0,0,.07);display:flex;flex-direction:column;justify-content:center;text-align:left}
.ortho-page .ortho-doctor-note h3{margin:0 0 12px;font-size:32px;line-height:1.15}
.ortho-page .ortho-doctor-note p{margin:0 0 10px;color:#4b4b4b;line-height:1.7}
.ortho-page .ortho-benefit-list{list-style:none;padding:0;margin:14px 0 0;display:grid;gap:12px}
.ortho-page .ortho-benefit-list li{position:relative;background:#fff;border:1px solid #ece6df;border-radius:10px;padding:12px 14px 12px 42px;box-shadow:0 6px 14px rgba(0,0,0,.06);margin:0;line-height:1.7}
.ortho-page .ortho-benefit-list li::before{content:"";position:absolute;left:16px;top:18px;width:12px;height:12px;border-radius:50%;background:linear-gradient(135deg,#6f5ab5 0%,#4a3b8e 100%);box-shadow:0 0 0 4px rgba(111,90,181,.14)}
.ortho-page .ortho-service-bullets{list-style:none;padding:0;margin:14px 0 0;display:grid;gap:12px}
.ortho-page .ortho-service-bullets li{position:relative;background:#fff;border:1px solid #ece6df;border-radius:10px;padding:12px 14px 12px 42px;box-shadow:0 6px 14px rgba(0,0,0,.06);margin:0}
.ortho-page .ortho-service-bullets li::before{content:"";position:absolute;left:16px;top:18px;width:12px;height:12px;border-radius:50%;background:linear-gradient(135deg,#7a5140 0%,#5b2f1d 100%);box-shadow:0 0 0 4px rgba(122,81,64,.15)}
.ortho-page .ortho-cert-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:20px}
.ortho-page .ortho-cert-card{background:#fff;border:1px solid #ece6df;border-radius:12px;padding:14px;box-shadow:0 10px 20px rgba(0,0,0,.08);transition:transform .2s ease,box-shadow .2s ease}
.ortho-page .ortho-cert-card:hover{transform:translateY(-3px);box-shadow:0 14px 24px rgba(0,0,0,.12)}
.ortho-page .ortho-cert-card img{width:100%;height:220px;object-fit:contain;object-position:center;background:#f7f6f3;border-radius:8px;display:block}
.ortho-page .ortho-cta-wrap{max-width:920px;margin:0 auto}
.ortho-page .ortho-cta-card{background:linear-gradient(135deg,#ffffff 0%,#f7f4ef 100%);border:1px solid #e9e2d8;border-radius:14px;padding:28px 30px;box-shadow:0 10px 24px rgba(0,0,0,.08);}
.ortho-page .ortho-cta-card h4{margin:0 0 12px}
.ortho-page .ortho-cta-card p{margin:0 0 18px;color:#4f4b46;line-height:1.7;max-width:760px}
.ortho-page .ortho-faq{max-width:980px;margin:0 auto}
.ortho-page .ortho-faq details{border:1px solid #ebe8e2;border-radius:8px;padding:0;margin-bottom:10px;background:#f7f6f3;overflow:hidden;}
.ortho-page .ortho-faq summary{cursor:pointer;font-weight:700;padding:13px 16px;list-style:revert;}
.ortho-page .ortho-faq details p{margin:0;padding:0 16px 14px 34px;color:#4f4b46;line-height:1.7;background:#fff;border-top:1px solid #ece7df;}
.ortho-page .ortho-btn{display:inline-flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#7a5140 0%,#5b2f1d 100%);color:#fff;padding:12px 24px;border-radius:999px;font-size:13px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;border:0;box-shadow:0 8px 20px rgba(91,47,29,.28);transition:transform .2s ease,box-shadow .2s ease,opacity .2s ease;}
.ortho-page .ortho-btn:hover,.ortho-page .ortho-btn:focus{color:#fff;text-decoration:none;transform:translateY(-1px);box-shadow:0 12px 24px rgba(91,47,29,.34);}
.ortho-page .ortho-btn-gold{background:linear-gradient(135deg,#c59a4d 0%,#b78333 100%);box-shadow:0 8px 20px rgba(183,131,51,.28);}
.ortho-page .ortho-btn-gold:hover,.ortho-page .ortho-btn-gold:focus{box-shadow:0 12px 24px rgba(183,131,51,.35);}
.ortho-page .ortho-note{font-weight:700;color:#1f6fd0;}
@media (max-width:900px){.ortho-page .ortho-grid-2,.ortho-page .ortho-doctor-layout,.ortho-page .ortho-cert-grid{grid-template-columns:1fr}}

/* Desktop: soft cool tint; phone: warm tones + stronger contrast (matches Dontia brand) */
.implant-page .implant-sec-warmalt{background:#f8fbff}
@media (max-width:768px){
.implant-page .implant-sec-warmalt{background:linear-gradient(180deg,#f3ece6 0%,#e8e0d8 100%)}
.implant-page .ortho-sub{color:#3a3836!important;line-height:1.75}
.implant-page .ortho-section-head p{color:#2f2b28!important;max-width:36ch}
.implant-page .implant-stories-section{background:linear-gradient(180deg,#ebe4de 0%,#e3dbd4 100%);padding-top:36px;padding-bottom:44px}
.implant-page .implant-stories-section .ortho-section-head p{color:#252220!important;font-size:16px;line-height:1.65;max-width:none;padding:0 6px}
.implant-page .implant-stories-slider-outer{padding-left:10px;padding-right:10px}
.implant-page .implant-stories-slider-outer .implant-patient-stories-wrap.dr-gallery-slider-wrap{padding-left:10px;padding-right:10px;margin-top:8px}
/* One primary card per view — avoids half-clipped second card on narrow phones */
.implant-page .implant-patient-stories-wrap .dr-gallery-slider{gap:12px;padding-bottom:4px}
.implant-page .implant-patient-stories-wrap .dr-gallery-slide.implant-patient-story-slide{flex:0 0 calc(100% - 8px);min-width:calc(100% - 8px);max-width:calc(100% - 8px);box-sizing:border-box}
.implant-page .implant-story-slide-inner{border:1px solid rgba(49,19,0,.1);box-shadow:0 14px 32px rgba(49,19,0,.14)}
.implant-page .implant-story-slide-inner p{color:#2f2b28!important;font-size:15px}
.implant-page .implant-story-slide-inner img{height:min(52vw,260px)}
}
</style>

<div class="ortho-page implant-page">
    <section class="implant-hero">
        <div class="implant-hero-inner">
            <h1>Best Dental Implant Clinic in Kolkata</h1>
            <p class="implant-hero-sub">Expert dentists for a perfect smile — restore your lost smile</p>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <p class="ortho-sub">At some point in our lives, most of us need to find the best dental implant clinic in Kolkata for our missing teeth and to restore our smile. If you have any needs for dental implants, feel free to contact us as we are the renowned clinic with a team of expert dentists, advanced technology and tools, and personalized care tailored to your requirements. Our patients are our main concern. So you can get world-class service at an affordable price.</p>
            <p class="ortho-sub" style="margin-top:16px;">With us, it is confirmed that you can get a permanent solution for your missing teeth. Our best dental implant specialists are knowledgeable enough to offer a permanent solution for your missing teeth. With our advanced service and technology, you can get teeth that look and function just like natural teeth.</p>
        </div>
    </section>

    <section class="ortho-sec implant-sec-warmalt" style="padding-top:42px;padding-bottom:42px;">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Meet our Experienced and Qualified Dental Implantologists</h2>
                <p>Our patients trust us because our team includes leading MDS Implantologists, Oral Surgeons, and Prosthodontists — including Dawson Certified Dentist Dr. Prabhjeet Singh Sethi with 25+ years’ experience in placing implants — who are skilled and have decades of experience. They use international-quality, globally renowned implant systems to ensure superior implant procedures.</p>
            </div>
            <div class="ortho-doctor-layout">
                <div class="ortho-doctor-grid">
                    <?php if (count($doctors) > 0) {
                        $featured_doctor = null;
                        foreach ($doctors as $dr_pick) {
                            if (isset($dr_pick->doctor_name)) {
                                $featured_doctor = $dr_pick;
                                break;
                            }
                        }
                        if ($featured_doctor) {
                            $img = !empty($featured_doctor->image_name) ? site_url('admin/webroot/uploads/doctors/' . $featured_doctor->image_name) : $dontia_dr_prabhjeet_photo;
                            $impl_dr_srcset = (strpos($img, '/dr-prabhjeet-tmj-') !== false) ? $dontia_dr_resp_attrs : '';
                    ?>
                    <article class="ortho-doctor-card">
                        <img class="ortho-doctor-photo" src="<?php echo htmlspecialchars($img, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars((string) $featured_doctor->doctor_name, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $impl_dr_srcset; ?> width="360" height="225" decoding="async" fetchpriority="high">
                        <h3><?php echo htmlspecialchars((string) $featured_doctor->doctor_name, ENT_QUOTES, 'UTF-8'); ?></h3>
                        <p><?php echo htmlspecialchars(isset($featured_doctor->designation) ? (string) $featured_doctor->designation : 'Implant & restorative specialist', ENT_QUOTES, 'UTF-8'); ?></p>
                    </article>
                    <?php
                        }
                    } else { ?>
                    <article class="ortho-doctor-card">
                        <img class="ortho-doctor-photo" src="<?php echo htmlspecialchars($dontia_dr_prabhjeet_photo, ENT_QUOTES, 'UTF-8'); ?>" alt="Dental implant specialist"<?php echo $dontia_dr_resp_attrs; ?> width="360" height="225" decoding="async" fetchpriority="high">
                        <h3>Expert Implant Team</h3>
                        <p>MDS implantologists, oral surgeons, and prosthodontists focused on predictable, long-lasting results.</p>
                    </article>
                    <?php } ?>
                </div>
                <aside class="ortho-doctor-note">
                    <h3>Why patients choose us</h3>
                    <p>International-quality implant systems, careful planning, and a team experienced in complex cases.</p>
                    <p>We explain costs clearly on your first visit and tailor treatment to your jaw bone, bite, and smile goals.</p>
                    <div style="margin-top:8px;">
                        <a class="ortho-btn" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal">Book consultation</a>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <h2>What Are Dental Implants?</h2>
            <p class="ortho-sub">They are titanium posts that act as artificial tooth roots — the best alternative to natural teeth. They are surgically placed in the jawbone where teeth are missing.</p>
            <h3 style="margin-top:28px;">Benefits of Dental Implants</h3>
            <ul class="ortho-benefit-list">
                <li><strong>Permanently fixed teeth</strong></li>
                <li><strong>Improved oral function</strong> — like chewing food comfortably</li>
                <li><strong>Restore your smile</strong> and facial support</li>
                <li><strong>Durable and long-lasting</strong> with good oral hygiene</li>
            </ul>
            <h3 style="margin-top:28px;">Types of Dental Implants</h3>
            <ul class="ortho-service-bullets">
                <li><strong>Single tooth implant</strong></li>
                <li><strong>Multiple tooth implants</strong></li>
                <li><strong>All on 4 / 6 implants</strong></li>
            </ul>
        </div>
    </section>

    <section class="ortho-sec implant-sec-warmalt">
        <div class="container">
            <div class="ortho-grid-2">
                <div>
                    <h3>Advanced technology and state-of-the-art facilities</h3>
                    <p class="ortho-sub">The needs of all patients are not the same — some require solutions that differ from others. At our clinic we offer customised treatment as required and formulate plans accordingly. Our dental implant procedures are designed to deliver enduring results.</p>
                </div>
                <div>
                    <h3>Affordable and transparent pricing</h3>
                    <p class="ortho-sub">We design procedures to suit each patient’s specific needs and strive to provide high-quality treatment at affordable prices. We make every effort to explain the total cost during your first visit.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <h3>Dental technology</h3>
            <div class="ortho-grid-2">
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
        </div>
    </section>

    <section class="ortho-sec implant-sec-warmalt">
        <div class="container">
            <h2>Our dental implant procedure in Kolkata</h2>
            <ol class="implant-proc-steps">
                <li>
                    <strong>1st step: Consultation and evaluation</strong>
                    <span>At our clinic you meet expert, skilled implantologists who use modern equipment at every step. On the first visit we evaluate your oral health, medical history, and goals, then recommend the best treatment plan.</span>
                </li>
                <li>
                    <strong>2nd step: Implant placement surgery</strong>
                    <span>We use the latest implant techniques and tools for successful surgery and a smoother recovery. Sedation dentistry and local anaesthesia help keep discomfort minimal.</span>
                </li>
                <li>
                    <strong>3rd step: Healing and integration</strong>
                    <span>After placement, the implant needs time to integrate with the jawbone — a critical phase. This cannot be rushed; it often takes several months (at least about 3 months) for proper integration and a stable foundation for your new teeth.</span>
                </li>
                <li>
                    <strong>Final restoration</strong>
                    <span>Custom crowns, dentures, or bridges are attached once your surgeon confirms the implant has integrated with the bone — the last restorative phase of treatment.</span>
                </li>
            </ol>
        </div>
    </section>

    <section class="ortho-sec implant-stories-section">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Patient stories</h2>
                <p>Real people, real journeys — compassionate care and modern implant dentistry in Kolkata.</p>
            </div>
            <?php if (count($patient_story_images) === 0) { ?>
            <p class="ortho-sub">Patient story photos will appear here once images are added to <code style="background:#f0f4f8;padding:2px 6px;border-radius:4px;">assets/images/dental-implant/patient-stories/</code>.</p>
            <?php } ?>
        </div>
        <?php if (count($patient_story_images) > 0) { ?>
        <div class="implant-stories-slider-outer">
            <div class="dr-gallery-slider-wrap implant-patient-stories-wrap" id="implantPatientStoriesWrap">
                <button type="button" class="dr-gallery-nav dr-gallery-nav-left implant-patient-stories-prev" id="implantPatientStoriesPrev" aria-label="Previous patient stories">&#10094;</button>
                <div class="dr-gallery-slider" id="implantPatientStoriesSlider">
                    <?php foreach ($patient_story_images as $_i => $_img_url) {
                        $_cap = $patient_story_captions[$_i % count($patient_story_captions)];
                    ?>
                    <article class="dr-gallery-slide implant-patient-story-slide">
                        <div class="implant-story-slide-inner">
                            <img src="<?php echo htmlspecialchars($_img_url, ENT_QUOTES, 'UTF-8'); ?>" alt="Patient story — implant treatment in Kolkata" loading="lazy" decoding="async">
                            <p><?php echo htmlspecialchars($_cap, ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                    </article>
                    <?php } ?>
                </div>
                <button type="button" class="dr-gallery-nav dr-gallery-nav-right implant-patient-stories-next" id="implantPatientStoriesNext" aria-label="Next patient stories">&#10095;</button>
            </div>
        </div>
        <?php } ?>
    </section>

    <section class="ortho-sec ortho-faq">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Frequently asked questions</h2>
            </div>
            <details><summary>How long do dental implants last?</summary><p>Success rates are above 97% long term. Like natural teeth, implants can last many years — often a lifetime — with proper care and maintenance.</p></details>
            <details><summary>Most people avoid implants for fear of pain — why?</summary><p>Although surgery is involved, it is minimally invasive. We use local anaesthesia for comfort so most patients report manageable, short-lived discomfort rather than severe pain.</p></details>
            <details><summary>Does the dental implant procedure take a long time?</summary><p>You need time for the implant to integrate with the jawbone; it cannot be completed in a single visit. Often you should plan for at least about 3 months of healing before final teeth in typical cases.</p></details>
            <details><summary>Is the cost covered by insurance?</summary><p>Many insurers offer partial coverage for implants, but benefits vary by plan. Contact our office and we’ll help you understand what your policy may cover.</p></details>
        </div>
    </section>

    <section class="ortho-sec implant-sec-warmalt">
        <div class="container">
            <div class="ortho-cta-wrap">
                <div class="ortho-cta-card">
                    <h2>Book your consultation today</h2>
                    <p><strong>Contact us</strong> for the best dental implant services in Kolkata. Call the number below or use the booking form to schedule a visit with our specialists. We’re ready to help you restore your smile.</p>
                    <a class="ortho-btn" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal">Book consultation</a>
                    <p style="margin-top:14px;margin-bottom:0;"><a href="<?php echo base_url('contact-us'); ?>" class="ortho-note">Contact page</a> — directions and clinic details.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h4>Certificates</h4>
                <p>Professional training that supports safe, high-standard implant care.</p>
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

    <section class="ortho-sec implant-sec-warmalt">
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

    <section class="ortho-sec">
        <div class="container">
            <h4>Blogs</h4>
            <div class="ortho-grid-2">
                <?php if (count($blogs) > 0) {
                    foreach ($blogs as $b) {
                        $b_title = isset($b->post_title) ? (string) $b->post_title : 'Blog';
                        $b_img = !empty($b->blog_image) ? base_url('admin/webroot/uploads/blog/' . $b->blog_image) : base_url('assets/images/favicon.png');
                        $b_permalink = isset($b->Permalink) ? strtolower(trim((string) $b->Permalink)) : '';
                        $b_permalink = preg_replace('/[^a-z0-9\s-]/', '', $b_permalink);
                        $b_permalink = trim(preg_replace('/[\s-]+/', '-', $b_permalink), '-');
                        $b_link = $b_permalink !== '' ? base_url('blog/' . $b_permalink) : '#';
                ?>
                <article class="ortho-card">
                    <img src="<?php echo htmlspecialchars($b_img, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($b_title, ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                    <h4><?php echo htmlspecialchars($b_title, ENT_QUOTES, 'UTF-8'); ?></h4>
                    <a href="<?php echo htmlspecialchars($b_link, ENT_QUOTES, 'UTF-8'); ?>">Read blog</a>
                </article>
                <?php
                    }
                } else { ?>
                <article class="ortho-card"><h4>Blogs will appear here</h4><p>Publish posts from admin to show them here.</p></article>
                <?php } ?>
            </div>
        </div>
    </section>
</div>

<script>
(function () {
    var slider = document.getElementById('implantPatientStoriesSlider');
    var wrap = document.getElementById('implantPatientStoriesWrap');
    var leftBtn = document.getElementById('implantPatientStoriesPrev');
    var rightBtn = document.getElementById('implantPatientStoriesNext');
    if (!slider || !leftBtn || !rightBtn || !wrap) {
        return;
    }
    function scrollStepPx() {
        var slide = slider.querySelector('.implant-patient-story-slide');
        if (!slide) {
            return 420;
        }
        var cs = window.getComputedStyle(slider);
        var gap = parseFloat(cs.columnGap || cs.gap || '16');
        if (isNaN(gap)) {
            gap = 16;
        }
        return Math.round(slide.getBoundingClientRect().width + gap);
    }
    function tickAuto() {
        if (typeof document.visibilityState !== 'undefined' && document.visibilityState !== 'visible') {
            return;
        }
        var maxScroll = slider.scrollWidth - slider.clientWidth;
        if (maxScroll <= 8) {
            return;
        }
        var step = scrollStepPx();
        if (step < 120) {
            step = 320;
        }
        var atEnd = slider.scrollLeft >= maxScroll - 8;
        if (atEnd) {
            slider.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            slider.scrollBy({ left: step, behavior: 'smooth' });
        }
    }
    var autoTimer = null;
    function stopAuto() {
        if (autoTimer) {
            clearInterval(autoTimer);
            autoTimer = null;
        }
    }
    function startAuto() {
        stopAuto();
        autoTimer = setInterval(tickAuto, 3500);
    }
    leftBtn.addEventListener('click', function () {
        slider.scrollBy({ left: -scrollStepPx(), behavior: 'smooth' });
    });
    rightBtn.addEventListener('click', function () {
        slider.scrollBy({ left: scrollStepPx(), behavior: 'smooth' });
    });
    document.addEventListener('visibilitychange', function () {
        if (document.visibilityState === 'visible') {
            startAuto();
        } else {
            stopAuto();
        }
    });
    window.addEventListener('load', function () {
        startAuto();
        window.setTimeout(tickAuto, 400);
    });
    startAuto();
})();
</script>

<?php $this->load->view('include/footer/footer'); ?>
<?php $this->load->view('include/modal_master/modal_master'); ?>
