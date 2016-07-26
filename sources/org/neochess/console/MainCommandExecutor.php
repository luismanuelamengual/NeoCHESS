<?php

namespace org\neochess\console;

use NeoPHP\console\ConsoleListener;
use org\neochess\core\Board;
use org\neochess\utils\BoardUtils;

class MainCommandExecutor implements ConsoleListener
{
    public function onCommand($command, $parameters)
    {
        $board = new Board();
        $board->setInitialPosition();
        BoardUtils::printBoard($board);
    }
}