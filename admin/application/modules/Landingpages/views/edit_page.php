<?php
$p = $page;
$v = function ($field, $default = '') use ($p) {
    return isset($p->{$field}) ? (string) $p->{$field} : $default;
};
$checked = function ($field) use ($p) {
    return !isset($p->{$field}) || (int) $p->{$field} === 1 ? ' checked' : '';
};
?>
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li><a href="<?php echo site_url('Landingpages'); ?>">Dental Pages</a></li>
    <li class="active"><?php echo htmlspecialchars($p->page_label, ENT_QUOTES, 'UTF-8'); ?></li>
</ul>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="post" action="<?php echo site_url('Landingpages/update'); ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo (int) $p->id; ?>">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Edit <?php echo htmlspecialchars($p->page_label, ENT_QUOTES, 'UTF-8'); ?></strong></h3>
                        <div class="btn-group pull-right" style="margin-right:2%;">
                            <a class="btn btn-default" href="<?php echo site_url('Landingpages/items/' . encode_url($p->id)); ?>"><i class="fa fa-th"></i> Manage items</a>
                            <a class="btn btn-primary" href="<?php echo site_url('Landingpages'); ?>"><i class="fa fa-list-alt"></i> All pages</a>
                        </div>
                    </div>
                    <div class="panel-body">

                        <h4>Page</h4>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Admin label</label>
                            <div class="col-md-6"><input type="text" name="page_label" class="form-control" value="<?php echo htmlspecialchars($v('page_label'), ENT_QUOTES, 'UTF-8'); ?>" required></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Brand name on page</label>
                            <div class="col-md-6"><input type="text" name="brand_name" class="form-control" value="<?php echo htmlspecialchars($v('brand_name'), ENT_QUOTES, 'UTF-8'); ?>"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status</label>
                            <div class="col-md-6">
                                <select name="status" class="form-control">
                                    <option value="active" <?php echo $p->status === 'active' ? 'selected' : ''; ?>>Active</option>
                                    <option value="inactivate" <?php echo $p->status === 'inactivate' ? 'selected' : ''; ?>>Inactivate</option>
                                </select>
                            </div>
                        </div>

                        <h4>Hero banner</h4>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Heading</label>
                            <div class="col-md-6"><input type="text" name="hero_heading" class="form-control" value="<?php echo htmlspecialchars($v('hero_heading'), ENT_QUOTES, 'UTF-8'); ?>"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Subheading</label>
                            <div class="col-md-6"><textarea name="hero_subheading" class="form-control" rows="3"><?php echo htmlspecialchars($v('hero_subheading'), ENT_QUOTES, 'UTF-8'); ?></textarea></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Hero image</label>
                            <div class="col-md-6">
                                <input type="file" name="hero_image_file" accept="image/*">
                                <input type="text" name="hero_image" class="form-control" style="margin-top:8px;" value="<?php echo htmlspecialchars($v('hero_image'), ENT_QUOTES, 'UTF-8'); ?>" placeholder="Or keep / paste an existing image path">
                                <?php if ($v('hero_image') !== '') { ?><img src="<?php echo htmlspecialchars(dontia_landing_image_url($v('hero_image')), ENT_QUOTES, 'UTF-8'); ?>" alt="" style="max-height:80px;margin-top:8px;"><?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Hero image alt text</label>
                            <div class="col-md-6"><input type="text" name="hero_image_alt" class="form-control" value="<?php echo htmlspecialchars($v('hero_image_alt'), ENT_QUOTES, 'UTF-8'); ?>"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Optional YouTube video ID</label>
                            <div class="col-md-6"><input type="text" name="hero_video_id" class="form-control" value="<?php echo htmlspecialchars($v('hero_video_id'), ENT_QUOTES, 'UTF-8'); ?>" placeholder="e.g. dszEUoxTmKk"></div>
                        </div>

                        <h4>About / intro</h4>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Heading</label>
                            <div class="col-md-6"><input type="text" name="intro_heading" class="form-control" value="<?php echo htmlspecialchars($v('intro_heading'), ENT_QUOTES, 'UTF-8'); ?>"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Intro content</label>
                            <div class="col-md-8"><textarea name="intro_html" class="form-control ckeditor" rows="8"><?php echo $v('intro_html'); ?></textarea></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Intro image</label>
                            <div class="col-md-6">
                                <input type="file" name="intro_image_file" accept="image/*">
                                <input type="text" name="intro_image" class="form-control" style="margin-top:8px;" value="<?php echo htmlspecialchars($v('intro_image'), ENT_QUOTES, 'UTF-8'); ?>">
                                <?php if ($v('intro_image') !== '') { ?><img src="<?php echo htmlspecialchars(dontia_landing_image_url($v('intro_image')), ENT_QUOTES, 'UTF-8'); ?>" alt="" style="max-height:80px;margin-top:8px;"><?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Intro image alt text</label>
                            <div class="col-md-6"><input type="text" name="intro_image_alt" class="form-control" value="<?php echo htmlspecialchars($v('intro_image_alt'), ENT_QUOTES, 'UTF-8'); ?>"></div>
                        </div>

                        <h4>Extra page content (unique sections)</h4>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Extra HTML</label>
                            <div class="col-md-8"><textarea name="extra_html" class="form-control ckeditor" rows="8"><?php echo $v('extra_html'); ?></textarea>
                                <p class="help-block">Shown when “Show extra content” is checked. Use this for unique educational copy.</p>
                            </div>
                        </div>

                        <h4>Section headings</h4>
                        <?php
                        $heads = array(
                            'why_heading' => 'Why choose — heading',
                            'why_subheading' => 'Why choose — subheading',
                            'specialisations_heading' => 'Specialisations — heading',
                            'specialisations_subheading' => 'Specialisations — subheading',
                            'stats_heading' => 'Stats — heading',
                            'services_heading' => 'Services — heading',
                            'services_subheading' => 'Services — subheading',
                            'doctors_heading' => 'Doctors — heading',
                            'procedures_heading' => 'Procedures — heading',
                            'procedures_subheading' => 'Procedures — subheading',
                            'tech_heading' => 'Technology — heading',
                            'transform_heading' => 'Transformations — heading',
                            'testimonials_heading' => 'Video testimonials — heading',
                            'testimonials_subheading' => 'Video testimonials — subheading',
                            'reviews_heading' => 'Google reviews — heading',
                            'reviews_subheading' => 'Google reviews — subheading',
                            'reviews_url' => 'Google reviews URL',
                            'gallery_heading' => 'Gallery — heading',
                            'gallery_subheading' => 'Gallery — subheading',
                            'certs_heading' => 'Certificates — heading',
                            'certs_subheading' => 'Certificates — subheading',
                            'blog_heading' => 'Blog — heading',
                            'blog_subheading' => 'Blog — subheading',
                            'faq_heading' => 'FAQ — heading',
                            'faq_subheading' => 'FAQ — subheading',
                            'cta_heading' => 'Bottom CTA — heading',
                        );
                        foreach ($heads as $name => $label) { ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></label>
                            <div class="col-md-6"><input type="text" name="<?php echo $name; ?>" class="form-control" value="<?php echo htmlspecialchars($v($name), ENT_QUOTES, 'UTF-8'); ?>"></div>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Bottom CTA text</label>
                            <div class="col-md-8"><textarea name="cta_html" class="form-control ckeditor" rows="4"><?php echo $v('cta_html'); ?></textarea></div>
                        </div>

                        <h4>Which sections to show</h4>
                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-8">
                                <?php
                                $flags = array(
                                    'show_specialisations' => 'Specialisations',
                                    'show_stats' => 'Stats',
                                    'show_services' => 'Service cards',
                                    'show_doctors' => 'Doctors',
                                    'show_procedures' => 'Procedures',
                                    'show_tech' => 'Technology',
                                    'show_transformations' => 'Transformations',
                                    'show_videos' => 'Video testimonials',
                                    'show_reviews' => 'Google reviews',
                                    'show_gallery' => 'Gallery',
                                    'show_certs' => 'Certificates',
                                    'show_blogs' => 'Blog',
                                    'show_faqs' => 'FAQs',
                                    'show_locations' => 'Clinic location cards',
                                    'show_extra' => 'Extra content',
                                    'show_cta' => 'Bottom CTA',
                                );
                                foreach ($flags as $name => $label) { ?>
                                    <label class="checkbox-inline" style="margin:4px 12px 4px 0;">
                                        <input type="checkbox" name="<?php echo $name; ?>" value="1"<?php echo $checked($name); ?>> <?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                                    </label>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary pull-right">Save page content</button>
                        <a class="btn btn-default" href="<?php echo site_url('Landingpages'); ?>">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
