<?php 
/**
 * Copyright © Terrificminds, Inc. All rights reserved.
 * 
 * @category Terrificminds Module
 * @package  Terrificmind_Faq
 * @author   Asha
 */
namespace  Terrificmind\Faq\Controller\Adminhtml\FrequentlyAskedQuestion;
use Magento\Backend\App\Action;
/**
 * New Controller Action Class 
 */
class NewAction extends \Magento\Backend\App\Action
  {
    /**
    * Execute function
    */
    public function execute()
    {
      $this->_forward('edit');//forward to edit.php
    }
} 
?>
