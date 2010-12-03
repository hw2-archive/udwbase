DROP TABLE IF EXISTS `udwbase_news`;
CREATE TABLE `udwbase_news` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `text_loc0` varchar(255) NOT NULL default '',
  `text_loc8` varchar(255) NOT NULL default '',
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='News';

SET NAMES 'utf8';
SET SQL_MODE = '';
INSERT INTO `udwbase_news` (`id`,`text_loc0`,`text_loc8`,`time`) VALUES (1,'Welcome to <b><span class=\"q5\">UDWBase</span></b>!','Добро пожаловать на <b><span class=\"q5\">UDWBase</span></b>!','2008-09-05 07:00:00');