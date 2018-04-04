<?php
	include_once 'Component.php';
	class PotatoFactory{
		
		private $head;
		private $eyes;
		private $nose;
		private $mouth;
		private $feet;
		private $left;
		private $right;
		public function __construct(){
			$this->head = new component();
			$this->head->init("head", 0);
			$this->eyes = new component();
			$this->eyes->init("eyes", 0);
			$this->nose = new component();
			$this->nose->init("nose", 0);
			$this->mouth = new component();
			$this->mouth->init("mouth", 0);
			$this->feet = new component();
			$this->feet->init("feet", 0);
			$this->left = new component();
			$this->left->init("left", 0);
			$this->right = new component();
			$this->right->init("right", 0);
		}
	    public function getRandomPotato(){
	            $this->head->setStyle(rand(0, 2));
	            $this->eyes->setStyle(rand(0, 2));
	            $this->nose->setStyle(rand(0, 2));
	            $this->mouth->setStyle(rand(0, 2));
	            $this->feet->setStyle(rand(0, 2));
	            $num = rand(0, 1);
	            $this->right->setStyle($num);
	            if ($num == 1){
	            	$num = $num + rand(0,1);
	            }
	            $this->left->setStyle($num);
	            return $this->getPotato();

	    }
	    public function getDefaultPotato($d){
	        if($d == "1"){
	            $this->head->setStyle(1);
	            $this->eyes->setStyle(1);
	            $this->nose->setStyle(1);
	            $this->mouth->setStyle(1);
	            $this->feet->setStyle(1);
	            $this->left->setStyle(1);
	            $this->right->setStyle(1);
	        } else {
	            $this->head->setStyle(2);
	            $this->eyes->setStyle(2);
	            $this->nose->setStyle(2);
	            $this->mouth->setStyle(2);
	            $this->feet->setStyle(2);
	            $this->left->setStyle(2);
	            $this->right->setStyle(1);
	        }
	        return $this->getPotato();
	    }
	    public function getPotato(){
	        return array(
	            $this->head,
	            $this->eyes,
	            $this->nose,
	            $this->mouth,
	            $this->feet,
	            $this->left,
	            $this->right
	        );
	    }
	}
?>