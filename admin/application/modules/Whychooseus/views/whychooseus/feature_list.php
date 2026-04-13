<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li><a href="<?php echo site_url('Whychooseus'); ?>">Why Choose Us</a></li>
    <li class="active">Feature cards</li>
</ul>
<div class="page-content-wrap">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Why Choose Us — feature cards</h3>
            <div class="pull-right">
                <a href="<?php echo site_url('Whychooseus'); ?>" class="btn btn-default btn-sm">Settings</a>
                <a href="<?php echo site_url('Whychooseus/add_feature'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Title</th>
                            <th>Icon</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($rows)) {
                            echo '<tr><td colspan="5">No features.</td></tr>';
                        } else {
                            foreach ($rows as $r) {
                        ?>
                        <tr>
                            <td><?php echo (int) $r->sort_order; ?></td>
                            <td><?php echo htmlspecialchars($r->title, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><code><?php echo htmlspecialchars($r->icon_path, ENT_QUOTES, 'UTF-8'); ?></code></td>
                            <td><?php echo htmlspecialchars($r->status, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a href="<?php echo site_url('Whychooseus/edit_feature/'.$r->id); ?>" class="btn btn-default btn-xs">Edit</a>
                                <a href="<?php echo site_url('Whychooseus/delete_feature/'.$r->id); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Delete?');">Delete</a>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <p class="text-muted">Icon: filename in <code>assets/images/why-choose-us/</code> (e.g. <code>icon-1.svg</code>) or full <code>https://…</code> URL.</p>
        </div>
    </div>
</div>
