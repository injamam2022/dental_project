<?php
$this->load->view('include/header/header');
$blogs = isset($blog_carousel) && is_array($blog_carousel) ? $blog_carousel : array();

$pedo_img_dir = 'assets/images/pediatic-dentist/';
$pedo_img = function ($filename) use ($pedo_img_dir) {
    return base_url($pedo_img_dir . rawurlencode($filename));
};

$hero_img = $pedo_img('When You Should Take Your Kid to a Pediatric Dentist-pedodontist-treating-patient-kolkat.jpeg');
$what_img = $pedo_img('WhatisPediatricDentistry.jpg');
$why_need_img = $pedo_img('WhyChildrenNeedaPediatricDentist_-child-smilin.jpeg');
$doctor_img = $pedo_img('Why Choose Dontia Care Clinic-Dental_-drsuparnaroybestpediatricdentistinkolkata.jpg');
$community_img = $pedo_img('IMG_20160616_101931687.jpg.jpeg');
$cert_pedo = $pedo_img('pedodonticscertificate.jpg');
$cert_reg = $pedo_img('pedodonticsregistrationcertificate.jpg');

$pedo_why = array(
    'Experienced pediatric dental care specialists — Dr. Suparna Roy',
    'Simple and kid-friendly oral hygiene guidance',
    'Comfortable and welcoming clinic environment',
    'Prophylaxis for enduring oral health',
    'Timely diagnosis using therapeutic techniques',
    'Safe and painless procedures, when feasible',
    'Access to affordable dental care for growing families',
);

$pedo_services = array(
    array(
        'title' => 'Kids’ Dental Inspections',
        'text' => 'Regular visits help monitor tooth growth, find early issues, and maintain a child’s beautiful smile.',
    ),
    array(
        'title' => 'Dental Braces',
        'text' => 'We provide orthodontic treatment to kids with a specialised orthodontist. The ideal age to start is around 10 years, as most of the permanent teeth have emerged.',
    ),
    array(
        'title' => 'Kids’ Cavity Treatment',
        'text' => 'We offer gentle care to address cavities and protect both baby and permanent teeth.',
    ),
    array(
        'title' => 'Fluoride Varnishes',
        'text' => 'Professionally applied fluoride varnishes reinforce enamel, reduce cavities, and help promote stronger teeth.',
    ),
    array(
        'title' => 'Dental Sealants',
        'text' => 'Sealants applied to the chewing surfaces of molars help prevent decay in hard-to-clean areas.',
    ),
    array(
        'title' => 'Cleaning and Polishing',
        'text' => 'Plaque and tartar harm teeth and gums. Expert cleaning and polishing help keep a child’s mouth healthy in the long run.',
    ),
    array(
        'title' => 'Tongue Tie Surgery or Frenotomy',
        'text' => 'A less intrusive procedure to release a tight frenulum that unites the tongue to the floor of the mouth. It can support breastfeeding in infants and help with speech and oral development in older children and adults.',
    ),
    array(
        'title' => 'Emergency Odontology in Children',
        'text' => 'Our team specialises in urgent care for intense tooth pain, dental injuries, or swelling — so your child can get back to a healthy, smiling life.',
    ),
);

$pedo_when = array(
    'Any sensitivity or tooth pain',
    'Dark spots on the teeth or any visible cavity',
    'Swollen gums or bleeding',
    'Difficulty chewing foods',
    'A habit of thumb-sucking affecting alignment',
    'Noticeably late loss of baby teeth or delayed permanent teeth',
);

