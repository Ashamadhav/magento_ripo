<?php
/**
 * Copyright © Terrificminds, Inc. All rights reserved.
 * 
 * @category Terrificminds Module
 * @package  Terrificminds_SpecialIcons
 * @author   Nithin Mohan A
 */

namespace Terrificminds\ProductVideos\Setup;
/**
 * InstallSchema class
 */

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{   
    /**
	 * Install script for creating table "tm_special_icons"
	 * 
	 * @param \Magento\Framework\Setup\SchemaSetupInterface $setup
	 * @param \Magento\Framework\Setup\ModuleContextInterface $context
	 */
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('product_related_videos')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('product_related_videos')
            )
                ->addColumn(
                    'id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary'  => true,
                        'unsigned' => true,
                    ]
                )
                ->addColumn(
					'sku',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false']
					
                )
                ->addColumn(
					'title',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false']
					
                )
                ->addColumn(
					'thumb_nail_image',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false']
					
                )
                ->addColumn(
					'video_url',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false']
					
                )
                ->addColumn(
					'video',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => true']
					
                )
                ->addColumn(
					'video_description',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => true']
					
                )
                ->addColumn(
					'link',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => true']
					
                );
                
            $installer->getConnection()->createTable($table);  
        }
        $installer->endSetup();
    }
}
?>
