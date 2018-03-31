<html>
    <head>
        <title>Feedback Page</title>
    </head>
    <?php
    require_once (dirname(__FILE__) . '/include/common.php');
    ?>
    <body bgcolor="#FFFFFF" text="#000000">

        <?php
        $message = "";

        // --- Subject of the mail.

        $mailsubject = "Feedback From Customer";

        // --- Body of the mail.

        $mailbody = "The user entered the following rating: \n";

        if (isset($q1)) {
            $mailbody.="The user rated the Web site as " . $q1 . "\n";
        }

        if (isset($q2)) {
            $mailbody.= "The user rated the usefulness as " . $q2 . "\n";
        }

        if (isset($q3)) {
            $mailbody.= "The user rated the visual appearance as " . $q3 . "\n";
        }

        if (isset($q4)) {
            $mailbody.="The user rated ease of navigation as" . $q4 . "\n";
        }

        $mailbody.="Have a nice day";

        // --- A mail is send to the Bukbuz, Inc. administrator.

        $email = "admin@bukbuz.com";

        // --- Result stored in the $result variable.

        $result = mail($email, $mailsubject, $mailbody);
        if ($result) {

            // --- If mail is delivered successfully.

            echo "<p><h1><center>E-mail sent to site administrator.</center></h1></p>";
        } else {

            // --- If the e-mail is not sent.

            echo "<p><b>E-mail could not be sent.</b></p>";
        }
        ?>

        <h1><center>Thank you for your time ! </center></h1>
    </body>
</html>
