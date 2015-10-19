<?php

class Mere
{
	public $merePublic = '<br>Mere-public';
	protected $mereProtected = '<br>Mere-protected';
	private $merePrivate = '<br>Mere-private';

	public function mereMPublic(){
		echo "<br>Mere-MPublic";
	}

	protected function mereMProtected(){
		echo "<br>Mere-MProtected";
	}

	private function mereMPrivate(){
		echo "<br>Mere-MPrivate";
	}
}

class Fille extends Mere
{
	public $fillePublic = '<br>public';
	protected $filleProtected = '<br>protected';
	private $fillePrivate = '<br>private';

	public function filleMPublic(){
		echo "<br>MPublic";
	}

	protected function filleMProtected(){
		echo "<br>MProtected";
	}

	private function filleMPrivate(){
		echo "<br>MPrivate";
	}

	public function accessFille(){
		echo "<br>Acc&egrave;s depuis la fille";
		echo $this->fillePublic;
		echo $this->filleProtected;
		echo $this->fillePrivate;
		$this->filleMPublic();
		$this->filleMProtected();
		$this->filleMPrivate();

		echo "<br>Acc&egrave;s &agrave; la mere depuis la fille";
		echo $this->merePublic;
		echo $this->mereProtected;
		
		//echo $this->merePrivate;
		//PHP Notice:
		//Undefined property: Fille::$merePrivate in ...
		
		$this->mereMPublic();
		$this->mereMProtected();
		
		//$this->mereMPrivate();
		//PHP Fatal error:
		//Call to private method Mere::mereMPrivate() 
		//from context 'Fille' in ...

	}
}

$fille = new Fille();
echo $fille->fillePublic;

//echo $fille->filleProtected;
//PHP Fatal error:  
//Cannot access protected property Fille::$filleProtected in ...

//echo $fille->fillePrivate;
//PHP Fatal error:  
//Cannot access private property Fille::$fillePrivate in ...

$fille->filleMPublic();

//$fille->filleMProtected();
//PHP Fatal error:  
//Call to protected method Fille::filleMProtected() from context '' in ...

//$fille->filleMPrivate();
//PHP Fatal error:
//Call to private method Fille::filleMPrivate() from context '' in

echo $fille->merePublic;

//echo $fille->mereProtected;
//PHP Fatal error:  
//Cannot access protected property Fille::$mereProtected in ...

//echo $fille->merePrivate;
//Undefined property: 
//Fille::$merePrivate in ...

$fille->mereMPublic();

//$fille->mereMProtected();
//PHP Fatal error:
//Call to protected method Mere::mereMProtected() from context '' in ...

//$fille->mereMPrivate();
// PHP Fatal error:
//Call to private method Mere::mereMPrivate() from context '' in ...

$fille->accessFille();
