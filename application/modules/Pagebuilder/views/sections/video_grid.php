<?php defined('BASEPATH') OR exit('No direct script access allowed');
$cols = $f['columns'] === '3' ? '3' : '2';
$videos = array();
foreach ($items as $it) {
	$vid = pb_youtube_id($it['youtube']);
	if ($vid !== '') {
		$videos[] = array('id' => $vid, 'title' => trim((string) $it['title']));
	}
}
?>
<div class="container">
	<?php echo pb_section_head($f['heading'], $f['subheading']); ?>
	<?php if (!empty($videos)) { ?>
	<div class="pb-grid pb-grid--<?php echo $cols; ?> pb-videos">
		<?php foreach ($videos as $v) {
			$label = $v['title'] !== '' ? $v['title'] : 'Video'; ?>
		<figure class="pb-vcard">
			<button type="button" class="pb-vcard__play" data-pb-yt="<?php echo pb_e($v['id']); ?>" data-pb-title="<?php echo pb_e($label); ?>" aria-label="Play video: <?php echo pb_e($label); ?>">
				<img src="https://i.ytimg.com/vi/<?php echo pb_e($v['id']); ?>/hqdefault.jpg" alt="" width="480" height="360" loading="lazy" decoding="async">
				<span class="pb-vcard__icon" aria-hidden="true"><i class="fa fa-play"></i></span>
			</button>
			<?php if ($v['title'] !== '') { ?><figcaption><?php echo pb_e($v['title']); ?></figcaption><?php } ?>
		</figure>
		<?php } ?>
	</div>
	<?php } ?>
</div>
<?php if (empty($GLOBALS['pb_video_grid_js'])) { $GLOBALS['pb_video_grid_js'] = true; ?>
<script>
document.addEventListener('click', function (e) {
	var btn = e.target.closest ? e.target.closest('[data-pb-yt]') : null;
	if (!btn) { return; }
	var f = document.createElement('iframe');
	f.src = 'https://www.youtube-nocookie.com/embed/' + encodeURIComponent(btn.getAttribute('data-pb-yt')) + '?autoplay=1&rel=0';
	f.title = btn.getAttribute('data-pb-title') || 'Video';
	f.allow = 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture';
	f.allowFullscreen = true;
	f.className = 'pb-vcard__frame';
	btn.replaceWith(f);
});
</script>
<?php } ?>
