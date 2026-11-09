<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="pb-narrow">
		<?php echo pb_section_head($f['heading'], '', $f['intro']); ?>
		<?php if (!empty($items)) { ?>
		<ol class="pb-steps">
			<?php foreach ($items as $n => $it) {
				if (trim($it['title']) === '' && trim($it['text']) === '') { continue; } ?>
			<li class="pb-step">
				<span class="pb-step__num" aria-hidden="true"><?php echo $n + 1; ?></span>
				<div class="pb-step__body">
					<span class="pb-step__label">Step <?php echo $n + 1; ?></span>
					<?php if (trim($it['title']) !== '') { ?><h3 class="pb-step__title"><?php echo pb_e($it['title']); ?></h3><?php } ?>
					<div class="pb-rich"><?php echo pb_text_to_html($it['text']); ?></div>
				</div>
			</li>
			<?php } ?>
		</ol>
		<?php } ?>
		<?php if (trim(strip_tags($f['outro'])) !== '') { ?><div class="pb-rich pb-outro"><?php echo $f['outro']; ?></div><?php } ?>
	</div>
</div>
