<?php
require_once ("NeoPHP/App.php");
App::getInstance()->getSettings()->title = "NEOCHESS";
App::getInstance()->handleRequest();

?>
