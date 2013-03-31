<?php

class SiteController extends Controller
{
    public function showHomeAction ()
    {
        App::getInstance()->getView("site/home")->render();
    }
}

?>
