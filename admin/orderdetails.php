<html>
    <head>
        <title>Order details</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <?php
    require_once (dirname(__FILE__) . '/include/dbconfig.php');
    require_once (dirname(__FILE__) . '/include/common.php');
    ?>
    <body bgcolor="#FFFFFF" text="#000000">
        <p>&nbsp;</p>
        <hr>
        <table width="950" border="10" align="center" cellspacing="1" cellpadding="3">

            <?php
            $query = "select * from orders where orderid='" . $orderid . "'";
            $result = mysql_query($query);
            if ($row = mysql_fetch_array($result)) {
                echo "<tr bgcolor=\"#dddddd\">";
                echo "<td><b>ORDER ID  :</b> " . $orderid . " </td>";
                echo "<td width=500><center><h1> INVOICE</h1></center> </td>";
                echo "<td><b>Date :</b>" . $row["orderdate"] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>


        <table width="950" border="0" align="center" cellspacing="1" cellpadding="3">
            <tr> 
                <td width="85%" height="229"> 
                    <table width="100%" border="5" align="center" cellspacing="0" cellpadding="3">
                        <tr bgcolor=#cccccc> 
                            <td ><center><b>Serial No.</b></center></td>
                <td ><center><b>Product ID</b></center></td>
        <td ><center><b>Title</b></center>  </td>
    <td ><center><b>Author</b></center> </td>
<td width="200"> 
<center><b>Description</b></center>
</td>
<td> 
<center><b>Price</b></center>
</td>
</tr>
<tr> 
    <td colspan="6">&nbsp;</td>
</tr>
<?php
//--display detailed product listing for all products in the shopping cart.
$serialcount = 0;
$carttotal = 0;
$query = "select productid from products_ordered where orderid='" . $orderid . "'";
$result = mysql_query($query);
while ($row = mysql_fetch_array($result)) {

    $proquery = "select productid,name,author,price,description from products where productid='" . $row["productid"] . "'";
    $proresult = mysql_query($proquery);
    if ($pro = mysql_fetch_array($proresult)) {

        echo " <tr> ";
        echo "    <td > ";
        echo "     <center>" . ++$serialcount . "</center>";
        echo "    </td>";
        echo "    <td><center>" . $pro["productid"] . "</center></td>";
        echo "    <td><center>" . $pro["name"] . "</center></td>";
        echo "    <td><center>" . $pro["author"] . "</center></td>";
        echo "    <td> ";
        echo "      <center>" . $pro["description"] . "</center>";
        echo "    </td>";
        echo "    <td> ";
        echo "       <div align=\"right\"> $" . $pro["price"] . "</div>";
        echo "    </td>";
        echo " </tr>";
        $carttotal+=$pro["price"];
    }
}
echo "     <tr> ";
echo "      <td colspan=\"4\">&nbsp;</td>";
echo "      <td align=\"right\" ><b>Total</b></td>";
echo "      <td > ";
echo "          <div align=\"right\"><b>$" . $carttotal . "</b></div>";
echo "      </td>";
echo "  </tr>";
?>

<tr> 
    <td colspan="7" >
<center>
    <?php
    echo "   <A href=\"updateorderstatus.php?orderid=" . $orderid . "&status=dispatched\">";
    ?>
    <b>Dispatched</b></a>
</center>
</td>
</tr>
</table>
</form>

</td>
</tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
To return to Admin page <A href="index.htm"> click here</a>
</body>
</html>
