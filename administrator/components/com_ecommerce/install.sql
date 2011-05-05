DROP TABLE IF EXISTS `#__pr_session`;
DROP TABLE IF EXISTS `#__pr_category`;
DROP TABLE IF EXISTS `#__pr_company`;
DROP TABLE IF EXISTS `#__pr_product`;
DROP TABLE IF EXISTS `#__pr_image`;
DROP TABLE IF EXISTS `#__pr_topic`;
DROP TABLE IF EXISTS `#__pr_buyer`;
DROP TABLE IF EXISTS `#__pr_cart`;

CREATE TABLE `#__pr_session` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `name_en` varchar(255) default NULL,
  `description` text,
  `description_en` text,
  `published` tinyint(1) NOT NULL default '1',
  `ordering` int(11) NOT NULL default '0',
  `currency` int(11) NOT NULL default '1',
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------
CREATE TABLE `#__pr_category` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `name_en` varchar(255) default NULL,
  `description` text,
  `description_en` text,
  `published` tinyint(1) NOT NULL default '1',
  `ordering` int(11) NOT NULL default '0',
  `session_id` int(11) NOT NULL default '0',
  `parent_id` int(11) NOT NULL default '0',
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------
CREATE TABLE `#__pr_company` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` text,
  `name_en` varchar(255) default NULL,
  `description_en` text,
  `published` tinyint(1) NOT NULL default '1',
  `ordering` int(11) NOT NULL default '0',
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------
CREATE TABLE `#__pr_product` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `code` varchar(50) default NULL,
  `description` text,
  `name_en` varchar(255) default NULL,
  `description_en` text,
  `session_id` int(11) NOT NULL default '0',
  `category_id` int(11) NOT NULL default '0',
  `childcat_id` int(11) NOT NULL default '0',
  `company_id` int(11) NOT NULL default '0',
  `warranty` varchar(100) default NULL,
  `price` int(11) NOT NULL default '0',
  `tax` int(11) NOT NULL default '0',
  `promotion_price` int(11) NOT NULL default '0',
  `quantity` int(11) NOT NULL default '100',
  `shopped` int(11) NOT NULL default '0',
  `image` varchar(100) default NULL,
  `published` tinyint(1) NOT NULL default '1',
  `ordering` int(11) NOT NULL default '0',
  

   PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------
CREATE TABLE `#__pr_image` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `ordering` tinyint(4) NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '1',
  `product_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
-- --------------------------------------------------------
CREATE TABLE `#__pr_topic` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `content` text,
  `ordering` tinyint(4) NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '1',
  `product_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
-- --------------------------------------------------------
CREATE TABLE `#__pr_buyer` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) default NULL,
  `phone` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `ordering` tinyint(4) NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
-- --------------------------------------------------------
CREATE TABLE `#__pr_cart` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date_buy` DATETIME NOT NULL,
  `point` int(11) default NULL,
  `buyer_id` int(11) NOT NULL,
  `published` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
-- --------------------------------------------------------