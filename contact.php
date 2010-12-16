<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

 require_once $_SERVER['DOCUMENT_ROOT'] . '/libs.inc.php';

$smarty->display("header.tpl");
$smarty->display("contact/index.tpl");
$smarty->display("footer.tpl");

?>
