<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$blogs = isset($blog_carousel) && is_array($blog_carousel) ? $blog_carousel : (isset($blogs) && is_array($blogs) ? $blogs : array());
$blogs = array_slice($blogs, 0, 3);
$favicon = base_url('assets/images/favicon.png');
?>
<style>
.dontia-blog-sec{padding-top:8px}
.dontia-blog-sec .dontia-blog-head{text-align:center;margin:0 0 26px}
.dontia-blog-sec .dontia-blog-head h3{margin:0 0 8px}
.dontia-blog-sec .dontia-blog-head p{margin:0 auto;max-width:640px;color:#675f57;line-height:1.6}
.dontia-blog-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:22px;align-items:stretch}
.dontia-blog-grid:has(.dontia-blog-card:first-child:last-child){grid-template-columns:minmax(0,1fr);max-width:420px;margin-left:auto;margin-right:auto}
.dontia-blog-grid:has(.dontia-blog-card:nth-child(2):last-child){grid-template-columns:repeat(2,minmax(0,1fr))}
.dontia-blog-card{background:#fff;border:1px solid #ece6df;border-radius:16px;overflow:hidden;box-shadow:0 10px 24px rgba(49,19,0,.08);display:flex;flex-direction:column;height:100%;transition:transform .2s ease,box-shadow .2s ease}
.dontia-blog-card:hover{transform:translateY(-3px);box-shadow:0 16px 30px rgba(49,19,0,.12)}
.dontia-blog-media{position:relative;aspect-ratio:16/10;background:#f3eee8;overflow:hidden}
.dontia-blog-media img{width:100%;height:100%;object-fit:cover;object-position:center 20%;display:block}
.dontia-blog-media.is-fallback img{object-fit:contain;object-position:center;padding:28px;background:#f7f3ee}
.dontia-blog-body{padding:18px 18px 20px;display:flex;flex-direction:column;flex:1}
.dontia-blog-title{margin:0 0 12px!important;font-family:'Montserrat','Arimo',sans-serif!important;font-size:17px!important;font-weight:600!important;line-height:1.4!important;letter-spacing:0!important;text-transform:none!important;color:#2f2a26!important;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;min-height:4.2em}
.dontia-blog-read{margin-top:auto;align-self:flex-start;display:inline-flex;align-items:center;gap:6px;color:#5b2f1d!important;font-weight:700;font-size:13px;letter-spacing:.04em;text-transform:uppercase;text-decoration:none}
.dontia-blog-read:hover,.dontia-blog-read:focus{color:#b78333!important;text-decoration:none}
.dontia-blog-empty{background:#fff;border:1px solid #ece6df;border-radius:14px;padding:22px;text-align:center;color:#5a534c}
.dontia-blog-all{margin-top:22px;text-align:center}
@media (max-width:1024px){.dontia-blog-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media (max-width:700px){.dontia-blog-grid{grid-template-columns:1fr}.dontia-blog-title{min-height:0}}
</style>

<section class="ortho-sec dontia-blog-sec">
    <div class="container">
        <div class="dontia-blog-head">
            <h3>From our blog</h3>
            <p>Practical dental advice and clinic updates from Dontia Care Clinic.</p>
        </div>
        <?php if (count($blogs) > 0) { ?>
        <div class="dontia-blog-grid">
            <?php foreach ($blogs as $b) {
                $b_title = isset($b->post_title) ? trim((string) $b->post_title) : 'Blog';
                $has_img = !empty($b->blog_image);
                $b_img = $has_img ? base_url('admin/webroot/uploads/blog/' . $b->blog_image) : $favicon;
                $b_permalink = isset($b->Permalink) ? strtolower(trim((string) $b->Permalink)) : '';
                $b_permalink = preg_replace('/[^a-z0-9\s-]/', '', $b_permalink);
                $b_permalink = trim(preg_replace('/[\s-]+/', '-', $b_permalink), '-');
                $b_link = $b_permalink !== '' ? base_url('blog/' . $b_permalink) : (isset($b->id) ? base_url('Blog/blogdetails/' . (int) $b->id) : '#');
                $is_fallback = !$has_img;
            ?>
            <article class="dontia-blog-card">
                <div class="dontia-blog-media<?php echo $is_fallback ? ' is-fallback' : ''; ?>">
                    <img src="<?php echo htmlspecialchars($b_img, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($b_title, ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async" width="640" height="400">
                </div>
                <div class="dontia-blog-body">
                    <h3 class="dontia-blog-title"><?php echo htmlspecialchars($b_title, ENT_QUOTES, 'UTF-8'); ?></h3>
                    <a class="dontia-blog-read" href="<?php echo htmlspecialchars($b_link, ENT_QUOTES, 'UTF-8'); ?>">Read article <span aria-hidden="true">→</span></a>
                </div>
            </article>
            <?php } ?>
        </div>
        <div class="dontia-blog-all">
            <a class="ortho-btn" href="<?php echo base_url('blogs'); ?>">View all blogs</a>
        </div>
        <?php } else { ?>
        <p class="dontia-blog-empty">Blog posts will appear here when published from admin.</p>
        <?php } ?>
    </div>
</section>
