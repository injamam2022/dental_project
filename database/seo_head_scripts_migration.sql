-- Run once on MySQL (phpMyAdmin or mysql CLI).
-- Adds admin-editable head scripts / verification tags for SEO pages and sitewide defaults.
-- Skip any statement that errors with "Duplicate column name".

ALTER TABLE `seo_page_meta` ADD COLUMN `head_scripts` TEXT;
ALTER TABLE `website_setting` ADD COLUMN `seo_head_scripts` TEXT;
