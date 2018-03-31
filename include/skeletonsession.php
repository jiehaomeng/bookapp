<?php

namespace xyz;

class Session implements \SessionHandlerInterface, Singleton {

    /** @var SessionToken $token The SessionToken of this command;
      this is part of my programming approach */
    protected $token;

    /** @var PDO $dbh The PDO handler to the database */
    protected $dbh;

    /** @var $savePath Where sessions are stored */
    protected $savePath;

    /** @var $type Type of sessions (['files'|'sqlite']) */
    protected $type;

    /** @var self $instance An instance of this class */
    static private $instance = null;

    private function __construct() {
        
    }

    static public function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function open($savePath, $sessionName) {
        
    }

    public function close() {
        if ($this->type == static::FILES) {
            return true;
        } elseif ($this->type == static::SQLITE) {
            return true;
        }
    }

    public function read($id) {
        
    }

    public function write($id, $data) {
        
    }

    public function destroy($id) {
        
    }

    public function gc($maxlifetime) {
        
    }

    static public function get($key) {
        return (isset($_SESSION[$key])) ? $_SESSION[$key] : null;
    }

    static public function set($key, $value) {
        return $_SESSION[$key] = $value;
    }

    static public function newId() {
        
    }

    static public function start($call = null, $log = false) {
        //1. start session (send 1st header)
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();   //calls: open()->read()
        }

        //2. $_SESSION['session']: array of session control data
        // existed session
        if (is_array(static::get('session'))) {
            $session = static::get('session');
            // new session
        } else {
            $session = array();
        }

        $tmp = $_SESSION;
        //do sth with $session array...
        static::set('session', $session);
        session_write_close();   //calls: write()->read()->close()
        //create a new session inside if...else...
        session_id(static::newId());
        session_start();   //calls: open()->read()
        //if you want previous session data to be copied:
        //$_SESSION = $tmp;
        //do sth else with $session array and save it to new session...
        static::set('session', $session);

        //6. call callback function (only on valid/new sessions)
        if ($call)
            $call();
        session_write_close();   //calls: write()->read()->close()
    }

    /**
     * Defines custom session handler.
     */
    static public function setHandler() {
        // commit automatic session
        if (ini_get('session.auto_start') == 1) {
            session_write_close();
        }
        $handler = static::getInstance();
        session_set_save_handler($handler, true);
    }

}

?>
<?php

//Let's start a session:
Session::setHandler();
Session::start();
