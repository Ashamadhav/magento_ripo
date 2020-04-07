<?php
/**
 * Copyright © Terrificminds, Inc. All rights reserved.
 * 
 * @category Terrificminds Module
 * @package  Terrificminds_ProductVideos
 * @author   Sreeraj N R
 */

namespace Terrificminds\ProductVideos\Model\ResourceModel\ProductVideos;
/**
 * ProductVideos Collection
 */

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Initialize ProductVideos collection
     *
     * @return void
     */

    public function _construct()
    {
        $this->_init('Terrificminds\ProductVideos\Model\ProductVideos', 'Terrificminds\ProductVideos\Model\ResourceModel\ProductVideos');
    }
}
