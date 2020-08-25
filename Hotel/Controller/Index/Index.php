<?php


namespace Linh\Hotel\Controller\Index;


use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultFactory;
    public function __construct(Context $context,
                                \Magento\Framework\View\Result\PageFactory $resultFactory)
    {
        parent::__construct($context);
        $this->resultFactory = $resultFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultFactory->create();
        return $resultPage;

    }
}

