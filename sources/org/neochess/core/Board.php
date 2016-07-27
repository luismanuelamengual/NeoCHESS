<?php

namespace org\neochess\core;

class Board
{
    const EMPTY_SQUARE = -1;
    
    const WHITE = 0;
    const BLACK = 6;
    
    const PAWN = 0;
    const KNIGHT = 1;
    const BISHOP = 2;
    const ROOK = 3;
    const QUEEN = 4;
    const KING = 5;
    
    const WHITE_PAWN = 0;
    const WHITE_KNIGHT = 1;
    const WHITE_BISHOP = 2;
    const WHITE_ROOK = 3;
    const WHITE_QUEEN = 4;
    const WHITE_KING = 5;
    const BLACK_PAWN = 6;
    const BLACK_KNIGHT = 7;
    const BLACK_BISHOP = 8;
    const BLACK_ROOK = 9;
    const BLACK_QUEEN = 10;
    const BLACK_KING = 11;
    
    const RANK_1 = 0;
    const RANK_2 = 1;
    const RANK_3 = 2;
    const RANK_4 = 3;
    const RANK_5 = 4;
    const RANK_6 = 5;
    const RANK_7 = 6;
    const RANK_8 = 7;
    
    const FILE_A = 0;
    const FILE_B = 1;
    const FILE_C = 2;
    const FILE_D = 3;
    const FILE_E = 4;
    const FILE_F = 5;
    const FILE_G = 6;
    const FILE_H = 7;
    
    const A1 = 0;
    const B1 = 1;
    const C1 = 2;
    const D1 = 3;
    const E1 = 4;
    const F1 = 5;
    const G1 = 6;
    const H1 = 7;
    const A2 = 8;
    const B2 = 9;
    const C2 = 10;
    const D2 = 11;
    const E2 = 12;
    const F2 = 13;
    const G2 = 14;
    const H2 = 15;
    const A3 = 16;
    const B3 = 17;
    const C3 = 18;
    const D3 = 19;
    const E3 = 20;
    const F3 = 21;
    const G3 = 22;
    const H3 = 23;
    const A4 = 24;
    const B4 = 25;
    const C4 = 26;
    const D4 = 27;
    const E4 = 28;
    const F4 = 29;
    const G4 = 30;
    const H4 = 31;
    const A5 = 32;
    const B5 = 33;
    const C5 = 34;
    const D5 = 35;
    const E5 = 36;
    const F5 = 37;
    const G5 = 38;
    const H5 = 39;
    const A6 = 40;
    const B6 = 41;
    const C6 = 42;
    const D6 = 43;
    const E6 = 44;
    const F6 = 45;
    const G6 = 46;
    const H6 = 47;
    const A7 = 48;
    const B7 = 49;
    const C7 = 50;
    const D7 = 51;
    const E7 = 52;
    const F7 = 53;
    const G7 = 54;
    const H7 = 55; 
    const A8 = 56;
    const B8 = 57;
    const C8 = 58;
    const D8 = 59;
    const E8 = 60;
    const F8 = 61;
    const G8 = 62;
    const H8 = 63;
    
    const WHITE_CASTLE_SHORT = 1;
    const WHITE_CASTLE_LONG = 2;
    const BLACK_CASTLE_SHORT = 4;
    const BLACK_CASTLE_LONG = 8;
    
    private static $squareOffset = [
        -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
        -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
        -1, -1, 56, 57, 58, 59, 60, 61, 62, 63, -1, -1,
        -1, -1, 48, 49, 50, 51, 52, 53, 54, 55, -1, -1,
        -1, -1, 40, 41, 42, 43, 44, 45, 46, 47, -1, -1,
        -1, -1, 32, 33, 34, 35, 36, 37, 38, 39, -1, -1,
        -1, -1, 24, 25, 26, 27, 28, 29, 30, 31, -1, -1,
        -1, -1, 16, 17, 18, 19, 20, 21, 22, 23, -1, -1,
        -1, -1,  8,  9, 10, 11, 12, 13, 14, 15, -1, -1,
        -1, -1,  0,  1,  2,  3,  4,  5,  6,  7, -1, -1,
        -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
        -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1
    ];
    
