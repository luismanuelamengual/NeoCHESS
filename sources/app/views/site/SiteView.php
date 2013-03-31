<?php

require_once ("app/views/BootstrapView.php");

abstract class SiteView extends BootstrapView
{
    protected function build()
    {
        parent::build();
        $this->setTitle(App::getInstance()->getPreferences()->title);
        $this->addMeta (array("charset"=>"utf-8"));
        $this->addStyleFile("css/main.css");
        $this->bodyTag->add ($this->createHeader());
        $this->bodyTag->add ($this->createContainer());
        $this->bodyTag->add ($this->createFooter());
    }
    
    protected function createHeader ()
    {        
        $container = new Tag("div", array("class"=>"container"), array($this->createExpansionButton(), $this->createTitleLink(), $this->createCollapsiblePanel()));
        $innerPanel = new Tag("div", array("class"=>"navbar-inner"), $container);
        return new Tag("div", array("class"=>"navbar navbar-fixed-top"), $innerPanel);
    }
    
    protected function createFooter ()
    {
        $title = new Tag("p", array(), "&copy; " . App::getInstance()->getPreferences()->title . " 2013"); 
        return new Tag("footer", array("class"=>"footer"), new Tag("div", array("class"=>"container"), $title));
    }
    
    protected function createExpansionButton ()
    {
        return new Tag("button", array("type"=>"button", "class"=>"btn btn-navbar", "data-toggle"=>"collapse", "data-target"=>".nav-collapse"), '<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>');
    }
    
    protected function createTitleLink ()
    {
        return new Tag("a", array("class"=>"brand", "href"=>App::getInstance()->getUrl("institutionalSite/showHome")), "<b>".App::getInstance()->getPreferences()->title."</b>");
    }
    
    protected function createCollapsiblePanel ()
    {
        return new Tag("div", array("class"=>"nav-collapse collapse"), "");
    }
    
    protected abstract function createContainer ();
}

?>
