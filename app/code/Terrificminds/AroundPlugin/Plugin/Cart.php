<?php
/**
 * Copyright © Terrificminds, Inc. All rights reserved.
 * 
 * @category Terrificminds Module
 * @package  Terrificminds_AroundPlugin
 * @author   Asha 
 */
	namespace Terrificminds\AroundPlugin\Plugin;
	
	class Cart
	{   /**
		*here we change the the AddProduction in the \Magento\Checkout\Model\Cart
		*here append with around to the AddProduct
		* input: $productInfo,$requestInfo  
		*set $requestInfo['qty'] =2; 
		*output:  it return result 
		*/
		public function aroundAddProduct(
			\Magento\Checkout\Model\Cart $subject,
			\Closure $proceed,
			$productInfo,
			$requestInfo = null
		) {
			// setting quantity to 2
			$requestInfo['qty'] =2; 
			$result = $proceed($productInfo, $requestInfo);
			return $result;
		}
	}