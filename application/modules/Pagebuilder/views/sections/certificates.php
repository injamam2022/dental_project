<?php defined('BASEPATH') OR exit('No direct script access allowed');
$certs = isset($sec->live) && is_array($sec->live) ? $sec->live : array();
?>
<div class="container">
	<?php echo pb_section_head($f['heading'], '', $f['intro']); ?>
	<?php if (!empty($certs)) { ?>
	<div class="pb-grid pb-grid--<?php echo count($certs) >= 3 ? '3' : (count($certs) === 2 ? '2' : '1'); ?> pb-certs">
		<?php foreach ($certs as $c) {
			$img = 'admin/webroot/uploads/dental_media/' . basename((string) $c->image_name);
			$cap = trim((string) (isset($c->title) ? $c->title : '')); ?>
		<figure class="pb-cert">
			<a href="<?php echo pb_e(pb_image_url($img)); ?>" data-fancybox="pb-certs-<?php echo (int) $sec->id; ?>"<?php if ($cap !== '') { ?> data-caption="<?php echo pb_e($cap); ?>"<?php } ?>>
				<?php echo pb_img($img, $cap !== '' ? $cap : 'Certificate'); ?>
			</a>
			<?php if ($cap !== '') { ?><figcaption><?php echo pb_e($cap); ?></figcaption><?php } ?>
		</figure>
		<?php } ?>
	</div>
	<?php } ?>
	<?php if (trim(strip_tags($f['outro'])) !== '') { ?><div class="pb-rich pb-outro"><?php echo $f['outro']; ?></div><?php } ?>
</div>
