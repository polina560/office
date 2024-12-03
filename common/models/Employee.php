<?php

namespace common\models;

use common\models\AppActiveRecord;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%employee}}".
 *
 * @property int                     $id
 * @property string                  $first_name        Имя
 * @property string                  $middle_name       Отчество
 * @property string                  $last_name         Фамилия
 * @property int                     $work_place_number Номер раочего места
 * @property string|null             $department        Отдел
 * @property string|null             $photo             Фотография
 * @property float|null              $X                 Координата X
 * @property float|null              $Y                 Координата Y
 *
 * @property-read EmployeeJobTitle[] $employeeJobTitles
 */
class Employee extends AppActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%employee}}';
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
        return $this->hasMany(EmployeeJobTitle::class, ['id_employee' => 'id']);
    }
}
