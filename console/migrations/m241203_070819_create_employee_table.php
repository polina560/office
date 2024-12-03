<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 */
class m241203_070819_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp()
    {
        $this->createTable('{{%employee}}', [
            'id' =>'int NOT NULL AUTO_INCREMENT',
            'title' => $this->string()->notNull()->comment('Название должности'),
            'PRIMARY KEY(id)'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    final public function safeDown()
    {
        $this->dropTable('{{%employee}}');
    }
}
