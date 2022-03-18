<?php
class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $avatarImage;


    public function __construct(int $id, string $name, string $email, string $avatarImage)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->avatarImage = $avatarImage;        
    }

    public function getId(){
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function getAvatarImage(){
        return $this->avatarImage;
    }

    public function setAvatarImage(string $avatarImage){
        $this->avatarImage = $avatarImage;
    }


}

?>