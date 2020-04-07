<?php
/**
 * Copyright © Terrificminds, Inc. All rights reserved.
 * 
 * @category Terrificminds Module
 * @package  Terrificmind_Faq
 * @author   Asha
 */

    namespace Terrificmind\Faq\Controller\Adminhtml\FrequentlyAskedQuestion;
    use \Magento\Backend\App\Action\Context;  

    /**
     * Delete Controller Action Class
     */
    class Delete extends \Magento\Backend\App\Action
    {
        public function __construct(
            \Terrificmind\Faq\Model\FrequentlyAskedQuestion $faq,
            Context $context
        )
        {
            $this->faq = $faq;
            parent::__construct($context);
        }
        /**
         *   function execute receive the id from the getrequest and store in $id  
         *  using model it will load the row corresponding to id and perform delete option
         */
        public function execute()
        {
            $id = $this->getRequest()->getParam('id');
            try {
                    $banner = $this->faq->load($id);
                    $banner->delete();
                    $this->messageManager->addSuccess(
                        __('Delete successfully !')
                    );
                } catch (\Exception $e) {
                    $this->messageManager->addError($e->getMessage());
                }
            $this->_redirect('*/*/'); //redirect to the grid
        }
    }
