<?php
 
namespace Magebay\Hello\Block\Adminhtml;
 
use Magento\Framework\View\Element\Template;
use Magento\Framework\Registry;
 
class Posts extends Template
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;
     
 
    public function __construct(
        Template\Context $context,
        Registry $coreRegistry,
        array $data = []
    )
    {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }
     
}