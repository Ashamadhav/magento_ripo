<?php

namespace TM\MenuLabel\Model\Config\Source;

class Options extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    public function __construct(
        \TM\MenuLabel\Model\ResourceModel\Menulabel\CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }
    /**
    * Get all options
    *
    * @return array
    */
    public function getAllOptions()
    {
        $this->_options = [];
        $collections = $this->collectionFactory->create()->addFieldToFilter("status",1);
        $this->_options[0]['label'] = 'Select an option';
        $this->_options[0]['value'] = '0';
        $i=1;
        foreach ($collections as $collection) {
            $this->_options[$i]['label'] = $collection->getLabel();
            $this->_options[$i]['value'] = $collection->getLabel();
            $i++;
        }
        return $this->_options;

    }

}