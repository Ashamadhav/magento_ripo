<?php
/**
 * Copyright © Terrificminds, Inc. All rights reserved.
 * 
 * @category Terrificminds Module
 * @package  Terrificminds_ProductVideos
 * @author   Sreeraj N R
 */

namespace Terrificminds\ProductVideos\Block\Adminhtml\Productvideos;
/**
 * Edit block
 */

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    protected function _construct()
    {   // 1. Get ID and create model
		$this->_objectId = 'id';
        $this->_blockGroup = 'Terrificminds_ProductVideos';
        $this->_controller = 'adminhtml_productvideos';
        parent::_construct();        
        $this->buttonList->update('save', 'label', __('Save '));
        $this->buttonList->add(
            'saveandcontinue',
            array(
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => array(
                    'mage-init' => array('button' => array('event' => 'saveAndContinueEdit', 'target' => '#edit_form'))
                )
            ),
            -100
        );
    }
}
