<html>
    <head>
        <title>Visitor Index</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <?php
    require_once (dirname(__FILE__) . '/include/dbconfig.php');
    require_once (dirname(__FILE__) . '/include/common.php');
    ?>
    <body bgcolor="#FFFFFF" text="#000000">
        <p><img src = "Logo.jpg" width ="264" height = "63"></p>
        <p>&nbsp;</p>
        <?php
        if (empty($category)) {
            $category = 0;
        }
        $catname = $catid = array();
        $childval = $category;
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
            }
        }
        for ($i = count($catname); $i > 0; $i--) {
            echo "<A href=index.php?category=" . $catid[$i] . ">" . $catname[$i] . "</a> >> ";
        }
        ?>
        <table width="900" border="0" cellpadding="3" cellspacing="1">
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                    <form name="form1" method="post" action="searchvisitor.php">
                        <div align="right">Search 
                            <input type="text" name="search" size="20">
                            <select name="searchfor">
                                <option value="ALL">ALL</option>
                                <option value="titles">Book Titles</option>
                                <option value="author">Authors</option>
                            </select>
                            <?php echo "<input type=\"hidden\" name=\"category\" value=\"" . $category . "\">"; ?>
                            <input type="submit" name="Submit" value="Submit">
                        </div>
                    </form>
                </td>
                <td></td>
            </tr>
        </table>
        <hr>
        <table width="90%" border="0" align="center" cellspacing="1" cellpadding="3">
            <tr> 
                <td height="121"> 
                    <h2> Categories </h2>
                    <table width="100%" border="0"  cellspacing="1" cellpadding="3">
                        <?php
                        $query = "select categoryid,name,description from category where parentcategoryid=\"" . $category . "\"";
                        $result = mysql_query($query);
                        if ($result) {
                            while ($row = mysql_fetch_array($result)) {
                                echo " <tr> ";
                                echo "   <td  height=\"5\"> ";
                                echo "     <p><b><a href=\"index.php?category=" . $row ["categoryid"] . "\">" . $row["name"] . "</a></b></p>";
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
                                echo "     <A href=\"login.htm\" >Add to cart</a>";
                                echo "   </td>";
                                echo "   <td width=\"120\"> ";
                                echo "     <A href=\"login.htm\">Remove from cart</a>";
                                echo "   </td>";
                                echo " </tr>";
                            }
                        }
                        ?>	
                    </table>


                </td>
                <td width="200" height="121"> 
                    <form name="form1" method="post" action="login.php">
                        <table width="200" border="1" align="center" cellspacing="0" cellpadding="1" bordercolor="#000000">
                            <tr> 
                                <td colspan="2" bgcolor="#000000"> 
                                    <div align="center"><font color="#FFFFFF"><b>LOGIN</b></font></div>
                                </td>
                            </tr>
                            <tr bgcolor="#CCCCCC"> 
                                <td>
                                    <div align="right"><b>e-mail</b></div>
                                </td>
                                <td> 
                                    <div align="center"> 
                                        <input type="text" name="email" size="15" maxlength="100">
                                    </div>
                                </td>
                            </tr>
                            <tr bgcolor="#CCCCCC"> 
                                <td>
                                    <div align="right"><b>Password </b></div>
                                </td>
                                <td> 
                                    <div align="center"> 
                                        <input type="password" name="password" maxlength="15" size="15">
                                    </div>
                                </td>
                            </tr>
                            <tr bgcolor="#CCCCCC"> 
                                <td colspan="2"> 
                            <center>
                                <input type="submit" name="Submit2" value="Submit">

                            </center>
                            </td>
                            </tr>
                        </table>
                    </form>
                    <p align="center">If you don't have a username/password <a href="add_customer.htm">click 
                            here</a></p>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <hr>
        <table align=\"center\">
            <tr>
                <td><a href="aboutus.htm"   target="_blank">  about us </a></td>
                <td><a href="feedback.htm"  target="_blank">  feedback </a></td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </body>
</html>
