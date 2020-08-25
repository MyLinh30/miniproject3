<?php


namespace Linh\Hotel\Controller\Adminhtml\Hotel;


use Linh\Hotel\Model\HotelFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\View\Result\PageFactory;

class GetHotelInfoAjax extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $hotelFactory;
    protected $resultJsonFactory;
    public function __construct(Context $context,
                                PageFactory $resultPageFactory,
                                HotelFactory $hotelFactory,
                                JsonFactory $resultJsonFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->hotelFactory = $hotelFactory;
        $this->resultJsonFactory = $resultJsonFactory;
    }
    public function execute()
    {

        $id = $this->getRequest()->getPost('hotel_id');
        $hotelModel = $this->hotelFactory->create()->load($id);
        $resultJson = $this->resultJsonFactory->create();
        if($hotelModel->getId()){
            $data= array($hotelModel->getHotelName(),
                $hotelModel->getLocationStreet(),
                $hotelModel->getLocationCity(),
                $hotelModel->getLocationState(),
                $hotelModel->getLocationCountry(),
                $hotelModel->getAvailableSingle(),
                $hotelModel->getAvailableDouble(),
                $hotelModel->getAvailableTriple()) ;
        }
        return  $resultJson->setData($data);;

    }
}



