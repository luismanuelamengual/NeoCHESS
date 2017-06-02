
package org.neochess.engine;

public class Move {

    private int fromSquare;
    private int toSquare;
    private int promotionPiece;

    public Move(int fromSquare, int toSquare) {
        this.fromSquare = fromSquare;
        this.toSquare = toSquare;
    }

    public Move(int fromSquare, int toSquare, int promotionPiece) {
        this.fromSquare = fromSquare;
        this.toSquare = toSquare;
        this.promotionPiece = promotionPiece;
    }

    public int getFromSquare() {
        return fromSquare;
    }

    public void setFromSquare(int fromSquare) {
        this.fromSquare = fromSquare;
    }

    public int getToSquare() {
        return toSquare;
    }

    public void setToSquare(int toSquare) {
        this.toSquare = toSquare;
    }

    public int getPromotionPiece() {
        return promotionPiece;
    }

    public void setPromotionPiece(int promotionPiece) {
        this.promotionPiece = promotionPiece;
    }
}
