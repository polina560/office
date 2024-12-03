<?php

namespace common\models;

use common\models\AppActiveRecord;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%job_title}}".
 *
 * @property int                     $id
 * @property string                  $title Название должности
 *
 * @property-read EmployeeJobTitle[] $employeeJobTitles
 */
class JobTitle extends AppActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%job_title}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    final public function getEmployeeJobTitles(): ActiveQuery
    {
        return $this->hasMany(EmployeeJobTitle::class, ['if_job_title' => 'id']);
    }
}
