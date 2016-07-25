<?php

require_once ("../NeoPHP/autoload.php");

$app = new NeoPHP\console\ConsoleApplication(realpath("."));
$app->addConsoleListener(new org\neochess\console\MainCommandExecutor());
$app->start();