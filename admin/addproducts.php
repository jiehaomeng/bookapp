<html>
    <head>
        <title>Add category</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <?php
    require_once (dirname(__FILE__) . '/include/dbconfig.php');
    require_once (dirname(__FILE__) . '/include/common.php');
    ?>
    <body bgcolor="#FFFFFF" text="#000000">
        <table width="350" border="0" align="center" cellpadding="0" cellspacing="0" height="70">
            <tr> 
                <td bgcolor="#000000" height="14"> 
                    <div align="center"><b><font color="#FFFFFF">ADD PRODUCT</font></b></div>
                </td>
            </tr>
            <tr> 
                <td width="48%" height="82" bgcolor="#CCCCCC"> 
                    <form name="form2" method="post" action="add.php">
                        <table width="75%" border="0" align="center">
                            <tr> 
                            <input type="hidden" name="type" value="product" size="20">

                            <td width="36%"><b> Name</b></td>
                            <td width="64%"> 
                                <div align="center"> 
                                    <input type="text" name="proname" size="20">
                                </div>
                            </td>
                            </tr>
                            <tr> 
                                <td width="36%"><b> Author</b></td>
                                <td width="64%"> 
                                    <div align="center"> 
                                        <input type="text" name="proauthor" size="20">
                                    </div>
                                </td>
                            </tr>

                            <tr> 
                                <td width="36%"><b>Description</b></td>
                                <td width="64%"> 
                                    <div align="center"> 
                                        <input type="text" name="prodescription" size="20">
                                    </div>
                                </td>
                            </tr>
                            <tr> 
                                <td width="36%"><b>Price</b></td>
                                <td width="64%"> 
                                    <div align="center"> 
                                        <input type="text" name="proprice" size="20">
                                    </div>
                                </td>
                            </tr>
                            <tr> 
                                <td width="36%"><b>Product Category</b></td>
                                <td width="64%"> 
                                    <div align="center"> 
                                        <?php
                                        $query = "select categoryid,name from category";
                                        $result = mysql_query($query);

                                        echo "                <select name=\"parentcategory\">";
                                        echo "                 <option>Select Product Category</option>";
                                        while ($row = mysql_fetch_array($result)) {
                                            echo "                 <option value=\"" . $row["categoryid"] . "\">" . $row["name"] . "</option>";
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <tr> 
                                <td colspan="2" height="2"> 
                                    <div align="center"> 
                                        <input type="submit" name="Submit2" value="Submit">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
    </body>
</html>