    private $squares;
    private $epSquare;
    private $castleState;
    
    public static function getSquare ($file, $rank)
    {
        return ($rank * 8) + $file;
    }
    
    public static function getOffsetSquare ($square, $horizontalOffset, $verticalOffset)
    {
        return self::$squareOffset[($square + 26) + ($verticalOffset * 8) + $horizontalOffset];
    }
    
    public function __construct ()
    {
        $this->clear();
    }
    
    public function setInitialPosition ()
    {
        $this->clear();
        $this->setPiece(self::A1, self::WHITE_ROOK);
        $this->setPiece(self::H1, self::WHITE_ROOK);
        $this->setPiece(self::B1, self::WHITE_KNIGHT);
        $this->setPiece(self::G1, self::WHITE_KNIGHT);
        $this->setPiece(self::C1, self::WHITE_BISHOP);
        $this->setPiece(self::F1, self::WHITE_BISHOP);
        $this->setPiece(self::D1, self::WHITE_QUEEN);
        $this->setPiece(self::E1, self::WHITE_KING);
        $this->setPiece(self::A2, self::WHITE_PAWN);
        $this->setPiece(self::B2, self::WHITE_PAWN);
        $this->setPiece(self::C2, self::WHITE_PAWN);
        $this->setPiece(self::D2, self::WHITE_PAWN);
        $this->setPiece(self::E2, self::WHITE_PAWN);
        $this->setPiece(self::F2, self::WHITE_PAWN);
        $this->setPiece(self::G2, self::WHITE_PAWN);
        $this->setPiece(self::H2, self::WHITE_PAWN);
        $this->setPiece(self::A8, self::BLACK_ROOK);
        $this->setPiece(self::H8, self::BLACK_ROOK);
        $this->setPiece(self::B8, self::BLACK_KNIGHT);
        $this->setPiece(self::G8, self::BLACK_KNIGHT);
        $this->setPiece(self::C8, self::BLACK_BISHOP);
        $this->setPiece(self::F8, self::BLACK_BISHOP);
        $this->setPiece(self::D8, self::BLACK_QUEEN);
        $this->setPiece(self::E8, self::BLACK_KING);
        $this->setPiece(self::A7, self::BLACK_PAWN);
        $this->setPiece(self::B7, self::BLACK_PAWN);
        $this->setPiece(self::C7, self::BLACK_PAWN);
        $this->setPiece(self::D7, self::BLACK_PAWN);
        $this->setPiece(self::E7, self::BLACK_PAWN);
        $this->setPiece(self::F7, self::BLACK_PAWN);
        $this->setPiece(self::G7, self::BLACK_PAWN);
        $this->setPiece(self::H7, self::BLACK_PAWN);
        $this->castleState = self::WHITE_CASTLE_SHORT | self::WHITE_CASTLE_LONG | self::BLACK_CASTLE_SHORT | self::BLACK_CASTLE_LONG;
    }
    
    public function clear ()
    {
        $this->squares = [];
        for ($square = self::A1; $square <= self::H8; $square++)
            $this->squares[$square] = self::EMPTY_SQUARE;
        $this->epSquare = -1;
        $this->castleState = 0;
    }
    
    public function getPiece ($square)
    {
        return $this->squares[$square];
    }
    
    public function setPiece ($square, $piece)
    {
        $this->squares[$square] = $piece;
    }
    
    public function getEpSquare ()
    {
        return $this->epSquare;
    }
    
    public function setEpSquare ($square)
    {
        $this->epSquare = $square;
    }
    
    public function getCastleState()
    {
        return $this->castleState;
    }

    public function setCastleState($castleState)
    {
        $this->castleState = $castleState;
    }
}