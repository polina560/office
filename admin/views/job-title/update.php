<?php

use common\components\helpers\UserUrl;
use common\models\JobTitleSearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\JobTitle
 */

$this->title = Yii::t('app', 'Update Job Title: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Job Titles'),
    'url' => UserUrl::setFilters(JobTitleSearch::class)
];
$this->params['breadcrumbs'][] = ['label' => Html::encode($model->title), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="job-title-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => false]) ?>

</div>
