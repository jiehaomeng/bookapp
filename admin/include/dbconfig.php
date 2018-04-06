<?php

$hostname = "10.129.5.247";
$database = "mysqldatabase";
$dbusername = "mysqluser";
$dbpassword = "mysqlpassword";

$sqlconnect = mysqli_connect($hostname, $dbusername, $dbpassword)
        or die("Could not connect to MySQL server in localhost !");

$selectdb = mysqli_select_db($sqlconnect,$database)
        or die("Could not select $database data database !");
