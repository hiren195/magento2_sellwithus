<?php
namespace Magehiren\Sellwithus\Model\ResourceModel\Sellwithus;
  
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
  
class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Magehiren\Sellwithus\Model\Sellwithus',
            'Magehiren\Sellwithus\Model\ResourceModel\Sellwithus'
        );
    }
}
