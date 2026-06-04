<?php
$is_edit = ! empty($row);
$http_codes = seo_redirect_http_code_options();
$source_val = $is_edit ? (string) $row->source_url : '';
$target_val = $is_edit ? (string) $row->target_url : '';
$code_val = $is_edit ? (int) $row->http_code : 301;
$status_val = $is_edit ? (string) $row->status : 'active';
$notes_val = $is_edit ? (string) $row->notes : '';
?>
<ul class="breadcrumb">
	<li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
	<li><a href="<?php echo site_url('seo/redirects'); ?>">SEO — 301 redirects</a></li>
	<li class="active"><?php echo $is_edit ? 'Edit' : 'Add'; ?></li>
</ul>

<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<form action="" method="post" class="form-horizontal">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><?php echo $is_edit ? 'Edit redirect' : 'Add redirect'; ?></h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Old URL (source)</label>
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon">/</span>
									<input type="text" name="source_url" class="form-control" required value="<?php echo htmlspecialchars($source_val, ENT_QUOTES, 'UTF-8'); ?>" placeholder="e.g. dental-services-in-kolkata"/>
								</div>
								<span class="help-block">Path only — no <code>https://</code> and no leading slash required.</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">New URL (target)</label>
							<div class="col-md-6">
								<input type="text" name="target_url" class="form-control" value="<?php echo htmlspecialchars($target_val, ENT_QUOTES, 'UTF-8'); ?>" placeholder="e.g. best-dental-clinic-in-kolkata or https://..."/>
								<span class="help-block">Relative path on this site, or full URL for external redirect. Leave empty if type is <strong>410 Gone</strong>.</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Redirect type</label>
							<div class="col-md-6">
								<select name="http_code" class="form-control" id="seo-redirect-http-code">
									<?php foreach ($http_codes as $code => $label) {
										$sel = ($code_val === (int) $code) ? ' selected' : '';
										echo '<option value="' . (int) $code . '"' . $sel . '>' . htmlspecialchars($label, ENT_QUOTES, 'UTF-8') . '</option>';
									} ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Status</label>
							<div class="col-md-6">
								<select name="status" class="form-control">
									<option value="active"<?php echo $status_val === 'active' ? ' selected' : ''; ?>>Active</option>
									<option value="inactive"<?php echo $status_val === 'inactive' ? ' selected' : ''; ?>>Inactive</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Notes</label>
							<div class="col-md-6">
								<input type="text" name="notes" class="form-control" value="<?php echo htmlspecialchars($notes_val, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Optional — for your reference"/>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button type="submit" class="btn btn-primary">Save redirect</button>
						<a class="btn btn-default" href="<?php echo site_url('seo/redirects'); ?>">Cancel</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
(function () {
	var sel = document.getElementById('seo-redirect-http-code');
	var target = document.querySelector('input[name="target_url"]');
	if (!sel || !target) return;
	function toggle() {
		target.disabled = parseInt(sel.value, 10) === 410;
		if (target.disabled) target.value = '';
	}
	sel.addEventListener('change', toggle);
	toggle();
})();
</script>
