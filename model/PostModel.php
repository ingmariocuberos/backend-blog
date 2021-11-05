<?php

class Post{

    private $title;
    private $slug;
    private $shortText;
    private $bigText;
    private $urlImage;


    public function __construct($title, $slug, $shortText, $bigText, $urlImage)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->shortText = $shortText;
        $this->bigText = $bigText;
        $this->urlImage = $urlImage;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getSlug(){
        return $this->slug;
    }

    public function getShortText(){
        return $this->shortText;
    }

    public function getBigText(){
        return $this->bigText;
    }

    public function getUrlImage(){
        return $this->urlImage;
    }

    

}

?>