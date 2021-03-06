<?php


namespace Linh\Hotel\Model;


use Magento\Framework\Model\Context;

class Hotel extends \Magento\Framework\Model\AbstractModel
{
    public function __construct(Context $context,
                                \Magento\Framework\Registry $registry,
                                \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
                                \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
                                array $data = [])
    {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }
    public function _construct()
    {
        $this->_init('Linh\Hotel\Model\ResourceModel\Hotel');
        parent::_construct(); // TODO: Change the autogenerated stub
    }

}
