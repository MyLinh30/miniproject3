<?php


namespace Linh\Hotel\Block;


use Linh\Hotel\Model\ResourceModel\Hotel\CollectionFactory;
use Magento\Framework\View\Element\Template;

class SelectLocationHotel extends Template
{
    protected $hotelCollectionFactory;
    public function __construct(
        Template\Context $context,
        CollectionFactory $hotelCollectionFactory,
        array $data = []
    )
    {
        $this->hotelCollectionFactory = $hotelCollectionFactory;
        parent::__construct($context, $data);
    }
    public function getLocationHotel()
    {
        $collection = $this->hotelCollectionFactory->create();
        $result = $collection->getItems();
        return $result;
    }
}
