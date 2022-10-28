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
                $row  .= "<li>" . $item->name . "  : " . $item->price . "€, weight : " . $item->weight . " grams, best before : " . $item->bestBeforeDate . "</li><br>";
            }
            elseif(isset($item->reference) && !isset($item->weight) && !isset($item->name)){
                $row .= "<li>" . $item->reference . "  : " . $item->price . "€" ."</li><br>";
            }
            elseif(!isset($item->bestBeforeDate) && !isset($item->reference)){
                $row .= "<li>" . $item->name . "  : " . $item->price . "€, weight : " . $item->weight . " grams" ."</li><br>";
            }
        }
        return $row;
    }

    public function addItem($item){
        if(isset($item->weight)){
            if($item->weight > 1000){
                echo "<br>Item can't exceed 10kg or 10000g<br>";
            }
            else{
                array_push($this->cart, $item);
                return $this->cart;
            }
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
    }
}