<?php
/**
 * Copyright © Terrificminds, Inc. All rights reserved. 
 * @category Terrificminds Module
 * @package  Terrificmind_Faq
 * @author   Asha
 */
namespace Terrificmind\Faq\Block\Adminhtml\Faq;
class Grid extends \Magento\Backend\Block\Widget\Grid\Container
{
	protected function _construct()
	{
		$this->_controller = 'adminhtml_faq';//path  to the Grid.php
		$this->_blockGroup = 'Terrificmind_Faq';// name ofmodule
		$this->_headerText = __('FrequentlyAskedQuestion');
		$this->_addButtonLabel = __('Create New FAQ');//name of button
		parent::_construct();
	}
}
