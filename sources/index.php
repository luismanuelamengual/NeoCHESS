<?php
require_once ("/var/www/NeoPHP/app/App.php");
App::getInstance()->getPreferences()->title = "NEOCHESS";
App::getInstance()->start();
?>
