<?php
namespace Magebay\Hello\Model;
use Magento\Framework\Model\AbstractModel;
 
/**
 * Class Posts
 * @package Magebay\Hello\Model
 */
class Posts extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Magebay\Hello\Model\ResourceModel\Posts');
    }
}