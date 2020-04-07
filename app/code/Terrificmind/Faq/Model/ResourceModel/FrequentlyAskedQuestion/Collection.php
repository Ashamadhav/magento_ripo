<?php
namespace Terrificmind\Faq\Model\ResourceModel\FrequentlyAskedQuestion;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Terrificmind\Faq\Model\FrequentlyAskedQuestion', 'Terrificmind\Faq\Model\ResourceModel\FrequentlyAskedQuestion');
	}

}