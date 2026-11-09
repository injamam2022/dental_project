<?php defined('BASEPATH') OR exit('No direct script access allowed');
// Column count = last non-empty heading (1–4), or the widest row when there are no headings.
$heads = array($f['head1'], $f['head2'], $f['head3'], $f['head4']);
$ncols = 0;
foreach ($heads as $i => $h) {
	if (trim((string) $h) !== '') { $ncols = $i + 1; }
}
$has_head = $ncols > 0;
if (!$has_head) {
	foreach ($items as $it) {
		foreach (array('c1', 'c2', 'c3', 'c4') as $i => $k) {
			if (trim((string) $it[$k]) !== '') { $ncols = max($ncols, $i + 1); }
		}
	}
}
$ncols = max(2, $ncols);
?>
<div class="container">
	<div class="pb-narrow pb-narrow--wide">
		<?php echo pb_section_head($f['heading'], '', $f['intro']); ?>
		<?php if (trim($f['caption']) !== '') { ?><h3 class="pb-table-caption"><?php echo pb_e($f['caption']); ?></h3><?php } ?>
		<?php if (!empty($items)) { ?>
		<div class="pb-table-wrap">
			<table class="pb-table pb-table--<?php echo (int) $ncols; ?><?php echo $f['row_labels'] === '0' ? ' pb-table--plain' : ''; ?>">
				<?php if ($has_head) { ?>
				<thead><tr>
					<?php for ($i = 0; $i < $ncols; $i++) { ?><th scope="col"><?php echo pb_e($heads[$i]); ?></th><?php } ?>
				</tr></thead>
				<?php } ?>
				<tbody>
				<?php foreach ($items as $it) { ?>
					<tr>
						<?php for ($i = 0; $i < $ncols; $i++) {
							$v = (string) $it['c' . ($i + 1)];
							$label = $has_head ? trim((string) $heads[$i]) : '';
							if ($i === 0 && $f['row_labels'] !== '0') { ?>
						<th scope="row"><?php echo pb_e($v); ?></th>
							<?php } else { ?>
						<td<?php echo $label !== '' ? ' data-label="' . pb_e($label) . '"' : ''; ?>><?php echo pb_e($v); ?></td>
							<?php }
						} ?>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		<?php } ?>
		<?php if (trim(strip_tags($f['note'])) !== '') { ?><div class="pb-rich pb-table-note"><?php echo $f['note']; ?></div><?php } ?>
	</div>
</div>
