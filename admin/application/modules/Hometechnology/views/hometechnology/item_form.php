<?php $is_edit = !empty($row); ?>
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li><a href="<?php echo site_url('Hometechnology/items'); ?>">Latest Technology tiles</a></li>
    <li class="active"><?php echo $is_edit ? 'Edit' : 'Add'; ?></li>
</ul>
<div class="page-content-wrap">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title"><?php echo $is_edit ? 'Edit tile' : 'Add tile'; ?></h3></div>
        <div class="panel-body">
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-3 control-label">Sort order</label>
                    <div class="col-md-3">
                        <input type="number" name="sort_order" class="form-control" value="<?php echo $is_edit ? (int) $row->sort_order : 0; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Title</label>
                    <div class="col-md-6">
                        <input type="text" name="title" class="form-control" value="<?php echo $is_edit ? htmlspecialchars($row->title, ENT_QUOTES, 'UTF-8') : ''; ?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Back / flip text</label>
                    <div class="col-md-8">
                        <textarea name="description" class="form-control" rows="5" required placeholder="Shown when the card flips (hover on desktop, tap on mobile)."><?php echo $is_edit ? htmlspecialchars($row->description, ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Image<?php echo $is_edit ? ' <small class="text-muted">(optional replace)</small>' : ''; ?></label>
                    <div class="col-md-6">
                        <input type="file" name="tech_image" class="form-control" accept="image/*,.svg" <?php echo $is_edit ? '' : 'required'; ?>/>
                        <span class="help-block">JPG, PNG, GIF, WebP or SVG. Recommended wide image for hero tile.</span>
                        <?php if ($is_edit && !empty($row->image_name)) { ?>
                        <p class="text-muted">Current: <code><?php echo htmlspecialchars($row->image_name, ENT_QUOTES, 'UTF-8'); ?></code></p>
                        <img src="<?php echo site_url('webroot/uploads/home_technology/'.$row->image_name); ?>" alt="" style="max-width:200px;border-radius:6px;"/>
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Hero row (full width)</label>
                    <div class="col-md-6">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="is_hero" value="1"<?php echo ($is_edit && !empty($row->is_hero)) ? ' checked' : ''; ?>/> Yes — spans full width on desktop (use for one tile only)
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Status</label>
                    <div class="col-md-3">
                        <select name="status" class="form-control">
                            <option value="active"<?php echo ($is_edit && $row->status === 'inactive') ? '' : ' selected'; ?>>active</option>
                            <option value="inactive"<?php echo ($is_edit && $row->status === 'inactive') ? ' selected' : ''; ?>>inactive</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-8">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="<?php echo site_url('Hometechnology/items'); ?>" class="btn btn-default">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
