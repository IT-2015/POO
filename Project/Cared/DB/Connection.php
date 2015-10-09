<?php
class Cared_DB_Connection {
	
	protected $dsn;
	protected $username;
	protected $password;
	
	public function __construct($dsn, $username, $password){
		
		$this->dsn = $dsn;
		$this->username = $username;
		$this->password = $password;
		
		$this->connect();
	}
	
	public function connect(){
		
		$this->link = new PDO($this->dsn, $this->username, $this->password);
		
	}
	
	public function __sleep(){
		return array('dsn', 'username', 'password');
	}
	
	public function __wakeup(){
		$this->connect();
	}
	
	
}