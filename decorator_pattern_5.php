<?php
	
	//	Decorator pattern.
	//	The purpose of the decorator pattern is the ability to 
	//	change functionality, but not at any time.
	
	interface IShape {
		public function execute();
	}
	
	class Shape implements IShape {
		
		public $name;
		
		public function __construct($name){
			$this->name = $name;
		}
		
		public function execute(){
			echo "I am now a " . $this->name . "!<br/>";
		}
		
	}
	
	class Shapeshifter {
		
		private $shape;
		public $name;
		
		public function __construct($name){
			$this->name = $name;
			$this->shape = "DEFAULT";
			echo "I am " . $this->name . ", a new SHAPESHIFTER! <br/>";
		}
		
		public function ChangeShape(IShape $shape){
			$this->shape = $shape;
			$this->shape->execute();
		}
		
	}

	
	$odo = new Shapeshifter("Odo");
	
	$odo->ChangeShape(new Shape("Triangle"));
	$odo->ChangeShape(new Shape("Square"));
	
?>