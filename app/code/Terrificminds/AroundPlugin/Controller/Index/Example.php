<?php

namespace Terrificminds\AroundPlugin\Controller\Index;

class Example extends \Magento\Framework\App\Action\Action
{

	protected $title;

	public function execute()
	{
		 $this->setTitle('Welcome');
		 $this->getTitle();
	}

	public function setTitle($title)
	{
		return $this->title = $title;
	}

	public function getTitle()
	{
		return $this->title;
	}
}

