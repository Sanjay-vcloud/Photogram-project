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
        echo $this->brand;
        echo $this->color;
        echo $this->price;

    }
};
