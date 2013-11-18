DROP TABLE IF EXISTS `#__joinus_application`;

CREATE TABLE `#__joinus_application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `age` INT(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `class` varchar(20) NOT NULL,
  `specc` varchar(10) NOT NULL,
  `armory` varchar(400) NOT NULL,
  `experience` TEXT NOT NULL DEFAULT '',
  `online` TEXT NOT NULL DEFAULT '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;