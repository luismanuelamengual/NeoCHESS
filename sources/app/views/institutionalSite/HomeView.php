<?php

require_once ("app/views/institutionalSite/InstitutionalSiteView.php");
require_once ("app/widgets/bootstrap/CarouselComponent.php");

class HomeView extends InstitutionalSiteView
{   
    protected function createContainer ()
    {
        $container = new Tag("div", array("class"=>"container"));
        $container->add ($this->createCarouselComponent());
        $container->add ($this->createSectionsContainer());
        return $container;
    }
    
    protected function createCarouselComponent ()
    {
        $carousel = new CarouselComponent();
        $carousel->setWidth(1200);
        $carousel->addSlide($carousel->createImageSlide("images/art/chess_1.jpg", "Diseño moderno", "Juegue ajedrez con la más moderna interfaz"));
        $carousel->build($this);
        return $carousel;
    }
    
    protected function createSectionsContainer ()
    {
        $container = new Tag("div", array("class"=>"row"));
        $container->add ($this->createSection("Juegue", App::getInstance()->getPreferences()->title . " le permite jugar con jugadores de todo el mundo a traves de internet"));
        $container->add ($this->createSection("Compita", "Todos los días hay torneos en que los jugadores pueden inscribirse"));
        $container->add ($this->createSection("Mejore", "Mejore sus habilidades e incremente su ELO para escalar en el ranking de NeoCHESS"));
        return $container;
    }
    
    protected function createSection ($title, $description)
    {
        $titleContainer = new Tag("h2", array(), $title);
        $descriptionContainer = new Tag("p", array(), $description);
        return new Tag("div", array("class"=>"span4"), array($titleContainer, $descriptionContainer));
    }
}

?>
