<?php
namespace myMagento\module\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface{
  public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context){
    /*params:
    SchemaSetupInterface:Provides old fucntions we need to use from database
    ModuleContextInterface:Information about module installed to database
0    */
    $setup->startSetup();
      /*Create a table for your module.
      Get connection from the adapterInterface
      */
    if(version_compare($context->getVersion(),'1.0.1','<')){
      $setup->getConnection()->update(
        $setup->getTable('myMagento_sample_module_table'),
        [
          'qualification'=>'Bachelor of Engineering'
        ],
      $setup->getConnection()->quoteInto('id=?',1)
      );
      $setup->getConnection()->update(
        $setup->getTable('myMagento_sample_module_table'),
        [
          'qualification'=>'Bachelor of Science'
        ],
      $setup->getConnection()->quoteInto('id=?',2)
      );
    }
    $setup->endSetup();
  }
}
 ?>
