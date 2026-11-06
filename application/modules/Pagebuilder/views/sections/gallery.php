<?php defined('BASEPATH') OR exit('No direct script access allowed');
$cols = in_array($f['columns'], array('2', '3', '4'), true) ? $f['columns'] : '3';
?>
<div class="container">
	<?php echo pb_section_head($f['heading'], $f['subheading']); ?>
	<div class="pb-grid pb-grid--<?php echo $cols; ?> pb-gallery">
		<?php foreach ($items as $it) {
			$url = pb_image_url($it['image']);
			if ($url === '') { continue; } ?>
		<figure>
			<a href="<?php echo pb_e($url); ?>" data-fancybox="pb-gallery-<?php echo (int) $sec->id; ?>"<?php if (trim($it['caption']) !== '') { ?> data-caption="<?php echo pb_e($it['caption']); ?>"<?php } ?>>
				<?php echo pb_img($it['image'], $it['image_alt'] !== '' ? $it['image_alt'] : $it['caption']); ?>
			</a>
			<?php if (trim($it['caption']) !== '') { ?><figcaption><?php echo pb_e($it['caption']); ?></figcaption><?php } ?>
		</figure>
		<?php } ?>
	</div>
</div>
