-- EASYPANEL REQUIRED TABLES

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+02:00";

DROP TABLE IF EXISTS `ep_admin_users`;
CREATE TABLE IF NOT EXISTS `ep_admin_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2;                 

-- admin:admin
INSERT INTO `ep_admin_users` (`id_user`, `user`, `pass`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

DROP TABLE IF EXISTS `ep_admin_settings`;
CREATE TABLE IF NOT EXISTS `ep_admin_settings` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_setting`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4; 

INSERT INTO `ep_admin_settings` (`id_setting`, `name`, `value`) VALUES
(1, 'website_title', ''),
(2, 'website_logo', ''),
(3, 'website_copyright', '');

CREATE TABLE IF NOT EXISTS  `ci_sessions` (
	session_id varchar(40) DEFAULT '0' NOT NULL,
	ip_address varchar(45) DEFAULT '0' NOT NULL,
	user_agent varchar(120) NOT NULL,
	last_activity int(10) unsigned DEFAULT 0 NOT NULL,
	user_data text NOT NULL,
	PRIMARY KEY (session_id),
	KEY `last_activity_idx` (`last_activity`)
);

DROP TABLE IF EXISTS `ep_modules`;
CREATE TABLE IF NOT EXISTS `ep_modules` (
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_module`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2; 

INSERT INTO `ep_modules` (`id_module`, `name`, `nickname`) VALUES
(1, 'Homepage', 'homepage');

DROP TABLE IF EXISTS `ep_pages`;
CREATE TABLE IF NOT EXISTS `ep_pages` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `module` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `page_type` int(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT 1,
  `content` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3;
