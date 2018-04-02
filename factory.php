<? php
	class Factory{
		
		private $default1
		private $default2

		public function __constructor(){
			$this->default1 = array(new Head(1, 1));
			$this->default2 = array();			
		}
		public getRandom(){

		}
		public getDefault($d){
			if($d === 1){
				return $this->default1;
			}
				return $this->default2;
		}
	}

?>

0 - Head
1 - Eyebrows
2 - Eyes
3 - Nose
4 - Mouth
5 - Accessory
6 - Glasses
