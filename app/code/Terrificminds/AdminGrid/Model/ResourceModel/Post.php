<?php
namespace Terrificminds\AdminGrid\Model\ResourceModel;


class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

	protected function _construct()
	{
		$this->_init('custom_admin_table','post_id');
	}
	
}

