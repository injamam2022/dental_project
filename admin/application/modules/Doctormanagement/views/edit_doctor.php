<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li class="active"><a href="<?php echo site_url('Doctormanagement/edit/' . encode_url($doctor->id)); ?>">Edit Doctor</a></li>
</ul>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Edit Doctor</strong></h3>
                    <div class="btn-group pull-right" style="margin-right: 2%;">
                        <a href="<?php echo site_url('Doctormanagement'); ?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i> Doctor List</button></a>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Doctormanagement/update'); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo (int) $doctor->id; ?>">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Doctor Name</label>
                            <div class="col-md-6"><input type="text" name="doctor_name" class="form-control" value="<?php echo htmlspecialchars($doctor->doctor_name, ENT_QUOTES, 'UTF-8'); ?>" required></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Designation</label>
                            <div class="col-md-6"><input type="text" name="designation" class="form-control" value="<?php echo htmlspecialchars($doctor->designation, ENT_QUOTES, 'UTF-8'); ?>" required></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Sort Order</label>
                            <div class="col-md-6"><input type="number" name="sort_order" class="form-control" value="<?php echo (int) $doctor->sort_order; ?>"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Image</label>
                            <div class="col-md-6">
                                <input type="file" name="doctor_image" accept="image/jpeg,image/png,image/webp,image/gif">
                                <span class="help-block">Leave empty to keep the current photo.</span>
                                <?php if (!empty($doctor->image_name)) { ?>
                                    <img src="<?php echo site_url('webroot/uploads/doctors/' . $doctor->image_name); ?>" width="60" height="60" alt="" style="margin-top:10px;">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status</label>
                            <div class="col-md-6">
                                <select class="form-control" name="status">
                                    <option value="active" <?php echo $doctor->status === 'active' ? 'selected' : ''; ?>>Active</option>
                                    <option value="inactivate" <?php echo $doctor->status === 'inactivate' ? 'selected' : ''; ?>>Inactivate</option>
                                </select>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

