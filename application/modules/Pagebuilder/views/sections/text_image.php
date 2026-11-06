<?php defined('BASEPATH') OR exit('No direct script access allowed');
$img = pb_img($f['image'], $f['image_alt'], 'pb-split__img', $is_first);
?>
<div class="container">
	<div class="pb-split<?php echo $f['image_position'] === 'left' ? ' pb-split--left' : ''; ?><?php echo $img === '' ? ' pb-split--noimg' : ''; ?>">
		<div class="pb-split__text">
			<?php if (trim($f['heading']) !== '') { ?><h2 class="pb-h2"><?php echo pb_e($f['heading']); ?></h2><?php } ?>
			<div class="pb-rich"><?php echo $f['body']; ?></div>
			<?php $b = pb_button($f['button_text'], $f['button_link']); if ($b !== '') { ?><div class="pb-btns"><?php echo $b; ?></div><?php } ?>
		</div>
		<?php if ($img !== '') { ?><div class="pb-split__media"><?php echo $img; ?></div><?php } ?>
	</div>
</div>
