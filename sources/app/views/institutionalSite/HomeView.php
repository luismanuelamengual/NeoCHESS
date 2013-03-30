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
    
    protected function createHomeLink ()
    {
        $link = parent::createHomeLink();
        $link->setAttribute("class", "active");
        return $link;
    }
    
    protected function createCarouselComponent ()
    {
        $carousel = new CarouselComponent();
        $carousel->addSlide($carousel->createImageSlide("http://twitter.github.com/bootstrap/assets/img/bootstrap-mdo-sfmoma-01.jpg", "First thumbnail Label", "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."));
        $carousel->addSlide($carousel->createImageSlide("http://twitter.github.com/bootstrap/assets/img/bootstrap-mdo-sfmoma-02.jpg", "Second thumbnail Label", "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."));
        $carousel->addSlide($carousel->createImageSlide("http://twitter.github.com/bootstrap/assets/img/bootstrap-mdo-sfmoma-03.jpg", "Third thumbnail Label", "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit."));
        $carousel->build($this);
        return $carousel;
    }
    
    protected function createSectionsContainer ()
    {
        $container = new Tag("div", array("class"=>"row"));
        $container->add ($this->createSection("Nuestro Equipo", App::getInstance()->getPreferences()->title . " esta formado por un grupo de Jóvenes Ingenieros especializados en las áreas de Electrónica, Computación y Sistemas. Nuestra sólida formación profesional y experiencia en desarrollos de sistemas integrales son la base para encontrar soluciones a su medida."));
        $container->add ($this->createSection("Servicios", "Conozca nuestros servicios: monitoreo de vehículos, gestión de flotas, perfiles de conducción, control de mantenimiento, automatización de procesos industriales y optimización de recursos entre otros."));
        return $container;
    }
    
    protected function createSection ($title, $description)
    {
        $titleContainer = new Tag("h2", array(), $title);
        $descriptionContainer = new Tag("p", array(), $description);
        $button = new Tag("p", array(), new Tag("a", array("class"=>"btn"), "Leer más &raquo;"));
        return new Tag("div", array("class"=>"span6"), array($titleContainer, $descriptionContainer, $button));
    }
}

?>
