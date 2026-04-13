<?php $is_edit = !empty($row); ?>
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li><a href="<?php echo site_url('Whychooseus/faq'); ?>">FAQ</a></li>
    <li class="active"><?php echo $is_edit ? 'Edit' : 'Add'; ?></li>
</ul>
<div class="page-content-wrap">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title"><?php echo $is_edit ? 'Edit FAQ' : 'Add FAQ'; ?></h3></div>
        <div class="panel-body">
            <form method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-3 control-label">Sort order</label>
                    <div class="col-md-4">
                        <input type="number" name="sort_order" class="form-control" value="<?php echo $is_edit ? (int) $row->sort_order : 0; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Question</label>
                    <div class="col-md-8">
                        <input type="text" name="question" class="form-control" value="<?php echo $is_edit ? htmlspecialchars($row->question, ENT_QUOTES, 'UTF-8') : ''; ?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Answer (HTML)</label>
                    <div class="col-md-8">
                        <textarea name="answer" class="form-control" rows="8" required><?php echo $is_edit ? htmlspecialchars($row->answer, ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Status</label>
                    <div class="col-md-4">
                        <select name="status" class="form-control">
                            <option value="active"<?php echo ($is_edit && $row->status === 'inactive') ? '' : ' selected'; ?>>active</option>
                            <option value="inactive"<?php echo ($is_edit && $row->status === 'inactive') ? ' selected' : ''; ?>>inactive</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-8">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="<?php echo site_url('Whychooseus/faq'); ?>" class="btn btn-default">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
