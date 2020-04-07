<?php

namespace TM\MenuLabel\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{   
    /**
    * {@inheritdoc}
    */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
            $tableName = $installer->getTable('tm_menu_label');
            if ($installer->getConnection()->isTableExists($tableName) != true) {
                $table = $installer->getConnection()
                    ->newTable($tableName)
                    ->addColumn(
                        'id',
                        Table::TYPE_INTEGER,
                        null,
                        ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                        'Id'
                    )->addColumn(
                        'label',
                        Table::TYPE_TEXT,
                        250,
                        ['nullable' => false, 'default' => ''],
                        'Menu Label'
                    )
                    ->addColumn(
                        'status',
                        Table::TYPE_SMALLINT,
                        3,
                        ['unsigned' => true, 'nullable' => false,'default'=>0],
                        'Menu Status'
                    )
                    ->addColumn(
                        'created_at',
                        Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false,'default' => Table::TIMESTAMP_INIT],
                        'Created At'
                    )
                    ->addColumn(
                        'updated_at',
                        Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false,'default' => Table::TIMESTAMP_INIT_UPDATE],
                        'Updated At'
                    )
                    ->setComment('TM Menu Label')
                    ->setOption('type', 'InnoDB')
                    ->setOption('charset', 'utf8');
                $installer->getConnection()->createTable($table);
            }
         
        $installer->endSetup();
        }
    }
    