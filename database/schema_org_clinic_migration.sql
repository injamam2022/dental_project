-- Run once on MySQL (phpMyAdmin or mysql CLI).
-- Adds admin-editable columns used by application/helpers/schema_org_helper.php for TMJ (and similar) JSON-LD.
-- Skip any statement that errors with "Duplicate column name".
-- Columns are appended to the table (no AFTER dependency on other migrations).

ALTER TABLE `website_setting` ADD COLUMN `schema_business_name` VARCHAR(255) NOT NULL DEFAULT '';
ALTER TABLE `website_setting` ADD COLUMN `schema_clinic_image` VARCHAR(512) NOT NULL DEFAULT '';
ALTER TABLE `website_setting` ADD COLUMN `schema_street_address` VARCHAR(512) NOT NULL DEFAULT '';
ALTER TABLE `website_setting` ADD COLUMN `schema_address_locality` VARCHAR(128) NOT NULL DEFAULT '';
ALTER TABLE `website_setting` ADD COLUMN `schema_postal_code` VARCHAR(32) NOT NULL DEFAULT '';
ALTER TABLE `website_setting` ADD COLUMN `schema_address_country` VARCHAR(8) NOT NULL DEFAULT '';
ALTER TABLE `website_setting` ADD COLUMN `schema_latitude` VARCHAR(32) NOT NULL DEFAULT '';
ALTER TABLE `website_setting` ADD COLUMN `schema_longitude` VARCHAR(32) NOT NULL DEFAULT '';
ALTER TABLE `website_setting` ADD COLUMN `schema_price_range` VARCHAR(16) NOT NULL DEFAULT '';
ALTER TABLE `website_setting` ADD COLUMN `schema_opens` VARCHAR(8) NOT NULL DEFAULT '';
ALTER TABLE `website_setting` ADD COLUMN `schema_closes` VARCHAR(8) NOT NULL DEFAULT '';
ALTER TABLE `website_setting` ADD COLUMN `schema_opening_days` VARCHAR(512) NOT NULL DEFAULT '';
