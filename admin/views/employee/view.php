<?php

use admin\components\widgets\detailView\Column;
use admin\modules\rbac\components\RbacHtml;
use common\components\helpers\UserUrl;
use common\models\EmployeeSearch;
use yii\widgets\DetailView;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Employee
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Employees'),
    'url' => UserUrl::setFilters(EmployeeSearch::class)
];
$this->params['breadcrumbs'][] = RbacHtml::encode($this->title);
?>
<div class="employee-view">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

    <p>
        <?= RbacHtml::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= RbacHtml::a(
            Yii::t('app', 'Delete'),
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post'
                ]
            ]
        ) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            Column::widget(),
            Column::widget(['attr' => 'first_name']),
            Column::widget(['attr' => 'middle_name']),
            Column::widget(['attr' => 'last_name']),
            Column::widget(['attr' => 'work_place_number']),
            Column::widget(['attr' => 'id_job_title']),
            Column::widget(['attr' => 'department']),
            Column::widget(['attr' => 'photo']),
            Column::widget(['attr' => 'X']),
            Column::widget(['attr' => 'Y']),
        ]
    ]) ?>

</div>
