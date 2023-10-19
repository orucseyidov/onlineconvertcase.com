ALTER TABLE `rating` ADD `comment` TEXT NULL AFTER `rating`;



INSERT INTO `titles` (`id`, `keyword`, `title`, `locale`) VALUES
('textare_placeholder', 'Type or paste your text here to convert case', 'en'),
('modal_submit', 'Submit', 'en'),
('modal_check', 'Check me out', 'en'),
('modal_feedback', 'Feedback', 'en'),
('modal_email', 'Email', 'en'),
('modal_name', 'Full Name', 'en'),
('modal_title_recommend', 'Recommend Your Preferred Tools', 'en'),
('home_about_blocks_title', 'About Convert case', 'en');


-- Yeniler
ALTER TABLE `static_pages` CHANGE `tags` `keywords` VARCHAR(1500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `static_pages` ADD `meta_title` VARCHAR(500) NULL AFTER `slug`, ADD `meta_description` TEXT NULL AFTER `meta_title`;
ALTER TABLE `other_tools` ADD `file` VARCHAR(255) NULL AFTER `slug`;



ALTER TABLE `other_tools` CHANGE `file` `view` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `other_tools` ADD `javascript` VARCHAR(255) NULL AFTER `view`;

-- lasted

ALTER TABLE `common_contents` ADD `meta_title` VARCHAR(500) NULL AFTER `seo_description`, ADD `meta_description` TEXT NULL AFTER `meta_title`;