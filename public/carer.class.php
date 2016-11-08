<?php
class carer{
private $id;
private $long;
private $lang;
private $name;
private $contact;
private $status;
private $patStatus;
private $assignID;
	function __construct($id,$long,$lan,$name,$contact,$status){
		$this -> id = $id;
		$this -> long= $long;
		$this -> lang= $lan ;
		$this -> name= $name;
		$this -> contact= $contact;
		$this -> status= $status;
	}
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getLong(){
		return $this->long;
	}

	public function setLong($long){
		$this->long = $long;
	}

	public function getLang(){
		return $this->lang;
	}

	public function setLang($lang){
		$this->lang = $lang;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getContact(){
		return $this->contact;
	}

	public function setContact($contact){
		$this->contact = $contact;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function getPatStatus(){
		return $this->patStatus;
	}

	public function setPatStatus($patStatus){
		$this->patStatus = $patStatus;
	}

	public function getAssignID(){
		return $this->assignID;
	}

	public function setAssignID($assignID){
		$this->assignID = $assignID;
	}



}
?>