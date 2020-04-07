<?php
  
namespace Magebay\Hello\Controller\Adminhtml\Posts;
  
use Magebay\Hello\Controller\Adminhtml\Posts;
class Grid extends Posts
{
   /**
     * @return void
     */
   public function execute()
   {
      return $this->resultPageFactory->create();
   }
}