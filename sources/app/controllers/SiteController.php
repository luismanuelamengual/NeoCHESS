<?php

class SiteController extends Controller
{
    public function showHomeAction ()
    {
        App::getInstance()->getView("site/home")->render();
    }
    
    public function logoutAction ()
    {
        App::getInstance()->executeAction('session/destroy');
        App::getInstance()->redirectAction('institutionalSite/showHome');
    }
}

?>
