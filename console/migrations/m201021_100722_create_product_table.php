<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%catproduct}}`
 * - `{{%shops}}`
 */
class m201021_100722_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'name' => $this->string(),
            'id1s' => $this->string(),
            'catid1s' => $this->string()->notNull(),
            'name' => $this->string(),
            'description' => $this->text(),
            'serial' => $this->string(),
            'barcode' => $this->string(),
            'shop1sid' => $this->string()->notNull(),
            'product_state' => $this->string(),
            'product_status' => $this->integer(),
            'cost' => $this->double(),
        ]);

        // creates index for column `catid1s`
        $this->createIndex(
            '{{%idx-product-catid1s}}',
            '{{%product}}',
            'catid1s'
        );

        // add foreign key for table `{{%catproduct}}`
        $this->addForeignKey(
            '{{%fk-product-catid1s}}',
            '{{%product}}',
            'catid1s',
            '{{%catproduct}}',
            'id1s',
            'CASCADE'
        );

        // creates index for column `shop1sid`
        $this->createIndex(
            '{{%idx-product-shop1sid}}',
            '{{%product}}',
            'shop1sid'
        );

        // add foreign key for table `{{%shops}}`
        $this->addForeignKey(
            '{{%fk-product-shop1sid}}',
            '{{%product}}',
            'shop1sid',
            '{{%shops}}',
            'shop1sid',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%catproduct}}`
        $this->dropForeignKey(
            '{{%fk-product-catid1s}}',
            '{{%product}}'
        );

        // drops index for column `catid1s`
        $this->dropIndex(
            '{{%idx-product-catid1s}}',
            '{{%product}}'
        );

        // drops foreign key for table `{{%shops}}`
        $this->dropForeignKey(
            '{{%fk-product-shop1sid}}',
            '{{%product}}'
        );

        // drops index for column `shop1sid`
        $this->dropIndex(
            '{{%idx-product-shop1sid}}',
            '{{%product}}'
        );

        $this->dropTable('{{%product}}');
    }
}
