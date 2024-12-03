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
            'id' => 'int NOT NULL AUTO_INCREMENT',
            'first_name' => $this->string()->notNull(),
            'middle_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'work_place_number' => $this->integer()->notNull(),
            'department' => $this->string(),
            'photo' => $this->string(),
            'X' => $this->float(),
            'Y' => $this->float(),
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
