<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @copyright   Copyright (c) 2010 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * admin product edit tabs
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class AHT_Advancedmedia_Block_Adminhtml_Catalog_Product_Video
	extends Mage_Adminhtml_Block_Template
	implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('advancedmedia/video.phtml');
    }

	/**
	 * Retrieve the label used for the tab relating to this block
	 *
	 * @return string
	 */
	public function getTabLabel()
	{
		return $this->__('Videos');
	}

	/**
	 * Retrieve the title used by this tab
	 *
	 * @return string
	 */
	public function getTabTitle()
	{
		return $this->__('Add videos to a product');
	}

	/**
	 * Determines whether to display the tab
	 * Add logic here to decide whether you want the tab to display
	 *
	 * @return bool
	 */
	public function canShowTab()
	{
		return true;
	}

	/**
	 * Stops the tab being hidden
	 *
	 * @return bool
	 */
	public function isHidden()
	{
		return false;
	}

	public function getMediaUrl(){
		return Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA);
	}

	public function getCancelImg(){
		return $this->getMediaUrl().'advancedmedia/uploadify/cancel.png';
	}

	public function getUploaderSwfUrl(){
		return $this->getMediaUrl().'advancedmedia/uploadify/uploadify.swf';
	}

	public function getScriptAction(){
		return Mage::getUrl('advancedmedia/index/upload');
	}

	public function getMedia(){
		$collection = Mage::getModel('advancedmedia/advancedmedia')->getCollection();
		return $collection;
	}

	public function getMediaByProduct(){
		if($productId = $this->getRequest()->getParam('id')){
			$media = $this->getMedia()->addFieldToFilter('product_id', $productId);
		}
		return $media;
	}

	public function getLastedId(){
		$media = $this->getMedia()->setOrder('advancedmedia_id', 'DESC')->setPageSize(1);
		if(count($media)>0){
			foreach($media as $_media){
				return $_media->getId();
			}
		}
		else{
			return 0;
		}
	}
}
