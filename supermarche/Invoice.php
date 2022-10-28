<?php

namespace Models;

use Models\Payable;
class Invoice {
    public $payable = array();
    public function __construct(){

    }

    public function add(Payable $p){
        $this->payable[] = $p;
        return $this->payable;
    }

    public function totalAmount(){
        foreach($this->payable as $payable){
            $this->payable += $payable->cost;
        }
        return $this->payable;
    }

    public function totalTax(){
        foreach($this->payable as $payable){
            $this->payable += $payable->taxRate;
        }
        return $this->payable;
    }

}