<?php
 
namespace Magebay\Hello\Controller\Adminhtml;
 
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magebay\Hello\Model\PostsFactory;
 
class Posts extends Action
{
    protected $coreRegistry;
    protected $resultPageFactory;
    protected $postsFactory;
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        PostsFactory $postsFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->resultPageFactory = $resultPageFactory;
        $this->postsFactory = $postsFactory;
 
    }
    public function execute()
    {
 
    }
 
    /**
     * News access rights checking
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;
    }
}