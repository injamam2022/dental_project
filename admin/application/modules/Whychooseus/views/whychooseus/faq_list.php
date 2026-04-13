<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li><a href="<?php echo site_url('Whychooseus'); ?>">Why Choose Us</a></li>
    <li class="active">FAQ</li>
</ul>
<div class="page-content-wrap">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Why Choose Us — FAQ</h3>
            <div class="pull-right">
                <a href="<?php echo site_url('Whychooseus'); ?>" class="btn btn-default btn-sm">Settings</a>
                <a href="<?php echo site_url('Whychooseus/add_faq'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Question</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($rows)) {
                            echo '<tr><td colspan="4">No FAQ items.</td></tr>';
                        } else {
                            foreach ($rows as $r) {
                        ?>
                        <tr>
                            <td><?php echo (int) $r->sort_order; ?></td>
                            <td><?php echo htmlspecialchars($r->question, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($r->status, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a href="<?php echo site_url('Whychooseus/edit_faq/'.$r->id); ?>" class="btn btn-default btn-xs">Edit</a>
                                <a href="<?php echo site_url('Whychooseus/delete_faq/'.$r->id); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Delete?');">Delete</a>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <p class="text-muted">Answer may include simple HTML (<code>&lt;p&gt;</code>, <code>&lt;br&gt;</code>).</p>
        </div>
    </div>
</div>
