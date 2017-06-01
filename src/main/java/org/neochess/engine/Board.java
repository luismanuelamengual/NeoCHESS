
package org.neochess.engine;

public class Board {

    public static final int NOSIDE = -1;
    public static final int WHITE = 0;
    public static final int BLACK = 1;

    public static final int EMPTY = -1;

    public static final int PAWN = 0;
    public static final int KNIGHT = 1;
    public static final int BISHOP = 2;
    public static final int ROOK = 3;
    public static final int QUEEN = 4;
    public static final int KING = 5;

    public static final int WHITE_PAWN = 0;
    public static final int WHITE_KNIGHT = 1;
    public static final int WHITE_BISHOP = 2;
    public static final int WHITE_ROOK = 3;
    public static final int WHITE_QUEEN = 4;
    public static final int WHITE_KING = 5;
    public static final int BLACK_PAWN = 6;
    public static final int BLACK_KNIGHT = 7;
    public static final int BLACK_BISHOP = 8;
    public static final int BLACK_ROOK = 9;
    public static final int BLACK_QUEEN = 10;
    public static final int BLACK_KING = 11;

    public static final int INVALIDSQUARE = -1;
    public static final int A1 = 0;
    public static final int B1 = 1;
    public static final int C1 = 2;
    public static final int D1 = 3;
    public static final int E1 = 4;
    public static final int F1 = 5;
    public static final int G1 = 6;
    public static final int H1 = 7;
    public static final int A2 = 8;
    public static final int B2 = 9;
    public static final int C2 = 10;
    public static final int D2 = 11;
    public static final int E2 = 12;
    public static final int F2 = 13;
    public static final int G2 = 14;
    public static final int H2 = 15;
    public static final int A3 = 16;
    public static final int B3 = 17;
    public static final int C3 = 18;
    public static final int D3 = 19;
    public static final int E3 = 20;
    public static final int F3 = 21;
    public static final int G3 = 22;
    public static final int H3 = 23;
    public static final int A4 = 24;
    public static final int B4 = 25;
    public static final int C4 = 26;
    public static final int D4 = 27;
    public static final int E4 = 28;
    public static final int F4 = 29;
    public static final int G4 = 30;
    public static final int H4 = 31;
    public static final int A5 = 32;
    public static final int B5 = 33;
    public static final int C5 = 34;
    public static final int D5 = 35;
    public static final int E5 = 36;
    public static final int F5 = 37;
    public static final int G5 = 38;
    public static final int H5 = 39;
    public static final int A6 = 40;
    public static final int B6 = 41;
    public static final int C6 = 42;
    public static final int D6 = 43;
    public static final int E6 = 44;
    public static final int F6 = 45;
    public static final int G6 = 46;
    public static final int H6 = 47;
    public static final int A7 = 48;
    public static final int B7 = 49;
    public static final int C7 = 50;
    public static final int D7 = 51;
    public static final int E7 = 52;
    public static final int F7 = 53;
    public static final int G7 = 54;
    public static final int H7 = 55;
    public static final int A8 = 56;
    public static final int B8 = 57;
    public static final int C8 = 58;
    public static final int D8 = 59;
    public static final int E8 = 60;
    public static final int F8 = 61;
    public static final int G8 = 62;
    public static final int H8 = 63;

    public static final int FILE_A = 0;
    public static final int FILE_B = 1;
    public static final int FILE_C = 2;
    public static final int FILE_D = 3;
    public static final int FILE_E = 4;
    public static final int FILE_F = 5;
    public static final int FILE_G = 6;
    public static final int FILE_H = 7;

    public static final int RANK_1 = 0;
    public static final int RANK_2 = 1;
    public static final int RANK_3 = 2;
    public static final int RANK_4 = 3;
    public static final int RANK_5 = 4;
    public static final int RANK_6 = 5;
    public static final int RANK_7 = 6;
    public static final int RANK_8 = 7;

    public static final int NOCASTLE = 0;
    public static final int WHITE_CASTLE_SHORT = 1;
    public static final int WHITE_CASTLE_LONG = 2;
    public static final int BLACK_CASTLE_SHORT = 4;
    public static final int BLACK_CASTLE_LONG = 8;

