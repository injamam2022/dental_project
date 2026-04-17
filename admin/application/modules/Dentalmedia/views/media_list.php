<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li class="active"><a href="<?php echo site_url('Dentalmedia'); ?>">Dental Media</a></li>
</ul>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Dental Media</h3>
        <div class="btn-group pull-right" style="margin-right: 2%;">
            <a href="<?php echo site_url('Dentalmedia/add'); ?>"><button class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Media</button></a>
        </div>
    </div>
    <div class="panel-body">
        <table class="table datatable">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Section</th>
                    <th>Title</th>
                    <th>Sort</th>
                    <th>Status</th>
                    <th>Image 1</th>
                    <th>Image 2</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($media_list)) { foreach ($media_list as $k => $m) { ?>
                <tr>
                    <td><?php echo $k + 1; ?></td>
                    <td><?php echo htmlspecialchars($m->section_key, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars((string) $m->title, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo (int) $m->sort_order; ?></td>
                    <td><?php echo htmlspecialchars($m->status, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (!empty($m->image_name)) { ?><img src="<?php echo site_url('webroot/uploads/dental_media/' . $m->image_name); ?>" width="45" height="45" alt=""><?php } ?></td>
                    <td><?php if (!empty($m->image_name_2)) { ?><img src="<?php echo site_url('webroot/uploads/dental_media/' . $m->image_name_2); ?>" width="45" height="45" alt=""><?php } ?></td>
                    <td>
                        <a class="btn btn-default btn-rounded btn-sm" href="<?php echo site_url('Dentalmedia/edit/' . encode_url($m->id)); ?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn btn-danger btn-rounded btn-sm" href="<?php echo site_url('Dentalmedia/delete/' . encode_url($m->id)); ?>" onclick="return confirm('Delete this media item?');"><span class="fa fa-times"></span></a>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>
</div>

