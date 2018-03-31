<?php
require_once (dirname(__FILE__) . '/include/dbconfig.php');
require_once (dirname(__FILE__) . '/include/common.php');

if ($type == "category") {
    echo"<table align=\"center\" border=1>";
    echo"<tr><td>Parent Category </td><td>" . $parentcategory . "</td></tr>";
    echo"<tr><td>Name </td><td>" . $catname . "</td></tr>";
    echo"<tr><td>Description </td><td>" . $catdescription . "</td></tr>";
    echo"</table><br><br>";
    $query = "select categoryid from category where categoryid='" . $parentcategory . "'";
    $result = mysql_query($query);
    if ($row = mysql_fetch_array($result)) {
        $query2 = "INSERT into category VALUES(null,'" . $parentcategory . "','" . $catname . "','" . $catdescription . "')";
        $result2 = mysql_query($query2);
//    echo "Category added as <b>".$query."</b>\n";
    } else {
        echo "Parentcategory Does Not EXIST !!!";
    }
} elseif ($type == "product") {
    echo"<table align=\"center\" border=1>";
    echo"<tr><td>Product Category </td><td>" . $parentcategory . "</td></tr>";
    echo"<tr><td>Name </td><td>" . $proname . "</td></tr>";
    echo"<tr><td>Author </td><td>" . $proauthor . "</td></tr>";
    echo"<tr><td>Description </td><td>" . $prodescription . "</td></tr>";
    echo"<tr><td>Price </td><td>" . $proprice . "</td></tr>";
    echo"</table><br><br>";
    $query = "INSERT into `products`(`productid`, `name`, `author`, `description`, `price`, `category`) VALUES(null,'" . $proname . "','" . $proauthor . "','" . $prodescription . "','" . $proprice . "','" . $parentcategory . "')";
    $result = mysql_query($query);
//echo "Product added as<b> ".$query."</b>\n";
} else {
    echo "type should be product/catgory. But it was " . $type . " !!!";
}
?>
<br>
To return to the Admin page <A href="index.htm">click here</a>