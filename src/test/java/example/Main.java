package example;

import example.processors.BoardProcessor;
import org.neogroup.sparks.Application;
import org.neogroup.sparks.console.ConsoleModule;

public class Main {

    public static void main (String[] args) {

        Application application = new Application();
        ConsoleModule module = new ConsoleModule(application);
        module.registerProcessor(BoardProcessor.class);

        application.addModule(module);
        application.start();
    }
}
