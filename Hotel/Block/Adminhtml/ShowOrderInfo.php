<?php


namespace Linh\Hotel\Block\Adminhtml;



use Magento\Framework\View\Element\Template;

class ShowOrderInfo extends Template
{
    protected $orderCollectionFactory;
    protected $productCollectionFactory;
    public function __construct(Template\Context $context,
                                \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
                                \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productFactory,
                                array $data = [])
    {
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->productCollectionFactory = $orderCollectionFactory;
        parent::__construct($context, $data);
    }
    public function getOrders()
    {

       //$ordercollection = $this->orderCollectionFactory->create();
       //$getOrderCollection = $ordercollection->addAttributeToSelect('*')->addAttributeToFilter('roomtype' ,'Double');
       $productCollection = $this->productCollectionFactory->create()->addFieldToSelect(['entity_id','status','created_at']);
       return $productCollection;


//       $ordercollection->addFieldToSelect('*')->addAttributeToFilter('roomtype', array(
//           'like' => '%Double%'
//       ));


    }



}
