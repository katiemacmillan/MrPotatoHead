<? php
	class Accessory{
		public function getImagePath(){
			return "accessory"+$this->style+"-"+$this->color;
		}
	}
?>
