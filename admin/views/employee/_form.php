<?php

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
JuiAsset::register($this);

$width = 308;
$height = 118;

if(!empty($model->X) && !empty($model->Y)) {
    $width = $model->X - 25;
    $height = $model->Y - 40;
}

?>

<div class="employee-form">

    <?php $form = AppActiveForm::begin() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_place_number')->textInput() ?>

    <?= $form->field($model, 'id_job_title')->dropDownList(JobTitle::getJobTitleArray()) ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->widget(\admin\widgets\ckfinder\CKFinderInputFile::class) ?>



    <div class="element-wrp">
        <img class="img-wrp" src=<?= Param::findOne(['key' => 1])->value ?>>
        <img id="element" src="/admin/css/map-pointer.svg" alt="icon">

    </div>
    <?php

    $size = getimagesize( Yii::$app->request->hostInfo . Param::findOne(['key' => 1])->value);

        $css = ".element-wrp {
            position: relative;
            width: ".$size[0]."px;
            height: ".$size[1]."px;
            }
            .img-wrp {
            position: relative;
            width: ".$size[0]."px;
            height: ".$size[1]."px;
            }
            #element {
                position: absolute;
                left: ".$width."px;
                top: ".$height."px;
                height: 40px;
                cursor: grab;
            }
            #element:active {
                cursor: grabbing;
             }";

    $this->registerCss(
        $css);

    $script = <<< JS
      $(function(){
          $('#element').draggable({
               containment: '.element-wrp',
               drag: function(event, ui){
                   $('#x-field').val(ui.position.left+25);
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
