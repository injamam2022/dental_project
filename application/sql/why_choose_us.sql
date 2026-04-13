-- Why Choose Us: settings, feature cards, FAQ. Run once on dental_project DB.

CREATE TABLE IF NOT EXISTS `why_choose_us_settings` (
  `id` tinyint unsigned NOT NULL DEFAULT 1,
  `main_heading` varchar(512) NOT NULL,
  `intro_text` text NOT NULL,
  `faq_heading` varchar(255) NOT NULL DEFAULT 'Still Have Doubts?',
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `why_choose_us_features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `icon_path` varchar(512) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `idx_sort` (`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `why_choose_us_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `question` varchar(512) NOT NULL,
  `answer` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `idx_sort` (`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `why_choose_us_settings` (`id`, `main_heading`, `intro_text`, `faq_heading`) VALUES
(1,
'Why Dontia Care Clinic the best dental and skin clinic in Kolkata?',
'At Dontia Care Clinic, as the dental & skin clinic in Kolkata, we blend cutting-edge technology with compassionate, patient-centered treatment to deliver exceptional dental care. Established in 2001 and recognized as Eastern India''s only Dawson Academy-certified clinic, our expert team is dedicated to creating healthy, confident smiles with precision, integrity, and global standards of excellence.',
'Still Have Doubts?')
ON DUPLICATE KEY UPDATE `main_heading` = VALUES(`main_heading`);

INSERT INTO `why_choose_us_features` (`sort_order`, `icon_path`, `title`, `description`, `status`) VALUES
(1, 'icon-1.svg', 'Highly Trained Team', 'Our experts are internationally trained and committed to delivering precise, ethical, and compassionate care.', 'active'),
(2, 'icon-2.svg', 'Advanced Technology & Techniques', 'Equipped with cutting-edge equipment and modern treatment protocols for accurate and painless procedures.', 'active'),
(3, 'icon-3.svg', 'Safe, Hygienic & Comfortable Environment', 'We follow international sterilization protocols to ensure your safety and comfort throughout your visit.', 'active'),
(4, 'icon-4.svg', 'Guaranteed Results', 'We provide personalized care plans tailored to your unique needs and comfort.', 'active'),
(5, 'icon-5.svg', 'Dawson Academy Certified', 'The only dental clinic in Eastern India recognized by the prestigious Dawson Academy (Florida), ensuring global clinical standards.', 'active'),
(6, 'icon-6.svg', 'Over 20 Years of Trusted Service', 'Serving smiles since 2001 with a legacy of quality and patient satisfaction. Over two decades of trusted dental excellence and patient satisfaction.', 'active'),
(7, 'icon-7.svg', 'Personalized & Compassionate Care', 'Each patient is treated with warmth, empathy, and customized treatment plans tailored to individual needs.', 'active');

INSERT INTO `why_choose_us_faq` (`sort_order`, `question`, `answer`, `status`) VALUES
(1, 'What services does Dontia Care Clinic offer?', '<p>We offer a full range of Dental, Skin &amp; ENT services including smile correction, dental implants, braces, root canal treatment, gum therapy, cosmetic dentistry, and preventive care.</p>', 'active'),
(2, 'Is Dontia Care Clinic safe and hygienic?', '<p>Absolutely. We follow strict international sterilization protocols and maintain a fully sanitized environment for every patient visit.</p>', 'active'),
(3, 'Do you offer painless treatments?', '<p>Yes, we use advanced technology and gentle techniques for a pain-free experience. We''re known as the Best Dental Clinic in Kolkata for Pain-Free Treatments, offering meticulously planned care.</p>', 'active'),
(4, 'What specialists available here?', '<p>1. Dentists<br>2. ENT surgeons<br>3. Dermatologists and skin care therapists<br>4. TMD/ TMJ Specialist</p>', 'active'),
(5, 'How do I book an appointment?', '<p>You can book an appointment by calling us directly or filling out the appointment form on our website. Walk-ins are welcome but subject to availability.</p>', 'active'),
(6, 'What makes Dontia different from other clinics?', '<p>As the leading dental clinic in Kolkata, we bring 20+ years of trusted care, advanced technology, expert dentists, and a patient-centered approach for lifelong oral health.</p>', 'active');
