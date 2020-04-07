<?php
namespace Terrificminds\AdminGrid\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Terrificminds\AdminGrid\Model\Post', 'Terrificminds\AdminGrid\Model\ResourceModel\Post');
	}

}