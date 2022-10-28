<?php

namespace Models;


class Ticket{
    public string $reference;
    public float $price;

    public function getReference(){
        return $this->reference;
    }

    public function setReference($reference){
        $this->reference = $reference;
        return $this->reference;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price/100;
        return $this->price;
    }

}