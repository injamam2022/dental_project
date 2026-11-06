<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ($f['container'] !== 'full') { ?><div class="container"><?php } ?>
	<?php echo pb_section_head($f['heading']); ?>
	<div class="pb-html"><?php echo $f['html']; ?></div>
<?php if ($f['container'] !== 'full') { ?></div><?php } ?>
