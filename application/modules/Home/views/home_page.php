<?php
/*echo "<pre>";
print_r($this->website['data']);*/
    $content = unserialize($home_page_con[0]->banner_description);
//echo "<pre>";print_r($content);
?>    


    <section class="banner-section home-hero home-hero-video-banner" aria-label="Clinic intro video">
        <div id="demo" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                $first_banner = (isset($banner_details) && is_array($banner_details) && count($banner_details) > 0) ? $banner_details[0] : null;
                $hero_title = ($first_banner && isset($first_banner->image_seo_title) && trim((string) $first_banner->image_seo_title) !== '') ? $first_banner->image_seo_title : 'Welcome to Dontia Care Clinic';
                $hero_subtitle = ($first_banner && isset($first_banner->image_url_link) && trim((string) $first_banner->image_url_link) !== '') ? $first_banner->image_url_link : 'Your One-Stop Destination For A Radiant Smile And Timeless Beauty!';
                ?>

                <div class="carousel-item active">
                    <div class="home-hero-youtube-cover">
                        <iframe
                            class="home-hero-youtube-iframe"
                            src="https://www.youtube.com/embed/PqdEzU6_2zg?autoplay=1&amp;mute=1&amp;playsinline=1&amp;controls=0&amp;disablekb=1&amp;fs=0&amp;iv_load_policy=3&amp;rel=0&amp;modestbranding=1&amp;loop=1&amp;playlist=PqdEzU6_2zg"
                            title="Dontia Care Clinic — welcome video"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen
                            loading="eager"
                        ></iframe>
                    </div>

                    <div class="hero-slide-overlay" aria-hidden="true"></div>

                    <div class="content-box">
                        <div class="hero-content-card">
                            <div class="hero-banner-text">
                                <div class="hero-banner-title"><?php echo $hero_title; ?></div>
                                <div class="hero-banner-subtitle"><?php echo $hero_subtitle; ?></div>
                            </div>
                            <div class="hero-banner-cta">
                                <a href="#" class="hero-btn hero-btn-primary" data-toggle="modal" data-target="#dontiaAppointmentModal">Book Appointment</a>
                                <a href="<?php echo base_url('about-us'); ?>" class="hero-btn hero-btn-outline">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <?php
    $dontia_about_company = isset($this->website['data']->company_name) ? trim(strip_tags($this->website['data']->company_name)) : 'Dontia Care Clinic';
    $dontia_about_company_esc = htmlspecialchars($dontia_about_company, ENT_QUOTES, 'UTF-8');
    ?>
    <section class="about-section dontia-home-about" style="background-image: url(<?php echo base_url('assets/'); ?>images/background/1.jpg);">
        <div class="auto-container">
            <header class="dontia-about-intro">
                <h1 class="dontia-about-intro-title">About Dontiacareclinic</h1>
                <div class="dontia-about-intro-divider" aria-hidden="true">
                    <span class="dontia-about-intro-line"></span>
                    <span class="dontia-about-intro-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round">
                            <ellipse cx="24" cy="24" rx="14" ry="6" transform="rotate(0 24 24)"/>
                            <ellipse cx="24" cy="24" rx="14" ry="6" transform="rotate(60 24 24)"/>
                            <ellipse cx="24" cy="24" rx="14" ry="6" transform="rotate(-60 24 24)"/>
                            <path d="M24 14c2.5 0 4 2.2 4.2 5 .2 2.8-.5 5.5-1.2 8.2-.4 1.6-.8 3.2-1 4.8-.2 1.8-1.2 3-2.5 3h-.9c-1.4 0-2.4-1.2-2.6-3-.2-1.6-.6-3.2-1-4.8-.7-2.7-1.4-5.4-1.2-8.2.2-2.8 1.7-5 4.2-5z"/>
                        </svg>
                    </span>
                    <span class="dontia-about-intro-line"></span>
                </div>
            </header>
        </div>
        <div class="dontia-about-split-shell">
            <div class="auto-container dontia-about-split-inner">
                <div class="row no-gutters dontia-about-row">
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column dontia-about-visual">
                            <div class="image-box dontia-about-photos">
                                <figure class="image wow fadeInRight" data-wow-delay="200ms">
                                    <img src="<?php echo base_url('admin/webroot/uploads/home/').$content[0][1]; ?>" alt="<?php echo $dontia_about_company_esc; ?>">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column wow fadeInLeft">
                            <div class="content-box dontia-about-card">
                                <div class="text dontia-about-body"><?php echo $content[0][0]; ?></div>
                                <div class="link-box"><a href="<?php echo base_url('about-us'); ?>" class="theme-btn btn-style-one dontia-about-cta">About Us</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    


