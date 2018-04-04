<?php
	include_once 'Component.php';
	include_once 'PotatoFactory.php';

	class Potato{
		public $potato;
		private $factory;

		public function __construct(){
			$this->potato = array();
			$this->factory = new PotatoFactory();
		}

		public function clearPotato(){
			$this->potato = array();
		}
		public function addComponent($c){
			$this->potato[] = $c;
		}
		public function getDefault($default){
			$this->potato = $this->factory->getDefaultPotato($default);
		}
		public function getRandom(){
			$this->potato = $this->factory->getRandomPotato();
		}
		public function getClear(){
			$this->potato = $this->factory->getPotato();
		}
	}

?>