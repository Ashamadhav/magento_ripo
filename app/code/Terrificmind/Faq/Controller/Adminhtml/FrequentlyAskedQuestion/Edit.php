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
 * Edit Controller Action Class
 */

class Edit extends \Magento\Backend\App\Action
{
    public function __construct(
        \Terrificmind\Faq\Model\FrequentlyAskedQuestion $FrequentlyAskedQuestion,
        \Magento\Framework\Registry $registry,
        \Magento\Backend\Model\Session $session,
        Context $context
    )
    {
        $this->FrequentlyAskedQuestion = $FrequentlyAskedQuestion;
        $this->registry = $registry;
        $this->session = $session;
        parent::__construct($context);
    }
    /**
     * this fuction will exicute when click on the edit link or add new faq in the admin grid
     * when click on the add  new faq   in the admin grid the controller NewAction will load and it is re direct in to edit.php
     *  $id  recieve if id present 
     */ 
	public function execute()
    {   
        $id = $this->getRequest()->getParam('id');	
        $model =  $this->FrequentlyAskedQuestion;	
        /**
         * check if id is present or not
         *  if id is present load the model the id from that model
         */	      
        if ($id) {
            $model->load($id);
            /**
             * if there is ano rows corresponding to the id obtained thrn print error message and redirect in to thre grid
             */
            if (!$model->getId()) {
                $this->messageManager->addError(__('This row no longer exists.'));
                $this->_redirect('*/*/');// redirect into admingrid
                return;
            }
        }
    
        $data = $this->session->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        /**
         * crate a registry for the model 
         * this regisrty used to further refefernce to load data
         */
        $this->registry->register('post_data', $model);
		$this->_view->loadLayout();   
        $this->_view->renderLayout();
    }
}
