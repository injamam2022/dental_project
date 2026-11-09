<?php $this->load->view('_assets'); ?>
<ul class="breadcrumb">
	<li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
	<li><a href="<?php echo site_url('Pagebuilder'); ?>">Page Builder</a></li>
	<li class="active"><?php echo pb_e($page->title); ?></li>
</ul>

<div class="page-content-wrap pb-admin">
	<div class="pb-topbar">
		<div>
			<h2><?php echo pb_e($page->title); ?> <span class="pb-badge pb-badge--<?php echo pb_e($page->status); ?>"><?php echo pb_e($page->status); ?></span></h2>
			<div class="pb-url"><i class="fa fa-link"></i> <?php echo pb_e($public_url); ?></div>
		</div>
		<div>
			<a class="btn btn-default" href="<?php echo site_url('Pagebuilder'); ?>"><span class="fa fa-arrow-left"></span> All pages</a>
			<a class="btn btn-info" href="<?php echo pb_e($preview_url); ?>" target="_blank" rel="noopener"><span class="fa fa-eye"></span> Preview</a>
			<?php if ($page->status === 'published') { ?>
			<a class="btn btn-success" href="<?php echo pb_e($public_url); ?>" target="_blank" rel="noopener"><span class="fa fa-external-link"></span> View live</a>
			<?php } ?>
		</div>
	</div>

	<?php if (in_array($page->slug, pb_takeover_slugs(), true)) { ?>
	<div class="alert <?php echo $page->status === 'published' ? 'alert-success' : 'alert-warning'; ?>" style="margin-bottom:16px">
		<i class="fa fa-exchange"></i>
		<?php if ($page->status === 'published') { ?>
			<strong>This page is live and replaces the old hand-coded page</strong> at <code>/<?php echo pb_e($page->slug); ?></code>. Switch the status back to Draft to show the old page again.
		<?php } else { ?>
			<strong>This URL is already used by an existing page.</strong> Visitors still see the old page at <code>/<?php echo pb_e($page->slug); ?></code>. When you set this page to <em>Published</em>, it replaces the old page on the same URL. Use <em>Preview</em> to check it first.
		<?php } ?>
	</div>
	<?php } ?>

	<div class="row">
		<!-- ============ Sections builder ============ -->
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Sections</strong> <small class="text-muted">— drag <i class="fa fa-arrows"></i> to reorder</small><span class="pb-save-state" id="pb-save-state"><i class="fa fa-check"></i> Order saved</span></h3>
					<div class="pull-right">
						<button type="button" class="btn btn-primary" data-pb-add data-after="0"><span class="fa fa-plus"></span> Add section</button>
					</div>
				</div>
				<div class="panel-body">
					<?php if (empty($sections)) { ?>
						<div class="pb-empty">
							<p><i class="fa fa-th-list fa-2x"></i></p>
							<p>This page has no sections yet. Start with a <strong>Hero banner</strong>, then add text, cards, a map, FAQs...</p>
							<button type="button" class="btn btn-primary" data-pb-add data-after="0"><span class="fa fa-plus"></span> Add first section</button>
						</div>
					<?php } else { ?>
					<ul class="pb-sections" id="pb-sections" data-page="<?php echo (int) $page->id; ?>">
						<?php foreach ($sections as $s) {
							if (!isset($types[$s->type])) { continue; }
							$t = $types[$s->type];
							$sum = pb_admin_section_summary($s->type, $s->data); ?>
						<li class="pb-row<?php echo $s->is_active ? '' : ' is-hidden'; ?>" id="sec-<?php echo (int) $s->id; ?>" data-id="<?php echo (int) $s->id; ?>">
							<span class="pb-handle" title="Drag to reorder"><i class="fa fa-bars"></i></span>
							<span class="pb-row__icon" title="<?php echo pb_e($t['label']); ?>"><i class="fa <?php echo pb_e($t['icon']); ?>"></i></span>
							<?php if ($sum['image'] !== '') { ?><span class="pb-row__thumb" style="background-image:url('<?php echo pb_e($sum['image']); ?>')"></span><?php } ?>
							<a class="pb-row__main" href="<?php echo site_url('Pagebuilder/edit_section/' . $s->id); ?>" style="text-decoration:none">
								<span class="pb-row__title"><?php echo pb_e($s->admin_label !== '' ? $s->admin_label : $t['label']); ?>
									<?php if (!$s->is_active) { ?> <span class="pb-badge pb-badge--hidden">hidden</span><?php } ?></span>
								<span class="pb-row__meta"><?php echo pb_e($t['label']); ?><?php echo $sum['items'] ? ' · ' . (int) $sum['items'] . ' item' . ($sum['items'] > 1 ? 's' : '') : ''; ?><?php echo $sum['text'] !== '' ? ' · ' . pb_e($sum['text']) : ''; ?></span>
							</a>
							<span class="pb-row__actions">
								<a class="btn btn-primary btn-sm" href="<?php echo site_url('Pagebuilder/edit_section/' . $s->id); ?>"><span class="fa fa-pencil"></span> Edit</a>
								<form method="post" action="<?php echo site_url('Pagebuilder/toggle_section'); ?>">
									<input type="hidden" name="id" value="<?php echo (int) $s->id; ?>">
									<button class="btn btn-default btn-sm" title="<?php echo $s->is_active ? 'Hide from website' : 'Show on website'; ?>"><span class="fa <?php echo $s->is_active ? 'fa-eye-slash' : 'fa-eye'; ?>"></span></button>
								</form>
								<form method="post" action="<?php echo site_url('Pagebuilder/duplicate_section'); ?>">
									<input type="hidden" name="id" value="<?php echo (int) $s->id; ?>">
									<button class="btn btn-default btn-sm" title="Duplicate"><span class="fa fa-copy"></span></button>
								</form>
								<form method="post" action="<?php echo site_url('Pagebuilder/delete_section'); ?>" onsubmit="return confirm('Delete this section? This cannot be undone.');">
									<input type="hidden" name="id" value="<?php echo (int) $s->id; ?>">
									<button class="btn btn-danger btn-sm" title="Delete"><span class="fa fa-trash-o"></span></button>
								</form>
							</span>
						</li>
						<li class="pb-insert" data-insert-for="<?php echo (int) $s->id; ?>"><button type="button" data-pb-add data-after="<?php echo (int) $s->id; ?>"><i class="fa fa-plus"></i> insert here</button></li>
						<?php } ?>
					</ul>
					<?php } ?>
				</div>
			</div>
		</div>

		<!-- ============ Page settings ============ -->
		<div class="col-md-4">
			<form method="post" action="<?php echo site_url('Pagebuilder/save_page'); ?>" enctype="multipart/form-data" class="panel panel-default">
				<input type="hidden" name="id" value="<?php echo (int) $page->id; ?>">
				<div class="panel-heading"><h3 class="panel-title"><strong>Page settings</strong></h3></div>
				<div class="panel-body">
					<div class="pb-field">
						<label>Status</label>
						<select name="status" class="form-control">
							<option value="draft"<?php echo $page->status === 'draft' ? ' selected' : ''; ?>>Draft — hidden from visitors</option>
							<option value="published"<?php echo $page->status === 'published' ? ' selected' : ''; ?>>Published — live on the website</option>
						</select>
					</div>
					<div class="pb-field">
						<label>Page title (admin)</label>
						<input type="text" name="title" class="form-control" value="<?php echo pb_e($page->title); ?>" required>
					</div>
					<div class="pb-field">
						<label>URL slug</label>
						<input type="text" name="slug" class="form-control" value="<?php echo pb_e($page->slug); ?>" required pattern="[a-z0-9-]+">
						<p class="help-block">Changing the URL of a live page breaks old links — add a redirect under SEO → Redirects if you do.</p>
					</div>
					<hr>
					<h4 style="margin-top:0"><i class="fa fa-google"></i> SEO</h4>
					<div class="pb-field">
						<label>Meta title <small class="text-muted" data-count-for="meta_title"></small></label>
						<input type="text" name="meta_title" class="form-control" value="<?php echo pb_e($page->meta_title); ?>" data-count="60">
					</div>
					<div class="pb-field">
						<label>Meta description <small class="text-muted" data-count-for="meta_description"></small></label>
						<textarea name="meta_description" class="form-control" rows="4" data-count="160"><?php echo pb_e($page->meta_description); ?></textarea>
					</div>
					<div class="pb-field">
						<label>Meta keywords (optional)</label>
						<input type="text" name="meta_keywords" class="form-control" value="<?php echo pb_e($page->meta_keywords); ?>">
					</div>
					<div class="pb-field">
						<label>Social share image</label>
						<?php echo pb_admin_field(array('type' => 'image', 'help' => 'Shown when the link is shared on WhatsApp / Facebook. 1200×630 works best.'), 'og_image', $page->og_image, 'file_og_image'); ?>
					</div>
					<div class="pb-field">
						<label>Search engines</label>
						<select name="robots" class="form-control">
							<option value=""<?php echo $page->robots == '' ? ' selected' : ''; ?>>Allow Google to index (default)</option>
							<option value="noindex, follow"<?php echo $page->robots === 'noindex, follow' ? ' selected' : ''; ?>>Do not index (noindex, follow)</option>
							<option value="noindex, nofollow"<?php echo $page->robots === 'noindex, nofollow' ? ' selected' : ''; ?>>Do not index or follow links</option>
						</select>
					</div>
				</div>
				<div class="panel-footer">
					<button type="submit" class="btn btn-primary btn-block"><span class="fa fa-save"></span> Save page settings</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Add-section palette -->
