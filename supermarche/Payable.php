<?php

namespace Models;

class Payable{
    public string $label = "";
    public float $cost;
    public float $taxRate;

    public function label($class){
        if($class instanceof Ticket){
            $this->label = "Ticket need to be paid";
        }elseif($class instanceof Item){
            $this->label = "Item need to be paid";
        }elseif($class instanceof FreshItem){
            $this->label = "Fresh item need to be paid";
        }

        return $this->label;
    }

    public function cost($cost){
        $this->cost = $cost;
        return $this->cost;
    }

    public function taxRatePerTenThousand($class){
        if($class instanceof Item){
            if($class->weight < 1000){
                $this->taxRate = 1000/100;
                return $this->taxRate;
            }elseif($class->weight > 1000 && $class->weight < 2000){
                $this->taxRate = 1000/100 - 0.1;
                return $this->taxRate;
            }
        }elseif($class instanceof FreshItem){
            $this->taxRate = 1000/100;
            return $this->taxRate;
        }elseif($class instanceof Ticket){
            $this->taxRate = 2500/100;
            return $this->taxRate;
        }
       
    }

}