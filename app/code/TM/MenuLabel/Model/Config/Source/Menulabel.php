<?php

namespace TM\MenuLabel\Model\Config\Source;

/**
 * Type Class
 */
class Menulabel extends \Magento\Catalog\Model\Product\Attribute\Source\Status
{

    const ENABLED =1;
    const DISABLED =0;
    /**
     * @var array Possible period values
     */
    protected static $allowedCodes = [
        self::ENABLED    => 'Enabled',
        self::DISABLED   => 'Disabled'
    ];

   
    public static function getOptionArray()
    {
        return static::$allowedCodes;
    }

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        $opts = [];

        foreach (static::getOptionArray() as $key => $value) {
            $opts[] = [
                'label' => $value,
                'value' => $key,
            ];
        }

        return $opts;
    }

    /**
     * Retrieve option array with empty value
     *
     * @return string[]
     */
    public function getAllOptions()
    {
        return $this->toOptionArray();
    }

    /**
     * Retrieve option text by option value
     *
     * @param string $optionId
     * @return string
     */
    public function getOptionText($optionId)
    {
        $options = static::getOptionArray();

        return isset($options[$optionId]) ? $options[$optionId] : null;
    }  
}
