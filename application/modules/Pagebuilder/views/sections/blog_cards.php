<?php defined('BASEPATH') OR exit('No direct script access allowed');
$posts = isset($sec->live) && is_array($sec->live) ? $sec->live : array();
$all_url = pb_site_base() . ($f['category'] === 'skin-care' ? 'skin-care-blog' : 'dental-blog');
?>
<div class="container">
	<?php echo pb_section_head($f['heading'], $f['intro']); ?>
	<?php if (!empty($posts)) { ?>
	<div class="pb-grid pb-grid--3 pb-blogs">
		<?php foreach ($posts as $b) {
			$title = trim((string) (isset($b->post_title) ? $b->post_title : 'Blog'));
			$permalink = isset($b->Permalink) ? strtolower(trim((string) $b->Permalink)) : '';
			$permalink = trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^a-z0-9\s-]/', '', $permalink)), '-');
			$href = $permalink !== '' ? pb_site_base() . 'blog/' . $permalink : pb_site_base() . 'Blog/blogdetails/' . (int) $b->id;
			$img_name = trim((string) (isset($b->blog_image) ? $b->blog_image : ''));
			$img = ($img_name !== '' && $img_name !== '0') ? 'admin/webroot/uploads/blog/' . basename($img_name) : '';
			$is_fallback = ($img === '' || pb_image_path($img) === '');
			if ($is_fallback) { $img = 'assets/images/favicon.png'; } ?>
		<article class="pb-card pb-card--img pb-blog">
			<a class="pb-card__media" href="<?php echo pb_e($href); ?>" style="aspect-ratio:16/10" tabindex="-1" aria-hidden="true"><?php echo pb_img($img, $title, 'pb-card__img' . ($is_fallback ? ' pb-blog__fallback' : '')); ?></a>
			<div class="pb-card__body">
				<h3 class="pb-card__title"><a href="<?php echo pb_e($href); ?>"><?php echo pb_e($title); ?></a></h3>
				<a class="pb-card__link" href="<?php echo pb_e($href); ?>">Read article <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>
		</article>
		<?php } ?>
	</div>
	<?php if (trim($f['button_text']) !== '') { ?><div class="pb-btns pb-btns--center"><a class="pb-btn pb-btn--primary" href="<?php echo pb_e($all_url); ?>"><?php echo pb_e($f['button_text']); ?></a></div><?php } ?>
	<?php } ?>
</div>