    private static final int MOVE_FROM_SQUARE_OFFSET = 0;
    private static final int MOVE_TO_SQUARE_OFFSET = 6;
    private static final int MOVE_PROMOTION_PIECE_OFFSET = 12;
    private static final int MOVE_CAPTURED_PIECE_OFFSET = 16;
    private static final int MOVE_EP_SQUARE_OFFSET = 20;
    private static final int MOVE_CASTLE_STATE_OFFSET = 26;

    private static final int MOVE_FROM_SQUARE_MASK = 63;
    private static final int MOVE_TO_SQUARE_MASK = 63;
    private static final int MOVE_PROMOTION_PIECE_MASK = 31;
    private static final int MOVE_CAPTURED_PIECE_MASK = 31;
    private static final int MOVE_EP_SQUARE_MASK = 63;
    private static final int MOVE_CASTLE_STATE_MASK = 31;

    private static int[] mailbox = {
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
    };

    private static int[] mailbox64 = {
        91, 92, 93, 94, 95, 96, 97, 98,
        81, 82, 83, 84, 85, 86, 87, 88,
        71, 72, 73, 74, 75, 76, 77, 78,
        61, 62, 63, 64, 65, 66, 67, 68,
        51, 52, 53, 54, 55, 56, 57, 58,
        41, 42, 43, 44, 45, 46, 47, 48,
        31, 32, 33, 34, 35, 36, 37, 38,
        21, 22, 23, 24, 25, 26, 27, 28
    };

    private static int[] castleMask = {
        13, 15, 15, 15, 12, 15, 15, 14,
        15, 15, 15, 15, 15, 15, 15, 15,
        15, 15, 15, 15, 15, 15, 15, 15,
        15, 15, 15, 15, 15, 15, 15, 15,
        15, 15, 15, 15, 15, 15, 15, 15,
        15, 15, 15, 15, 15, 15, 15, 15,
        15, 15, 15, 15, 15, 15, 15, 15,
         7, 15, 15, 15,  3, 15, 15, 11
    };

    private int[] squares;
    private int epSquare;
    private int castleState;
    private int sideToMove;

    public Board() {
        squares = new int[64];
    }

    public int getPiece(int square) {
        return squares[square];
    }

    public void putPiece(int square, int piece) {
        squares[square] = piece;
    }

    public void removePiece (int square) {
        squares[square] = EMPTY;
    }

    public int getEpSquare() {
        return epSquare;
    }

    public void setEpSquare(int epSquare) {
        this.epSquare = epSquare;
    }

    public int getCastleState() {
        return castleState;
    }

    public void setCastleState(int castleState) {
        this.castleState = castleState;
    }

    public int getSideToMove() {
        return sideToMove;
    }

    public void setSideToMove(int sideToMove) {
        this.sideToMove = sideToMove;
    }

    public void clear () {
        for (byte square = A1; square <= H8; square++) {
            removePiece(square);
        }
        epSquare = INVALIDSQUARE;
        castleState = 0;
        sideToMove = WHITE;
    }

    public void setInitialPosition () {
        clear();
        putPiece(A1, WHITE_ROOK);
        putPiece(H1, WHITE_ROOK);
        putPiece(B1, WHITE_KNIGHT);
        putPiece(G1, WHITE_KNIGHT);
        putPiece(C1, WHITE_BISHOP);
        putPiece(F1, WHITE_BISHOP);
        putPiece(D1, WHITE_QUEEN);
        putPiece(E1, WHITE_KING);
        putPiece(A2, WHITE_PAWN);
        putPiece(B2, WHITE_PAWN);
        putPiece(C2, WHITE_PAWN);
        putPiece(D2, WHITE_PAWN);
        putPiece(E2, WHITE_PAWN);
        putPiece(F2, WHITE_PAWN);
        putPiece(G2, WHITE_PAWN);
        putPiece(H2, WHITE_PAWN);
        putPiece(A8, BLACK_ROOK);
        putPiece(H8, BLACK_ROOK);
        putPiece(B8, BLACK_KNIGHT);
        putPiece(G8, BLACK_KNIGHT);
        putPiece(C8, BLACK_BISHOP);
        putPiece(F8, BLACK_BISHOP);
        putPiece(D8, BLACK_QUEEN);
        putPiece(E8, BLACK_KING);
        putPiece(A7, BLACK_PAWN);
        putPiece(B7, BLACK_PAWN);
        putPiece(C7, BLACK_PAWN);
        putPiece(D7, BLACK_PAWN);
        putPiece(E7, BLACK_PAWN);
        putPiece(F7, BLACK_PAWN);
        putPiece(G7, BLACK_PAWN);
        putPiece(H7, BLACK_PAWN);
        castleState = WHITE_CASTLE_LONG | WHITE_CASTLE_SHORT | BLACK_CASTLE_LONG | BLACK_CASTLE_SHORT;
        sideToMove = WHITE;
    }

