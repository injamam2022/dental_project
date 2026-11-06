<?php defined('BASEPATH') OR exit('No direct script access allowed');
$vid = pb_youtube_id($f['youtube']);
?>
<div class="container">
	<div class="pb-narrow">
		<?php echo pb_section_head($f['heading']); ?>
		<?php if ($vid !== '') { ?>
		<div class="pb-video">
			<iframe src="https://www.youtube-nocookie.com/embed/<?php echo pb_e($vid); ?>?rel=0" title="<?php echo pb_e(trim($f['heading']) !== '' ? $f['heading'] : 'Video'); ?>" loading="lazy" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<?php } ?>
		<?php if (trim(strip_tags($f['body'])) !== '') { ?><div class="pb-rich pb-outro"><?php echo $f['body']; ?></div><?php } ?>
	</div>
</div>