<?php
$dontia_dental_services = array();
$dontia_skin_services = array();
if (!empty($Services) && is_array($Services)) {
    foreach ($Services as $_svc) {
        if (!isset($_svc->citation) || strcasecmp(trim($_svc->citation), 'Yes') !== 0) {
            continue;
        }
        $cat_l = isset($_svc->cat_name) ? strtolower(trim((string) $_svc->cat_name)) : '';
        if ($cat_l !== '' && (strpos($cat_l, 'skin') !== false || strpos($cat_l, 'derma') !== false || strpos($cat_l, 'facial') !== false)) {
            $dontia_skin_services[] = $_svc;
        } else {
            $dontia_dental_services[] = $_svc;
        }
    }
}
$dontia_has_dental = count($dontia_dental_services) > 0;
$dontia_has_skin = count($dontia_skin_services) > 0;
$dontia_show_tabs = $dontia_has_dental && $dontia_has_skin;
$dontia_render_dental_panel = ($dontia_has_dental || $dontia_show_tabs);
$dontia_render_skin_panel = ($dontia_has_skin || $dontia_show_tabs);
?>
<section class="after-slider-wrap dontia-services-section" style="background-image: url(<?php echo base_url('assets/'); ?>images/background/2.jpg);">
    <div class="container">
        <header class="dontia-services-intro">
            <h2 class="dontia-services-intro-title">Our Service</h2>
            <div class="dontia-services-intro-divider" aria-hidden="true">
                <span class="dontia-services-intro-line"></span>
                <span class="dontia-services-intro-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round">
                        <ellipse cx="24" cy="24" rx="14" ry="6" transform="rotate(0 24 24)"/>
                        <ellipse cx="24" cy="24" rx="14" ry="6" transform="rotate(60 24 24)"/>
                        <ellipse cx="24" cy="24" rx="14" ry="6" transform="rotate(-60 24 24)"/>
                        <path d="M24 14c2.5 0 4 2.2 4.2 5 .2 2.8-.5 5.5-1.2 8.2-.4 1.6-.8 3.2-1 4.8-.2 1.8-1.2 3-2.5 3h-.9c-1.4 0-2.4-1.2-2.6-3-.2-1.6-.6-3.2-1-4.8-.7-2.7-1.4-5.4-1.2-8.2.2-2.8 1.7-5 4.2-5z"/>
                    </svg>
                </span>
                <span class="dontia-services-intro-line"></span>
            </div>
        </header>

        <?php if ($dontia_show_tabs) { ?>
        <div class="dontia-services-tablist" role="tablist" aria-label="Service categories">
            <button type="button" class="dontia-services-tab dontia-services-tab--dental is-active" role="tab" aria-selected="true" aria-controls="dontia-panel-dental" id="dontia-tab-dental" data-target="dontia-panel-dental">
                <span class="dontia-services-tab-ic" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
                </span>
                <span>Dental Services</span>
            </button>
            <button type="button" class="dontia-services-tab dontia-services-tab--skin" role="tab" aria-selected="false" aria-controls="dontia-panel-skin" id="dontia-tab-skin" data-target="dontia-panel-skin">
                <span class="dontia-services-tab-ic" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="9" r="3"/><path d="M6.5 20a5.5 5.5 0 0 1 11 0" stroke-linecap="round"/></svg>
                </span>
                <span>Skin Care Services</span>
            </button>
        </div>
        <?php } elseif ($dontia_has_dental) { ?>
        <div class="dontia-services-tablist dontia-services-tablist--single">
            <div class="dontia-services-tab dontia-services-tab--dental is-active dontia-services-tab-static" role="heading" aria-level="3" id="dontia-tab-dental">
                <span class="dontia-services-tab-ic" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
                </span>
                <span>Dental Services</span>
            </div>
        </div>
        <?php } elseif ($dontia_has_skin) { ?>
        <div class="dontia-services-tablist dontia-services-tablist--single">
            <div class="dontia-services-tab dontia-services-tab--skin is-active dontia-services-tab-static" role="heading" aria-level="3" id="dontia-tab-skin">
                <span class="dontia-services-tab-ic" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="9" r="3"/><path d="M6.5 20a5.5 5.5 0 0 1 11 0" stroke-linecap="round"/></svg>
                </span>
                <span>Skin Care Services</span>
            </div>
        </div>
        <?php } ?>

        <?php
        $dontia_render_cards = function ($list, $appt_service_preset = '') {
            if (empty($list)) {
                echo '<div class="col-12"><p class="dontia-services-empty">No services to show yet.</p></div>';
                return;
            }
            $preset_esc = htmlspecialchars($appt_service_preset, ENT_QUOTES, 'UTF-8');
            foreach ($list as $svc) {
                $detail = base_url('Services/' . (int) $svc->pro_id . '/0/detail');
                $img = !empty($svc->pro_image) ? base_url('admin/webroot/uploads/product/') . $svc->pro_image : '';
                $name = htmlspecialchars($svc->product_name, ENT_QUOTES, 'UTF-8');
                $plain = trim(preg_replace('/\s+/', ' ', strip_tags((string) $svc->product_description)));
                $excerpt = $plain;
                if (strlen($excerpt) > 130) {
                    $excerpt = substr($excerpt, 0, 130) . '…';
                }
                ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <article class="dontia-service-card">
                <a href="<?php echo $detail; ?>" class="dontia-service-card-ring">
                    <?php if ($img !== '') { ?>
                    <span class="dontia-service-card-img" style="background-image:url('<?php echo htmlspecialchars($img, ENT_QUOTES, 'UTF-8'); ?>')"></span>
                    <?php } else { ?>
                    <span class="dontia-service-card-img dontia-service-card-img--placeholder"></span>
                    <?php } ?>
                </a>
                <h3 class="dontia-service-card-title"><a href="<?php echo $detail; ?>"><?php echo $name; ?></a></h3>
                <p class="dontia-service-card-desc"><em><?php echo htmlspecialchars($excerpt, ENT_QUOTES, 'UTF-8'); ?> <a href="<?php echo $detail; ?>" class="dontia-service-card-more">read more</a></em></p>
                <a href="#" class="dontia-service-card-book" data-toggle="modal" data-target="#dontiaAppointmentModal"<?php echo $appt_service_preset !== '' ? ' data-preselect-service="'.$preset_esc.'"' : ''; ?>>Book Now</a>
            </article>
        </div>
                <?php
            }
        };
        ?>

        <?php if ($dontia_render_dental_panel) { ?>
        <div id="dontia-panel-dental" class="dontia-services-panel" role="tabpanel" aria-labelledby="dontia-tab-dental">
            <div class="row dontia-services-grid">
                <?php $dontia_render_cards($dontia_dental_services, 'Dental'); ?>
            </div>
        </div>
        <?php } ?>

        <?php if ($dontia_render_skin_panel) { ?>
        <div id="dontia-panel-skin" class="dontia-services-panel" role="tabpanel" aria-labelledby="dontia-tab-skin"<?php echo $dontia_show_tabs ? ' hidden' : ''; ?>>
            <div class="row dontia-services-grid">
                <?php $dontia_render_cards($dontia_skin_services, 'Skin Treatment'); ?>
            </div>
        </div>
        <?php } ?>

        <?php if (!$dontia_render_dental_panel && !$dontia_render_skin_panel) { ?>
        <p class="dontia-services-empty">No featured services yet. Mark products as “Show on home” (citation) in the admin.</p>
        <?php } ?>
    </div>
