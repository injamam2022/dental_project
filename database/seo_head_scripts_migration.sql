-- Run once on MySQL (phpMyAdmin or mysql CLI).
-- Adds admin-editable head scripts / verification tags for SEO pages and sitewide defaults.
-- Skip any statement that errors with "Duplicate column name".

ALTER TABLE `seo_page_meta` ADD COLUMN `head_scripts` TEXT;
ALTER TABLE `website_setting` ADD COLUMN `seo_head_scripts` TEXT;
ALTER TABLE `website_setting` ADD COLUMN `seo_google_site_verification` VARCHAR(128) NOT NULL DEFAULT '';

UPDATE `website_setting`
SET `seo_google_site_verification` = 'lG64Bd6prDWbpFSQnbEu1O8wA7ElwF6Jed6SD-zr8js'
WHERE `id` = 1 AND (`seo_google_site_verification` IS NULL OR TRIM(`seo_google_site_verification`) = '');
