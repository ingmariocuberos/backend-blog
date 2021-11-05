<?php

class UserModel{

    private $name;
    private $email;
    private $password;
    private $phone;
    private $type;
    private $creationDate;
    private $updateDate;

    public function __construct($name, $email, $password, $phone, $type, $creationDate,$updateDate)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->type = $type;
        $this->creationDate = $creationDate;
        $this->updateDate = $updateDate;
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getType(){
        return $this->type;
    }

    public function getCreationDate(){
        return $this->creationDate;
    }

    public function getUpdateDate(){
        return $this->updateDate;
    }

}

?>