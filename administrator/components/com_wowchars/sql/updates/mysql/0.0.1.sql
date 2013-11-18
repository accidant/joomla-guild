DROP TABLE IF EXISTS #__wowchars;

CREATE TABLE #__wowchars (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  realm varchar(255) NOT NULL,
  charname varchar(255) NOT NULL,
  PRIMARY KEY ('id')
) ENGINE MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;