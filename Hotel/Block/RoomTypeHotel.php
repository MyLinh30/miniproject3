<?php


namespace Linh\Hotel\Block;


use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\View\Element\Template;

class RoomTypeHotel extends Template
{
    protected $productFactory;

    public function __construct(
        Template\Context $context,
        ProductFactory $productFactory,
        array $data = []
    )
    {
        $this->productFactory = $productFactory;
        parent::__construct($context, $data);
    }

    public function getProductInfo()
    {
        $id = $this->getRequest()->getParam('id');
        $product = $this->productFactory->create()->load($id);
        if ($product->getId()) {
            $result = $product->getRoomtype();
            if ($result == 1) {
                return "Single";
            } else if ($result == 2) {
                return "Double";
            } else {
                return "Triple";
            }
        }
        else {
            return null;
        }


//        $collection= $this->productCollectionFactory->create();
//        $allproduct = $collection->getItems();
//        foreach ($allproduct as $product ){
//            if($product->getId()== $id) {
//               return $product->getRoomtype();
//            }
//        }
    }
}

