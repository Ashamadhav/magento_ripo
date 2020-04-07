<?php
namespace TM\MenuLabel\Model;

class Menulabel extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('TM\MenuLabel\Model\ResourceModel\Menulabel');
    }
}
?>