-- Run once if seo_dental_pages_migration.sql was already applied earlier.
INSERT IGNORE INTO `seo_page_meta` (`page_key`, `page_label`, `meta_title`, `meta_description`, `canonical_url`) VALUES
('dental_cosmetic', 'Cosmetic dentist landing', 'Best Cosmetic Dentist in Kolkata at Dontia Care Clinic – Transform Your Smile', 'Transform your smile with expert cosmetic dentistry in Kolkata — teeth whitening, veneers, bonding, smile makeovers, and more at Dontia Care Clinic-Dental.', '');
