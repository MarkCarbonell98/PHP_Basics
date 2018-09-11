<?php

class Car {
    //similar to var 
    public $wheels = 4;
    //protects the property to stay only inside this class OR its subclasses
    protected $hood = 1;
    //only avaliable inside of this class
    private $engine = 4;
    var $lights = 10;
    var $doors = 4;
    //makes the property only available when concadenated with this class
    static $speed = 160;
    function moveWheels() {
        // echo $this;
        echo $this->wheels . '<br>';
        echo " the wheels move " . '<br>';
        $this->wheels = 10;
        echo $this->wheels. '<br>';
    }

    function createDoors() {
        $this->doors = 8;
    }

    //the constructor is executed every time the class is instanciated
    function __construct() {
        echo $this->wheels = 25;
    }

    function accelerate() {
        echo Car::$speed + 20;
    }
}

//instanciate a class in php
$bmw = new Car();
$bmw->moveWheels();
//  echo $bmw->wheels. '<br>'; echo $bmw->hood. '<br>'; echo $bmw->engine. '<br>'; echo $bmw->lights. '<br>';

// Car.moveWheels();

if(class_exists("Car")) {
    echo 'yeiiii' . '<br>';
}

if(method_exists("Car","moveWheels")) {
    echo ' the method actually exists bro ' . '<br>';
}

//the class plane inherits the properties and methods of the Car property
class Plane extends Car {

}

$jet = new Plane();
 echo $jet->wheels . '<br>';
 echo $jet->moveWheels() . '<br>';

 //notation to call a static property and a method that alters a static property
 echo Car::$speed . '<br>';
 echo Car::accelerate();

