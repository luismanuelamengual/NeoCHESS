<?php

namespace org\neochess\console;

use NeoPHP\console\ConsoleApplication;
use NeoPHP\console\ConsoleCommandExecutor;
use org\neochess\core\Board;
use org\neochess\core\Move;
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
            case "move":
                $moveString = $parameters[0];
                $fromSquare = BoardUtils::getSquareFromString(substr($moveString, 0, 2));
                $toSquare = BoardUtils::getSquareFromString(substr($moveString, 2));
                $move = new Move($fromSquare, $toSquare);
                $this->board->makeMove($move);
                break;
            case "gen":
                $moves = $this->board->getPseudoLegalMoves();
                foreach ($moves as $move) 
                {
                    echo BoardUtils::getSquareString($move->getFromSquare()) . BoardUtils::getSquareString($move->getToSquare()) . " ";
                }
                echo "\n";
                break;
        }
    }
}