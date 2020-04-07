<?php

namespace TM\MenuLabel\Model\ResourceModel\Menulabel;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('TM\MenuLabel\Model\Menulabel', 'TM\MenuLabel\Model\ResourceModel\Menulabel');
    }

}
?>
