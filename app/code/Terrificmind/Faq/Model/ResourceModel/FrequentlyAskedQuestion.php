<?php
namespace Terrificmind\Faq\Model\ResourceModel;


class FrequentlyAskedQuestion extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

	protected function _construct()
	{
		$this->_init('faq_table','post_id');
	}
	
}

