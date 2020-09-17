<?php


namespace Linh\Hotel\Controller\Index;
use Magento\Backend\App\Action;
use Magento\Cms\Model\PageFactory;
use Linh\Hotel\Model\HotelFactory;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultFactory;



class getHotelAjax extends \Magento\Framework\App\Action\Action
{

//    public function execute()
//    {
//
//        $id = $this->getRequest()->getParam('hotel_id');
//        $hotelModel = $this->hotelFactory->create()->load($id);
//
//        if($hotelModel->getId()){
//            $data= array($hotelModel->getHotelName(),
//                $hotelModel->getLocationStreet(),
//                $hotelModel->getLocationCity(),
//                $hotelModel->getLocationState(),
//                $hotelModel->getLocationCountry(),
//                $hotelModel->getAvailableSingle(),
//                $hotelModel->getAvailableDouble(),
//                $hotelModel->getAvailableTriple()) ;
//        }
//        return  $resultJson->setData($data);
//    }
    protected $resultFactory;
    protected $hotelFactory;
    protected $resultJsonFactory;
    public function __construct(Context $context,
                                \Magento\Framework\View\Result\PageFactory $resultFactory,
                                \Linh\Hotel\Model\HotelFactory $hotelFactory,
                                \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory )
    {
        parent::__construct($context);
        $this->resultFactory = $resultFactory;
        $this->hotelFactory = $hotelFactory;
        $this->resultJsonFactory = $resultJsonFactory;
    }

    public function execute()
    {
        $idhotel = $this->getRequest()->getPost('getHotelId');
        $hotelModel = $this->hotelFactory->create()->load($idhotel);
        $resultJson = $this->resultJsonFactory->create();
        if($hotelModel -> getId()) {
            $data = array(
                $hotelModel->getHotelName(),
                $hotelModel->getLocationStreet(),
                $hotelModel->getLocationCity(),
                $hotelModel->getLocationState(),
                $hotelModel->getLocationCountry());
        }
       return $resultJson->setData($data);
    }
}




