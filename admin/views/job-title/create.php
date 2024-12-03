<?php

use common\components\helpers\UserUrl;
use common\models\JobTitleSearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\JobTitle
 */

$this->title = Yii::t('app', 'Create Job Title');
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Job Titles'),
    'url' => UserUrl::setFilters(JobTitleSearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-title-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => true]) ?>

</div>
