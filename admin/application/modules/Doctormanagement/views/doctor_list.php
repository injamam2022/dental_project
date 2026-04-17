<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li class="active"><a href="<?php echo site_url('Doctormanagement'); ?>">Doctor List</a></li>
</ul>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Doctor List</h3>
        <div class="btn-group pull-right" style="margin-right: 2%;">
            <a href="<?php echo site_url('Doctormanagement/add'); ?>">
                <button class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Doctor</button>
            </a>
        </div>
    </div>
    <div class="panel-body">
        <table class="table datatable">
            <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Order</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($doctor_list)) { foreach ($doctor_list as $k => $d) { ?>
                <tr>
                    <td><?php echo $k + 1; ?></td>
                    <td><?php echo htmlspecialchars($d->doctor_name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($d->designation, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo (int) $d->sort_order; ?></td>
                    <td>
                        <?php if (!empty($d->image_name)) { ?>
                            <img src="<?php echo site_url('webroot/uploads/doctors/' . $d->image_name); ?>" width="50" height="50" alt="">
                        <?php } ?>
                    </td>
                    <td><?php echo htmlspecialchars($d->status, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a class="btn btn-default btn-rounded btn-sm" href="<?php echo site_url('Doctormanagement/edit/' . encode_url($d->id)); ?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn btn-danger btn-rounded btn-sm" href="<?php echo site_url('Doctormanagement/delete/' . encode_url($d->id)); ?>" onclick="return confirm('Delete this doctor?');"><span class="fa fa-times"></span></a>
                    </td>
                </tr>
            <?php }} ?>
            </tbody>
        </table>
    </div>
</div>

