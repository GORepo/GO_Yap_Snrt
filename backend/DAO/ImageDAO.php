<?php
/**
 * Created by PhpStorm.
 * User: azizd
 * Date: Dec 15, 2010
 * Time: 2:23:10 AM
 * To change this template use File | Settings | File Templates.
 */

require_once 'MysqlConnectionDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/model/Image.php';

class ImageDAO extends MysqlConnectionDAO {

    function addImage($image){
        $query = "INSERT INTO image VALUES(null,'".$image->activityId."','".$image->path."')";
        $result = mysql_query($query, $this->con);
    }

    function getImages($activityId,$limit){
        $images = array();
        $query = "SELECT * FROM image where activityId=$activityId order by id ";
        if ($limit > 0) {
            $query = $query . " limit $limit";
        }
        
        $result = mysql_query($query, $this->con);
        while ($row = mysql_fetch_row($result)) {
            $image = new Image();
            $image->id = $row[0];
            $image->activityId= $row[1];
            $image->path = $row[2];
            $images[]=$image;
        }

        return $images;
    }
}
