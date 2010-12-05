<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
header('Content-type: text/html; charset=utf-8');
require_once $_SERVER['DOCUMENT_ROOT'] . '/libs.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Admin/view/menu/index.php';
    $smarty->display("menu/menu.tpl");
require_once $_SERVER['DOCUMENT_ROOT'].'/Admin/view/menu/activities.php';
    $smarty->display("menu/activities.tpl");



?>