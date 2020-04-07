<?php
/**
 * Copyright © Terrificminds, Inc. All rights reserved.
 * 
 * @category Terrificminds Module
 * @package  Terrificminds_ProductVideos
 * @author   Sreeraj N R
 */

namespace Terrificminds\ProductVideos\Controller\Adminhtml\Videos;
use \Magento\Backend\App\Action\Context;  

/**
 * Delete Controller Action Class
 */
class Delete extends \Magento\Backend\App\Action
{
    public function __construct(
        \Terrificminds\ProductVideos\Model\ProductVideos $productvideos,
        Context $context

    )
    {
        $this->productvideos = $productvideos;
        parent::__construct($context);
    }
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
		$id = $this->getRequest()->getParam('id');
		try {
				$banner = $this->productvideos->load($id);
				$banner->delete();
                $this->messageManager->addSuccess(
                    __('Delete successfully !')
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
	    $this->_redirect('*/*/');
    }
}
