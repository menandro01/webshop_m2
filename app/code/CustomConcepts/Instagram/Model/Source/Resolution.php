<?php

/**
 * CustomConcepts Infotech
 * CustomConcepts Instagram Extension
 * 
 * @category   CustomConcepts
 * @package    CustomConcepts_Instagram
 * @copyright  Copyright © 2006-2016 CustomConcepts
 *  
 */

namespace CustomConcepts\Instagram\Model\Source;

class Resolution implements \Magento\Framework\Option\ArrayInterface
{

    protected $_options;

    /**
     * to option array
     *
     * @return array
     */
    public function toOptionArray() {

        $this->_options = [
            ['label' => '150px x 150px', 'value' => 'thumbnail'],
            ['label' => '306px x 306px', 'value' => 'low_resolution'],
            ['label' => '612px x 612px', 'value' => 'standard_resolution'],
        ];
        return $this->_options;
    }

}