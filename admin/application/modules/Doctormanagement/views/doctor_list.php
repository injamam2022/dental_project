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
            <a href="<?php echo site_url('Doctormanagement/import_template'); ?>" class="btn btn-default" onclick="return confirm('Import or refresh the six default clinic doctors (same names, order, and photos as the dental page template)?');">
                <i class="fa fa-download"></i> Import template doctors
            </a>
        </div>
    </div>
    <div class="panel-body">
        <?php
        $this->load->helper('dontia_doctors');
        $doctor_list = isset($doctor_list) && is_array($doctor_list) ? $doctor_list : array();
        if (count($doctor_list) === 0) {
        ?>
        <div class="alert alert-info" style="margin-bottom:16px;">
            <p style="margin:0 0 8px;"><strong>No doctors in the database yet.</strong> Add doctors here to control the team on the <strong>homepage</strong> and <strong>dental pages</strong>. Only <em>active</em> rows appear on the site.</p>
            <p style="margin:0;"><a href="<?php echo site_url('Doctormanagement/add'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Add your first doctor</a></p>
        </div>
        <?php } ?>
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
                        <?php
                        $thumb = dontia_doctor_admin_thumb_url($d->image_name);
                        if ($thumb !== '') {
                        ?>
                            <img src="<?php echo htmlspecialchars($thumb, ENT_QUOTES, 'UTF-8'); ?>" width="50" height="50" alt="" style="object-fit:cover;border-radius:4px;">
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

