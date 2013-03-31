<?php

require_once ("NeoPHP/views/HTMLView.php");

abstract class BootstrapView extends HTMLView
{
    private $responsive = true;
    
    public final function setResponsive ($responsive)
    {
        $this->responsive = $responsive;
    }
    
    protected function build () 
    {  
        $this->addScriptFile("http://code.jquery.com/jquery.min.js");
        $this->addScriptFile("assets/bootstrap/js/bootstrap.min.js");
        $this->addStyleFile("assets/bootstrap/css/bootstrap.min.css");
        if ($this->responsive)
        {
            $this->addMeta(array("name"=>"viewport", "content"=>"width=device-width, initial-scale=1.0"));
            $this->addStyleFile("assets/bootstrap/css/bootstrap-responsive.min.css");    
        }
    }
}

?>
