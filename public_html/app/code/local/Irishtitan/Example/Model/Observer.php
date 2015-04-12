<?php

class Irishtitan_Example_Model_Observer
{
	public function sendProductToThirdPartyAction($observer)
	{
		/* Here is the code to send a product to a third party */
        $product = $observer->getEvent()->getProduct();
	}
}