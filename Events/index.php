<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

 require_once $_SERVER['DOCUMENT_ROOT'] . '/libs.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/DAO/ActivityDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/DAO/ImageDAO.php';
$activite = new ActivityDAO(); 
$image = new ImageDAO();
$activities = $activite->loadActivity(0,0);

$smarty->display("header.tpl");
$smarty->assign("activities",$activities );
$smarty->display("events/index.tpl");
$smarty->display("footer.tpl");

?>
