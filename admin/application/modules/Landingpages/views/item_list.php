<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li><a href="<?php echo site_url('Landingpages'); ?>">Dental Pages</a></li>
    <li class="active">Items — <?php echo htmlspecialchars($page->page_label, ENT_QUOTES, 'UTF-8'); ?></li>
</ul>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Items for <?php echo htmlspecialchars($page->page_label, ENT_QUOTES, 'UTF-8'); ?></h3>
        <div class="btn-group pull-right" style="margin-right:2%;">
            <a class="btn btn-primary" href="<?php echo site_url('Landingpages/add_item/' . encode_url($page->id)); ?>"><i class="fa fa-plus-circle"></i> Add item</a>
            <a class="btn btn-default" href="<?php echo site_url('Landingpages/edit/' . encode_url($page->id)); ?>"><i class="fa fa-pencil"></i> Page content</a>
        </div>
    </div>
    <div class="panel-body">
        <form method="get" class="form-inline" style="margin-bottom:16px;">
            <label>Section</label>
            <select name="section" class="form-control" onchange="this.form.submit()">
                <option value="">All sections</option>
                <?php foreach ($section_labels as $key => $label) { ?>
                    <option value="<?php echo htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?>" <?php echo $section_filter === $key ? 'selected' : ''; ?>><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></option>
                <?php } ?>
            </select>
        </form>
        <p class="help-block">FAQs use Title = question and Description = answer. Transformations and cards use Title, Description, Image, and Alt text. If a service page has no Why / Specialisations / Stats / Procedures items, it reuses the Best Dental Clinic list.</p>
        <table class="table datatable">
            <thead>
            <tr>
                <th>Section</th>
                <th>Title</th>
                <th>Image</th>
                <th>Alt</th>
                <th>Order</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($item_list)) { foreach ($item_list as $it) {
                $sec_label = isset($section_labels[$it->section_key]) ? $section_labels[$it->section_key] : $it->section_key;
                $thumb = !empty($it->image_name) ? dontia_landing_image_url($it->image_name) : '';
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($sec_label, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars((string) $it->title, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if ($thumb !== '') { ?><img src="<?php echo htmlspecialchars($thumb, ENT_QUOTES, 'UTF-8'); ?>" width="50" height="50" alt="" style="object-fit:cover;border-radius:4px;"><?php } ?></td>
                    <td><?php echo htmlspecialchars((string) $it->image_alt, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo (int) $it->sort_order; ?></td>
                    <td><?php echo htmlspecialchars($it->status, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a class="btn btn-default btn-rounded btn-sm" href="<?php echo site_url('Landingpages/edit_item/' . encode_url($it->id)); ?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn btn-danger btn-rounded btn-sm" href="<?php echo site_url('Landingpages/delete_item/' . encode_url($it->id)); ?>" onclick="return confirm('Delete this item?');"><span class="fa fa-times"></span></a>
                    </td>
                </tr>
            <?php }} ?>
            </tbody>
        </table>
    </div>
</div>
