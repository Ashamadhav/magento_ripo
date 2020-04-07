<?php
namespace Magebay\Hello\Model\ResourceModel\Posts;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
 
/**
 * Class Collection
 * @package Magebay\Hello\Model\ResourceModel\Posts
 */
class Collection extends AbstractCollection
{
    /**
     * Define model &amp; resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Magebay\Hello\Model\Posts',
            'Magebay\Hello\Model\ResourceModel\Posts'
        );
    }
}