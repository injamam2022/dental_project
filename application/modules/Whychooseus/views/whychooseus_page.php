<?php
$w = $wcu_settings;
$heading = ($w && !empty($w->main_heading)) ? $w->main_heading : 'Why Choose Us';
$intro = ($w && isset($w->intro_text)) ? $w->intro_text : '';
$faq_heading = ($w && !empty($w->faq_heading)) ? $w->faq_heading : 'Still Have Doubts?';
?>
<?php if (!empty($wcu_banner)) { ?>
<section class="page-title dontia-wcu-page-title" style="background-image:url(<?php echo site_url('admin/webroot/uploads/banner/'.$wcu_banner->image_name); ?>);">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="title-box">
                <h1><?php echo htmlspecialchars($wcu_banner->image_seo_title, ENT_QUOTES, 'UTF-8'); ?></h1>
                <span class="title"><?php echo htmlspecialchars($wcu_banner->image_url_link, ENT_QUOTES, 'UTF-8'); ?></span>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li>Why Choose Us</li>
            </ul>
        </div>
    </div>
</section>
<?php } else { ?>
<section class="dontia-wcu-hero-fallback">
    <div class="auto-container">
        <div class="dontia-wcu-hero-fallback-inner">
            <h1 class="dontia-wcu-hero-fallback-title">Why Choose Us</h1>
            <ul class="bread-crumb clearfix dontia-wcu-breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li>Why Choose Us</li>
            </ul>
        </div>
    </div>
</section>
<?php } ?>

<section class="dontia-wcu-section dontia-wcu-features-section">
    <div class="dontia-wcu-section__overlay" aria-hidden="true"></div>
    <div class="auto-container dontia-wcu-section__inner">
        <h2 class="dontia-wcu-main-heading"><?php echo htmlspecialchars($heading, ENT_QUOTES, 'UTF-8'); ?></h2>
        <div class="dontia-wcu-divider" aria-hidden="true">
            <span class="dontia-wcu-divider__line"></span>
            <span class="dontia-wcu-divider__icon" title="">✦</span>
            <span class="dontia-wcu-divider__line"></span>
        </div>
        <?php if (trim($intro) !== '') { ?>
        <p class="dontia-wcu-intro"><?php echo nl2br(htmlspecialchars($intro, ENT_QUOTES, 'UTF-8')); ?></p>
        <?php } ?>

        <?php if (!empty($wcu_features)) {
            $row1 = array_slice($wcu_features, 0, 4);
            $row2 = array_slice($wcu_features, 4);
        ?>
        <div class="dontia-wcu-grid dontia-wcu-grid--four">
            <?php foreach ($row1 as $card) {
                $icon = isset($card->resolved_icon_url) ? $card->resolved_icon_url : '';
            ?>
            <article class="dontia-wcu-card">
                <?php if ($icon !== '') { ?>
                <div class="dontia-wcu-card__icon-ring">
                    <img src="<?php echo htmlspecialchars($icon, ENT_QUOTES, 'UTF-8'); ?>" alt="" width="65" height="65" loading="lazy" decoding="async"/>
                </div>
                <?php } ?>
                <h3 class="dontia-wcu-card__title"><?php echo htmlspecialchars($card->title, ENT_QUOTES, 'UTF-8'); ?></h3>
                <p class="dontia-wcu-card__desc"><?php echo nl2br(htmlspecialchars($card->description, ENT_QUOTES, 'UTF-8')); ?></p>
            </article>
            <?php } ?>
        </div>
        <?php if (!empty($row2)) { ?>
        <div class="dontia-wcu-grid dontia-wcu-grid--three">
            <?php foreach ($row2 as $card) {
                $icon = isset($card->resolved_icon_url) ? $card->resolved_icon_url : '';
            ?>
            <article class="dontia-wcu-card">
                <?php if ($icon !== '') { ?>
                <div class="dontia-wcu-card__icon-ring">
                    <img src="<?php echo htmlspecialchars($icon, ENT_QUOTES, 'UTF-8'); ?>" alt="" width="65" height="65" loading="lazy" decoding="async"/>
                </div>
                <?php } ?>
                <h3 class="dontia-wcu-card__title"><?php echo htmlspecialchars($card->title, ENT_QUOTES, 'UTF-8'); ?></h3>
                <p class="dontia-wcu-card__desc"><?php echo nl2br(htmlspecialchars($card->description, ENT_QUOTES, 'UTF-8')); ?></p>
            </article>
            <?php } ?>
        </div>
        <?php } ?>
        <?php } ?>
    </div>
</section>

<section class="dontia-wcu-section dontia-wcu-faq-section">
    <div class="dontia-wcu-section__overlay" aria-hidden="true"></div>
    <div class="auto-container dontia-wcu-section__inner">
        <h2 class="dontia-wcu-faq-heading"><?php echo htmlspecialchars($faq_heading, ENT_QUOTES, 'UTF-8'); ?></h2>
        <div class="dontia-wcu-divider dontia-wcu-divider--faq" aria-hidden="true">
            <span class="dontia-wcu-divider__line"></span>
            <span class="dontia-wcu-divider__icon" title="">✦</span>
            <span class="dontia-wcu-divider__line"></span>
        </div>

        <?php if (!empty($wcu_faqs)) { ?>
        <div class="panel-group dontia-wcu-faq-accordion" id="dontiaWcuFaqAccordion" role="tablist" aria-multiselectable="true">
            <?php
            $fi = 0;
            foreach ($wcu_faqs as $faq) {
                $fi++;
                $collapse_id = 'dontia-wcu-faq-'.$faq->id;
            ?>
            <div class="panel panel-default dontia-faq-panel">
                <div class="panel-heading dontia-faq-panel__head" role="tab" id="heading<?php echo (int) $faq->id; ?>">
                    <h4 class="panel-title">
                        <a role="button" class="collapsed" data-toggle="collapse" data-parent="#dontiaWcuFaqAccordion" href="#<?php echo htmlspecialchars($collapse_id, ENT_QUOTES, 'UTF-8'); ?>" aria-expanded="false" aria-controls="<?php echo htmlspecialchars($collapse_id, ENT_QUOTES, 'UTF-8'); ?>">
                            <?php echo (int) $fi; ?>. <?php echo htmlspecialchars($faq->question, ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </h4>
                </div>
                <div id="<?php echo htmlspecialchars($collapse_id, ENT_QUOTES, 'UTF-8'); ?>" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body dontia-faq-panel__body">
                        <?php echo $faq->answer; ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</section>
