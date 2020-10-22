<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%catproduct}}`.
 */
class m201021_091520_create_catproduct_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%catproduct}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'id1s' => $this->string()->unique(),
            'parentid1s' => $this->string(),
        ]);

        // creates index for column `parentid1s`
        $this->createIndex(
            '{{%idx-catproduct-parentid1s}}',
            '{{%catproduct}}',
            'parentid1s'
        );

        // add foreign key for table `{{%catproduct}}`
        $this->addForeignKey(
            '{{%fk-catproduct-parentid1s}}',
            '{{%catproduct}}',
            'parentid1s',
            '{{%catproduct}}',
            'id1s',
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
            '{{%fk-catproduct-parentid1s}}',
            '{{%catproduct}}'
        );

        // drops index for column `parentid1s`
        $this->dropIndex(
            '{{%idx-catproduct-parentid1s}}',
            '{{%catproduct}}'
        );

        $this->dropTable('{{%catproduct}}');
    }
}