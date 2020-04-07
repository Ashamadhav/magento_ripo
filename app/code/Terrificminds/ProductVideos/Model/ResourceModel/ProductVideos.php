<?php
/**
 * Copyright © Terrificminds, Inc. All rights reserved.
 * 
 * @category Terrificminds Module
 * @package  Terrificminds_ProductVideos
 * @author   Sreeraj N R
 */

namespace Terrificminds\ProductVideos\Model\ResourceModel;
/**
 * ProductVideos Resource Model Class
 */
class ProductVideos extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Constructor
     * @return void
     */
    public function _construct()
    {
        $this->_init('product_related_videos', 'id');
    }
}
