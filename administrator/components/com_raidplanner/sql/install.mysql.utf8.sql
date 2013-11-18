DROP TABLE IF EXISTS `#__raidplanner_raids`;
DROP TABLE IF EXISTS `#__raidplanner_invites`;

CREATE TABLE `#__raidplanner_raids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL DEFAULT "",
  `date` DATE NOT NULL,
  `start_time` TIME NOT NULL,
  `end_time` TIME NOT NULL,
  `description` TEXT NOT NULL DEFAULT "",
  `size` int(11) NOT NULL DEFAULT 0,
  `raid_type` varchar(10) NOT NULL DEFAULT "",
  `locked` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__raidplanner_invites` (
  `raid_id` int(11) NOT NULL,
  `char_id` int(11) NOT NULL,
  `status` VARCHAR(255) NOT NULL DEFAULT "",
  `comment` TEXT NOT NULL DEFAULT "",
  PRIMARY KEY (`raid_id`, `char_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;