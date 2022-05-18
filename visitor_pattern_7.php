<?php
	
	//	Visitor pattern 
	//	The purpose of the visitor pattern is for an object to 
	//	access methods of other classes without them becoming a part 
	//	of it, like a reverse of the command pattern 
	
	interface IJob {
		public function HireEmployee(IEmployee $employee);
		public function FireEmployee();
		public function SpecialJob();
	}
	
	interface IEmployee {
		public function SayName();
	}
	
	//	Low pay job 
	class CompanyA implements IJob {
		
		public $employee;
		public $jobDescription;
		
		public function __construct(){
			$this->employee = "DEFAULT";
			$this->jobDescription = "LOW WAGE";
		}
		
		public function HireEmployee(IEmployee $employee){
			$this->employee = $employee;
		}
		
		public function FireEmployee(){
			echo $this->employee->name . "is now fired.<br/>";
			$this->employee = "NOTHING";
		}
		
		public function SpecialJob(){
			echo $this->employee->name . " is doing the job of " . $this->jobDescription . ". <br/>";
		}
		
	}
	
	//	High pay job 
	class CompanyB implements IJob {
		
		public $employee;
		public $jobDescription;
		
		public function __construct(){
			$this->employee = "DEFAULT";
			$this->jobDescription = "SPECIAL";
		}
		
		public function HireEmployee(IEmployee $employee){
			$this->employee = $employee;
		}
		
		public function FireEmployee(){
			echo $this->employee->name . "is now fired.<br/>";
			$this->employee = "NOTHING";
		}
		
		public function SpecialJob(){
			echo $this->employee->name . " is doing the job of " . $this->jobDescription . ". <br/>";
		}
		
	}
	
	//	The employee
	class Employee implements IEmployee {
		
		public $name;
		
		public function __construct($name){
			$this->name = $name;
			$this->SayName();
		}
		
		public function SayName(){
			echo "Hello, I am " . $this->name! . ".<br/>";
		}
		
	}
	
	$bob = new Employee("Bob");
	
	$companyA = new CompanyA();
	$companyB = new CompanyB();
	
	$companyA->HireEmployee($bob);
	$companyA->SpecialJob();
	$companyA->FireEmployee();
	
	$companyB->HireEmployee($bob);
	$companyB->SpecialJob();
	$companyB->FireEmployee();
	
	
	
	
?>