<?php
if ( ! isset($blog_seo_row)) {
	$blog_seo_row = null;
}
$blog_meta_title = '';
$blog_meta_description = '';
$blog_post_title = '';
if (is_object($blog_seo_row)) {
	if (property_exists($blog_seo_row, 'meta_title')) {
		$blog_meta_title = trim((string) $blog_seo_row->meta_title);
	}
	if (property_exists($blog_seo_row, 'meta_description')) {
		$blog_meta_description = trim((string) $blog_seo_row->meta_description);
	}
	if (property_exists($blog_seo_row, 'post_title')) {
		$blog_post_title = trim((string) $blog_seo_row->post_title);
	}
}
?>
<div class="blog-form-card">
    <div class="blog-form-card-head">
        <h3><i class="fa fa-search"></i> SEO (meta title &amp; description)</h3>
    </div>
    <div class="blog-form-card-body">
        <p class="text-muted" style="margin:0 0 14px;font-size:12px;">Used in Google search results for this post only. Leave empty to use the post title and the first lines of the article.</p>
        <div class="blog-field">
            <label>Meta title</label>
            <input type="text" name="meta_title" class="form-control" maxlength="255"
                value="<?php echo htmlspecialchars($blog_meta_title, ENT_QUOTES, 'UTF-8'); ?>"
                placeholder="<?php echo htmlspecialchars($blog_post_title !== '' ? $blog_post_title : 'e.g. Dental Implants in Kolkata | Dontia Care Clinic', ENT_QUOTES, 'UTF-8'); ?>"/>
            <small class="hint">Recommended 50–60 characters. Does not change the on-page H1 (post title).</small>
        </div>
        <div class="blog-field">
            <label>Meta description</label>
            <textarea name="meta_description" class="form-control" rows="3" maxlength="320"
                placeholder="Short summary for search results (about 150–160 characters)."><?php echo htmlspecialchars($blog_meta_description, ENT_QUOTES, 'UTF-8'); ?></textarea>
            <small class="hint">Recommended 150–160 characters.</small>
        </div>
    </div>
</div>
