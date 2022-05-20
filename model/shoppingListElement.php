<?php
require_once("model/dbModel.php");

class shoppingListElement extends DbModel
{
    private int $id;
    private int $idProduct;
    private string $name;
    private float $quantity;
    private float $price;

    public function __construct(int $id=-1, int $idProduct =-1, string $catProduct = "", string $name = "", float $quantity = 0.0, float $price = 0.0)
    {
        parent::__construct();
        $this->id = $id;
        $this->idProduct = $idProduct;
        $this->catProduct = $catProduct;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getIdProduct(){
        return $this->idProduct;
    }
    public function setIdProduct(int $idProduct){
        $this->idProduct = $idProduct;
    }
    public function getName(){
        return $this->name;
    }
    public function setName(string $name){
        $this->name = $name;
    }

    public function getCatProduct(){
        return $this->catProduct;
    }
    public function setCatProduct(string $catProduct){
        $this->catProduct = $catProduct;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function setQuantity(float $quantity){
        $this->quantity = $quantity;
    }

    public function getPrice(){
        return $this->price;
    }
    public function setPrice(float $price){
        $this->price = $price;
    }

    // Obtiene un array de productos de la lista de la compra
    public function getShoppingItemsList(int $shoppingListId)
    {
        try {
            $query =
            $this->connectToDb()->prepare('SELECT shoppinglistelement.id, product.id as productId , product.name, shoppinglistelement.quantity, product.unitPrice
                                            FROM shoppinglistelement
                                            INNER JOIN product ON shoppinglistelement.productId = product.id
                                            AND shoppinglistelement.shoppingListId = :shoppingListId');
            $query->execute(['shoppingListId'=> $shoppingListId]);
            $shoppingListElements = array();
            while ($selectedShoppingListEl = $query->fetch(PDO::FETCH_ASSOC)) {
                $shoppingListElement = new ShoppingListElement();
                $shoppingListElement->setId(intval($selectedShoppingListEl['id']));
                $shoppingListElement->setIdProduct(intval($selectedShoppingListEl['productId']));
                $shoppingListElement->setName($selectedShoppingListEl['name']);
                $shoppingListElement->setPrice(floatval($selectedShoppingListEl['unitPrice']));
                $shoppingListElement->setQuantity(floatval($selectedShoppingListEl['quantity']));
                array_push($shoppingListElements, $shoppingListElement);            
            }
            return $shoppingListElements;
        }catch (PDOException $e) {
            echo $e;
        }  
    }

    public function delete(int $shoppingListElementId)
    {
        try {
            $query = $this->connectToDb()->prepare('DELETE FROM shoppinglistelement WHERE id = :shoppingListElementId');
            $query->execute([
                'shoppingListElementId' => $shoppingListElementId
            ]);
            return true;
        } catch (Exception $e) {
            echo $e;
            return false;
        }
    }

    public function deleteListItems(int $shoppingListId)
    {
        try {
            $query = $this->connectToDb()->prepare('DELETE FROM shoppinglistelement WHERE shoppingListId = :shoppingListId');
            $query->execute([
                'shoppingListId' => $shoppingListId
            ]);
            return true;
        } catch (Exception $e) {
            echo $e;
            return false;
        }
        
    }

    public function addListItem(int $shoppingListId, int $selectedProductId, string $productQuantity)
    {
        try {
            $query = $this->connectToDb()->prepare('INSERT INTO shoppingListElement (productId, shoppingListId, quantity)
            VALUES(:productId, :shoppingListId, :quantity)');
            $query->execute([
                'productId' => $selectedProductId,
                'shoppingListId' => $shoppingListId,
                'quantity' => $productQuantity
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }



    
}
?>