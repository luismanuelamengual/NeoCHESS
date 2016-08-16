<?php

namespace org\neochess\core;

class Move
{
    private $fromSquare;
    private $toSquare;
    private $promotionPiece;
    
    public function __construct($fromSquare, $toSquare)
    {
        $this->fromSquare = $fromSquare;
        $this->toSquare = $toSquare;
    }

    public function getFromSquare()
    {
        return $this->fromSquare;
    }

    public function getToSquare()
    {
        return $this->toSquare;
    }

    public function setFromSquare($fromSquare)
    {
        $this->fromSquare = $fromSquare;
    }

    public function setToSquare($toSquare)
    {
        $this->toSquare = $toSquare;
    }
    
    public function getPromotionPiece()
    {
        return $this->promotionPiece;
    }

    public function setPromotionPiece($promotionPiece)
    {
        $this->promotionPiece = $promotionPiece;
    }
}