<?php

class shoppingListElement
{
    private int $idProduct;
    private string $name;
    private float $quantity;
    private float $price;

    public function __construct(int $idProduct, string $catProduct, string $name, float $quantity, float $price)
    {
        $this->idProduct = $idProduct;
        $this->catProduct = $catProduct;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
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
}

?>