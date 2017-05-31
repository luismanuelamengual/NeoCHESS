
package org.neochess.core;

public class Board {

    public static final int WHITE_CASTLE_SHORT = 1;
    public static final int WHITE_CASTLE_LONG = 2;
    public static final int BLACK_CASTLE_SHORT = 4;
    public static final int BLACK_CASTLE_LONG = 8;

    private final Piece[] squares;
    private Side sideToMove;
    private Square epSquare;
    private int castleState;

    public Board() {
        this.squares = new Piece[64];
    }

    public Piece getPiece (Square square)
    {
        return squares[square.ordinal()];
    }

    public void putPiece (Square square, Piece piece)
    {
        squares[square.ordinal()] = piece;
    }

    public void removePiece (Square square)
    {
        squares[square.ordinal()] = null;
    }

    public Square getEpSquare() {
        return epSquare;
    }

    public void setEpSquare(Square epSquare) {
        this.epSquare = epSquare;
    }

    public Side getSideToMove() {
        return sideToMove;
    }

    public void setSideToMove(Side sideToMove) {
        this.sideToMove = sideToMove;
    }

    public int getCastleState() {
        return castleState;
    }

    public void setCastleState(int castleState) {
        this.castleState = castleState;
    }

    public void clear ()
    {
        for (Square square : Square.values()) {
            removePiece(square);
        }
        setEpSquare(null);
        setCastleState(0);
        setSideToMove(Side.WHITE);
    }

    public void setInitialPosition () {
        clear();
        putPiece(Square.a1, Piece.WHITE_ROOK);
        putPiece(Square.h1, Piece.WHITE_ROOK);
        putPiece(Square.b1, Piece.WHITE_KNIGHT);
        putPiece(Square.g1, Piece.WHITE_KNIGHT);
        putPiece(Square.c1, Piece.WHITE_BISHOP);
        putPiece(Square.f1, Piece.WHITE_BISHOP);
        putPiece(Square.d1, Piece.WHITE_QUEEN);
        putPiece(Square.e1, Piece.WHITE_KING);
        putPiece(Square.a2, Piece.WHITE_PAWN);
        putPiece(Square.b2, Piece.WHITE_PAWN);
        putPiece(Square.c2, Piece.WHITE_PAWN);
        putPiece(Square.d2, Piece.WHITE_PAWN);
        putPiece(Square.e2, Piece.WHITE_PAWN);
        putPiece(Square.f2, Piece.WHITE_PAWN);
        putPiece(Square.g2, Piece.WHITE_PAWN);
        putPiece(Square.h2, Piece.WHITE_PAWN);
        putPiece(Square.a8, Piece.BLACK_ROOK);
        putPiece(Square.h8, Piece.BLACK_ROOK);
        putPiece(Square.b8, Piece.BLACK_KNIGHT);
        putPiece(Square.g8, Piece.BLACK_KNIGHT);
        putPiece(Square.c8, Piece.BLACK_BISHOP);
        putPiece(Square.f8, Piece.BLACK_BISHOP);
        putPiece(Square.d8, Piece.BLACK_QUEEN);
        putPiece(Square.e8, Piece.BLACK_KING);
        putPiece(Square.a7, Piece.BLACK_PAWN);
        putPiece(Square.b7, Piece.BLACK_PAWN);
        putPiece(Square.c7, Piece.BLACK_PAWN);
        putPiece(Square.d7, Piece.BLACK_PAWN);
        putPiece(Square.e7, Piece.BLACK_PAWN);
        putPiece(Square.f7, Piece.BLACK_PAWN);
        putPiece(Square.g7, Piece.BLACK_PAWN);
        putPiece(Square.h7, Piece.BLACK_PAWN);
        setCastleState(WHITE_CASTLE_LONG | WHITE_CASTLE_SHORT | BLACK_CASTLE_LONG | BLACK_CASTLE_SHORT);
        setSideToMove(Side.WHITE);
    }

    public void setFenPosition (String fen)
    {
        clear();
        byte i,s;
        char c;
        epSquare = null;
        i=0;
        s=56;
        c = fen.charAt(0);
        Square[] squares = Square.values();
        while (c != ' ')
        {
            switch (c)
            {
                case '/': s-=16; break;
                case '1': s+=1;  break;
                case '2': s+=2;  break;
                case '3': s+=3;  break;
                case '4': s+=4;  break;
                case '5': s+=5;  break;
                case '6': s+=6;  break;
                case '7': s+=7;  break;
                case '8': s+=8;  break;
                case 'p': putPiece (squares[s], Piece.BLACK_PAWN); s++; break;
                case 'n': putPiece (squares[s], Piece.BLACK_KNIGHT); s++; break;
                case 'b': putPiece (squares[s], Piece.BLACK_BISHOP); s++; break;
                case 'r': putPiece (squares[s], Piece.BLACK_ROOK); s++; break;
                case 'q': putPiece (squares[s], Piece.BLACK_QUEEN); s++; break;
                case 'k': putPiece (squares[s], Piece.BLACK_KING); s++; break;
                case 'P': putPiece (squares[s], Piece.WHITE_PAWN); s++; break;
                case 'N': putPiece (squares[s], Piece.WHITE_KNIGHT); s++; break;
                case 'B': putPiece (squares[s], Piece.WHITE_BISHOP); s++; break;
                case 'R': putPiece (squares[s], Piece.WHITE_ROOK); s++; break;
                case 'Q': putPiece (squares[s], Piece.WHITE_QUEEN); s++; break;
                case 'K': putPiece (squares[s], Piece.WHITE_KING); s++; break;
            }
            c = fen.charAt(++i);
        }
        c = fen.charAt(++i);
        if (c == 'w') sideToMove = Side.WHITE;
        else if (c == 'b') sideToMove = Side.BLACK;
        i+=2;
        castleState = 0;
        if (i < fen.length())
        {
            c = fen.charAt(i);
            while(c!=' ')
            {
                if ( c == 'K') castleState |= WHITE_CASTLE_SHORT;
                else if ( c == 'Q') castleState |= WHITE_CASTLE_LONG;
                else if ( c == 'k') castleState |= BLACK_CASTLE_SHORT;
                else if ( c == 'q') castleState |= BLACK_CASTLE_LONG;
                c = fen.charAt(++i);
            }
        }

        String remainingText = fen.substring(++i);
        epSquare = (!remainingText.equals("-"))? Square.valueOf(remainingText) : null;
    }
}
