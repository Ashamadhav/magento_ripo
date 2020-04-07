<?php
/**
 * Copyright © Terrificminds, Inc. All rights reserved. 
 * @category Terrificminds Module
 * @package  Terrificmind_Faq
 * @author   Asha
 */
namespace Terrificmind\Faq\Block\Adminhtml\Faq\Edit;
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
        parent::_construct();
        $this->setId('tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Question and answer')); // set tab title
    }
} 