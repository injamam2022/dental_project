<?php defined('BASEPATH') OR exit('No direct script access allowed');
$bg_url = pb_image_url($f['image']);
?>
<div class="container">
	<div class="pb-cta<?php echo $bg_url !== '' ? ' pb-cta--img' : ''; ?>"<?php if ($bg_url !== '') { ?> style="background-image:url('<?php echo pb_e($bg_url); ?>')"<?php } ?>>
		<?php if (trim($f['heading']) !== '') { ?><h2 class="pb-h2"><?php echo pb_e($f['heading']); ?></h2><?php } ?>
		<div class="pb-rich"><?php echo $f['body']; ?></div>
		<?php $b = pb_button($f['button_text'], $f['button_link'], 'gold') . pb_button($f['button2_text'], $f['button2_link'], 'light');
		if ($b !== '') { ?><div class="pb-btns"><?php echo $b; ?></div><?php } ?>
	</div>
</div>
