<?php
class Cared_DB_Connection {
	
	protected $dsn;
	protected $username;
	protected $password;
	
	protected static $link;
	
	private function __construct($dsn, $username, $password){
		
		$this->dsn = $dsn;
		$this->username = $username;
		$this->password = $password;
		
		$this->connect();
	}
	
	public function getInstance($dsn = null, $username = null, $password = null){
		if(! self::$link instanceof PDO){
			new self($dsn, $username, $password);
		}
		
		return self::$link;
	}
	
	public function connect(){
		
		self::$link = new PDO($this->dsn, $this->username, $this->password);
		
	}
	
	public function __sleep(){
		return array('dsn', 'username', 'password');
	}
	
	public function __wakeup(){
		$this->connect();
	}
	
	public static function getDb(){
		return self::$link;
	}
}