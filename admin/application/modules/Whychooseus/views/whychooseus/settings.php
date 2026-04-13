<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li class="active">Why Choose Us — page text</li>
</ul>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Why Choose Us — headings &amp; intro</h3>
                    <div class="pull-right">
                        <a href="<?php echo site_url('Whychooseus/features'); ?>" class="btn btn-default btn-sm">Feature cards</a>
                        <a href="<?php echo site_url('Whychooseus/faq'); ?>" class="btn btn-default btn-sm">FAQ</a>
                    </div>
                </div>
                <div class="panel-body">
                    <form method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Main heading</label>
                            <div class="col-md-8">
                                <input type="text" name="main_heading" class="form-control" value="<?php echo $settings ? htmlspecialchars($settings->main_heading, ENT_QUOTES, 'UTF-8') : ''; ?>" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Intro paragraph</label>
                            <div class="col-md-8">
                                <textarea name="intro_text" class="form-control" rows="6" required><?php echo $settings ? htmlspecialchars($settings->intro_text, ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">FAQ section heading</label>
                            <div class="col-md-8">
                                <input type="text" name="faq_heading" class="form-control" value="<?php echo $settings ? htmlspecialchars($settings->faq_heading, ENT_QUOTES, 'UTF-8') : ''; ?>" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-8">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                    <p class="text-muted">Add a page banner under <strong>Banner Management</strong> with type <strong>Why Choose Us</strong> (optional).</p>
                </div>
            </div>
        </div>
    </div>
</div>
