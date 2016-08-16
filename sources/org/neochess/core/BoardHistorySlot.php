<?php

namespace org\neochess\core;

class BoardHistorySlot
{
    private $move;
    private $movingPiece;
    private $capturedPiece;
    private $epSquare;
    private $castleState;
    
    public function __construct(Move $move)
    {
        $this->move = $move;
    }
    
    public function getMovingPiece()
    {
        return $this->movingPiece;
    }

    public function setMovingPiece($movingPiece)
    {
        $this->movingPiece = $movingPiece;
    }

    public function getMove()
    {
        return $this->move;
    }

    public function getCapturedPiece()
    {
        return $this->capturedPiece;
    }

    public function getEpSquare()
    {
        return $this->epSquare;
    }

    public function getCastleState()
    {
        return $this->castleState;
    }

    public function setMove(Move $move)
    {
        $this->move = $move;
    }

    public function setCapturedPiece($capturedPiece)
    {
        $this->capturedPiece = $capturedPiece;
    }

    public function setEpSquare($epSquare)
    {
        $this->epSquare = $epSquare;
    }

    public function setCastleState($castleState)
    {
        $this->castleState = $castleState;
    }
}