<ul class="breadcrumb">
	<li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
	<li class="active">SEO — per page</li>
</ul>

<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">SEO meta by page</h3>
					<p class="text-muted" style="margin:8px 0 0;">Empty fields fall back to <a href="<?php echo site_url('websitemanage'); ?>">Website Setting</a> (Company Details meta + SEO &amp; social tab).</p>
				</div>
				<div class="panel-body">
					<?php if (empty($rows)) { ?>
						<p class="alert alert-warning">Table <code>seo_page_meta</code> is missing or empty. Run <code>database/seo_meta_migration.sql</code> on your database.</p>
					<?php } else { ?>
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Page</th>
									<th>Key</th>
									<th>Meta title</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($rows as $r) { ?>
								<tr>
									<td><?php echo htmlspecialchars($r->page_label, ENT_QUOTES, 'UTF-8'); ?></td>
									<td><code><?php echo htmlspecialchars($r->page_key, ENT_QUOTES, 'UTF-8'); ?></code></td>
									<td><?php echo htmlspecialchars($r->meta_title, ENT_QUOTES, 'UTF-8'); ?></td>
									<td><a class="btn btn-default btn-sm" href="<?php echo site_url('seo/edit/' . (int) $r->id); ?>">Edit</a></td>
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