<div class="modal fade" id="pb-palette-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content pb-admin">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Add a section</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo site_url('Pagebuilder/add_section'); ?>" id="pb-add-form">
					<input type="hidden" name="page_id" value="<?php echo (int) $page->id; ?>">
					<input type="hidden" name="after" value="0" id="pb-add-after">
					<div class="pb-palette">
						<?php foreach ($types as $key => $t) { ?>
						<button type="submit" name="type" value="<?php echo pb_e($key); ?>">
							<i class="fa <?php echo pb_e($t['icon']); ?>"></i>
							<strong><?php echo pb_e($t['label']); ?></strong>
							<small><?php echo pb_e($t['description']); ?></small>
						</button>
						<?php } ?>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
	var $ = window.jQuery;

	// Open palette (append at end, or insert after a given section)
	$(document).on('click', '[data-pb-add]', function () {
		$('#pb-add-after').val($(this).data('after') || 0);
		$('#pb-palette-modal').modal('show');
	});

	// Character counters for SEO fields
	$('[data-count]').each(function () {
		var $f = $(this), max = +$f.data('count'), $c = $('[data-count-for="' + $f.attr('name') + '"]');
		function upd() { var n = $f.val().length; $c.text('(' + n + '/' + max + ')').css('color', n > max ? '#c0392b' : ''); }
		$f.on('input', upd); upd();
	});

	// Drag & drop ordering
	var $list = $('#pb-sections');
	if ($list.length && $.fn.sortable) {
		$list.sortable({
			items: '> li.pb-row',
			handle: '.pb-handle',
			placeholder: 'pb-row-placeholder',
			axis: 'y',
			tolerance: 'pointer',
			start: function () { $list.find('.pb-insert').hide(); },
			stop: function () {
				// keep each "insert here" bar right after its section
				$list.find('li.pb-row').each(function () {
					$(this).after($list.find('[data-insert-for="' + $(this).data('id') + '"]'));
				});
				$list.find('.pb-insert').show();
			},
			update: function () {
				var ids = $list.find('li.pb-row').map(function () { return $(this).data('id'); }).get();
				$.post('<?php echo site_url('Pagebuilder/sort_sections'); ?>', { page_id: $list.data('page'), ids: ids }, function (r) {
					if (r && r.ok) { $('#pb-save-state').stop(true).fadeIn(150).delay(1500).fadeOut(400); }
					else { alert('Could not save the new order. Please reload the page.'); }
				}, 'json').fail(function () { alert('Could not save the new order. Please reload the page.'); });
			}
		});
	}

	pbBindImageFields(document);
});
</script>
