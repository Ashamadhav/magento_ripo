<?php

namespace Terrificminds\PreferenceName\Model;

class Product extends \Magento\Catalog\Model\Product
{
    //  public function getName() is a fuction  in  \Magento\Catalog\Model\Product
public function getName()
{
     $changeNamebyPreference = $this->_getData('name') . ' modified by Preference';
     return $changeNamebyPreference;
}
}