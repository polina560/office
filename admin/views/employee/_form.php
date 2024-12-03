<?php

use common\models\JobTitle;
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
 */
JuiAsset::register($this);
?>

<div class="employee-form">

    <?php $form = AppActiveForm::begin() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_place_number')->textInput() ?>

    <?= $form->field($model, 'id_job_title')->dropDownList(JobTitle::getJobTitleArray()) ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>



    <div class="element-wrp">
        <img class="img-wrp" src=<?= \common\models\Param::findOne(['key' => 1])->value?>>
        <img id="element" src="/admin/css/map-pointer.svg" alt="icon">

    </div>
    <?php
    $css = ".element-wrp {
            position: relative;
            width: 785px;
            height: 500px;
            }
            .img-wrp {
            position: relative;
            height: 500px;
            }
            #element {
                position: absolute;
                left: 308px;
                top: 118px;
                width: 100px;
                height: 40px;
                cursor: grab;
            }
            #element:active {
                cursor: grabbing;";
    if(!empty($model->X) && !empty($model->Y)){
        $css = ".element-wrp {
            position: relative;
            width: 785px;
            height: 500px;
            }
            .img-wrp {
            position: relative;
            height: 500px;
            }
            #element {
                position: absolute;
                left: ".($model->X-50)."px;
                top: ".($model->Y- 40)."px;
                width: 100px;
                height: 40px;
                cursor: grab;
            }
            #element:active {
                cursor: grabbing;
             }";
    };
    $this->registerCss(
        $css);

    $script = <<< JS
      $(function(){
          $('#element').draggable({
               containment: '.element-wrp',
               drag: function(event, ui){
                   $('#x-field').val(ui.position.left+50);
                   $('#y-field').val(ui.position.top+40);
               }
          });
      });
      JS;
    $this->registerJs($script);
   ?>


    <?= $form->field($model, 'X')->hiddenInput(['id' => 'x-field'])->label(false) ?>

    <?= $form->field($model, 'Y')->hiddenInput(['id' => 'y-field'])->label(false) ?>



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
