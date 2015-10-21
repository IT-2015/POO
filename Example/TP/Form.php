<?php
class Form {
	protected $attribs = array();

	protected $elements = array();

	public function __construct(array $array = null){
		if($array != null)
			$this->setAttribs($array);

		$this->init();
	}

	public function init(){
		
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

	public function setAction($name){
		$this->setAttrib('action', $name);
	}

	public function setMethod($value){
		$this->setAttrib('method', $value);
	}

	public function setAttrib($key, $value){
		if(is_string($key))
			$this->attribs[$key] = $value;
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

	public function addElement(Form_Element $element, $order = null){
		if($order != null)
			$this->elements[$order] = $element;
		else
			$this->elements[] = $element;
	}

	public function removeElement($name){
		foreach ($this->elements as $key => $element) {
			if($element->getName() == $name){
				unset($this->elements[$key]);
			}
		}
	}

	public function render(){
		$html = '<form';
		$str_attribs = null;
		foreach ($this->attribs as $key => $value) {
			//type="text"
			$str_attribs .= ' ' . $key . '=' . '"' . $value . '"';
		}
		$html .= $str_attribs . ' ' . '>';

		sort($this->elements);
		$this->elements = array_reverse($this->elements);

		foreach ($this->elements as $element) {
			$html .= $element;
		}

		$html .= '</form>';
		return $html;
	}

	public function __toString(){
		return $this->render();
	}
}
