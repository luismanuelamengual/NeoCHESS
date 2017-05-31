package example;

import org.neochess.core.File;
import org.neochess.core.Rank;
import org.neochess.core.Square;

public class Main {

    public static void main (String[] args) {

        long time = System.currentTimeMillis();

        System.out.println(Square.f3);
        System.out.println(Square.f3.getFile());
        System.out.println(Square.f3.getRank());
        System.out.println(Square.getSquare(File.F, Rank.THREE));

        System.out.println(Square.e2.getOffsetSquare(-2,2));



        long elpasedTime = System.currentTimeMillis() - time;
        System.out.println ("Elapsed: " + elpasedTime);
    }
}
