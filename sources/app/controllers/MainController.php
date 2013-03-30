<?php

class MainController extends Controller
{
    public function defaultAction ()
    {
        App::getInstance()->getController("institutionalSite")->showHomeAction();
    }
}

?>