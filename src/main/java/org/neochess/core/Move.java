
package org.neochess.core;

public class Move {

    private Square fromSquare;
    private Square toSquare;
    private Piece promotionPiece;
    private Piece capturedPiece;
    private Square epSquare;
    private int castleState;

    public Move(Square fromSquare, Square toSquare) {
        this.fromSquare = fromSquare;
        this.toSquare = toSquare;
    }

    public Square getFromSquare() {
        return fromSquare;
    }

    public void setFromSquare(Square fromSquare) {
        this.fromSquare = fromSquare;
    }

    public Square getToSquare() {
        return toSquare;
    }

    public void setToSquare(Square toSquare) {
        this.toSquare = toSquare;
    }

    public Piece getPromotionPiece() {
        return promotionPiece;
    }

    public void setPromotionPiece(Piece promotionPiece) {
        this.promotionPiece = promotionPiece;
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

    @Override
    public String toString() {
        return fromSquare.toString() + toSquare.toString();
    }
}
