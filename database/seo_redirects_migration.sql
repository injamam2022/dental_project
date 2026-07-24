-- Run once on your MySQL database (phpMyAdmin or mysql CLI).
-- Admin: SEO → 301 Redirects (Yoast-style). Frontend applies rules before page load.

CREATE TABLE IF NOT EXISTS `seo_redirect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source_url` varchar(512) NOT NULL COMMENT 'Request path without domain, e.g. old-page or blog/old-slug',
  `target_url` varchar(512) NOT NULL DEFAULT '' COMMENT 'Relative path or full https URL; empty for 410',
  `http_code` smallint(5) NOT NULL DEFAULT 301,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `notes` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `source_url` (`source_url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `seo_redirect` (`source_url`, `target_url`, `http_code`, `status`, `notes`) VALUES
('dental-services-in-kolkata', 'best-dental-clinic-in-kolkata', 301, 'active', 'Legacy dental landing slug'),
('brand/brand-2', '/', 301, 'active', 'Legacy WordPress brand page → home');

-- Fix rows saved before "/" homepage fix (target was stored as empty).
UPDATE `seo_redirect` SET `target_url` = '/' WHERE `target_url` = '' AND `http_code` != 410;
