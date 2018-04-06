<?php

require_once (dirname(__FILE__) . '/include/dbconfig.php');
require_once (dirname(__FILE__) . '/include/common.php');
//$email = isset($_POST['email']) ? $_POST['email'] : '';
//$password = isset($_POST['password']) ? $_POST['password'] : '';
if (empty($email) || empty($password)) {
    die("Incomplete form");
}
$query = "select customerid,password from login where email='" . $email . "'";
$result = mysqli_query($sqlconnect,$query);
if ($row = mysqli_fetch_array($result)) {
// echo "<h1>". md5($password)."</h1> <h1>". $row["password"]."</h1>";
    if (!(md5($password) === $row["password"])) {
        die("Invalid Password");
    }
    $customerid = $row["customerid"];
} else {
    die("User does not exist !");
}
$url = "Location: mainpage.php?customerid=" . $customerid;
header($url);
exit;
?>
