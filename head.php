<? php
	class Head extends Component{
		private $accessory = null;

		public function getImagePath(){
			return "head"+$this->style+"-"+$this->color;
		}

		public function setAccessory($c, $s){
			if($this->accessory === null){
				$this->accessory = new Accessory($c, $s);
			}
			$this->accessory->setColor($c);
			$this->accessory->setStyle($s);
		}

		public function getAccessory(){
			return $this->accessory;
		}

?>