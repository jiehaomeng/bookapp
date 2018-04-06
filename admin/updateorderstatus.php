<html>
    <head>
        <title>Order Dispatched Status Updated      </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <?php
    require_once (dirname(__FILE__) . '/../include/dbconfig.php');
    require_once (dirname(__FILE__) . '/../include/common.php');
    ?>
    <body bgcolor="#FFFFFF" text="#000000">
        <?php
        if (!isset($orderid)) {
            die("Orderid ID not submitted !");
        }
        if (empty($orderid)) {
            die("Order ID empty !");
        }
        if (!isset($status)) {
            die("New value for status not recevied !");
        }
        if (empty($orderid)) {
            die("Status cant be empty !");
        }
        $query = "update orders SET status='" . $status . "' where orderid='" . $orderid . "'";
        $result = mysqli_query($sqlconnect,$query);
        if ($result) {
            echo "Order status updated.<br>\n";
        }
        ?>
        <br><br>
        To return to Admin page <A href="index.html"> Click here! </a>
        <br><br>
    </body>
</html>
