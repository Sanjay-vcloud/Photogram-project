<?php

class mic 
{
    public $brand;
    public $color;
    public $price;

    public function __construct($brand,$color,$price) {
        $this->brand = $brand;
        $this->color = $color;
        $this->price = $price;
    }

    public function display()
    {
        echo $this->brand."\n";
        echo $this->color."\n";
        echo $this->price;

    }
};
