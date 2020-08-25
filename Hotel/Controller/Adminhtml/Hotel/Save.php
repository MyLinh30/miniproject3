<?php


namespace Linh\Hotel\Controller\Adminhtml\Hotel;

use Magento\Backend\App\Action;

class Save extends \Magento\Backend\App\Action
{

    public function __construct(Action\Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $data = (array)$this->getRequest()->getPost();
        $vendor = $this->_objectManager->create('Linh\Hotel\Model\Hotel');
        $vendor->setData($data);
        $vendor->save();
        $this->messageManager->addSuccess(__('Save hotel success!'));
        $this->_redirect('hotel/index/index');
    }
}


