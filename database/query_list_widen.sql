-- Optional: run if contact form emails/names were truncated (older installs used varchar(30)).
ALTER TABLE `query_list`
  MODIFY `name` VARCHAR(120) NOT NULL,
  MODIFY `email` VARCHAR(191) NOT NULL,
  MODIFY `mobile` VARCHAR(40) NOT NULL;
