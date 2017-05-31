
package org.neochess.core;

public enum Square {

    a1(File.A, Rank.ONE),
    b1(File.B, Rank.ONE),
    c1(File.C, Rank.ONE),
    d1(File.D, Rank.ONE),
    e1(File.E, Rank.ONE),
    f1(File.F, Rank.ONE),
    g1(File.G, Rank.ONE),
    h1(File.H, Rank.ONE),

    a2(File.A, Rank.TWO),
    b2(File.B, Rank.TWO),
    c2(File.C, Rank.TWO),
    d2(File.D, Rank.TWO),
    e2(File.E, Rank.TWO),
    f2(File.F, Rank.TWO),
    g2(File.G, Rank.TWO),
    h2(File.H, Rank.TWO),

    a3(File.A, Rank.THREE),
    b3(File.B, Rank.THREE),
    c3(File.C, Rank.THREE),
    d3(File.D, Rank.THREE),
    e3(File.E, Rank.THREE),
    f3(File.F, Rank.THREE),
    g3(File.G, Rank.THREE),
    h3(File.H, Rank.THREE),

    a4(File.A, Rank.FOUR),
    b4(File.B, Rank.FOUR),
    c4(File.C, Rank.FOUR),
    d4(File.D, Rank.FOUR),
    e4(File.E, Rank.FOUR),
    f4(File.F, Rank.FOUR),
    g4(File.G, Rank.FOUR),
    h4(File.H, Rank.FOUR),

    a5(File.A, Rank.FIVE),
    b5(File.B, Rank.FIVE),
    c5(File.C, Rank.FIVE),
    d5(File.D, Rank.FIVE),
    e5(File.E, Rank.FIVE),
    f5(File.F, Rank.FIVE),
    g5(File.G, Rank.FIVE),
    h5(File.H, Rank.FIVE),

    a6(File.A, Rank.SIX),
    b6(File.B, Rank.SIX),
    c6(File.C, Rank.SIX),
    d6(File.D, Rank.SIX),
    e6(File.E, Rank.SIX),
    f6(File.F, Rank.SIX),
    g6(File.G, Rank.SIX),
    h6(File.H, Rank.SIX),

    a7(File.A, Rank.SEVEN),
    b7(File.B, Rank.SEVEN),
    c7(File.C, Rank.SEVEN),
    d7(File.D, Rank.SEVEN),
    e7(File.E, Rank.SEVEN),
    f7(File.F, Rank.SEVEN),
    g7(File.G, Rank.SEVEN),
    h7(File.H, Rank.SEVEN),

    a8(File.A, Rank.EIGHT),
    b8(File.B, Rank.EIGHT),
    c8(File.C, Rank.EIGHT),
    d8(File.D, Rank.EIGHT),
    e8(File.E, Rank.EIGHT),
    f8(File.F, Rank.EIGHT),
    g8(File.G, Rank.EIGHT),
    h8(File.H, Rank.EIGHT);

    private static final Square[][] squareCache;

    static {
        squareCache = new Square[8][8];
        for (Square square : values()) {
            squareCache[square.getFile().ordinal()][square.getRank().ordinal()] = square;
        }
    }

    private final File file;
    private final Rank rank;

    Square(File file, Rank rank) {
        this.file = file;
        this.rank = rank;
    }

    public File getFile() {
        return file;
    }

    public Rank getRank() {
        return rank;
    }

    public Square getOffsetSquare(int fileOffset, int rankOffset) {
        return Square.getOffsetSquare(this, fileOffset, rankOffset);
    }

    public static Square getSquare(File file, Rank rank) {
        return squareCache[file.ordinal()][rank.ordinal()];
    }

    public static Square getOffsetSquare(Square square, int fileOffset, int rankOffset) {
        File offsetFile = square.getFile().getOffsetFile(fileOffset);
        Rank offsetRank = square.getRank().getOffsetRank(rankOffset);
        return (offsetFile != null && offsetRank != null)? getSquare(offsetFile, offsetRank) : null;
    }
}
