<?php
namespace TM\MenuLabel\Block\Adminhtml;
class Menulabel extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
		
        $this->_controller = 'adminhtml_menulabel';/*block grid.php directory*/
        $this->_blockGroup = 'TM_MenuLabel';
        $this->_headerText = __('Menulabel');
        $this->_addButtonLabel = __('Add New Entry'); 
        parent::_construct();
		
    }
}
