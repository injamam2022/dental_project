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
$dontia_dr_sizes_esc = htmlspecialchars('(max-width: 640px) min(94vw, 400px), min(500px, 50vw)', ENT_QUOTES, 'UTF-8');
$dontia_dr_resp_attrs = ' srcset="' . $dontia_dr_prabhjeet_srcset . '" sizes="' . $dontia_dr_sizes_esc . '"';

$tmj_img_dir = defined('FCPATH') ? FCPATH . 'assets/images/tmj/' : '';
$tmj_ext_ok = array('jpg' => true, 'jpeg' => true, 'png' => true, 'webp' => true);
$tmj_files = array();
if ($tmj_img_dir !== '' && is_dir($tmj_img_dir)) {
    foreach (scandir($tmj_img_dir) as $_tmj_fn) {
        if ($_tmj_fn === '.' || $_tmj_fn === '..') {
            continue;
        }
        $_ext = strtolower(pathinfo($_tmj_fn, PATHINFO_EXTENSION));
        if (!isset($tmj_ext_ok[$_ext])) {
            continue;
        }
        $tmj_files[] = $_tmj_fn;
    }
    sort($tmj_files, SORT_NATURAL);
}
$tmj_youtube_id = 'dszEUoxTmKk';
$tmj_youtube_list = 'PLFAPmv-L_bnYlz18NK5mEEzPaVN_a9umj';
$tmj_embed = 'https://www.youtube-nocookie.com/embed/' . rawurlencode($tmj_youtube_id)
    . '?list=' . rawurlencode($tmj_youtube_list)
    . '&rel=0&autoplay=1&mute=1&playsinline=1';
