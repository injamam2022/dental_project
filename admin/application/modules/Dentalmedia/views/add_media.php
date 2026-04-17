<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li class="active"><a href="<?php echo site_url('Dentalmedia/add'); ?>">Add Dental Media</a></li>
</ul>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><strong>Add Dental Media</strong></h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Dentalmedia/add'); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Section Key</label>
                            <div class="col-md-6">
                                <select class="form-control" name="section_key" required>
                                    <option value="about">about</option>
                                    <option value="why_choose">why_choose</option>
                                    <option value="specialisations">specialisations</option>
                                    <option value="stats">stats</option>
                                    <option value="before_after">before_after</option>
                                    <option value="certificates">certificates</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-md-3 control-label">Item Key</label><div class="col-md-6"><input type="text" name="item_key" class="form-control"></div></div>
                        <div class="form-group"><label class="col-md-3 control-label">Title</label><div class="col-md-6"><input type="text" name="title" class="form-control"></div></div>
                        <div class="form-group"><label class="col-md-3 control-label">Description</label><div class="col-md-6"><textarea name="description" class="form-control"></textarea></div></div>
                        <div class="form-group"><label class="col-md-3 control-label">Image 1</label><div class="col-md-6"><input type="file" name="uploadedimages[]" class="fileinput btn-primary"></div></div>
                        <div class="form-group"><label class="col-md-3 control-label">Image 2 (before/after sections)</label><div class="col-md-6"><input type="file" name="uploadedimages2[]" class="fileinput btn-primary"></div></div>
                        <div class="form-group"><label class="col-md-3 control-label">Sort Order</label><div class="col-md-6"><input type="number" name="sort_order" class="form-control" value="0"></div></div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status</label>
                            <div class="col-md-6"><select class="form-control" name="status"><option value="active">Active</option><option value="inactivate">Inactivate</option></select></div>
                        </div>
                        <div class="panel-footer"><button type="submit" class="btn btn-primary pull-right">Save</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

