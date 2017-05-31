package example;

import org.neochess.core.File;
import org.neochess.core.Rank;
import org.neochess.core.Square;

public class Main {

    public static void main (String[] args) {
        System.out.println (Square.f3);
        System.out.println (Square.f3.getFile());
        System.out.println (Square.f3.getRank());
        System.out.println (Square.getSquare(File.F, Rank.THREE));
    }
}
