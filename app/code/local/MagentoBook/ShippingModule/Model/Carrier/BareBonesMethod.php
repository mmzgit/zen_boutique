<?php
class MagentoBook_ShippingModule_Model_Carrier_BareBonesMethod extends
Mage_Shipping_Model_Carrier_Abstract
{
	protected $_code = 'shippingmodule';
	public function collectRates(Mage_Shipping_Model_Rate_Request $request)
	{
		if (!$this->getConfigData('active')) {
			Mage::log('The '.$this->_code.' shipping method is not active.');
			return false;
		}
		$handling = $this->getConfigData('handling');
		$result = Mage::getModel('shipping/rate_result');
		foreach ($response as $method) {
			$rMethod = Mage::getModel('shipping/rate_result_method');
			$method->setCarrier($this->_code);
			$method->setCarrierTitle($this->getConfigData('title'));
					$method->setMethod($method['code']);
					$method->setMethodTitle($method['title']);
					$method->setCost($method['amount']);
					$method->setPrice($method['amount']+$handling);
					$result->append($method);
		}
		return $result;
	}
}