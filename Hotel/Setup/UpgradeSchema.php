<?php


namespace Linh\Hotel\Setup;


use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{

    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.0.1') < 0) {
            $installer = $setup;
            $installer->startSetup();
            $linhTable = $installer->getConnection()->newTable($installer->getTable('hotel_entity'))
                ->addColumn('hotel_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    11, [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'Hotel ID')
                ->addColumn('hotel_name',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    100, [
                        'nullable' => false,
                        'required' => true,
                    ], 'Hotel name')
                ->addColumn('location_street',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    null, ['nullable' => false], 'Location street')
                ->addColumn('location_city',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    50, ['nullable' => false],
                    'Location city')
                ->addColumn('location_state',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    50,
                    ['nullable' => false,
                        'required' => true],
                    'Location state')
                ->addColumn('location_country',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    10,
                    ['nullable' => false],
                    'Location country')
                ->addColumn('contact_phone',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    20,
                    ['nullable' => false],
                    'Contact phone')
                ->addColumn('total_available_room',
                    \Magento\Framework\Db\Ddl\Table::TYPE_SMALLINT,
                    null,
                    ['nullable' => false],
                    'Total available room')
                ->addColumn('available_single',
                    \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable' => false,
                        'default' => 100],
                    'Available single')
                ->addColumn('available_double',
                    \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['nullable' => false,
                        'default'=> 100],
                    'Available double')
                ->addColumn('available_triple',
                    \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['nullable' => false,
                        'default'=> 1000],
                    'Available triple');
            $installer->getConnection()->createTable($linhTable);
            $installer->endSetup();
        }
    }

}


