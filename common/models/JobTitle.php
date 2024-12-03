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
 * @property string                  $first_name
 * @property string                  $middle_name
 * @property string                  $last_name
 * @property int                     $work_place_number
 * @property string|null             $department
 * @property string|null             $photo
 * @property float|null              $X
 * @property float|null              $Y
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
            [['first_name', 'middle_name', 'last_name', 'work_place_number'], 'required'],
            [['work_place_number'], 'integer'],
            [['X', 'Y'], 'number'],
            [['first_name', 'middle_name', 'last_name', 'department', 'photo'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'middle_name' => Yii::t('app', 'Middle Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'work_place_number' => Yii::t('app', 'Work Place Number'),
            'department' => Yii::t('app', 'Department'),
            'photo' => Yii::t('app', 'Photo'),
            'X' => Yii::t('app', 'X'),
            'Y' => Yii::t('app', 'Y'),
        ];
    }

    final public function getEmployeeJobTitles(): ActiveQuery
    {
        return $this->hasMany(EmployeeJobTitle::class, ['if_job_title' => 'id']);
    }
}
