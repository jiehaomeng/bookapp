<html>
    <head>
        <title> New Item added</title>
    </head>
    <?php
    require_once (dirname(__FILE__) . '/include/dbconfig.php');
    require_once (dirname(__FILE__) . '/include/common.php');
    ?>
    <body>
        <?php
        $query = "Select customerid,productid from neworder where customerid='" . $customerid . "' and productid='" . $productid . "'";
        $result = mysql_query($query);
        if ($row = mysql_fetch_array($result)) {
            die("<h2>This products is already in your shopping cart !!</h2>");
        }
        $query = "INSERT into neworder VALUES('','" . $customerid . "','" . $productid . "')";
        $result = mysql_query($query);
        ?>
        <h1>The following was added to your shopping cart.</h1>
        <table border=0>
            <?php
            $query = "select name, author, description, price from products where productid='" . $productid . "'";
            $result = mysql_query($query);
            if ($row = mysql_fetch_array($result)) {
                echo "<tr><td>Title :</td><td>" . $row["name"] . " </td></tr>";
                echo "<tr><td>Author:</td><td>" . $row["author"] . " </td></tr>";
                echo "<tr><td>Description :</td><td>" . $row["description"] . " </td></tr>";
                echo "<tr><td>Price :</td><td>" . $row["price"] . " </td></tr>";
            }
            ?>
        </table>
    </body>
</html>