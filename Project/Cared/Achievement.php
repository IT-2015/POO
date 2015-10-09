<?php
class Cared_Achievement {
	
	protected $id;
	protected $title;
	protected $description;
	protected $year;
	protected $path;
	
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
	
	public function setYear($year){
		$this->year = $year;
		return $this;
	}
	
	public function getYear(){
		return $this->year;
	}
	
	public function setPath($path){
		$this->path = $path;
		return $this;
	}
	
	public function getPath(){
		return $this->path;
	}
	
}