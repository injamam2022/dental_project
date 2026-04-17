<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li class="active"><a href="<?php echo site_url('Dentalmedia/edit/' . encode_url($media->id)); ?>">Edit Dental Media</a></li>
</ul>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><strong>Edit Dental Media</strong></h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Dentalmedia/update'); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo (int) $media->id; ?>">
                        <div class="form-group"><label class="col-md-3 control-label">Section Key</label><div class="col-md-6"><input type="text" name="section_key" class="form-control" value="<?php echo htmlspecialchars($media->section_key, ENT_QUOTES, 'UTF-8'); ?>" required></div></div>
                        <div class="form-group"><label class="col-md-3 control-label">Item Key</label><div class="col-md-6"><input type="text" name="item_key" class="form-control" value="<?php echo htmlspecialchars((string) $media->item_key, ENT_QUOTES, 'UTF-8'); ?>"></div></div>
                        <div class="form-group"><label class="col-md-3 control-label">Title</label><div class="col-md-6"><input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars((string) $media->title, ENT_QUOTES, 'UTF-8'); ?>"></div></div>
                        <div class="form-group"><label class="col-md-3 control-label">Description</label><div class="col-md-6"><textarea name="description" class="form-control"><?php echo htmlspecialchars((string) $media->description, ENT_QUOTES, 'UTF-8'); ?></textarea></div></div>
                        <div class="form-group"><label class="col-md-3 control-label">Image 1</label><div class="col-md-6"><input type="file" name="uploadedimages[]" class="fileinput btn-primary"><?php if (!empty($media->image_name)) { ?><img src="<?php echo site_url('webroot/uploads/dental_media/' . $media->image_name); ?>" width="50" height="50" alt="" style="margin-top:8px;"><?php } ?></div></div>
                        <div class="form-group"><label class="col-md-3 control-label">Image 2</label><div class="col-md-6"><input type="file" name="uploadedimages2[]" class="fileinput btn-primary"><?php if (!empty($media->image_name_2)) { ?><img src="<?php echo site_url('webroot/uploads/dental_media/' . $media->image_name_2); ?>" width="50" height="50" alt="" style="margin-top:8px;"><?php } ?></div></div>
                        <div class="form-group"><label class="col-md-3 control-label">Sort Order</label><div class="col-md-6"><input type="number" name="sort_order" class="form-control" value="<?php echo (int) $media->sort_order; ?>"></div></div>
                        <div class="form-group"><label class="col-md-3 control-label">Status</label><div class="col-md-6"><select class="form-control" name="status"><option value="active" <?php echo $media->status === 'active' ? 'selected' : ''; ?>>Active</option><option value="inactivate" <?php echo $media->status === 'inactivate' ? 'selected' : ''; ?>>Inactivate</option></select></div></div>
                        <div class="panel-footer"><button type="submit" class="btn btn-primary pull-right">Update</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

