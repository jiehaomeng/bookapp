<html>
    <head>
        <title>Untitled Document</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <?php
    require_once (dirname(__FILE__) . '/../include/dbconfig.php');
    require_once (dirname(__FILE__) . '/../include/common.php');
    ?>
    <body bgcolor="#FFFFFF" text="#000000">
        <?php
        if (!isset($customerid)) {
            die("Customer ID not submitted !");
        }

        if (empty($customerid)) {
            die("Customer ID empty !");
        }
        $query = "delete from customerinfo where customerid ='" . $customerid . "'";
        $result = mysqli_query($sqlconnect,$query);
        if ($result) {
            echo "Customer record deleted from customerinfo table.<br>\n";
        } else {
            echo "Customer record not found in customerinfo !<br>\n";
        }

        $query = "delete from login where customerid ='" . $customerid . "'";
        $result = mysqli_query($sqlconnect,$query);
        if ($result) {
            echo "Customer record deleted from login table.<br>\n";
        } else {
            echo "Customer record not found in login table !<br>\n";
        }

        $query = "delete from newsmail where customerid ='" . $customerid . "'";
        $result = mysqli_query($sqlconnect,$query);
        if ($result) {
            echo "Customer record deleted from newsmail table.<br>\n";
        } else {
            echo "Customer record not found in newsmail table !<br>\n";
        }

        $query = "delete from neworder where customerid ='" . $customerid . "'";
        $result = mysqli_query($sqlconnect,$query);
        if ($result) {
            echo "Customer record deleted from neworder table.<br>\n";
        } else {
            echo "Customer record not found in neworder table !<br>\n";
        }

        echo " Customer record in Orders table left Intact !<br>";
        ?>
        <br><br>

        To return to Admin page <A href="index.html"> Click here! </a>
        <br><br>

    </body>
</html>
