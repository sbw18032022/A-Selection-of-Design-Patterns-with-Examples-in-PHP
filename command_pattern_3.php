<?php
	
	//	Command pattern.
	
	interface ISpell {
		public function execute();
	}
	
	//	A single spell
	class Spell implements ISpell {
		
		public $spellName;
		
		public function __construct($spellName){
			$this->spellName = $spellName;
		}
		
		public function execute(){
			echo "Casting... " . $this->spellName . "!<br/>";
		}
		
	}
	
	//	A wand
	class Wand {
		
		private $usages;
		
		public function __construct(){
			$usages = 0;
		}
		
		public function execute(){
			
			$this->usages += 1;
			
			switch($this->usages){
				
				case 1:
					$this->SpellOne(new Spell("Wingardium Leviohsa"));
				break;
				
				case 2:
					$this->SpellTwo(new Spell("Expelliarmus"));
					$this->usages = 0;
				break;	
				
			}
			
		}
		
		public function SpellOne(ISpell $spell){
			$spell->execute();
		}
		
		public function SpellTwo(ISpell $spell){
			$spell->execute();
		}
		
	}
	
	//	A wizard
	class Wizard {
		
		//	Wizard's name 
		public $name;
		
		//	Every wizard needs a wand.
		private $wand;
		
		//	Constructor
		public function __construct($name, $wand){
			$this->name = $name;
			$this->wand = $wand;
			echo "You're a wizard, " . $name . "! <br/>";
		}
		
		//	Cast the magic spell
		public function CastSpell(){
			$this->wand->execute();
			$this->wand->execute();
			$this->wand->execute();
		}
		
	}

	
	$harry = new Wizard("Harry", new Wand());
	$harry->CastSpell();
	
?>