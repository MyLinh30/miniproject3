<?php


namespace Linh\Hotel\Controller\Adminhtml\Hotel;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;

class Show extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    public function __construct(Action\Context $context,PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $page = $this->resultPageFactory->create();
        $page->getConfig()->getTitle()->prepend(__('SHOW HOTEL'));
        return $page;
        // TODO: Implement execute() method.
    }
}
