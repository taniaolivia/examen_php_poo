<?php

namespace Models;

use Models\Payable;
class Invoice {
    public $payable = array();
    public int $totalTax = 0;
    public int $totalAmount = 0;

    public function __construct(){

    }

    public function add(Payable $p){
        $this->payable[] = $p;
        return $this->payable;
    }

    public function totalAmount(){
        foreach($this->payable as $payable){
            $this->totalAmount += $payable->cost;
        }
        return $this->totalAmount;
    }

    public function totalTax(){

        foreach($this->payable as $payable){
            $this->totalTax += $payable->taxRate;
        }
        return $this->totalTax;
    }

}