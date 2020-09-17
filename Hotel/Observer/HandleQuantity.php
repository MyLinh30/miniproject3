<?php


namespace Linh\Hotel\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class HandleQuantity implements ObserverInterface
{
    protected $_hotelFactory;
    protected $_registry;
    protected $_collectionFactory;
    protected $_productFactory;

    public function __construct(\Magento\Catalog\Model\ProductFactory $_productFactory,
                                \Linh\Hotel\Model\HotelFactory $_hotelFactory)
    {
        $this->_productFactory = $_productFactory;
        $this->_hotelFactory = $_hotelFactory;
    }

    public function execute(Observer $observer)
    {
        $hotelModel = $this->_hotelFactory->create();
        $productModel = $this->_productFactory->create();
        $totalQuantyOrder = $observer->getOrder()->getData('total_qty_ordered');
        $items = $observer->getOrder()->getItems();
        foreach ($items as $item) {
            $idProduct = $item->getProductId();
            $productModel->load($idProduct);
            $roomType = $productModel->getData('roomtype');
            foreach ($item->getData('additional_options') as $data) {
                $hotelId = $data['location_hotel']; //Get hotel id
                //Handle type room to set quantity available room
                if ($roomType === "Single") {
                    $result = $hotelModel->load($hotelId)->getData('available_single') - $totalQuantyOrder;
                    $hotelModel->setData('available_single', $result);
                } elseif ($roomType === "Double") {
                    $result = $hotelModel->load($hotelId)->getData('available_double') - $totalQuantyOrder;
                    $hotelModel->setData('available_double', $result);
                } elseif ($roomType === "Triple") {
                    $result = $hotelModel->load($hotelId)->getData('available_triple') - $totalQuantyOrder;
                    $hotelModel->setData('available_triple', $result);
                }
                $hotelModel->save();
            }
        }
    }
}
