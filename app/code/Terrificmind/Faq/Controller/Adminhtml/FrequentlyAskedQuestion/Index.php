<?php
/**
 * Copyright © Terrificminds, Inc. All rights reserved.
 * 
 * @category Terrificminds Module
 * @package  Terrificmind_Faq
 * @author   Asha
 */
namespace Terrificmind\Faq\Controller\Adminhtml\FrequentlyAskedQuestion;
/**
 * Action class of the admingrid
 */
class Index extends \Magento\Backend\App\Action 
{
	protected $resultPageFactory = false;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}

	public function execute()
	{
		$resultPage = $this->resultPageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend((__('FrequentlyAskedQuestion')));//add titile to the admin grid

		return $resultPage;
	}


}