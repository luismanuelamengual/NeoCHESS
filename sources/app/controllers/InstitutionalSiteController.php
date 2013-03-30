<?php

class InstitutionalSiteController extends Controller
{   
    public function showHomeAction ()
    {
        App::getInstance()->getView('institutionalSite/home')->render();
    }
    
    public function showRegistrationAction ()
    {
        echo "TODO: Mostrar vista de registración";
    }
    
    public function showLoginErrorAction ()
    { 
        echo "TODO: Mostrar vista de error de login";
    }
    
    public function loginAction ($username, $password)
    {
        App::getInstance()->getController('session')->startAction($username, $password);
        if (App::getInstance()->getSession()->isStarted())    
            App::getInstance()->redirectAction('site/showHome');
        else
            App::getInstance()->redirectAction('institutionalSite/showLoginError');
    }
}

?>
