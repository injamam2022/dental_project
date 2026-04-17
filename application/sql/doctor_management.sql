CREATE TABLE IF NOT EXISTS `doctor_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactivate') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
