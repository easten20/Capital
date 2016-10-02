<?php

use yii\db\Migration;

class m160926_161320_tree_view_input extends Migration
{
    public function up()
    {
		$this->createTable('categoryproduct', [
            'id' => $this->primaryKey()
            'productId' => $this->integer()->notNull(),
            'categoryId' => $this->integer()->notNull(),
        ]);
		
        $this->createIndex(
            'idx-categoryproduct-productId',
            'categoryproduct',
            'productId'
        );
		
        $this->addForeignKey(
            'fk-categoryproduct-productId',
            'categoryproduct',
            'productId',
            'product',
            'id',
            'CASCADE'
        );
		
        $this->createIndex(
            'idx-categoryproduct-categotyId',
            'categoryproduct',
            'categoryId'
        );
		
        $this->addForeignKey(
            'fk-categoryproduct-categoryId',
            'categoryproduct',
            'categoryId',
            'category',
            'id',
            'CASCADE'
        );
		
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-categoryproduct-productId',
            'categoryproduct'
        );
		
		$this->dropIndex(
            'idx-categoryproduct-productId',
            'categoryproduct'
        );
		
		$this->dropForeignKey(
            'fk-categoryproduct-categoryId',
            'categoryproduct'
        );
		
		$this->dropIndex(
            'idx-categoryproduct-categoryId',
            'categoryproduct'
        );
		
		$this->dropTable('category_product');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
