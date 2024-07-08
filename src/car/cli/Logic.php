<?php

namespace car\cli;

use car\cli\CarInfo;

class Logic
{
    public $carInf = [];
    private int|null $num = null;
    private int $countPassenge = 0;
    private int $maximumDistance = 0;


    public function __construct(){
        $this->getBaseTransport();
    }


    public function setParametr($num, $countPassenger, $maximumDistance) {
        $this->num = $num;
        $this->countPassenger = $countPassenger;
        $this->maximumDistance = $maximumDistance;
     }

    public function setTransport($name, $countPassenger, $maximumBaggageWeight,
                                 $consumption, $maximumDistance,
                                 $coefficient, $_cost) : void {

        $this->carInf[] = new CarInfo($name, $countPassenger, $maximumBaggageWeight,
            $consumption, $maximumDistance,
            $coefficient, $_cost);
    }

    public function getBaseTransport() :array {
        $this->carInf[0] = new CarInfo('Bus', 32, 300,
                                20, 500, 2, 5);
        $this->carInf[1] = new CarInfo('minibus', 16, 150,
            15, 300, 3, 10);
        $this->carInf[2] = new CarInfo('Car', 4, 100,
            10, 100, 5, 15);

        return $this->carInf;
    }

    public function validateData() : bool {

        if($this->num === null) {
            return false;
        }
        if ($this->carInf[$this->num]->_countPassenger < $this->countPassenger || $this->countPassenger <=0) {
           return false;
        }

        if ($this->carInf[$this->num]->_maximumDistance < $this->maximumDistance ||  $this->maximumDistance <=0) {
            return false;
        }

        return true;

    }

    public function getInformation() {

        if ($this->carInf) {
            foreach ($this->carInf as $id => $item) {
                echo "Num: {$id}, Name Transport: {$item->_name}, Count Passenger: {$item->_countPassenger}, 
                Maximum Baggage Weight: {$item->_maximumBaggageWeight}. Consumption: {$item->_consumption}, 
                Maximum Distance: {$item->_maximumDistance}, Coefficient: {$item->_coefficient}, Taxa: {$item->_cost} \n\r";
            }
        }

        exit;

    }

    public function calculate() : void {

        if( $this->validateData() ) {
            $summ = $this->carInf[$this->num]->_maximumDistance * $this->carInf[$this->num]->_cost * $this->carInf[$this->num]->_coefficient;
            echo "Summ: ".$summ;
        }

        echo 0;
    }



}