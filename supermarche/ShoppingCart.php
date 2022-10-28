<?php

namespace Models;
class ShoppingCart{

    private string $id;
    public $cart = array();
    public $totalPrice;

    public function getId(){
        $this->id = uniqid();
        return $this->id;
    }

    public function getCart(){
        $row = "";

        foreach($this->cart as $item){
            if(isset($item->bestBeforeDate)){
                $row  .= "<li>" . $item->name . "  : " . $item->price . "€" .", Best before : " . $item->bestBeforeDate . "</li><br>";
            }else{
                $row .= "<li>" . $item->name . "  : " . $item->price . "€" ."</li><br>";
            }
        }
        return $row;
    }

    public function addItem($item){
        if($item->weight > 10000){
            echo "<br>Item can't exceed 10kg or 10000g<br>";
        }else{
            array_push($this->cart, $item);
            return $this->cart;
        }
    }

    public function removeItem($item){
        if(in_array($item, $this->cart, true)){
            $key = array_search($item, $this->cart);
            unset($this->cart[$key]);

            return $this->cart;
        }else{
            return false;
        }
    }

    public function itemCount(){
        return sizeof($this->cart);
    }

    public function totalPrice(){
        $this->totalPrice = 0;
        foreach($this->cart as $item){
            $this->totalPrice += $item->price;
        }
        return $this->totalPrice;
    }

    public function toString(){
        echo "<br>Cart id : " . $this->getId() . "<br>Number of items : " . $this->itemCount() . "<br>List of the items : " . $this->getCart();
        $this->cart = array();
    }
}