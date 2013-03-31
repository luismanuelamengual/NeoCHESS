<?php

require_once ("app/views/site/SiteView.php");

class HomeView extends SiteView
{
    protected function createContainer ()
    {
        $container = new Tag("div", array("class"=>"container"), "");
        return $container;
    }
}

?>
