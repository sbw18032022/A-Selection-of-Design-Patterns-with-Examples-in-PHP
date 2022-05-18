<?php
	
	//	Observer pattern 
	//	The purpose of the observer pattern is to make changes to multiple 
	//	objects that are subscribed. 
	
	interface IBank {
		public function AddSubscriber(ISubscriber $subscriber);
		public function RaiseRates();
	}
	
	interface ISubscriber {
		public function ReactToChanges();
	}
	
	//	The bank object 
	class Bank implements IBank {
		
		public $subscribers;
		public $rates;
		
		public function __construct(){
			$this->subscribers = array();
		}
		
		public function AddSubscriber(ISubscriber $subscriber){
			array_push($this->subscribers, $subscriber);
		}
		
		public function RaiseRates(){
			
			echo "Raising the rates. <br/>";
			
			for($i = 0; $i < count($this->subscribers); $i++){
				$this->subscribers[$i]->ReactToChanges();
			}
			
		}
		
	}
	
	class RetiredCustomer implements ISubscriber {
		
		public function ReactToChanges(){
			echo "Yay! <br/>";
		}
		
	}
	
	class MortgageCustomer implements ISubscriber {
		
		public function ReactToChanges(){
			echo "Booo. <br/>";
		}
		
	}
	
	$bank = new Bank();
	
	$bank->AddSubscriber(new RetiredCustomer());
	$bank->AddSubscriber(new MortgageCustomer());
	$bank->AddSubscriber(new MortgageCustomer());
	
	$bank->RaiseRates();
	
?>