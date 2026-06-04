<ul class="breadcrumb">
	<li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
	<li class="active">SEO — 301 redirects</li>
</ul>

<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-tabs" style="margin-bottom:15px;">
				<li><a href="<?php echo site_url('seo'); ?>">Per-page meta</a></li>
				<li class="active"><a href="<?php echo site_url('seo/redirects'); ?>">301 redirects</a></li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">301 redirects <small>(Yoast-style)</small></h3>
					<p class="text-muted" style="margin:8px 0 0;">When someone visits the <strong>old URL</strong>, they are sent to the <strong>new URL</strong> with the HTTP status you choose. Use paths only (no domain), e.g. <code>old-blog-post</code> → <code>new-blog-post</code> or a full URL for external targets.</p>
				</div>
				<div class="panel-body">
					<p>
						<a class="btn btn-success" href="<?php echo site_url('seo/redirect_add'); ?>"><span class="fa fa-plus"></span> Add redirect</a>
					</p>
					<?php if (empty($rows)) { ?>
						<p class="alert alert-info">No redirects yet. Run <code>database/seo_redirects_migration.sql</code> or click <strong>Add redirect</strong> (table is created automatically on first visit).</p>
					<?php } else { ?>
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Old URL</th>
									<th>New URL</th>
									<th>Type</th>
									<th>Status</th>
									<th>Notes</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($rows as $r) {
									$preview_old = rtrim($this->website['data']->site_url, '/') . '/' . htmlspecialchars($r->source_url, ENT_QUOTES, 'UTF-8');
									$target = (string) $r->target_url;
									if ($target !== '' && ! preg_match('#^https?://#i', $target)) {
										$preview_new = rtrim($this->website['data']->site_url, '/') . '/' . htmlspecialchars($target, ENT_QUOTES, 'UTF-8');
									} else {
										$preview_new = htmlspecialchars($target, ENT_QUOTES, 'UTF-8');
									}
								?>
								<tr>
									<td><code>/<?php echo htmlspecialchars($r->source_url, ENT_QUOTES, 'UTF-8'); ?></code><br><small class="text-muted"><?php echo $preview_old; ?></small></td>
									<td><?php if ((int) $r->http_code === 410) { ?><em>410 Gone</em><?php } else { ?><code><?php echo htmlspecialchars($target, ENT_QUOTES, 'UTF-8'); ?></code><br><small class="text-muted"><?php echo $preview_new; ?></small><?php } ?></td>
									<td><?php echo (int) $r->http_code; ?></td>
									<td><?php echo $r->status === 'active' ? '<span class="label label-success">Active</span>' : '<span class="label label-default">Inactive</span>'; ?></td>
									<td><?php echo htmlspecialchars((string) $r->notes, ENT_QUOTES, 'UTF-8'); ?></td>
									<td>
										<a class="btn btn-default btn-sm" href="<?php echo site_url('seo/redirect_edit/' . (int) $r->id); ?>">Edit</a>
										<a class="btn btn-danger btn-sm" href="<?php echo site_url('seo/redirect_delete/' . (int) $r->id); ?>" onclick="return confirm('Delete this redirect?');">Delete</a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
