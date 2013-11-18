DROP TABLE IF EXISTS `#__punishment`;
DROP TABLE IF EXISTS `#__punishment_violation`;
DROP TABLE IF EXISTS `#__punishment_redemption`;
DROP TABLE IF EXISTS `#__punishment_user_punishment`;
DROP TABLE IF EXISTS `#__punishment_user_violation`;
DROP TABLE IF EXISTS `#__punishment_user_reset`;

CREATE TABLE `#__punishment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `threshold` int(11) NOT NULL DEFAULT 0,
  `duration` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__punishment_violation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__punishment_user_violation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `violation_id` int(11) NOT NULL,
  `violation_date` DATE NOT NULL,
  `expired` TINYINT NOT NULL DEFAULT 0,
  `redemption_id` int(11),
    PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__punishment_user_violation_redemption` (
  `user_violation_id` int(11) NOT NULL,
  `redemption_id` int(11) NOT NULL,
  PRIMARY KEY (`user_violation_id`, `redemption_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `#__punishment_user_punishment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `punishment_id` int(11) NOT NULL,
  `punishment_date` DATE NOT NULL,
  `expired` TINYINT NOT NULL DEFAULT 0,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__punishment_redemption` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `redemption_date` DATE NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__punishment_user_reset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reset_date` DATE NOT NULL,
  `reset_type` VARCHAR(255) NOT NULL DEFAULT "",
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;