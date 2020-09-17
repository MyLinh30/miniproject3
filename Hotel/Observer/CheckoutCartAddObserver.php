<?php


namespace Linh\Hotel\Observer;


use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Serialize\Serializer\Json;

class CheckoutCartAddObserver implements ObserverInterface
{
    protected $_layout;
    protected $_storeManager;
    protected $_request;

    public function __construct(\Magento\Store\Model\StoreManagerInterface $storeManager,
                                \Magento\Framework\View\LayoutInterface $layout,
                                \Magento\Framework\App\RequestInterface $request,
                                Json $serializer = null)
    {

        $this->_layout = $layout;
        $this->_storeManager = $storeManager;
        $this->_request = $request;
        $this->serializer = $serializer ?: \Magento\Framework\App\ObjectManager::getInstance()
            ->get(Json::class);
    }


    public function execute(EventObserver $observer)
    {
        $item = $observer->getQuoteItem();
        $additionalOptions = array();
        if ($additionalOption = $item->getOptionByCode('account_name'))
        {
            $additionalOptions[] = (array) ($this->serializer->unserialize($additionalOption->getValue()));
        }
        $additionalOptions[] =
            [
            'label' => 'Account name: ',
            'value' => $this->_request->getParam('account_name'),
            ];

        if (count($additionalOptions)>0)
        {
            $item->addOption(array(
                'product_id' => $item->getProductId(),
                'code' => 'account_name',
                'value' => $this->serializer->serialize($additionalOptions),
            ));
        }
    }
}


