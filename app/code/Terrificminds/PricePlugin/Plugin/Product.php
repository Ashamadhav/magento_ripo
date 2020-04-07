<?php

namespace Terrificminds\PricePlugin\Plugin;
  /*    the Product class is defined in the di.xml
  */
 class Product
 {  
	/*  GetPrice is a functon in the location  \Magento\Catalog\Model\Product
	*   we add after to the  before of GetPrice .
	*   The  Getprice function in the \Magento\Catalog\Model\Product return the actual price 
	*   Input: actual price obtained from the core module 
	*   output: Actual price +200;
	*   it will add rs 200 to each product price in the category
	*/
	 public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
	 {
		 return $result + 200;
	 }
   
}