<?php

namespace Models;

class Payable{
    public string $label = "The amount you need to pay";
    public float $cost;
    public string $taxRate;

    public function label(){
        return $this->label;
    }

    public function cost($cost){
        $this->cost = $cost;
        return $this->cost;
    }

    public function taxRatePerTenThousand($class){
        if($class instanceof Item){
            if($class->weight < 1000){
                $this->taxRate = "Tax rate : " . 1000/100 . "%";
                return $this->taxRate;
            }elseif($class->weight > 1000 && $class->weight < 2000){
                $this->taxRate = "Tax rate : " . 1000/100 - 0.1 . "%";
                return $this->taxRate;
            }
        }elseif($class instanceof FreshItem){
            $this->taxRate = "Tax rate : " . 1000/100 . "%";
            return $this->taxRate;
        }elseif($class instanceof Ticket){
            $this->taxRate = "Tax rate : " . 2500/100 . "%";
            return $this->taxRate;
        }
       
    }

}