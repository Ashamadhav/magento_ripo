<?php
namespace Terrificmind\Faq\Setup;
/**
 * to create datadatabase
 */
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists('faq_table')) {// check the table exit
			$table = $installer->getConnection()->newTable(
				$installer->getTable('faq_table')//create table
			)
				->addColumn(     // add id coumn
					'post_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'Post ID'
				)
				->addColumn(
					'question',   //add Question column
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Question'
				)
				->addColumn(
					'answer',    // add a Answer column
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					[],
					'Answer'
				)
				

				->setComment('FAQ TABLE');
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable('faq_table'),
				$setup->getIdxName(
					$installer->getTable('faq_table'),
					['question', 'answer'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['question', 'answer'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}