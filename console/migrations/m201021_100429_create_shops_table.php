<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shops}}`.
 */
class m201021_100429_create_shops_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shops}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'shop1sid' => $this->string()->notNull()->unique(),
            'name' => $this->string(),
            'city' => $this->string(),
            'area' => $this->string(),
            'tel' => $this->string(),
            'address' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shops}}');
    }
}
