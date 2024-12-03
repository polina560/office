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
            'id' => 'int NOT NULL AUTO_INCREMENT',
            'first_name' => $this->string()->notNull()->comment('Имя'),
            'middle_name' => $this->string()->notNull()->comment('Отчество'),
            'last_name' => $this->string()->notNull()->comment('Фамилия'),
            'work_place_number' => $this->integer()->notNull()->comment('Номер рабочего места'),
            'id_job_title' => $this->integer()->notNull()->comment('Должность'),
            'department' => $this->string()->comment('Отдел'),
            'photo' => $this->string()->comment('Фотография'),
            'X' => $this->float()->comment('Координата X'),
            'Y' => $this->float()->comment('Координата Y'),
            'PRIMARY KEY(id)'
        ]);

        $this->addForeignKey('FK_employee_job_title', '{{%employee}}', 'id_job_title', '{{%job_title}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    final public function safeDown()
    {
        $this->dropTable('{{%employee}}');
    }
}
