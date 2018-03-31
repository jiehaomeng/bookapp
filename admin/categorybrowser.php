<html>
    <head>
        <title>Category browser</title>
    </head>
    <?php
    require_once (dirname(__FILE__) . '/include/dbconfig.php');
    require_once (dirname(__FILE__) . '/include/common.php');
    ?>
    <body bgcolor="#FFFFFF" text="#000000">

        <?php
        $sqlquery = "SELECT * from category";

        $queryresult = mysql_query($sqlquery);

        echo "<table width=700 border=1 align=center>";
        echo " <tr>";
        echo "  <td width=200> <center><b>Category ID </b></center></td>\n";
        echo "  <td width=200> <center><b>Name </b></center></td>\n";
        echo "  <td width=200> <center><b>Description</b></center></td>\n";
        echo "  <td width=100> <center><b>Parent Category ID</b></center></td>\n";
        echo "  <td width=100> <center><b>Products</b></center></td>\n";

        echo "  </tr>\n";
        while ($row = mysql_fetch_array($queryresult)) {
            echo "  <tr>\n";
            echo "    <td>" . $row["categoryid"] . "</td>\n";
            echo "    <td>" . $row["name"] . "</td>\n";
            echo "    <td>" . $row["description"] . "</td>\n";
            echo "    <td>" . $row["parentcategoryid"] . "</td>\n";
            $sqlquery2 = "SELECT name,categoryid from category where categoryid='" . $row["categoryid"] . "'";
            $queryresult2 = mysql_query($sqlquery2);
            if ($row2 = mysql_fetch_array($queryresult2)) {
                echo "    <td><A href=\"catprobrowser.php?categoryid=" . $row["categoryid"] . "\">Products</a></td>\n";
            }

            echo "    <td><A href=\"deletecategory.php?categoryid=" . $row["categoryid"] . "\">delete</a></td>\n";
            echo "  </tr>\n";
        }
        echo "</table>\n";
        ?>
    </body>
</html>
