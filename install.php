<?php

header("content-type:text/html;charset=utf-8;");
include "include/mysql.php";
//$aa = new mysql();
$bb = new mysql();
//$aa->link("mysql");
//$query = "CREATE DATABASE IF NOT EXISTS `mysqldatabase`;";
//if ($aa->excu($query)) {
//    echo "===database create success!===";
//}
//$aa->close();
$bb->link("mysqldatabase");
$queryArr['category'] = "DROP TABLE IF EXISTS `category`;";
$queryArr['customerinfo'] = "DROP TABLE IF EXISTS `customerinfo`;";
$queryArr['login'] = "DROP TABLE IF EXISTS `login`;";
$queryArr['neworder'] = "DROP TABLE IF EXISTS `neworder`;";
$queryArr['newsmail'] = "DROP TABLE IF EXISTS `newsmail`;";
$queryArr['orders'] = "DROP TABLE IF EXISTS `orders`;";
$queryArr['products'] = "DROP TABLE IF EXISTS `products`;";
$queryArr['products_ordered'] = "DROP TABLE IF EXISTS `products_ordered`;";
$queryArr['sys_session'] = "DROP TABLE IF EXISTS `sys_session`;";
//$queryArr['user_info'] = "DROP TABLE IF EXISTS `user_info`;";
if (!empty($queryArr)) {
    foreach ($queryArr as $tb => $sql) {
        if ($bb->excu($sql)) {
            echo "<br>==={$tb} table delete success!===\n";
        }
    }
}
$queryCreate['category'] = "CREATE TABLE IF NOT EXISTS `category` (
  `categoryid` bigint(20) NOT NULL AUTO_INCREMENT,
  `parentcategoryid` int(10) NOT NULL DEFAULT '0',
  `name` varchar(20) NOT NULL DEFAULT '',
  `description` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`categoryid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ; ";
$queryCreate['customerinfo'] = "CREATE TABLE IF NOT EXISTS `customerinfo` (
  `customerid` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(200) NOT NULL DEFAULT '',
  `dob` date NOT NULL DEFAULT '0001-01-01',
  `gender` char(1) NOT NULL DEFAULT '',
  `pop` char(1) NOT NULL DEFAULT '',
  `rock` char(1) NOT NULL DEFAULT '',
  `jazz` char(1) NOT NULL DEFAULT '',
  `metal` char(1) NOT NULL DEFAULT '',
  `instrumental` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`customerid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8; ";
$queryCreate['login'] = "CREATE TABLE IF NOT EXISTS `login` (
  `customerid` bigint(20) NOT NULL DEFAULT '0',
  `email` varchar(40) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `pwd` char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`customerid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8; ";
$queryCreate['neworder'] = "CREATE TABLE IF NOT EXISTS `neworder` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(20) NOT NULL DEFAULT '',
  `productid` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ; ";
$queryCreate['newsmail'] = "CREATE TABLE IF NOT EXISTS `newsmail` (
  `name` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(40) NOT NULL DEFAULT '',
  `customerid` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`customerid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8; ";
$queryCreate['orders'] = "CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` bigint(20) NOT NULL DEFAULT '0',
  `customerid` varchar(20) DEFAULT NULL,
  `orderdate` varchar(20) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8; ";
$queryCreate['products'] = "CREATE TABLE IF NOT EXISTS `products` (
  `productid` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `author` varchar(40) NOT NULL DEFAULT '',
  `description` varchar(200) NOT NULL DEFAULT '',
  `price` varchar(20) NOT NULL DEFAULT '',
  `category` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`productid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ; ";
$queryCreate['products_ordered'] = "CREATE TABLE IF NOT EXISTS `products_ordered` (
  `id` varchar(20) NOT NULL DEFAULT '',
  `productid` varchar(20) NOT NULL DEFAULT '',
  `orderid` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8; ";
$queryCreate['sys_session'] = "CREATE TABLE IF NOT EXISTS `sys_session` (
  `session_id` varchar(255) NOT NULL,
  `session_expires` datetime NOT NULL,
  `session_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8; ";

if (!empty($queryCreate)) {
    foreach ($queryCreate as $tb => $sql) {
        if ($bb->excu($sql)) {
            echo "<br>===table-{$tb}-create success!===\n";
        }
    }
}

echo "<br>===init data===";

$queryData[''] = "INSERT INTO `category` (`categoryid`, `parentcategoryid`, `name`, `description`) VALUES
(1, 0, 'Home', 'Home Page'),
(2, 1, 'Fiction', 'General Fiction Books'),
(3, 1, 'Computers', 'Computer Books'),
(4, 2, 'Science', 'Science Books'); ";
$queryData['customerinfo'] = "INSERT INTO `customerinfo` (`customerid`, `name`, `address`, `dob`, `gender`, `pop`, `rock`, `jazz`, `metal`, `instrumental`) VALUES
('1', 'admin', ' admin address ', '2008-01-01', 'M', '', '', '', '', ''); ";
$queryData['login'] = "INSERT INTO `login` (`customerid`, `email`, `password`, `pwd`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'); ";
$queryData['neworder'] = "INSERT INTO `neworder` (`id`, `customerid`, `productid`) VALUES
(3, '1', '1'); ";
$queryData['newsmail'] = "INSERT INTO `newsmail` (`name`, `email`, `customerid`) VALUES
('admin', 'admin@admin.com', '1'); ";
$queryData['orders'] = "INSERT INTO `orders` (`orderid`, `customerid`, `orderdate`, `price`, `status`) VALUES
(1, '1', '2018-3-28', '5.56', 'dispatched'); ";
$queryData['products'] = "INSERT INTO `products` (`productid`, `name`, `author`, `description`, `price`, `category`) VALUES
(1, 'Gama Protocol', 'Gama', 'Gama', '8', '4'); ";
$queryData['products_ordered'] = "INSERT INTO `products_ordered` (`id`, `productid`, `orderid`) VALUES
('', '1', '1'); ";
if (!empty($queryData)) {
    foreach ($queryData as $tb => $sql) {
        if ($bb->excu($sql)) {
            echo "<br>===add {$tb} data success!===\n";
        }
    }
}
$bb->close();
