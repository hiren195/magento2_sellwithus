<?php

namespace Magehiren\Sellwithus\Block;

class Sellwithus extends \Magento\Framework\View\Element\Template
{
    protected $_helper;
    
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magehiren\Sellwithus\Helper\Data $helper
     */
    public function __construct(
    	\Magento\Framework\View\Element\Template\Context $context,
        \Magehiren\Sellwithus\Helper\Data $helper,
        array $data = []
    	)
    {
        $this->_helper = $helper;
        parent::__construct($context, $data);
        //parent::__construct($context);
    }

    /**
     * get category collection
     */ 
    public function getCategoryCollection()
    {
        return $this->_helper->getCategoryCollectionData();
    }

    /**
     * get form action
     */ 
    public function getFormAction()
    {
        return $this->getUrl('sellwithus/index/post');
    }
    
    /**
     * option array for city
     */ 
    public function toOptionCtypeArray()
    {
        return $this->_helper->toOptionCtypeData();
    }

    /**
     * option array for state
     */
    public function toOptionStateArray()
    {
        return $this->_helper->toOptionStateData();
    }
}