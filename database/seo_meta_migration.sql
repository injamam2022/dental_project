-- Run once on your MySQL database (phpMyAdmin or mysql CLI).
-- Extends global SEO stored in website_setting; per-page rows live in seo_page_meta.

CREATE TABLE IF NOT EXISTS `seo_page_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_key` varchar(64) NOT NULL,
  `page_label` varchar(128) NOT NULL DEFAULT '',
  `meta_title` varchar(255) NOT NULL DEFAULT '',
  `meta_description` text,
  `meta_keyword` text,
  `og_title` varchar(255) NOT NULL DEFAULT '',
  `og_description` text,
  `og_image` varchar(500) NOT NULL DEFAULT '',
  `twitter_card` varchar(32) NOT NULL DEFAULT 'summary_large_image',
  `robots` varchar(128) NOT NULL DEFAULT '',
  `canonical_url` varchar(512) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_key` (`page_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `seo_page_meta` (`page_key`, `page_label`) VALUES
('default', 'Default overlay (optional)'),
('home', 'Home'),
('about', 'About'),
('contact', 'Contact'),
('whychooseus', 'Why choose us'),
('services', 'Services listing'),
('service_detail', 'Service detail (template; item meta from service record)'),
('services_calibration', 'Calibration services'),
('blog', 'Blog listing'),
('blog_detail', 'Blog post (template; title from post)'),
('gallery', 'Gallery'),
('career', 'Career'),
('products', 'Products listing'),
('product_detail', 'Product detail (template; item meta from product)'),
('page', 'CMS page'),
('client', 'Clients'),
('appointment', 'Book appointment'),
('dental', 'Dental clinic (main landing)'),
('dental_orthodontist', 'Orthodontist landing'),
('dental_implant', 'Dental implant landing'),
('dental_tmj', 'TMJ specialist landing');

-- Sitewide Open Graph / social (skip any statement that errors with Duplicate column).
ALTER TABLE `website_setting` ADD COLUMN `seo_og_image` VARCHAR(255) NOT NULL DEFAULT '' AFTER `meta_description`;
ALTER TABLE `website_setting` ADD COLUMN `seo_robots` VARCHAR(128) NOT NULL DEFAULT 'index,follow' AFTER `seo_og_image`;
ALTER TABLE `website_setting` ADD COLUMN `seo_twitter_site` VARCHAR(64) NOT NULL DEFAULT '' AFTER `seo_robots`;
ALTER TABLE `website_setting` ADD COLUMN `seo_facebook_app_id` VARCHAR(64) NOT NULL DEFAULT '' AFTER `seo_twitter_site`;
