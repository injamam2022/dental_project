<?php
$this->load->view('include/header/header');
$doctors = isset($doctor_list) && is_array($doctor_list) ? $doctor_list : array();
$tech_cards = isset($technology_cards) && is_array($technology_cards) ? $technology_cards : array();
$before_after = isset($media_before_after) && is_array($media_before_after) ? $media_before_after : array();
$uploaded_ba_images = array(
    base_url('assets/images/orthodontist/braces-before-after-1.png'),
    base_url('assets/images/orthodontist/braces-before-after-2.png'),
);
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
?>
<style>
.ortho-page .ortho-hero{position:relative;min-height:560px;display:flex;align-items:center;justify-content:center;overflow:hidden;background:#111 url('<?php echo base_url('assets/images/orthodontist/braces-before-after-2.png'); ?>') center center/contain no-repeat}
.ortho-page .ortho-hero::before{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(0,0,0,.4) 0%,rgba(0,0,0,.55) 100%)}
.ortho-page .ortho-hero h1{position:relative;z-index:2;color:#fff !important;text-align:center;font-size:42px;line-height:1.25;margin:0 15px;max-width:980px;padding:14px 20px;background:rgba(0,0,0,.35);border-radius:8px;text-shadow:0 2px 10px rgba(0,0,0,.65)}
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
.ortho-page .ortho-doctor-note h3{margin:0 0 12px;font-size:36px;line-height:1.15}
.ortho-page .ortho-doctor-note p{margin:0 0 10px;color:#4b4b4b;line-height:1.7}
.ortho-page .ortho-list{padding-left:18px}
.ortho-page .ortho-list li{margin-bottom:10px}
.ortho-page .ortho-service-bullets{list-style:none;padding:0;margin:14px 0 0;display:grid;gap:12px}
.ortho-page .ortho-service-bullets li{position:relative;background:#fff;border:1px solid #ece6df;border-radius:10px;padding:12px 14px 12px 42px;box-shadow:0 6px 14px rgba(0,0,0,.06);margin:0}
.ortho-page .ortho-service-bullets li::before{content:"";position:absolute;left:16px;top:18px;width:12px;height:12px;border-radius:50%;background:linear-gradient(135deg,#7a5140 0%,#5b2f1d 100%);box-shadow:0 0 0 4px rgba(122,81,64,.15)}
.ortho-page .ortho-benefit-list{list-style:none;padding:0;margin:14px 0 0;display:grid;gap:12px}
.ortho-page .ortho-benefit-list li{position:relative;background:#fff;border:1px solid #ece6df;border-radius:10px;padding:12px 14px 12px 42px;box-shadow:0 6px 14px rgba(0,0,0,.06);margin:0;line-height:1.7}
.ortho-page .ortho-benefit-list li::before{content:"";position:absolute;left:16px;top:18px;width:12px;height:12px;border-radius:50%;background:linear-gradient(135deg,#6f5ab5 0%,#4a3b8e 100%);box-shadow:0 0 0 4px rgba(111,90,181,.14)}
.ortho-page .ortho-why-wrap{max-width:980px;margin:0 auto}
.ortho-page .ortho-why-card{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:24px 24px 18px;box-shadow:0 10px 24px rgba(0,0,0,.07)}
.ortho-page .ortho-why-list{list-style:none;padding:0;margin:14px 0 0;display:grid;gap:12px}
.ortho-page .ortho-why-list li{position:relative;margin:0;background:#faf8f4;border:1px solid #eee8df;border-radius:10px;padding:12px 14px 12px 42px;line-height:1.7}
.ortho-page .ortho-why-list li::before{content:"";position:absolute;left:16px;top:18px;width:12px;height:12px;border-radius:50%;background:linear-gradient(135deg,#7a5140 0%,#5b2f1d 100%);box-shadow:0 0 0 4px rgba(122,81,64,.12)}
.ortho-page .ortho-note{font-weight:700;color:#1f6fd0}
.ortho-page .ortho-ba-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:22px}
.ortho-page .ortho-ba-card{background:#fff;border-radius:12px;padding:14px;box-shadow:0 8px 20px rgba(0,0,0,.08)}
.ortho-page .ortho-ba-card img{width:100%;display:block;border-radius:8px}
.ortho-page .ortho-ba-card--full img{height:360px;object-fit:contain;object-position:center;background:#f4f6f9}
.ortho-page .ortho-ba-pair{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}
.ortho-page .ortho-ba-pair img{height:230px;object-fit:cover;object-position:center top}
.ortho-page .ortho-cert-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:20px}
.ortho-page .ortho-cert-card{background:#fff;border:1px solid #ece6df;border-radius:12px;padding:14px;box-shadow:0 10px 20px rgba(0,0,0,.08);transition:transform .2s ease,box-shadow .2s ease}
.ortho-page .ortho-cert-card:hover{transform:translateY(-3px);box-shadow:0 14px 24px rgba(0,0,0,.12)}
.ortho-page .ortho-cert-card img{width:100%;height:220px;object-fit:contain;object-position:center;background:#f7f6f3;border-radius:8px;display:block}
.ortho-page .ortho-cta-wrap{max-width:920px;margin:0 auto}
.ortho-page .ortho-cta-card{
background:linear-gradient(135deg,#ffffff 0%,#f7f4ef 100%);
border:1px solid #e9e2d8;
border-radius:14px;
padding:28px 30px;
box-shadow:0 10px 24px rgba(0,0,0,.08);
}
.ortho-page .ortho-cta-card h4{margin:0 0 12px}
.ortho-page .ortho-cta-card p{margin:0 0 18px;color:#4f4b46;line-height:1.7;max-width:760px}
.ortho-page .ortho-faq{max-width:980px;margin:0 auto}
.ortho-page .ortho-faq details{
border:1px solid #ebe8e2;
border-radius:8px;
padding:0;
margin-bottom:10px;
background:#f7f6f3;
overflow:hidden;
}
.ortho-page .ortho-faq summary{
cursor:pointer;
font-weight:700;
padding:13px 16px;
list-style:revert;
}
.ortho-page .ortho-faq summary::-webkit-details-marker{display:inline-block}
.ortho-page .ortho-faq details p{
margin:0;
padding:0 16px 14px 34px;
color:#4f4b46;
line-height:1.7;
background:#fff;
border-top:1px solid #ece7df;
}
.ortho-page .ortho-btn{
display:inline-flex;
align-items:center;
justify-content:center;
background:linear-gradient(135deg,#7a5140 0%,#5b2f1d 100%);
color:#fff;
padding:12px 24px;
border-radius:999px;
font-size:13px;
font-weight:700;
letter-spacing:.08em;
text-transform:uppercase;
border:0;
box-shadow:0 8px 20px rgba(91,47,29,.28);
transition:transform .2s ease,box-shadow .2s ease,opacity .2s ease;
}
.ortho-page .ortho-btn:hover,
.ortho-page .ortho-btn:focus{
color:#fff;
text-decoration:none;
transform:translateY(-1px);
box-shadow:0 12px 24px rgba(91,47,29,.34);
}
.ortho-page .ortho-btn-gold{
background:linear-gradient(135deg,#c59a4d 0%,#b78333 100%);
box-shadow:0 8px 20px rgba(183,131,51,.28);
}
.ortho-page .ortho-btn-gold:hover,
.ortho-page .ortho-btn-gold:focus{
box-shadow:0 12px 24px rgba(183,131,51,.35);
}
@media (max-width:900px){.ortho-page .ortho-grid-2,.ortho-page .ortho-ba-grid,.ortho-page .ortho-doctor-layout,.ortho-page .ortho-cert-grid{grid-template-columns:1fr}.ortho-page .ortho-hero{min-height:420px;background-position:center top}.ortho-page .ortho-hero h1{font-size:30px;padding:10px 14px}.ortho-page .ortho-ba-card--full img{height:320px}.ortho-page .ortho-ba-pair img{height:200px}.ortho-page .ortho-doctor-grid{grid-template-columns:minmax(0,1fr)}.ortho-page .ortho-doctor-photo{height:220px;object-position:center 12%}.ortho-page .ortho-doctor-note h3{font-size:28px}.ortho-page .ortho-cta-card{padding:20px 18px}.ortho-page .ortho-why-card{padding:20px 16px}}
</style>

<div class="ortho-page">
    <section class="ortho-hero">
        <h1>Transform your Smile with the Best Orthodontist in Kolkata</h1>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <h2>Transform your Smile with the Best Orthodontist in Kolkata.</h2>
            <p class="ortho-sub">Do you have misaligned teeth and are facing a chewing or bite problem? The best solution is to straighten teeth. Want to find an effective way for the treatment? Then it is important to find out the best orthodontist in Kolkata who has the expertise to offer proper treatment and the best results. We always want perfectly aligned teeth for you. The experienced and well-trained team of good orthodontists in Kolkata can design a personalized treatment plan for you. It can meet all individual requirements.</p>
        </div>
    </section>

    <section class="ortho-sec" style="background:#f8fbff;padding-top:42px;padding-bottom:42px;">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Our Experienced Orthodontists</h2>
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
                            $ortho_dr_srcset = (strpos($img, '/dr-prabhjeet-tmj-') !== false) ? $dontia_dr_resp_attrs : '';
                    ?>
                    <article class="ortho-doctor-card">
                        <img class="ortho-doctor-photo" src="<?php echo htmlspecialchars($img, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars((string) $featured_doctor->doctor_name, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $ortho_dr_srcset; ?> width="360" height="225" decoding="async" fetchpriority="high">
                        <h3><?php echo htmlspecialchars((string) $featured_doctor->doctor_name, ENT_QUOTES, 'UTF-8'); ?></h3>
                        <p><?php echo htmlspecialchars(isset($featured_doctor->designation) ? (string) $featured_doctor->designation : 'Orthodontic Specialist', ENT_QUOTES, 'UTF-8'); ?></p>
                    </article>
                    <?php
                        }
                    } else { ?>
                    <article class="ortho-doctor-card">
                        <img class="ortho-doctor-photo" src="<?php echo base_url('admin/webroot/uploads/dental_page/defaults/Prasoon_Killa.png'); ?>" alt="Orthodontist" width="400" height="250" decoding="async" fetchpriority="high">
                        <h3>Expert Orthodontic Team</h3>
                        <p>Trained orthodontists focused on delivering predictable and long-term smile correction results.</p>
                    </article>
                    <?php } ?>
                </div>
                <aside class="ortho-doctor-note">
                    <h3>Meet the expert Orthodontists</h3>
                    <p>You will be introduced to trained, expert, and knowledgeable specialists at our clinic in Kolkata who always try to offer the best results with advanced treatment.</p>
                    <p>Every treatment plan is personalized to your bite, smile goals, and comfort for long-term stability.</p>
                    <div style="margin-top:8px;">
                        <a class="ortho-btn" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal">Book Now</a>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-why-wrap">
                <div class="ortho-section-head">
                    <h2>Choosing the Dontia Care Clinic for the treatment of the Dental Braces in Kolkata?</h2>
                </div>
                <div class="ortho-why-card">
                    <ul class="ortho-why-list">
                        <li><strong>Meet the expert Orthodontists:</strong> You will be introduced to trained, expert, and knowledgeable specialists at our clinic in Kolkata who always try to offer the best results with the advanced treatment process.</li>
                        <li><strong>Advanced and modern tools and technology:</strong> If you choose us, your treatment will be done with updated and modern orthodontic tools and technologies.</li>
                        <li><strong>Comfortable environment:</strong> We always try to provide the best comfort to all our individuals at our clinic so that they can be stress-free and comfortable from consultation to the last step of treatment.</li>
                        <li><strong>Affordable pricing:</strong> It is not true that quality treatment always needs to be expensive. At our clinic, you can get competitive pricing with flexible payment options and the best braces cost in Kolkata.</li>
                    </ul>
                    <p class="ortho-note">Treatment starts from INR 40K or $450 onwards.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec" style="background:#f8fbff">
        <div class="container">
            <h3>Dental Technology</h3>
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

    <section class="ortho-sec">
        <div class="container">
            <h2>Types of Orthodontic Services We Offer at our Dental Clinic</h2>
            <p>We have an expert team of top orthodontists in Kolkata who are skilled enough to use the updated best braces for teeth. So, it is easy to restore your smile.</p>
            <ul class="ortho-service-bullets">
                <li><strong>Invisalign Aligners:</strong> Clear, removable aligner systems for gradual teeth straightening without metal wires.</li>
                <li><strong>Ceramic Braces:</strong> A less noticeable braces option that provides effective correction of dental misalignment.</li>
                <li><strong>Retainers:</strong> Custom-made retainers after braces or aligners treatment to maintain alignment for years.</li>
            </ul>
        </div>
    </section>

    <section class="ortho-sec" style="background:#f8fbff">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Before / After Images</h2>
            </div>
            <div class="ortho-ba-grid">
                <?php foreach ($uploaded_ba_images as $uploaded_img) { ?>
                <article class="ortho-ba-card ortho-ba-card--full">
                    <img src="<?php echo htmlspecialchars($uploaded_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Braces treatment before and after" loading="lazy" decoding="async">
                </article>
                <?php } ?>
                <?php if (count($before_after) > 0) {
                    foreach ($before_after as $ba) {
                        $before = !empty($ba->image_name) ? site_url('admin/webroot/uploads/dental_media/' . $ba->image_name) : base_url('admin/webroot/uploads/dental_page/defaults/01_before.png');
                        $after = !empty($ba->image_name_2) ? site_url('admin/webroot/uploads/dental_media/' . $ba->image_name_2) : base_url('admin/webroot/uploads/dental_page/defaults/01_after.jpg');
                ?>
                <article class="ortho-ba-card">
                    <div class="ortho-ba-pair">
                        <img src="<?php echo htmlspecialchars($before, ENT_QUOTES, 'UTF-8'); ?>" alt="Before treatment" loading="lazy" decoding="async">
                        <img src="<?php echo htmlspecialchars($after, ENT_QUOTES, 'UTF-8'); ?>" alt="After treatment" loading="lazy" decoding="async">
                    </div>
                </article>
                <?php
                    }
                } else { ?>
                <article class="ortho-ba-card">
                    <div class="ortho-ba-pair">
                        <img src="<?php echo base_url('admin/webroot/uploads/dental_page/defaults/01_before.png'); ?>" alt="Before" loading="lazy" decoding="async">
                        <img src="<?php echo base_url('admin/webroot/uploads/dental_page/defaults/01_after.jpg'); ?>" alt="After" loading="lazy" decoding="async">
                    </div>
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Benefits of Orthodontic Treatment</h2>
            </div>
            <ul class="ortho-benefit-list">
                <li><strong>Increase self-esteem and confidence:</strong> A beautiful smile can boost self-esteem and confidence.</li>
                <li><strong>Offer an attractive smile:</strong> Correct teeth alignment helps create a more attractive smile.</li>
                <li><strong>Better oral health:</strong> Properly aligned teeth are easier to clean and reduce risk of cavities and gum disease.</li>
            </ul>
        </div>
    </section>

    <section class="ortho-sec" style="background:#f8fbff">
        <div class="container">
            <div class="ortho-cta-wrap">
                <div class="ortho-cta-card">
                    <h4>Get in Touch with Us</h4>
                    <p>For restoring your smile, we can be your perfect partner. Contact us to schedule your consultation and learn more about our clinic, our orthodontist team, and orthodontic services in Kolkata.</p>
                    <a class="ortho-btn" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal">Book Consultation</a>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h4>Certificates</h4>
                <p>Recognized training and professional certifications that support our quality orthodontic care.</p>
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

    <section class="ortho-sec ortho-faq" style="background:#f8fbff">
        <div class="container">
            <div class="ortho-section-head">
                <h4>Frequently Asked Questions</h4>
                <p>Find answers to common questions about our dental services</p>
            </div>
            <details><summary>Is a dentist and an orthodontist the same? Who is better?</summary><p>An orthodontist is specially trained for misaligned teeth and bite correction, while a dentist manages general oral health, cleanings, and cavities.</p></details>
            <details><summary>Can an Orthodontist fix TMJ?</summary><p>Yes, and we also have a TMJ specialist, Dr. Prabhjjeet Singh Sethi, for TMJ treatment in Kolkata.</p></details>
            <details><summary>Do orthodontists charge for broken brackets?</summary><p>It depends on how many braces or brackets are broken and the treatment stage.</p></details>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h4>Google Reviews</h4>
                <p>See what our patients are saying about their experience at Dontia Dental Clinic.</p>
            </div>
            <div style="text-align:center;">
                <a class="ortho-btn ortho-btn-gold" href="https://maps.app.goo.gl/Ujpqv8hHVHVkWBeL9" target="_blank" rel="noopener noreferrer">View All Reviews on Google</a>
            </div>
        </div>
    </section>

    <section class="ortho-sec" style="background:#f8fbff">
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
                    <a href="<?php echo htmlspecialchars($b_link, ENT_QUOTES, 'UTF-8'); ?>">Read Blog</a>
                </article>
                <?php
                    }
                } else { ?>
                <article class="ortho-card"><h4>Blogs will appear here</h4><p>Publish blog posts from admin to show them in this section.</p></article>
                <?php } ?>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('include/footer/footer'); ?>
