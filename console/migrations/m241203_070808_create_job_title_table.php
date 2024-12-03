<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%job_title}}`.
 */
class m241203_070808_create_job_title_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp()
    {
        $this->createTable('{{%job_title}}', [
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
        $this->dropTable('{{%job_title}}');
    }
}
