<?php


namespace Linh\Hotel\Model;


class HotelDataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $_loadedData;

    public function __construct($name,
                                $primaryFieldName,
                                $requestFieldName,
                                \Linh\Hotel\Model\ResourceModel\Hotel\CollectionFactory $hotelCollectionFactory,
                                array $meta = [],
                                array $data = [])
    {
        $this->collection = $hotelCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $hotel) {
            $this->_loadedData[$hotel->getId()] = $hotel->getData();
        }
        return $this->_loadedData;
    }

}
