<?php
/**
 * Created by PhpStorm.
 * User: azizd
 * Date: Dec 15, 2010
 * Time: 1:52:21 AM
 * To change this template use File | Settings | File Templates.
 */

require_once 'MysqlConnectionDAO.php';
require_once 'ImageDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/model/Activity.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/model/Image.php';

class ActivityDAO extends MysqlConnectionDAO {

    function addActivity($activity) {

        $query = "INSERT INTO activity VALUES(null,'" . $activity->title . "','" . $activity->description . "','" . $activity->date . "','" . $activity->price . "','" . $activity->ticketSales . "','" . $activity->scene . "'," . $activity->category . ",'" . $activity->unique . "','active')";
        echo $query;
        $result = mysql_query($query, $this->con);

    }

    function addEvent($event) {

        $query = "INSERT INTO event VALUES(null," . $event['activityId'] . ",'" . $event['date']. "','" . $event['price']. "','" . $event['ticket'] . "','" . $event['scene'] . "')";
        $result = mysql_query($query, $this->con);

    }

    function deleteActivityById($id) {

        $query = "DELETE FROM activity WHERE id=$id";
        $result = mysql_query($query, $this->con);

        $this->deleteEventByActivity($id);

    }

    function deleteEventById($id) {

        $query = "DELETE FROM event WHERE id=$id";
        $result = mysql_query($query, $this->con);

    }

     function deleteEventByActivity($id) {

        $query = "DELETE FROM event WHERE activityID=$id";
        $result = mysql_query($query, $this->con);

    }

    function loadActivityIdByUnique($unique) {
        $id = 0;
        $query = "SELECT id FROM activity where uniqueId='$unique'";
        $result = mysql_query($query, $this->con);
        while ($row = mysql_fetch_row($result)) {
            $id = $row[0];
        }

        return $id;
    }


    function loadActivity($limit,$id) {
        $activities = array();
        $img = new ImageDAO();
        $query = "SELECT id,title,description,DATE_FORMAT(date,'%m-%Y'),price,ticketSales,scene,cat FROM activity where status='active' ";
        if ($id > 0) {
            $query = $query . " and id=$id";
            $imgLimit=0;
        }else{
            $imgLimit=1;
        }
        if ($limit > 0) {
            $query = $query . " limit $limit";
        }
        
        $result = mysql_query($query, $this->con);
        while ($row = mysql_fetch_row($result)) {
            $activity = new Activity();
            $activity->id = $row[0];
            $activity->title = $row[1];
            $activity->description = $row[2];
            $activity->date = $row[3];
            $activity->price = $row[4];
            $activity->ticketSales = $row[5];
            $activity->scene = $row[6];
            $activity->category = $row[7];

            $activity->images = $img->getImages($row[0],$imgLimit);
            $activity->events = $this->loadEvent($row[0]);
            
            $activities[]=$activity;
        }

        return $activities;
    }
    function loadEvent($id) {
            $events = array();
            $img = new ImageDAO();
            $query = "SELECT id,DATE_FORMAT(date,'%d-%m-%Y %H:%i'),price,ticket,scene FROM event where activityId=$id ";

            $result = mysql_query($query, $this->con);
            while ($row = mysql_fetch_row($result)) {

                $events[$row[0]]['id']= $row[0];
                $events[$row[0]]['date'] = $row[1];
                $events[$row[0]]['price'] = $row[2];
                $events[$row[0]]['ticket'] = $row[3];
                $events[$row[0]]['scene'] = $row[4];
                

            }

            return $events;
    }
}
