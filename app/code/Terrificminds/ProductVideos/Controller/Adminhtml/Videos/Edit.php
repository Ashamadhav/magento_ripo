<?php
namespace Terrificminds\ProductVideos\Controller\Adminhtml\Videos;
use \Magento\Backend\App\Action\Context;  

/**
 * Code for edit video details
 * @category  Terrificminds
 * @package   Terrificminds_ProductVideos
 * @author    Sreeraj N R
 */
class Edit extends \Magento\Backend\App\Action
{
    public function __construct(
        \Terrificminds\ProductVideos\Model\ProductVideos $productvideos,
        \Magento\Framework\Registry $registry,
        \Magento\Backend\Model\Session $session,
        Context $context

    )
    {
       
        $this->productvideos = $productvideos;
        $this->registry = $registry;
        $this->session = $session;
        parent::__construct($context);

    }
	public function execute()
    {
		$id = $this->getRequest()->getParam('id');		
        $model =  $this->productvideos;		      
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This row no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }
        $data = $this->session->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
		$this->registry->register('productvideos_productvideos', $model);
		$this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
