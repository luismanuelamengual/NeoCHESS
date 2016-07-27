<?php

namespace org\neochess\console;

use NeoPHP\console\ConsoleApplication;
use NeoPHP\console\ConsoleCommandExecutor;

class MainCommandExecutor extends ConsoleCommandExecutor
{
    public function onCommandEntered(ConsoleApplication $application, $command, array $parameters = array())
    {
        switch ($command)
        {
            case "exit":
                $application->stop();
                break;
        }
    }
}