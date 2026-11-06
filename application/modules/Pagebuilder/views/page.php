<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Page Builder page renderer.
 * Each section is rendered by views/sections/<type>.php with:
 *   $f     — section fields (array)
 *   $items — repeatable items (array of arrays)
 *   $sec   — the section row
 */
$this->load->view('include/header/header');
$pb_css_file = FCPATH . 'assets/css/page-builder.css';
?>
<style><?php if (is_file($pb_css_file)) { echo file_get_contents($pb_css_file); } ?></style>

<?php if (!empty($pb_is_preview)) { ?>
<div class="pb-preview-bar">Preview — this page is a <strong>draft</strong> and is not visible to visitors yet.</div>
<?php } ?>

<div class="pb-page" id="pb-page-<?php echo (int) $pb_page->id; ?>">
<?php
$pb_faq_schema = array();
foreach ($pb_sections as $pb_i => $sec) {
	$f = $sec->content['fields'];
	$items = $sec->content['items'];
	$partial = __DIR__ . '/sections/' . $sec->type . '.php';
	if (!is_file($partial)) {
		continue;
	}
	$classes = array('pb-sec', 'pb-sec--' . $sec->type);
	if ($sec->type !== 'hero') {
		$classes[] = 'pb-bg--' . (isset($f['bg']) && $f['bg'] !== '' ? $f['bg'] : 'white');
	}
	$classes[] = 'pb-sp--' . (isset($f['spacing']) && $f['spacing'] !== '' ? $f['spacing'] : 'normal');
	$anchor = isset($f['anchor']) ? pb_slugify($f['anchor']) : '';
	$is_first = ($pb_i === 0);
	echo '<section class="' . pb_e(implode(' ', $classes)) . '"' . ($anchor !== '' ? ' id="' . pb_e($anchor) . '"' : '') . ' data-section="' . (int) $sec->id . '">';
	include $partial;
	echo '</section>';
}
?>
</div>

<?php if (!empty($pb_faq_schema)) { ?>
<script type="application/ld+json"><?php echo json_encode(array(
	'@context' => 'https://schema.org',
	'@type' => 'FAQPage',
	'mainEntity' => $pb_faq_schema,
), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG); ?></script>
<?php } ?>

<?php $this->load->view('include/footer/footer'); ?>
