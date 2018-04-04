<?php
	include_once 'Potato.php';

	if(isset($_POST["default"])){
		$default = $_POST["default"];
		$potato = getDefault($default);
		echo json_encode($potato);
	}

	function getDefault($d){
		$potato = new Potato();
		if ($d == 0){
			$potato->getClear();
		} elseif ($d == 3) {
			$potato->getRandom();
		} else{
			$potato->getDefault($d);
		}
		return $potato;
		
	}
 ?>