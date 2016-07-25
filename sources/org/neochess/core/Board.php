<?php

namespace org\neochess\core;

class Board
{
    const WHITE = 1;
    const BLACK = -1;
    
    const PAWN = 1;
    const KNIGHT = 2;
    const BISHOP = 3;
    const ROOK = 4;
    const QUEEN = 5;
    const KING = 6;
    
    const WHITE_PAWN = 1;
    const WHITE_KNIGHT = 2;
    const WHITE_BISHOP = 3;
    const WHITE_ROOK = 4;
    const WHITE_QUEEN = 5;
    const WHITE_KING = 6;
    const BLACK_PAWN = -1;
    const BLACK_KNIGHT = -2;
    const BLACK_BISHOP = -3;
    const BLACK_ROOK = -4;
    const BLACK_QUEEN = -5;
    const BLACK_KING = -6;
    
    const A8 = 0;
    const B8 = 1;
    const C8 = 2;
    const D8 = 3;
    const E8 = 4;
    const F8 = 5;
    const G8 = 6;
    const H8 = 7;
    const A7 = 8;
    const B7 = 9;
    const C7 = 10;
    const D7 = 11;
    const E7 = 12;
    const F7 = 13;
    const G7 = 14;
    const H7 = 15;
    const A6 = 16;
    const B6 = 17;
    const C6 = 18;
    const D6 = 19;
    const E6 = 20;
    const F6 = 21;
    const G6 = 22;
    const H6 = 23;
    const A5 = 24;
    const B5 = 25;
    const C5 = 26;
    const D5 = 27;
    const E5 = 28;
    const F5 = 29;
    const G5 = 30;
    const H5 = 31;
    const A4 = 32;
    const B4 = 33;
    const C4 = 34;
    const D4 = 35;
    const E4 = 36;
    const F4 = 37;
    const G4 = 38;
    const H4 = 39;
    const A3 = 40;
    const B3 = 41;
    const C3 = 42;
    const D3 = 43;
    const E3 = 44;
    const F3 = 45;
    const G3 = 46;
    const H3 = 47;
    const A2 = 48;
    const B2 = 49;
    const C2 = 50;
    const D2 = 51;
    const E2 = 52;
    const F2 = 53;
    const G2 = 54;
    const H2 = 55; 
    const A1 = 56;
    const B1 = 57;
    const C1 = 58;
    const D1 = 59;
    const E1 = 60;
    const F1 = 61;
    const G1 = 62;
    const H1 = 63;
    
    const WHITE_CASTLE_SHORT = 1;
    const WHITE_CASTLE_LONG = 2;
    const BLACK_CASTLE_SHORT = 4;
    const BLACK_CASTLE_LONG = 8;
    
    private $squares;
    private $epSquare;
    private $castleState;
    
    public function __construct ()
    {
        $this->squares = [];
        $this->epSquare = -1;
        $this->castleState = 0;
    }
    
    public function getSquare ($square)
    {
        return $this->squares[$square];
    }
}