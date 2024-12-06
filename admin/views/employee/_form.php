<?php

use admin\widgets\ckfinder\CKFinderInputFile;
use common\models\JobTitle;
use common\models\Param;
use common\widgets\AppActiveForm;
use kartik\icons\Icon;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\jui\JuiAsset;

/**
 * @var $this     yii\web\View
 * @var $model    common\models\Employee
 * @var $form     AppActiveForm
 * @var $isCreate bool
 * @var $width    int
 * @var $height   int
 */
$image = Param::findOne(['group' => 'Фото', 'key' => '1'])->value;
?>

<div class="employee-form">

    <?php $form = AppActiveForm::begin() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_place_number')->textInput() ?>

    <?= $form->field($model, 'id_job_title')->dropDownList(JobTitle::getJobTitleArray()) ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->widget(CKFinderInputFile::class) ?>

    <h1>Выбор места: </h1>
    <br>
    <office-map
        :x-coordinate="<?= (float)$model->X ?>"
        :y-coordinate="<?= (float)$model->Y ?>"
        x-input-name="<?= $model->formName() ?>[X]"
        y-input-name="<?= $model->formName() ?>[Y]"
        background-image="<?= $image ?>"
    ></office-map>


    <div class="form-group">
        <?php if ($isCreate) {
            echo Html::submitButton(
                Icon::show('save') . Yii::t('app', 'Save And Create New'),
                ['class' => 'btn btn-success', 'formaction' => Url::to() . '?redirect=create']
            );
            echo Html::submitButton(
                Icon::show('save') . Yii::t('app', 'Save And Return To List'),
                ['class' => 'btn btn-success', 'formaction' => Url::to() . '?redirect=index']
            );
        } ?>
        <?= Html::submitButton(Icon::show('save') . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php AppActiveForm::end() ?>

</div>