?>
<style>
.tmj-page{overflow-x:hidden}
.tmj-page .container{max-width:min(1140px,94vw);width:100%;margin:0 auto;padding-left:max(16px,env(safe-area-inset-left,0px));padding-right:max(16px,env(safe-area-inset-right,0px));box-sizing:border-box}
.tmj-page .tmj-hero{position:relative;padding:48px 0 56px;background:linear-gradient(165deg,#1a120e 0%,#2d1810 45%,#1f1512 100%);overflow:hidden}
.tmj-page .tmj-hero::before{content:"";position:absolute;inset:0;background:radial-gradient(ellipse 80% 50% at 50% 0%,rgba(173,140,128,.12),transparent 55%);pointer-events:none}
.tmj-page .tmj-hero-inner{position:relative;z-index:2;text-align:center;max-width:960px;margin:0 auto;padding:0 16px}
.tmj-page .tmj-hero h1{color:#fff!important;margin:0 0 10px;font-size:clamp(26px,4.5vw,40px);line-height:1.2;text-shadow:0 2px 14px rgba(0,0,0,.55)}
.tmj-page .tmj-hero-lead{margin:0 0 28px;color:#fff!important;font-size:clamp(15px,2.2vw,18px);line-height:1.55;text-shadow:0 1px 8px rgba(0,0,0,.45)}
.tmj-page .tmj-hero-video-wrap{width:100%;max-width:880px;margin:0 auto}
.tmj-page .tmj-hero-video-aspect{position:relative;padding-bottom:56.25%;height:0;border-radius:12px;overflow:hidden;box-shadow:0 16px 48px rgba(0,0,0,.45);border:1px solid rgba(255,248,240,.12)}
.tmj-page .tmj-hero-video-aspect iframe{position:absolute;left:0;top:0;width:100%;height:100%;border:0}
.tmj-page .tmj-hero-yt-facade{position:absolute;left:0;top:0;width:100%;height:100%;margin:0;padding:0;border:0;cursor:pointer;background:#0a0a0a center/cover no-repeat;border-radius:12px}
.tmj-page .tmj-hero-yt-facade:focus{outline:2px solid rgba(255,248,240,.75);outline-offset:-2px}
.tmj-page .tmj-hero-yt-play{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:64px;height:44px;border:0;border-radius:10px;background:rgba(0,0,0,.62);color:#fff;font-size:20px;line-height:1;cursor:pointer;box-shadow:0 6px 24px rgba(0,0,0,.45);pointer-events:none}
.tmj-page .tmj-hero-yt-facade:hover .tmj-hero-yt-play,.tmj-page .tmj-hero-yt-facade:focus .tmj-hero-yt-play{background:rgba(173,140,128,.95);color:#1a120e}
.tmj-page .ortho-sec{padding:52px 0}
.tmj-page .ortho-sec h2,.tmj-page .ortho-sec h3,.tmj-page .ortho-sec h4{margin:0 0 14px}
.tmj-page .ortho-sub{font-size:18px;line-height:1.78;color:#3a3836}
.tmj-page .ortho-grid-2{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:22px}
.tmj-page .ortho-card{background:#fff;border-radius:12px;padding:20px;box-shadow:0 8px 22px rgba(49,19,0,.08);border:1px solid #ece6df;height:100%}
.tmj-page .ortho-card img{width:100%;height:180px;object-fit:cover;border-radius:8px;margin-bottom:10px}
.tmj-page .ortho-section-head{text-align:center;margin-bottom:24px}
.tmj-page .ortho-section-head p{margin:8px auto 0;color:#4a4540;max-width:720px;line-height:1.65}
.tmj-page .tmj-why-list,.tmj-page .tmj-symptom-list,.tmj-page .tmj-cause-list{list-style:none;padding:0;margin:14px 0 0;display:grid;gap:10px}
.tmj-page .tmj-why-list li,.tmj-page .tmj-symptom-list li,.tmj-page .tmj-cause-list li{margin:0;background:#fff;border:1px solid #ece6df;border-radius:10px;padding:12px 14px 12px 40px;line-height:1.65;position:relative;box-shadow:0 4px 14px rgba(0,0,0,.05)}
.tmj-page .tmj-why-list li::before,.tmj-page .tmj-symptom-list li::before,.tmj-page .tmj-cause-list li::before{content:"";position:absolute;left:14px;top:16px;width:10px;height:10px;border-radius:50%;background:linear-gradient(135deg,#7a5140 0%,#5b2f1d 100%)}
.tmj-page .tmj-cost-table{width:100%;border-collapse:collapse;margin:18px 0 0;font-size:15px;background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 8px 22px rgba(49,19,0,.08);border:1px solid #ece6df}
.tmj-page .tmj-cost-table th,.tmj-page .tmj-cost-table td{padding:14px 16px;text-align:left;border-bottom:1px solid #eee8e0}
.tmj-page .tmj-cost-table th{background:#f4efea;color:#3d2a22;font-weight:700}
.tmj-page .tmj-cost-table tr:last-child td{border-bottom:0}
.tmj-page .tmj-gallery-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px;margin-top:8px}
.tmj-page .tmj-gallery-card{background:#fff;border-radius:12px;overflow:hidden;border:1px solid #ece6df;box-shadow:0 10px 26px rgba(49,19,0,.1)}
.tmj-page .tmj-gallery-card img{width:100%;height:240px;object-fit:cover;display:block}
.tmj-page .tmj-gallery-card figcaption{padding:12px 14px;font-size:14px;line-height:1.5;color:#4a4540}
.tmj-page .tmj-doctor-layout{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:28px;align-items:stretch;max-width:1000px;margin:26px auto 0}
.tmj-page .tmj-doctor-col{min-width:0}
.tmj-page .tmj-doctor-strip{display:flex;flex-direction:column;gap:18px}
.tmj-page .tmj-doctor-aside{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:22px 24px 24px;box-shadow:0 10px 26px rgba(49,19,0,.08);display:flex;flex-direction:column;text-align:left;gap:14px}
.tmj-page .tmj-doctor-aside h3{margin:0;font-size:clamp(20px,2.6vw,24px);line-height:1.25;color:#2a2420}
.tmj-page .tmj-doctor-aside .tmj-aside-lead{margin:0;color:#4a4540;font-size:15px;line-height:1.7}
.tmj-page .tmj-doctor-aside ul{margin:0;padding-left:1.15rem;color:#4a4540;font-size:15px;line-height:1.7}
.tmj-page .tmj-doctor-aside li{margin-bottom:6px}
.tmj-page .tmj-doctor-aside li:last-child{margin-bottom:0}
.tmj-page .tmj-doctor-aside .tmj-doctor-aside-cta{margin-top:4px}
.tmj-page .tmj-doctor-card{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:16px;box-shadow:0 10px 24px rgba(0,0,0,.07);text-align:center}
.tmj-page .tmj-doctor-card img{width:100%;height:260px;object-fit:cover;object-position:center 20%;border-radius:10px;margin-bottom:10px;display:block}
.tmj-page .tmj-doctor-card h3{margin:0 0 6px;font-size:18px}
.tmj-page .tmj-doctor-card p{margin:0;color:#5a534c;font-size:15px;line-height:1.55}
.tmj-page .ortho-cert-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px}
.tmj-page .ortho-cert-card{background:#fff;border:1px solid #ece6df;border-radius:12px;padding:12px;box-shadow:0 8px 20px rgba(0,0,0,.07)}
.tmj-page .ortho-cert-card img{width:100%;height:200px;object-fit:contain;background:#f7f6f3;border-radius:8px}
.tmj-page .ortho-cta-wrap{max-width:900px;margin:0 auto}
.tmj-page .ortho-cta-card{background:linear-gradient(135deg,#fff 0%,#f7f4ef 100%);border:1px solid #e9e2d8;border-radius:14px;padding:26px 24px;box-shadow:0 10px 24px rgba(0,0,0,.08)}
.tmj-page .ortho-btn{display:inline-flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#7a5140 0%,#5b2f1d 100%);color:#fff;padding:12px 22px;border-radius:999px;font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;border:0;box-shadow:0 8px 20px rgba(91,47,29,.28);text-decoration:none}
.tmj-page .ortho-btn:hover,.tmj-page .ortho-btn:focus{color:#fff;text-decoration:none}
.tmj-page .implant-sec-warmalt{background:#f8fbff}
.tmj-page .ortho-note{font-weight:700;color:#1f6fd0}
@media (max-width:900px){
.tmj-page .ortho-grid-2,.tmj-page .tmj-gallery-grid,.tmj-page .ortho-cert-grid{grid-template-columns:1fr}
.tmj-page .tmj-doctor-layout{grid-template-columns:1fr;gap:22px}
.tmj-page .tmj-gallery-card img{height:220px}
}
@media (max-width:768px){
.tmj-page .ortho-sub{color:#3a3836!important}
.tmj-page .ortho-section-head p{color:#2f2b28!important}
.tmj-page .tmj-doctor-aside .tmj-aside-lead{color:#3a3836!important}
.tmj-page .tmj-doctor-aside ul{color:#3a3836!important}
.tmj-page .implant-sec-warmalt{background:linear-gradient(180deg,#f3ece6 0%,#e8e0d8 100%)}
.tmj-page .tmj-hero{padding:36px 0 40px}
}
</style>

<div class="ortho-page tmj-page">
    <section class="tmj-hero">
        <div class="tmj-hero-inner">
            <h1>Best TMJ Specialist in Kolkata, India</h1>
            <p class="tmj-hero-lead">Expert assessment and treatment for jaw pain, clicking, headaches, and TMJ disorders — conservative-first care at Dontia Care Clinic.</p>
            <div class="tmj-hero-video-wrap">
                <div class="tmj-hero-video-aspect">
                    <button type="button" class="tmj-hero-yt-facade" id="tmjHeroYoutubeFacade" data-embed="<?php echo htmlspecialchars($tmj_embed, ENT_QUOTES, 'UTF-8'); ?>" style="background-image:url(https://i.ytimg.com/vi/<?php echo htmlspecialchars($tmj_youtube_id, ENT_QUOTES, 'UTF-8'); ?>/hqdefault.jpg)" aria-label="Play TMJ information video">
                        <span class="tmj-hero-yt-play" aria-hidden="true">&#9654;</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <p class="ortho-sub">If you need the <strong>best TMJ specialist in Kolkata</strong> for jaw clicking, oral discomfort, persistent headaches, popping sounds in the ears, tooth pain, or bite problems, Dontia Care Clinic is here to help. TMJ disorder can affect your temporomandibular joint over time — early assessment and a clear plan often make recovery smoother.</p>
        </div>
    </section>

    <section class="ortho-sec implant-sec-warmalt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Why we are among the best TMJ clinics in Kolkata</h2>
                <p>Experienced specialists, advanced diagnostics, and treatment paths tailored to you.</p>
            </div>
            <h3>Experienced TMJ specialists</h3>
            <p class="ortho-sub" style="margin-top:8px;">Under the leadership of <strong>Dr. Prabhjeet Singh Sethi</strong> — Dawson Certified with 25+ years of experience — our team focuses on accurate diagnosis and predictable, jaw-friendly outcomes. We combine deep insight into TMJ dysfunction with modern restorative and occlusal principles.</p>
            <h3 style="margin-top:28px;">Comprehensive treatment plans</h3>
            <p class="ortho-sub" style="margin-top:8px;">We look for the underlying drivers of your symptoms using updated clinical and imaging tools where appropriate, then design a plan that may include medication, splint therapy, physiotherapy, lifestyle guidance, and — only when necessary — referral for surgical options.</p>
            <h3 style="margin-top:28px;">Technology for accurate diagnosis</h3>
            <p class="ortho-sub" style="margin-top:8px;">Our clinic uses contemporary digital records, imaging, and bite analysis as indicated so your TMJ specialist can explain findings clearly and track progress over time.</p>
            <h3 style="margin-top:28px;">Compassionate, conservative-first care</h3>
            <p class="ortho-sub" style="margin-top:8px;">Most patients prefer non-invasive options first. We emphasise splints and night guards where appropriate, therapeutic modalities (such as TENS where suitable, jaw physiotherapy, and selected cases of Botox for TMJ), and stress-related support when anxiety amplifies symptoms.</p>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <h2>What is TMJ?</h2>
            <p class="ortho-sub">The <strong>temporomandibular joint (TMJ)</strong> is the hinge that connects your jaw to your skull. Disorders of this joint and the muscles around it (often called <strong>TMD</strong>) can disrupt chewing, speaking, sleep, and daily comfort.</p>
            <h3 style="margin-top:26px;">Common symptoms of TMJ disorder</h3>
            <ul class="tmj-symptom-list">
                <li>Clicking or popping of the jaw</li>
                <li>Difficulty opening the mouth wide</li>
                <li>Headaches and jaw pain</li>
                <li>Ear fullness, ringing, or ear-related discomfort</li>
                <li>Soreness or changes in how teeth meet</li>
                <li>Eye strain or irritation in some cases</li>
                <li>Jaw locking or fatigue when chewing</li>
            </ul>
            <h3 style="margin-top:28px;">Causes and contributing factors</h3>
            <ul class="tmj-cause-list">
                <li>Trauma or impact to the jaw or joint</li>
                <li>Arthritis affecting the joint</li>
                <li>Myofascial pain and muscle overload</li>
                <li>Internal derangement of the disc</li>
                <li>Stress, clenching, and bruxism</li>
                <li>Bite and alignment factors</li>
                <li>Associated conditions such as fibromyalgia or sleep disturbance in some patients</li>
            </ul>
        </div>
    </section>

    <section class="ortho-sec implant-sec-warmalt">
        <div class="container">
            <h2>Indicative TMJ treatment costs (Kolkata)</h2>
            <p class="ortho-sub" style="margin-bottom:6px;">Fees vary with complexity and materials; your doctor will confirm costs after examination.</p>
            <table class="tmj-cost-table">
                <thead>
                    <tr><th>Type of service</th><th>Estimated range</th></tr>
                </thead>
                <tbody>
                    <tr><td>Primary consultation and diagnosis</td><td>₹800 – ₹1,200</td></tr>
                    <tr><td>Occlusal splint or night guard</td><td>₹4,000 – ₹8,000</td></tr>
                    <tr><td>TMJ physiotherapy packages</td><td>₹8,000 – ₹15,000</td></tr>
                    <tr><td>Surgical or advanced interventions</td><td>Custom pricing after assessment</td></tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <h2>Our TMJ treatment options in Kolkata</h2>
            <h3 style="margin-top:22px;">Non-surgical TMJ treatments</h3>
            <ul class="tmj-why-list">
                <li><strong>Physical therapy &amp; exercises</strong> — guided stretching and strengthening to improve mobility and reduce pain.</li>
                <li><strong>Night guards / splints</strong> — custom appliances to protect teeth and reduce joint loading from grinding.</li>
                <li><strong>Medications</strong> — short-term anti-inflammatory or muscle-relaxant protocols when appropriate, always with your medical history in mind.</li>
                <li><strong>CBT and stress support</strong> — when anxiety and habits drive symptoms, we align care with counselling referrals as needed.</li>
            </ul>
            <h3 style="margin-top:28px;">Surgical and advanced options (when indicated)</h3>
            <ul class="tmj-why-list">
                <li><strong>Arthrocentesis</strong> — minimally invasive joint lavage in selected cases.</li>
                <li><strong>Arthroscopy</strong> — keyhole visualisation and treatment where specialist referral and hospital care are required.</li>
                <li><strong>Joint replacement</strong> — only in severe, end-stage disease under a dedicated surgical team.</li>
            </ul>
            <h3 style="margin-top:28px;">Innovative options for symptom relief</h3>
            <ul class="tmj-why-list">
                <li><strong>Botox for TMJ</strong> — in selected muscle-overload cases to reduce pain and tension.</li>
                <li><strong>Laser-assisted therapies</strong> — where our protocol supports soft-tissue healing and comfort.</li>
            </ul>
        </div>
    </section>

    <section class="ortho-sec implant-sec-warmalt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Why choose Dontia Care Clinic for TMJ?</h2>
                <p>Top TMJ-focused dentists in Kolkata, transparent discussions on cost, and help navigating insurance where your plan allows.</p>
            </div>
            <div class="ortho-grid-2">
                <div class="ortho-card">
                    <h4>Top TMJ specialists</h4>
                    <p class="ortho-sub" style="font-size:16px;margin:0;">Years of experience managing jaw pain, occlusion, and complex bite cases — so you get a plan that fits your life, not a one-size-fits-all template.</p>
                </div>
                <div class="ortho-card">
                    <h4>Affordable, explained pricing</h4>
                    <p class="ortho-sub" style="font-size:16px;margin:0;">We discuss fees and stages of treatment clearly. Many patients use insurance for portions of care; we guide you on what questions to ask your insurer.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Our doctors caring for TMJ patients</h2>
                <p>Clinical examination, splint therapy, and coordinated TMJ management at our Kolkata locations.</p>
            </div>
            <div class="tmj-doctor-layout">
                <div class="tmj-doctor-col">
                    <div class="tmj-doctor-strip">
                        <?php
                        $tmj_dr_shown = 0;
                        if (count($doctors) > 0) {
                            foreach ($doctors as $dr) {
                                if ($tmj_dr_shown >= 2) {
                                    break;
                                }
                                if (!isset($dr->doctor_name) || trim((string) $dr->doctor_name) === '') {
                                    continue;
                                }
                                $dimg = !empty($dr->image_name)
                                    ? site_url('admin/webroot/uploads/doctors/' . $dr->image_name)
                                    : $dontia_dr_prabhjeet_photo;
                                $tmj_dr_shown++;
                                $tmj_dr_srcset_attr = (strpos($dimg, '/dr-prabhjeet-tmj-') !== false) ? $dontia_dr_resp_attrs : '';
                                $tmj_dr_img_attr = ($tmj_dr_shown === 1)
                                    ? ' width="360" height="291" decoding="async" fetchpriority="high"'
                                    : ' loading="lazy" decoding="async"';
                        ?>
                        <article class="tmj-doctor-card">
                            <img src="<?php echo htmlspecialchars($dimg, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars((string) $dr->doctor_name, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $tmj_dr_srcset_attr . $tmj_dr_img_attr; ?>>
                            <h3><?php echo htmlspecialchars((string) $dr->doctor_name, ENT_QUOTES, 'UTF-8'); ?></h3>
                            <p><?php echo htmlspecialchars(isset($dr->designation) ? (string) $dr->designation : 'TMJ &amp; restorative dentistry', ENT_QUOTES, 'UTF-8'); ?></p>
                        </article>
                        <?php
                            }
                        }
                        if ($tmj_dr_shown === 0) { ?>
                        <article class="tmj-doctor-card">
                            <img src="<?php echo htmlspecialchars($dontia_dr_prabhjeet_photo, ENT_QUOTES, 'UTF-8'); ?>" alt="Dr. Prabhjeet Singh Sethi — TMJ specialist Kolkata"<?php echo $dontia_dr_resp_attrs; ?> width="360" height="291" decoding="async" fetchpriority="high">
                            <h3>Dr. Prabhjeet Singh Sethi</h3>
                            <p>Dawson Certified — TMJ, occlusion, and full-mouth rehabilitation.</p>
                        </article>
                        <?php } ?>
                    </div>
                </div>
                <aside class="tmj-doctor-aside" aria-labelledby="tmj-aside-heading">
                    <h3 id="tmj-aside-heading">Plan your TMJ visit with us</h3>
                    <p class="tmj-aside-lead">Whether your symptoms are new or longstanding, your first appointment focuses on listening to your concerns, examining the jaw joints and bite, and mapping sensible next steps—often starting with conservative care such as splints, medication, or guided physiotherapy.</p>
                    <p class="tmj-aside-lead">Our team coordinates splint therapy and follow-up visits across our Kolkata locations so you know what to expect at each stage.</p>
                    <ul>
                        <li>Detailed jaw joint and occlusion review</li>
                        <li>Discussion of imaging when it adds clinical value</li>
                        <li>Clear explanation of splint vs. therapeutic options</li>
                        <li>Same-day pointers for pain relief and jaw rest at home</li>
                    </ul>
                    <div class="tmj-doctor-aside-cta">
                        <a class="ortho-btn" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal">Book consultation</a>
                    </div>
                </aside>
            </div>

            <?php if (count($tmj_files) > 0) { ?>
            <h3 style="margin-top:36px;text-align:center;">TMJ care at our clinic</h3>
            <p class="ortho-sub" style="text-align:center;max-width:640px;margin:10px auto 0;">Photos from TMJ assessment and treatment visits in Kolkata.</p>
            <div class="tmj-gallery-grid">
                <?php
                foreach ($tmj_files as $_tmj_fn) {
                    $_url = base_url('assets/images/tmj/' . rawurlencode($_tmj_fn));
                    $_cap = 'TMJ treatment and specialist care — Dontia Care Clinic, Kolkata';
                    if (stripos($_tmj_fn, 'prabhjeet') !== false || stripos($_tmj_fn, 'examing') !== false || stripos($_tmj_fn, 'examining') !== false) {
                        $_cap = 'TMJ specialist examining a patient — jaw pain and joint assessment in Kolkata.';
                    } elseif (stripos($_tmj_fn, 'treatment done') !== false || stripos($_tmj_fn, 'treatment in kolkata') !== false) {
                        $_cap = 'TMJ patient care and follow-up at our dental clinic in Kolkata.';
                    }
                ?>
                <figure class="tmj-gallery-card">
                    <img src="<?php echo htmlspecialchars($_url, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($_cap, ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                    <figcaption><?php echo htmlspecialchars($_cap, ENT_QUOTES, 'UTF-8'); ?></figcaption>
                </figure>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </section>

    <section class="ortho-sec implant-sec-warmalt">
        <div class="container">
            <h3>Advanced technology</h3>
            <div class="ortho-grid-2" style="margin-top:16px;">
                <?php foreach ($tech_cards as $tc) { ?>
                <article class="ortho-card">
                    <img src="<?php echo htmlspecialchars((string) $tc['image_url'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars((string) $tc['title'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                    <h4><?php echo htmlspecialchars((string) $tc['title'], ENT_QUOTES, 'UTF-8'); ?></h4>
                    <p class="ortho-sub" style="font-size:16px;margin:0;"><?php echo htmlspecialchars((string) $tc['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-cta-wrap">
                <div class="ortho-cta-card">
                    <h2>Book your TMJ consultation today</h2>
                    <p class="ortho-sub" style="font-size:17px;margin:0 0 18px;">Jaw pain, headaches, or clicking? Schedule a visit with our TMJ team in Kolkata. Call us or use the booking button below.</p>
                    <a class="ortho-btn" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal">Book appointment</a>
                    <p style="margin-top:14px;margin-bottom:0;"><a href="<?php echo base_url('contact-us'); ?>" class="ortho-note">Contact us</a> for directions and hours.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec implant-sec-warmalt">
        <div class="container">
            <div class="ortho-section-head">
                <h4>Certificates &amp; training</h4>
                <p>Professional credentials that support safe, high-standard TMJ and implant-related care.</p>
            </div>
            <div class="ortho-cert-grid">
                <?php if (count($certs) > 0) {
                    foreach (array_slice($certs, 0, 6) as $ci) {
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
            <h4>Blogs</h4>
            <div class="ortho-grid-2" style="margin-top:14px;">
                <?php if (count($blogs) > 0) {
                    foreach (array_slice($blogs, 0, 4) as $b) {
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
                <article class="ortho-card"><p class="ortho-sub" style="margin:0;">Blog posts will appear here when published from admin.</p></article>
                <?php } ?>
            </div>
        </div>
    </section>
</div>

<script>
(function () {
	var btn = document.getElementById('tmjHeroYoutubeFacade');
	if (!btn) return;
	var embed = btn.getAttribute('data-embed');
	if (!embed) return;
	function mountIframe() {
		var aspect = btn.parentNode;
		if (!aspect) return;
		var iframe = document.createElement('iframe');
		iframe.src = embed;
		iframe.setAttribute('title', 'TMJ and jaw health — Dontia Care Clinic, Kolkata');
		iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
		iframe.setAttribute('allowfullscreen', '');
		iframe.setAttribute('loading', 'eager');
		iframe.style.cssText = 'position:absolute;left:0;top:0;width:100%;height:100%;border:0';
		aspect.replaceChild(iframe, btn);
	}
	btn.addEventListener('click', mountIframe);
	btn.addEventListener('keydown', function (e) {
		if (e.key === 'Enter' || e.key === ' ') {
			e.preventDefault();
			mountIframe();
		}
	});
})();
</script>

<?php $this->load->view('include/footer/footer'); ?>
<?php $this->load->view('include/modal_master/modal_master'); ?>
