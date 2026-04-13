<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li><a href="<?php echo site_url('Hometechnology'); ?>">Latest Technology</a></li>
    <li class="active">Tiles</li>
</ul>
<div class="page-content-wrap">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Latest Technology — tiles</h3>
            <div class="pull-right">
                <a href="<?php echo site_url('Hometechnology'); ?>" class="btn btn-default btn-sm">Heading</a>
                <a href="<?php echo site_url('Hometechnology/add_item'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add tile</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Hero row</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($rows)) {
                            echo '<tr><td colspan="6">No tiles yet.</td></tr>';
                        } else {
                            foreach ($rows as $r) {
                        ?>
                        <tr>
                            <td><?php echo (int) $r->sort_order; ?></td>
                            <td>
                                <?php if (!empty($r->image_name)) { ?>
                                <img src="<?php echo site_url('webroot/uploads/home_technology/'.$r->image_name); ?>" alt="" width="56" height="56" style="object-fit:cover;border-radius:4px;"/>
                                <?php } ?>
                            </td>
                            <td><?php echo htmlspecialchars($r->title, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo !empty($r->is_hero) ? 'Yes' : 'No'; ?></td>
                            <td><?php echo htmlspecialchars($r->status, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a href="<?php echo site_url('Hometechnology/edit_item/'.$r->id); ?>" class="btn btn-default btn-xs">Edit</a>
                                <a href="<?php echo site_url('Hometechnology/delete_item/'.$r->id); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Delete this tile?');">Delete</a>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <p class="text-muted">Exactly <strong>one</strong> tile should be marked <strong>Hero row</strong> for the wide top card (e.g. Intraoral Scanner).</p>
        </div>
    </div>
</div>
