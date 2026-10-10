<?php
$is_edit = is_object($item);
$action = $is_edit ? site_url('Landingpages/update_item') : site_url('Landingpages/add_item/' . encode_url($page->id));
$val = function ($field, $default = '') use ($item) {
    if (!is_object($item) || !isset($item->{$field})) {
        return $default;
    }
    return (string) $item->{$field};
};
?>
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li><a href="<?php echo site_url('Landingpages'); ?>">Dental Pages</a></li>
    <li><a href="<?php echo site_url('Landingpages/items/' . encode_url($page->id)); ?>"><?php echo htmlspecialchars($page->page_label, ENT_QUOTES, 'UTF-8'); ?> items</a></li>
    <li class="active"><?php echo $is_edit ? 'Edit item' : 'Add item'; ?></li>
</ul>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong><?php echo $is_edit ? 'Edit item' : 'Add item'; ?> — <?php echo htmlspecialchars($page->page_label, ENT_QUOTES, 'UTF-8'); ?></strong></h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="<?php echo $action; ?>" enctype="multipart/form-data">
                        <?php if ($is_edit) { ?><input type="hidden" name="id" value="<?php echo (int) $item->id; ?>"><?php } ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Section</label>
                            <div class="col-md-6">
                                <select name="section_key" class="form-control" required>
                                    <?php foreach ($section_labels as $key => $label) { ?>
                                        <option value="<?php echo htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?>" <?php echo $val('section_key') === $key ? 'selected' : ''; ?>><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Title / FAQ question</label>
                            <div class="col-md-6"><input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($val('title'), ENT_QUOTES, 'UTF-8'); ?>" required></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Description / FAQ answer</label>
                            <div class="col-md-6"><textarea name="description" class="form-control" rows="5"><?php echo htmlspecialchars($val('description'), ENT_QUOTES, 'UTF-8'); ?></textarea></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Image</label>
                            <div class="col-md-6">
                                <input type="file" name="image_file" accept="image/*">
                                <input type="text" name="image_name" class="form-control" style="margin-top:8px;" value="<?php echo htmlspecialchars($val('image_name'), ENT_QUOTES, 'UTF-8'); ?>" placeholder="Or keep existing path">
                                <?php if ($val('image_name') !== '') { ?><img src="<?php echo htmlspecialchars(dontia_landing_image_url($val('image_name')), ENT_QUOTES, 'UTF-8'); ?>" alt="" style="max-height:80px;margin-top:8px;"><?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Image alt text</label>
                            <div class="col-md-6"><input type="text" name="image_alt" class="form-control" value="<?php echo htmlspecialchars($val('image_alt'), ENT_QUOTES, 'UTF-8'); ?>"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Image 2 (optional before/after)</label>
                            <div class="col-md-6">
                                <input type="file" name="image_file_2" accept="image/*">
                                <input type="text" name="image_name_2" class="form-control" style="margin-top:8px;" value="<?php echo htmlspecialchars($val('image_name_2'), ENT_QUOTES, 'UTF-8'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Image 2 alt text</label>
                            <div class="col-md-6"><input type="text" name="image_alt_2" class="form-control" value="<?php echo htmlspecialchars($val('image_alt_2'), ENT_QUOTES, 'UTF-8'); ?>"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Link URL (optional)</label>
                            <div class="col-md-6"><input type="text" name="link_url" class="form-control" value="<?php echo htmlspecialchars($val('link_url'), ENT_QUOTES, 'UTF-8'); ?>" placeholder="e.g. best-orthodontist-in-kolkata"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Sort order</label>
                            <div class="col-md-6"><input type="number" name="sort_order" class="form-control" value="<?php echo htmlspecialchars($val('sort_order', '0'), ENT_QUOTES, 'UTF-8'); ?>"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status</label>
                            <div class="col-md-6">
                                <select name="status" class="form-control">
                                    <option value="active" <?php echo $val('status', 'active') === 'active' ? 'selected' : ''; ?>>Active</option>
                                    <option value="inactivate" <?php echo $val('status') === 'inactivate' ? 'selected' : ''; ?>>Inactivate</option>
                                </select>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                            <a class="btn btn-default" href="<?php echo site_url('Landingpages/items/' . encode_url($page->id)); ?>">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
