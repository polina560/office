<?php

namespace common\models;

use common\models\AppActiveRecord;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%employee}}".
 *
 * @property int              $id
 * @property string           $first_name        Имя
 * @property string           $middle_name       Отчество
 * @property string           $last_name         Фамилия
 * @property int              $work_place_number Номер рабочего места
 * @property int              $id_job_title      Должность
 * @property string|null      $department        Отдел
 * @property string|null      $photo             Фотография
 * @property float|null       $X                 Координата X
 * @property float|null       $Y                 Координата Y
 *
 * @property-read JobTitle    $jobTitle
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

    public static function externalAttributes(): array
    {
        return ['job.title'];
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['first_name', 'middle_name', 'last_name', 'work_place_number', 'id_job_title'], 'required'],
            [['work_place_number', 'id_job_title'], 'integer'],
            [['X', 'Y'], 'number'],
            [['first_name', 'middle_name', 'last_name', 'department', 'photo'], 'string', 'max' => 255],
            [['id_job_title'], 'exist', 'skipOnError' => true, 'targetClass' => JobTitle::class, 'targetAttribute' => ['id_job_title' => 'id']]
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
            'id_job_title' => Yii::t('app', 'Id Job Title'),
            'department' => Yii::t('app', 'Department'),
            'photo' => Yii::t('app', 'Photo'),
            'X' => Yii::t('app', 'X'),
            'Y' => Yii::t('app', 'Y'),
        ];
    }

    final public function getJob(): ActiveQuery
    {
        return $this->hasOne(JobTitle::class, ['id' => 'id_job_title']);
    }
}