</section>

<?php
$tech_title = (isset($technology_settings) && !empty($technology_settings->section_title))
    ? $technology_settings->section_title
    : 'Latest Technology';
$dontia_team_members = array(
    array(
        'name' => 'Dr. Harleen Kaur Sethi',
        'role' => 'Principal Dentist',
        'photo' => 'dr-harleen.jpg',
        'social' => array(
            'facebook' => '',
            'twitter' => '',
            'youtube' => '',
            'linkedin' => '',
        ),
    ),
    array(
        'name' => 'Dr. Prabhjeet Singh Sethi',
        'role' => 'Principal Dentist',
        'photo' => 'dr-prabhjeet.jpg',
        'social' => array(
            'facebook' => '',
            'twitter' => '',
            'youtube' => '',
            'linkedin' => '',
        ),
    ),
);
$dontia_team_placeholder = base_url('assets/images/team/placeholder.svg');
?>
<h3 class="sr-only">Dental Services</h3>
<h3 class="sr-only">Skin Care Services</h3>
<?php if (!empty($technology_cards)) { ?>
<section class="dr-section dr-tech home-tech-sync" id="latest-technology">
    <div class="dr-container">
        <div class="dr-tech-head">
            <h3>Latest Technology</h3>
            <div class="dr-tech-divider" aria-hidden="true">
                <span class="dr-tech-divider-line"></span>
                <span class="dr-tech-divider-gem">💎</span>
                <span class="dr-tech-divider-line"></span>
            </div>
        </div>
        <div class="dr-tech-grid">
            <?php
            foreach ($technology_cards as $ti) {
                $img_esc = htmlspecialchars(isset($ti['image_url']) ? $ti['image_url'] : '', ENT_QUOTES, 'UTF-8');
                $lab_esc = htmlspecialchars(isset($ti['title']) ? $ti['title'] : '', ENT_QUOTES, 'UTF-8');
                $desc_esc = htmlspecialchars(isset($ti['description']) ? $ti['description'] : '', ENT_QUOTES, 'UTF-8');
                ?>
            <article class="dr-tech-card">
                <img src="<?php echo $img_esc; ?>" alt="<?php echo $lab_esc; ?>">
                <div class="dr-tech-overlay">
                    <h3><?php echo $lab_esc; ?></h3>
                    <p class="dr-tech-desc"><?php echo $desc_esc; ?></p>
                </div>
            </article>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<section class="dontia-team-section" id="our-team" aria-labelledby="dontia-team-heading">
    <div class="auto-container">
        <div class="row dontia-team-layout align-items-center">
            <div class="col-lg-4 col-md-12 dontia-team-heading-col">
                <h2 id="dontia-team-heading" class="dontia-team-title">Meet Our Team Members</h2>
                <p class="dontia-team-sub">Board-led care across <strong>dental</strong>, <strong>skin</strong>, and <strong>ENT</strong>—clear treatment plans and a calm, patient-first experience.</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="dontia-team-grid">
                    <?php
                    foreach ($dontia_team_members as $member) {
                        $name_esc = htmlspecialchars($member['name'], ENT_QUOTES, 'UTF-8');
                        $role_esc = htmlspecialchars($member['role'], ENT_QUOTES, 'UTF-8');
                        $photo_rel = isset($member['photo']) ? $member['photo'] : '';
                        $photo_path = $photo_rel !== '' ? FCPATH . 'assets/images/team/' . $photo_rel : '';
                        $photo_url = ($photo_rel !== '' && is_file($photo_path))
                            ? base_url('assets/images/team/' . $photo_rel)
                            : $dontia_team_placeholder;
                        $photo_url_esc = htmlspecialchars($photo_url, ENT_QUOTES, 'UTF-8');
                        $soc_map = array(
                            'facebook' => array('icon' => 'fa-facebook', 'label' => 'Facebook'),
                            'twitter' => array('icon' => 'fa-twitter', 'label' => 'Twitter'),
                            'youtube' => array('icon' => 'fa-youtube-play', 'label' => 'YouTube'),
                            'linkedin' => array('icon' => 'fa-linkedin', 'label' => 'LinkedIn'),
                        );
                        ?>
                    <article class="dontia-team-card">
                        <div class="dontia-team-card-visual">
                            <img class="dontia-team-photo" src="<?php echo $photo_url_esc; ?>" alt="<?php echo $name_esc; ?>" width="400" height="320" loading="lazy">
                            <div class="dontia-team-name-pill"><?php echo $name_esc; ?></div>
                        </div>
                        <div class="dontia-team-card-body">
                            <p class="dontia-team-role"><?php echo $role_esc; ?></p>
                            <ul class="dontia-team-social" aria-label="Social profiles">
                                <?php
                                foreach ($soc_map as $key => $meta) {
                                    $href = isset($member['social'][$key]) ? trim((string) $member['social'][$key]) : '';
                                    $lab_a = htmlspecialchars($meta['label'], ENT_QUOTES, 'UTF-8');
                                    ?>
                                <li>
                                    <?php if ($href !== '') {
                                        $h_esc = htmlspecialchars($href, ENT_QUOTES, 'UTF-8');
                                        ?>
                                    <a class="dontia-team-social-btn" href="<?php echo $h_esc; ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo $lab_a; ?>">
                                        <i class="fa <?php echo $meta['icon']; ?>" aria-hidden="true"></i>
                                    </a>
                                        <?php
                                    } else {
                                        ?>
                                    <span class="dontia-team-social-btn dontia-team-social-btn--placeholder" aria-hidden="true" title="Add <?php echo $lab_a; ?> URL in home_page.php">
                                        <i class="fa <?php echo $meta['icon']; ?>" aria-hidden="true"></i>
                                    </span>
                                        <?php
                                    }
                                    ?>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </article>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$tes_list = (isset($tes_details) && is_array($tes_details)) ? $tes_details : array();
$dontia_testimonial_videos = array();
$tv_rows = isset($testimonial_videos) ? $testimonial_videos : array();
if (!is_array($tv_rows)) {
    $tv_rows = array();
}
$dontia_parse_youtube_id = function ($raw) {
    $raw = trim((string) $raw);
    if ($raw === '') {
        return '';
    }
    if (preg_match('/^[a-zA-Z0-9_-]{6,32}$/', $raw)) {
        return $raw;
    }
    $parts = @parse_url($raw);
    if (!is_array($parts)) {
        return '';
    }
    $host = isset($parts['host']) ? strtolower((string) $parts['host']) : '';
    $path = isset($parts['path']) ? trim((string) $parts['path'], '/') : '';
    if (strpos($host, 'youtu.be') !== false && $path !== '') {
        $id = explode('/', $path)[0];
        return preg_replace('/[^a-zA-Z0-9_-]/', '', $id);
    }
    if (strpos($host, 'youtube.com') !== false || strpos($host, 'youtube-nocookie.com') !== false) {
        if (!empty($parts['query'])) {
            parse_str($parts['query'], $q);
            if (!empty($q['v'])) {
                return preg_replace('/[^a-zA-Z0-9_-]/', '', (string) $q['v']);
            }
        }
        $segments = $path !== '' ? explode('/', $path) : array();
        foreach ($segments as $idx => $seg) {
            if (($seg === 'embed' || $seg === 'shorts' || $seg === 'live') && isset($segments[$idx + 1])) {
                return preg_replace('/[^a-zA-Z0-9_-]/', '', (string) $segments[$idx + 1]);
            }
        }
    }
    return '';
};
foreach ($tv_rows as $tv_row) {
    if (!is_object($tv_row)) {
        continue;
    }
    $yid = isset($tv_row->youtube_id) ? $dontia_parse_youtube_id((string) $tv_row->youtube_id) : '';
    if ($yid === '') {
        continue;
    }
    $dontia_testimonial_videos[] = array(
        'id' => $yid,
        'label' => isset($tv_row->title) ? (string) $tv_row->title : '',
    );
}
unset($dontia_parse_youtube_id);
?>
    <section class="testimonial-section dontia-testimonial" aria-labelledby="dontia-testimonial-heading">
        <div class="auto-container dontia-testimonial-inner">
            <header class="dontia-testimonial-intro">
                <h3 id="dontia-testimonial-heading" class="dontia-testimonial-title">Patient Testimonials</h3>
                <div class="dontia-testimonial-divider" aria-hidden="true">
                    <span class="dontia-testimonial-divider-line"></span>
                    <span class="dontia-testimonial-divider-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.35" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M24 6c2.9 0 5.2 1.7 6.2 4.3.7 1.8.8 3.9.3 6.1l-1.7 8.6c-.4 1.9-.6 3.9-.4 5.9l.9 10.8c.2 2.2-1.3 4.1-3.4 4.1-1.6 0-2.9-1.1-3.3-2.8l-1.1-6.4c-.3-1.6-1.4-1.6-1.7 0l-1.1 6.4c-.4 1.7-1.7 2.8-3.3 2.8-2.1 0-3.6-1.9-3.4-4.1l.9-10.8c.2-2 0-4-.4-5.9l-1.7-8.6c-.5-2.2-.4-4.3.3-6.1 1-2.6 3.3-4.3 6.2-4.3z"/>
                        </svg>
                    </span>
                    <span class="dontia-testimonial-divider-line"></span>
                </div>
                <p class="dontia-testimonial-lead">Real patient experiences and transformations shared directly from our patients.</p>
            </header>

            <?php if (count($tes_list) > 0) { ?>
            <div class="testimonial-carousel owl-carousel owl-theme dontia-testimonial-carousel">
                <?php foreach ($tes_list as $tes) {
                    $img_path = !empty($tes->image_name)
                        ? base_url('admin/webroot/uploads/testimonial/') . $tes->image_name
                        : '';
                    $client = isset($tes->client_name) ? htmlspecialchars($tes->client_name, ENT_QUOTES, 'UTF-8') : '';
                    $rating_raw = 5;
                    if (isset($tes->rating) && $tes->rating !== '' && $tes->rating !== null) {
                        $rating_raw = (int) $tes->rating;
                    }
                    if ($rating_raw < 0) {
                        $rating_raw = 0;
                    }
                    if ($rating_raw > 5) {
                        $rating_raw = 5;
                    }
                    $avatar_alt = $client !== '' ? $client : 'Client photo';
                    ?>
                <div class="testimonial-block dontia-testimonial-slide">
                    <div class="dontia-testimonial-slide-inner">
                        <div class="dontia-testimonial-quote-mark" aria-hidden="true">“</div>
                        <div class="text dontia-testimonial-quote"><p><?php echo $tes->tes_description; ?></p></div>
                        <div class="dontia-testimonial-author">
                            <?php if ($img_path !== '') { ?>
                            <div class="dontia-testimonial-avatar">
                                <img src="<?php echo htmlspecialchars($img_path, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($avatar_alt, ENT_QUOTES, 'UTF-8'); ?>" width="72" height="72" loading="lazy">
                            </div>
                            <?php } ?>
                            <?php if ($client !== '') { ?>
                            <h4 class="name dontia-testimonial-name"><?php echo $client; ?></h4>
                            <?php } ?>
                            <div class="dontia-testimonial-stars" aria-label="<?php echo $rating_raw; ?> out of 5 stars">
                                <?php
                                for ($s = 1; $s <= 5; $s++) {
                                    $filled = $s <= $rating_raw;
                                    ?>
                                <span class="fa fa-star dontia-testimonial-star<?php echo $filled ? ' is-filled' : ''; ?>" aria-hidden="true"></span>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } else { ?>
            <p class="dontia-testimonial-empty">Patient stories will appear here once testimonials are added in the admin.</p>
            <?php } ?>

            <?php if (!empty($dontia_testimonial_videos)) { ?>
            <div class="dontia-testimonial-video-row">
                <?php foreach ($dontia_testimonial_videos as $vid) {
                    $yid = isset($vid['id']) ? preg_replace('/[^a-zA-Z0-9_-]/', '', (string) $vid['id']) : '';
                    if ($yid === '') {
                        continue;
                    }
                    $vlabel = isset($vid['label']) ? htmlspecialchars((string) $vid['label'], ENT_QUOTES, 'UTF-8') : '';
                    $thumb = 'https://img.youtube.com/vi/' . $yid . '/mqdefault.jpg';
                    $watch = 'https://www.youtube.com/watch?v=' . $yid;
                    ?>
                <a class="dontia-testimonial-video-card" href="<?php echo htmlspecialchars($watch, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer">
                    <span class="dontia-testimonial-video-thumb" style="background-image:url('<?php echo htmlspecialchars($thumb, ENT_QUOTES, 'UTF-8'); ?>')"></span>
                    <span class="dontia-testimonial-video-play" aria-hidden="true"><span class="fa fa-youtube-play"></span></span>
                    <?php if ($vlabel !== '') { ?>
                    <span class="dontia-testimonial-video-label"><?php echo $vlabel; ?></span>
                    <?php } ?>
                </a>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </section>
  
    <!-- <section class="news-section">
        <div class="auto-container">
            <div class="sec-title">
                <span class="float-text">Blogs</span>
                <h2>Our Blog</h2>
            </div>
            <div class="row">
                
                
                 <?php
    
                            
                           for($z=0;$z<count($blog_details_desc);$z++)
                           {
                               $permalink = strtolower(trim((string) $blog_details_desc[$z]->Permalink));
                               $permalink = preg_replace('/[^a-z0-9\s-]/', '', $permalink);
                               $permalink = trim(preg_replace('/[\s-]+/', '-', $permalink), '-');
                               $blog_url = $permalink !== '' ? base_url('blog/'.$permalink) : base_url('Blog/blogdetails/'.$blog_details_desc[$z]->id);
                         ?>
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="<?php echo base_url('/admin/webroot/uploads/blog/'.$blog_details_desc[$z]->blog_image); ?>" alt=""></figure>
                        </div>
                        <div class="caption-box">
                            <h3>  <a href="<?php echo $blog_url; ?>"><?php echo  $blog_details_desc[$z]->post_title; ?> </a></h3>
                            <ul class="info">
                                <li><?php  echo $deadline = date('d', strtotime($blog_details_desc[$z]->dat)); ?>, <?php echo $deadline = date('Y', strtotime($blog_details_desc[$z]->dat)); ?></li>
                                <li>By Admin</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
               
                
                <?php } ?>

                
            </div>
        </div>
    </section> -->
   

