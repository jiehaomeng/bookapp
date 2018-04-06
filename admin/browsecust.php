<html>
    <head>
        <title>maildata record browser</title>
    </head>
    <?php
    require_once (dirname(__FILE__) . '/../include/dbconfig.php');
    require_once (dirname(__FILE__) . '/../include/common.php');
    ?>
    <body bgcolor="#FFFFFF" text="#000000">
        <?php
        $sqlquery = "SELECT * from customerinfo";
        $queryresult = mysqli_query($sqlconnect,$sqlquery);
        echo "<table width=700 border=1 align=center>";
        echo " <tr>";
        echo "  <td width=200> <center><b>Customerid  </b></center></td>\n";
        echo "  <td width=200> <center><b>Name</b></center></td>\n";
        echo "  <td width=200> <center><b>Date of Birth</b></center></td>\n";
        echo "  <td width=100> <center><b>Gender</b></center></td>\n";
        echo "  <td width=100> <center><b>e-mail</b></center></td>\n";
        echo "  </tr>\n";
        while ($row = mysqli_fetch_array($queryresult)) {
            echo "  <tr>\n";
            echo "    <td>" . $row["customerid"] . "</td>\n";
            echo "    <td>" . $row["name"] . "</td>\n";
            echo "    <td>" . $row["dob"] . "</td>\n";
            echo "    <td>" . $row["gender"] . "</td>\n";
            $sqlquery2 = "SELECT email from newsmail where customerid=" . $row['customerid'];
            $queryresult2 = mysqli_query($sqlconnect,$sqlquery2);;
            if ($row2 = mysqli_fetch_array($queryresult2)) {
                echo "    <td>" . $row2["email"] . "</td>\n";
            } else {
                echo "    <td>No  e-mail address !</td>\n";
            }
        }
        echo "</table>\n";
        ?>
    </body>
</html>
