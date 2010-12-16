<?php
/**
 * Created by PhpStorm.
 * User: azizd
 * Date: Dec 14, 2010
 * Time: 10:46:56 PM
 * To change this template use File | Settings | File Templates.
 */

require_once 'MysqlConnectionDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/model/Category.php';

class CategoryDAO extends MysqlConnectionDAO  {

    public function getCategoryList(){
        $categories=array();
        $query = "SELECT id,name FROM cat";
        $result = mysql_query($query, $this->con);  
        while ($row = mysql_fetch_row($result)) {
            $cat = new Category();
            $cat->id = $row[0];
            $cat->name = $row[1];
            $categories[]=$cat;
        }
        return $categories;
    }

}
