<?php

class Irishtitan_Example_Block_Example extends Mage_Core_Block_Template
{
	public function __construct()
	{
		parent::__construct();

		$this->setTemplate('irishtitan_example/example.phtml');
	}
}