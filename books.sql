--
-- 数据库: `books`
--

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryid` bigint(20) NOT NULL AUTO_INCREMENT,
  `parentcategoryid` int(10) NOT NULL DEFAULT '0',
  `name` varchar(20) NOT NULL DEFAULT '',
  `description` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`categoryid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`categoryid`, `parentcategoryid`, `name`, `description`) VALUES
(1, 0, 'Home', 'Home Page'),
(2, 1, 'Fiction', 'General Fiction Books'),
(3, 1, 'Computers', 'Computer Books'),
(4, 2, 'Science', 'Science Books');

-- --------------------------------------------------------

--
-- 表的结构 `customerinfo`
--

CREATE TABLE IF NOT EXISTS `customerinfo` (
  `customerid` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(200) NOT NULL DEFAULT '',
  `dob` date NOT NULL DEFAULT '0000-00-00',
  `gender` char(1) NOT NULL DEFAULT '',
  `pop` char(1) NOT NULL DEFAULT '',
  `rock` char(1) NOT NULL DEFAULT '',
  `jazz` char(1) NOT NULL DEFAULT '',
  `metal` char(1) NOT NULL DEFAULT '',
  `instrumental` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`customerid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `customerinfo`
--

INSERT INTO `customerinfo` (`customerid`, `name`, `address`, `dob`, `gender`, `pop`, `rock`, `jazz`, `metal`, `instrumental`) VALUES
('1', 'admin', ' admin address ', '2008-01-01', 'M', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `customerid` bigint(20) NOT NULL DEFAULT '0',
  `email` varchar(40) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `pwd` char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`customerid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `login`
--

INSERT INTO `login` (`customerid`, `email`, `password`, `pwd`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `neworder`
--

CREATE TABLE IF NOT EXISTS `neworder` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(20) NOT NULL DEFAULT '',
  `productid` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `neworder`
--

INSERT INTO `neworder` (`id`, `customerid`, `productid`) VALUES
(3, '1', '1');

-- --------------------------------------------------------

--
-- 表的结构 `newsmail`
--

CREATE TABLE IF NOT EXISTS `newsmail` (
  `name` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(40) NOT NULL DEFAULT '',
  `customerid` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`customerid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `newsmail`
--

INSERT INTO `newsmail` (`name`, `email`, `customerid`) VALUES
('admin', 'admin@admin.com', '1');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` bigint(20) NOT NULL DEFAULT '0',
  `customerid` varchar(20) DEFAULT NULL,
  `orderdate` varchar(20) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `orderdate`, `price`, `status`) VALUES
(1, '1', '2018-3-28', '5.56', 'dispatched');

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `productid` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `author` varchar(40) NOT NULL DEFAULT '',
  `description` varchar(200) NOT NULL DEFAULT '',
  `price` varchar(20) NOT NULL DEFAULT '',
  `category` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`productid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `products`
--

INSERT INTO `products` (`productid`, `name`, `author`, `description`, `price`, `category`) VALUES
(1, 'Gama Protocol', 'Gama', 'Gama', '5.56', '4');

-- --------------------------------------------------------

--
-- 表的结构 `products_ordered`
--

CREATE TABLE IF NOT EXISTS `products_ordered` (
  `id` varchar(20) NOT NULL DEFAULT '',
  `productid` varchar(20) NOT NULL DEFAULT '',
  `orderid` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `products_ordered`
--

INSERT INTO `products_ordered` (`id`, `productid`, `orderid`) VALUES
('', '1', '1');

-- --------------------------------------------------------

--
-- 表的结构 `sys_session`
--

CREATE TABLE IF NOT EXISTS `sys_session` (
  `session_id` varchar(255) NOT NULL,
  `session_expires` datetime NOT NULL,
  `session_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
