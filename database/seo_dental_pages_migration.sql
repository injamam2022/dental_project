-- Run once after seo_meta_migration.sql — adds dental landing pages + seeds defaults from former hard-coded SEO.
-- Empty fields on any row still fall back to "default" then website_setting.

INSERT IGNORE INTO `seo_page_meta` (`page_key`, `page_label`, `meta_title`, `meta_description`, `canonical_url`) VALUES
('dental', 'Dental clinic (main landing)', 'Best Dental Clinic in Kolkata, WB | 25+ Experience in Dental Care', 'Experience gentle, professional dental care in Kolkata from our 25+ years experienced dentist. From checkup to advanced treatment, we make your smile shine.', ''),
('dental_orthodontist', 'Orthodontist landing', 'Best Orthodontist in Kolkata | Braces & Invisalign Treatment', 'Transform your smile with expert orthodontic treatment in Kolkata. Explore braces, aligners, retainers, and personalized care at Dontia Care Clinic.', ''),
('dental_implant', 'Dental implant landing', 'Best Dental Implant Clinic in Kolkata | Expert Implant Specialists', 'Restore missing teeth with expert dental implantologists, advanced implant systems, and personalized care at Dontia Dental Care in Kolkata.', ''),
('dental_tmj', 'TMJ specialist landing', 'Best TMJ Specialist in Kolkata, India | Expert Treatment for TMJ Disorders', 'Jaw pain, clicking, headaches, or ear symptoms? Visit Dontia Care Clinic for TMJ / TMD care in Kolkata — Dawson Certified specialist, splints, physiotherapy, Botox for TMJ, and conservative-first treatment.', '');

UPDATE `seo_page_meta` SET
  `meta_title` = 'Multispeciality clinic in Kolkata, WB | Dental | Skin & Hair | ENT',
  `meta_description` = 'Experience world-class Dental, ENT, and Aesthetic Skin & Hair care at Dontia Care Clinic, Kolkata. Book your appointment for expert health solutions.'
WHERE `page_key` = 'home' AND TRIM(COALESCE(`meta_title`, '')) = '';
