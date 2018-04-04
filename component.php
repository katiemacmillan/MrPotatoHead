<?php
	class Component{
		public $style;
		public $imagePath;
		public $name;
		public function __construct(){
		}
		public function init($n, $s){
			$this->style = $s;
			$this->name = $n;
			$this->imagePath = "Images/" . $this->name . $this->style . ".png"; 	
		}
		public function setStyle($s){
			$this->style = $s;
			$this->imagePath = "Images/" . $this->name . $this->style . ".png";
		}
	}
?>
