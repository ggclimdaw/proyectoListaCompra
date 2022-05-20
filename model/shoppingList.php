<?php
require_once("model/dbModel.php");
class ShoppingList extends DbModel
{
    private int $id;
    private string $name;
    private string $description;
    private int $userId;
    private string $urlImagen;

   

    public function __construct(
        int $id = -1,
        string $name ='',
        string $description ='',
        int $userId = -1,
        string $urlImagen =''
        
    
    ){
        parent::__construct();
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
        $this->userId=$userId;
        $this->urlImagen=$urlImagen;

    }

    public function getByUserId(int $userId)
    {
        try {
            $query = $this->connectToDb()->prepare('SELECT * FROM shoppinglist WHERE userId = :userId');
            $query->execute(['userId'=> $userId]);
            $selectedUserId = $query->fetch(PDO::FETCH_ASSOC);
            $shoppingList = new ShoppingList();
            if ($query->rowCount() > 0){
                $shoppingList->setId($selectedUserId['id']);
                $shoppingList->setName($selectedUserId['name']);
                $shoppingList->setDescription($selectedUserId['description']);
                $shoppingList->setUserId($selectedUserId['userId']);
                $shoppingList->setUrlImagen($selectedUserId['urlImagen']);          
            }
            return $shoppingList;
        }catch (PDOException $e) {
            echo $e;
        }
    }

    public function getId()
    {
        return $this->id;
    }

       public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }
   
    public function setName($name)
    {
        $this->name = $name;
    }

   
    public function getDescription()
    {
        return $this->description;
    }

  
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getUserId()
    {
        return $this->userId;
    }
  
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getUrlImagen()
    {
        return $this->urlImagen;
    }
      
    public function setUrlImagen($urlImagen)
    {
        $this->urlImagen = $urlImagen;    
    }

    public function create()
    {
        try {
            $query = $this->connectToDb()->prepare('INSERT INTO shoppinglist (name, description, userId, urlImagen) VALUES(:name, :description, :userId, :urlImagen)');
            $query->execute([
                'name' => $this->name,
                'description' => $this->description,
                'userId' => $this->userId,
                'urlImagen' => $this->urlImagen
            ]);
            return true;
            } catch (Exception $e) {
            echo $e;
            return false;
            }
    }  
    
    public function update(int $shoppingListId, string $newName, string $newDescription, string $newUrlImagen)
    {
        try {
            $query = $this->connectToDb()->prepare('UPDATE shoppinglist SET name = :name, description = :description, urlImagen = :urlImagen WHERE id = :shoppingListId');
            $query->execute([
                'name' => $newName,
                'description' => $newDescription, 
                'shoppingListId' => $shoppingListId,
                'urlImagen' => $newUrlImagen
            ]);
            return true;
        } catch (Exception $e) {
            echo $e;
            return false;
        }

    }

    public function delete(int $shoppingListId)
    {
        try {
            $query = $this->connectToDb()->prepare('DELETE FROM shoppinglist WHERE id = :shoppingListId');
            $query->execute([
                'shoppingListId' => $shoppingListId
            ]);
            return true;
        }catch (Exception $e) {
            echo $e;
            return false;
        }
        
    }


}
