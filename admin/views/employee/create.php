<?php

use common\components\helpers\UserUrl;
use common\models\EmployeeSearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Employee
 */

$this->title = Yii::t('app', 'Create Employee');
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Employees'),
    'url' => UserUrl::setFilters(EmployeeSearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => true]) ?>

</div>
