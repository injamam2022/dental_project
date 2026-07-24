-- Run once if seo_dental_pages_migration.sql was already applied earlier.
INSERT IGNORE INTO `seo_page_meta` (`page_key`, `page_label`, `meta_title`, `meta_description`, `canonical_url`) VALUES
('dental_root_canal', 'Root canal treatment landing', 'Root Canal Treatment in Kolkata – Painless & Advanced Care', 'Get painless and affordable root canal treatment at Dontia Care Clinic-Dental. Expert endodontists, modern technology, and same-day relief from tooth pain.', '');
