<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
    <li><a href="<?php echo site_url('blog'); ?>">Blog Management</a></li>
    <li class="active">Add Blog</li>
</ul>
<!-- END BREADCRUMB -->

<style>
.blog-form-wrap{padding:18px 6px}
.blog-form-card{background:#fff;border-radius:10px;box-shadow:0 6px 18px rgba(0,0,0,0.06);border:1px solid #e7ebf0;margin-bottom:22px}
.blog-form-card .blog-form-card-head{padding:14px 18px;border-bottom:1px solid #ecf0f4;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px}
.blog-form-card .blog-form-card-head h3{margin:0;font-size:16px;font-weight:600;color:#2c3e50;letter-spacing:.2px}
.blog-form-card .blog-form-card-head h3 .fa{color:#5d6f81;margin-right:8px}
.blog-form-card .blog-form-card-head .blog-form-card-actions a{margin-left:6px}
.blog-form-card .blog-form-card-body{padding:20px 18px}
.blog-section-title{font-size:13px;font-weight:700;color:#5d6f81;text-transform:uppercase;letter-spacing:.08em;margin:0 0 12px;padding-bottom:8px;border-bottom:1px dashed #e2e7ed}
.blog-field{margin-bottom:16px}
.blog-field > label{display:block;font-weight:600;color:#3a4a5c;margin-bottom:6px;font-size:13px}
.blog-field > label .required{color:#d9534f}
.blog-field .hint{display:block;font-size:11px;color:#8895a4;margin-top:4px}
.blog-permalink-prefix{background:#f5f7fa;color:#5d6f81;border:1px solid #d8dee5;border-right:0;border-radius:4px 0 0 4px;padding:7px 10px;font-size:12px;display:flex;align-items:center}
.blog-image-drop{border:2px dashed #c8d3df;border-radius:10px;background:#fbfcfd;padding:18px;text-align:center;transition:border-color .2s ease,background .2s ease;cursor:pointer}
.blog-image-drop:hover,.blog-image-drop.is-dragover{border-color:#3498db;background:#f4faff}
.blog-image-drop .fa{font-size:34px;color:#9aa9b8;margin-bottom:10px;display:block}
.blog-image-drop strong{display:block;font-size:14px;color:#3a4a5c;margin-bottom:4px}
.blog-image-drop small{color:#8895a4;font-size:12px}
.blog-image-drop input[type="file"]{display:none}
.blog-image-preview{margin-top:14px;display:flex;align-items:center;gap:14px;flex-wrap:wrap;background:#fff;border:1px solid #e7ebf0;border-radius:10px;padding:10px 12px}
.blog-image-preview img{width:120px;height:90px;object-fit:cover;border-radius:8px;border:1px solid #e7ebf0;background:#f5f7fa}
.blog-image-preview .blog-image-info{flex:1;min-width:160px}
.blog-image-preview .blog-image-info b{display:block;color:#3a4a5c;font-size:13px;word-break:break-all}
.blog-image-preview .blog-image-info span{font-size:11px;color:#8895a4}
.blog-image-preview .blog-image-reset{background:none;border:1px solid #d9534f;color:#d9534f;border-radius:6px;padding:5px 10px;font-size:11px;cursor:pointer}
.blog-image-preview .blog-image-reset:hover{background:#d9534f;color:#fff}
.blog-form-actions{padding:14px 18px;display:flex;justify-content:space-between;gap:10px;flex-wrap:wrap;background:#f8fafc;border-top:1px solid #ecf0f4;border-radius:0 0 10px 10px}
.blog-form-actions .left-actions,.blog-form-actions .right-actions{display:flex;gap:8px;flex-wrap:wrap}
.blog-status-pill{display:inline-flex;align-items:center;gap:6px;padding:3px 10px;border-radius:999px;font-size:11px;font-weight:600;background:#eaf6ec;color:#27ae60;border:1px solid #cdebd3}
.blog-form-card textarea{min-height:280px}
@media (max-width: 991px){.blog-form-card .blog-form-card-head{flex-direction:column;align-items:flex-start}}
</style>

<div class="page-content-wrap blog-form-wrap">
    <div class="row">
        <div class="col-md-12">
            <form id="add_blog_form" class="form-horizontal" method="post"
                action="<?php echo site_url('blog/insert'); ?>" enctype="multipart/form-data">

                <?php $log_s = $this->session->flashdata('msg'); ?>
                <?php if (!empty($log_s)) { ?>
                <div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check"></i> <?php echo $log_s; ?>
                </div>
                <?php } ?>

                <div class="blog-form-card">
                    <div class="blog-form-card-head">
                        <h3><i class="fa fa-pencil-square-o"></i> Add New Blog Post</h3>
                        <div class="blog-form-card-actions">
                            <a class="btn btn-default btn-sm" href="<?php echo site_url('blog'); ?>">
                                <i class="fa fa-arrow-left"></i> Back to Blog List
                            </a>
                        </div>
                    </div>

                    <div class="blog-form-card-body">
                        <p class="blog-section-title">Post Basics</p>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="blog-field">
                                    <label>Post Title <span class="required">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="post_title" placeholder="Enter post title"
                                            onblur="slug_url(this.value,'category_title')"
                                            class="form-control" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="blog-field">
                                    <label>Permalink (URL slug) <span class="required">*</span></label>
                                    <div class="input-group">
                                        <span class="blog-permalink-prefix"><?php echo base_url(); ?>blog/</span>
                                        <input type="text" name="category_title" id="category_title"
                                            placeholder="auto-generated-from-title" class="form-control" required />
                                    </div>
                                    <small class="hint">Lowercase letters, numbers and hyphens only.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="blog-form-card">
                    <div class="blog-form-card-head">
                        <h3><i class="fa fa-file-text-o"></i> Content</h3>
                    </div>
                    <div class="blog-form-card-body">
                        <div class="blog-field">
                            <label>Description <span class="required">*</span></label>
                            <textarea name="summernote" class="summernote form-control" rows="10"></textarea>
                            <small class="hint">Use the toolbar to format headings, lists, links and add images.</small>
                        </div>

                        <div class="blog-field">
                            <label>Post Tags</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-tags"></span></span>
                                <input type="text" name="tag" placeholder="e.g. Cosmetic, Whitening, Care"
                                    class="form-control" />
                            </div>
                            <small class="hint">Separate multiple tags with commas.</small>
                        </div>
                    </div>
                </div>

                <div class="blog-form-card">
                    <div class="blog-form-card-head">
                        <h3><i class="fa fa-image"></i> Featured Image</h3>
                    </div>
                    <div class="blog-form-card-body">
                        <div class="blog-field">
                            <label>Upload featured image <span class="required">*</span></label>
                            <label for="blog_image_input" class="blog-image-drop" id="blog_image_drop">
                                <i class="fa fa-cloud-upload"></i>
                                <strong>Click here or drop an image to upload</strong>
                                <small>JPG, PNG or GIF — recommended 1200×675 (16:9)</small>
                                <input type="file" id="blog_image_input"
                                    name="uploadedimages[]" accept="image/*" required />
                            </label>

                            <div class="blog-image-preview" id="blog_image_preview" style="display:none;">
                                <img id="blog_image_preview_img" src="" alt="Preview" />
                                <div class="blog-image-info">
                                    <b id="blog_image_preview_name">No file selected</b>
                                    <span id="blog_image_preview_meta"></span>
                                </div>
                                <button type="button" class="blog-image-reset" id="blog_image_reset">
                                    <i class="fa fa-times"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="blog-form-card">
                    <div class="blog-form-card-head">
                        <h3><i class="fa fa-cog"></i> Publish Settings</h3>
                    </div>
                    <div class="blog-form-card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="blog-field">
                                    <label>Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="Yes">Enable (visible on site)</option>
                                        <option value="No">Disable (hidden)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="blog-field">
                                    <label>Posted By</label>
                                    <select class="form-control" name="posted">
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="blog-field">
                                    <label>Visibility</label>
                                    <p><span class="blog-status-pill"><i class="fa fa-check-circle"></i> Will appear in /blog list</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="blog-form-actions">
                        <div class="left-actions">
                            <button type="button" class="btn btn-default"
                                onclick="document.getElementById('add_blog_form').reset();
                                         document.getElementById('blog_image_preview').style.display='none';">
                                <i class="fa fa-refresh"></i> Clear Form
                            </button>
                        </div>
                        <div class="right-actions">
                            <a class="btn btn-default" href="<?php echo site_url('blog'); ?>">Cancel</a>
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-save"></i> Publish Post
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT WRAPPER -->

<script>
(function () {
    var input = document.getElementById('blog_image_input');
    var drop = document.getElementById('blog_image_drop');
    var preview = document.getElementById('blog_image_preview');
    var img = document.getElementById('blog_image_preview_img');
    var nm = document.getElementById('blog_image_preview_name');
    var meta = document.getElementById('blog_image_preview_meta');
    var reset = document.getElementById('blog_image_reset');
    if (!input || !drop || !preview) { return; }

    function formatBytes(b) {
        if (!b && b !== 0) return '';
        if (b < 1024) return b + ' B';
        if (b < 1024 * 1024) return (b / 1024).toFixed(1) + ' KB';
        return (b / (1024 * 1024)).toFixed(2) + ' MB';
    }
    function showPreview(file) {
        if (!file) { preview.style.display = 'none'; return; }
        var reader = new FileReader();
        reader.onload = function (e) {
            img.src = e.target.result;
            nm.textContent = file.name;
            meta.textContent = (file.type || 'image') + ' • ' + formatBytes(file.size);
            preview.style.display = 'flex';
        };
        reader.readAsDataURL(file);
    }
    input.addEventListener('change', function () {
        if (input.files && input.files[0]) showPreview(input.files[0]);
    });
    reset.addEventListener('click', function () {
        input.value = '';
        preview.style.display = 'none';
    });
    ;['dragenter', 'dragover'].forEach(function (ev) {
        drop.addEventListener(ev, function (e) {
            e.preventDefault(); e.stopPropagation();
            drop.classList.add('is-dragover');
        });
    });
    ;['dragleave', 'drop'].forEach(function (ev) {
        drop.addEventListener(ev, function (e) {
            e.preventDefault(); e.stopPropagation();
            drop.classList.remove('is-dragover');
        });
    });
    drop.addEventListener('drop', function (e) {
        if (e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files.length) {
            input.files = e.dataTransfer.files;
            showPreview(input.files[0]);
        }
    });
})();
</script>
