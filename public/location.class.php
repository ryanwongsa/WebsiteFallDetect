<?php

class location{
	var $long;
	var $lang;
	var $id;
	var $type;
	function __construct($long,$lang,$id,$type) {
		$this->long=$long;
		$this->lang=$lang;
		$this->id=$id;
		$this->type=$type;
	}
	
	function getLong(){
	return $this->long;
	}

	function getLan(){
	return $this->lang;
	}

	function getId(){
	return $this->id;
	}

	function getType(){
	return $this->type;
	}

}


?>