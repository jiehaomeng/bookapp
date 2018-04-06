<html>
    <head>
        <title>Add category</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <?php
    require_once (dirname(__FILE__) . '/../include/dbconfig.php');
    require_once (dirname(__FILE__) . '/../include/common.php');
    ?>
    <body bgcolor="#FFFFFF" text="#000000">
        <table width="350" border="0" align="center" cellpadding="0" cellspacing="0" height="277">
            <tr> 
                <td bgcolor="#000000" height="2"> 
                    <div align="center"><b><font color="#FFFFFF">ADD CATEGORY</font></b></div>
                </td>
            </tr>
            <tr> 
                <td width="48%" height="121" bgcolor="#CCCCCC"> 
                    <form name="form1" method="post" action="add.php?type=category">
                        <table width="75%" border="0" align="center">
                            <tr> 
                                <td width="36%"><b> Name</b></td>
                                <td width="64%"> 
                                    <div align="center"> 
                                        <input type="text" name="catname" size="20">
                                    </div>
                                </td>
                            </tr>
                            <tr> 
                                <td width="36%"><b>Description</b></td>
                                <td width="64%"> 
                                    <div align="center"> 
                                        <input type="text" name="catdescription" size="20">
                                    </div>
                                </td>
                            </tr>
                            <tr> 
                                <td width="36%"><b> Parent Category</b></td>
                                <td width="64%"> 
                                    <div align="center"> 
                                        <?php
                                        $query = "select name,categoryid from category";
                                        $result = mysqli_query($sqlconnect,$query);
                                        echo "                <select name=\"parentcategory\">";
                                        echo "                 <option value=\"0\">Select Product Category</option>";
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "                 <option value=\"" . $row["categoryid"] . "\">" . $row["name"] . " </option>";
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <tr> 
                                <td colspan="2"> 
                                    <div align="center"> 
                                        <input type="submit" name="Submit22" value="Submit">
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