$pedo_tips = array(
    'Helping to develop the habit of brushing twice a day, especially with fluoride toothpaste',
    'Limiting sugary drinks and snacks',
    'Ensuring regular dental check-ups',
    'Incorporating oral hygiene into their usual daily routine',
);
?>
<style>
.pedo-page{overflow-x:hidden}
.pedo-page .container{max-width:min(1280px,94vw);width:100%;padding-left:max(22px,calc(env(safe-area-inset-left,0px) + 16px));padding-right:max(22px,calc(env(safe-area-inset-right,0px) + 16px));box-sizing:border-box}

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
.ortho-page .ortho-doctor-photo{width:100%;height:360px;object-fit:cover;object-position:center 18%;border-radius:10px;display:block;margin:0 0 12px}
.ortho-page .ortho-doctor-card h3{margin:0 0 6px;font-size:18px;line-height:1.25}
.ortho-page .ortho-doctor-card p{margin:0;color:#6d6258;font-size:16px}
.ortho-page .ortho-doctor-note{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:22px 24px;box-shadow:0 10px 24px rgba(0,0,0,.07);display:flex;flex-direction:column;justify-content:center;text-align:left}
.ortho-page .ortho-doctor-note h3{margin:0 0 12px;font-size:28px;line-height:1.2}
.ortho-page .ortho-doctor-note p{margin:0 0 10px;color:#4b4b4b;line-height:1.7}
.ortho-page .ortho-benefit-list,.ortho-page .ortho-service-bullets{list-style:none;padding:0;margin:14px 0 0;display:grid;gap:12px}
.ortho-page .ortho-benefit-list li,.ortho-page .ortho-service-bullets li{position:relative;background:#fff;border:1px solid #ece6df;border-radius:10px;padding:12px 14px 12px 42px;box-shadow:0 6px 14px rgba(0,0,0,.06);margin:0;line-height:1.7}
.ortho-page .ortho-benefit-list li::before,.ortho-page .ortho-service-bullets li::before{content:"";position:absolute;left:16px;top:18px;width:12px;height:12px;border-radius:50%;background:linear-gradient(135deg,#7a5140 0%,#5b2f1d 100%);box-shadow:0 0 0 4px rgba(122,81,64,.15)}
.ortho-page .ortho-cert-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px;max-width:780px;margin:0 auto}
.ortho-page .ortho-cert-card{background:#fff;border:1px solid #ece6df;border-radius:12px;padding:14px;box-shadow:0 10px 20px rgba(0,0,0,.08);transition:transform .2s ease,box-shadow .2s ease}
.ortho-page .ortho-cert-card:hover{transform:translateY(-3px);box-shadow:0 14px 24px rgba(0,0,0,.12)}
.ortho-page .ortho-cert-card img{width:100%;height:280px;object-fit:contain;object-position:center;background:#f7f6f3;border-radius:8px;display:block}
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

.pedo-page .pedo-sec-alt{background:#f8fbff}
.pedo-page .pedo-media{width:100%;border-radius:14px;overflow:hidden;box-shadow:0 14px 32px rgba(49,19,0,.12);border:1px solid #ece6df;background:#f3efe9}
.pedo-page .pedo-media img{width:100%;height:auto;display:block;aspect-ratio:4/3;object-fit:cover}
.pedo-page .pedo-media-contain img{object-fit:contain;background:#fff;aspect-ratio:4/3}
.pedo-page .pedo-callout{margin-top:18px;padding:14px 18px;border-left:4px solid #b78333;background:#fff8ef;border-radius:0 10px 10px 0;color:#3f3731;line-height:1.65;font-weight:600}
.pedo-page .pedo-svc-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px;margin-top:8px}
.pedo-page .pedo-svc-card{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:22px 22px 20px;box-shadow:0 10px 22px rgba(0,0,0,.07);height:100%}
.pedo-page .pedo-svc-card h3{margin:0 0 10px;font-size:20px;color:#5b2f1d}
.pedo-page .pedo-svc-card p{margin:0;color:#4b4b4b;line-height:1.7}
.pedo-page .pedo-signs{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px;margin-top:18px;padding:0;list-style:none}
.pedo-page .pedo-signs li{margin:0;background:#fff;border:1px solid #ece6df;border-radius:12px;padding:14px 16px 14px 44px;position:relative;line-height:1.55;box-shadow:0 6px 14px rgba(0,0,0,.05)}
.pedo-page .pedo-signs li::before{content:"✓";position:absolute;left:14px;top:13px;width:22px;height:22px;border-radius:50%;background:linear-gradient(135deg,#c59a4d,#b78333);color:#fff;font-size:12px;font-weight:700;display:flex;align-items:center;justify-content:center}

@media (max-width:1024px){.pedo-page .pedo-svc-grid,.pedo-page .pedo-signs{grid-template-columns:1fr}}
@media (max-width:768px){
.pedo-page .pedo-sec-alt{background:linear-gradient(180deg,#f3ece6 0%,#e8e0d8 100%)}
.pedo-page .ortho-sub{color:#3a3836!important;line-height:1.75}
.pedo-page .ortho-doctor-photo{height:min(70vw,360px)}
}
</style>

<div class="ortho-page implant-page pedo-page">
    <section class="dcc-hero" style="background-image:url('<?php echo htmlspecialchars($hero_img, ENT_QUOTES, 'UTF-8'); ?>')">
        <div class="dcc-hero-inner">
            <h1>Pediatric Dentist in Kolkata — Gentle and Expert Kids Dental Care at Dontia Care Clinic-Dental</h1>
            <p class="dcc-hero-sub">Focused, calm dental care for children in South Kolkata — routine checks, early treatment, and a kid-friendly clinic experience.</p>
            <div class="dcc-hero-cta">
                <a class="ortho-btn ortho-btn-gold" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal">Book an appointment</a>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-grid-2">
                <div>
                    <p class="ortho-sub">At Dontia Care Clinic-Dental, we understand the importance of childhood and provide focused dental care for your children. We assign our best pediatric dentist in South Kolkata to perform routine checks. This usually involves identifying early signs of dental issues and relevant treatments within a relaxed setting.</p>
                    <p class="ortho-sub" style="margin-top:16px;">This gives a child a good overall feeling, which helps overcome the fear of treatment. Families trust us because we prioritise safe treatment at the right time.</p>
                </div>
                <div class="pedo-media">
                    <img src="<?php echo htmlspecialchars($hero_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Pediatric dentist treating a child at Dontia Care Clinic in Kolkata" width="640" height="480" decoding="async" fetchpriority="high">
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec pedo-sec-alt">
        <div class="container">
            <div class="ortho-grid-2">
                <div class="pedo-media">
                    <img src="<?php echo htmlspecialchars($what_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Pediatric dentistry check-up for a child in Kolkata" loading="lazy" decoding="async" width="640" height="480">
                </div>
                <div>
                    <h2>What is Pediatric Dentistry?</h2>
                    <p class="ortho-sub">Kids’ dentistry is a specialised branch of dental care that deals with children who have various tooth problems. It is a broad specialty concerned with orofacial issues related to age and development. Pediatric dentists differ from general dental practitioners in many ways, including the treatment of inherited tooth problems and gum diseases in growing children.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-grid-2">
                <div>
                    <h2>Why Children Need a Pediatric Dentist</h2>
                    <p class="ortho-sub">Tooth development in children requires close observation to identify any unusual symptoms that might harm natural growth. Certified pediatric dentists offer safe and calm treatment by tracking tooth progress in children.</p>
                    <p class="ortho-sub" style="margin-top:14px;">Children may need to visit a pediatric dentist to determine whether they are experiencing any serious tooth problems and to receive the right care.</p>
                </div>
                <div class="pedo-media pedo-media-contain">
                    <img src="<?php echo htmlspecialchars($why_need_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Smiling child after pediatric dental care in Kolkata" loading="lazy" decoding="async" width="640" height="480">
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec pedo-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Why Choose Dontia Care Clinic-Dental?</h2>
                <p>Parents rely on us for their children’s care and comfort, and for quality dental care.</p>
            </div>
            <div class="ortho-doctor-layout">
                <div>
                    <article class="ortho-doctor-card">
                        <img class="ortho-doctor-photo" src="<?php echo htmlspecialchars($doctor_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Dr. Suparna Roy — pediatric dentist in Kolkata" width="480" height="360" loading="lazy" decoding="async">
                        <h3>Dr. Suparna Roy</h3>
                        <p>Pediatric Dentist in Kolkata</p>
                    </article>
                </div>
                <aside class="ortho-doctor-note">
                    <h3>Kid-friendly care you can trust</h3>
                    <p>We aim to ensure that all visits are positive for children, giving them the confidence to visit their dentist.</p>
                    <ul class="ortho-benefit-list">
                        <?php foreach ($pedo_why as $point) { ?>
                        <li><?php echo htmlspecialchars($point, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php } ?>
                    </ul>
                    <div style="margin-top:16px;">
                        <a class="ortho-btn" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal">Book an appointment</a>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Our Pediatric Dental Services</h2>
                <p>Gentle, age-appropriate care — from first check-ups to emergency treatment.</p>
            </div>
            <div class="pedo-svc-grid">
                <?php foreach ($pedo_services as $svc) { ?>
                <article class="pedo-svc-card">
                    <h3><?php echo htmlspecialchars($svc['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p><?php echo htmlspecialchars($svc['text'], ENT_QUOTES, 'UTF-8'); ?></p>
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="ortho-sec pedo-sec-alt">
        <div class="container">
            <div class="ortho-grid-2">
                <div class="pedo-media">
                    <img src="<?php echo htmlspecialchars($community_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Dontia Care Clinic community kids dental screening in Kolkata" loading="lazy" decoding="async" width="640" height="480">
                </div>
                <div>
                    <h2>Child-Centric Dental Care</h2>
                    <p class="ortho-sub">At our dental clinic in Kolkata, we know that most children lack the confidence to visit a dentist. We offer treatment in a reassuring environment, helping kids overcome fear as they grow.</p>
                    <p class="ortho-sub" style="margin-top:14px;">We are different from other clinics in Kolkata because our treatment includes gentle communication, behaviour guidance, and age-relevant explanations. Care is given in a safe and relaxed setting to give children a good first impression and the confidence to return.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-grid-2">
                <div>
                    <h2>When You Should Take Your Kid to a Pediatric Dentist</h2>
                    <p class="ortho-sub">Make an appointment a priority if your child experiences:</p>
                    <ul class="pedo-signs">
                        <?php foreach ($pedo_when as $item) { ?>
                        <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php } ?>
                    </ul>
                    <p class="pedo-callout">Early diagnosis is always recommended, as it allows treatment before a problem becomes more serious.</p>
                </div>
                <div class="pedo-media">
                    <img src="<?php echo htmlspecialchars($hero_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Pedodontist treating a young patient in Kolkata" loading="lazy" decoding="async" width="640" height="480">
                </div>
            </div>
        </div>
    </section>

    <section class="ortho-sec pedo-sec-alt">
        <div class="container">
            <h2>Why Early Dental Care Matters</h2>
            <p class="ortho-sub">Children may not understand if they are developing dental issues. Parents cannot help unless they take them to an expert in this field. Such visits should begin by 6 months of age. A timely diagnosis can help find any abnormal developments and fix them to achieve healthier teeth in the long run.</p>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <h2>Tips for Parents</h2>
            <p class="ortho-sub">You can help your child retain a beautiful smile by:</p>
            <ul class="pedo-signs">
                <?php foreach ($pedo_tips as $tip) { ?>
                <li><?php echo htmlspecialchars($tip, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php } ?>
            </ul>
        </div>
    </section>

    <section class="ortho-sec pedo-sec-alt">
        <div class="container">
            <h2>Cost of Pediatric Dental Treatment in Kolkata</h2>
            <p class="ortho-sub">The cost of dental treatment varies depending on your child’s dental condition and the treatment designed to suit it. Our team arrives at the most suitable option and discloses the pricing package only after a detailed oral check of your child.</p>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-cta-wrap">
                <div class="ortho-cta-card">
                    <h2>Book Your Child’s Dental Appointment Today</h2>
                    <p>Give your child the gift of a beautiful, confident smile with early dental care under the supervision of our experts at Dontia Care Clinic. Our team is committed to making each visit comfortable and rewarding through specific care, ensuring long-term oral health for your child.</p>
                    <p>Schedule an appointment now so we can help preserve your child’s oral health.</p>
                    <a class="ortho-btn" href="#" data-toggle="modal" data-target="#dontiaAppointmentModal">Schedule an appointment</a>
                    <p style="margin-top:14px;margin-bottom:0;"><a href="<?php echo base_url('contact-us'); ?>" class="ortho-note">Contact page</a> — directions and clinic details.</p>
                </div>
            </div>
            <?php $this->load->view('Dental/partials/clinic_location_cards'); ?>
        </div>
    </section>

    <section class="ortho-sec ortho-faq pedo-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h2>Frequently Asked Questions (FAQs)</h2>
            </div>
            <details>
                <summary>Is there an age to schedule a first visit?</summary>
                <p>About 6 months of age.</p>
            </details>
            <details>
                <summary>How frequently should we consider check-ups?</summary>
                <p>Consider once every 6 months, or as advised by your consulting dentist.</p>
            </details>
            <details>
                <summary>Is topical fluoride safe for kids?</summary>
                <p>Yes, if it is done under the care of an experienced expert.</p>
            </details>
            <details>
                <summary>My kid has dental pain. What should I do?</summary>
                <p>Do not treat this as normal. Trust us for the rest, so the condition does not turn worse later.</p>
            </details>
        </div>
    </section>

    <section class="ortho-sec">
        <div class="container">
            <div class="ortho-section-head">
                <h4>Certificates</h4>
                <p>Recognised pediatric dental training that supports safe, specialist kids’ care.</p>
            </div>
            <div class="ortho-cert-grid">
                <article class="ortho-cert-card"><img src="<?php echo htmlspecialchars($cert_pedo, ENT_QUOTES, 'UTF-8'); ?>" alt="Pedodontics certificate — Dontia Care Clinic" loading="lazy" decoding="async"></article>
                <article class="ortho-cert-card"><img src="<?php echo htmlspecialchars($cert_reg, ENT_QUOTES, 'UTF-8'); ?>" alt="Pedodontics registration certificate — Dontia Care Clinic" loading="lazy" decoding="async"></article>
            </div>
        </div>
    </section>

    <section class="ortho-sec pedo-sec-alt">
        <div class="container">
            <div class="ortho-section-head">
                <h4>Google Reviews</h4>
                <p>See what families say about Dontia Care Clinic.</p>
            </div>
            <div style="text-align:center;">
                <a class="ortho-btn ortho-btn-gold" href="https://maps.app.goo.gl/Ujpqv8hHVHVkWBeL9" target="_blank" rel="noopener noreferrer">View reviews on Google</a>
            </div>
        </div>
    </section>

    <?php $this->load->view('Dental/partials/service_blog_cards'); ?>
</div>

<?php $this->load->view('include/footer/footer'); ?>
