<?php

namespace Terrificminds\PreferencePrice\Model;

class Product extends \Magento\Catalog\Model\Product
{
    //  public function getName() is a fuction  in  \Magento\Catalog\Model\Product
    public function getPrice()
    {
       
        if ($this->_calculatePrice || !$this->getData(self::PRICE)) {
            
           var_dump( $this->getPriceModel()->getPrice($this));
            $y=$this->getPriceModel()->getPrice($this);
            //  original price is changed 
            return $y+1000;
        } else {
        
            $x=$this->getData(self::PRICE);
            return $x+10;
            
        }
    }

}