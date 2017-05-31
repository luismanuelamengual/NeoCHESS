
package org.neochess.core;

public class BoardHistorySlot {

    private Move move;
    private Piece movingPiece;
    private Piece capturedPiece;
    private Square epSquare;
    private int castleState;

    public Move getMove() {
        return move;
    }

    public void setMove(Move move) {
        this.move = move;
    }

    public Piece getMovingPiece() {
        return movingPiece;
    }

    public void setMovingPiece(Piece movingPiece) {
        this.movingPiece = movingPiece;
    }

    public Piece getCapturedPiece() {
        return capturedPiece;
    }

    public void setCapturedPiece(Piece capturedPiece) {
        this.capturedPiece = capturedPiece;
    }

    public Square getEpSquare() {
        return epSquare;
    }

    public void setEpSquare(Square epSquare) {
        this.epSquare = epSquare;
    }

    public int getCastleState() {
        return castleState;
    }

    public void setCastleState(int castleState) {
        this.castleState = castleState;
    }
}
