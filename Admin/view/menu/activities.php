<?php
$path="/Admin";

$mainMenu = array("Etkinlik Listesi","Yeni Etkinlik");
$mainMenuLink = array("$path/view/activities?mod=list","$path/view/activities?mod=new");
$smarty->assign ("menu", $mainMenu);
$smarty->assign ("menulink", $mainMenuLink);


?>