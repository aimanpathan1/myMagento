<?php
namespace myMagento\module\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface{
  public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context){
    /*params:
    SchemaSetupInterface:Provides old fucntions we need to use from database
    ModuleContextInterface:Information about module installed to database
0    */
    $setup->startSetup();
      /*Create a table for your module.
      Get connection from the adapterInterface
      */
    if(version_compare($context->getVersion(),'1.0.1','<')){
      $setup->getConnection()->addColumn(
        $setup->getTable('myMagento_sample_module_table'),
        'qualification',
        [
          'type'=>Table::TYPE_TEXT,
          'nullable'=>true,
          'comment'=>'My qualification'
        ]
      );
    }
    $setup->endSetup();
  }
}
 ?>
