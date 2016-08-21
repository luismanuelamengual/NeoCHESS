<?php

namespace org\neochess\core;

class Board
{
    const NULL = -1;
    
    const WHITE = 0;
    const BLACK = 1;
    
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
    
    private $sideToMove;
    private $squares;
    private $epSquare;
    private $castleState;
    private $historySlots;
    
    private static $mailbox = [
        -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 
        -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 
        -1, 56, 57, 58, 59, 60, 61, 62, 63, -1, 
        -1, 48, 49, 50, 51, 52, 53, 54, 55, -1, 
        -1, 40, 41, 42, 43, 44, 45, 46, 47, -1, 
        -1, 32, 33, 34, 35, 36, 37, 38, 39, -1, 
        -1, 24, 25, 26, 27, 28, 29, 30, 31, -1, 
        -1, 16, 17, 18, 19, 20, 21, 22, 23, -1, 
        -1,  8,  9, 10, 11, 12, 13, 14, 15, -1, 
        -1,  0,  1,  2,  3,  4,  5,  6,  7, -1, 
        -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 
        -1, -1, -1, -1, -1, -1, -1, -1, -1, -1 
    ];
    
    private static $mailbox64 = [
	91, 92, 93, 94, 95, 96, 97, 98,
        81, 82, 83, 84, 85, 86, 87, 88,
        71, 72, 73, 74, 75, 76, 77, 78,
        61, 62, 63, 64, 65, 66, 67, 68,
        51, 52, 53, 54, 55, 56, 57, 58,
        41, 42, 43, 44, 45, 46, 47, 48,
        31, 32, 33, 34, 35, 36, 37, 38,
        21, 22, 23, 24, 25, 26, 27, 28
    ];
    
    private static $slide = [false, false, true, true, true, false];
    private static $offsets = [
        [],
        [ -21, -19, -12,  -8,   8,  12,  19,  21 ],
        [ -11,  -9,   9,  11],
        [ -10,  -1,   1,  10],
        [ -11, -10,  -9,  -1,   1,   9,  10,  11 ],
        [ -11, -10,  -9,  -1,   1,   9,  10,  11 ]];
    
    private static $castleMask = [
        13, 15, 15, 15, 12, 15, 15, 14,
	15, 15, 15, 15, 15, 15, 15, 15,
	15, 15, 15, 15, 15, 15, 15, 15,
	15, 15, 15, 15, 15, 15, 15, 15,
	15, 15, 15, 15, 15, 15, 15, 15,
	15, 15, 15, 15, 15, 15, 15, 15,
	15, 15, 15, 15, 15, 15, 15, 15,
	 7, 15, 15, 15,  3, 15, 15, 11
    ];
    
    public function __construct ()
    {
        $this->clear();
    }
    
    public function setInitialPosition ()
    {
        $this->clear();
        $this->putPiece(self::A1, self::WHITE_ROOK);
        $this->putPiece(self::H1, self::WHITE_ROOK);
        $this->putPiece(self::B1, self::WHITE_KNIGHT);
        $this->putPiece(self::G1, self::WHITE_KNIGHT);
        $this->putPiece(self::C1, self::WHITE_BISHOP);
        $this->putPiece(self::F1, self::WHITE_BISHOP);
        $this->putPiece(self::D1, self::WHITE_QUEEN);
        $this->putPiece(self::E1, self::WHITE_KING);
        $this->putPiece(self::A2, self::WHITE_PAWN);
        $this->putPiece(self::B2, self::WHITE_PAWN);
        $this->putPiece(self::C2, self::WHITE_PAWN);
        $this->putPiece(self::D2, self::WHITE_PAWN);
        $this->putPiece(self::E2, self::WHITE_PAWN);
        $this->putPiece(self::F2, self::WHITE_PAWN);
        $this->putPiece(self::G2, self::WHITE_PAWN);
        $this->putPiece(self::H2, self::WHITE_PAWN);
        $this->putPiece(self::A8, self::BLACK_ROOK);
        $this->putPiece(self::H8, self::BLACK_ROOK);
        $this->putPiece(self::B8, self::BLACK_KNIGHT);
        $this->putPiece(self::G8, self::BLACK_KNIGHT);
        $this->putPiece(self::C8, self::BLACK_BISHOP);
        $this->putPiece(self::F8, self::BLACK_BISHOP);
        $this->putPiece(self::D8, self::BLACK_QUEEN);
        $this->putPiece(self::E8, self::BLACK_KING);
        $this->putPiece(self::A7, self::BLACK_PAWN);
        $this->putPiece(self::B7, self::BLACK_PAWN);
        $this->putPiece(self::C7, self::BLACK_PAWN);
        $this->putPiece(self::D7, self::BLACK_PAWN);
        $this->putPiece(self::E7, self::BLACK_PAWN);
        $this->putPiece(self::F7, self::BLACK_PAWN);
        $this->putPiece(self::G7, self::BLACK_PAWN);
        $this->putPiece(self::H7, self::BLACK_PAWN);
        $this->castleState = self::WHITE_CASTLE_LONG | self::WHITE_CASTLE_SHORT | self::BLACK_CASTLE_LONG | self::BLACK_CASTLE_SHORT;
        $this->sideToMove = self::WHITE;
    }
    
