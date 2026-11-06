<?php
$this->load->view('_assets');
$f = $data['fields'];
$item_def = isset($type['items']) && is_array($type['items']) ? $type['items'] : null;
$content_fields = array();
$design_fields = array();
foreach ($fields as $fd) {
	if (isset($fd['group']) && $fd['group'] === 'design') {
		$design_fields[] = $fd;
	} else {
		$content_fields[] = $fd;
	}
}

/** Render one repeater item panel. $uid is unique per item; '__UID__' is used for the JS template. */
$render_item = function ($uid, array $item, $num, $open) use ($item_def) {
	$title_key = $item_def['title_field'];
	$title = isset($item[$title_key]) ? trim(strip_tags((string) $item[$title_key])) : '';
	ob_start(); ?>
	<li class="pb-item<?php echo $open ? ' is-open' : ''; ?>" data-uid="<?php echo pb_e($uid); ?>">
		<div class="pb-item__head">
			<span class="pb-handle" title="Drag to reorder"><i class="fa fa-bars"></i></span>
			<span class="pb-item__num"><?php echo pb_e($num); ?></span>
			<span class="pb-item__title<?php echo $title === '' ? ' is-empty' : ''; ?>"><?php echo $title !== '' ? pb_e($title) : 'New ' . pb_e(strtolower($item_def['label'])); ?></span>
			<button type="button" class="btn btn-default btn-xs pb-item-dup" title="Duplicate"><i class="fa fa-copy"></i></button>
			<button type="button" class="btn btn-danger btn-xs pb-item-del" title="Remove"><i class="fa fa-trash-o"></i></button>
			<i class="fa fa-chevron-right pb-item__chev"></i>
		</div>
		<div class="pb-item__body">
			<?php foreach ($item_def['fields'] as $fd) {
				$v = isset($item[$fd['key']]) ? $item[$fd['key']] : (isset($fd['default']) ? $fd['default'] : ''); ?>
			<div class="pb-field"<?php echo $fd['key'] === $title_key ? ' data-title-field' : ''; ?>>
				<label><?php echo pb_e($fd['label']); ?></label>
				<?php echo pb_admin_field($fd, 'items[' . $uid . '][' . $fd['key'] . ']', $v, 'file_i_' . $uid . '_' . $fd['key']); ?>
			</div>
			<?php } ?>
		</div>
	</li>
	<?php return ob_get_clean();
};
?>
<ul class="breadcrumb">
	<li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
	<li><a href="<?php echo site_url('Pagebuilder'); ?>">Page Builder</a></li>
	<li><a href="<?php echo site_url('Pagebuilder/edit/' . $page->id); ?>"><?php echo pb_e($page->title); ?></a></li>
	<li class="active"><?php echo pb_e($section->admin_label !== '' ? $section->admin_label : $type['label']); ?></li>
</ul>

