<?php


namespace Linh\Hotel\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

class QuoteSubmitObserver implements ObserverInterface
{
    private $quoteItems = [];
    private $quote = null;
    private $order = null;

    public function execute(EventObserver $observer)
    {
        $this->quote = $observer->getQuote();
        $this->order = $observer->getOrder();

        foreach($this->order->getItems() as $orderItem)
        {
            if($quoteItem = $this->getQuoteItemById($orderItem->getQuoteItemId()))
            {
                if ($additionalOptionsQuote =$quoteItem->getOptionByCode('additional_options'))
                {

                    if($additionalOptionsOrder = $orderItem->getProductOptionByCode('additional_options'))
                    {
                        $additionalOptions = array_merge($additionalOptionsQuote, $additionalOptionsOrder);
                    }
                    else
                    {
                        $additionalOptions = $additionalOptionsQuote;
                    }
                    if(count($additionalOptions) > 0)
                    {
                        $options = $orderItem->getProductOptions();
                        $options['additional_options'] = unserialize($additionalOptions->getValue());
                        $orderItem->setProductOptions($options);
                    }
                }
            }
        }
    }
    private function getQuoteItemById($id)
    {
        if(empty($this->quoteItems))
        {

            foreach($this->quote->getItems() as $item)
            {
                $this->quoteItems[$item->getId()] = $item;
            }
        }
        if(array_key_exists($id, $this->quoteItems))
        {
            return $this->quoteItems[$id];
        }
        return null;
    }
}
