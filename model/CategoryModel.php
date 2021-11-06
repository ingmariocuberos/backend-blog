<?php

class CategoryModel{

    private $categoryName;

    public function __construct($categoryName)
    {
        $this->categoryName = $categoryName;

    }

    public function getCategoryName(){
        return $this->categoryName;
    }

}

?>