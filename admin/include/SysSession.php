<?php

//inc.session.php
/*
  DROP TABLE `sys_session`;
  CREATE TABLE `sys_session` (
  `session_id` varchar(255) NOT NULL,
  `session_expires` datetime NOT NULL,
  `session_data` text ,
  PRIMARY KEY (`session_id`)
  );
 */

class SysSession implements SessionHandlerInterface {

    protected $savePath;
    protected $sessionName;
    private $link;

    public function open($savePath, $sessionName) {
        $this->savePath = $savePath;
        $this->sessionName = $sessionName;
        $link = mysqli_connect("server", "user", "pwd", "mydatabase");
        if ($link) {
            $this->link = $link;
            return true;
        } else {
            return false;
        }
    }

    public function close() {
        mysqli_close($this->link);
        return true;
    }

    public function read($id) {
        $result = mysqli_query($this->link, "SELECT session_data FROM sys_session WHERE session_id = '" . $id . "' AND session_expires > '" . date('Y-m-d H:i:s') . "'");
        if ($row = mysqli_fetch_assoc($result)) {
            return $row['session_data'];
        } else {
            return "";
        }
    }

    public function write($id, $data) {
        $DateTime = date('Y-m-d H:i:s');
        $NewDateTime = date('Y-m-d H:i:s', strtotime($DateTime . ' + 1 hour'));
        $result = mysqli_query($this->link, "REPLACE INTO sys_session SET session_id = '" . $id . "', session_expires = '" . $NewDateTime . "', session_data = '" . $data . "'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function destroy($id) {
        $result = mysqli_query($this->link, "DELETE FROM sys_session WHERE session_id ='" . $id . "'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function gc($maxlifetime) {
        $result = mysqli_query($this->link, "DELETE FROM sys_session WHERE ((UNIX_TIMESTAMP(session_expires) + " . $maxlifetime . ") < " . $maxlifetime . ")");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}

$handler = new SysSession();
session_set_save_handler($handler, true);
?>

<?php

//page 1
//require_once('inc.session.php');

session_start();

$_SESSION['var1'] = "My session text: TEST!";
?>

<?php

//page 2
//require_once('inc.session.php');

session_start();
if (isset($_SESSION['var1'])) {
    echo $_SESSION['var1'];
}
?>