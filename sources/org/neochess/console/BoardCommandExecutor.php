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
    private $flipped = false;
    
    public function __construct()
    {
        $this->board = new Board();
    }

    public function onCommandEntered(ConsoleApplication $application, $command, array $parameters = array())
    {
        switch ($command)
        {
            case "show":
                BoardUtils::printBoard($this->board, $this->flipped);
                break;
            case "init":
                $this->board->setInitialPosition();
                break;
            case "flip":
                $this->flipped = !$this->flipped;
                break;
            case "move":
                $this->makeMove($parameters[0]);
                break;
            case "takeback":
                $this->unmakeMove();
                break;
            case "gen":
                $this->printMoves();
                break;
            default:
                $this->makeMove($command);
                break;
        }
    }
    
    private function makeMove ($moveString)
    {
        if (preg_match("/[a-h][1-8][a-h][1-8]/", $moveString)) 
        {
            $fromSquare = BoardUtils::getSquareFromString(substr($moveString, 0, 2));
            $toSquare = BoardUtils::getSquareFromString(substr($moveString, 2));
            $move = new Move($fromSquare, $toSquare);
            $this->board->makeMove($move);
        }
    }
    
    private function unmakeMove ()
    {
        $this->board->unmakeMove();
    }
    
    private function printMoves ()
    {
        $moves = $this->board->getPseudoLegalMoves();
        foreach ($moves as $move) 
        {
            echo BoardUtils::getSquareString($move->getFromSquare()) . BoardUtils::getSquareString($move->getToSquare()) . " ";
        }
        echo "\n";
    }
}