    protected static int getSquare (int file, int rank)
    {
        return (rank * 8) + file;
    }

    protected static int getOffsetSquare (int square, int horizontalOffset, int verticalOffset) {
        return mailbox[mailbox64[square] - (verticalOffset * 10) + horizontalOffset];
    }

    protected static int getSquareFile (int square)
    {
        return square & 7;
    }

    protected static int getSquareRank (int square)
    {
        return square >> 3;
    }

    protected static int getPieceSide (int piece)
    {
        return (int)Math.floor(piece / 6);
    }

    protected static int getPieceFigure (int piece)
    {
        return piece % 6;
    }

    protected int makeMove (int move) {

        int fromSquare = (move >> MOVE_FROM_SQUARE_OFFSET) & MOVE_FROM_SQUARE_MASK;
        int toSquare = (move >> MOVE_TO_SQUARE_OFFSET) & MOVE_TO_SQUARE_MASK;
        int movingPiece = squares[fromSquare];
        int capturedPiece = squares[toSquare];

        int appliedMove = move;
        appliedMove |= (capturedPiece << MOVE_CAPTURED_PIECE_OFFSET);
        appliedMove |= (castleState << MOVE_CASTLE_STATE_OFFSET);
        appliedMove |= (epSquare << MOVE_EP_SQUARE_OFFSET);

        int movingFigure = getPieceFigure(movingPiece);
        if (movingFigure == PAWN) {

            if (sideToMove == WHITE) {
                if (toSquare == epSquare) {
                    removePiece(toSquare - 8);
                }
                else if (getSquareRank(toSquare) == RANK_8) {
                    int promotionPiece = (move >> MOVE_PROMOTION_PIECE_OFFSET) & MOVE_PROMOTION_PIECE_MASK;
                    movingPiece = promotionPiece != EMPTY ? promotionPiece : WHITE_QUEEN;
                }
                else if (getSquareRank(fromSquare) == RANK_2 && getSquareRank(toSquare) == RANK_4) {
                    epSquare = (fromSquare + toSquare) / 2;
                }
            }
            else {
                if (toSquare == epSquare) {
                    removePiece(toSquare + 8);
                }
                else if (getSquareRank(toSquare) == RANK_1) {
                    int promotionPiece = (move >> MOVE_PROMOTION_PIECE_OFFSET) & MOVE_PROMOTION_PIECE_MASK;
                    movingPiece = promotionPiece != EMPTY ? promotionPiece : BLACK_QUEEN;
                }
            }
            epSquare = (Math.abs(fromSquare - toSquare) == 16)? ((fromSquare + toSquare) / 2) : INVALIDSQUARE;
        }
        else {

            if (movingFigure == KING) {
                if (fromSquare == E1) {
                    switch (toSquare) {
                        case G1:
                            removePiece(H1);
                            putPiece(F1, WHITE_ROOK);
                            break;
                        case C1:
                            removePiece(A1);
                            putPiece(D1, WHITE_ROOK);
                            break;
                    }
                }
                else if (fromSquare == E8) {
                    switch (toSquare) {
                        case G8:
                            removePiece(H8);
                            putPiece(F8, BLACK_ROOK);
                            break;
                        case C8:
                            removePiece(A8);
                            putPiece(D8, BLACK_ROOK);
                            break;
                    }
                }
            }
            epSquare = INVALIDSQUARE;
        }

        removePiece(fromSquare);
        putPiece(toSquare, movingPiece);
        castleState &= castleMask[fromSquare] & castleMask[toSquare];
        sideToMove = 1 ^ sideToMove;
        return appliedMove;
    }
}
