<?php
abstract class Cared_Career {
	
	protected $id;
	protected $title;
	protected $description;
	protected $dateStart;
	protected $dateEnd;

	public function __construct($data){
		
	}
	
	public function setId($id){
		$this->id = $id;
		return $this;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setTitle($title){
		$this->title = $title;
		return $this;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function setDescription($description){
		$this->description = $description;
		return $this;
	}
	
	public function getDescription(){
		return $this->description;
	}
	
	public function setDateStart($dateStart){
		$this->dateStart = $dateStart;
		return $this;
	}
	
	public function getDateStart(){
		return $this->dateStart;
	}
	
	public function setDateEnd($dateEnd){
		$this->dateEnd = $dateEnd;
		return $this;
	}
	
	public function getDateEnd(){
		return $this->dateEnd;
	}
}