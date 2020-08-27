<?php


namespace Linh\Hotel\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Serialize\Serializer\Json;

class AddAdditionalOptions implements ObserverInterface
{
    protected $_request;
    public function __construct(RequestInterface $request, Json $serializer = null)
    {
        $this->_request = $request;
        $this->serializer = $serializer ?: \Magento\Framework\App\ObjectManager::getInstance()
            ->get(Json::class);
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {

        if ($this->_request->getFullActionName() == 'checkout_cart_add')
        {
            $product = $observer->getProduct();
            $additionalOptions = [];
            $additionalOptions[] = array(
                'label' => "ID",
//                'value' => $this->_request->getParam('location_hotel'),
                'value' => $product->getID(),
            );
            $product->addCustomOption('additional_options', $this->serializer->serialize($additionalOptions));
        }
    }

}
