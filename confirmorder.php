<html>
    <head>
        <title>Untitled Document</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <?php
    require_once (dirname(__FILE__) . '/include/dbconfig.php');
    require_once (dirname(__FILE__) . '/include/common.php');
    ?>
    <body bgcolor="#FFFFFF" text="#000000">
        <p>&nbsp;</p>
        <hr>
        <table width="950" border="0" align="center" cellspacing="1" cellpadding="3">
            <tr> 
                <td width="85%" height="229"> 
                    <form name="form2" method="post" action="viewshoppingcart.php">
                        <table width="100%" border="5" align="center" cellspacing="0" cellpadding="3">
                            <tr bgcolor=#cccccc> 
                                <td ><center><b>Order Confirmed</b></center></td>
                            </tr>
                            <tr> 
                                <td>   
                                    <?php
                                    $query = "select productid from neworder where customerid='" . $customerid . "'";
                                    $result = mysql_query($query);
                                    if (!($row = mysql_fetch_array($result))) {
                                        die("your shopping cart is empty!");
                                    }
                                    if (!isset($total)) {
                                        die("Shopping cart amount is zero !");
                                    }
                                    if (empty($total)) {
                                        die("Shopping cart amount is zero !");
                                    }
                                    $query = "select MAX(orderid) as orderid from orders";
                                    $result = mysql_query($query);
                                    if ($row = mysql_fetch_array($result)) {
                                        $neworderid = ++$row["orderid"];
                                    }
                                    $dt = getdate();
                                    $dateformat = $dt["year"] . "-" . $dt["mon"] . "-" . $dt["mday"];
                                    $query = "INSERT into orders VALUES('" . $neworderid . "','" . $customerid . "','" . $dateformat . "','" . $total . "','Pending')";
                                    $result = mysql_query($query);
                                    if (!($result)) {
                                        die("Order entry failed!");
                                    }
                                    $query = "select productid from neworder where customerid='" . $customerid . "'";
                                    $result = mysql_query($query);
                                    while ($row = mysql_fetch_array($result)) {
                                        $query2 = "INSERT into products_ordered VALUES('','" . $row["productid"] . "','" . $neworderid . "')";
                                        $result2 = mysql_query($query2);
                                        if (!($result2)) {
                                            die("Products entry for this order failed!");
                                        }
                                    }
                                    $query = "delete from neworder where customerid='" . $customerid . "'";
                                    $result = mysql_query($query);
                                    if (!($result)) {
                                        die("Shopping cart could not be trashed!");
                                    } else {
                                        echo "<br><b>Congratulations ! Your order has been successfully sent for processing.</b><br>";
                                        echo "An email will be sent to you with payment options after your order has been reviewed by the administrator.";
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                        <?php
                        echo "To return to the website <a href=\"mainpage.php?customerid=" . $customerid . "\">click here!</a>";
                        ?>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        </body>
                        </html>
