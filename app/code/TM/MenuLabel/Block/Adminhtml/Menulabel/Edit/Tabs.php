<?php
namespace TM\MenuLabel\Block\Adminhtml\Menulabel\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
		
        parent::_construct();
        $this->setId('checkmodule_menulabel_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Menulabel Information'));
        $this->_headerText = __('B2B Category Label');
    }
}