<?php
namespace TM\MenuLabel\Block\Adminhtml\Menulabel;

/**
 * CMS block edit form container
 */
class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    protected function _construct()
    {
		$this->_objectId = 'id';
        $this->_blockGroup = 'TM_MenuLabel';
        $this->_controller = 'adminhtml_menulabel';
        parent::_construct();

        $this->buttonList->update('save', 'label', __('Save Label'));
        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('block_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'hello_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'hello_content');
                }
            }
        ";
    }

    /**
     * Get edit form container header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('menulabel_menulabel')->getId()) {
            return __("Edit Item '%1'", $this->escapeHtml($this->_coreRegistry->registry('menulabel_menulabel')->getTitle()));
        } else {
            return __('New Label');
        }
    }
}
