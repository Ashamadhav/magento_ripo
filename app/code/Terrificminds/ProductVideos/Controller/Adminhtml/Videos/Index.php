<?php
/**
 * Product Video Module Index Controller
 * @category  Terrificminds
 * @package   Terrificminds_ProductVideos
 * @author    Terrificminds
 */

namespace Terrificminds\ProductVideos\Controller\Adminhtml\Videos;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Index Controller Action Class
 */
class Index extends Action
{   
    /**
     * @var \Magento\Backend\Model\View\Result\Page
     */
    protected $resultPage;
    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory    
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {	
		$this->resultPage = $this->resultPageFactory->create();  
		$this->resultPage ->getConfig()->getTitle()->set((__('Videos')));  // adding title to admin grid
		return $this->resultPage;
    }
}
