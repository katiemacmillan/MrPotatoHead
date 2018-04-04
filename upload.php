<?php
// header('Content-Type: application/json');
include_once 'Component.php';
include_once 'Potato.php';
// session_start();

if(isset($_POST["filePath"])){
	$potato = loadFile($_POST["filePath"]);
	echo json_encode($potato);
}


function loadComponent($xml, $potato){
	$component = new Component();
	$component->imagePath = $xml->__toString();
	
	foreach ($xml->attributes() as $key => $value)
	{
		if ($key == "style")
		{
			$component->style = $value->__toString();
		} 
		else if ($key == "name")
		{
			$component->name = $value->__toString();
		}
	}
	$potato->addComponent($component);
}
function loadFile($fileName){
	// echo "HERE";
	$xml=simplexml_load_file($fileName)
	or die("Error: Cannot load object");

	if ($xml->getName() != "potato"){
		echo "invalid xml file" . "<br/>";
		return;
	}

	$potato = new Potato();
	foreach ($xml->children() as $child) {
		$node = $child->getName();
		if($node == "component"){
			loadComponent($child, $potato);
		}
	}
	// return json_encode($potato->displayPotato());
	return $potato;
}

 ?>