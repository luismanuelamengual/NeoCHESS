<?php

namespace org\neochess\console;

use NeoPHP\console\ConsoleApplication;
use NeoPHP\console\ConsoleCommandExecutor;
use org\neochess\core\Board;
use org\neochess\utils\BoardUtils;

class BoardCommandExecutor extends ConsoleCommandExecutor
{
    private $board;
    
    public function __construct()
    {
        $this->board = new Board();
    }

    public function onCommandEntered(ConsoleApplication $application, $command, array $parameters = array())
    {
        switch ($command)
        {
            case "show":
                BoardUtils::printBoard($this->board);
                break;
            case "init":
                $this->board->setInitialPosition();
                break;
        }
    }
}