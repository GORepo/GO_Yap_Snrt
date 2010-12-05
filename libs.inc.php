<?php

$fixpath = $_SERVER['DOCUMENT_ROOT'];

define ("SMARTY_DIR", $_SERVER['DOCUMENT_ROOT']."/lib");

require_once (SMARTY_DIR."Smarty.class.php");
$smarty = new Smarty;
$smarty->compile_dir = "$fixpath/compile";
$smarty->template_dir = "$fixpath/html";




?>
