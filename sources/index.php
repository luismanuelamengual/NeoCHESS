<?php
require_once ("NeoPHP/App.php");
App::getInstance()->getPreferences()->title = "NEOCHESS";
App::getInstance()->setRestfull(true);
App::getInstance()->start();
?>