    public function clear ()
    {
        $this->squares = [];
        for ($square = self::A1; $square <= self::H8; $square++)
            $this->removePiece($square);
        $this->epSquare = self::NULL;
        $this->castleState = 0;
        $this->sideToMove = self::WHITE;
        $this->historySlots = [];
    }
    
    public function getPiece ($square)
    {
        return $this->squares[$square];
    }
    
    public function putPiece ($square, $piece)
    {
        $this->squares[$square] = $piece;
    }
    
    public function removePiece ($square)
    {
        $this->squares[$square] = self::NULL;
    }
    
    public function getEpSquare ()
    {
        return $this->epSquare;
    }
    
    public function setEpSquare ($square)
    {
        $this->epSquare = $square;
    }
    
    public function getSideToMove()
    {
        return $this->sideToMove;
    }

    public function setSideToMove($sideToMove)
    {
        $this->sideToMove = $sideToMove;
    }
    
    public function getCastleState()
    {
        return $this->castleState;
    }

    public function setCastleState($castleState)
    {
        $this->castleState = $castleState;
    }
    
    public static function getSquare ($file, $rank)
    {
        return ($rank * 8) + $file;
    }
    
    public static function getOffsetSquare ($square, $horizontalOffset, $verticalOffset)
    {
        return self::$mailbox[self::$mailbox64[$square] - ($verticalOffset * 10) + $horizontalOffset];
    }
    
    public static function getSquareFile ($square)
    {
        return $square & 7;
    }
    
    public static function getSquareRank ($square)
    {
        return $square >> 3;
    }
    
    private function getPieceSide ($piece)
    {
        return floor($piece / 6);
    }
    
    private function getPieceFigure ($piece)
    {
        return $piece % 6;
    }
    
    public function inCheck ($side=null)
    {
        $inCheck = false;
        if ($side === null)
            $side = $this->sideToMove;
        $sideKingPiece = $side == self::WHITE? self::WHITE_KING : self::BLACK_KING;
        for ($testSquare = self::A1; $testSquare <= self::H8; $testSquare++)
        {
            if ($this->squares[$testSquare] == $sideKingPiece)
            {
                $inCheck = $this->isSquareAttacked($testSquare, 1 ^ $side);
                break;
            }
        }
        return $inCheck;
    }
    
