<html>
    <head>
        <title>maildata record browser</title>
    </head>
    <?php
    require_once (dirname(__FILE__) . '/include/dbconfig.php');
    require_once (dirname(__FILE__) . '/include/common.php');
    ?>
    <body bgcolor="#FFFFFF" text="#000000">
        <?php
        $sqlquery = "SELECT * from products where category='" . $categoryid . "'";
        $queryresult = mysql_query($sqlquery);

        echo "<table width=700 border=1 align=center>";
        echo " <tr>";
        echo "  <td width=200> <center><b>Product ID </b></center></td>\n";
        echo "  <td width=200> <center><b>Name </b></center></td>\n";
        echo "  <td width=200> <center><b>Description</b></center></td>\n";
        echo "  <td width=100> <center><b>Price</b></center></td>\n";
        echo "  <td width=100> <center><b>Category</b></center></td>\n";
        echo "  </tr>\n";
        while ($row = mysql_fetch_array($queryresult)) {
            echo "  <tr>\n";
            echo "    <td>" . $row["productid"] . "</td>\n";
            echo "    <td>" . $row["name"] . "</td>\n";
            echo "    <td>" . $row["description"] . "</td>\n";
            echo "    <td>" . $row["price"] . "</td>\n";

            $sqlquery2 = "SELECT name from category where categoryid='" . $categoryid . "'";

            $queryresult2 = mysql_query($sqlquery);
            if ($row2 = mysql_fetch_array($queryresult2)) {
                echo "    <td>" . $row["category"] . "</td>\n";
            } else {
                echo " Category name not found !!";
            }
            echo "    <td><A href=\"deleteproduct.php?productid=" . $row["productid"] . "\">delete</a></td>\n";
            echo "  </tr>\n";
        }
        echo "</table>\n";
        ?>
    </body>
</html>