<form method="post" action="<?php echo site_url('Pagebuilder/save_section'); ?>" enctype="multipart/form-data" class="page-content-wrap pb-admin" id="pb-section-form">
	<input type="hidden" name="id" value="<?php echo (int) $section->id; ?>">

	<div class="pb-topbar">
		<div>
			<h2><i class="fa <?php echo pb_e($type['icon']); ?>"></i> <?php echo pb_e($type['label']); ?></h2>
			<div class="pb-url"><?php echo pb_e($type['description']); ?></div>
		</div>
		<div>
			<a class="btn btn-default" href="<?php echo site_url('Pagebuilder/edit/' . $page->id . '#sec-' . $section->id); ?>"><span class="fa fa-arrow-left"></span> Back to page</a>
			<a class="btn btn-info" href="<?php echo pb_e($preview_url); ?>" target="_blank" rel="noopener" title="Save first to see your latest changes"><span class="fa fa-eye"></span> Preview page</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
			<fieldset class="pb-fieldset">
				<legend>Content</legend>
				<?php foreach ($content_fields as $fd) { ?>
				<div class="pb-field">
					<label><?php echo pb_e($fd['label']); ?><?php echo !empty($fd['required']) ? ' <span class="text-danger">*</span>' : ''; ?></label>
					<?php echo pb_admin_field($fd, 'f[' . $fd['key'] . ']', $f[$fd['key']], 'file_f_' . $fd['key']); ?>
				</div>
				<?php } ?>
			</fieldset>

			<?php if ($item_def) { ?>
			<fieldset class="pb-fieldset">
				<legend><?php echo pb_e($item_def['label']); ?>s <small class="text-muted">— click to open, drag <i class="fa fa-bars"></i> to reorder</small></legend>
				<ul class="pb-items" id="pb-items">
					<?php foreach ($data['items'] as $i => $item) {
						echo $render_item('i' . $i, $item, $i + 1, false);
					} ?>
				</ul>
				<button type="button" class="btn btn-primary" id="pb-item-add"><span class="fa fa-plus"></span> Add <?php echo pb_e(strtolower($item_def['label'])); ?></button>
				<button type="button" class="btn btn-link" id="pb-items-expand">Open all</button>
				<script type="text/template" id="pb-item-template"><?php echo str_replace('</script', '<\/script', $render_item('__UID__', array(), '#', true)); ?></script>
			</fieldset>
			<?php } ?>
		</div>

		<div class="col-md-4">
			<fieldset class="pb-fieldset">
				<legend>Section</legend>
				<div class="pb-field">
					<label>Name in admin</label>
					<input type="text" name="admin_label" class="form-control" value="<?php echo pb_e($section->admin_label); ?>" placeholder="<?php echo pb_e($type['label']); ?>">
					<p class="help-block">Only you see this — helps find sections in the list.</p>
				</div>
				<div class="checkbox" style="margin-bottom:0">
					<label><input type="checkbox" name="is_active" value="1"<?php echo $section->is_active ? ' checked' : ''; ?>> <strong>Show this section on the website</strong></label>
				</div>
			</fieldset>
			<fieldset class="pb-fieldset">
				<legend>Design</legend>
				<?php foreach ($design_fields as $fd) { ?>
				<div class="pb-field">
					<label><?php echo pb_e($fd['label']); ?></label>
					<?php echo pb_admin_field($fd, 'f[' . $fd['key'] . ']', $f[$fd['key']], 'file_f_' . $fd['key']); ?>
				</div>
				<?php } ?>
			</fieldset>
		</div>
	</div>

	<div class="pb-sticky-save">
		<button type="submit" name="after_save" value="stay" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
		<button type="submit" name="after_save" value="page" class="btn btn-success"><span class="fa fa-check"></span> Save &amp; back to page</button>
		<a class="btn btn-default" href="<?php echo site_url('Pagebuilder/edit/' . $page->id); ?>">Cancel</a>
		<span class="text-muted" id="pb-dirty" style="display:none;margin-left:10px"><i class="fa fa-circle text-warning"></i> Unsaved changes</span>
	</div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
	var $ = window.jQuery, $form = $('#pb-section-form'), dirty = false;

	function markDirty() { if (!dirty) { dirty = true; $('#pb-dirty').show(); } }
	$form.on('input change', 'input, textarea, select', markDirty);
	$form.on('submit', function () { dirty = false; });
	window.addEventListener('beforeunload', function (e) { if (dirty) { e.preventDefault(); e.returnValue = ''; } });

	// Rich text editors
	if (window.CKEDITOR) {
		$form.find('textarea.pb-richtext').each(function () {
			var ed = CKEDITOR.replace(this, {
				height: 220,
				allowedContent: true,
				toolbar: [
					['Format'], ['Bold', 'Italic', 'Strike', 'RemoveFormat'],
					['NumberedList', 'BulletedList', 'Outdent', 'Indent', 'Blockquote'],
					['Link', 'Unlink'], ['Image', 'Table', 'HorizontalRule', 'SpecialChar'],
					['Source', 'Maximize']
				],
				removeButtons: ''
			});
			ed.on('change', markDirty);
		});
	}

	pbBindImageFields(document);

	// ---------- Repeater ----------
	var $items = $('#pb-items');
	if (!$items.length) { return; }
	var tpl = $('#pb-item-template').html(), seq = 0;

	function newUid() { seq += 1; return 'n' + Date.now().toString(36) + seq; }
	function renumber() {
		$items.children('.pb-item').each(function (i) { $(this).find('.pb-item__num').first().text(i + 1); });
	}

	$('#pb-item-add').on('click', function () {
		var $el = $(tpl.replace(/__UID__/g, newUid()));
		$items.children('.pb-item').removeClass('is-open');
		$items.append($el);
		renumber(); markDirty();
		$el.find('input[type=text], textarea').first().focus();
	});

	$items.on('click', '.pb-item__head', function (e) {
		if ($(e.target).closest('button, .pb-handle').length) { return; }
		$(this).closest('.pb-item').toggleClass('is-open');
	});

	$items.on('click', '.pb-item-del', function () {
		var $it = $(this).closest('.pb-item');
		var name = $.trim($it.find('.pb-item__title').text());
		if (!confirm('Remove "' + name + '"?')) { return; }
		$it.remove(); renumber(); markDirty();
	});

	$items.on('click', '.pb-item-dup', function () {
		var $it = $(this).closest('.pb-item'), oldUid = $it.data('uid'), uid = newUid();
		var $copy = $it.clone();
		$copy.attr('data-uid', uid).data('uid', uid);
		$copy.find('[name]').each(function () {
			this.name = this.name.replace('items[' + oldUid + ']', 'items[' + uid + ']').replace('file_i_' + oldUid + '_', 'file_i_' + uid + '_');
		});
		// <select> values are not copied by clone()
		$it.find('select').each(function (i) { $copy.find('select').eq(i).val($(this).val()); });
		$copy.find('input[type=file]').val('');
		$it.after($copy); renumber(); markDirty();
	});

	$items.on('input', '[data-title-field] input, [data-title-field] textarea', function () {
		var v = $.trim($(this).val()), $t = $(this).closest('.pb-item').find('.pb-item__title');
		$t.text(v !== '' ? v : 'Untitled').toggleClass('is-empty', v === '');
	});

	$('#pb-items-expand').on('click', function () {
		var open = $items.children('.pb-item:not(.is-open)').length > 0;
		$items.children('.pb-item').toggleClass('is-open', open);
		$(this).text(open ? 'Close all' : 'Open all');
	});

	if ($.fn.sortable) {
		$items.sortable({ handle: '.pb-handle', axis: 'y', placeholder: 'pb-row-placeholder', update: function () { renumber(); markDirty(); } });
	}
});
</script>
