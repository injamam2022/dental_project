<?php
$w = isset($this->website['data']) ? $this->website['data'] : new stdClass();
$company = isset($w->company_name) && trim((string) $w->company_name) !== '' ? trim((string) $w->company_name) : 'Dontia Care Clinic';
$logo = !empty($w->company_logo) ? base_url('admin/webroot/uploads/logo/' . $w->company_logo) : base_url('assets/images/favicon.png');
$address_1 = isset($w->address) ? trim((string) $w->address) : 'Avani Vision, 78 S.N Pandit Street, Kolkata 20';
$address_2 = isset($w->corporate_address) ? trim((string) $w->corporate_address) : 'Suite 306, P.S Aviator Chinar Park, Kolkata';
$phone_raw = isset($w->support_contact) ? (string) $w->support_contact : '+91 98304 11212|+91 98307 06396';
$phones = array_values(array_filter(array_map('trim', preg_split('/[\n\r|]+/', $phone_raw, -1, PREG_SPLIT_NO_EMPTY))));
if (count($phones) === 0) {
    $phones = array('+91 98304 11212');
}
$email = isset($w->support_email) && trim((string) $w->support_email) !== '' ? trim((string) $w->support_email) : 'support@dontiacareclinic.com';

$specialisations = array(
    array(
        'image' => 'General_Dentist.png',
        'name' => 'General Dentist',
        'description' => 'Comprehensive oral health assessment including diagnosis, treatment planning, and routine dental care management.'
    ),
    array(
        'image' => 'Implantologist.png',
        'name' => 'Implantologist',
        'description' => 'Surgical placement of dental implants with bone grafting procedures and advanced implant dentistry expertise.'
    ),
    array(
        'image' => 'Cosmetic_Dentist.png',
        'name' => 'Cosmetic Dentist',
        'description' => 'Transform your smile with clear aligners, veneers, crowns, and professional whitening procedures.'
    ),
    array(
        'image' => 'TMJ_Specialist.png',
        'name' => 'TMJ Specialist',
        'description' => 'Expert treatment for temporomandibular joint disorders, jaw pain, and associated headaches.'
    ),
    array(
        'image' => 'Orthodontist.png',
        'name' => 'Orthodontist',
        'description' => 'Correction of misaligned, crowded, and crooked teeth using modern braces and aligner systems.'
    ),
    array(
        'image' => 'Pedodontist.png',
        'name' => 'Pedodontist',
        'description' => 'Specialized pediatric dental care focused on preventive treatment and child-friendly oral health.'
    ),
);
$stats = array(
    array('icon' => 'Happy_Patients.png', 'value' => '25,000+', 'label' => 'Happy Patients'),
    array('icon' => 'Years_Of_Experience.png', 'value' => '25+', 'label' => 'Years Of Experience'),
    array('icon' => 'Dental_Doctors.png', 'value' => '10+', 'label' => 'Dental Doctors'),
    array('icon' => 'Dental_Implants_Placed.png', 'value' => '20,000+', 'label' => 'Dental Implants Placed'),
);
$doctors = array(
    array('name' => 'Dr. Prabhjeet Sethi', 'role' => 'Implantologist & TMJ Specialist', 'image' => 'dr-prabhjeet-sethi.png'),
    array('name' => 'Dr. Harleen Sandhu', 'role' => 'Cosmetic Dentist', 'image' => 'dr-harleen-sandhu.png'),
    array('name' => 'Dr. Aishi Sinha', 'role' => 'Endodontist', 'image' => 'Aishi_Sinha.png'),
    array('name' => 'Dr. Saibal Sen', 'role' => 'Dental Surgeon', 'image' => 'dr-saibal-sen-purnam-medicare-polyclinic--lala-lajpat-rai-sarani-kolkata-dentists-yjki7.jpg'),
    array('name' => 'Dr. Prasoon Killa', 'role' => 'Orthodontist', 'image' => 'Prasoon_Killa.png'),
    array('name' => 'Dr. Navneet', 'role' => 'Periodontist', 'image' => 'Navneet_.png'),
);
$dynamic_doctors = isset($doctor_list) && is_array($doctor_list) ? $doctor_list : array();
$doctor_display_list = array();
$doctor_name_seen = array();
foreach ($dynamic_doctors as $_dr_row) {
    if (!is_object($_dr_row) || !isset($_dr_row->doctor_name)) {
        continue;
    }
    $_nm = strtolower(trim((string) $_dr_row->doctor_name));
    if ($_nm === '' || isset($doctor_name_seen[$_nm])) {
        continue;
    }
    $doctor_name_seen[$_nm] = true;
    $doctor_display_list[] = array('source' => 'db', 'db' => $_dr_row);
}
foreach ($doctors as $_dr_fb) {
    $_nm = strtolower(trim((string) $_dr_fb['name']));
    if ($_nm === '' || isset($doctor_name_seen[$_nm])) {
        continue;
    }
    $doctor_name_seen[$_nm] = true;
    $doctor_display_list[] = array('source' => 'fallback', 'fb' => $_dr_fb);
}
$technology_cards_view = isset($technology_cards) && is_array($technology_cards) && count($technology_cards) > 0
    ? $technology_cards
    : array();
