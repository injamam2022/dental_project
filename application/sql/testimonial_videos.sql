CREATE TABLE IF NOT EXISTS `testimonial_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `youtube_id` varchar(64) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactivate') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `testimonial_videos` (`title`, `youtube_id`, `sort_order`, `status`)
SELECT * FROM (
  SELECT 'Patient Success Story 1', 'oc0Hd7l6Y8Q', 1, 'active'
  UNION ALL
  SELECT 'Patient Success Story 2', 'g3XqEYCJ8BY', 2, 'active'
  UNION ALL
  SELECT 'Patient Success Story 3', '3MLAZHPAJA8', 3, 'active'
  UNION ALL
  SELECT 'Patient Success Story 4', 'oc0Hd7l6Y8Q', 4, 'active'
  UNION ALL
  SELECT 'Patient Success Story 5', 'g3XqEYCJ8BY', 5, 'active'
) AS t
WHERE NOT EXISTS (SELECT 1 FROM testimonial_videos LIMIT 1);
