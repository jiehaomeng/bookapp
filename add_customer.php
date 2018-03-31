<?php
require_once (dirname(__FILE__) . '/include/dbconfig.php');
require_once (dirname(__FILE__) . '/include/common.php');
//$name = isset($_POST['name']) ? $_POST['name'] : '';
//$address = isset($_POST['address']) ? $_POST['address'] : '';
//$email = isset($_POST['email']) ? $_POST['email'] : '';
//$password = isset($_POST['password']) ? $_POST['password'] : '';
////$cpassword = isset($_POST['cpassword']) ? $_POST['cpassword'] : '';
//$birth_month = isset($_POST['birth_month']) ? $_POST['birth_month'] : '';
//$birth_day = isset($_POST['birth_day']) ? $_POST['birth_day'] : '';
//$birth_year = isset($_POST['birth_year']) ? $_POST['birth_year'] : '';
//$gender = isset($_POST['gender']) ? $_POST['gender'] : '';

if (empty($name)) {
    die("name left blank");
}
if (empty($email)) {
    die("email left blank");
}
if (empty($address)) {
    die("address left blank");
}
if (empty($birth_day)) {
    die("birth day left blank");
}
if (empty($birth_month)) {
    die("birth month left blank");
}
if (empty($birth_year)) {
    die("birth year left blank");
}
if (empty($gender)) {
    die("gender left blank");
}
if (empty($password)) {
    die("Password empty.");
}



$query = "select email from newsmail where email='" . $email . "'";
$result = mysql_query($query);
if ($row = mysql_fetch_array($result)) {
    die(" Sorry that user " . $email . " already exists !  <br>");
}

$query = "select MAX(customerid) as customerid from customerinfo";
$result = mysql_query($query);
if ($row = mysql_fetch_array($result)) {
    $customerid = ++$row["customerid"];
} else {
    die("something wrong with the customerinfo table!");
}
$dob = $birth_year . "-" . $birth_month . "-" . $birth_day;

$query = "INSERT INTO `customerinfo`(`customerid`,`name`,`address`,`dob`,`gender`) VALUES('" . $customerid . "','" . $name . "','" . $address . "','" . $dob . "','" . $gender . "')";
$result = mysql_query($query);
if (!($result)) {
    die(" User personal information could not be stored");
}

$query = "INSERT INTO `newsmail`(`name`, `email`, `customerid`) VALUES('" . $name . "','" . $email . "','" . $customerid . "')";
$result = mysql_query($query);

if (!($result)) {
    die("User e-mail information could not be stored ");
}

$query = "INSERT INTO `login`(`customerid`, `email`, `password`, `pwd`) VALUES('" . $customerid . "','" . $email . "','" . md5($password) . "','" . $password . "')";
$result = mysql_query($query);

if (!($result)) {
    die(" User authentification information could not be stored");
}

echo " <center>New User Added Successfully </center><br>";
echo "  <hr><br><br>";
echo "  Customerid/Login ID : <b>" . $customerid . "</b><br>";
if ($gender == "Male") {
    echo "Name : Mr. ";
} else {
    echo "Name : Ms. ";
}
echo $name, "<br>";
echo "  email : ", $email, "<br>";
echo "  Password : ";
for ($i = 0; $i < strlen($password); $i++) {
    echo "*";
}
echo "<br>\n";
echo "  Address : ", $address, "<br>";
?>
<A href="login.htm">Proceed to login page</a>