    public function isSquareAttacked ($square, $side)
    {
        for ($testSquare = self::A1; $testSquare <= self::H8; $testSquare++)
        {
            $piece = $this->squares[$testSquare];
            $pieceSide = $this->getPieceSide($piece);
            if ($side == $pieceSide)
            {
                $pieceFigure = $this->getPieceFigure($piece);
                if ($pieceFigure == self::PAWN)
                {
                    $pieceFile = self::getSquareFile($testSquare);
                    if ($side == self::WHITE) 
                    {
                        if ($pieceFile != self::FILE_A && $testSquare + 7 == $square) return true;
                        if ($pieceFile != self::FILE_H && $testSquare + 9 == $square) return true;
                    }
                    else 
                    {
                        if ($pieceFile != self::FILE_A && $testSquare - 9 == $square) return true;
                        if ($pieceFile != self::FILE_H && $testSquare - 7 == $square) return true;
                    }
                }
                else
                {
                    foreach (self::$offsets[$pieceFigure] as $offset)
                    {
                        $currentOffsetSquare = $testSquare;
                        while (true)
                        {
                            $currentOffsetSquare = self::$mailbox[self::$mailbox64[$currentOffsetSquare] + $offset];
                            if ($currentOffsetSquare == self::NULL)
                                break;
                            if ($currentOffsetSquare == $square)
                                return true;
                            if ($this->squares[$currentOffsetSquare] != self::NULL)
                                break;
                            if (!self::$slide[$pieceFigure])
                                break;
                        }
                    }
                }
            }
        }
	return false;
    }
    
    public function makeMove (Move $move)
    {
        $fromSquare = $move->getFromSquare();
        $toSquare = $move->getToSquare();
        $movingPiece = $this->squares[$fromSquare];
        $capturedPiece = $this->squares[$toSquare];
        
        $moveHistorySlot = new BoardHistorySlot($move);
        $moveHistorySlot->setMovingPiece($movingPiece);
        $moveHistorySlot->setCapturedPiece($capturedPiece);
        $moveHistorySlot->setCastleState($this->castleState);
        $moveHistorySlot->setEpSquare($this->epSquare);
        $this->historySlots[] = $moveHistorySlot;
        
        $movingFigure = $this->getPieceFigure($movingPiece);
        if ($movingFigure == self::PAWN)
        {
            if ($this->sideToMove == self::WHITE)
            {
                if ($toSquare == $this->epSquare)
                {
                    $this->removePiece($toSquare-8);
                }
                else if ($this->getSquareRank($toSquare) == self::RANK_8)
                {
                    $promotionPiece = $move->getPromotionPiece();
                    $movingPiece = $promotionPiece != self::NULL? $promotionPiece : self::WHITE_QUEEN;
                }
            }
            else
            {       
                if ($toSquare == $this->epSquare)
                {
                    $this->removePiece($toSquare+8);
                }
                else if ($this->getSquareRank($toSquare) == self::RANK_1)
                {
                    $promotionPiece = $move->getPromotionPiece();
                    $movingPiece = $promotionPiece != null? $promotionPiece : self::BLACK_QUEEN;
                }
            }
            $this->epSquare = (abs($fromSquare - $toSquare) == 16)? (($fromSquare + $toSquare) / 2) : self::NULL;
        }
        else
        {
            if ($movingFigure == self::KING)
            {
                if ($fromSquare == self::E1)
                {
                    switch ($toSquare)
                    {
                        case self::G1:
                            $this->removePiece(self::H1);
                            $this->putPiece(self::F1, self::WHITE_ROOK);
                            break;
                        case self::C1:
                            $this->removePiece(self::A1);
                            $this->putPiece(self::D1, self::WHITEROOK);
                            break;
                    }
                }
                else if ($fromSquare == self::E8)
                {
                    switch ($toSquare)
                    {
                        case self::G8:
                            $this->removePiece(self::H8);
                            $this->putPiece(self::F8, self::BLACKROOK);
                            break;
                        case self::C8:
                            $this->removePiece(self::A8);
                            $this->putPiece(self::D8, self::BLACK_ROOK);
                            break;
                    }
                }
            }
            $this->epSquare = self::NULL;
        }
        
        $this->removePiece($fromSquare);
        $this->putPiece($toSquare, $movingPiece);
        $this->castleState &= self::$castleMask[$fromSquare] & self::$castleMask[$toSquare];
        $this->sideToMove = 1 ^ $this->sideToMove;
    }
    
