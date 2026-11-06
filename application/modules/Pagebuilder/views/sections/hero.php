<?php defined('BASEPATH') OR exit('No direct script access allowed');
$hero_url = pb_image_url($f['image']);
$fit = $f['fit'] === 'contain' ? ' pb-hero--contain' : '';
?>
<div class="pb-hero<?php echo $fit; ?><?php echo $hero_url === '' ? ' pb-hero--plain' : ''; ?>"<?php if ($hero_url !== '') { ?> style="background-image:url('<?php echo pb_e($hero_url); ?>')" role="img" aria-label="<?php echo pb_e($f['image_alt']); ?>"<?php } ?>>
	<div class="pb-hero__inner">
		<?php if (trim($f['heading']) !== '') { ?><h1><?php echo pb_e($f['heading']); ?></h1><?php } ?>
		<?php if (trim($f['subheading']) !== '') { ?><p class="pb-hero__sub"><?php echo nl2br(pb_e($f['subheading'])); ?></p><?php } ?>
		<?php $b = pb_button($f['button_text'], $f['button_link'], 'gold') . pb_button($f['button2_text'], $f['button2_link'], 'light');
		if ($b !== '') { ?><div class="pb-btns"><?php echo $b; ?></div><?php } ?>
	</div>
</div>
