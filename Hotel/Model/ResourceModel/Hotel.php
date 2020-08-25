<?php


namespace Linh\Hotel\Model\ResourceModel;


class Hotel extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('hotel_entity','hotel_id');
        // TODO: Implement _construct() method.
    }
}
