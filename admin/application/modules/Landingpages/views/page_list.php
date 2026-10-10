<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li class="active"><a href="<?php echo site_url('Landingpages'); ?>">Dental Pages</a></li>
</ul>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Dental Pages — edit website content</h3>
    </div>
    <div class="panel-body">
        <p class="help-block" style="margin-top:0;">
            Update headings, copy, images, and alt text for every dental landing page. Doctors, gallery, video testimonials, blogs, and certificates still use their own menus.
            Cards, FAQs, and transformations are under <strong>Manage items</strong> for each page.
        </p>
        <table class="table datatable">
            <thead>
            <tr>
                <th>Page</th>
                <th>Key</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($page_list)) { foreach ($page_list as $p) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($p->page_label, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><code><?php echo htmlspecialchars($p->page_key, ENT_QUOTES, 'UTF-8'); ?></code></td>
                    <td><?php echo htmlspecialchars($p->status, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="<?php echo site_url('Landingpages/edit/' . encode_url($p->id)); ?>"><span class="fa fa-pencil"></span> Edit content</a>
                        <a class="btn btn-default btn-sm" href="<?php echo site_url('Landingpages/items/' . encode_url($p->id)); ?>"><span class="fa fa-th"></span> Manage items</a>
                    </td>
                </tr>
            <?php }} ?>
            </tbody>
        </table>
    </div>
</div>
