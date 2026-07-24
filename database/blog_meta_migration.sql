-- Run once. Per-post SEO on tbl_posts_blog (Admin → Edit Blog Post).
ALTER TABLE `tbl_posts_blog`
  ADD COLUMN `meta_title` VARCHAR(255) NOT NULL DEFAULT '' AFTER `post_title`,
  ADD COLUMN `meta_description` TEXT NULL AFTER `meta_title`;
