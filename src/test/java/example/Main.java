package example;

import example.processors.BoardProcessor;
import org.neochess.core.File;
import org.neochess.core.Rank;
import org.neochess.core.Square;
import org.neogroup.sparks.Application;
import org.neogroup.sparks.console.ConsoleModule;

public class Main {

    public static void main (String[] args) {

        /*Application application = new Application();
        ConsoleModule module = new ConsoleModule(application);
        module.registerProcessor(BoardProcessor.class);

        application.addModule(module);
        application.start();*/

        int[][] moves = new int[20][200];

        generateMoves(moves[0]);

        System.out.println (moves[0][0]);
        System.out.println (moves[0][1]);
        System.out.println (moves[0][2]);
    }

    public static void generateMoves (int[] moves) {
        moves[0] = 35;
        moves[1] = 236;
        moves[2] = 12;
        moves[3] = 0;
    }
}
