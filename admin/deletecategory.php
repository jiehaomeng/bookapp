<html>
    <head>
        <title>Delete Category      </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <?php
    require_once (dirname(__FILE__) . '/../include/dbconfig.php');
    require_once (dirname(__FILE__) . '/../include/common.php');
    ?>
    <body bgcolor="#FFFFFF" text="#000000">
        <?php
        if (!isset($categoryid)) {
            die("category ID not submitted !");
        }

        if (empty($categoryid)) {
            die("category ID empty !");
        }
        if ($categoryid < 2) {
            die("Sorry this category cant be deleted !");
        }

        $query = "select parentcategoryid from category where categoryid ='" . $categoryid . "'";

        $result = mysqli_query($sqlconnect,$query);
        {
            if ($row = mysqli_fetch_array($result)) {
                $parentcategoryid = $row["parentcategoryid"];
            } else {
                die("Parent Not Found!!!");
            }
        }

        $query = "select * from category where parentcategoryid ='" . $categoryid . "'";

        $result = mysqli_query($sqlconnect,$query);
        while ($row = mysqli_fetch_row($result)) {
            $query2 = "Update category SET parentcategoryid='" . $parentcategoryid . "' where parentcategoryid='" . $categoryid . "'";
            $result2 = mysqli_query($query2);
            if (!$result2) {
                die("Tree shift failed !! <br>");
            } else {
                echo "Successfully shifted tree<br>";
            }
        }


        $query = "delete from category where categoryid ='" . $categoryid . "'";
        $result = mysqli_query($sqlconnect,$query);
        if ($result) {
            echo "category record deleted from categorys table.<br>\n";
        } else {
            echo "category record wasnt in categorys table !<br>\n";
        }
        ?>
        <br><br>

        To return to Admin page <A href="index.html"> Click here! </a>
        <br><br>

    </body>
</html>
