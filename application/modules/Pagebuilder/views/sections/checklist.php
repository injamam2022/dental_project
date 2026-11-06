<?php defined('BASEPATH') OR exit('No direct script access allowed');
$cols = in_array($f['columns'], array('1', '2', '3'), true) ? $f['columns'] : '2';
?>
<div class="container">
	<div class="pb-narrow">
		<?php echo pb_section_head($f['heading'], '', $f['intro']); ?>
		<?php if (!empty($items)) { ?>
		<ul class="pb-checks pb-checks--<?php echo $cols; ?>">
			<?php foreach ($items as $it) {
				if (trim($it['text']) === '') { continue; }
				$l = pb_link($it['link']); ?>
			<li><i class="fa fa-check" aria-hidden="true"></i><?php if ($l['href'] !== '') { ?><a href="<?php echo pb_e($l['href']); ?>"<?php echo $l['attrs']; ?>><?php echo pb_e($it['text']); ?></a><?php } else { ?><span><?php echo pb_e($it['text']); ?></span><?php } ?></li>
			<?php } ?>
		</ul>
		<?php } ?>
		<?php if (trim(strip_tags($f['outro'])) !== '') { ?><div class="pb-rich pb-outro"><?php echo $f['outro']; ?></div><?php } ?>
	</div>
</div>
