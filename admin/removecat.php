<html>
    <head>
        <title>Untitled Document</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <?php
    require_once (dirname(__FILE__) . '/include/dbconfig.php');
    require_once (dirname(__FILE__) . '/include/common.php');
    ?>
    <body bgcolor="#FFFFFF" text="#000000">
        <p>&nbsp;</p>
        <table width="37%" border="0" align="center" cellpadding="0" cellspacing="0" height="66">
            <tr> 
                <td bgcolor="#000000" height="2"> 
                    <div align="center"><b><font color="#FFFFFF">Choose a catgeory to REMOVE!</font></b></div>
                </td>
            </tr>
            <tr> 
                <td bgcolor="#CCCCCC" height="17"> 
                    <form name="form3" method="post" action="deletecategory.php">
                        <p align="center"><b> 
                                <?php
                                $query = "select categoryid,name from category";
                                $result = mysql_query($query);

                                echo " <select name=\"categoryid\">\n";
                                echo "  <option value=\"0\">Choose a category to delete</option>\n";
                                while ($row = mysql_fetch_array($result)) {
                                    echo " <option value=\"" . $row["categoryid"] . "\">" . $row["name"] . "</option>\n";
                                }
                                echo " </select>";
                                ?>
                                <input type="submit" name="Submit32" value="Submit">
                            </b></p>
                    </form>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <table width="37%" border="0" align="center" cellpadding="0" cellspacing="0" height="66">
            <tr> 
                <td bgcolor="#000000" height="10"> 
                    <div align="center"><b><font color="#FFFFFF">REMOVE CATEGORY </font></b></div>
                </td>
            </tr>
            <tr> 
                <td bgcolor="#CCCCCC" height="17"> 
                    <form name="form3" method="post" action="deletecategory.php">
                        <p align="center"><b>Product ID 
                                <input type="text" name="categoryid" size="10">
                                <input type="submit" name="Submit3" value="Submit">
                            </b></p>
                    </form>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </body>
</html>