
package org.neochess.core;

public class Move {

    private final Square fromSquare;
    private final Square toSquare;
    private final Piece promotionPiece;

    public Move(Square fromSquare, Square toSquare) {
        this.fromSquare = fromSquare;
        this.toSquare = toSquare;
        this.promotionPiece = null;
    }

    public Move(Square fromSquare, Square toSquare, Piece promotionPiece) {
        this.fromSquare = fromSquare;
        this.toSquare = toSquare;
        this.promotionPiece = promotionPiece;
    }

    public Square getFromSquare() {
        return fromSquare;
    }

    public Square getToSquare() {
        return toSquare;
    }

    public Piece getPromotionPiece() {
        return promotionPiece;
    }
}
