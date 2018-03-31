<?php

require_once (dirname(__FILE__) . '/include/dbconfig.php');
require_once (dirname(__FILE__) . '/include/common.php');
if (empty($address)) {
    die("address left blank");
}
$query = "UPDATE customerinfo SET address='" . $address . "'";
$result = mysql_query($query);
if (!$result) {
    die("Update Failed!");
} else {
    echo " <center>Address Updated Successfully </center><br>";
    echo "  <hr><br><br>";
    echo "  Address : ", $address, "<br>";
}
echo "<br><br>";
echo "<br><br><A href=\"mainpage.php?customerid=" . $customerid . "\">Back to website</a>";
?>

