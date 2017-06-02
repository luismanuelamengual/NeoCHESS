
package example.processors;

import org.neochess.engine.Board;
import org.neogroup.sparks.console.Command;
import org.neogroup.sparks.console.Console;
import org.neogroup.sparks.console.processors.ConsoleProcessor;
import org.neogroup.sparks.console.processors.ProcessCommands;

@ProcessCommands({"print", "initial", "flip", "move"})
public class BoardProcessor extends ConsoleProcessor {

    private boolean flipped;
    private Board board;

    public BoardProcessor() {
        flipped = false;
        board = new Board();
        board.setInitialPosition();
    }

    @Override
    protected void processCommand(Console console, Command command) {

        switch (command.getName()) {
            case "initial":
                board.setInitialPosition();
                break;
            case "print":
                printBoard ();
                break;
            case "flip":
                flipped = !flipped;
                break;
            case "move":
                int fromSquare = getSquareFromString(command.getParameters().get(0));
                int toSquare = getSquareFromString(command.getParameters().get(1));
                board.makeMove(fromSquare, toSquare);
                printBoard();
                break;
        }
    }

    private int getSquareFromString (String squareString) {

        char fileChar = squareString.charAt(0);
        char rankChar = squareString.charAt(1);

        int file = -1;
        switch (fileChar) {
            case 'a': file = Board.FILE_A; break;
            case 'b': file = Board.FILE_B; break;
            case 'c': file = Board.FILE_C; break;
            case 'd': file = Board.FILE_D; break;
            case 'e': file = Board.FILE_E; break;
            case 'f': file = Board.FILE_F; break;
            case 'g': file = Board.FILE_G; break;
            case 'h': file = Board.FILE_H; break;
        }

        int rank = -1;
        switch (rankChar) {
            case '1': rank = Board.RANK_1; break;
            case '2': rank = Board.RANK_2; break;
            case '3': rank = Board.RANK_3; break;
            case '4': rank = Board.RANK_4; break;
            case '5': rank = Board.RANK_5; break;
            case '6': rank = Board.RANK_6; break;
            case '7': rank = Board.RANK_7; break;
            case '8': rank = Board.RANK_8; break;
        }

        return Board.getSquare(file, rank);
    }

    private void printBoard () {
        System.out.print("   ");
        System.out.println("╔═══╦═══╦═══╦═══╦═══╦═══╦═══╦═══╗");
        for (int rank = Board.RANK_8; rank >= Board.RANK_1; rank--) {
            int currentRank = rank;
            if (flipped) {
                currentRank = 7 - currentRank;
            }
            System.out.print(" ");
            System.out.print(getRankString(currentRank));
            System.out.print(" ");
            System.out.print("║");
            for (int file = Board.FILE_A; file <= Board.FILE_H; file++) {
                int currentFile = file;
                if (flipped) {
                    currentFile = 7 - currentFile;
                }
                int square = Board.getSquare(currentFile,currentRank);
                System.out.print(" ");
                System.out.print(getPieceString(board.getPiece(square)));
                System.out.print(" ║");
            }
            System.out.println();

            if (rank == Board.RANK_1) {
                System.out.print("   ");
                System.out.println("╚═══╩═══╩═══╩═══╩═══╩═══╩═══╩═══╝");
            }
            else {
                System.out.print("   ");
                System.out.println("╠═══╬═══╬═══╬═══╬═══╬═══╬═══╬═══╣");
            }
        }

        System.out.print("   ");
        for (int file = Board.FILE_A; file <= Board.FILE_H; file++) {
            int currentFile = file;
            if (flipped) {
                currentFile = 7 - currentFile;
            }
            System.out.print("  ");
            System.out.print(getFileString(currentFile));
            System.out.print(" ");
        }
        System.out.println();
    }

    private String getPieceString (int piece) {
        switch (piece) {
            case Board.WHITE_PAWN: return "P";
            case Board.WHITE_KNIGHT: return "N";
            case Board.WHITE_BISHOP: return "B";
            case Board.WHITE_ROOK: return "R";
            case Board.WHITE_QUEEN: return "Q";
            case Board.WHITE_KING: return "K";
            case Board.BLACK_PAWN: return "p";
            case Board.BLACK_KNIGHT: return "n";
            case Board.BLACK_BISHOP: return "b";
            case Board.BLACK_ROOK: return "r";
            case Board.BLACK_QUEEN: return "q";
            case Board.BLACK_KING: return "k";
            default: return " ";
        }
    }

    private String getFileString (int file) {
        switch (file) {
            case Board.FILE_A: return "A";
            case Board.FILE_B: return "B";
            case Board.FILE_C: return "C";
            case Board.FILE_D: return "D";
            case Board.FILE_E: return "E";
            case Board.FILE_F: return "F";
            case Board.FILE_G: return "G";
            case Board.FILE_H: return "H";
            default: return "";
        }
    }

    private String getRankString (int rank) {
        return String.valueOf(rank+1);
    }
}
