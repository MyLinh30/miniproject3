<?php


namespace Linh\Hotel\Model\Config\Source;


class ShowRoomType extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    protected $_options;
    public function toOptionArray()
    {
        return [
            [
                'value'=>null,
                'label'=>__('--Select Option--')
            ],
            [
                'value'=> 100,
                'label'=>__('Single')
            ],
            [
                'value'=> 100,
                'label' => __('Double')
            ],
            [
                'value'=> 1000,
                'label' => __('Triple')
            ]
        ];
    }

    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                [
                    'value'=>null,
                    'label'=>__('--Select Option--')
                ],
                [
                    'value'=> 1,
                    'label'=>__('Single')
                ],
                [
                    'value'=> 2,
                    'label' => __('Double')
                ],
                [
                    'value'=> 3,
                    'label' => __('Triple')
                ]
            ];
        }
        return $this->_options;
        // TODO: Implement getAllOptions() method.
    }
}



