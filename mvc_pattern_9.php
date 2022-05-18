<?php

	//	MVC Model view controller pattern 
	//	The purpose of the MVC pattern is to separate the different components 
	//	of an application 
	
	
	interface IController {
		public function execute(IModel $model, IView $view);
	}
	
	interface IModel{
		public function execute();
	}

	interface IView {
		public function execute();
	}
	
	//	The controller
	//	Decides what to do
	class MultiplicationController implements IController{
		
		public function execute(IModel $model, IView $view){
			$view->result = $model->execute();
			$view->execute();
		}
		
	}
	
	//	The model 
	//	Decides what to do with the data 
	class MultiplicationModel implements IModel{
		
		private $num1;
		private $num2;
		
		public function __construct($num1, $num2){
			$this->num1 = $num1;
			$this->num2 = $num2;
		}
		
		public function execute(){
			$result = $this->num1 * $this->num2;
			return $result;
		}
		
	}
	
	//	The view
	//	Displays a view
	class MultiplicationView implements IView{
		
		public $result;
		
		public function __construct(){
			$this->result = 0;
		}

		public function execute(){
			echo "The result is: " . $this->result . ".<br/>";
		}

	}
	
	$multicontroller = new MultiplicationController();
	$multicontroller->execute(new MultiplicationModel(2, 2), new MultiplicationView());
	
?>