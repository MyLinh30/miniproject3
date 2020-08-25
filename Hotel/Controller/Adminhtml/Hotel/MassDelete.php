<?php


namespace Linh\Hotel\Controller\Adminhtml\Hotel;


use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Backend\App\Action;
use Linh\Hotel\Model\ResourceModel\Hotel\CollectionFactory;

class MassDelete extends \Magento\Backend\App\Action
{
    protected $_filter;
    protected $_collectionFactory;
    protected $resultFactory;

    public function __construct(Action\Context $context, Filter $_filter, CollectionFactory $_collectionFactory)
    {
        $this->_collectionFactory = $_collectionFactory;
        $this->_filter = $_filter;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->_collectionFactory->create();
        $collection = $this->_filter->getCollection($result);
        $collectionSize = $collection->getSize();
        foreach ($collection as $item) {
            $item->delete();
        }
        $this->messageManager->addSuccess(__('A total of %1 element(s) have been deleted.', $collectionSize));
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('hotel/index/index');

    }

}

