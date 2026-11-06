<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="pb-text<?php echo $f['align'] === 'center' ? ' pb-text--center' : ''; ?>">
		<?php if (trim($f['heading']) !== '') { ?><h2 class="pb-h2"><?php echo pb_e($f['heading']); ?></h2><?php } ?>
		<?php if (trim($f['subheading']) !== '') { ?><p class="pb-sub"><?php echo pb_e($f['subheading']); ?></p><?php } ?>
		<div class="pb-rich"><?php echo $f['body']; ?></div>
		<?php $b = pb_button($f['button_text'], $f['button_link']); if ($b !== '') { ?><div class="pb-btns"><?php echo $b; ?></div><?php } ?>
	</div>
</div>
