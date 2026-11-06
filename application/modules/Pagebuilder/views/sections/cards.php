<?php defined('BASEPATH') OR exit('No direct script access allowed');
$cols = in_array($f['columns'], array('2', '3', '4'), true) ? $f['columns'] : '3';
$img_h = in_array($f['image_height'], array('160', '200', '260'), true) ? $f['image_height'] : '200';
?>
<div class="container">
	<?php echo pb_section_head($f['heading'], '', $f['intro']); ?>
	<?php if (!empty($items)) { ?>
	<div class="pb-grid pb-grid--<?php echo $cols; ?>">
		<?php foreach ($items as $n => $it) {
			$l = pb_link($it['link']);
			$img = pb_img($it['image'], $it['image_alt'] !== '' ? $it['image_alt'] : $it['title'], 'pb-card__img');
		?>
		<article class="pb-card<?php echo $img !== '' ? ' pb-card--img' : ''; ?>">
			<?php if ($img !== '') { ?><div class="pb-card__media" style="height:<?php echo (int) $img_h; ?>px"><?php echo $img; ?></div><?php } ?>
			<div class="pb-card__body">
				<?php if (trim($it['title']) !== '') { ?>
				<h3 class="pb-card__title"><?php if ($f['numbered'] === '1') { ?><span class="pb-card__num"><?php echo $n + 1; ?></span><?php } ?><span><?php echo pb_e($it['title']); ?></span></h3>
				<?php } ?>
				<div class="pb-rich pb-card__text"><?php echo pb_text_to_html($it['text']); ?></div>
				<?php if ($l['href'] !== '') { ?>
				<a class="pb-card__link" href="<?php echo pb_e($l['href']); ?>"<?php echo $l['attrs']; ?>><?php echo pb_e(trim($it['link_text']) !== '' ? $it['link_text'] : 'Learn more'); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
				<?php } ?>
			</div>
		</article>
		<?php } ?>
	</div>
	<?php } ?>
	<?php if (trim(strip_tags($f['outro'])) !== '') { ?><div class="pb-rich pb-outro"><?php echo $f['outro']; ?></div><?php } ?>
</div>
