<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li class="active">Latest Technology — heading</li>
</ul>
<div class="page-content-wrap">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Home page — Latest Technology</h3>
            <div class="pull-right">
                <a href="<?php echo site_url('Hometechnology/items'); ?>" class="btn btn-primary btn-sm">Manage tiles</a>
            </div>
        </div>
        <div class="panel-body">
            <form method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-3 control-label">Section title</label>
                    <div class="col-md-6">
                        <input type="text" name="section_title" class="form-control" value="<?php echo $settings ? htmlspecialchars($settings->section_title, ENT_QUOTES, 'UTF-8') : 'Latest Technology'; ?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-6">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
            <p class="text-muted">Edit each tile, image, and flip text under <strong>Manage tiles</strong>.</p>
        </div>
    </div>
</div>
