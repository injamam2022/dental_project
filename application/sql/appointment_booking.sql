-- Run once against the clinic database (phpMyAdmin or mysql CLI).

CREATE TABLE IF NOT EXISTS `appointment_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `appointment_date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_appointment_date` (`appointment_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `website_setting`
  ADD COLUMN `appointment_notify_email` varchar(255) NOT NULL DEFAULT '' AFTER `support_email`;

ALTER TABLE `website_setting`
  ADD COLUMN `appointment_admin_subject` varchar(255) NOT NULL DEFAULT '' AFTER `appointment_notify_email`,
  ADD COLUMN `appointment_admin_body` text AFTER `appointment_admin_subject`,
  ADD COLUMN `appointment_customer_subject` varchar(255) NOT NULL DEFAULT '' AFTER `appointment_admin_body`,
  ADD COLUMN `appointment_customer_body` text AFTER `appointment_customer_subject`;
