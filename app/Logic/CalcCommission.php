<?php

namespace App\Logic;

class CalcCommission
{
    private $flat_rate;
    private $gross;
    private $liquid;

    public function __construct($price){
        $this->flat_rate = config('commission.flat_rate');
        $this->gross     = $price;
        $this->liquid    = $price * $this->flat_rate;
    }

    public function getFlatRate(){
        return $this->flat_rate;
    }
    public function getFlatRatePercent(){
        $n = $this->flat_rate*10;
        return $n.'%';
    }
    public function getLiquid()
    {
        return number_format($this->liquid, 2);
    }
    public function getGross()
    {
        return number_format($this->gross, 2);
    }
    public function getDiscount(){
        return number_format($this->gross - $this->liquid, 2);
    }

    public function getAll(){
        return [
            'flat_rate'         => $this->getFlatRate(),
            'flat_rate_percent' => $this->getFlatRatePercent(),
            'gross'    => $this->getGross(),
            'liquid'   => $this->getLiquid(),
            'discount' => $this->getDiscount(),
            'raw'      =>  [
                'gross'  => $this->gross,
                'liquid' => $this->liquid
            ]
        ];
    }
}