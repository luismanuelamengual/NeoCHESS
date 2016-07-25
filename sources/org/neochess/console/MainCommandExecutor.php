<?php

namespace org\neochess\console;

use NeoPHP\console\ConsoleListener;

class MainCommandExecutor implements ConsoleListener
{
    public function onCommand($command, $parameters)
    {
        echo "se ejecuto: $command";
    }
}