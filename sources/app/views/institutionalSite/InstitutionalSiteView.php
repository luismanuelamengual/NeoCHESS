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
        return new Tag("a", array("class"=>"brand", "href"=>App::getInstance()->getUrl("institutionalSite/showHome")), "<b>".App::getInstance()->getPreferences()->title."</b>");
    }
    
    protected function createCollapsiblePanel ()
    {
        return new Tag("div", array("class"=>"nav-collapse collapse"), $this->createLoginForm());
    }
    
    protected function createLoginForm ()
    {
        $usernameField = new Tag("input", array("name"=>"username", "class"=>"span2", "type"=>"text", "placeholder"=>"Nombre de usuario"));
        $passwordField = new Tag("input", array("name"=>"password", "class"=>"span2", "type"=>"password", "placeholder"=>"Contraseña"));
        $loginButton = new Tag("input", array("type"=>"submit", "class"=>"btn", "value"=>"Iniciar sesión"));
        $registerButton = new Tag("a", array("type"=>"button", "class"=>"btn", "href"=>App::getInstance()->getUrl("institutionalSite/showRegistration")), "Registrarse");
        return new Tag("form", array("action"=>App::getInstance()->getUrl("institutionalSite/login"), "method"=>"post", "class"=>"navbar-form pull-right"), array($usernameField, $passwordField, $loginButton, $registerButton));
    }
    
    protected abstract function createContainer ();
}

?>
