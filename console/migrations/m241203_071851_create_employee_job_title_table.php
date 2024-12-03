<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee_job_title}}`.
 */
class m241203_071851_create_employee_job_title_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp()
    {
        $this->createTable('{{%employee_job_title}}', [
            'id' => $this->primaryKey(),
            'id_employee' => $this->integer()->notNull()->comment('ID сотрудника'),
            'if_job_title' => $this->integer()->notNull()->comment('ID должности'),
        ]);

        $this->addForeignKey('FK_employee', '{{%employee_job_title}}', 'id_employee', '{{%employee}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_gon_title', '{{%employee_job_title}}', 'if_job_title', '{{%job_title}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    final public function safeDown()
    {
        $this->dropTable('{{%employee_job_title}}');
    }
}
