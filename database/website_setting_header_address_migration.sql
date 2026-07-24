-- Run once. Optional one-line addresses for the site header top bar (full addresses stay in address / corporate_address).
ALTER TABLE `website_setting`
  ADD COLUMN `address_header_display` VARCHAR(255) NOT NULL DEFAULT '' AFTER `address`,
  ADD COLUMN `corporate_address_header_display` VARCHAR(255) NOT NULL DEFAULT '' AFTER `corporate_address`;
