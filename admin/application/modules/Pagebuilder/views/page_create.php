<?php $this->load->view('_assets'); ?>
<ul class="breadcrumb">
	<li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
	<li><a href="<?php echo site_url('Pagebuilder'); ?>">Page Builder</a></li>
	<li class="active">New page</li>
</ul>

<div class="page-content-wrap pb-admin">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title"><strong>New page</strong></h3></div>
				<form method="post" action="<?php echo site_url('Pagebuilder/create'); ?>">
					<div class="panel-body">
						<div class="pb-field">
							<label for="pb-title">Page title</label>
							<input type="text" id="pb-title" name="title" class="form-control" required value="<?php echo pb_e($this->input->post('title')); ?>" placeholder="e.g. Best Dental Clinic in Salt Lake">
							<p class="help-block">Shown in the admin and used as the default SEO title.</p>
						</div>
						<div class="pb-field">
							<label for="pb-slug">Page URL</label>
							<div class="input-group">
								<span class="input-group-addon"><?php echo pb_e(pb_site_base()); ?></span>
								<input type="text" id="pb-slug" name="slug" class="form-control" value="<?php echo pb_e($this->input->post('slug')); ?>" placeholder="best-dental-clinic-in-salt-lake" pattern="[a-z0-9-]*">
							</div>
							<p class="help-block">Lowercase letters, numbers and dashes. Leave empty to create it from the title.</p>
						</div>
						<p class="text-muted"><i class="fa fa-info-circle"></i> The page starts as a <strong>draft</strong>. Publish it from the page screen when it is ready.</p>
					</div>
					<div class="panel-footer">
						<a class="btn btn-default" href="<?php echo site_url('Pagebuilder'); ?>">Cancel</a>
						<button type="submit" class="btn btn-primary pull-right">Create page &amp; add sections <span class="fa fa-arrow-right"></span></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
	var title = document.getElementById('pb-title'), slug = document.getElementById('pb-slug'), touched = slug.value !== '';
	function slugify(s) { return s.toLowerCase().replace(/&/g, ' and ').replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, ''); }
	slug.addEventListener('input', function () { touched = true; slug.value = slug.value.toLowerCase().replace(/[^a-z0-9-]/g, '-'); });
	title.addEventListener('input', function () { if (!touched) { slug.value = slugify(title.value); } });
});
</script>