    public function unmakeMove ()
    {
        $lastHistorySlot = array_pop($this->historySlots);
        $fromSquare = $lastHistorySlot->getMove()->getFromSquare();
        $toSquare = $lastHistorySlot->getMove()->getToSquare();
        $movingPiece = $lastHistorySlot->getMovingPiece();
        $capturedPiece = $lastHistorySlot->getCapturedPiece();
        $movingFigure = $this->getPieceFigure($movingPiece);
        $movingSide = $this->getPieceSide($movingPiece);
        $lastCastleState = $lastHistorySlot->getCastleState();
        $lastEpSquare = $lastHistorySlot->getEpSquare();
        
        if ($movingFigure == self::PAWN)
        {
            if ($toSquare == $lastEpSquare)
            {
                if ($movingSide == self::WHITE)
                    $this->putPiece($toSquare-8, self::BLACK_PAWN);
                else
                    $this->putPiece($toSquare+8, self::WHITE_PAWN);
            }
        }
        else if ($movingFigure == self::KING)
        {
            if ($fromSquare == self::E1)
            {
                switch ($toSquare)
                {
                    case self::G1:
                        $this->removePiece(self::F1);
                        $this->putPiece(self::H1, self::WHITE_ROOK);
                        break;
                    case self::C1:
                        $this->removePiece(D1);
                        $this->putPiece(self::A1, self::WHITE_ROOK);
                        break;
                }
            }
            else if ($fromSquare == self::E8)
            {
                switch ($toSquare)
                {
                    case self::G8:
                        $this->removePiece(self::F8);
                        $this->putPiece(self::H8, self::BLACK_ROOK);
                        break;
                    case self::C8:
                        $this->removePiece(self::D8);
                        $this->putPiece(self::A8, self::BLACK_ROOK);
                        break;
                }
            }
        }
        if ($capturedPiece !== null)
            $this->putPiece($toSquare, $capturedPiece);
        else
            $this->removePiece($toSquare);
        $this->putPiece($fromSquare, $movingPiece);
        $this->epSquare = $lastEpSquare;
        $this->castleState = $lastCastleState;
        $this->sideToMove = 1 ^ $this->sideToMove;
    }
    
    public function isMoveLegal (Move $move)   
    {
        $isLegal = false;
        $legalMoves = $this->getLegalMoves();
        foreach ($legalMoves as $legalMove)
        {
            if ($move->getFromSquare() == $legalMove->getFromSquare() && $move->getToSquare() == $legalMove->getToSquare())
            {
                $isLegal = true;
                break;
            }
        }
        return $isLegal;
    }
    
    public function getLegalMoves ()
    {
        $sideToMove = $this->sideToMove;
        $moves = $this->getPseudoLegalMoves();
        for ($i = sizeof($moves) - 1; $i >= 0; $i--)
        {
            $move = $moves[$i];
            $this->makeMove($move);
            if ($this->inCheck($sideToMove))
                unset($moves[$i]);
            $this->unmakeMove();
        }
        return array_values($moves);
    }
    
