<ul class="breadcrumb">
	<li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
	<li><a href="<?php echo site_url('seo'); ?>">SEO — per page</a></li>
	<li class="active">Edit</li>
</ul>

<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<form action="" method="post" class="form-horizontal">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><?php echo htmlspecialchars($row->page_label, ENT_QUOTES, 'UTF-8'); ?> <small>(<code><?php echo htmlspecialchars($row->page_key, ENT_QUOTES, 'UTF-8'); ?></code>)</small></h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Meta title</label>
							<div class="col-md-6">
								<input type="text" name="meta_title" class="form-control" value="<?php echo htmlspecialchars((string) $row->meta_title, ENT_QUOTES, 'UTF-8'); ?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Meta description</label>
							<div class="col-md-6">
								<textarea name="meta_description" class="form-control" rows="4"><?php echo htmlspecialchars((string) $row->meta_description, ENT_QUOTES, 'UTF-8'); ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Meta keywords</label>
							<div class="col-md-6">
								<textarea name="meta_keyword" class="form-control" rows="3"><?php echo htmlspecialchars((string) $row->meta_keyword, ENT_QUOTES, 'UTF-8'); ?></textarea>
							</div>
						</div>
						<hr>
						<p class="col-md-offset-3 text-muted">Open Graph / Facebook (optional overrides)</p>
						<div class="form-group">
							<label class="col-md-3 control-label">OG title</label>
							<div class="col-md-6">
								<input type="text" name="og_title" class="form-control" value="<?php echo htmlspecialchars((string) $row->og_title, ENT_QUOTES, 'UTF-8'); ?>"/>
								<span class="help-block">Leave empty to use meta title.</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">OG description</label>
							<div class="col-md-6">
								<textarea name="og_description" class="form-control" rows="3"><?php echo htmlspecialchars((string) $row->og_description, ENT_QUOTES, 'UTF-8'); ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">OG image URL / path</label>
							<div class="col-md-6">
								<input type="text" name="og_image" class="form-control" value="<?php echo htmlspecialchars((string) $row->og_image, ENT_QUOTES, 'UTF-8'); ?>" placeholder="https://... or admin/webroot/uploads/..."/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Twitter card</label>
							<div class="col-md-6">
								<select name="twitter_card" class="form-control">
									<?php
									$cards = array('summary', 'summary_large_image');
									foreach ($cards as $c) {
										$sel = ((string) $row->twitter_card === $c) ? ' selected' : '';
										echo '<option value="' . htmlspecialchars($c, ENT_QUOTES, 'UTF-8') . '"' . $sel . '>' . htmlspecialchars($c, ENT_QUOTES, 'UTF-8') . '</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Robots</label>
							<div class="col-md-6">
								<input type="text" name="robots" class="form-control" value="<?php echo htmlspecialchars((string) $row->robots, ENT_QUOTES, 'UTF-8'); ?>" placeholder="e.g. index,follow or noindex,nofollow"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Canonical URL</label>
							<div class="col-md-6">
								<input type="text" name="canonical_url" class="form-control" value="<?php echo htmlspecialchars((string) $row->canonical_url, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Leave empty to use current page URL"/>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<a href="<?php echo site_url('seo'); ?>" class="btn btn-default">Cancel</a>
						<button type="submit" class="btn btn-primary pull-right">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
