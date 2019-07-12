<?php

/* @var $this yii\web\View */

$this->title = 'Report';
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Report;

$dataProvider = new ActiveDataProvider([
    'query' => Report::find(),
    'pagination' => [
        'pageSize' => 10,
    ]
]);

$widget = GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'id1',
        ],
        [
            'attribute' => 'internal_id'
        ],
        [
            'attribute' => 'last_modify',
        ],
        [
            'attribute' => 'regulator',
        ],
    ]
]);

echo $widget;
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col">

            </div>
        </div>

    </div>
</div>
