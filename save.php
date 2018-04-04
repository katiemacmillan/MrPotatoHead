<?php

	if(isset($_POST["fileData"])){
		$potato = json_decode($_POST["fileData"]);
		save($potato);
	}

	function save($potato){
		$xmlTest = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><potato></potato>');
		foreach ($potato as $name => $style) {
			echo $name;
			echo $style . "<br>";
			$child = $xmlTest->addChild('component', 'Images/' . $name . $style . '.png');
			$child->addAttribute('name', $name);
			$child->addAttribute('style', $style);
		}
		$xmlTest->saveXML("out.xml");

	}
?>