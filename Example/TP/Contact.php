<?php

require_once 'Form.php';
require_once 'Form/Element.php';
class Form_Contact extends Form {
	
	public function init(){

		$inputText = new Form_Element([
			'name' => 'test',
			'type' => 'text',
			'class'=> 'form-input',
			'placeholder' => 'Test'
		]);

		$inputSubmit = new Form_Element([
			'name' => 'send',
			'type' => 'submit',
			'class'=> 'form-submit'
		]);

		$this->setMethod('POST');
		$this->setAction('');
		$this->addElement($inputText);
		$this->addElement($inputSubmit);

	}
}
