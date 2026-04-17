<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li class="active"><a href="<?php echo site_url('Testimonialvideos'); ?>">Video Testimonials</a></li>
</ul>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Video Testimonials</h3>
        <div class="btn-group pull-right" style="margin-right: 2%;">
            <a href="<?php echo site_url('Testimonialvideos/add'); ?>">
                <button class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Video</button>
            </a>
        </div>
    </div>
    <div class="panel-body">
        <table class="table datatable">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>YouTube</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($video_list)) { foreach ($video_list as $k => $v) { ?>
                <tr>
                    <td><?php echo $k + 1; ?></td>
                    <td><?php echo htmlspecialchars($v->title, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <?php $yt = htmlspecialchars($v->youtube_id, ENT_QUOTES, 'UTF-8'); ?>
                        <a href="<?php echo 'https://www.youtube.com/watch?v=' . $yt; ?>" target="_blank" rel="noopener noreferrer"><?php echo $yt; ?></a>
                    </td>
                    <td><?php echo (int) $v->sort_order; ?></td>
                    <td><?php echo htmlspecialchars($v->status, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a class="btn btn-default btn-rounded btn-sm" href="<?php echo site_url('Testimonialvideos/edit/' . encode_url($v->id)); ?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn btn-danger btn-rounded btn-sm" href="<?php echo site_url('Testimonialvideos/delete/' . encode_url($v->id)); ?>" onclick="return confirm('Delete this video?');"><span class="fa fa-times"></span></a>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>
</div>

