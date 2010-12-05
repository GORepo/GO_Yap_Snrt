<?php
/**
 * Created by PhpStorm.
 * User: azizd
 * Date: Dec 5, 2010
 * Time: 8:05:16 PM
 * To change this template use File | Settings | File Templates.
 */

class MysqlConnectionDAO {

    public $con;

    public function __construct() {
        $this->con = mysql_connect("localhost", "root", "123456");
        mysql_select_db("sanart");
        mysql_query("SET NAMES 'utf8'");
        mysql_query("SET CHARACTER SET 'utf8_turkish_ci'");
        mysql_query("COLLATE 'utf8_turkish_ci'");
        if (!$this->con) {
            printf("Can't connect to MySQL Server. Errorcode: %s\n", mysqli_connect_error());
            exit ();
        }

    }

    public function closeCon(){
        mysql_close($this->con);
    }

}
