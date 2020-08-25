<?php


namespace Linh\Hotel\Controller\Adminhtml\Hotel;


class Delete extends \Magento\Backend\App\Action
{
    /**
     * Authorization level
     *
     * @see _isAllowed()
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Rsgitech_News::news_delete');
    }

    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        if($id){
            try {
                $model = $this->_objectManager->create('Linh\Hotel\Model\Hotel');
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('Delete hotel finish!'));
                $this->_redirect('hotel/index/index');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }

        }


    }
}




