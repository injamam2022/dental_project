-- Latest Technology (home). Run once.

CREATE TABLE IF NOT EXISTS `home_technology_settings` (
  `id` tinyint unsigned NOT NULL DEFAULT 1,
  `section_title` varchar(255) NOT NULL DEFAULT 'Latest Technology',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `home_technology_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_name` varchar(255) NOT NULL DEFAULT '',
  `is_hero` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `idx_sort` (`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `home_technology_settings` (`id`, `section_title`) VALUES (1, 'Latest Technology')
  ON DUPLICATE KEY UPDATE `section_title` = VALUES(`section_title`);

INSERT INTO `home_technology_items` (`sort_order`, `title`, `description`, `image_name`, `is_hero`, `status`) VALUES
(1, 'Intraoral Scanner', 'A lightweight, user-friendly device featuring one-click scanning and versatile tips, delivering precise and efficient digital impressions for dentistry.', 'hero.svg', 1, 'active'),
(2, 'Aquacare Air Abrasion', 'It allows for contact-free, minimally invasive dentistry, making procedures painless.', 'tile-1.svg', 0, 'active'),
(3, 'Baldus', 'Compact, secure, and easy-to-use nitrous oxide sedation unit for patient comfort.', 'tile-2.svg', 0, 'active'),
(4, 'Dental Laser', 'Dental lasers use concentrated light to remove or shape tissue during procedures.', 'tile-3.svg', 0, 'active');
