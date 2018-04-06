<html>
    <head>
        <title>Delete Product      </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <?php
    require_once (dirname(__FILE__) . '/../include/dbconfig.php');
    require_once (dirname(__FILE__) . '/../include/common.php');
    ?>
    <body bgcolor="#FFFFFF" text="#000000">
        <?php
        if (!isset($productid)) {
            die("Product ID not submitted!");
        }

        if (empty($productid)) {
            die("Product ID empty!");
        }

        $query = "delete from products where productid ='" . $productid . "'";
        $result = mysqli_query($sqlconnect,$query);
        if ($result) {
            echo "Product record deleted from Products table.<br>\n";
        } else {
            echo "Product record was not in Products table!<br>\n";
        }

        echo " Product record in Orders table left Intact !<br>";
        ?>
        <br><br>

        To return to Admin page <A href="index.html"> Click here! </a>
        <br><br>

    </body>
</html>
