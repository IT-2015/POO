<?php
class Form_Element {
	
	protected $attribs = array();

	public function setAttrib($key, $value){
		if(is_string($key))
			$this->attribs[$key] = $value;
	}

	public function __construct(array $array){
		$this->setAttribs($array);
	}

	public function __call($methodName, $args){
		$methodName = strtolower($methodName);
		$key = substr($methodName, 3);
		$setGet = substr($methodName, 0, 3);
		if($setGet == 'set'){
			$this->setAttrib($key, $args[0]);
		} elseif($setGet == 'get') {
			return $this->getAttrib($key);
		}
	}

	public function setName($name){
		$this->setAttrib('name', $name);
	}

	public function setValue($value){
		$this->setAttrib('value', $value);
	}

	public function setType($type){
		$this->setAttrib('type', $type);
	}

	public function getAttrib($key){
		return $this->attribs[$key];
	}

	public function getAttribs(){
		return $this->attribs;
	}

	public function setAttribs(array $array){
		foreach ($array as $key => $value) {
			$this->setAttrib($key, $value);
		}
	}

	public function clearAttribs(){
		$this->attribs = array();
	}

	public function removeAttrib($key){
		if(isset($this->attribs[$key]))
			unset($this->attribs[$key]);
	}

	public function removeAttribs(array $array) {
		foreach ($array as $key) {
			$this->removeAttrib($key);
		}
	}

	public function render(){
		$html = '<input';
		$str_attribs = null;
		foreach ($this->attribs as $key => $value) {
			//type="text"
			$str_attribs .= ' ' . $key . '=' . '"' . $value . '"';
		}
		$html .= $str_attribs . ' ' . '>';
		return $html;
	}

	public function __toString(){
		return $this->render();
	}
}
