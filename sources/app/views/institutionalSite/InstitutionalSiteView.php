<?php

require_once ("app/views/BootstrapView.php");

abstract class InstitutionalSiteView extends BootstrapView
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
        return new Tag("div", array("class"=>"navbar navbar-inverse navbar-fixed-top"), $innerPanel);
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
        return new Tag("a", array("class"=>"brand", "href"=>App::getInstance()->getUrl("institutionalSite/showHome")), App::getInstance()->getPreferences()->title);
    }
    
    protected function createCollapsiblePanel ()
    {
        return new Tag("div", array("class"=>"nav-collapse collapse"), array($this->createMenu(), $this->createLoginForm()));
    }
    
    protected function createMenu ()
    {
        $menu = new Tag("ul", array("class"=>"nav"));
        $menu->add($this->createHomeLink());
        $menu->add($this->createAboutUsLink());
        $menu->add($this->createServicesLink());
        $menu->add($this->createContactUsLink());
        return $menu;
    }
    
    protected function createLoginForm ()
    {
        $usernameField = new Tag("input", array("class"=>"span2", "type"=>"text", "placeholder"=>"Nombre de usuario"));
        $passwordField = new Tag("input", array("class"=>"span2", "type"=>"password", "placeholder"=>"Contraseña"));
        $loginButton = new Tag("button", array("type"=>"button", "class"=>"btn"), "Iniciar sesión");
        return new Tag("form", array("class"=>"navbar-form pull-right"), array($usernameField, $passwordField, $loginButton));
    }
    
    protected function createHomeLink ()
    {
        return new Tag("li", array(), new Tag("a", array("href"=>App::getInstance()->getUrl("institutionalSite/showHome")), "Inicio"));
    }
    
    protected function createAboutUsLink ()
    {
        return new Tag("li", array(), new Tag("a", array("href"=>App::getInstance()->getUrl("institutionalSite/showAboutUs")), "Empresa"));
    }
    
    protected function createServicesLink ()
    {
        return new Tag("li", array(), new Tag("a", array("href"=>App::getInstance()->getUrl("institutionalSite/showServices")), "Servicios"));
    }
    
    protected function createContactUsLink ()
    {
        return new Tag("li", array(), new Tag("a", array("href"=>App::getInstance()->getUrl("institutionalSite/showContactUs")), "Contacto"));
    }
    
    protected abstract function createContainer ();
}

?>
