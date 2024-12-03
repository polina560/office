<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\gridView\Column;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use kartik\grid\SerialColumn;
use yii\widgets\ListView;

/**
 * @var $this         yii\web\View
 * @var $searchModel  common\models\JobTitleSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\JobTitle
 */

$this->title = Yii::t('app', 'Job Titles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-title-index">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

    <div>
        <?= 
            RbacHtml::a(Yii::t('app', 'Create Job Title'), ['create'], ['class' => 'btn btn-success']);
//           $this->render('_create_modal', ['model' => $model]);
        ?>
    </div>

    <?= SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'pjax' => true,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            Column::widget(),
            Column::widget(['attr' => 'first_name']),
            Column::widget(['attr' => 'middle_name']),
            Column::widget(['attr' => 'last_name']),
            Column::widget(['attr' => 'work_place_number']),
//            Column::widget(['attr' => 'department']),
//            Column::widget(['attr' => 'photo']),
//            Column::widget(['attr' => 'X']),
//            Column::widget(['attr' => 'Y']),

            ['class' => GroupedActionColumn::class]
        ]
    ]) ?>
</div>
