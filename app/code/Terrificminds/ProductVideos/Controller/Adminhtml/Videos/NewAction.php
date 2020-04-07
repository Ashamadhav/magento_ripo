<?php 
/**
 * Copyright © Terrificminds, Inc. All rights reserved.
 * @category Terrificminds Module
 * @package  Terrificminds_ProductVideos
 * @author   Sreeraj N R
 */

namespace Terrificminds\ProductVideos\Controller\Adminhtml\Videos;

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
	 $this->_forward('edit');
  }
} 
?>
