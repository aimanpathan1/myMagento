<?php
namespace myMagento\module\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface{
  public function install(SchemaSetupInterface $setup, ModuleContextInterface $context){
    /*params:
    SchemaSetupInterface:Provides old fucntions we need to use from database
    ModuleContextInterface:Information about module installed to database
0    */
    $setup->startSetup();
      /*Create a table for your module.
      Get connection from the adapterInterface
      */
      $table=$setup->getConnection()->newTable(
        $setup->getTable('myMagento_sample_module_table')
        )->addColumn(
          'id',
          Table::TYPE_INTEGER,
          null,
          ['identity'=>true, 'nullable'=>false, 'primary'=>true]/*options*/
          )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            ['nullable'=>false],
            'Item Name'
            )->addIndex(
              $setup->getIdxName('myMagento_sample_module_table',['name']),
              ['name']
              )->setComment(
                'Sample Items'
              );
              $setup->getConnection()->createTable($table);
    $setup->endSetup();
  }
}
 ?>
