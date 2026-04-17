<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li class="active"><a href="<?php echo site_url('Testimonialvideos/edit/' . encode_url($video->id)); ?>">Edit Video Testimonial</a></li>
</ul>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Edit Video Testimonial</strong></h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Testimonialvideos/update'); ?>">
                        <input type="hidden" name="id" value="<?php echo (int) $video->id; ?>">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Title</label>
                            <div class="col-md-6"><input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($video->title, ENT_QUOTES, 'UTF-8'); ?>" required></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">YouTube Video Link</label>
                            <div class="col-md-6">
                                <input type="text" name="youtube_link" class="form-control" value="<?php echo 'https://www.youtube.com/watch?v=' . htmlspecialchars($video->youtube_id, ENT_QUOTES, 'UTF-8'); ?>" required>
                                <span class="help-block">You can paste full YouTube URL or only video ID.</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Sort Order</label>
                            <div class="col-md-6"><input type="number" name="sort_order" class="form-control" value="<?php echo (int) $video->sort_order; ?>"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status</label>
                            <div class="col-md-6">
                                <select class="form-control" name="status">
                                    <option value="active" <?php echo $video->status === 'active' ? 'selected' : ''; ?>>Active</option>
                                    <option value="inactivate" <?php echo $video->status === 'inactivate' ? 'selected' : ''; ?>>Inactivate</option>
                                </select>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

