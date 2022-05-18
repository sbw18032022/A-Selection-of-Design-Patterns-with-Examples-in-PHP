<?php
	
	//	Strategy pattern 
	//	The purpose of the strategy pattern is to be able to 
	//	change functionality depending on the circumstances.
	
	//	The interface 
	interface IWillSurvive {
		public function execute();
	}
	
	//	Flight response 
	class Flight implements IWillSurvive {
	
		public function execute(){
			echo "I am fleeing! <br/>";
		}
		
	}
	
	//	Fight response
	class Fight implements IWillSurvive {
		
		public function execute(){
			echo "I am fighting! <br/>";
		}
	
	}
	
	//	An animal fights or flees depending on the threat level
	class Animal {
	
		public $threatLevel;
		
		public function __construct(){
			$this->threatLevel = 0;	
			echo "I am a new animal. <br/>";
		}
		
		//	Decide on a strategy for survival.
		public function Decide($s1, $s2){
			
			if($this->threatLevel >= 5){
				$s2->execute();
			} else {
				$s1->execute();
			}
			
		}
		
	}
	
	//	Make a new animal.
	$smallAnimal = new Animal();
	
	//	Threat level is 7, flee.
	$smallAnimal->threatLevel = 7;
	
	//	Fight or flee?
	$smallAnimal->Decide(new Fight(), new Flight());
	
	//	Threat level is reduced.
	$smallAnimal->threatLevel = 3;
	
	//	Fight or flee?
	$smallAnimal->Decide(new Fight(), new Flight());
	
?>