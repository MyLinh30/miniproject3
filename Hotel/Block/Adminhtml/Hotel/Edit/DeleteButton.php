<?php


namespace Linh\Hotel\Block\Adminhtml\Hotel\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Linh\Hotel\Block\Adminhtml\Hotel\Edit\GenericButton;

class DeleteButton extends GenericButton implements ButtonProviderInterface
{

    public function getButtonData()
    {
        $data = [];
        if ($this->getId()) {
            $data = [
                'label' => __('Delete Hotel'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\''
                    . __('Are you sure you want to delete this manufacturer ?')
                    . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('hotel/hotel/delete', ['id' => $this->getId()]);
    }
}
