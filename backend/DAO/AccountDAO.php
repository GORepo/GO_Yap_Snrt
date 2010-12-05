<?php

require_once 'MysqlConnectionDAO.php';

class AccountDAO extends MysqlConnectionDAO {

    public function getUserWithUsernamePassword($uname, $passwd) {
        $id=null;
        $query = "SELECT id,role FROM user where uname ='" . $uname . "' AND password = '" . $passwd . "' ";
        echo $query;
        $result = mysql_query($query, $this->con);
        while ($row = mysql_fetch_row($result)) {
            $id = $row[0];
            $role = $row[1];
        }
        if($id!=null){
            $_SESSION['uid']=$id;
            $_SESSION['role']=$role;
        }
    }

}


?>