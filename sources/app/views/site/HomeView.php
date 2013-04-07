<?php

require_once ("app/views/site/SiteView.php");

class HomeView extends SiteView
{
    protected function createContainer ()
    {
        $container = new Tag("div", array("class"=>"container"), '
            <ul class="nav nav-tabs">
                <li class="active">
                  <a href="#">Inicio</a>
                </li>
                <li><a href="#">Configuración</a></li>
                <li><a href="#">Tablero 1</a></li>
                <li><a href="#">Tablero 2</a></li>
                <li><a href="#">Tablero 3</a></li>
                <li><a href="#">Tablero 4</a></li>
                <li><a href="#">Tablero 5</a></li>
            </ul>
        ');
        return $container;
    }
}

?>
