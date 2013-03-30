<?php
require_once ("/var/www/NeoPHP/app/App.php");
App::getInstance()->getPreferences()->title = "NeoCHESS";
App::getInstance()->start();
?>
