<?php
namespace Magebay\Hello\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
 
/**
 * Class Posts
 * @package Magebay\Hello\Model\ResourceModel
 */
class Posts extends AbstractDb
{
    protected function _construct()
    {
        // magebay_news is table name, news_id is Primary of Table
        $this->_init('magebay_news', 'news_id');
    }
}