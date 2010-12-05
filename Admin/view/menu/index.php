<?php
$path="/Admin";

$mainMenu = array("Etkinlikler","Çıkış");
$mainMenuLink = array("$path/view/activities","$path/view/logout");
$smarty->assign ("menu", $mainMenu);
$smarty->assign ("menulink", $mainMenuLink);


?>
