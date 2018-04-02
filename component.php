<? php
	class Component{
		protected $color
		protected $style
		protected $imagePath

		public function __constructor($c, $s){
			$this->color = $c;
			$this->style = $s;
			$this->imagePath = $this->getImagePath();
		}
		public function setColor($c){
			$this->color = $c
			$this->imagePath = $this.getImagePath();
		}
		public function setStyle($s){
			$this->style = $s
			$this->imagePath = $this.getImagePath();
		}
		public function getColor($c){
			return $this->color;
		}
		public function getStyle($s){
			return $this->style;
		}
		public function getImagePath(){
			return "component"+$this->style+"-"+$this->color;
		}

	}

?>
