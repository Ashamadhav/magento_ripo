<?php
/**
 * Copyright © Terrificminds, Inc. All rights reserved.
 *
 * @category Terrificminds Module
 * @package  Terrificminds_ProductVideos
 * @author   Sreeraj N R
 */

namespace Terrificminds\ProductVideos\Block;

use Magento\Framework\UrlFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;

class ProductVideos extends \Magento\Catalog\Block\Product\View
{
    /**
     * @var storeManager
     */
    protected $_storeManager;
     /**
     * @var urlEncoder
     */
    protected $_urlEncoder;
    /**
     * @var productRepository
     */
    protected $_productRepository;
     /**
     * @var string
     */
    protected $_string;
     /**
     * @var productHelper
     */
    protected $_productHelper;
     /**
     * @var customerSession
     */
    protected $_customerSession;
    /**
     * @var productTypeConfig
     */
    protected $_productTypeConfig;
     /**
     * @var localeFormat
     */
    protected $_localeFormat;
     /**
     * @var priceCurrency
     */
    protected $_priceCurrency;
     /**
     * @var storageManager
     */
    protected $_storageManager;
	/**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\Url\EncoderInterface $urlEncoder
     * @param \Magento\Framework\Json\EncoderInterface $jsonEncoder
     * @param \Magento\Framework\Stdlib\StringUtils $string,
     * @param \Magento\Catalog\Helper\Product $productHelper,
     * @param \Magento\Catalog\Model\ProductTypes\ConfigInterface $productTypeConfig,
     * @param \Magento\Framework\Locale\FormatInterface $localeFormat,
     * @param \Magento\Customer\Model\Session $customerSession,
     * @param \ProductRepositoryInterface $productRepository,
     * @param \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
     * @param StoreManagerInterface $storageManager
     * @return void
     */

    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Framework\Url\EncoderInterface $urlEncoder,
        \Magento\Framework\Json\EncoderInterface $jsonEncoder,
        \Magento\Framework\Stdlib\StringUtils $string,
        \Magento\Catalog\Helper\Product $productHelper,
        \Magento\Catalog\Model\ProductTypes\ConfigInterface $productTypeConfig,
        \Magento\Framework\Locale\FormatInterface $localeFormat,
        \Magento\Customer\Model\Session $customerSession,
        ProductRepositoryInterface $productRepository,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        array $data = [],
        \Terrificminds\ProductVideos\Model\ResourceModel\ProductVideos\CollectionFactory $videoCollectionFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        parent::__construct(
            $context,
            $urlEncoder,
            $jsonEncoder,
            $string,
            $productHelper,
            $productTypeConfig,
            $localeFormat,
            $customerSession,
            $productRepository,
            $priceCurrency,
            $data
        );
        $this->videoCollectionFactory = $videoCollectionFactory;
        $this->storeManager = $storeManager;
    }
	public function getProductVideoCollections($sku){
        $videoCollection = $this->videoCollectionFactory->create()->addFieldToFilter('sku', array('finset'=>$sku));
		return $videoCollection;
    }
    
    public function getVideoImage($thumbnail){
        $mediaUrl = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $mediaUrl.$thumbnail;
    }

    public function getMediaPath(){
        $mediaUrl = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $mediaUrl;
    }
}
