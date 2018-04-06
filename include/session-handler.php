<?php

/*
  DROP TABLE `test_session`;
  CREATE TABLE `test_sessions` (
  `session_id` varchar(255) binary NOT NULL default '',
  `session_expires` int(10) unsigned NOT NULL default '0',
  `session_data` text,
  PRIMARY KEY  (`session_id`)
  );
 */

class session {

    // session-lifetime
    var $lifeTime;
    // mysql-handle
    var $dbHandle;

    function open($savePath, $sessName) {
        // get session-lifetime
        $this->lifeTime = get_cfg_var("session.gc_maxlifetime");
        // open database-connection
        $dbHandle = @mysqli_connect("server", "user", "password");
        $dbSel = @mysqli_select_db("database", $dbHandle);
        // return success
        if (!$dbHandle || !$dbSel)
            return false;
        $this->dbHandle = $dbHandle;
        return true;
    }

    function close() {
        $this->gc(ini_get('session.gc_maxlifetime'));
        // close database-connection
        return @mysqli_close($this->dbHandle);
    }

    function read($sessID) {
        // fetch session-data
        $res = mysqli_query("SELECT session_data AS data FROM test_sessions
                            WHERE session_id = '$sessID'
                            AND session_expires > " . time(), $this->dbHandle);
        // return data or an empty string at failure
        if ($row = mysqli_fetch_assoc($res))
            return $row['data'];
        return "";
    }

    function write($sessID, $sessData) {
        // new session-expire-time
        $newExp = time() + $this->lifeTime;
        // is a session with this id in the database?
        $res = mysqli_query("SELECT * FROM test_sessions
                            WHERE session_id = '$sessID'", $this->dbHandle);
        // if yes,
        if (mysqli_num_rows($res)) {
            // ...update session-data
            mysqli_query("UPDATE test_sessions
                         SET session_expires = '$newExp',
                         session_data = '$sessData'
                         WHERE session_id = '$sessID'", $this->dbHandle);
            // if something happened, return true
            if (mysqli_affected_rows($this->dbHandle))
                return true;
        }
        // if no session-data was found,
        else {
            // create a new row
            mysqli_query("INSERT INTO test_sessions (
                         session_id,
                         session_expires,
                         session_data)
                         VALUES(
                         '$sessID',
                         '$newExp',
                         '$sessData')", $this->dbHandle);
            // if row was created, return true
            if (mysqli_affected_rows($this->dbHandle))
                return true;
        }
        // an unknown error occured
        return false;
    }

    function destroy($sessID) {
        // delete session-data
        mysqli_query("DELETE FROM test_sessions WHERE session_id = '$sessID'", $this->dbHandle);
        // if session was deleted, return true,
        if (mysqli_affected_rows($this->dbHandle))
            return true;
        // ...else return false
        return false;
    }

    function gc($sessMaxLifeTime) {
        // delete old sessions
        mysqli_query("DELETE FROM test_sessions WHERE session_expires < " . time(), $this->dbHandle);
        // return affected rows
        return mysqli_affected_rows($this->dbHandle);
    }

}

$session = new session();
session_set_save_handler(array(&$session, "open"), array(&$session, "close"), array(&$session, "read"), array(&$session, "write"), array(&$session, "destroy"), array(&$session, "gc"));
session_start();
