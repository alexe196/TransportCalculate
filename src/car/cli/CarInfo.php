<?php

namespace car\cli;

class CarInfo
{
    public string $_name;
    public string $_countPassenger;
    public int $_maximumBaggageWeight;
    public float $_consumption;
    public int $_maximumDistance;
    public int $_coefficient;
    public int $_cost;

    public function __construct($name, $countPassenger, $maximumBaggageWeight,
                                $consumption, $maximumDistance,
                                $coefficient, $_cost)
    {
        $this->_name = $name;
        $this->_countPassenger = $countPassenger;
        $this->_maximumBaggageWeight = $maximumBaggageWeight;
        $this->_consumption = $consumption;
        $this->_maximumDistance = $maximumDistance;
        $this->_coefficient = $coefficient;
        $this->_cost = $_cost;

    }

}