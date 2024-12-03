<?php

namespace common\models;

use common\models\AppActiveRecord;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%employee_job_title}}".
 *
 * @property int           $id
 * @property int           $id_employee  ID сотрудника
 * @property int           $if_job_title ID должности
 *
 * @property-read Employee $employee
 * @property-read JobTitle $ifJobTitle
 */
class EmployeeJobTitle extends AppActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%employee_job_title}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id_employee', 'if_job_title'], 'required'],
            [['id_employee', 'if_job_title'], 'integer'],
            [['id_employee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['id_employee' => 'id']],
            [['if_job_title'], 'exist', 'skipOnError' => true, 'targetClass' => JobTitle::class, 'targetAttribute' => ['if_job_title' => 'id']]
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_employee' => Yii::t('app', 'Id Employee'),
            'if_job_title' => Yii::t('app', 'If Job Title'),
        ];
    }

    final public function getEmployee(): ActiveQuery
    {
        return $this->hasOne(Employee::class, ['id' => 'id_employee']);
    }

    final public function getIfJobTitle(): ActiveQuery
    {
        return $this->hasOne(JobTitle::class, ['id' => 'if_job_title']);
    }
}
