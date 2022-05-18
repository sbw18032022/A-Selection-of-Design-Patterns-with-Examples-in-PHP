<?php

	//	The Singleton design pattern.
	//	The purpose of the singleton design pattern is to keep one instance 
	//	of a class at any one time.
	
	class TheCounter {
		
		//	A simple counter 
		public $counter;
		
		//	The instance 
		private static $singleInstance = null;
		
		//	Constructor
		public function __construct(){
			$this->counter = 0;
		}
		
		//	If the single instance is null, make a new instance of self 
		//	otherwise do nothing and return self 
		public static function makeOne(){
			
			if(self::$singleInstance == null){
				
				self::$singleInstance = new TheCounter();
				
			}
			
			return self::$singleInstance;
			
		}
		
		//	Increment the counter by one. 
		public function Increment(){
			$this->counter += 1;
		}
		
	}
	
	//	Only does it once
	$individual = TheCounter::makeOne();
	
	$individual->Increment();
	echo "counter is: " . $individual->counter;
	
	//	Doesn't do this the second time
	$individual2 = TheCounter::makeOne();
	
	echo "<br/>";
	
	$individual2->Increment();
	
	echo "counter is: " . $individual2->counter;
	
	$individual->Increment();
	
	echo "<br/>";
	
	echo "counter is: " . $individual2->counter;


?>