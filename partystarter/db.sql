CREATE TABLE `user` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`username` char(255) DEFAULT NULL,
`password` char(255) DEFAULT NULL,
`email` char(255) DEFAULT NULL,
`address` char(255) DEFAULT NULL,
`comfirmation` tinyint(1) DEFAULT NULL,
`profile_photo` text,
PRIMARY KEY (`id`),
UNIQUE KEY `email` (`email`)
);

CREATE TABLE `host` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `description` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `place` int(11) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `maximum` int(11) DEFAULT NULL,
  `minimum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `guest` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`user_id` int(11) DEFAULT NULL,
`host_id` int(11) DEFAULT NULL,
`payment` tinyint(1) DEFAULT NULL,
`comment` int(11) DEFAULT NULL,
`rate` int(11) DEFAULT NULL,
PRIMARY KEY (`id`)
);
