<?php

require_once("model/dbModel.php");

class Product extends dbModel
{
    private int $id;
    private string $name;
    private string $description;
    private string $image;
    private float $unitPrice;


    public function __construct(
        int $id = -1,
        string $name ='',
        string $description ='',
        string $image ='',
        float $unitPrice = 0.0
    ){
        parent::__construct();
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->unitPrice = $unitPrice;
        $this->id = $id;
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
    
    public function getImage()
    {
        return $this->image;
    }
  
    public function setImage($image)
    {
        $this->image = $image;
    }
   
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }
  
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

       
    public function getAll()
    {
        try {
            $query = $this->connectToDb()->prepare('SELECT * FROM product');
            $query->execute();
            $productList = array();
            while ($retrievedProduct = $query->fetch(PDO::FETCH_ASSOC)) {
                $selectedProduct = new Product();
                $selectedProduct->setId(intval($retrievedProduct['id']));
                $selectedProduct->setName($retrievedProduct['name']);
                $selectedProduct->setDescription($retrievedProduct['description']);
                $selectedProduct->setImage($retrievedProduct['image']);
                $selectedProduct->setUnitPrice(floatval($retrievedProduct['unitPrice']));
                array_push($productList, $selectedProduct);
            }
            return $productList;
        }catch (PDOException $e) {
            echo $e;
            return null;
        }
    }
       

    public function getProductsNotInList(int $shoppingListId)
    {
        try {
            $query = $this->connectToDb()->prepare('SELECT * FROM product WHERE id NOT IN
            ( SELECT productId FROM shoppinglistelement WHERE shoppingListId = :shoppingListId )');
            $query->execute(['shoppingListId' => $shoppingListId]);
            $productsList = array();
            while ($retrievedProduct = $query->fetch(PDO::FETCH_ASSOC)) {
                $selectedProduct = new Product();
                $selectedProduct->setId(intval($retrievedProduct['id']));
                $selectedProduct->setName($retrievedProduct['name']);
                $selectedProduct->setDescription($retrievedProduct['description']);
                $selectedProduct->setImage($retrievedProduct['image']);
                $selectedProduct->setUnitPrice(floatval($retrievedProduct['unitPrice']));
                array_push($productsList, $selectedProduct);
            }
            return $productsList;
        }catch (PDOException $e) {
            echo $e;
            return null;
        }
    }


    
}