<?php

class mysql {

    //连接服务器、数据库以及执行SQL语句的类库
    public $database;
    public $server_username;
    public $server_userpassword;
    public $link_identifier;

    function __construct() {  //构造函数初始化所要连接的数据库
        $this->server_username = "mysqluser";
        $this->server_userpassword = "mysqlpassword";
    }

//end mysql()

    function link($database) {  //连接服务器和数据库
        //设置所有连接的数据库
        if ($database == "") {
            $this->database = "books";
        } else {
            $this->database = $database;
        }
        //连接服务器和数据库
        if (@$this->link_identifier = mysqli_connect('10.129.5.247', $this->server_username, $this->server_userpassword)) {
            if (!mysqli_select_db($this->database, $this->link_identifier)) {
                echo "数据库连接错误！！！";
                exit;
            }
            mysqli_set_charset('utf8', $this->link_identifier);
        } else {
            echo "服务器正在维护中，请稍后重试！！！";
            exit;
        }
    }

//end link($database)

    function excu($query) {     //执行SQL语句
        if ($result = mysqli_query($query, $this->link_identifier)) {
            return $result;
        } else {
            echo mysqli_errno($this->link_identifier) . ": " . mysqli_error($this->link_identifier) . "\n";
            echo "sql语句执行错误！！！请重试!!!";
            exit;
        }
    }

//end  exec($query)
    function close() {
        return mysqli_close($this->link_identifier);
    }

//end  close()
}

//end class mysql
?>
