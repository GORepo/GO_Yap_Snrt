<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/libs.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/DAO/AccountDAO.php';
$accountDAO = new AccountDAO();
header('Content-type: text/html; charset=utf-8');
if ($_SESSION['role'] != 'admin') {
    $accountDAO = new AccountDAO();
    if (isset($_POST['username']) || isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $accountDAO->getUserWithUsernamePassword($username,$password);
    }
    $smarty->display("login/admin_index.tpl");
} else {
    require_once $_SERVER['DOCUMENT_ROOT'].'/Admin/view/menu/index.php';
    $smarty->display("menu/menu.tpl");
}
?>
