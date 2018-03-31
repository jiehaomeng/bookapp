<html>
    <head>
        <title>Pending order browser</title>
    </head>
    <?php
    require_once (dirname(__FILE__) . '/include/dbconfig.php');
    require_once (dirname(__FILE__) . '/include/common.php');
    ?>
    <body bgcolor="#FFFFFF" text="#000000">

        <?php
        $sqlquery = "SELECT * from orders";

        $queryresult = mysql_query($sqlquery);

        echo "<table width=700 border=1 align=center>";
        echo " <tr>";
        echo "  <td width=200> <center><b>Orderid  </b></center></td>\n";
        echo "  <td width=200> <center><b>Customerid</b></center></td>\n";
        echo "  <td width=200> <center><b>Date</b></center></td>\n";
        echo "  <td width=100> <center><b>Amount</b></center></td>\n";
        echo "  <td width=100> <center><b>Status</b></center></td>\n";

        echo "  </tr>\n";
        while ($row = mysql_fetch_array($queryresult)) {
            if ($row["status"] == "Pending") {
                echo "  <tr>\n";
                echo "    <td><center>" . $row["orderid"] . "</center></td>\n";
                echo "    <td><center>" . $row["customerid"] . "</center></td>\n";
                echo "    <td><center>" . $row["orderdate"] . "</center></td>\n";
                echo "    <td><center>" . $row["price"] . "</center></td>\n";
                echo "    <td><center><A href=\"orderdetails.php?orderid=" . $row["orderid"] . "\">details</a></center></td>\n";
                echo "  </tr>\n";
            }
        }
        echo "</table>\n";
        ?>
    </body>
</html>
