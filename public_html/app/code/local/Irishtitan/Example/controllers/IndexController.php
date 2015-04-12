<?php

class Irishtitan_Example_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		$this->loadLayout();

		$block = $this->getLayout()->createBlock('irishtitan_example/example');

		$this->getLayout()->getBlock('content')->insert($block);

		$this->renderLayout();
	}
}