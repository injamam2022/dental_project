<?php
$banner = $banner_details[0];
$cat_title = isset($services_cat_title) ? $services_cat_title : 'Services';
$cat_esc = htmlspecialchars($cat_title, ENT_QUOTES, 'UTF-8');
$appt_preset = isset($appointment_service_preset) ? $appointment_service_preset : '';
$appt_preset_esc = htmlspecialchars($appt_preset, ENT_QUOTES, 'UTF-8');
$this->load->helper('dontia_performance');
?>
<section class="page-title dontia-services-page-title" style="background-image:url(<?php echo site_url('admin/webroot/uploads/banner/' . $banner->image_name); ?>);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1><?php echo $cat_esc; ?></h1>
                    <span class="title"><?php echo htmlspecialchars($banner->image_url_link, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>">Services</a></li>
                    <li><?php echo $cat_esc; ?></li>
                </ul>
            </div>
        </div>
</section>

<section class="dontia-services-page dontia-services-section">
    <div class="auto-container">
        <?php if (empty($Services)) { ?>
        <p class="dontia-services-page-empty">No services are available in this category yet.</p>
        <?php } else { ?>
        <div class="row dontia-services-grid dontia-services-page-grid">
            <?php
            foreach ($Services as $Service) {
                $detail = base_url('Services/' . (int) $Service->pro_id . '/0/detail');
                $pic = !empty($Service->pro_image) ? dontia_service_card_picture($Service->pro_image, $Service->product_name) : null;
                $name = htmlspecialchars($Service->product_name, ENT_QUOTES, 'UTF-8');
                $ring_label = htmlspecialchars('View ' . trim(strip_tags((string) $Service->product_name)), ENT_QUOTES, 'UTF-8');
                $plain = trim(preg_replace('/\s+/', ' ', strip_tags((string) $Service->product_description)));
                $excerpt = $plain;
                if (strlen($excerpt) > 160) {
                    $excerpt = substr($excerpt, 0, 160) . '…';
                }
                ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <article class="dontia-service-card">
                    <a href="<?php echo $detail; ?>" class="dontia-service-card-ring" aria-label="<?php echo $ring_label; ?>">
                        <?php if (is_array($pic) && $pic['src'] !== '') {
                            $pic_alt = htmlspecialchars(trim(strip_tags((string) $Service->product_name)), ENT_QUOTES, 'UTF-8');
                            ?>
                    <picture>
                        <?php if ($pic['webp_srcset'] !== '') { ?>
                        <source type="image/webp" srcset="<?php echo htmlspecialchars($pic['webp_srcset'], ENT_QUOTES, 'UTF-8'); ?>" sizes="<?php echo htmlspecialchars($pic['sizes'], ENT_QUOTES, 'UTF-8'); ?>">
                        <?php } ?>
                        <img class="dontia-service-card-img" src="<?php echo htmlspecialchars($pic['src'], ENT_QUOTES, 'UTF-8'); ?>"
                            <?php if ($pic['srcset'] !== '') { ?>srcset="<?php echo htmlspecialchars($pic['srcset'], ENT_QUOTES, 'UTF-8'); ?>" sizes="<?php echo htmlspecialchars($pic['sizes'], ENT_QUOTES, 'UTF-8'); ?>"<?php } ?>
                            alt="<?php echo $pic_alt; ?>" width="100" height="100" loading="lazy" decoding="async">
                    </picture>
                        <?php } else { ?>
                    <span class="dontia-service-card-img dontia-service-card-img--placeholder" aria-hidden="true"></span>
                        <?php } ?>
                    </a>
                    <h3 class="dontia-service-card-title"><a href="<?php echo $detail; ?>"><?php echo $name; ?></a></h3>
                    <p class="dontia-service-card-desc"><em><?php echo htmlspecialchars($excerpt, ENT_QUOTES, 'UTF-8'); ?> <a href="<?php echo $detail; ?>" class="dontia-service-card-more">Read more about <?php echo $name; ?></a></em></p>
                    <a href="#" class="dontia-service-card-book" data-toggle="modal" data-target="#dontiaAppointmentModal"<?php echo $appt_preset !== '' ? ' data-preselect-service="'.$appt_preset_esc.'"' : ''; ?>>Book Now</a>
                </article>
            </div>
                <?php
            }
            ?>
        </div>
        <?php } ?>
    </div>
</section>
