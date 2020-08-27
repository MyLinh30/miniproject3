<?php


namespace Linh\Hotel\Block\Adminhtml;



use Magento\Framework\View\Element\Template;

class ShowOrderInfo extends Template
{
    protected $orderCollectionFactory;
    public function __construct(Template\Context $context,
                                \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
                                array $data = [])
    {
        $this->orderCollectionFactory = $orderCollectionFactory;
        parent::__construct($context, $data);
    }
    public function getOderInfo()
    {
       $ordercollection = $this->orderCollectionFactory->create();
//       $ordercollection->addFieldToSelect('*')->addAttributeToFilter('roomtype', array(
//           'like' => '%Double%'
//       ));

        $order = $ordercollection->addFieldToSelect(['entity_id','state']);
        return $order;
    }



}
