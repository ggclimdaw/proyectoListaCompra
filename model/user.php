<?php
require_once("model/dbModel.php");
class User extends DbModel{
    private int $id;
    private string $name;
    private string $email;
    private string $avatarImage;
    private string $username;
    private string $address;


    public function __construct(string $name = '', string $email = '', string $avatarImage = '', string $username = '', string $address ='')
    {
        parent::__construct();
        $this->name = $name;
        $this->email = $email;
        $this->avatarImage = $avatarImage;
        $this->username = $username;
        $this->address = $address;        
    }

    public function getByName(string $name)
    {
        try {
            $query = $this->connectToDb()->prepare('SELECT * FROM user WHERE name = :name');
            $query->execute(['name'=> $name]);
            $selectedUser = $query->fetch(PDO::FETCH_ASSOC);
            $user = new User();
            if ($query->rowCount() > 0){
              
                $user->setId($selectedUser['id']);
                $user->setName($selectedUser['name']);
                $user->setEmail($selectedUser['email']);
                $user->setAvatarImage($selectedUser['avatarImage']);
                $user->setUsername($selectedUser['username']);
                $user->setAddress($selectedUser['address']);
            }
            return $user;

        }catch (PDOException $e)
        {
            echo $e;
        }
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



    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;
    }
}

?>