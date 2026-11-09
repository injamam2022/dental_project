<?php $this->load->view('_assets'); $takeover = pb_takeover_slugs(); ?>
<ul class="breadcrumb">
	<li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
	<li class="active">Page Builder</li>
</ul>

<div class="page-content-wrap pb-admin">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Page Builder</strong> — build website pages from sections</h3>
					<div class="pull-right">
						<a class="btn btn-primary" href="<?php echo site_url('Pagebuilder/create'); ?>"><span class="fa fa-plus"></span> Add new page</a>
					</div>
				</div>
				<div class="panel-body">
					<p class="help-block" style="margin-top:0;">
						Each page is made of sections (banner, text, cards, checklist, map, FAQ, call to action...). Drag sections to reorder them, switch them on/off, and upload images for each one.
						Draft pages are only visible through the <strong>Preview</strong> button.
					</p>
					<?php if (empty($pages)) { ?>
						<div class="pb-empty">
							<p><i class="fa fa-file-o fa-2x"></i></p>
							<p>No pages yet.</p>
							<a class="btn btn-primary" href="<?php echo site_url('Pagebuilder/create'); ?>"><span class="fa fa-plus"></span> Create your first page</a>
						</div>
					<?php } else { ?>
					<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Page</th>
								<th>Status</th>
								<th class="text-center">Sections</th>
								<th>Last updated</th>
								<th class="text-right">Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($pages as $p) {
							$url = pb_page_url($p->slug);
							$view = $p->status === 'published' ? $url : $url . '?preview=' . pb_preview_token($p->id); ?>
							<tr>
								<td>
									<a href="<?php echo site_url('Pagebuilder/edit/' . $p->id); ?>"><strong><?php echo pb_e($p->title); ?></strong></a><br>
									<small class="text-muted">/<?php echo pb_e($p->slug); ?></small>
								</td>
								<td><span class="pb-badge pb-badge--<?php echo pb_e($p->status); ?>"><?php echo pb_e($p->status); ?></span>
									<?php if (in_array($p->slug, $takeover, true)) { ?><br><small class="text-muted" title="Uses the URL of an existing website page"><i class="fa fa-exchange"></i> <?php echo $p->status === 'published' ? 'replaces old page' : 'old page still live'; ?></small><?php } ?></td>
								<td class="text-center"><?php echo (int) $p->section_count; ?></td>
								<td><?php echo $p->updated_at ? pb_e(date('d M Y, H:i', strtotime($p->updated_at))) : '—'; ?></td>
								<td class="text-right" style="white-space:nowrap">
									<a class="btn btn-primary btn-sm" href="<?php echo site_url('Pagebuilder/edit/' . $p->id); ?>"><span class="fa fa-pencil"></span> Edit</a>
									<a class="btn btn-default btn-sm" href="<?php echo pb_e($view); ?>" target="_blank" rel="noopener"><span class="fa fa-eye"></span> <?php echo $p->status === 'published' ? 'View' : 'Preview'; ?></a>
									<form method="post" action="<?php echo site_url('Pagebuilder/duplicate_page'); ?>" style="display:inline">
										<input type="hidden" name="id" value="<?php echo (int) $p->id; ?>">
										<button class="btn btn-default btn-sm" title="Duplicate"><span class="fa fa-copy"></span></button>
									</form>
									<form method="post" action="<?php echo site_url('Pagebuilder/delete_page'); ?>" style="display:inline" onsubmit="return confirm('Delete the page &quot;<?php echo pb_e(addslashes($p->title)); ?>&quot; and all its sections? This cannot be undone.');">
										<input type="hidden" name="id" value="<?php echo (int) $p->id; ?>">
										<button class="btn btn-danger btn-sm" title="Delete"><span class="fa fa-trash-o"></span></button>
									</form>
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
