<?php defined('BASEPATH') OR exit('No direct script access allowed');
$map_src = pb_map_src($f['map']);
$img = $map_src === '' ? pb_img($f['image'], $f['image_alt'], 'pb-contact__img') : '';
$has_media = ($map_src !== '' || $img !== '');
?>
<div class="container">
	<?php echo pb_section_head($f['heading'], '', $f['intro']); ?>
	<div class="pb-contact<?php echo $has_media ? '' : ' pb-contact--solo'; ?>">
		<div class="pb-contact__card">
			<ul class="pb-contact__list">
				<?php foreach ($items as $it) {
					if (trim($it['label']) === '' && trim($it['value']) === '') { continue; }
					$l = pb_link($it['link']);
					$icon = preg_match('/^[a-z0-9-]+$/', (string) $it['icon']) ? $it['icon'] : 'info-circle'; ?>
				<li>
					<span class="pb-contact__icon"><i class="fa fa-<?php echo pb_e($icon); ?>" aria-hidden="true"></i></span>
					<span class="pb-contact__txt">
						<?php if (trim($it['label']) !== '') { ?><strong><?php echo pb_e($it['label']); ?></strong><?php } ?>
						<?php if ($l['href'] !== '') { ?><a href="<?php echo pb_e($l['href']); ?>"<?php echo $l['attrs']; ?>><?php echo nl2br(pb_e($it['value'])); ?></a><?php } else { ?><span><?php echo nl2br(pb_e($it['value'])); ?></span><?php } ?>
					</span>
				</li>
				<?php } ?>
			</ul>
			<?php $b = pb_button($f['button_text'], $f['button_link']); if ($b !== '') { ?><div class="pb-btns"><?php echo $b; ?></div><?php } ?>
		</div>
		<?php if ($map_src !== '') { ?>
		<div class="pb-contact__map"><iframe src="<?php echo pb_e($map_src); ?>" title="<?php echo pb_e(trim($f['heading']) !== '' ? $f['heading'] : 'Clinic location map'); ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe></div>
		<?php } elseif ($img !== '') { ?>
		<div class="pb-contact__map"><?php echo $img; ?></div>
		<?php } ?>
	</div>
</div>
