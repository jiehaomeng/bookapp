<html>
    <head>
        <title>Search Page</title>
    </head>

    <body bgcolor="#FFFFFF" text="#000000">

        <?php
        require_once (dirname(__FILE__) . '/include/dbconfig.php');
        require_once (dirname(__FILE__) . '/include/common.php');
//        $search = isset($_POST['search']) ? $_POST['search'] : null;
//        $searchfor = isset($_POST['searchfor']) ? $_POST['searchfor'] : null;
        if (!isset($search)) {
            die("Search data not submitted!");
        }
        if (empty($search)) {
            die("Search data empty!");
        }
        if (!isset($searchfor)) {
            die("Search criteria not submitted!");
        }
        if (empty($searchfor)) {
            die("Search criteria empty!");
        }
        echo "<table width=700 border=1 align=center>";
        echo " <tr>";
        echo "  <td width=200> <center><b>Productid  </b></center></td>\n";
        echo "  <td width=200> <center><b>Title</b></center></td>\n";
        echo "  <td width=200> <center><b>Author</b></center></td>\n";
        echo "  <td width=200> <center><b>Description</b></center></td>\n";
        echo "  <td width=200> <center><b>Price</b></center></td>\n";
        echo "  <td width=100> <center><b>Category</b></center></td>\n";
        echo "  </tr>\n";

        $sqlquery = "SELECT * from products";
        $queryresult = mysql_query($sqlquery);

        while ($row = mysql_fetch_array($queryresult)) {
            if ($searchfor = "title") {
                if (stristr($row["name"], $search)) {
                    echo "  <tr>\n";
                    echo "    <td>" . $row["productid"] . "</td>\n";
                    echo "    <td>" . $row["name"] . "</td>\n";
                    echo "    <td>" . $row["author"] . "</td>\n";
                    echo "    <td>" . $row["description"] . "</td>\n";
                    echo "    <td>" . $row["price"] . "</td>\n";
                    $sqlquery2 = "SELECT name from category where categoryid='" . $row["category"] . "'";
                    $queryresult2 = mysql_query($sqlquery2);
                    if ($row2 = mysql_fetch_array($queryresult2)) {
                        echo "    <td><a href=\"mainpage.php?customerid=" . $customerid . "&category=" . $row["category"] . "\">" . $row2["name"] . "</td>\n";
                    } else {
                        echo " <td> Category missing !!</td>";
                    }
                    echo "  </tr>\n";
                }
            } elseif ($searchfor = "author") {
                if (stristr($row["author"], $search)) {
                    echo "  <tr>\n";
                    echo "    <td>" . $row["productid"] . "</td>\n";
                    echo "    <td>" . $row["name"] . "</td>\n";
                    echo "    <td>" . $row["author"] . "</td>\n";
                    echo "    <td>" . $row["description"] . "</td>\n";
                    echo "    <td>" . $row["price"] . "</td>\n";

                    $sqlquery2 = "SELECT name from category where categoryid='" . $row["category"] . "'";
                    $queryresult2 = mysql_query($sqlquery2);
                    if ($row2 = mysql_fetch_array($queryresult2)) {
                        echo "    <td><a href=\"mainpage.php?customerid=" . $customerid . "&category=" . $row["category"] . "\">" . $row2["name"] . "</td>\n";
                    } else {
                        echo " <td> Category missing !!</td>";
                    }
                    echo "  </tr>\n";
                }
            } else {
                if ((stristr($row["name"], $search)) ||
                        (stristr($row["description"], $search)) ||
                        (stristr($row["author"], $search))
                ) {
                    echo "  <tr>\n";
                    echo "    <td>" . $row["productid"] . "</td>\n";
                    echo "    <td>" . $row["name"] . "</td>\n";
                    echo "    <td>" . $row["author"] . "</td>\n";
                    echo "    <td>" . $row["description"] . "</td>\n";
                    echo "    <td>" . $row["price"] . "</td>\n";

                    $sqlquery2 = "SELECT name from category where categoryid='" . $row["category"] . "'";
                    $queryresult2 = mysql_query($sqlquery2);
                    if ($row2 = mysql_fetch_array($queryresult2)) {
                        echo "    <td><a href=\"mainpage.php?customerid=" . $customerid . "&category=" . $row["category"] . "\">" . $row2["name"] . "</td>\n";
                    } else {
                        echo " <td> Category missing !!</td>";
                    }
                    echo "  </tr>\n";
                }
            }
        }
        echo "</table>\n";
        ?>
    </body>
</html>
