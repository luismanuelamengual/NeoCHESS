<?php

namespace org\neochess\utils;

use org\neochess\core\Board;

abstract class BoardUtils
{
    public static function printBoard (Board $board, $flipped=false)
    {        
        print "  .---.---.---.---.---.---.---.---.\n";
        for ($rank = Board::RANK_8; $rank >= Board::RANK_1; $rank--)
        {
            $printRank = $flipped? (7 - $rank) : $rank;
            print self::getRankString($printRank);
            print " ";
            print "|";
            for ($file = Board::FILE_A; $file <= Board::FILE_H; $file++)
            {
                $printFile = $flipped? (7 - $file) : $file;
                $square = Board::getSquare($printFile, $printRank);
                $piece = $board->getPiece($square);
                print " ";
                print self::getPieceString($piece);
                print " ";                
                print "|";
            }
            print "\n";
            print "  .---.---.---.---.---.---.---.---.\n";
        }
        
        print " ";
        for ($file = Board::FILE_A; $file <= Board::FILE_H; $file++)
        {
            $printFile = $flipped? (7 - $file) : $file;
            print "   ";
            print self::getFileString($printFile);
        }
        print "\n";
    }
    
    public static function getRankFromString ($rankString)
    {
        return intval($rankString) - 1;
    }
    
    public static function getFileFromString ($fileString)
    {
        return ord($fileString) - 97;
    }
    
    public static function getSquareFromString ($squareString)
    {
        $file = self::getFileFromString($squareString{0});
        $rank = self::getRankFromString($squareString{1});
        return Board::getSquare($file, $rank);
    }
    
    public static function getRankString ($rank)
    {
        return $rank + 1;
    }
    
    public static function getFileString ($file)
    {
        $fileString = "";
        switch ($file)
        {
            case Board::FILE_A: $fileString = "A"; break;
            case Board::FILE_B: $fileString = "B"; break;
            case Board::FILE_C: $fileString = "C"; break;
            case Board::FILE_D: $fileString = "D"; break;
            case Board::FILE_E: $fileString = "E"; break;
            case Board::FILE_F: $fileString = "F"; break;
            case Board::FILE_G: $fileString = "G"; break;
            case Board::FILE_H: $fileString = "H"; break;
        }
        return $fileString;
    }
    
    public static function getPieceString ($piece)
    {
        $pieceString = "";
        switch ($piece)
        {
            case Board::WHITE_PAWN: $pieceString = "P"; break;
            case Board::WHITE_KNIGHT : $pieceString = "N"; break;
            case Board::WHITE_BISHOP: $pieceString = "B"; break;
            case Board::WHITE_ROOK: $pieceString = "R"; break;
            case Board::WHITE_QUEEN: $pieceString = "Q"; break;
            case Board::WHITE_KING: $pieceString = "K"; break;
            case Board::BLACK_PAWN: $pieceString = "p"; break;
            case Board::BLACK_KNIGHT : $pieceString = "n"; break;
            case Board::BLACK_BISHOP: $pieceString = "b"; break;
            case Board::BLACK_ROOK: $pieceString = "r"; break;
            case Board::BLACK_QUEEN: $pieceString = "q"; break;
            case Board::BLACK_KING: $pieceString = "k"; break;
            default: $pieceString = " "; break;
        }
        return $pieceString;
    }
}