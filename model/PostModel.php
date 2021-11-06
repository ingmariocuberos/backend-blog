<?php

class PostModel{
    
    private $category;
    private $user;
    private $title;
    private $slug;
    private $shortText;
    private $bigText;
    private $urlImage;
    private $creationDate;
    private $updateDate;


    public function __construct($category, $user, $title, $slug, $shortText, $bigText, $urlImage, $creationDate,$updateDate)
    {
        $this->category= $category;
        $this->user= $user;
        $this->title = $title;
        $this->slug = $slug;
        $this->shortText = $shortText;
        $this->bigText = $bigText;
        $this->urlImage = $urlImage;
        $this->creationDate = $creationDate;
        $this->updateDate = $updateDate;
    }

    public function getCategory(){
        return $this->category;
    }

    public function getUser(){
        return $this->user;
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

    public function getCreationDate(){
        return $this->creationDate;
    }

    public function getUpdateDate(){
        return $this->updateDate;
    }
}

?>