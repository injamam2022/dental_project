<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="pb-narrow">
		<?php echo pb_section_head($f['heading'], $f['subheading']); ?>
		<div class="pb-faq">
			<?php foreach ($items as $n => $it) {
				if (trim($it['question']) === '') { continue; }
				$answer = pb_text_to_html($it['answer']);
				$pb_faq_schema[] = array(
					'@type' => 'Question',
					'name' => $it['question'],
					'acceptedAnswer' => array('@type' => 'Answer', 'text' => trim(strip_tags($answer, '<a><strong><em><br><p><ul><ol><li>'))),
				); ?>
			<details<?php echo $n === 0 ? ' open' : ''; ?>>
				<summary><?php echo pb_e($it['question']); ?></summary>
				<div class="pb-rich"><?php echo $answer; ?></div>
			</details>
			<?php } ?>
		</div>
	</div>
</div>
