<html>
    <head>
        <title>Index</title>
    </head>
    <body>
        <h2 align="center">User Registration Confirmation page.</h2>
        <?php
        require_once (dirname(__FILE__) . '/include/common.php');
        ?>
        <table width="300" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#EEEEFF">
            <tr> 
                <td width="47%" align="right"> <B> Full Name </B> </td>
                <td> 
                    <?php
                    //print_r($_POST);exit;
                    //$name = isset($_POST['name']) ? $_POST['name'] : '';
                    if (empty($name)) {
                        die(" No Name submitted");
                    } elseif ((strlen($name) < 5) || (strlen($name) > 50)) {
                        die("Invalid name");
                    } else {
                        echo $name;
                    }
                    ?>
                </td>
            </tr>
            <tr> 
                <td width="47%" height="57" align="right"><B> Address </B></td>
                <td height="57"> 
                    <?php
                    //$address = isset($_POST['address']) ? $_POST['address'] : '';
                    if (empty($address)) {
                        die(" No address submitted");
                    } elseif ((strlen($address) < 5) || (strlen($address) > 200)) {
                        die("Invalid address");
                    } else {
                        echo $address;
                    }
                    ?>
                </td>
            </tr>
            <tr> 
                <td width="47%" align="right"> <B>email</B> </td>
                <td height="2"> 
                    <?php
                    //$email = isset($_POST['email']) ? $_POST['email'] : '';
                    if (empty($email)) {
                        die(" No email address submitted");
                    } elseif ((strlen($email) < 5) || (strlen($email) > 100)) {
                        die("Invalid email address, email address too long or too short.");
                    } elseif (!ereg("@", $email)) {
                        die("Invalid email address, no @ symbol found");
                    } else {
                        echo $email;
                    }
                    ?>
                </td>
            </tr>
            <tr> 
                <td width="47%" align="right"> <B>password </B></td>
                <td height="2"> 
                    <?php
                    //$password = isset($_POST['password']) ? $_POST['password'] : '';
                    //$cpassword = isset($_POST['cpassword']) ? $_POST['cpassword'] : '';
                    if (empty($password) || empty($cpassword)) {
                        die(" No password submitted");
                    } elseif (((strlen($password) < 5) || (strlen($password) > 15))) {
                        die("Invalid password length address");
                    } elseif (!(strlen($password) == strlen($cpassword))) {
                        die(" Passwords do not match ! ");
                    } elseif (!($password === $cpassword)) {
                        die(" Passwords do not match ! ");
                    } else {
                        for ($i = 0; $i < strlen($password); $i++) {
                            echo "*";
                        }
                    }
                    ?>
                </td>
            </tr>
            <tr> 
                <td width="47%" align="right"> DoB </B></td>
                <td height="2"> 
                    <?php
                    //$birth_month = isset($_POST['birth_month']) ? $_POST['birth_month'] : '';
                    //$birth_day = isset($_POST['birth_day']) ? $_POST['birth_day'] : '';
                    //$birth_year = isset($_POST['birth_year']) ? $_POST['birth_year'] : '';
                    if (empty($birth_month) || empty($birth_day) || empty($birth_year)) {
                        die(" Date of birth not submitted or incomplete.");
                    }
                    switch ($birth_month) {
                        case 1: print "January ";
                            break;
                        case 2: print "February ";
                            break;
                        case 3: print "March ";
                            break;
                        case 4: print "April ";
                            break;
                        case 5: print "May ";
                            break;
                        case 6: print "June ";
                            break;
                        case 7: print "July ";
                            break;
                        case 8: print "August ";
                            break;
                        case 9: print "September ";
                            break;
                        case 10: print "October ";
                            break;
                        case 11: print "November ";
                            break;
                        case 12: print "Decmeber ";
                            break;
                        default: die("Invalid birth month !!");
                    }
                    if (($birth_day < 1) || ($birth_day > 31)) {
                        die(" Invalid date !");
                    } else {
                        echo $birth_day, "&nbsp;";
                    }
                    if (($birth_year < 1900) || ($birth_year > 2099)) {
                        die("Invalid birth year");
                    } else {
                        echo $birth_year;
                    }
                    ?>
                </td>
            </tr>
            <tr> 
                <td width="47%" align="right"> 
                    Gender
                </td>
                <td height="2" width="26%"> 
                    <?php
                    //$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
                    if (empty($gender)) {
                        die(" Gender not specified");
                    } elseif (!(($gender == "Male") || ($gender == "Female"))) {
                        die("Invalid value for gender");
                    } else {
                        echo $gender;
                    }
                    ?>
                </td>
            </tr>
            <tr> 
                <td colspan="3"> 
                    <form Name=confirm action="add_customer.php" method="post">
                        <?php
                        echo "<input type=hidden name=\"name\" value=\"" . $name . "\" >\n";
                        echo "<input type=hidden name=\"address\" value=\"" . $address . "\" >\n";
                        echo "<input type=hidden name=\"email\" value=\"" . $email . "\" >\n";
                        echo "<input type=hidden name=\"password\" value=\"" . $password . "\" >\n";
                        echo "<input type=hidden name=\"gender\" value=\"" . $gender . "\" >\n";
                        echo "<input type=hidden name=\"birth_month\" value=\"" . $birth_month . "\" >\n";
                        echo "<input type=hidden name=\"birth_day\" value=\"" . $birth_day . "\" >\n";
                        echo "<input type=hidden name=\"birth_year\" value=\"" . $birth_year . "\" >\n";
                        ?>	
                        <center>          
                            <input type="submit" name="Submit" value="Confirm >>">
                        </center>
                    </form>
                </td>
            </tr>
        </table>

    </body>
</html>
