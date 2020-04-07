<?php
/**
 * Copyright © Terrificminds, Inc. All rights reserved.
 * 
 * @category Terrificminds Module
 * @package  Terrificminds_ProductVideos
 * @author   Sreeraj N R
 */

namespace Terrificminds\ProductVideos\Block\Adminhtml;

class ProductVideos extends \Magento\Backend\Block\Widget\Grid\Container
{   
    protected function _construct()
    {
        $this->_controller = 'adminhtml_productvideos';
        $this->_blockGroup = 'Terrificminds_ProductVideos';
        $this->_headerText = __('Productvideos');
        $this->_addButtonLabel = __('Add New Entry'); 
        parent::_construct();
		
    }
}
