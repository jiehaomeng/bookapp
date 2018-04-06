<html>
    <head>
        <title>Newsmail updation form</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>

    <body bgcolor="#FFFFFF" text="#000000">
        <p>&nbsp;</p><form name="newsmailform" method="post" action="update_customerinfo.php">
            <table width="250" border="5" align="center" cellpadding="3">
                <tr> 
                    <td colspan="2" bgcolor="#dddddd"> 
                        <div align="center"><b>Change Information as desired</b></div>
                    </td>
                </tr>
                <?php
                require_once (dirname(__FILE__) . '/include/dbconfig.php');
                require_once (dirname(__FILE__) . '/include/common.php');

                $query = "SELECT * from customerinfo where customerid='" . $customerid . "'";

                $result = mysqli_query($sqlconnect,$query);

                if ($row = mysqli_fetch_array($result)) {
                    echo " <tr> ";
                    echo " <td> ";
                    echo " customerid";
                    echo " </td>\n";
                    echo " <td > ";
                    echo $row["customerid"];
                    echo "      </td>\n";
                    echo "    </tr>\n";
                    echo "<tr> \n";
                    echo " <td> ";
                    echo "  Name";
                    echo " </td>\n";
                    echo " <td><b> ";
                    echo $row["name"];
                    echo " </b></td>\n";
                    echo " </tr>\n";
                    echo " <tr > ";
                    echo " <td > ";
                    echo "  Address";
                    echo " </td>\n";
                    echo " <td> ";
                    echo " <textarea name=\"address\" cols=30 rows=4> " . $row["address"] . "</textarea>";
                    echo " </td>\n";
                    echo " </tr>\n";
                    echo "<tr > \n";
                    echo " <td> ";
                    echo "  Date Of Birth";
                    echo " </td>\n";
                    echo " <td><b> ";
                    echo $row["dob"];
                    echo " <b></td>\n";
                    echo " </tr>\n";
                    echo "    <tr> ";
                    echo "      <td colspan=\"2\" bgcolor=\"#dddddd\">\n ";
                    echo "        <div align=\"center\"> \n";
                    echo "          <input type=\"hidden\" name=\"customerid\" value=\"" . $customerid . "\">\n";
                    echo "          <input type=\"submit\" name=\"Submit\" value=\"Submit\">\n";
                    echo "        </div>\n";
                    echo "      </td>";
                    echo "</tr>\n";
                }
                ?>
            </table>
        </form>
    </body>
</html>
