<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%productimage}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product}}`
 */
class m201022_175142_create_productimage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%productimage}}', [
            'id' => $this->primaryKey(),
            'ownerid' => $this->integer(),
            'name' => $this->string(),
            'url' => $this->string(),
        ]);

        // creates index for column `ownerid`
        $this->createIndex(
            '{{%idx-productimage-ownerid}}',
            '{{%productimage}}',
            'ownerid'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-productimage-ownerid}}',
            '{{%productimage}}',
            'ownerid',
            '{{%product}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-productimage-ownerid}}',
            '{{%productimage}}'
        );

        // drops index for column `ownerid`
        $this->dropIndex(
            '{{%idx-productimage-ownerid}}',
            '{{%productimage}}'
        );

        $this->dropTable('{{%productimage}}');
    }
}
