-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 12 月 25 日 07:32
-- 服务器版本: 5.5.16
-- PHP 版本: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `lxj`
--

-- --------------------------------------------------------

--
-- 表的结构 `lxj_admin`
--

CREATE TABLE IF NOT EXISTS `lxj_admin` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `name` varchar(32) NOT NULL,
  `passwd` varchar(32) NOT NULL COMMENT '//密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lxj_admin`
--

INSERT INTO `lxj_admin` (`id`, `name`, `passwd`) VALUES
(1, 'lxj', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- 表的结构 `lxj_blogs`
--

CREATE TABLE IF NOT EXISTS `lxj_blogs` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `cate` int(8) NOT NULL COMMENT '//分类id',
  `tag` varchar(32) NOT NULL,
  `keyword` varchar(32) NOT NULL,
  `attr` varchar(32) NOT NULL,
  `pic` varchar(64) NOT NULL COMMENT '//图片地址',
  `source` varchar(32) NOT NULL,
  `info` text NOT NULL,
  `content` text NOT NULL,
  `comment` int(1) NOT NULL COMMENT '//是否开启评论',
  `author` varchar(32) NOT NULL,
  `count` int(8) NOT NULL COMMENT '//浏览次数',
  `time` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `lxj_blogs`
--

INSERT INTO `lxj_blogs` (`id`, `title`, `cate`, `tag`, `keyword`, `attr`, `pic`, `source`, `info`, `content`, `comment`, `author`, `count`, `time`) VALUES
(2, '逆光测试', 1, '逆光', '滴水穿石', 'front', '2015-11-04/5639c1d0b512e.jpg', '但是V都是V', '但vc都是V', '&lt;p&gt;V但是V都是V但是V但是V但是V但是V都是V的事但是V的V&lt;/p&gt;\r\n', 0, 'V都是V', 100, '1446626740');

-- --------------------------------------------------------

--
-- 表的结构 `lxj_category`
--

CREATE TABLE IF NOT EXISTS `lxj_category` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `name` varchar(32) NOT NULL COMMENT '//分类名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//分类' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `lxj_category`
--

INSERT INTO `lxj_category` (`id`, `name`) VALUES
(1, 'HTML5'),
(2, 'javascript'),
(4, 'jquery'),
(5, 'mysql'),
(6, 'php'),
(7, 'linux');

-- --------------------------------------------------------

--
-- 表的结构 `lxj_data`
--

CREATE TABLE IF NOT EXISTS `lxj_data` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `talk` int(8) unsigned NOT NULL DEFAULT '0',
  `blog` int(8) unsigned NOT NULL DEFAULT '0',
  `word` int(8) unsigned NOT NULL DEFAULT '0',
  `comment` int(8) unsigned NOT NULL DEFAULT '0',
  `pic` int(8) unsigned NOT NULL DEFAULT '0',
  `day` int(8) unsigned NOT NULL DEFAULT '0',
  `today` int(8) unsigned NOT NULL DEFAULT '0',
  `total` int(8) unsigned NOT NULL DEFAULT '0',
  `time` varchar(32) NOT NULL COMMENT '//日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lxj_data`
--

INSERT INTO `lxj_data` (`id`, `talk`, `blog`, `word`, `comment`, `pic`, `day`, `today`, `total`, `time`) VALUES
(1, 0, 0, 0, 0, 0, 0, 1, 884, '2015-12-14');

-- --------------------------------------------------------

--
-- 表的结构 `lxj_links`
--

CREATE TABLE IF NOT EXISTS `lxj_links` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL COMMENT '//链接名',
  `url` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `status` int(1) NOT NULL COMMENT '//状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `lxj_links`
--

INSERT INTO `lxj_links` (`id`, `name`, `url`, `email`, `status`) VALUES
(1, '百度', 'www.baidu.com', '', 1),
(2, '谷歌', 'www.google.com.hk', '', 1),
(3, '好123', 'www.hao123.com', '', 1),
(4, '雅虎中国', 'www.yahoo.com', '', 1),
(5, '51cto', 'www.51cto.com', '', 1),
(6, '后盾网', 'www.houdunwang.com', '', 1),
(11, 'php100', 'ww.php100.com', '', 1),
(10, '逆光博客', 'www.iwish.wang', '123@qq.com', 1);

-- --------------------------------------------------------

--
-- 表的结构 `lxj_pic_box`
--

CREATE TABLE IF NOT EXISTS `lxj_pic_box` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL COMMENT '//相册名',
  `url` varchar(64) NOT NULL,
  `desc` varchar(32) NOT NULL,
  `time` varchar(32) NOT NULL,
  `encrypt` int(1) NOT NULL COMMENT '//是否加密',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `lxj_pic_box`
--

INSERT INTO `lxj_pic_box` (`id`, `name`, `url`, `desc`, `time`, `encrypt`) VALUES
(8, '12', '2015-11-04/563988e899fc9.jpg', '测试', '', 0),
(5, 'luoxianjie', '2015-11-04/5639672f9f09b.jpg', '测试', '', 0),
(7, '逆光博客', '2015-11-04/5639674b0bd20.jpg', '12123', '', 0),
(9, 'admin', '2015-11-04/5639d3ba20abe.jpg', 'admin', '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `lxj_resource`
--

CREATE TABLE IF NOT EXISTS `lxj_resource` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//资源',
  `name` varchar(32) NOT NULL COMMENT '//资源名',
  `type` int(1) NOT NULL DEFAULT '1',
  `url` varchar(64) NOT NULL,
  `downloads` int(8) NOT NULL DEFAULT '100',
  `desc` varchar(32) NOT NULL,
  `time` varchar(32) NOT NULL,
  `is_pic` int(11) NOT NULL DEFAULT '0' COMMENT '//是否为图片',
  `pic_box` int(1) NOT NULL COMMENT '//相册名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `lxj_resource`
--

INSERT INTO `lxj_resource` (`id`, `name`, `type`, `url`, `downloads`, `desc`, `time`, `is_pic`, `pic_box`) VALUES
(1, '李艳辉视频教程', 0, 'http:www.baidu.com', 122, '李艳辉视频教程', '1446606173', 0, 0),
(2, 'php视频教程', 0, 'http:www.baidu.com', 2332, 'php视频教程', '1446610297', 0, 0),
(4, 'photoshop cs4', 1, 'http://www.baibu.com', 1212, 'photoshop cs4', '1446630396', 0, 0),
(5, 'zend studio', 1, 'http://www.baidu.com', 1212, '汉化版', '1446630445', 0, 0),
(6, 'sublime', 1, 'http://www.baidu.com', 222, '汉化免注册', '1446630495', 0, 0),
(7, 'wampserver', 1, 'http://www.baidu.com', 12365, 'php集成开发环境', '1446630560', 0, 0),
(8, '小清新头像打包下载', 3, 'http://www.baidu.com', 141, '小清新头像打包下载', '1446630607', 0, 0),
(9, 'jquery.min.js', 2, 'http://www.baidu.com', 456623, 'jquery', '1446630781', 0, 0),
(10, 'ckeditor', 2, 'http://www.baidu.com', 123465, '在线编辑器', '1446630697', 0, 0),
(11, '后盾网php基础视频教程', 0, 'http://www.baidu.com', 45445, '有实力做后盾', '1446630755', 0, 0),
(12, 'ceshi', 0, 'ceshi', 213, 'ceshi', '1446631293', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `lxj_talks`
--

CREATE TABLE IF NOT EXISTS `lxj_talks` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `time` varchar(32) NOT NULL,
  `zans` varchar(32) NOT NULL,
  `views` int(8) NOT NULL,
  `pics` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `lxj_talks`
--

INSERT INTO `lxj_talks` (`id`, `content`, `time`, `zans`, `views`, `pics`) VALUES
(1, '逆光博客欢迎您', '1446613016', '', 22, '2015-11-04/56398bcddd47d.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `lxj_user`
--

CREATE TABLE IF NOT EXISTS `lxj_user` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//编号',
  `nackname` varchar(20) NOT NULL COMMENT '//昵称',
  `passwd` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL COMMENT '//邮箱',
  `header` varchar(32) NOT NULL COMMENT '//头像',
  `equip` varchar(32) NOT NULL COMMENT '//设备',
  `address` varchar(32) NOT NULL COMMENT '//地址',
  `status` int(1) NOT NULL COMMENT '//状态',
  `login_time` varchar(32) NOT NULL,
  `last_time` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `lxj_user`
--

INSERT INTO `lxj_user` (`id`, `nackname`, `passwd`, `email`, `header`, `equip`, `address`, `status`, `login_time`, `last_time`) VALUES
(1, 'luoxianjie', 'e10adc3949ba59abbe56e057f20f883e', 'jiexianluo@hotmail.com', '1.jpg', 'Win7', '武汉', 1, '1446615152', '1446615158'),
(2, 'lxj', 'e10adc3949ba59abbe56e057f20f883e', 'lxj@qq.com', '1.jpg', 'Win7', '武汉', 1, '1450081483', '1450081595'),
(8, 'admin', '123456', 'admin@qq.com', '', '', '', 1, '', '');

-- --------------------------------------------------------

--
-- 表的结构 `lxj_words`
--

CREATE TABLE IF NOT EXISTS `lxj_words` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `uid` int(8) NOT NULL,
  `bid` int(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `time` varchar(32) NOT NULL,
  `callback` text NOT NULL,
  `is_callback` int(1) NOT NULL DEFAULT '0',
  `is_comment` int(1) NOT NULL DEFAULT '1' COMMENT '//是否为评论',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `lxj_words`
--

INSERT INTO `lxj_words` (`id`, `content`, `uid`, `bid`, `name`, `time`, `callback`, `is_callback`, `is_comment`) VALUES
(1, 'luoxianjie', 1, 0, '', '1446465818', '', 0, 0),
(2, 'lxj', 0, 0, 'lxj', '1446466355', '1', 1, 0),
(4, '测试', 1, 0, '', '1446530070', '', 0, 0),
(5, '测试测试', 2, 0, 'luoxianjie', '1446630178', '呵呵呵呵', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
