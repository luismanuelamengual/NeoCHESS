package example;

import org.neochess.core.File;
import org.neochess.core.Rank;
import org.neochess.core.Square;

public class Main {

    public static void main (String[] args) {

        long time = System.currentTimeMillis();

        System.out.println(Square.F3);
        System.out.println(Square.F3.getFile());
        System.out.println(Square.F3.getRank());
        System.out.println(Square.getSquare(File.F, Rank.THREE));

        System.out.println(Square.E2.getOffsetSquare(-2,2));



        long elpasedTime = System.currentTimeMillis() - time;
        System.out.println ("Elapsed: " + elpasedTime);
    }
}
