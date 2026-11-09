<?php defined('BASEPATH') OR exit('No direct script access allowed');
$cols = in_array($f['columns'], array('1', '2', '3'), true) ? $f['columns'] : '2';
$has_labels = false;
foreach ($items as $it) {
	if (trim((string) $it['label']) !== '') { $has_labels = true; break; }
}
?>
<div class="container">
	<div class="pb-narrow">
		<?php echo pb_section_head($f['heading'], '', $f['intro']); ?>
		<?php if (!empty($items)) { ?>
		<ul class="pb-checks pb-checks--<?php echo $cols; ?><?php echo $has_labels ? ' pb-checks--labelled' : ''; ?>">
			<?php foreach ($items as $it) {
				if (trim($it['text']) === '' && trim($it['label']) === '') { continue; }
				$l = pb_link($it['link']);
				$inner = (trim($it['label']) !== '' ? '<strong>' . pb_e($it['label']) . '</strong> ' : '') . nl2br(pb_e($it['text'])); ?>
			<li><i class="fa fa-check" aria-hidden="true"></i><?php if ($l['href'] !== '') { ?><a href="<?php echo pb_e($l['href']); ?>"<?php echo $l['attrs']; ?>><?php echo $inner; ?></a><?php } else { ?><span><?php echo $inner; ?></span><?php } ?></li>
			<?php } ?>
		</ul>
		<?php } ?>
		<?php if (trim(strip_tags($f['outro'])) !== '') { ?><div class="pb-rich pb-outro"><?php echo $f['outro']; ?></div><?php } ?>
	</div>
</div>
