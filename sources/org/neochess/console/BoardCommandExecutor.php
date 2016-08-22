<?php

namespace org\neochess\console;

use NeoPHP\console\ConsoleApplication;
use NeoPHP\console\ConsoleCommandExecutor;
use org\neochess\core\Board;
use org\neochess\core\Move;

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
                $this->printBoard();
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
            $fromSquare = Board::getSquareFromString(substr($moveString, 0, 2));
            $toSquare = Board::getSquareFromString(substr($moveString, 2));
            $move = new Move($fromSquare, $toSquare);
            if ($this->board->isMoveLegal($move))
                $this->board->makeMove($move);
        }
    }
    
    private function unmakeMove ()
    {
        $this->board->unmakeMove();
    }
    
    private function printMoves ()
    {
        $moves = $this->board->getLegalMoves();
        foreach ($moves as $move) 
        {
            echo Board::getSquareString($move->getFromSquare()) . Board::getSquareString($move->getToSquare()) . " ";
        }
        echo "\n";
    }
    
    private function printBoard ()
    {        
        print "  .---.---.---.---.---.---.---.---.\n";
        for ($rank = Board::RANK_8; $rank >= Board::RANK_1; $rank--)
        {
            $printRank = $this->flipped? (7 - $rank) : $rank;
            print Board::getRankString($printRank);
            print " ";
            print "|";
            for ($file = Board::FILE_A; $file <= Board::FILE_H; $file++)
            {
                $printFile = $this->flipped? (7 - $file) : $file;
                $square = Board::getSquare($printFile, $printRank);
                $piece = $this->board->getPiece($square);
                print " ";
                print Board::getPieceString($piece);
                print " ";                
                print "|";
            }
            print "\n";
            print "  .---.---.---.---.---.---.---.---.\n";
        }
        
        print " ";
        for ($file = Board::FILE_A; $file <= Board::FILE_H; $file++)
        {
            $printFile = $this->flipped? (7 - $file) : $file;
            print "   ";
            print Board::getFileString($printFile);
        }
        print "\n";
    }
}