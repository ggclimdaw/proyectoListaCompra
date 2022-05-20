<?php
require_once("model/dbModel.php");
class User extends DbModel{
    private int $id;
    private string $name;
    private string $username;
    private string $password;
    private string $address;
    private string $email;
    private string $avatarImage;
    
    


    public function __construct(
        string $name = '',
        string $username = '',
        string $password = '' ,
        string $address ='',
        string $email = '',
        string $avatarImage = 'https://gravatar.com/avatar/b3b00f7ff897d0761582eac881253706?s=200&d=robohash&r=x',
        int $id = -1
    ){
        parent::__construct();
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->address = $address;
        $this->email = $email;
        $this->avatarImage = $avatarImage;
        $this->id = $id;             
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
                $user->setUsername($selectedUser['username']);
                $user->setAddress($selectedUser['address']);
                $user->setEmail($selectedUser['email']);
                $user->setAvatarImage($selectedUser['avatarImage']);               
            }
            return $user;
        }catch (PDOException $e) {
            echo $e;
        }
    }

    public function create()
    {
        try {
            $query = $this->connectToDb()->prepare('INSERT INTO user (name, username, password, address, email, avatarImage) VALUES(:name, :username, :password, :address, :email, :avatarImage)');
            $query->execute([
                'name'  => $this->name,
                'username'  => $this->username,
                'password'  => $this->password,
                'address'  => $this->address,
                'email'      => $this->email,
                'avatarImage'    => $this->avatarImage
            ]);
            return true;            
        }catch (PDOException $e){
            echo $e;
            return false;
        }
    }

    public function getUserByUserName(string $userName)
    {
        try {
            $query = $this->connectToDb()->prepare('SELECT * FROM user WHERE username = :username');
            $query->execute(['username'=> $userName]);
            $selectedUser = $query->fetch(PDO::FETCH_ASSOC);
            $user = new User();
            if ($query->rowCount() > 0){
                $user->setId($selectedUser['id']);
                $user->setName($selectedUser['name']);
                $user->setUsername($selectedUser['username']);
                $user->setPassword($selectedUser['password']);
                $user->setAddress($selectedUser['address']);
                $user->setEmail($selectedUser['email']);
                $user->setAvatarImage($selectedUser['avatarImage']);
            }
            return $user;

        }catch (PDOException $e) {
            echo $e;
            return null;
        }
    }

    public function update(string $oldUsername, string $newName, string $newUsername, string $newPassword, String $newAddress, string $newEmail)
    {
        try {

            if ($newPassword == '') {
                $query = $this->connectToDb()->prepare('UPDATE user SET username = :username, name = :name, address = :address, email = :email WHERE username = :oldUserName');
                $query->execute([
                'name' => $newName,
                'username' => $newUsername,
                'address' => $newAddress,
                'email' => $newEmail,
                'oldUserName' => $oldUsername
                ]);
            } else {
                $query = $this->connectToDb()->prepare('UPDATE user SET username = :username, password = :password, name = :name, address = :address, email = :email WHERE username = :oldUserName');
                $query->execute([
                'name' => $newName,
                'username' => $newUsername,
                'password' => $newPassword,
                'address' => $newAddress,
                'email' => $newEmail,
                'oldUserName' => $oldUsername
                ]);
            }
            return true;
        }catch (PDOException $e){
            echo $e;
            return false;
        }
  
    }
 


    public function getPassword()
    {
            return $this->password;
    }
    public function setPassword(string $password)
    {
            $this->password = $password;
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
    public function getUsername()
    {
        return $this->username;
    }

   
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress(string $address)
    {
        $this->address = $address;
    }

       
       
}

?>