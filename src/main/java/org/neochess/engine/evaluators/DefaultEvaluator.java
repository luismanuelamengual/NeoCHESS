
package org.neochess.engine.evaluators;

import org.neochess.engine.Board;

public class DefaultEvaluator extends Evaluator {

    public static final int PHASES_COUNT = 8;
    public static final int SCORE_PAWN = 100;
    public static final int SCORE_KNIGHT = 340;
    public static final int SCORE_BISHOP = 330;
    public static final int SCORE_ROOK = 520;
    public static final int SCORE_QUEEN = 1020;
    public static final int SCORE_KING = 10000;
    public static final int SCORE_ORIGINAL_MATERIAL = (16*SCORE_PAWN) + (4*SCORE_KNIGHT) + (4*SCORE_BISHOP) + (4*SCORE_ROOK) + (2*SCORE_QUEEN);

    @Override
    public int evaluate(Board board) {

        int materialScore = 0;
        int phase = 0;
        int kingSquare[] = new int[2];
        int pawnsCountByFile[][] = new int[2][8];
        for (int square = Board.A1; square <= Board.H8; square++) {
            int squareFile = Board.getSquareFile(square);
            int piece = board.getPiece(square);
            int pieceSide = Board.getPieceSide(piece);
            int pieceFigure = Board.getPieceFigure(piece);
            switch (pieceFigure) {
                case Board.PAWN:
                    materialScore += SCORE_PAWN;
                    pawnsCountByFile[pieceSide][squareFile]++;
                    break;
                case Board.KNIGHT:
                    materialScore += SCORE_KNIGHT;
                    break;
                case Board.BISHOP:
                    materialScore += SCORE_BISHOP;
                    break;
                case Board.ROOK:
                    materialScore += SCORE_ROOK;
                    break;
                case Board.QUEEN:
                    materialScore += SCORE_QUEEN;
                    break;
                case Board.KING:
                    kingSquare[pieceSide] = square;
                    break;
            }
        }
        phase = PHASES_COUNT - (materialScore * PHASES_COUNT / SCORE_ORIGINAL_MATERIAL);

        int score = 0;
        for (int square = Board.A1; square <= Board.H8; square++) {
            int file = Board.getSquareFile(square);
            int rank = Board.getSquareRank(square);
            int piece = board.getPiece(square);
            int pieceSide = Board.getPieceSide(piece);
            int pieceFigure = Board.getPieceFigure(piece);
            switch (pieceFigure) {
                case Board.PAWN:
                    score += pieceSide == Board.WHITE ? SCORE_PAWN : -SCORE_PAWN;
                    break;
                case Board.KNIGHT:
                    score += pieceSide == Board.WHITE ? SCORE_KNIGHT : -SCORE_KNIGHT;
                    break;
                case Board.BISHOP:
                    score += pieceSide == Board.WHITE ? SCORE_BISHOP : -SCORE_BISHOP;
                    break;
                case Board.ROOK:
                    score += pieceSide == Board.WHITE ? SCORE_ROOK : -SCORE_ROOK;
                    break;
                case Board.QUEEN:
                    score += pieceSide == Board.WHITE ? SCORE_QUEEN : -SCORE_QUEEN;
                    break;
                case Board.KING:
                    score += pieceSide == Board.WHITE ? SCORE_KING : -SCORE_KING;
                    break;
            }
        }
        return score;
    }
}
