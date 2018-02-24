<?php
namespace myMagento\module\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallData implements InstallDataInterface{
  public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context){
    /*params:
    ModuleDataSetupInterface:Provides old fucntions we need to use from database
    ModuleContextInterface:Information about module installed to database
0    */
    $setup->startSetup();
      /*Create a table for your module.
      Get connection from the adapterInterface
      */
    $setup->getConnection()->insert(
      $setup->getTable('myMagento_sample_module_table'),
      [
        'name'=>'Interest A'
      ]
    );
    $setup->getConnection()->insert(
      $setup->getTable('myMagento_sample_module_table'),
      [
        'name'=>'Interest B'
      ]
    );

    $setup->endSetup();
  }
}
 ?>
