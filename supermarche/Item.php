<?php

namespace Models;


class Item{
    public string $name;
    public string $price;
    public int $weight;

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = number_format(($price/100), 2);
        return $this->price;
    }

    public function getWeight(){
        return $this->weight;
    }

    public function setWeight($weight){
        $this->weight = $weight;
        return $this->weight;
    }

}