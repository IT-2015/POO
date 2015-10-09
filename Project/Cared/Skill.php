<?php

class Cared_Skill {
	
	protected $id;
	protected $title;
	protected $level;
	protected $description;
	
	/*
	 * $data = array(
	 * 	"id" => 3,
	 * 	"title" => "test"					
	 * )
	 **/
	public function __construct($data){
		foreach ($data as $key => $value){
			$method_name = "set" . ucfirst($key);
			if(method_exists($this, $method_name)){
				$this->$method_name = $value;
			}
		}
	}
	
	
	public function setId($id){
		$this->id = $id;
		return $this;
	}
	
	public function setTitle($title){
		$this->title = $title;
		return $this;
	}
	
	public function setLevel($level){
		$this->level = $level;
		return $this;
	}
	
	public function setDescription($description){
		$this->description = $description;
		return $this;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function getLevel(){
		return $this->level;
	}
	
	public function getDescription(){
		return $this->description;
	}
}