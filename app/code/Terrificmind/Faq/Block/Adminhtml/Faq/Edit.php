<?php
/**
 * Copyright © Terrificminds, Inc. All rights reserved. 
 * @category Terrificminds Module
 * @package  Terrificmind_Faq
 * @author   Asha
 */
namespace Terrificmind\Faq\Block\Adminhtml\Faq;
/**
 * Edit block
 */
class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    protected function _construct()
    {   
        $this->_objectId = 'id';
        $this->_blockGroup = 'Terrificmind_Faq';
        $this->_controller = 'adminhtml_faq';
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