    public function getPseudoLegalMoves ()
    {
        $oppositeSide = 1 ^ $this->sideToMove;
        $moves = [];
        for ($testSquare = self::A1; $testSquare <= self::H8; $testSquare++)
        {
            $piece = $this->squares[$testSquare];
            $pieceSide = $this->getPieceSide($piece);
            if ($this->sideToMove == $pieceSide)
            {
                $pieceFigure = $this->getPieceFigure($piece);
                if ($pieceFigure == self::PAWN)
                {
                    $pieceFile = self::getSquareFile($testSquare);
                    if ($this->sideToMove == self::WHITE) 
                    {
                        if ($pieceFile != self::FILE_A && $this->getPieceSide($this->squares[$testSquare + 7]) == self::BLACK) 
                            $moves[] = new Move($testSquare, $testSquare + 7);
                        if ($pieceFile != self::FILE_H && $this->getPieceSide($this->squares[$testSquare + 9]) == self::BLACK) 
                            $moves[] = new Move($testSquare, $testSquare + 9);
                        
                        if ($this->squares[$testSquare + 8] == self::NULL)
                        {
                            $moves[] = new Move($testSquare, $testSquare + 8);
                            if ($this->getSquareRank($testSquare) == self::RANK_2 && $this->squares[$testSquare + 16] == self::NULL)
                                $moves[] = new Move($testSquare, $testSquare + 16);
                        }
                    }
                    else 
                    {
                        if ($pieceFile != self::FILE_A && $this->getPieceSide($this->squares[$testSquare - 9]) == self::WHITE) 
                            $moves[] = new Move($testSquare, $testSquare - 9);
                        if ($pieceFile != self::FILE_H && $this->getPieceSide($this->squares[$testSquare - 7]) == self::WHITE) 
                            $moves[] = new Move($testSquare, $testSquare - 7);
                        
                        if ($this->squares[$testSquare - 8] == self::NULL)
                        {
                            $moves[] = new Move($testSquare, $testSquare - 8);
                            if ($this->getSquareRank($testSquare) == self::RANK_7 && $this->squares[$testSquare - 16] == self::NULL)
                                $moves[] = new Move($testSquare, $testSquare - 16);
                        }
                    }
                } 
                else
                {
                    foreach (self::$offsets[$pieceFigure] as $offset)
                    {
                        $currentOffsetSquare = $testSquare;
                        while (true)
                        {
                            $currentOffsetSquare = self::$mailbox[self::$mailbox64[$currentOffsetSquare] + $offset];
                            if ($currentOffsetSquare == self::NULL)
                                break;
                            
                            if ($this->squares[$currentOffsetSquare] != self::NULL)
                            {
                                if ($this->getPieceSide($this->squares[$currentOffsetSquare]) == $oppositeSide)
                                    $moves[] = new Move($testSquare, $currentOffsetSquare);
                                break;
                            }
                            $moves[] = new Move($testSquare, $currentOffsetSquare);
                            if (!self::$slide[$pieceFigure])
                                break;
                        }
                    }
                }
            }
        }
        
        if ($this->sideToMove == self::WHITE)
        {
            if ($this->castleState & self::WHITE_CASTLE_SHORT && $this->squares[self::F1] == self::NULL && $this->squares[self::G1] == self::NULL)
                $moves[] = new Move(self::E1, self::G1);
            if ($this->castleState & self::WHITE_CASTLE_LONG && $this->squares[self::D1] == self::NULL && $this->squares[self::C1] == self::NULL && $this->squares[self::B1] == self::NULL)
                $moves[] = new Move(self::E1, self::C1);
            
            if ($this->epSquare != self::NULL)
            {
                $epSquareFile = $this->getSquareFile($this->epSquare);
                if ($epSquareFile != self::FILE_A && $this->getPiece($this->epSquare - 9) == self::WHITE_PAWN)
                    $moves[] = new Move($this->epSquare - 9, $this->epSquare);
                if ($epSquareFile != self::FILE_H && $this->getPiece($this->epSquare - 7) == self::WHITE_PAWN)
                    $moves[] = new Move($this->epSquare - 7, $this->epSquare);
            }
        }
        else
        {
            if ($this->castleState & self::BLACK_CASTLE_SHORT && $this->squares[self::F8] == self::NULL && $this->squares[self::G8] == self::NULL)
                $moves[] = new Move(self::E8, self::G8);
            if ($this->castleState & self::BLACK_CASTLE_LONG && $this->squares[self::D8] == self::NULL && $this->squares[self::C8] == self::NULL && $this->squares[self::B8] == self::NULL)
                $moves[] = new Move(self::E8, self::C8);
            
            if ($this->epSquare != self::NULL)
            {
                $epSquareFile = $this->getSquareFile($this->epSquare);
                if ($epSquareFile != self::FILE_A && $this->getPiece($this->epSquare + 7) == self::BLACK_PAWN)
                    $moves[] = new Move($this->epSquare + 7, $this->epSquare);
                if ($epSquareFile != self::FILE_H && $this->getPiece($this->epSquare + 9) == self::BLACK_PAWN)
                    $moves[] = new Move($this->epSquare + 9, $this->epSquare);
            }
        }

        return $moves;
    }
}