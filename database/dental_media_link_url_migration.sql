-- Optional heading link for dental media items (e.g. specialisations section).
ALTER TABLE `dental_media`
  ADD COLUMN `link_url` varchar(512) DEFAULT NULL AFTER `description`;
