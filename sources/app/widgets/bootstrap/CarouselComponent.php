<?php

class CarouselComponent extends HTMLComponent 
{
    private $slides = array();
    
    protected function getDefaultAttributes()
    {
        static $idCounter = 0;
        $attributes["id"] = "carousel_" . ($idCounter++);
        $attributes["interval"] = 5000;
        $attributes["showIndicatorsControl"] = true;
        $attributes["showPreviousSlideControl"] = true;
        $attributes["showNextSlideControl"] = true;
        return $attributes;        
    }
    
    public function createSlide ()
    {
        return new Tag("div", array("class"=>"item"));
    }
    
    public function createImageSlide ($imageUrl, $captionTitle, $captionText)
    {
        $caption = new Tag("div", array("class"=>"carousel-caption"));
        $caption->add (new Tag("h4", array(), $captionTitle));
        $caption->add (new Tag("p", array(), $captionText));
        $slide = $this->createSlide();
        $slide->add (new Tag("img", array("src"=>$imageUrl, "alt"=>"")));
        $slide->add ($caption);
        return $slide;
    }
    
    public function addSlide ($slide)
    {
        if (sizeof($this->slides) == 0)
            $slide->setAttribute("class", $slide->getAttribute("class") . " active");
        $this->slides[] = $slide;
    }
    
    public function getSlide ($index)
    {
        return $this->slides[$index];
    }
    
    public function getSlidesCount ()
    {
        return sizeof($this->slides);
    }
    
    public function setWidth ($width)
    {
        $this->attributes["width"] = $width;
    }
    
    public function setHeight ($height)
    {
        $this->attributes["height"] = $height;
    }
    
    protected function createHTMLElement (HTMLView $view) 
    {
        $attributes = array("id"=>($this->attributes["id"]), "class"=>"carousel slide");
        if (!empty($this->attributes["width"]) || !empty($this->attributes["height"]))
        {
            $style = "margin: 0px auto;";
            if (!empty($this->attributes["width"]))
                $style .= "max-width:" . $this->attributes["width"] . "px;";
            if (!empty($this->attributes["height"]))
                $style .= "max-width:" . $this->attributes["height"] . "px;";
            $attributes["style"] = $style;
        }
        $component = new Tag("div", $attributes);
        $component->add ($this->createSlidesContainer());
        if (sizeof($this->slides) > 1)
        {
            if ($this->attributes["showIndicatorsControl"])
                $component->add ($this->createIndicatorsControl());
            if ($this->attributes["showPreviousSlideControl"])
                $component->add ($this->createPreviousSlideControl());
            if ($this->attributes["showNextSlideControl"])
                $component->add ($this->createNextSlideControl());
        }
        return $component;
    }
    
    protected function addViewDependencies (HTMLView $view) 
    {
        $view->addScript ("$('#" . $this->attributes["id"] . "').carousel({interval:" . $this->attributes["interval"] . "});");
    }
    
    protected function createSlidesContainer ()
    {
        $slidesContainer = new Tag("div", array("class"=>"carousel-inner"));
        foreach ($this->slides as $slide)
            $slidesContainer->add($slide);
        return $slidesContainer;
    }
    
    protected function createIndicatorsControl ()
    {
        $list = new Tag("ol", array("class"=>"carousel-indicators"));
        for ($i = 0; $i < sizeof($this->slides); $i++)
        {
            $item = new Tag("li", array("data-target"=>("#".$this->attributes["id"]), "data-slide-to"=>$i), "");
            if ($i == 0)
                $item->setAttribute("class", "active");
            $list->add ($item);
        }
        return $list;
    }
    
    protected function createPreviousSlideControl ()
    {
        return new Tag("a", array("class"=>"left carousel-control", "href"=>("#".$this->attributes["id"]), "data-slide"=>"prev"), "&lsaquo;");
    }
    
    protected function createNextSlideControl ()
    {
        return new Tag("a", array("class"=>"right carousel-control", "href"=>("#".$this->attributes["id"]), "data-slide"=>"next"), "&rsaquo;");
    }
}

?>
