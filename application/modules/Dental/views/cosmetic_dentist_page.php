<?php
$this->load->view('include/header/header');
$doctors = isset($doctor_list) && is_array($doctor_list) ? $doctor_list : array();
$tech_cards = isset($technology_cards) && is_array($technology_cards) ? $technology_cards : array();
$certs = isset($media_certificates) && is_array($media_certificates) ? $media_certificates : array();
$blogs = isset($blog_carousel) && is_array($blog_carousel) ? $blog_carousel : array();

$cos_img_dir = 'assets/images/cosmetci-images/';
$cos_img = function ($filename) use ($cos_img_dir) {
    return base_url($cos_img_dir . rawurlencode($filename));
};

$hero_img = base_url('admin/webroot/uploads/banner/Koel_Mallick_with_dentist_in_kolkata_JPG.jpeg');
$modern_img = $cos_img('Modern Cosmetic Dentistry and a Confident Smileclear-aligners-treatment-in-kolkata.jpg');
$services_img = $cos_img('cosmetic-dental-services-in-kolkata.jpeg');
$laser_img = $cos_img('cosmetic-laser-treatment-in-kolkata.jpg');
$who_img = $cos_img('Who Is Cosmetic Dentistry For_Dental-Veneer-treatment-in-kolkata.jpg');
$doctor_img = $cos_img('Why Choose Dontia Care Clinic-Dental_Dr-Tanwee-Saha-best-cosmetic-dentist-in-kolkata.webp');
$clinic_img = $cos_img('clinic images.JPG');

$cos_videos = array(
    array('title' => 'Patient Smile Journey', 'video_id' => '2sTjiwzlyrs'),
    array('title' => 'Cosmetic Dentistry at Dontia', 'video_id' => 'rVym9ns9X40'),
);

$cos_why = array(
    'Experienced dentists specialise in cosmetic dental treatments — Dr Tanwee Saha - Best Cosmetic Dentist in Kolkata',
    'We only use modern technologies for dental services, such as digital smile design & 3D scanning',
    'Treatment services tailored to the specific needs of the patient',
    'We excel in delivering natural-looking smiles and durable results in cosmetic dentistry',
    'We believe in offering patient-centric care in a noticeably good environment',
    'We maintain transparency by disclosing the package with no hidden costs',
    'The consultation process is fast, convenient, and honest, and treatment is world-class',
);

$cos_who = array(
    'Have stained teeth that don\'t improve even after brushing twice a day',
    'Have gaps in between their teeth, uneven or misaligned teeth, affecting their smile balance',
    'Have damaged or chipped teeth as a result of an injury or teeth grinding',
    'Have skewed teeth, impacting their confidence to smile wholeheartedly',
    'Have a noticeably higher gummy smile',
);

