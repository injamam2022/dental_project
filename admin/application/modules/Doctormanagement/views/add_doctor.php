<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li class="active"><a href="<?php echo site_url('Doctormanagement/add'); ?>">Add Doctor</a></li>
</ul>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Add Doctor</strong></h3>
                    <div class="btn-group pull-right" style="margin-right: 2%;">
                        <a href="<?php echo site_url('Doctormanagement'); ?>"><button class="btn btn-primary"><i class="fa fa-list-alt"></i> Doctor List</button></a>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Doctormanagement/add'); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Doctor Name</label>
                            <div class="col-md-6"><input type="text" name="doctor_name" class="form-control" required></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Designation</label>
                            <div class="col-md-6"><input type="text" name="designation" class="form-control" required></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Sort Order</label>
                            <div class="col-md-6"><input type="number" name="sort_order" class="form-control" value="0"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Image</label>
                            <div class="col-md-6"><input type="file" name="uploadedimages[]" class="fileinput btn-primary"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status</label>
                            <div class="col-md-6">
                                <select class="form-control" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactivate">Inactivate</option>
                                </select>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

