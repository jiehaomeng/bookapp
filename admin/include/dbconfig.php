<?php

$hostname = "localhost";
$database = "books";
$dbusername = "root";
$dbpassword = "123456";

$sqlconnect = mysql_connect($hostname, $dbusername, $dbpassword)
        or die("Could not connect to MySQL server in localhost !");

$selectdb = mysql_select_db($database)
        or die("Could not select $database data database !");
