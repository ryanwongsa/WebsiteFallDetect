<?php
class dPat{
private $pid;
private $long;
private $lang;
private $fallTime;
private $UUIDD;
private $carerID;
private $status;
private $type;

	function __construct($pid,$UUID,$long, $lang , $falltime , $type ) {
	$this-> pid = $pid ;
	$this-> UUIDD = $UUID ;
	$this-> long = $long ;
	$this-> lang = $lang ;
	$this-> falltime = $falltime ;
	$this-> type = $type ;
	}

	public function setCarerID($careID,$status){
	$this-> carerID = $careID ;
	$this-> status= $status ;
	}

	public function getPid(){
		return $this->pid;
	}

	public function setPid($pid){
		$this->pid = $pid;
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

	public function getUUIDD(){
		return $this->UUIDD;
	}

	public function setUUIDD($UUIDD){
		$this->UUIDD = $UUIDD;
	}

	public function getCarerID(){
		return $this->carerID;
	}

	public function getFalltime(){
		return $this->falltime;
	}


	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
	}

}
?>