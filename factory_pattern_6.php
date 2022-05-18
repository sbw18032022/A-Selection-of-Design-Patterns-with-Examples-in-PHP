<?php
	
	//	Factory pattern 
	//	The purpose of the factory pattern is to make many objects
	
	//	This is the car 
	class Car {
		
		private $noDoors;
		private $noWheels;
		private $colour;
		private $engineType;
		
		public function __construct($doors, $wheels, $colour, $engine){
			$this->noDoors = $doors;
			$this->noWheels = $wheels;
			$this->colour = $colour;
			$this->engineType = $engine;
		}
		
		public function Beep(){
			echo "Car goes beep beep! <br/>";
		}
		
	}
	
	//	Makes a car 
	class CarFactory {
		
		public function MakeCar($doors, $wheels, $colour, $engine){
			return new Car($doors, $wheels, $colour, $engine);
		}
		
	}
	
	$cf = new CarFactory();
	
	$carOrder = array();
	
	$noCars = 5;
	
	for($i = 0; $i < $noCars; $i++){
		array_push($carOrder, $cf->MakeCar(5, 4, "GREEN", "ELECTRIC"));
	}
	
	var_dump($carOrder);
	
?>