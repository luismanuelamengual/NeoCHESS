package org.neochess.core;

public enum Side {
    WHITE,
    BLACK;

    public static Side getOppositeSide (Side side) {
        return side == WHITE? BLACK : WHITE;
    }
}
