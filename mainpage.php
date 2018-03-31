<html>
    <head>
        <title>Mainpage Document</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <?php
    require_once (dirname(__FILE__) . '/include/dbconfig.php');
    require_once (dirname(__FILE__) . '/include/common.php');
    ?>
    <body bgcolor="#FFFFFF" text="#000000">
        <p><img src = "Logo.jpg" width = "264" height = "63"></p>
        <p>&nbsp;</p>
        <?php
        $customerid = isset($customerid) ? $customerid : null;
        if (!isset($category) || empty($category)) {
            $category = 1;
        }
        $catname = $catid = array();
        $childval = $category;
        //$catline[]=" ";
        $query = "select categoryid, name from category where categoryid=\"" . $childval . "\"";
        $result = mysql_query($query);
        if ($row = mysql_fetch_array($result)) {
            $catid[1] = $row["categoryid"];
            $catname[1] = $row["name"];
        }

        while (!($childval == 0)) {
            $query = "select parentcategoryid from category where categoryid=\"" . $childval . "\"";
            $result = mysql_query($query);
            if ($row = mysql_fetch_array($result)) {
                $childval = $row["parentcategoryid"];
                $query = "select categoryid,name from category where categoryid=\"" . $childval . "\"";
                $result = mysql_query($query);
                if ($row = mysql_fetch_array($result)) {
                    $catid[] = $row["categoryid"];
                    $catname[] = $row["name"];
                }
            } else {
                $childval = 0;
            }
        }

        for ($i = count($catname); $i > 0; $i--) {
            //$categoryid=$catid[count($catname)];
            echo "<A href=mainpage.php?category=" . $catid[$i] . "&customerid=" . $customerid . ">" . $catname[$i] . "</a> >> ";
        }
        ?>
        <table width="900" border="0" cellpadding="3" cellspacing="1">
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                    <form name="form1" method="post" action="searchcustomer.php">
                        <div align="right">Search 
                            <input type="text" name="search" size="20">
                            <select name="searchfor">
                                <option value="ALL">ALL</option>
                                <option value="titles">Book Titles</option>
                                <option value="author">Authors</option>
                            </select>
                            <?php echo "<input type=\"hidden\" name=\"category\" value=\"" . $category . "\">"; ?>      
                            <?php echo "<input type=\"hidden\" name=\"customerid\" value=\"" . $customerid . "\">"; ?>      
                            <input type="submit" name="Submit" value="Submit">
                        </div>
                    </form>
                </td>
                <td><a href="asdvancesearch.htm">Advance</a></td>
            </tr>
        </table>
        <hr>
        <table width="90%" border="0" align="center" cellspacing="1" cellpadding="3">
            <tr> 
                <td> 
                    <h2> Subcategories </h2>
                    <table width="100%" border="0"  cellspacing="1" cellpadding="3">
                        <?php
                        $query = "select categoryid,name,description from category where parentcategoryid=\"" . $category . "\"";
                        $result = mysql_query($query);
                        if ($result) {
                            while ($row = mysql_fetch_array($result)) {
                                echo " <tr> ";
                                echo "   <td  height=\"5\"> ";
                                echo "     <p><b><a href=\"mainpage.php?category=" . $row["categoryid"] . "&customerid=" . $customerid . "\">" . $row["name"] . "</a></b></p>";
                                echo "   </td>";
                                echo "   <td width=\"400\"  height=\"5\"> ";
                                echo "     <p><b>" . $row["description"] . "</b></p>";
                                echo "   </td>";
                                echo " </tr>";
                            }
                        }
                        ?>	
                    </table>

                    <h2>Category Products...</h2>
                    <table width="100%" border="1" align="center" cellspacing="1" cellpadding="3">
                        <tr>
                            <td><b> Product </b></td>
                            <td><b> Author  </b></td>
                            <td><b> Description </b></td>
                            <td><b> Price </b></td>
                            <td colspan=2><b> Action </b></td>
                        </tr>

                        <?php
                        $query = "select productid,name, author, description,price from products where category=\"" . $category . "\"";
                        $result = mysql_query($query);
                        if ($result) {
                            while ($row = mysql_fetch_array($result)) {
                                echo " <tr> ";
                                echo "   <td> ";
                                echo "     <p><b>" . $row["name"] . "</b></p>";
                                echo "   </td>";

                                echo "   <td> ";
                                echo "     <p><b>" . $row["author"] . "</b></p>";
                                echo "   </td>";


                                echo "   <td> ";
                                echo "     <p>" . $row["description"] . "</p>";
                                echo "   </td>";

                                echo "   <td> ";
                                echo "     <p>" . $row["price"] . "</p>";
                                echo "   </td>";

                                echo "   <td width=\"120\"> ";
                                echo "     <A target=\"_blank\" href=\"addtocart.php?customerid=" . $customerid . "&productid=" . $row["productid"] . "\">Add to cart</a>";
                                echo "   </td>";

                                echo "   <td width=\"120\"> ";
                                echo "     <A target=\"_blank\" href=\"removefromcart.php?customerid=" . $customerid . "&productid=" . $row["productid"] . "\">Remove from cart</a>";
                                echo "   </td>";

                                echo " </tr>";
                            }
                        }
                        ?>	
                    </table>
                </td>
                <td width="17%"> 
                    <?php
                    echo "      <p><a href=\"personalsettings.php?customerid=" . $customerid . "&category=" . $category . "\">Personal Settings</a></p> ";
                    echo "      <p><a href=\"viewshoppingcart.php?customerid=" . $customerid . "&category=" . $category . "\">View Shopping Cart</a></p>";
                    ?>      
                    <p><a href="login.htm">Log Out</a></p>
                </td>
            </tr>
        </table>
        <hr>
        <table align = \"center\">
            <tr>
                <td><a href = "aboutus.htm" target = "_blank"> aboutus </a></td>
                <td><a href = "feedback.htm" target = "_blank"> feedback </a></td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </body>
</html>
