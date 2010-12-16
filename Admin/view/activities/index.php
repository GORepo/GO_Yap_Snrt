<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
header('Content-type: text/html; charset=utf-8');


require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/DAO/CategoryDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/DAO/ActivityDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/DAO/ImageDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/model/Activity.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/model/Image.php';
$cat = new CategoryDAO();
$act = new ActivityDAO();
$imgDAO = new ImageDAO();
require_once $_SERVER['DOCUMENT_ROOT'] .'/lib/upload.php';
foreach ($cat->getCategoryList() as $category) {
    $catso[] = array($category->id => $category->name);
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/libs.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Admin/view/menu/index.php';
    $smarty->display("menu/menu.tpl");
require_once $_SERVER['DOCUMENT_ROOT'].'/Admin/view/menu/activities.php';
    $smarty->display("menu/activities.tpl");
$activities = $act->loadActivity(0,0);

        if (isset($_GET['mod'])) {
            switch($_GET['mod']){
                case 'list':
                     $smarty->assign('activities',$activities );
                     $smarty->display("activities/list.tpl");
                    break;
                case 'new':
                     $smarty->assign('cats',$catso);
                     $smarty->display("activities/new.tpl");
                    break;
                case 'addEvent':
                    $activity = $act->loadActivity(0,$_GET['id']);
                    $smarty->assign('id',$_GET['id'] );
                    $smarty->assign('name',$activity[0]->title );
                    $smarty->display("activities/addEvent.tpl");
                    break;
                    
                case 'eventDelete':
                    $act->deleteEventById($_GET['id']);
                    header("location:/Admin/view/activities/?mod=list");
                    break;

                case 'delete':
                                    $act->deleteActivityById($_GET['id']);
                                    header("location:/Admin/view/activities/?mod=list");
                                    break;

            }
        }
  
        if (isset($_POST['upfile'])) {

            $unique=md5(date("YmdHms"));
            $activity = new Activity();            
            $activity->title=$_POST['name'];
            $activity->description=str_ireplace("'","",str_ireplace("\"","",htmlspecialchars_decode($_POST['description'])));
            $activity->date=$_POST['year']."-".$_POST['mounth']."-".$_POST['day']." ".$_POST['hour'].":".$_POST['min'].":00";
            $activity->category=$_POST['category'];
            $activity->unique=$unique;
            $act->addActivity($activity);

            $activitId=$act->loadActivityIdByUnique($unique);

            $images=array();
            for($x=1;$x<6;$x++){
                if($_FILES['img'.$x]['name']!=""){
                $img = new Image();
                $img->activityId=$activitId;
                $img->path=imgUpload($_FILES['img'.$x]);
                $images[]=$img;
                }
            }
            foreach($images as $image){
                $imgDAO->addImage($image);
            }

            
//
        }

if (isset($_POST['addEvent'])) {
           $event=array();
           $event['activityId']=$_POST['eId'];
           $event['date']=$_POST['year']."-".$_POST['mounth']."-".$_POST['day']." ".$_POST['hour'].":".$_POST['min'].":00";
           $event['price']=$_POST['price'];
           $event['ticket']=$_POST['ticketSales'];
           $event['scene']=$_POST['scene'];
           $act->addEvent($event);
           header("location:/Admin/view/activities/?mod=list");

       }


?>