$before_after = array(
    array('title' => 'Smile Enhancement', 'before' => '01_before.png', 'after' => '01_after.jpg'),
    array('title' => 'Crown Restoration', 'before' => '03_before.png', 'after' => '03_after.png'),
    array('title' => 'Complete Smile Makeover', 'before' => '02_before.png', 'after' => '02_after.png'),
);
$procedures = array(
    array('title' => 'Preventive Dentistry', 'description' => 'Maintain oral health and prevent cavities, gum disease, enamel wear, and decay.'),
    array('title' => 'Restorative Dentistry', 'description' => 'Restore oral function and aesthetics through diagnosis, treatment, and reconstruction.'),
    array('title' => 'Cosmetic Dentistry', 'description' => 'Improve smile appearance with veneers, whitening, bonding, and crowns.'),
    array('title' => 'Orthodontic Dentistry', 'description' => 'Correct misalignment, bite issues, and crowded teeth with modern braces solutions.'),
    array('title' => 'Dental Surgery', 'description' => 'Specialized surgical procedures including extractions, gum surgery, and root-end treatment.'),
    array('title' => 'Sedation Dentistry', 'description' => 'Comfort-focused dental care options for anxious patients and long procedures.'),
);
$gallery = isset($gallery_images) && is_array($gallery_images) ? $gallery_images : array();
$certs = array('Implantology_Cetificate.jpg', 'Dawson_Academy_Dental_Certificate.jpg', 'Cosmetic_Dentistry_Certificate.jpg');
$faqs = array(
    array('q' => 'Who is the most famous dentist?', 'a' => 'Dr. Prabhjeet Sethi and Dr. Harleen Kaur are among the best-known dentists in Kolkata.'),
    array('q' => 'What is the 2-2-2 rule in dentistry?', 'a' => 'Brush twice a day for 2 minutes and visit your dentist at least 2 times a year.'),
    array('q' => 'How often should I visit the dentist?', 'a' => 'Most patients should visit every 6 months for checkups and cleaning. For gum disease or ongoing treatment, your dentist may advise more frequent visits.'),
    array('q' => 'Do you treat children and senior citizens?', 'a' => 'Yes. We provide age-appropriate preventive and restorative care for children, adults, and senior citizens in a comfortable setting.'),
    array('q' => 'Do you provide skin care and ENT services?', 'a' => 'Yes. Along with dental treatments, we provide specialist skin care and ENT consultations. You can choose the required category from the Services menu.'),
    array('q' => 'Can I book appointments online?', 'a' => 'Yes. Click on "Book An Appointment" and submit your details in the popup form. Our team will confirm your slot shortly.'),
    array('q' => 'What payment methods do you accept?', 'a' => 'We accept cash, UPI, cards, and major digital payment options. If you have a specific requirement, please contact our front desk before your visit.'),
    array('q' => 'Do you provide emergency dental services?', 'a' => 'Yes, emergency dental support is available during clinic timings at both locations.'),
);
$video_testimonials = array(
    array('title' => 'Patient Success Story 1', 'video_id' => 'oc0Hd7l6Y8Q'),
    array('title' => 'Patient Success Story 2', 'video_id' => 'g3XqEYCJ8BY'),
    array('title' => 'Patient Success Story 3', 'video_id' => '3MLAZHPAJA8'),
    array('title' => 'Patient Success Story 4', 'video_id' => 'oc0Hd7l6Y8Q'),
    array('title' => 'Patient Success Story 5', 'video_id' => 'g3XqEYCJ8BY'),
);
$dynamic_video_testimonials = isset($testimonial_videos) && is_array($testimonial_videos) ? $testimonial_videos : array();
$media_why_choose_list = (isset($media_why_choose) && is_array($media_why_choose) && count($media_why_choose) > 0) ? $media_why_choose : array(
    (object) array('title' => '25+ Years of Dental Experience', 'description' => 'Safe, Hygienic & Comfortable Clinic Environment', 'image_name' => '25_Years_of_Dental_Experience.png'),
    (object) array('title' => 'Dawson Academy Certified Dentist', 'description' => 'Highly Trained Dental Team', 'image_name' => 'Dawson_Academy_Certified_Dentist.png'),
    (object) array('title' => 'Advanced Technology & Techniques', 'description' => 'Personalized & Compassionate Care', 'image_name' => 'Advanced_Dental_Technology_&_Techniques.png'),
    (object) array('title' => 'Same Day Crown', 'description' => 'Excellent Treatment Results', 'image_name' => 'Same_Day_Crown.png'),
);
$media_specialisations_list = (isset($media_specialisations) && is_array($media_specialisations) && count($media_specialisations) > 0) ? $media_specialisations : array();
$media_stats_list = (isset($media_stats) && is_array($media_stats) && count($media_stats) > 0) ? $media_stats : array();
$media_before_after_list = (isset($media_before_after) && is_array($media_before_after) && count($media_before_after) > 0) ? $media_before_after : array();
$media_certificates_list = (isset($media_certificates) && is_array($media_certificates) && count($media_certificates) > 0) ? $media_certificates : array();
$media_about_list = (isset($media_about) && is_array($media_about) && count($media_about) > 0) ? $media_about : array();
$dental_page_defaults = base_url('admin/webroot/uploads/dental_page/defaults/');
$dental_page_technology = base_url('admin/webroot/uploads/dental_page/technology/');
$dontia_branding_dir = rtrim(base_url('assets/images/branding/'), '/');
$dontia_dr_prabhjeet_photo = $dontia_branding_dir . '/dr-prabhjeet-tmj-360w.jpg';
$dontia_dr_prabhjeet_srcset = htmlspecialchars(
    $dontia_branding_dir . '/dr-prabhjeet-tmj-360w.jpg 360w, ' .
    $dontia_branding_dir . '/dr-prabhjeet-tmj-480w.jpg 480w, ' .
    $dontia_branding_dir . '/dr-prabhjeet-tmj-560w.jpg 560w',
    ENT_QUOTES,
    'UTF-8'
);
$dontia_dr_sizes_esc = htmlspecialchars('(max-width: 768px) 50vw, 260px', ENT_QUOTES, 'UTF-8');
$dontia_dr_resp_attrs = ' srcset="' . $dontia_dr_prabhjeet_srcset . '" sizes="' . $dontia_dr_sizes_esc . '"';
$blog_carousel_rows = isset($blog_carousel) && is_array($blog_carousel) ? $blog_carousel : array();
$service_nav_links = array(
    'Dental' => base_url('Services'),
    'Skin Care' => base_url('Services'),
    'ENT' => base_url('Services'),
);
if (function_exists('GetServices')) {
    $nav_services = GetServices();
    if (is_array($nav_services)) {
        foreach ($nav_services as $svc_nav) {
            $svc_name_raw = isset($svc_nav['cat_name']) ? trim((string) $svc_nav['cat_name']) : '';
            $svc_id = isset($svc_nav['cat_id']) ? (int) $svc_nav['cat_id'] : 0;
            if ($svc_name_raw === '' || $svc_id <= 0) {
                continue;
            }
            $svc_name_l = strtolower($svc_name_raw);
            if (strpos($svc_name_l, 'dental') !== false) {
                $service_nav_links['Dental'] = base_url('Services/' . $svc_id . '/0');
            } elseif (strpos($svc_name_l, 'skin') !== false) {
                $service_nav_links['Skin Care'] = base_url('Services/' . $svc_id . '/0');
            } elseif (strpos($svc_name_l, 'ent') !== false) {
                $service_nav_links['ENT'] = base_url('Services/' . $svc_id . '/0');
            }
        }
    }
}
?>
<?php $this->load->view('include/header/header'); ?>
<div class="dental-page-view">

    <section class="dr-hero">
        <?php
        $hero_img = $dental_page_defaults . 'Koel_Mallick_with_dentist_in_kolkata.JPG.jpeg';
        if (isset($hero_banner) && !empty($hero_banner->image_name)) {
            $hero_img = base_url('admin/webroot/uploads/banner/' . $hero_banner->image_name);
        }
        ?>
        <img src="<?php echo htmlspecialchars($hero_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Dental Clinic Banner" width="1920" height="1080" decoding="async" fetchpriority="high">
        <div class="dr-hero-overlay"></div>
        <div class="dr-hero-content dr-container">
            <h2>Dontia Care Clinic</h2>
            <p>Your One-Stop Destination for a<br>Radiant Smile &amp; Dental Needs</p>
        </div>
    </section>

    <section id="about" class="dr-section dr-about">
        <div class="dr-container dr-grid">
            <div>
                <h2>Welcome To <span>Dontia Care Clinic</span> in Kolkata</h2>
                <p>Founded in 2001, Dontia Care Clinic is Kolkata's premier destination for advanced dental care. We bring comprehensive care with precision, compassion, and cutting-edge technology for our patients. We are also termed as a celebrity dental clinic as one of our clients is Koel Mallick, a renowned Bengali actress making us the top dental clinic.</p>
                <p>As the only <strong>Dawson Academy-trained dentist in Eastern India</strong>, Dontia is widely recognized for smile design, dental implants, root canals, braces, and more - performed by a team of best dentists in Kolkata using state-of-the-art equipment and techniques.</p>
                <p>With an unwavering focus on safety, precision, and patient satisfaction, Dontia is where <strong>science meets artistry</strong> - creating brighter smiles.</p>

                <div class="dr-about-locations">
                    <h3>Our Locations in Kolkata</h3>
                    <div class="dr-about-location-item">
                        <span class="dr-about-location-index">1</span>
                        <div>
                            <h4>Bhowanipore, Elgin Road</h4>
                            <p>1.7 km (6-minute drive) from the iconic Victoria Memorial, making it easily accessible from Central and South Kolkata.</p>
                        </div>
                    </div>
                    <div class="dr-about-location-item">
                        <span class="dr-about-location-index">2</span>
                        <div>
                            <h4>Chinar Park</h4>
                            <p>950m (4-minute drive) from City Centre 2, providing top-tier dental services to North Kolkata, New Town, Salt Lake and Rajarhat regions.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dr-about-photo">
                <?php
                $about_img = $dental_page_defaults . 'IMG_1707.JPG';
                if (count($media_about_list) > 0 && !empty($media_about_list[0]->image_name)) {
                    $about_img = site_url('admin/webroot/uploads/dental_media/' . $media_about_list[0]->image_name);
                }
                ?>
                <img src="<?php echo htmlspecialchars($about_img, ENT_QUOTES, 'UTF-8'); ?>" alt="Dontia Clinic" loading="lazy" decoding="async">
            </div>
        </div>
    </section>

    <section id="why" class="dr-section dr-why-dark">
        <div class="dr-container">
            <h1>Why We Are the Best Dental Clinic in Kolkata</h1>
            <p class="dr-sub dr-sub-light">Why Choose Us</p>
            <div class="dr-choose-grid">
                <?php
                $why_desc_fallback = array(
                    '25+ years of dental experience' => 'Safe, Hygienic & Comfortable Clinic Environment',
                    'dawson academy certified dentist' => 'Highly Trained Dental Team',
                    'advanced technology & techniques' => 'Personalized & Compassionate Care',
                    'same day crown' => 'Excellent Treatment Results',
                );
                ?>
                <?php foreach ($media_why_choose_list as $wci) {
                    $title = isset($wci->title) ? (string) $wci->title : 'Why Choose Us';
                    $desc = isset($wci->description) ? (string) $wci->description : '';
                    if (trim($desc) === '') {
                        $k = strtolower(trim($title));
                        if (isset($why_desc_fallback[$k])) {
                            $desc = $why_desc_fallback[$k];
                        }
                    }
                    $img = !empty($wci->image_name)
                        ? (is_file(FCPATH . 'admin/webroot/uploads/dental_media/' . $wci->image_name)
                            ? site_url('admin/webroot/uploads/dental_media/' . $wci->image_name)
                            : $dental_page_defaults . $wci->image_name)
                        : base_url('assets/images/favicon.png');
                ?>
                <article><img src="<?php echo htmlspecialchars($img, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async"><h3><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h3><?php if ($desc !== '') { ?><p><?php echo htmlspecialchars($desc, ENT_QUOTES, 'UTF-8'); ?></p><?php } ?></article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="dr-section dr-services">
        <div class="dr-container">
            <h2>Dental Specialisation</h2>
            <p class="dr-sub">We provide a specialised dental doctor for every specialisation at our Smile Dental Clinic in Kolkata.</p>
            <div class="dr-mini-grid">
                <?php
                $spec_source = count($media_specialisations_list) > 0 ? $media_specialisations_list : array_map(function ($sp) {
                    return (object) array('title' => $sp['name'], 'description' => $sp['description'], 'image_name' => $sp['image']);
                }, $specialisations);
                $fallback_desc = array();
                foreach ($specialisations as $sp_f) {
                    $fallback_desc[strtolower($sp_f['name'])] = $sp_f['description'];
                }
                foreach ($spec_source as $sp) { ?>
                <article>
                    <?php
                    $sp_title = isset($sp->title) ? (string) $sp->title : 'Specialisation';
                    $sp_desc = isset($sp->description) ? trim((string) $sp->description) : '';
                    if ($sp_desc === '') {
                        $k = strtolower($sp_title);
                        if (isset($fallback_desc[$k])) {
                            $sp_desc = $fallback_desc[$k];
                        }
                    }
                    $sp_img = !empty($sp->image_name)
                        ? (is_file(FCPATH . 'admin/webroot/uploads/dental_media/' . $sp->image_name)
                            ? site_url('admin/webroot/uploads/dental_media/' . $sp->image_name)
                            : $dental_page_defaults . $sp->image_name)
                        : base_url('assets/images/favicon.png');
                    ?>
                    <span><img src="<?php echo htmlspecialchars($sp_img, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($sp_title, ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async"></span>
                    <h3><?php echo htmlspecialchars($sp_title, ENT_QUOTES, 'UTF-8'); ?></h3>
                    <?php if ($sp_desc !== '') { ?><p><?php echo htmlspecialchars($sp_desc, ENT_QUOTES, 'UTF-8'); ?></p><?php } ?>
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="dr-section dr-stats">
        <div class="dr-container">
            <h3>Our Dental Journey</h3>
            <div class="dr-stats-grid">
                <?php
                $stats_source = count($media_stats_list) > 0 ? $media_stats_list : array_map(function ($st) {
                    return (object) array('title' => $st['value'], 'description' => $st['label'], 'image_name' => $st['icon']);
                }, $stats);
                foreach ($stats_source as $st) { ?>
                <article>
                    <?php
                    $st_title = isset($st->title) ? (string) $st->title : '';
                    $st_desc = isset($st->description) ? (string) $st->description : '';
                    $st_img = !empty($st->image_name)
                        ? (is_file(FCPATH . 'admin/webroot/uploads/dental_media/' . $st->image_name)
                            ? site_url('admin/webroot/uploads/dental_media/' . $st->image_name)
                            : $dental_page_defaults . $st->image_name)
                        : base_url('assets/images/favicon.png');
                    ?>
                    <img src="<?php echo htmlspecialchars($st_img, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($st_desc, ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                    <h3><?php echo htmlspecialchars($st_title, ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p><?php echo htmlspecialchars($st_desc, ENT_QUOTES, 'UTF-8'); ?></p>
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section id="services" class="dr-section dr-services">
        <div class="dr-container">
            <h2>Dental Services</h2>
            <p class="dr-sub">Comprehensive dental care solutions tailored to your needs.</p>
            <div class="dr-cards">
                <?php
                $svc_source = (isset($service_cards) && is_array($service_cards) && count($service_cards) > 0) ? $service_cards : array();
                foreach ($svc_source as $service) {
                    $svc_name = isset($service['name']) ? (string) $service['name'] : '';
                    $svc_desc = isset($service['description']) ? trim((string) $service['description']) : '';
                    if (strlen($svc_desc) > 180) {
                        $svc_desc = substr($svc_desc, 0, 180) . '...';
                    }
                    $svc_icon = isset($service['image_url']) ? (string) $service['image_url'] : base_url('assets/images/favicon.png');
                ?>
                <article class="dr-card">
                    <div class="dr-icon">
                        <img src="<?php echo htmlspecialchars($svc_icon, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($svc_name, ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                    </div>
                    <h3><?php echo htmlspecialchars($svc_name, ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p><?php echo htmlspecialchars($svc_desc, ENT_QUOTES, 'UTF-8'); ?></p>
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="dr-section dr-doctors">
        <div class="dr-container">
            <h2 id="doctors-heading">Meet Our Dentist in Kolkata</h2>
            <div class="dr-doctor-slider-wrap">
                <button type="button" class="dr-doctor-nav dr-doctor-nav-left" aria-label="Scroll doctors left">&#10094;</button>
                <div class="dr-doctor-slider" id="drDoctorSlider">
                <?php
                foreach ($doctor_display_list as $_dc) {
                    if ($_dc['source'] === 'db') {
                        $dr = $_dc['db'];
                        $dr_img = !empty($dr->image_name)
                            ? site_url('admin/webroot/uploads/doctors/' . $dr->image_name)
                            : base_url('assets/images/team/placeholder.svg');
                        $dr_name = (string) $dr->doctor_name;
                        $dr_role = isset($dr->designation) ? (string) $dr->designation : '';
                    } else {
                        $dr = $_dc['fb'];
                        $dr_img = strpos($dr['image'], 'http') === 0 ? $dr['image'] : $dental_page_defaults . $dr['image'];
                        if (isset($dr['image']) && (string) $dr['image'] === 'dr-prabhjeet-sethi.png') {
                            $dr_img = $dontia_dr_prabhjeet_photo;
                        }
                        $dr_name = (string) $dr['name'];
                        $dr_role = (string) $dr['role'];
                    }
                    $dental_dr_srcset = (strpos($dr_img, '/dr-prabhjeet-tmj-') !== false) ? $dontia_dr_resp_attrs : '';
                    ?>
                <article class="dr-doctor-slide-card">
                    <img src="<?php echo htmlspecialchars($dr_img, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($dr_name, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $dental_dr_srcset; ?> loading="lazy" decoding="async">
                    <h3><?php echo htmlspecialchars($dr_name, ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p><?php echo htmlspecialchars($dr_role, ENT_QUOTES, 'UTF-8'); ?></p>
                </article>
                <?php } ?>
                </div>
                <button type="button" class="dr-doctor-nav dr-doctor-nav-right" aria-label="Scroll doctors right">&#10095;</button>
            </div>
        </div>
    </section>

    <section class="dr-section dr-procedures">
        <div class="dr-container">
            <h3>Dental Procedures</h3>
            <p class="dr-sub">Comprehensive dental care tailored to your needs.</p>
            <div class="dr-procedure-grid">
                <?php foreach ($procedures as $pr) { ?>
                <article>
                    <h3><?php echo htmlspecialchars($pr['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p><?php echo htmlspecialchars($pr['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="dr-section dr-tech">
        <div class="dr-container">
            <div class="dr-tech-head">
                <h3>Dental Technology</h3>
                <div class="dr-tech-divider" aria-hidden="true">
                    <span class="dr-tech-divider-line"></span>
                    <span class="dr-tech-divider-gem">💎</span>
                    <span class="dr-tech-divider-line"></span>
                </div>
            </div>
            <div class="dr-tech-grid">
                <?php foreach ($technology_cards_view as $tech) {
                    $tech_id = isset($tech['id']) ? (int) $tech['id'] : 0;
                    $tech_title = isset($tech['title']) ? (string) $tech['title'] : '';
                    $tech_desc = isset($tech['description']) ? (string) $tech['description'] : '';
                    $tech_img = isset($tech['image_url']) ? (string) $tech['image_url'] : $dental_page_technology . 'Cerec.png';
                    $tech_srcset = isset($tech['image_srcset']) ? (string) $tech['image_srcset'] : '';
                    $tech_sizes = isset($tech['image_sizes']) ? (string) $tech['image_sizes'] : '';
                ?>
                <article class="dr-tech-card" data-tech-id="<?php echo $tech_id; ?>">
                    <img src="<?php echo htmlspecialchars($tech_img, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($tech_title, ENT_QUOTES, 'UTF-8'); ?>"<?php if ($tech_srcset !== '') { ?> srcset="<?php echo htmlspecialchars($tech_srcset, ENT_QUOTES, 'UTF-8'); ?>" sizes="<?php echo htmlspecialchars($tech_sizes, ENT_QUOTES, 'UTF-8'); ?>"<?php } ?> loading="lazy" decoding="async">
                    <div class="dr-tech-overlay">
                        <h3><?php echo htmlspecialchars($tech_title, ENT_QUOTES, 'UTF-8'); ?></h3>
                        <p class="dr-tech-desc"><?php echo htmlspecialchars($tech_desc, ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="dr-section dr-before-after">
        <div class="dr-container">
            <h3>Successful Transformations</h3>
            <div class="dr-ba-grid">
                <?php
                $ba_source = count($media_before_after_list) > 0 ? $media_before_after_list : array_map(function ($ba) {
                    return (object) array('title' => $ba['title'], 'image_name' => $ba['before'], 'image_name_2' => $ba['after']);
                }, $before_after);
                foreach ($ba_source as $ba) { ?>
                <article>
                    <div class="dr-ba-row">
                        <?php
                        $ba_title = isset($ba->title) ? (string) $ba->title : 'Transformation';
                        $ba_before = !empty($ba->image_name)
                            ? (is_file(FCPATH . 'admin/webroot/uploads/dental_media/' . $ba->image_name)
                                ? site_url('admin/webroot/uploads/dental_media/' . $ba->image_name)
                                : $dental_page_defaults . $ba->image_name)
                            : base_url('assets/images/favicon.png');
                        $ba_after = !empty($ba->image_name_2)
                            ? (is_file(FCPATH . 'admin/webroot/uploads/dental_media/' . $ba->image_name_2)
                                ? site_url('admin/webroot/uploads/dental_media/' . $ba->image_name_2)
                                : $dental_page_defaults . $ba->image_name_2)
                            : $ba_before;
                        ?>
                        <img src="<?php echo htmlspecialchars($ba_before, ENT_QUOTES, 'UTF-8'); ?>" alt="Before" loading="lazy" decoding="async">
                        <img src="<?php echo htmlspecialchars($ba_after, ENT_QUOTES, 'UTF-8'); ?>" alt="After" loading="lazy" decoding="async">
                    </div>
                    <h3><?php echo htmlspecialchars($ba_title, ENT_QUOTES, 'UTF-8'); ?></h3>
                </article>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="dr-section dr-testimonials">
        <div class="dr-container">
            <h3>Patient Testimonials</h3>
            <p class="dr-sub dr-sub-light">Real patient experiences and transformations shared directly from our patients</p>
            <div class="dr-video-wrap">
                <button type="button" class="dr-video-nav dr-video-nav-left" aria-label="Scroll left">&#10094;</button>
                <div class="dr-video-carousel" id="drVideoCarousel">
                    <?php
                    $video_source = count($dynamic_video_testimonials) > 0 ? $dynamic_video_testimonials : $video_testimonials;
                    foreach ($video_source as $v) {
                        $title = isset($v->title) ? (string) $v->title : (string) $v['title'];
                        $video_id_raw = isset($v->youtube_id) ? (string) $v->youtube_id : (string) $v['video_id'];
                        $vid = '';
                        if (preg_match('/^[a-zA-Z0-9_-]{6,20}$/', $video_id_raw)) {
                            $vid = $video_id_raw;
                        } else {
                            $parts = @parse_url($video_id_raw);
                            if (is_array($parts)) {
                                $host = isset($parts['host']) ? strtolower($parts['host']) : '';
                                $path = isset($parts['path']) ? trim($parts['path'], '/') : '';
                                if (strpos($host, 'youtu.be') !== false && $path !== '') {
                                    $vid = explode('/', $path)[0];
                                } elseif (strpos($host, 'youtube.com') !== false || strpos($host, 'youtube-nocookie.com') !== false) {
                                    if (!empty($parts['query'])) {
                                        parse_str($parts['query'], $q);
                                        if (!empty($q['v'])) {
                                            $vid = $q['v'];
                                        }
                                    }
                                    if ($vid === '' && $path !== '') {
                                        $segs = explode('/', $path);
                                        foreach ($segs as $i => $seg) {
                                            if (($seg === 'embed' || $seg === 'shorts' || $seg === 'live') && isset($segs[$i + 1])) {
                                                $vid = $segs[$i + 1];
                                                break;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        $vid = preg_replace('/[^a-zA-Z0-9_-]/', '', (string) $vid);
                        if ($vid === '') { continue; }
                        $thumb = 'https://img.youtube.com/vi/' . $vid . '/hqdefault.jpg';
                    ?>
                    <article class="dr-video-card" data-video-id="<?php echo htmlspecialchars($vid, ENT_QUOTES, 'UTF-8'); ?>">
                        <div class="dr-video-thumb">
                            <img src="<?php echo htmlspecialchars($thumb, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                            <span class="dr-video-play">&#9658;</span>
                        </div>
                        <h3><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h3>
                    </article>
                    <?php } ?>
                </div>
                <button type="button" class="dr-video-nav dr-video-nav-right" aria-label="Scroll right">&#10095;</button>
            </div>
        </div>
    </section>

    <section class="dr-section dr-google">
        <div class="dr-container">
            <h4>Google Reviews</h4>
            <p class="dr-sub">See what our patients are saying about their experience at Dontia Dental Clinic</p>
            <a class="dr-btn dr-btn-inline" href="https://maps.app.goo.gl/Ujpqv8hHVHVkWBeL9" target="_blank" rel="noopener noreferrer">View All Reviews on Google</a>
        </div>
    </section>

    <section class="dr-section dr-gallery">
        <div class="dr-container">
            <h4>Our Gallery</h4>
            <p class="dr-sub">Meet our team and see our commitment to excellence</p>
            <?php if (count($gallery) > 0) { ?>
            <div class="dr-gallery-slider-wrap">
                <button type="button" class="dr-gallery-nav dr-gallery-nav-left" aria-label="Scroll gallery left">&#10094;</button>
                <div class="dr-gallery-slider" id="drGallerySlider">
                    <?php foreach ($gallery as $gi) {
                        if (!is_object($gi) || !isset($gi->image_name) || trim((string) $gi->image_name) === '') {
                            continue;
                        }
                        $g_src = base_url('admin/webroot/uploads/banner/' . $gi->image_name);
                    ?>
                    <article class="dr-gallery-slide">
                        <img src="<?php echo htmlspecialchars($g_src, ENT_QUOTES, 'UTF-8'); ?>" alt="Clinic gallery image" loading="lazy" decoding="async">
                    </article>
                    <?php } ?>
                </div>
                <button type="button" class="dr-gallery-nav dr-gallery-nav-right" aria-label="Scroll gallery right">&#10095;</button>
            </div>
            <?php } else { ?>
            <p class="dr-blog-empty">No gallery images found. Add images from Admin → Gallery Management.</p>
            <?php } ?>
        </div>
    </section>

    <section class="dr-section dr-certs">
        <div class="dr-container">
            <h4>Dental Certificates &amp; Awards</h4>
            <p class="dr-sub">Our commitment to excellence recognized through prestigious certifications and awards</p>
            <div class="dr-certs-grid">
                <?php
                $cert_source = count($media_certificates_list) > 0 ? $media_certificates_list : array_map(function ($ci) {
                    return (object) array('image_name' => $ci);
                }, $certs);
                foreach ($cert_source as $ci) {
                    $cert_img = !empty($ci->image_name)
                        ? (is_file(FCPATH . 'admin/webroot/uploads/dental_media/' . $ci->image_name)
                            ? site_url('admin/webroot/uploads/dental_media/' . $ci->image_name)
                            : $dental_page_defaults . $ci->image_name)
                        : base_url('assets/images/favicon.png');
                    $cert_img_esc = htmlspecialchars($cert_img, ENT_QUOTES, 'UTF-8');
                    $cert_cap = isset($ci->title) ? trim((string) $ci->title) : '';
                    if ($cert_cap === '') {
                        $cert_cap = 'Dental certificate';
                    }
                    $cert_cap_esc = htmlspecialchars($cert_cap, ENT_QUOTES, 'UTF-8');
                ?>
                <a class="dr-cert-zoom" href="<?php echo $cert_img_esc; ?>" data-fancybox="dental-certificates" data-caption="<?php echo $cert_cap_esc; ?>" data-type="image">
                    <img src="<?php echo $cert_img_esc; ?>" alt="<?php echo $cert_cap_esc; ?>" loading="lazy" decoding="async">
                </a>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="dr-section dr-blog">
        <div class="dr-container">
            <div class="dr-blog-header">
                <div class="dr-blog-head-text">
                    <h4>Latest From Our Blog</h4>
                    <p class="dr-sub dr-blog-lead">Stay informed with our latest articles on dental health and care</p>
                </div>
                <div class="dr-blog-nav" role="group" aria-label="Blog carousel controls">
                    <button type="button" class="dr-blog-nav-btn" id="drBlogPrev" aria-label="Scroll blog posts left">&#10094;</button>
                    <button type="button" class="dr-blog-nav-btn" id="drBlogNext" aria-label="Scroll blog posts right">&#10095;</button>
                </div>
            </div>
            <?php if (count($blog_carousel_rows) === 0) { ?>
            <p class="dr-blog-empty">No blog posts found. Publish posts from the admin blog (status enabled).</p>
            <?php } else { ?>
            <div class="dr-blog-strip-wrap">
                <div class="dr-blog-strip" id="drBlogCarousel">
                    <?php foreach ($blog_carousel_rows as $b) {
                        $b_img = !empty($b->blog_image) ? base_url('admin/webroot/uploads/blog/' . $b->blog_image) : base_url('assets/images/favicon.png');
                        $b_title = isset($b->post_title) ? (string) $b->post_title : 'Blog';
                        $b_permalink = isset($b->Permalink) ? strtolower(trim((string) $b->Permalink)) : '';
                        $b_permalink = preg_replace('/[^a-z0-9\s-]/', '', $b_permalink);
                        $b_permalink = trim(preg_replace('/[\s-]+/', '-', $b_permalink), '-');
                        $b_link = $b_permalink !== '' ? base_url('blog/' . $b_permalink) : (isset($b->id) ? base_url('Blog/blogdetails/' . (int) $b->id) : '#');
                        $cat = isset($b->dental_category_label) ? (string) $b->dental_category_label : 'Article';
                        $excerpt = isset($b->dental_excerpt) ? (string) $b->dental_excerpt : '';
                        $read = isset($b->dental_read_min) ? (int) $b->dental_read_min : 3;
                        $date_l = isset($b->dental_date_label) ? (string) $b->dental_date_label : '';
                    ?>
                    <article class="dr-blog-card">
                        <a class="dr-blog-card-link" href="<?php echo htmlspecialchars($b_link, ENT_QUOTES, 'UTF-8'); ?>"
                           aria-label="Read article: <?php echo htmlspecialchars($b_title, ENT_QUOTES, 'UTF-8'); ?>"></a>
                        <div class="dr-blog-card-image-wrap">
                            <img src="<?php echo htmlspecialchars($b_img, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($b_title, ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                            <span class="dr-blog-tag"><i class="fa fa-book" aria-hidden="true"></i> <?php echo htmlspecialchars($cat, ENT_QUOTES, 'UTF-8'); ?></span>
                        </div>
                        <div class="dr-blog-card-body">
                            <div class="dr-blog-meta">
                                <?php if ($date_l !== '') { ?>
                                <span class="dr-blog-meta-date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo htmlspecialchars($date_l, ENT_QUOTES, 'UTF-8'); ?></span>
                                <?php } ?>
                                <span class="dr-blog-meta-read"><?php echo $read; ?> min read</span>
                            </div>
                            <h3><?php echo htmlspecialchars($b_title, ENT_QUOTES, 'UTF-8'); ?></h3>
                            <?php if ($excerpt !== '') { ?>
                            <p class="dr-blog-excerpt"><?php echo htmlspecialchars($excerpt, ENT_QUOTES, 'UTF-8'); ?></p>
                            <?php } ?>
                            <a class="dr-blog-read" href="<?php echo htmlspecialchars($b_link, ENT_QUOTES, 'UTF-8'); ?>">Read Article <span aria-hidden="true">→</span></a>
                        </div>
                    </article>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <section class="dr-section dr-faq">
        <div class="dr-container">
            <h4>Frequently Asked Questions</h4>
            <p class="dr-sub">Find answers to common questions about our dental services</p>
            <div class="dr-faq-list">
                <?php foreach ($faqs as $faq) { ?>
                <details>
                    <summary><?php echo htmlspecialchars($faq['q'], ENT_QUOTES, 'UTF-8'); ?></summary>
                    <p><?php echo htmlspecialchars($faq['a'], ENT_QUOTES, 'UTF-8'); ?></p>
                </details>
                <?php } ?>
            </div>
        </div>
    </section>

    <script>
    (function () {
        var carousel = document.getElementById('drVideoCarousel');
        var leftBtn = document.querySelector('.dr-video-nav-left');
        var rightBtn = document.querySelector('.dr-video-nav-right');
        if (carousel && leftBtn && rightBtn) {
            leftBtn.addEventListener('click', function () {
                carousel.scrollBy({ left: -360, behavior: 'smooth' });
            });
            rightBtn.addEventListener('click', function () {
                carousel.scrollBy({ left: 360, behavior: 'smooth' });
            });
            carousel.addEventListener('click', function (e) {
                var card = e.target.closest('.dr-video-card');
                if (!card) return;
                var vid = card.getAttribute('data-video-id');
                if (!vid) return;
                var modal = document.createElement('div');
                modal.className = 'dr-video-modal';
                modal.innerHTML =
                    '<div class="dr-video-modal-inner">' +
                    '<button class="dr-video-modal-close" aria-label="Close">&times;</button>' +
                    '<iframe src="https://www.youtube.com/embed/' + vid + '" allowfullscreen title="Patient testimonial video"></iframe>' +
                    '</div>';
                document.body.appendChild(modal);
                modal.addEventListener('click', function (evt) {
                    if (evt.target === modal || evt.target.classList.contains('dr-video-modal-close')) {
                        modal.remove();
                    }
                });
            });
        }

        var drSlider = document.getElementById('drDoctorSlider');
        var drWrap = document.querySelector('.dr-doctor-slider-wrap');
        var drLeft = document.querySelector('.dr-doctor-nav-left');
        var drRight = document.querySelector('.dr-doctor-nav-right');
        var drAutoTimer = null;
        function drStopAuto() {
            if (drAutoTimer) {
                clearInterval(drAutoTimer);
                drAutoTimer = null;
            }
        }
        function drStartAuto() {
            drStopAuto();
            if (!drSlider) return;
            drAutoTimer = setInterval(function () {
                var maxScroll = drSlider.scrollWidth - drSlider.clientWidth;
                if (maxScroll <= 4) return;
                if (drSlider.scrollLeft >= maxScroll - 4) {
                    drSlider.scrollTo({ left: 0, behavior: 'smooth' });
                } else {
                    drSlider.scrollBy({ left: 300, behavior: 'smooth' });
                }
            }, 4500);
        }
        if (drSlider && drLeft && drRight) {
            drLeft.addEventListener('click', function () {
                drSlider.scrollBy({ left: -340, behavior: 'smooth' });
            });
            drRight.addEventListener('click', function () {
                drSlider.scrollBy({ left: 340, behavior: 'smooth' });
            });
        }
        if (drWrap && drSlider) {
            drWrap.addEventListener('mouseenter', drStopAuto);
            drWrap.addEventListener('mouseleave', drStartAuto);
            drStartAuto();
        }

        var blogCar = document.getElementById('drBlogCarousel');
        var blogPrev = document.getElementById('drBlogPrev');
        var blogNext = document.getElementById('drBlogNext');
        if (blogCar && blogPrev && blogNext) {
            blogPrev.addEventListener('click', function () {
                blogCar.scrollBy({ left: -340, behavior: 'smooth' });
            });
            blogNext.addEventListener('click', function () {
                blogCar.scrollBy({ left: 340, behavior: 'smooth' });
            });
        }

        var galSlider = document.getElementById('drGallerySlider');
        var galWrap = document.querySelector('.dr-gallery-slider-wrap');
        var galLeft = document.querySelector('.dr-gallery-nav-left');
        var galRight = document.querySelector('.dr-gallery-nav-right');
        var galAutoTimer = null;
        function galStopAuto() {
            if (galAutoTimer) {
                clearInterval(galAutoTimer);
                galAutoTimer = null;
            }
        }
        function galStartAuto() {
            galStopAuto();
            if (!galSlider) return;
            galAutoTimer = setInterval(function () {
                var maxScroll = galSlider.scrollWidth - galSlider.clientWidth;
                if (maxScroll <= 4) return;
                if (galSlider.scrollLeft >= maxScroll - 4) {
                    galSlider.scrollTo({ left: 0, behavior: 'smooth' });
                } else {
                    galSlider.scrollBy({ left: 420, behavior: 'smooth' });
                }
            }, 3000);
        }
        if (galSlider && galLeft && galRight) {
            galLeft.addEventListener('click', function () {
                galSlider.scrollBy({ left: -420, behavior: 'smooth' });
            });
            galRight.addEventListener('click', function () {
                galSlider.scrollBy({ left: 420, behavior: 'smooth' });
            });
        }
        if (galWrap && galSlider) {
            galWrap.addEventListener('mouseenter', galStopAuto);
            galWrap.addEventListener('mouseleave', galStartAuto);
            galStartAuto();
        }

    })();
    </script>
</div>

<?php $this->load->view('include/footer/footer'); ?>
<?php $this->load->view('include/modal_master/modal_master'); ?>