$cos_process = array(
    array('title' => 'Smile analysis', 'text' => 'The first thing we do is a smile analysis to identify your oral needs and specific aesthetic goals.'),
    array('title' => 'Advanced digital imaging', 'text' => 'Then we do advanced digital imaging to predict and visualise your final output.'),
    array('title' => 'Personalised treatment plan', 'text' => 'We next prepare a treatment plan tailored to your specific needs.'),
    array('title' => 'Precise procedures', 'text' => 'Our best dentist in Kolkata then performs the procedures as planned and with precision.'),
    array('title' => 'Review & care plan', 'text' => 'Finally, we make adjustments after reviewing the results and provide you with a care plan for lasting results.'),
);
?>
<style>
.cos-page{overflow-x:hidden}
.cos-page .container{max-width:min(1280px,94vw);width:100%;padding-left:max(22px,calc(env(safe-area-inset-left,0px) + 16px));padding-right:max(22px,calc(env(safe-area-inset-right,0px) + 16px));box-sizing:border-box}
.cos-page .cos-hero{position:relative;min-height:560px;display:flex;flex-direction:column;align-items:center;justify-content:center;overflow:hidden;background:#1a1614 url('<?php echo htmlspecialchars($hero_img, ENT_QUOTES, 'UTF-8'); ?>') center 28%/cover no-repeat}
.cos-page .cos-hero::before{content:"";position:absolute;inset:0;background:linear-gradient(115deg,rgba(18,12,8,.78) 0%,rgba(18,12,8,.42) 52%,rgba(18,12,8,.68) 100%)}
.cos-page .cos-hero-inner{position:relative;z-index:2;text-align:center;max-width:940px;margin:0 16px;padding:28px 28px 30px;background:rgba(12,8,6,.45);border:1px solid rgba(255,255,255,.12);border-radius:14px;backdrop-filter:blur(2px)}
.cos-page .cos-hero h1{color:#fff!important;margin:0 0 14px;font-size:clamp(26px,4vw,40px);line-height:1.18;text-shadow:0 2px 14px rgba(0,0,0,.55)}
.cos-page .cos-hero-sub{margin:0 auto;color:#fff!important;font-size:clamp(16px,2.1vw,19px);line-height:1.55;text-shadow:0 1px 8px rgba(0,0,0,.5);max-width:40ch}
.cos-page .cos-hero-cta{margin-top:22px;display:flex;flex-wrap:wrap;gap:12px;justify-content:center}
@media (max-width:900px){.cos-page .cos-hero{min-height:440px;background-position:center 20%}.cos-page .cos-hero-inner{padding:22px 18px}}

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
.ortho-page .ortho-doctor-photo{width:100%;height:300px;object-fit:cover;object-position:center 15%;border-radius:10px;display:block;margin:0 0 12px}
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

.cos-page .cos-sec-alt{background:#f8fbff}
.cos-page .cos-media{width:100%;border-radius:14px;overflow:hidden;box-shadow:0 14px 32px rgba(49,19,0,.12);border:1px solid #ece6df;background:#f3efe9}
.cos-page .cos-media img{width:100%;height:auto;display:block;aspect-ratio:4/3;object-fit:cover}
.cos-page .cos-callout{margin-top:18px;padding:14px 18px;border-left:4px solid #b78333;background:#fff8ef;border-radius:0 10px 10px 0;color:#3f3731;line-height:1.65;font-weight:600}
.cos-page .cos-svc-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px;margin-top:8px}
.cos-page .cos-svc-card{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:22px 22px 20px;box-shadow:0 10px 22px rgba(0,0,0,.07);height:100%}
.cos-page .cos-svc-card h3{margin:0 0 10px;font-size:20px;color:#5b2f1d}
.cos-page .cos-svc-card p{margin:0;color:#4b4b4b;line-height:1.7}
.cos-page .cos-proc-steps{list-style:none;padding:0;margin:18px 0 0;display:grid;gap:14px;counter-reset:cosstep}
.cos-page .cos-proc-steps li{margin:0;background:#fff;border:1px solid #ece6df;border-radius:12px;padding:18px 20px 18px 72px;box-shadow:0 8px 20px rgba(0,0,0,.07);position:relative}
.cos-page .cos-proc-steps li::before{counter-increment:cosstep;content:counter(cosstep);position:absolute;left:18px;top:18px;width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#7a5140,#5b2f1d);color:#fff;font-weight:700;font-size:15px;display:flex;align-items:center;justify-content:center}
.cos-page .cos-proc-steps strong{display:block;color:#5b2f1d;margin-bottom:6px;font-size:17px}
.cos-page .cos-who-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px;margin-top:18px}
.cos-page .cos-who-grid li{list-style:none;margin:0;background:#fff;border:1px solid #ece6df;border-radius:12px;padding:14px 16px 14px 44px;position:relative;line-height:1.55;box-shadow:0 6px 14px rgba(0,0,0,.05)}
.cos-page .cos-who-grid li::before{content:"✓";position:absolute;left:14px;top:13px;width:22px;height:22px;border-radius:50%;background:linear-gradient(135deg,#c59a4d,#b78333);color:#fff;font-size:12px;font-weight:700;display:flex;align-items:center;justify-content:center}
.cos-page .cos-gallery{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:16px;margin-top:18px}
.cos-page .cos-gallery figure{margin:0;background:#fff;border:1px solid #ece6df;border-radius:14px;overflow:hidden;box-shadow:0 10px 22px rgba(0,0,0,.08)}
.cos-page .cos-gallery img{width:100%;height:240px;object-fit:cover;display:block}
.cos-page .cos-gallery figcaption{padding:12px 14px;color:#5a534c;font-size:14px;line-height:1.5}
.cos-page .cos-video-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px;margin-top:18px;max-width:920px;margin-left:auto;margin-right:auto}
.cos-page .cos-video-card{background:#fff;border:1px solid #ece6df;border-radius:14px;overflow:hidden;box-shadow:0 10px 22px rgba(0,0,0,.08);cursor:pointer;transition:transform .2s ease,box-shadow .2s ease}
.cos-page .cos-video-card:hover{transform:translateY(-3px);box-shadow:0 16px 28px rgba(0,0,0,.12)}
.cos-page .cos-video-thumb{position:relative;aspect-ratio:16/9;background:#1a1614}
.cos-page .cos-video-thumb img{width:100%;height:100%;object-fit:cover;display:block}
.cos-page .cos-video-play{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:54px;height:54px;border-radius:50%;background:rgba(183,131,51,.94);color:#fff;display:flex;align-items:center;justify-content:center;font-size:22px;box-shadow:0 8px 20px rgba(0,0,0,.28)}
.cos-page .cos-video-card h3{margin:0;padding:14px 16px;font-size:16px;line-height:1.35;color:#3d342d}
.cos-video-modal{display:none;position:fixed;inset:0;z-index:10050;background:rgba(0,0,0,.78);align-items:center;justify-content:center;padding:20px}
.cos-video-modal.is-open{display:flex}
.cos-video-modal-inner{position:relative;width:min(920px,100%);aspect-ratio:16/9;background:#000;border-radius:12px;overflow:visible;box-shadow:0 20px 50px rgba(0,0,0,.45)}
.cos-video-modal-inner #cosVideoModalMount{position:absolute;inset:0;border-radius:12px;overflow:hidden;background:#000}
.cos-video-modal-inner iframe{position:absolute;inset:0;width:100%;height:100%;border:0}
.cos-video-modal-close{position:absolute;top:-44px;right:0;z-index:2;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.35);color:#fff;width:36px;height:36px;border-radius:50%;font-size:24px;cursor:pointer;line-height:1;display:flex;align-items:center;justify-content:center}

@media (max-width:1024px){.cos-page .cos-svc-grid,.cos-page .cos-who-grid,.cos-page .cos-gallery{grid-template-columns:1fr}}
@media (max-width:768px){
.cos-page .cos-sec-alt{background:linear-gradient(180deg,#f3ece6 0%,#e8e0d8 100%)}
.cos-page .ortho-sub{color:#3a3836!important;line-height:1.75}
.cos-page .cos-video-grid{grid-template-columns:1fr}
.cos-page .cos-gallery img{height:min(52vw,240px)}
}
</style>

<div class="ortho-page implant-page cos-page">
    <section class="cos-hero">
        <div class="cos-hero-inner">
            <h1>Best Cosmetic Dentist in Kolkata at Dontia Care Clinic – Transform Your Smile</h1>
            <p class="cos-hero-sub">Celebrity-trusted cosmetic dentistry in Bhowanipore — personalised smile enhancements that look natural and last.</p>
            <div class="cos-hero-cta">
                <a class="ortho-btn ortho-btn-gold" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal">Book consultation</a>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-grid-2">
                <div>
                    <p class="ortho-sub">Have you ever wondered why celebrities have such wonderful, beautiful smiles? You might have wondered if it's their natural smile, but they also have the same natural teeth as we do; unlike the common person, they have undergone cosmetic enhancements, like Cristiano Ronaldo.</p>
                    <p class="ortho-sub" style="margin-top:16px;">At our dental clinic in Bhowanipore, Bengali film actress Koel Mallick has also undergone cosmetic dental treatment to enhance her smile, and worry not; we have the same treatment plan for you.</p>
                    <p class="ortho-sub" style="margin-top:16px;">Our Cosmetic dentist at Dontia Care Clinic-Dental helps retain your confidence in your smile by improving your tooth form through groundbreaking cosmetic dental treatments. Our dental doctors specialise in customising treatment to suit the needs of diverse patients, such as refined or comprehensive enhancements, to deliver sustained, relevant outcomes.</p>
                </div>
                <div class="cos-media">
                    <img src="<?php echo htmlspecialchars($hero_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Koel Mallick with dentist at Dontia Care Clinic in Kolkata" width="640" height="480" decoding="async" fetchpriority="high">
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec cos-sec-alt">
        <div class="container">
            <div class="ortho-grid-2">
                <div class="cos-media">
                    <img src="<?php echo htmlspecialchars($modern_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Modern cosmetic dentistry and clear aligners treatment in Kolkata" loading="lazy" decoding="async" width="640" height="480">
                </div>
                <div>
                    <h2>Modern Cosmetic Dentistry and a Confident Smile</h2>
                    <p class="ortho-sub">Your teeth get noticed when you smile. A properly aligned and bright set of teeth gives confidence to smile wholeheartedly. We offer cosmetic dental services to cater to such needs. Our experts specialise in treating discolouration, filling gaps, and treating irregular teeth to restore your natural appearance.</p>
                    <p class="ortho-sub" style="margin-top:14px;">What positions us uniquely in the market is a balanced use of leading-edge dental technology like Digital Smile &amp; 3D scanning and tailored treatment to enable you to regain your usual smile.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Testimonial Videos</h2>
                <p>See real patient journeys and smile transformations from Dontia Care Clinic-Dental.</p>
            </div>
            <div class="cos-video-grid" id="cosVideoGrid">
                <?php foreach ($cos_videos as $vid) {
                    $thumb = 'https://img.youtube.com/vi/' . $vid['video_id'] . '/hqdefault.jpg';
                ?>
                <article class="cos-video-card" data-video-id="<?php echo htmlspecialchars($vid['video_id'], ENT_QUOTES, 'UTF-8'); ?>" tabindex="0" role="button" aria-label="Play <?php echo htmlspecialchars($vid['title'], ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="cos-video-thumb">
                        <img src="<?php echo htmlspecialchars($thumb, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($vid['title'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async" width="480" height="270">
                        <span class="cos-video-play" aria-hidden="true">&#9658;</span>
                    </div>
                    <h3><?php echo htmlspecialchars($vid['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="ortho-sec cos-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Our Cosmetic Dental Services</h2>
                <p>From whitening to full smile makeovers — treatments designed for a natural, confident look.</p>
            </div>
            <div class="ortho-grid-2" style="margin-bottom:22px;align-items:stretch;">
                <div class="cos-media">
                    <img src="<?php echo htmlspecialchars($services_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Cosmetic dental services in Kolkata" loading="lazy" decoding="async" width="640" height="480">
                </div>
                <div class="cos-media">
                    <img src="<?php echo htmlspecialchars($laser_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Cosmetic laser treatment in Kolkata" loading="lazy" decoding="async" width="640" height="480">
                </div>
            </div>
            <div class="cos-svc-grid">
                <article class="cos-svc-card">
                    <h3>Teeth Whitening</h3>
                    <p>Deep stains prevent you from smiling. We respond with services that can remove stains from tea, coffee, smoking, drinking, tobacco consumption, and the ageing factor. What is noticeably good about us is that one appointment is enough for you to regain your confident smile.</p>
                </article>
                <article class="cos-svc-card">
                    <h3>Laminates or Dental Veneers vs Lumineers</h3>
                    <p>Teeth can appear brighter and well-aligned if veneers are applied to them. Lumineers also produce such effects, but last less and are simpler to apply than veneers or laminates. Lumineers has its advantages over veneers; enamel is not shaved while applying them. At Dontia Care Clinic-Dental in Kolkata, we ensure a perfect, unified fit for a natural appearance by capturing digital footprints.</p>
                </article>
                <article class="cos-svc-card">
                    <h3>Dental Bonding &amp; Clear Aligners</h3>
                    <p>Our experienced doctors are known for offering a quick remedy for uneven, chipped, or cracked teeth using advanced dental bonding. The bonding process includes the use of a tooth-coloured composite resin. We also use metal braces or orthodontic treatment for teeth straightening. We also provide clear aligners or Invisalign treatment services in Kolkata, ensuring a seamless, normal day-to-day life for a person.</p>
                </article>
                <article class="cos-svc-card">
                    <h3>Smile Designing or Smile Makeover</h3>
                    <p>We provide smile makeover design services for people seeking to transform the appearance of their teeth. This service includes cosmetic procedures, such as veneers and bonding, to give your smile a complete overhaul. Our treatment is for patients with different skin and facial textures.</p>
                </article>
                <article class="cos-svc-card">
                    <h3>Dental Crown</h3>
                    <p>Those with weakened teeth shouldn’t worry anymore, as we offer advanced dental crown services that help restore the size, shape, and functionality of such teeth. It is a common assumption that crowns cannot match the natural colour. Fortunately, we ensure that the crown matches the natural colour of the teeth, guaranteeing a perfect and durable result. A crown is also applied when you have had root canal treatment.</p>
                </article>
                <article class="cos-svc-card">
                    <h3>Gum or Tooth Contouring</h3>
                    <p>Dentists utilise gum contouring to help people get rid of uneven or gummy smiles. Many patients prefer this service to see unbelievable results in the overall appearance of their teeth. This is a significantly less intrusive procedure to provide patients with a balanced and harmonious smile.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Why Choose Dontia Care Clinic-Dental?</h2>
                <p>World-class cosmetic care with honest consultation and transparent packages.</p>
            </div>
            <div class="ortho-doctor-layout">
                <div>
                    <article class="ortho-doctor-card">
                        <img class="ortho-doctor-photo" src="<?php echo htmlspecialchars($doctor_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Dr. Tanwee Saha — best cosmetic dentist in Kolkata" width="480" height="300" loading="lazy" decoding="async">
                        <h3>Dr. Tanwee Saha</h3>
                        <p>Best Cosmetic Dentist in Kolkata</p>
                    </article>
                </div>
                <aside class="ortho-doctor-note">
                    <h3>Why Choose Dontia Care Clinic-Dental?</h3>
                    <p>Because our experienced dentists specialise in cosmetic dental treatments. Moreover, the consultation process is fast, convenient, and honest, and treatment is world-class.</p>
                    <ul class="ortho-benefit-list">
                        <?php foreach ($cos_why as $point) { ?>
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

    <section class="ortho-sec cos-sec-alt">
        <div class="container">
            <div class="ortho-grid-2">
                <div>
                    <h2>Cosmetic Dentistry Leads to an Improved Life</h2>
                    <p class="ortho-sub">Dental cosmetic treatment is for people who want a complete solution for a full-fledged smile. Covering cracks with bonding or veneers not only gives you the confidence to smile but also protects your teeth from bacterial attacks.</p>
                    <p class="ortho-sub" style="margin-top:14px;">Our dental cosmetic services provide many with the best smile, giving them confidence to attend different events, such as interviews or life events like marriage functions, birthday parties, dates &amp; vacations, or outings.</p>
                </div>
                <div class="cos-media">
                    <img src="<?php echo htmlspecialchars($clinic_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Dontia Care Clinic cosmetic dentistry clinic in Kolkata" loading="lazy" decoding="async" width="640" height="480">
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <h2>Step-by-Step Treatment Process</h2>
            <p class="ortho-sub">It is fairly simple and easy to manage the treatment procedure for you. We offer treatment in a step-by-step procedure.</p>
            <ol class="cos-proc-steps">
                <?php foreach ($cos_process as $step) { ?>
                <li>
                    <strong><?php echo htmlspecialchars($step['title'], ENT_QUOTES, 'UTF-8'); ?></strong>
                    <span><?php echo htmlspecialchars($step['text'], ENT_QUOTES, 'UTF-8'); ?></span>
                </li>
                <?php } ?>
            </ol>
        </div>
    </section>

    <section class="ortho-sec cos-sec-alt">
        <div class="container">
            <div class="ortho-grid-2">
                <div class="cos-media">
                    <img src="<?php echo htmlspecialchars($who_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Dental veneer treatment — who is cosmetic dentistry for in Kolkata" loading="lazy" decoding="async" width="640" height="480">
                </div>
                <div>
                    <h2>Who Is Cosmetic Dentistry For?</h2>
                    <p class="ortho-sub">It is an ideal treatment choice for those who:</p>
                    <ul class="cos-who-grid">
                        <?php foreach ($cos_who as $item) { ?>
                        <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <h2>Cost of a Cosmetic Dental Treatment in Kolkata</h2>
            <p class="ortho-sub">The price package for cosmetic dental treatment can vary in Kolkata depending on the complexity of the problem and, therefore, the number of sessions necessary to fix it. Good news: at our best dental clinic in Kolkata, we maintain transparency by disclosing the package at the time of consultation with no hidden charges.</p>
            <p class="ortho-sub" style="margin-top:14px;">Our expert doctors assess the condition first before discussing the package tailored to your oral health needs. The good thing about us is that we try to keep the package affordable, making services accessible for many patients in Kolkata.</p>
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

    <section class="ortho-sec cos-sec-alt">
        <div class="container">
            <div class="ortho-cta-wrap">
                <div class="ortho-cta-card">
                    <h2>Book Your Cosmetic Dental Consultation Today</h2>
                    <p>Want to be among those who have already had a positive journey with us? You are just a consultation away from your confident smile at Dontia Care Clinic. Our experts will make this journey easy for your final smile. Contact us today by following the easy steps to book your consultation at our cosmetic dental clinic in Kolkata and learn how we can reassure you with a final smile through treatment tailored to your dental needs. Your everlasting and confident smile is just an appointment away.</p>
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
                <summary>When is Cosmetic Dentistry recommended?</summary>
                <p>Cosmetic dentistry is an option when your adult teeth have grown in completely, which is usually after the age of 18, if your gums and teeth are healthy.</p>
            </details>
            <details>
                <summary>How to select a suitable cosmetic dentist in Kolkata?</summary>
                <p>When you're visiting the best value Cosmetic Dentistry clinic in Kolkata, look for experience, before-and-after photos, a customized treatment plan, and effective communication.</p>
            </details>
            <details>
                <summary>How many days does it take for a smile makeover?</summary>
                <p>This could take as long as 1 day for whitening, or 2 – 3 weeks for veneers or a full makeover.</p>
            </details>
        </div>
    </section>

    <section class="ortho-sec cos-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h4>Certificates</h4>
                <p>Professional training that supports safe, high-standard cosmetic dental care.</p>
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
                <p>See what our patients say about Dontia Care Clinic.</p>
            </div>
            <div style="text-align:center;">
                <a class="ortho-btn ortho-btn-gold" href="https://maps.app.goo.gl/Ujpqv8hHVHVkWBeL9" target="_blank" rel="noopener noreferrer">View reviews on Google</a>
            </div>
        </div>
    </section>

    <section class="ortho-sec cos-sec-alt">
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

<div class="cos-video-modal" id="cosVideoModal" aria-hidden="true">
    <div class="cos-video-modal-inner">
        <button type="button" class="cos-video-modal-close" id="cosVideoModalClose" aria-label="Close video">&times;</button>
        <div id="cosVideoModalMount"></div>
    </div>
</div>

<script>
(function () {
    var modal = document.getElementById('cosVideoModal');
    var mount = document.getElementById('cosVideoModalMount');
    var closeBtn = document.getElementById('cosVideoModalClose');
    var grid = document.getElementById('cosVideoGrid');
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
        grid.addEventListener('click', function (e) {
            var card = e.target.closest('.cos-video-card');
            if (!card) { return; }
            openModal(card.getAttribute('data-video-id'));
        });
        grid.addEventListener('keydown', function (e) {
            if (e.key !== 'Enter' && e.key !== ' ') { return; }
            var card = e.target.closest('.cos-video-card');
            if (!card) { return; }
            e.preventDefault();
            openModal(card.getAttribute('data-video-id'));
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
