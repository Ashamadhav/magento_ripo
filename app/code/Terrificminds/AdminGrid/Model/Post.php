<?php
namespace Terrificminds\AdminGrid\Model;
class Post extends \Magento\Framework\Model\AbstractModel
{
   
	protected function _construct()
	{
		$this->_init('Terrificminds\AdminGrid\Model\ResourceModel\Post');
	}

}
