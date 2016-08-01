<?php

require_once ("../NeoPHP/autoload.php");

$app = new NeoPHP\console\ConsoleApplication(realpath("."));
$app->registerCommandExecutor(new org\neochess\console\MainCommandExecutor());
$app->registerCommandExecutor(new org\neochess\console\BoardCommandExecutor());
$app->start();
