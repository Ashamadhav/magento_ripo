<?php
/**
 * Copyright © Terrificminds, Inc. All rights reserved. 
 * @category Terrificminds Module
 * @package  Terrificmind_Faq
  * @author   Asha
  */
namespace Terrificmind\Faq\Controller\Adminhtml\FrequentlyAskedQuestion;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\Action\Context;  
/**
 * Save Controller Action Class
 */
class Save extends \Magento\Framework\App\Action\Action
{ 
    public function __construct(
        Context $context,
        \Terrificmind\Faq\Model\FrequentlyAskedQuestion $faq 
    ) 
    {
       $this->faq = $faq;
       parent::__construct($context);
 
    }
    /**
     * Save values to the database
     */
	public function execute()
    { 
        $data = $this->getRequest()->getParams();
        if ($data) {            
            $model = $this->faq;
            $id = $this->getRequest()->getParam('id');
            
            if ($id) {//if id exist then save to the corresponding row
                
                $model->load($id);
            }	
            $model->setData($data);		
            try {
                $model->save();
                
                $this->messageManager->addSuccess(__('The Frist Grid Has been Saved.'));
                $this->session->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId(), '_current' => true));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch (\Magento\Framework\Model\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the banner.'));
            }
            $this->_redirect('*/*/edit', array('banner_id' => $this->getRequest()->getParam('banner_id')));
            return;
        }
        $this->_redirect('*/*/');
    }
}










